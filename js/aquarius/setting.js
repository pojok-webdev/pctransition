$(document).ready(function(){
	console.log("document ready");
	$('#user_save').click(function(){
		$.post(thisdomain+'adm/userupdate',{id:$('#workplace').attr('user_id'),email:$('#email').val(),phone:$('#phone').val(),dob:changeformat($('#dob').val())}).done(function(data){}).fail(function(){alert('gagal edit user');});
		setTimeout(function(){
			$('#dModal').modal('hide');
		},"2000");
	});
	$('#btnchangepassword').click(function(){
		console.log("change password clicked");
		$('#dChangePassword').modal();
	});
	$('#btnsavepassword').click(function(){
		$.post(thisdomain+'users/updatepassword',{email:$('#email').val(),newpassword:$('#password').val()}).done(function(){
			alert('Password telah berganti');
		}).fail(function(){
			alert('Tidak dapat menyimpan password, silakan hubungi Developer');
		});
	});
});
changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}
