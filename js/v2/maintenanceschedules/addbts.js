$( "#txtbts" ).autocomplete({
    source: "/pbtses/feed",
    minLength: 2,
    focus:function(event,ui){
        $("#txtbts").val(ui.item.label);
        return false;
    },
    select:function(event,ui){
        console.log("Label dipilih",ui.item.label);
        $("#txtbts").val(ui.item.label);
        $("#txtidbts").val(ui.item.value);
        return false;
    }
})
$(".dtpicker").datepicker({
    dateFormat:"dd/mm/yy"
});
$("#btnsavebts").click(function(){
    objdate = $("#maintenance_date").datepicker("getDate");
    month = parseInt(objdate.getMonth())+1;
    dateString = objdate.getFullYear() + "-" + month + "-" + objdate.getDate();
    $.ajax({
        url:"/pmaintenanceschedules/savemaintenance",
        data:{
                bts_id:$("#txtidbts").val(),
                maintenance_type:"bts",
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