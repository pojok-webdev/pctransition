$(document).ready(function(){
	$(".btn_adddevice").click(function(){
		$("#dAddDevice").modal("show");
	});
	
	$("#savedevice").click(function(){
		$.post(thisdomain+'adm/troubleshootdeviceadd',{troubleshootsite_id:$('#workplace').attr("troubleshoot_id"),device_id:$('#device_id').val(),description:$('#device_description').val(),createuser:$('#workplace').attr("username")});
	});
	
	$(".closemodal").click(function(){
		$(this).parent().parent().parent().parent().parent().parent().modal("hide");
	});
	
	$("#devicetype_id").change(function(){
		
	});

$(".installsite_save").click(function(){
	
});
});
