$(document).ready(function(){
	$('#removeAll').click(function(){
		$.post(thisdomain+'adm/removeAll').done(function(){
			alert('sukses');
		}).fail(function(){
			alert('Tidak sukses');
		});
	});
	$("#changeRole").click(function(){
		window.location.href = thisdomain+"adm/chooseRole";
	});
});
