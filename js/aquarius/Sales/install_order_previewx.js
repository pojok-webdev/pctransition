(function($){
	$('#preview_save').click(function(){
		$('.installrequest').makekeyvalparam();
		$('.installsite').makekeyvalparam();
		$.ajax({
			url:thisdomain+'install_requests/save',
			data:JSON.parse('{'+$('.installrequest').attr('keyval')+'}'),
			type:'post'
		}).done(function(install_request_id){
			$.ajax({
				url:thisdomain+'install_sites/save',
				data:JSON.parse('{"install_request_id":"'+install_request_id+'",'+$('.installsite').attr('keyval')+'}'),
				type:'post'
			}).done(function(){
				$(this).showModal({
					element:'dModal',
					message : 'Data sudah tersimpan',
				});
				$('#preview_save').attr('disabled','disabled');
				window.location.href = thisdomain+'install_requests/index/all';
			}).fail(function(){
				alert('Tidak dapat menyimpan site instalasi, silakan hubungi Developer');
			});			
		}).fail(function(){
			alert('Tidak dapat menyimpan site requests, silakan hubungi Developer');
		});
	});
}(jQuery))
