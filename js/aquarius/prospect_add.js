$(document).ready(function(){
	$("#btnnextdata").click(function(){
		businessfield = ($('business_type :selected').text()=='Lainnya')?$('#otherbusinesstype').val():$('#businesstype :selected').text();
		
		$.post(thisdomain+'prospects/add_client',{name:$('#name').val(),business_field:businessfield,address:$('#address').val(),city:$('#city').val(),phone_area:$('#phone_area').val(),phone:$('#phone').val(),fax_area:$('#fax_area').val(),fax:$('#fax').val()}).done(function(data){
			window.location.href = thisdomain+"prospects/add_pic/"+data;
		}).fail(function(){
			alert('Tidak dapat menyimpan prospect, silakan hubungi Developer');
		});
		
	});
});
