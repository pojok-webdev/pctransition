getfields = function(){
    $.ajax({
        url:'../pusers/getjsonfields',
        dataType:'json'
    })
    .done(function(res){
        field = [];
        $.each(res,function(a,b){
            $.each(b,function(x,y){
                console.log("Y",x,y);
                if(x==='bVisible'){
                    obj = new Object();
                    obj.bVisible = y;
                }
                if(x==='sWidth'){
                    obj.sWidth = y;
                }
                field.push(obj)
            })
        });
        field.push(null);
        console.log("stringify field",JSON.stringify(field));
        $("#tusers").dataTable({
            "aoColumns":field
        });
    })
    .fail(function(err){
        console.log("Err",err);
    });
}
$("#tusers").on("click",".btn_member",function(){
    tr = $(this).stairUp({level:4});
    $("#tusers tbody tr").removeClass("selected");
    tr.addClass("selected");
    id = tr.attr("myid");
    $.ajax({
        url:'/pusers/getmembers/'+id,
        dataType:'json'
    })
    .done(function(res){
        $("#tmembers tbody tr").remove();
        $.each(res,function(x,y){
            console.log(x,y.name,y.email);
            $("#tmembers tbody").prepend("<tr><td>"+y.name+"</td><td>"+y.email+"</td><td></td></tr>");
        });
    })
    .fail(function(err){
        console.log("Err",err);
    });
    $("#dMembers").modal();
});
$("#tusers").on("click",".btn_remove",function(){
    tr = $(this).stairUp({level:4});
    myid = tr.attr("myid");
    username = tr.find(".username").html();
    $("#confirmationtitle").html("Penghapusan User");
    $("#toremove").html(username);
    $("#tusers tbody tr").removeClass("selected");
    tr.addClass("selected");
    $("#dConfirmation").modal();
})
$("#btnyesremove").click(function(){
    myid = $("#tusers tbody tr.selected").attr("myid");
    $.ajax({
        url:'/pusers/remove/'+myid,
    })
    .done(function(res){
        console.log("Success remove user",res);
        $("#tusers tbody tr.selected").remove();
    })
    .fail(function(err){
        console.log("Error remove user",err);
    })
});
$(".closemodal4").click(function(){
    $(this).stairUp({level:4}).modal("hide");
});
getfields();
startDataTable = function(){
    $("#table").dataTable({
        "bAutoWidth":true,
        "aaSorting":[[7,'desc']],
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
                {"bVisible":false},
                null
        ]
    });
}