(function($){
	$('#disconnectionbtnsave').click(function(){
		$('.inp_disconnection').makekeyvalparam();
		$.ajax({
			url:thisdomain+'disconnections/update/',
			data:JSON.parse('{'+$('.inp_disconnection').attr('keyval')+'}'),
			type:'post',
		}).done(function(){
			$(this).showModal({
				element:$('#dModal'),
				message:'Tanggal Penarikan telah disimpan',
				nexturl:thisdomain+'disconnections/',
			});			
		}).fail(function(){
			alert('Tidak dapat mengupdate Tanggal Penarikan, silakan hubungi Developer');
		});
	});
}(jQuery));
