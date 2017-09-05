$(function () { // on dom ready
    var vnodes = [
    ];
    var vedges = [
    ];
    $.fn.addNode = function (options) {
        var settings = $.extend({
            id: "",
            target: "",
            source: "",
            group:"",
            x:10,y:10
        }, options)
            cy.add([{
                    data: {id: settings.id},
                    position: {x: settings.x, y: settings.y},
                    group: "nodes"
                }
            ])
            .css({
                "background-image": thisdomain + 'media/users/' + settings.id,
                "background-fit": "cover",
                "content": settings.id,
            }).layout({
                name:"breadthfirst",
                fit:true,
                directed:true,
                padding:30,
                nodeRepulsion:400000,
                nodeOverlap:10,
                animate:true,
                nestingfactor:5,
                gravity:250,
                idealEdgeLength:5
            });
        if (settings.target != "") {
            console.log("Target "+settings.target)
            cy.add([
                {
                    data: {id: settings.id + 'edge_out', source: settings.id, target: settings.target},
                    group: "edges"
                }
            ]);
        }
        if (settings.source != "") {
            cy.add([
                {
                    data: {id: settings.id + 'edge_in', source: settings.source, target: settings.id},
                    group: "edges"
                }
            ]).css({
                width:7,
                'target-arrow-shape': 'triangle',
                'line-color': '#ffaaaa',
                'target-arrow-color': '#ffaaaa'                
            });
        }
    };
    $.fn.reloadGraph = function(){
        var x = cy.load({
                nodes:vnodes,
                edges:vedges
        },function(){
            cy.nodes().each(function(i,ele){
                ele.css({
                    "content":ele.id(),
                    "background-image":thisdomain+"media/users/"+ele.id()+".jpg",
                    "background-fit":"cover"
                });
            });
            cy.edges().each(function(i,ele){
                ele.css({
                    'width':2,
                    "line-color":"black",
                    'target-arrow-shape': 'triangle',
                    "target-arrow-color":"black"                    
                });
            });
        })
        .layout({
            name:"cose",
            fit:true,
            directed:true,
            padding:10,
            nodeRepulsion:400000,
            nodeOverlap:10,
            animate:true
        });
        
    };
    $.fn.reloadData = function(options){
        var settings = $.extend({
            url:""
        },options);
        $.ajax({
            url: settings.url,
            dataType: "json"
        }).done(function (data) {
            $.each(data, function (x, y) {
                switch(y["group"]){
                    case "nodes":
                        vnodes.push({data:{id:y["id"]},group:y["group"]});
                        break;
                    case "edges":
                        vedges.push({data:{id:y["id"],source:y["source"],target:y["target"]},group:y["group"]});
                        break;
                }
            });
            $(this).reloadGraph();
        });
    };
    var cy = cytoscape({
        container: document.getElementById('cy'),
        ready:function(){
        }
    }); // cy init
    $(this).reloadData({
        url:thisdomain+"users/dbUserJson"
    });
    cy.on("tap","node",{},function(evt){
        var node = evt.cyTarget;
        //cy.$('#'+node.id()).select();
        console.log("Tapped "+node.id());
    });
    var cy = $('#cy').cytoscape('get');
    var tappedBefore = null;
    cy.on('tap', function(event) {
      var tappedNow = event.cyTarget;
      setTimeout(function(){ tappedBefore = null; }, 300);
      if(tappedBefore === tappedNow) {
        tappedNow.trigger('doubleTap');
        tappedBefore = null;
      } else {
        tappedBefore = tappedNow;
      }
    });
    cy.on('doubleTap', 'node', function(event) {
        var node = event.cyTarget;
        console.log("Double Tapped "+node.id());
    });
    $("#btnTableView").click(function(){
        window.location.href = thisdomain+"users";
    });
    $("#btnrearrange").click(function(){
        console.log("Rearrange clicked");
        $(this).reloadData({url:thisdomain+"users/dbUserJson"});
    });
    $("#btnproperties").click(function(){
        /*$(this).showModal({
            message:"Anda harus memilih user untuk melihat/edit properties nya "+cy.$('node:selected').id(),
            expire:2000
        });*/
        $.ajax({
            url:thisdomain+"users/singleUserJson",
            data:{username:cy.$('node:selected').id()},
            dataType:"json",
            type:"post"
        }).done(function(data){
            console.log("supervisor : " + data['supervisor']);
            $("#prusername").val(data.username);
            $("#prsupervisor").val(data.supervisor);
        }).fail(function(){
            console.log("Failed");
        });
        $("#property_label").html(cy.$('node:selected').id());
        $("#dProperties").modal();
    });
    $("#btnsearch").click(function(){
        $("#searchusername").val("");
        $("#dUserSearch").modal();
            console.log("tset select");
    });
    $("#btncekuser").click(function(){
        cy.nodes().hide();
        var toSearch = $("#searchusername").val();
        cy.$('#'+toSearch).show();        
    });
    $("#btnShowAll").click(function(){
        cy.nodes().show();
    });
    $('#dUserSearch').on('shown', function () {
        $('#searchusername').focus();
    })
    //$('#searchusername').autocomp({
    $('.pautocomplete').autocomp({
        //data:suggests,
        url:thisdomain+"users/dbUserJsonAutocomplete",
        dataType:"ajax",
        callback:function(options){
            var settings = $.extend({
                data:''
            },options);
            console.log("test callback "+settings.data);
            cy.nodes().hide();
            cy.$('#'+settings.data).show();        
            $("#dUserSearch").modal("hide");
        }
    });
    $("#btnsaveproperty").click(function(){
        console.log('Username : '+$('#prusername').val());
        console.log('Supervisor : '+$('#prsupervisor').val());
        if($("#prsupervisor").val() ===""){
            //remove supervisor
        }else{
            $.ajax({
                url:thisdomain+"users/associate_supervisor_user",
                data:{
                    user_id:$('#prusername').val(), 
                    supervisor_id:$('#prsupervisor').val(),
                    identifier : 'username'
                },
                type:'post'
            }).done(function(data){
                console.log(data);
                $(this).reloadData({
                    url:thisdomain+"users/dbUserJson"
                });                
            }).fail(function(){
                console.log("Failed to associate");
            });
        }
    });
}); // on dom ready
