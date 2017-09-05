$(document).ready(function(){
	$("#btnnextdata").click(function(){
		$.post(thisdomain+'prospects/edit_client',{id:urlsegment(5),media:$('#media :selected').text(),speed:$('#speed :selected').text(),duration:$('#duration :selected').text(),usage_period:$('#usage_period :selected').text(),user_amount:$('#internet_user :selected').text(),fee:$('#internet_fee :selected').text(),operator:$('#operator :selected').text(),end_of_contract:$('#end_date').newdate(),problems:$('#problem :selected').text()}).done(function(){
			window.location.href = thisdomain+'prospects/internet_need_confirmation/'+urlsegment(5);
		}).fail(function(){
			alert('Tidak dapat mengupdate Provider, silakan hubungi Developer');
		});
		
	});
});
