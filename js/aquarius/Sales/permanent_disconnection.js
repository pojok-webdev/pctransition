(function($){
	$("#btnsave").click(function(){
		$.post(thisdomain+'disconnections/update',{id:$('#disconnection_id').val(),disconnectiontype:'3',status:'0'}).done(function(data){
			$(this).showModal({
				message:"status diskoneksi pelanggan sudah dijadikan permanen",
				nextUrl:thisdomain+'disconnections',
			});
		}).fail(function(){
			alert('Tidak dapat menjadikan permanen, silakan hubungi Developer');
		});
	});
}(jQuery))
