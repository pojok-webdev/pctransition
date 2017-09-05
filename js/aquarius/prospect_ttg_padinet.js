$(document).ready(function(){
	
	$('#btnnextdata').click(function(){
		$.post(thisdomain+'prospects/drop_client_priority',{client_id:urlsegment(5)}).fail(function(){
			alert('drop client  failed');
		});
		$.each($("#sortable li"),function(){
			$.post(thisdomain+'prospects/save_client_priority',{client_id:urlsegment(5),name:$(this).text()});
		});

		$.post(thisdomain+'prospects/edit_client',{id:urlsegment(5),known_us:$('#known_us').val(),interested:$('#interested').val(),service_interested_to:$('#service_interested_to').val(),budget:$("#budgets :selected").text(),known_us:$('#known_us').val(),implementation_target:$('#implementation_target').newdate(),follow_up:$('#next_follow_up').newdate()}).done(function(){
			$("#dModal").modal();
			setTimeout(function(){
				window.location.href=thisdomain+'prospects/';
			},1000);
			
		}).fail(function(){
			alert('Tidak dapat mengupdate Client, silakan hubungi Developer');
		});

	});
	
	$('#sortable').sortable();
	$('#sortable').disableSelection();
});
