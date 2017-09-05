(function($){
	$('#btn_save').click(function(){
		$('.inp_altergrade').makekeyvalparam();
		$.post(thisdomain+'altergrades/save',JSON.parse('{'+$('.inp_altergrade').attr('keyval')+'}')).done(function(data){
			$('#dModal').modal().hideafter(200);
		}).fail(function(){
			alert('Tidak dapat menyimpan data, silakan hubungi Developer');
		});
	});
	
}(jQuery));
