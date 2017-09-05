console.log("Approval clicked");
makerangeapprove = function(){
    $.ajax({
        url:'/ptrials/update',
        data:{id:$("#trialsid").val(),rangeapprove:$('#approvalcombo :selected').val(),rangeapprovesent:'2'},
        type:'post'
    })
    .done(function(res){
        console.log("Res",res,$('#approvalcombo :selected').val());
    })
    .fail(function(err){
        console.log("Err",err);
    })    
}
makeextendapprove = function(){
    $.ajax({
        url:'/ptrials/update',
        data:{id:$("#trialsid").val(),extendapprove:'1'},
        type:'post'
    })
    .done(function(res){
        console.log("Res",res);
    })
    .fail(function(err){
        console.log("Err",err);
    })
}
$("#btnextendapprove").click(function(){
    makeextendapprove();
})
$("#btnrangeapprove").click(function(){
    makerangeapprove();
})