$( "#txtdatacenter" ).autocomplete({
    source: "/pdatacenters/feed",
    minLength: 2,
    focus:function(event,ui){
        $("#txtdatacenter").val(ui.item.label);
        return false;
    },
    select:function(event,ui){
        console.log("Label dipilih",ui.item.label);
        $("#txtdatacenter").val(ui.item.label);
        $("#txtiddatacenter").val(ui.item.value);
        return false;
    }
})
$(".dtpicker").datepicker({
    dateFormat:"dd/mm/yy"
});
$("#btnsavedatacenter").click(function(){
    objdate = $("#maintenance_date").datepicker("getDate");
    month = parseInt(objdate.getMonth())+1;
    dateString = objdate.getFullYear() + "-" + month + "-" + objdate.getDate();    
    $.ajax({
        url:"/pmaintenanceschedules/savemaintenance",
        data:{
                datacenter_id:$("#txtiddatacenter").val(),
                maintenance_type:"datacenter",
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