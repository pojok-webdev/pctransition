(function($){
	console.log("PadiNET15122016");
	$(".installSave").click(function(){
		clientstatus = $(this).attr('clientstatus');
		installstatus = $(this).attr('installstatus');
		$(".installrequest").makekeyvalparam();
		$.ajax({
			url:thisdomain+'install_requests/update',
			data:JSON.parse('{"id":"'+$('#workplace').attr('install_id')+'","status":"'+installstatus+'",'+$('.installrequest').attr('keyval')+'}'),	
			type:'post',
			async:false
		}).done(function(data){
			$.post(thisdomain+'clients/update',{id:$('#workplace').attr('client_id'),status:clientstatus,active:'1'}).fail(function(){
				alert('Update status client tidak berhasil');
			}).done(function(){
			});
		}).fail(function(){
			alert('tidak bisa update install request');
		});
		
		$('.installsite').makekeyvalparam();
		alert($('.installsite').attr('keyval'));
		$.ajax({
			url:thisdomain+'install_sites/update',
			data:JSON.parse('{'+$(".installsite").attr("keyval")+'}'),
			/*data:{
				id:$('#workplace').attr('install_id'),
				pic:$('#pic_name').val(),
				pic_position:$('#pic_position').val(),
				phone_area:$('#pic_phone_area').val(),
				phone:$('#pic_phone').val(),pic_email:$('#pic_email').val(),
				permit:$('#permit :selected').val(),
				install_date:$('#install_date').getdate().addhour($('#hour')).addminute($('#minute')).attr('datetime'),//changeformat($('#install_date').val()),
				description:$('#description').val(),
				status:installstatus},*/
			type:'post',
			async:false
		}).done(function(data){
			switch(installstatus){
				case '5':
					$('#installstatus').text('Sudah selesai');
				break;
				case '3':
					$('#installstatus').text('Belum selesai');
				break;
			}
			$('#dModal').modal().hideafter(1000);
		}).fail(function(){
			alert('tidak bisa update install sites');
		});
	});
}(jQuery))
