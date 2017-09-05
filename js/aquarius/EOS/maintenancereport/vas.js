$(".addVAS").click(function(){
    $("#dAddVAS").modal();
})
$("#tVas").on("click","tbody .vas_add",function(){
    tr = $(this).stairUp({level:3});
    myid = tr.attr("myid");
    $.ajax({
        url:'../savevas',
        data:{vas_id:myid,maintenancereport_id:$("#maintenancereport").val()},
        type:"post"
    })
    .done(function(res){
        console.log("Res",res);
        $("#t_vas tbody").append('<tr myid="'+res+'"><td><a>'+tr.find('.operatorname').html()+'</a></td><td><a><span class="icon-remove pointer vas_remove"></span></a></td></tr>');
        $("#dAddVAS").modal("hide");
        update_rowcount($("#total_vas"),$(".t_vas tbody tr"));
    })
    .fail(function(err){
        console.log("Err",err);
    });
})
$("#t_vas").on("click","tbody .vas_remove",function(){
    tr = $(this).stairUp({level:3});
    myid = tr.attr("myid");
    $.ajax({
        url:'../removevas',
        data:{vas_id:myid,maintenancereport_id:$("#maintenancereport").val()},
        type:"post"
    })
    .done(function(res){
        console.log("Res",res);
        tr.remove();
        update_rowcount($("#total_vas"),$(".t_vas tbody tr"));
    })
    .fail(function(err){
        console.log("Err",err);
    });
})