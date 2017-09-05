$(function () { // on dom ready
    var vnodes = [
    ];
    var vedges = [
    ]
    var sisca = {data:{id:"sisca"}}
/*    var ketut = {data:{id:"ketut"}}
    
    var jami = {data:{id:"jami"}}
    var felix = {data:{id:"felix"}}
    var naning = {data:{id:"naning"}}
    var ruri = {data:{id:"ruri"}}
    */
    vnodes.push(sisca);
/*    vnodes.push(ketut);
    vnodes.push(felix);
    vnodes.push(jami);
    vnodes.push(naning);
    vnodes.push(ruri);
  */  /*
    var m1 = {data:{id:"m1",source:"sisca",target:"ketut"}}
    var m2 = {data:{id:"m2",source:"sisca",target:"felix"}}
    var m3 = {data:{id:"m3",source:"sisca",target:"jami"}}
    var m4 = {data:{id:"m4",source:"sisca",target:"naning"}}
    var m5 = {data:{id:"m5",source:"sisca",target:"ruri"}}*/
    /*
    for(c=1;c<6;c++){
        vedges.push({data:{id:"m"+c,source:"sisca",target:"ketut"}});
    }*/
    /*
    vedges.push(m1);
    vedges.push(m2);
    vedges.push(m3);
    vedges.push(m4);
    vedges.push(m5);
*/
    $.fn.addNode = function (options) {
        var settings = $.extend({
            id: "",
            target: "",
            source: "",
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
            "height":10,
            "width":10
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
                width:1,
                'target-arrow-shape': 'triangle',
                'line-color': '#ffaaaa',
                'target-arrow-color': '#ffaaaa'                
            });
        }
        cy.load();
    };
    var cy = cytoscape({
        container: document.getElementById('cy'),
        ready:function(){
            console.log("test cytoscape ready");
        },
        elements:{
            nodes:vnodes,
            edges:vedges
        },
        zoom:10,
        pan:{x:0,y:0},
        layout:{
            name:"springy"
        },
        style:cytoscape.stylesheet()
                .selector('node')
                .css({
                    "content":"data(id)",
                    "background-image": thisdomain + 'media/users/jami.jpg',
                    "background-fit": "cover",
                })
    }) // cy init
    cy.on("tap","node",{id:"sisca"},function(evt){
        console.log(evt.data.foo);
        var node = evt.cyTarget;
        console.log("Tapped "+node.id());
    });
    /*cy.add([{
            data: {id: "puji"},
            position: {x: 100, y: 100},
            group: "nodes"
        }
    ])
    .css({
        "background-image": thisdomain + 'media/users/puji',
        "content": "puji",
        "height":20,
        "width":20
    });*/
/*    $.ajax({
        url: thisdomain + "users/userJson",
        dataType: "json"
    }).done(function (data) {
        $.each(data, function (x, y) {
            console.log(y["id"]);
            console.log(y["source"]);
            $(this).addNode({
                id: y["id"],
                target: "",
                source: y["source"]
            })
        })
    });*/
    $.ajax({
        url: thisdomain + "users/userJson",
        dataType: "json"
    }).done(function (data) {
        $.each(data, function (x, y) {
            console.log("ID : "+y["id"]);
            $(this).addNode({
                target:"sisca",
                id:y["id"]
            });
            //vedges.push({data:{id:"e"+y["id"],source:"sisca",target:"ketut"}});
            console.log("Soirce : "+y["source"]);
        });
    });

}); // on dom ready
