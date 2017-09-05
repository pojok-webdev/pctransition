(function($){
	$("#btnsave").click(function(){
		$('.inp_disconnection').makekeyvalparam();
		$.ajax({
			url:thisdomain+'disconnections/update',
			data:JSON.parse('{'+$('.inp_disconnection').attr('keyval')+'}'),
			type:"post",
		}).done(function(data){
			$(this).showModal({
				message:"Data telah tersimpan ",
			});
		}).fail(function(){
			alert("Tidak dapat menyimpan Reaktifasi, silakan hubungi Developer");
		});
	});
}(jQuery));
