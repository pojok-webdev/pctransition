console.log("Application readyh");
$(".addUsage").click(function(){
    $("#dApplication").modal();
});
$("#tApplication tbody").on("click",".app_add",function(){
    app_row = $(this).stairUp({level:3});
    app_id = $(this).stairUp({level:3}).attr("myid");
    app_name = app_row.find(".operatorname").html();
    $.ajax({
        url:"../saveapplication",
        data:{maintenancereport_id:$("#maintenancereport").val(),application_id:app_id},
        type:"post"
    })
    .done(function(res){
        $("#dApplication").modal("hide");
        $(".t_usage tbody")
            .append("<tr myid="+res+"><td><a>"+app_name+"</td><td><a><span class='icon-remove pointer usage_remove'></span></a></td></tr>")
        $("#total_application").html($(".t_usage tbody tr:last").index()+1);
        console.log("Res",res);
    })
    .fail(function(err){
        console.log("Err",err);
    });
})
$(".t_usage tbody").on("click",".usage_remove",function(){
    app_row = $(this).stairUp({level:3});
    app_id = $(this).stairUp({level:3}).attr("myid");
    console.log("app_id",app_id);
    $.ajax({
        url:"../removeapplication",
        data:{
            maintenancereport_id:$("#maintenancereport").val(),
            application_id:app_id
        },
        type:"post"
    })
    .done(function(res){
        console.log("Res",res);
        app_row.hide();
        $("#total_application").html($(".t_usage tbody tr:last").index()+1);
    })
    .fail(function(err){
        console.log("Err",err);
    })
})
solusi = $('.myeditor')
    .cleditor({
        width:'300',
        height:'100',
        controls:"bold italic underline | color highlight removeformat | bullets numbering"
    });