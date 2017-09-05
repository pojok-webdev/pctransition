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
        $("#client_site_id").val(ui.item.value);
        return false;
    }
})
$(".dtpicker").datepicker({
    dateFormat:"dd/mm/yy"
});
$("#btnsaveclient").click(function(){
    objdate = $("#maintenance_date").datepicker("getDate");
    console.log("Objdate",objdate);
    month = parseInt(objdate.getMonth())+1;
    dateString = objdate.getFullYear() + "-" + month + "-" + objdate.getDate() 
        + " " + $("#maintenance_hour").val()+":"+$("#maintenance_minute").val()+":00";
    console.log("datestring",dateString);
    $.ajax({
        url:"/pmaintenanceschedules/savemaintenance",
        data:{
                client_site_id:$("#client_site_id").val(),
                maintenance_type:"pelanggan",
                period_type:$("#period_type").val(),
                ispayable:$("#ispayable").val(),
                description:$("#txtdescription").val(),
                mdatetime:dateString,
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
solusi = $('.myeditor')
    .cleditor({width:'500',height:'100',controls:"bold italic underline | color highlight removeformat | bullets numbering"});