$(document).ready(function(){
	$("#answer_yes").click(function(){
		$.post(thisdomain+'prospects/edit_client',{id:urlsegment(5),has_internet_connection:'1'}).done(function(data){
			window.location.href = thisdomain+'prospects/provider_yg_digunakan/'+urlsegment(5);
		}).fail(function(){
			alert("Tidak dapat mengupdate Client, silakan hubungi Developer");
		});
	});
	
	$("#answer_no").click(function(){
		$.post(thisdomain+'prospects/edit_client',{id:urlsegment(5),has_internet_connection:'0'}).done(function(data){
			window.location.href = thisdomain+'prospects/internet_need_confirmation/'+urlsegment(5);
		}).fail(function(){
			alert("Tidak dapat mengupdate Client, silakan hubungi Developer");
		});
	});
})
