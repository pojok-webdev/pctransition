thisdomain = 'http://localhost/ace_accounting/index.php/';
$(document).ready(function(){
	$("#btnlogin").click(function(){
		$.post(thisdomain+'adm/loginhander',{username:$('#username').val(),password:$('#userpassword').val()}).done(function(data){
			if(data=='sukses'){
				window.location.href = thisdomain+'adm/index';
			};
			}).fail(function(){
				alert('Tidak dapat Login, hubungi Developer');
			});
	});
});