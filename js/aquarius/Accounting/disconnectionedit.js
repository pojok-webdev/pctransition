(function($){
	$('.makePermanent').click(function(){
		$.ajax({
			url:thisdomain+'disconnections/update',
			data:{id:$('#disconnection_id').val(),disconnectiontype:"3"},
			type:'post',
			async:false,
		}).done(function(data){
			$.ajax({
				url:thisdomain+'disconnections/sendemail',
				data:{id:$('#disconnection_id').val(),clientName:"SomSet",disconnectionType:"Permanent",cc:[{"1":"pw.prayitno@yahoo.co.id","2":"block_u_its_167@yahoo.com"}]},
				type:'post',
				async:false
			}).done(function(data){
				$(this).showModal({
					modalElement:$('#dModal'),
					message:'Status Diskoneksi sudah dijadikan Permanen ...'
				});
			});
		}).fail();
	});
	$('.reactivation').click(function(){
		$.ajax({
			url:thisdomain+'disconnections/update',
			data:{id:$('#disconnection_id').val(),disconnectiontype:"0"},
			type:'post',
			async:false,
		}).done(function(data){
			$.post(thisdomain+'disconnections/sendemail',{id:$('#disconnection_id').val(),clientName:"Sommerset",disconnectionType:"Reaktifasi",cc:[{"1":"pw.prayitno@yahoo.co.id","2":"block_u_its_167@yahoo.com"}]}).fail(function(){
				alert('perubahan ke Reaktivasi tidak dapat mengirimkan email');
			}).done(function(data){
				$(this).showModal({
					modalElement:$('#dModal'),
					message:'Status Diskoneksi sudah dijadikan Aktif kembali ...'
				});
			});
		}).fail();
	});

}($));
