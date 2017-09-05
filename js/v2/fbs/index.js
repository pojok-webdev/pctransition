$("#tFbs").dataTable();
$("#tFbs").on("click",".btncancelfb",function(){
    _this = $(this);
    mynofb = $(this).stairUp({level:5}).find(".nofb").html();
    $.ajax({
        url:'/pfbses/update/',
        data:{nofb:mynofb,status:'2'},
        type:"post"
    })
    .done(function(data){
        _this.stairUp({level:5}).find(".status").html("Canceled");
        console.log("fb updated",data);
    })
    .fail(function(err){
        console.log("error update fb",err);
    });
})
$("#tFbs").on("click",".btnsetvalidfb",function(){
    mynofb = $(this).stairUp({level:5}).find(".nofb").html();
    $.ajax({
        url:'/pfbses/update/',
        data:{nofb:mynofb,status:'1'},
        type:"post"
    })
    .done(function(data){
        _this.stairUp({level:5}).find(".status").html("Valid");
        console.log("fb updated",data);
    })
    .fail(function(err){
        console.log("error update fb",err);
    });
})
$("#tFbs").on("click",".btnsetignorefb",function(){
    mynofb = $(this).stairUp({level:5}).find(".nofb").html();
    $.ajax({
        url:'/pfbses/update/',
        data:{nofb:mynofb,status:'0'},
        type:"post"
    })
    .done(function(data){
        _this.stairUp({level:5}).find(".status").html("Ignore");
        console.log("fb updated",data);
    })
    .fail(function(err){
        console.log("error update fb",err);
    });
})

