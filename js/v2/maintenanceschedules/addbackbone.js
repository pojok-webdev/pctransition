$( "#txtbackbone" ).autocomplete({
    source: "/pbackbones/feed",
    minLength: 2,
    focus:function(event,ui){
        $("#txtbackbone").val(ui.item.label);
        return false;
    },
    select:function(event,ui){
        console.log("Label dipilih",ui.item.label);
        $("#txtbackbone").val(ui.item.label);
        $("#txtidbackbone").val(ui.item.value);
        return false;
    }
})
$(".dtpicker").datepicker({
    dateFormat:"dd/mm/yy"
});
$("#btnsavebackbone").click(function(){
    objdate = $("#maintenance_date").datepicker("getDate");
    month = parseInt(objdate.getMonth())+1;
    dateString = objdate.getFullYear() + "-" + month + "-" + objdate.getDate();    
    $.ajax({
        url:"/pmaintenanceschedules/savemaintenance",
        data:{
                backbone_id:$("#txtidbackbone").val(),
                maintenance_type:"backbone",
                period_type:$("#periode_type").val(),
                ispayable:$("#ispayable").val(),
                description:$("#txtdescription").val(),
                mdatetime:dateString
             },
        type:"post"
    })
    .done(function(res){
        console.log("Res",res);
        window.location.href = "/pmaintenanceschedules";
    })
    .fail(function(err){
        console.log("Err",err);
    });
});