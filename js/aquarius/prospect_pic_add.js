$(document).ready(function(){
	$("#btnnextdata").click(function(){
		window.location.href = thisdomain+'prospects/subscription_confirmation/'+urlsegment(5);
	});
	
	$("#insertpic").click(function(){
		$.post(thisdomain+'prospects/pic_add_x',{client_id:urlsegment(5),name:$('#name').val(),position:$('#picposition :selected').text(),hp:$('#handphone').val(),email:$('#email').val()}).done(function(){
			$("#tblpics").append('<tr><td>'+$('#name').val()+'</td><td>'+$('#picposition :selected').text()+'</td><td>'+$('#email').val()+'</td><td>'+$('#handphone').val()+'</td></tr>');
			$('#name').val('');
			$('#handphone').val('');
			$('#email').val('');
		}).fail(function(){
			alert('Tidak dapat menyimpan PIC, silakan hubungi Developer');
		});
	});
});
