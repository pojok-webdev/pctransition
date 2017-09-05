$(document).ready(function(){
	$("#btn_reset_password").click(function(){
		$.post(thisdomain+'adm/resetpasswordsendmail',{email:$("#email").val()}).fail(function(){alert("Tidak dapat mengirimkan email, hubungi Developer");}).done(function(data){});
		$("#dModal").modal();
	});
});
