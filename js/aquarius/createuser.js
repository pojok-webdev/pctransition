$(document).ready(function(){
	$("#btnsaveuser").click(function(){
		$.post(thisdomain+'adm/useradd',{username:$('#username').val(),password:$('#user_password').val(),email:$('#user_email').val(),fname:$('#fname').val(),lname:$('#lname').val()}).fail(function(){alert("gagal");}).done(function(data){});
		$("#dModal").modal("show");
		setTimeout(function(){$("#dModal").modal("hide");},1000);
	});
});
