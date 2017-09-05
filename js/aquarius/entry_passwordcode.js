$(document).ready(function(){
	$("#btn_reset_password").click(function(){
		$.post(thisdomain+'adm/entry_code',{kode:$("#kode").val()})
		.fail(function(){alert("Tidak dapat mengirimkan email, hubungi Developer");})
		.done(function(data){
			$("#dModal").modal();
		});
	});
	$("#btnok").click(function(){
		window.location.href = thisdomain;
	});
});
