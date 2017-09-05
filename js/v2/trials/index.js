(function($){
    if($("#ttrials").length > 0){
        var ttrial =$("#ttrials").dataTable(
            {
                "iDisplayLength": 5, 
                "aLengthMenu": [5,10,25,50,100], 
                "sPaginationType": "full_numbers", 
                "aoColumns": [ 
                    { "bSortable": true }, 
                    null, 
                    null, 
                    null, 
                    null,
                    null,
                    null,
                    null,
                    null,
                    {"bVisible":false},
                    null],
                "aaSorting": [[10,'desc']]
            }
        );
    }
    $( "#txtclient" ).autocomplete({
        source: "/pclients/feed",
        minLength: 2,
        focus:function(event,ui){
            $("#txtclient").val(ui.item.label);
            return false;
        },
        select:function(event,ui){
            console.log("Label dipilih",ui.item.label);
            $("#txtclient").val(ui.item.label);
            $("#txtidclient").val(ui.item.value);
            return false;
        }
    })
    $("#ttrials").on("click","#liapprove",function(){
        id = $(this).stairUp({
            level:5
        }).attr("trid");
        $.ajax({
            url:'/ptrials/approve/'+id,
            type:'get',
        })
        .done(function(res){
            console.log("sukse",res);
        })
        .fail(function(err){
            console.log("Err",err);
        });
    })
    $("#ttrials").on("click",".listop",function(){
        $("#ttrials tbody tr").removeClass("selected");
        $(this).stairUp({level:5}).addClass("selected");
        id = $(this).stairUp({level:5}).attr("trid");
        console.log("listop clicked");
        $.ajax({
            url:'/ptrials/endtrial/'+id,
            type:'get'
        })
        .done(function(res){
            console.log("listop Res",res);
            $("#ttrials tbody tr.selected").find(".tdstatus").html("Stopped");
            endstatus = "<div class='isstopped'>stopped:</div><div>"+res+"</div>";
            endtd = $("#ttrials tbody tr.selected").find(".tdend");
            endtd.html(endtd.html()+endstatus);
        })
        .fail(function(err){
            console.log("listop Err",err);
        });
    })
    $("#ttrials").on("click",".listart",function(){
        $("#ttrials tbody tr").removeClass("selected");
        $(this).stairUp({level:5}).addClass("selected");
        id = $(this).stairUp({
            level:5
        }).attr("trid");
        $.ajax({
            url:'/ptrials/starttrial/'+id,
            type:'get',
        })
        .done(function(res){
            console.log("sukse",res);
            $("#ttrials tbody tr.selected").find(".tdstatus").html("On Trial");
            $("#ttrials tbody tr.selected").find(".durasi").attr("execdate",res);
            $("#ttrials tbody tr.selected").find(".durasi").jsage({
                pdate:sql2jsdate($(this).stairUp({level:1}).find(".execdate").html()),
                pyear:"2017",
                pmonth:"5",
                pday:"3",
                phour:"8",
                pminute:"0",
                psecond:"0",
                usedate:"pdate"
            });
            $("#ttrials tbody tr.selected").find(".execdate").html(res+ " (Eksekusi)");
        })
        .fail(function(err){
            console.log("Err",err);
        });
    })
    setInterval(function(){
        $("#ttrials tbody tr td.durasi").each(function(){
            $(this).jsage_({
                pdate:sql2jsdate($(this).stairUp({level:1}).find(".execdate").html()),
                pyear:"2017",
                pmonth:"5",
                pday:"3",
                phour:"8",
                pminute:"0",
                psecond:"0",
                usedate:"pdate"
            });
        });
    },1000);
    $("#ttrials tbody tr").on("click",".liotp",function(){
        console.log("trid");
        $("#ttrials tbody tr").removeClass("selected");
        selected = $(this).stairUp({level:5});
        selected.addClass("selected");
        trid = selected.attr("trid");
        console.log("trid",trid);
        $("#dialogotp").modal();
    });
    $("#sendotp").click(function(){
        that = $(this);
        myid = $("#ttrials tbody tr.selected").attr("trid");
        console.log("Anda membandingkan otp",myid,$("#otp").val());
        $.ajax({
            url:'/ptrials/compareotp',
            data:{id:myid,otp:$("#otp").val()},
            type:'post'
        })
        .done(function(res){
            console.log("compareotp success",res);
            that.stairUp({level:2}).modal("hide");
        })
        .fail(function(err){
            console.log("compareotp failed",err);
        });
    });
}(jQuery))