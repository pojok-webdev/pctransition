$(document).ready(function(){
	$("#answer_yes").click(function(){
		$.post(thisdomain+'prospects/edit_client',{id:urlsegment(5),internet_demand:'1'}).done(function(){
			window.location.href = thisdomain+'prospects/ttg_padinet/'+urlsegment(5);
		}).fail(function(){
			alert('Tidak dapat mengupdate Client, silakan hubungi Developer');
		});
		
	});
	$("#answer_no").click(function(){
		$.post(thisdomain+'prospects/edit_client',{id:urlsegment(5),internet_demand:'0'}).done(function(){
			$("#dModal").modal();
		}).fail(function(){
			alert('Tidak dapat mengupdate Client, silakan hubungi Developer');
		});
		
	});
})
