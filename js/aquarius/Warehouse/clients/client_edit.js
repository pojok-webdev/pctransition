(function($){
	console.log('this file invoked');
	$('#site').dataTable({
		bFilter:false,
		bSort:false,
		bPaginate:false,
//		bInfo:false,
		bLengthChange:false,
		bAutoWidth:false
	});
	$('#btnsave').click(function(){
		$('.inp_client').makekeyvalparam();
		$.ajax({
			url:thisdomain+'clients/update',
			type:'post',
			data:JSON.parse('{"id":"'+$("#client_id").val()+'",'+$('.inp_client').attr('keyval')+'}')
		}).done(function(data){
			$('#dModal').modal().hideafter(1000);
		}).fail(function(){
			alert("Tidak dapat mengupdate Pelanggan, silakan hubungi Developer");
		});
	});
	$('#picAdd').click(function(){
		$('#pic_hp').val('');
		$('#pic_email').val('');
		$('#pic_position').val('');
		$('#pic_name').val('');
		$('#btnupdatepic').hide();
		$('#btnsavepic').show();		
		$('#addPICDialog').modal();
	});
	$('#btnsavepic').click(function(){
		$('.inp_pic').makekeyvalparam();
		$.ajax({
			url:thisdomain+'pics/save',
			data:JSON.parse('{'+$('.inp_pic').attr('keyval')+',"createuser":"'+$('#username').val()+'"}'),
			type:'post'
		}).fail(function(){
			alert("tidak dapat menambahkan PIC, silakan hubungi Developer");
		}).done(function(data){
			$('#tblPIC tbody').append('<tr myid="'+data+'"><td>'+$('#pic_name').val()+'</td><td>'+$('#pic_position').val()+'</td><td>'+$('#pic_email').val()+'</td><td>'+$('#pic_hp').val()+'</td><td><span class="rmPIC pointer">Hapus</span></td></tr>');
			$('.rmPIC').on('click',function(){
				thisrow = $(this).stairUp({level:2});
				$.ajax({
					url:thisdomain+'pics/remove',
					data:{id:data},
					type:'post'
				}).fail(function(){
					alert('Tidak dapat menghapus PIC, silakan hubungi Developer');
				}).done(function(rmdata){
					thisrow.hide();
					$(this).showModal({
						title:"Konfirmasi Penghapusan",
						element:"dModal",
						message:"PIC sudah dihapus",
						expire:1000
					});
				});
			});
		});;
	})
	$('.closemodal').click(function(){
		$(this).stairUp({level:4}).modal('hide');
	});
	$('.rmPIC').click(function(){
		thisrow = $(this).stairUp({level:2});
		thisid = thisrow.attr('myid');
		$.ajax({
			url:thisdomain+'pics/remove',
			data:{id:thisid},
			type:'post'
		}).fail(function(){
			alert('Tidak dapat menghapus PIC, silakan hubungi Developer');
		}).done(function(rmdata){
			thisrow.hide();
			$(this).showModal({
				title:"Konfirmasi Penghapusan",
				element:"dModal",
				message:"PIC sudah dihapus",
				expire:1000
			});
		});
	});
	$('.editPIC').click(function(){
		var tr = $(this).stairUp({level:2}),
			trid = tr.attr('myid');
			$('#tblPIC tbody tr').removeClass('selected');
			tr.addClass('selected');
			$('#pic_name').val($('#tblPIC tbody tr.selected td.picname').html());
			$('#prole').select_text($('#tblPIC tbody tr.selected td.picrole').html());
			$('#pic_email').val($('#tblPIC tbody tr.selected td.picemail').html());
			$('#pic_hp').val($('#tblPIC tbody tr.selected td.pictelphp').html());
			$('#btnupdatepic').show();
			$('#btnsavepic').hide();
		$('#addPICDialog').modal();
	});
	$('#btnupdatepic').click(function(){
		$('.inp_pic').makekeyvalparam();
		console.log('keyvalparamn',$('.inp_pic').attr('keyval'));
		$.ajax({
			url:thisdomain+'pics/update',
			data:JSON.parse('{"id":"'+$('#tblPIC tbody tr.selected').attr('myid')+'",'+$('.inp_pic').attr('keyval')+'}'),
			type:'post',
			success:function(){
				$('#tblPIC tbody tr.selected td.picname').html($('#pic_name').val());
				$('#tblPIC tbody tr.selected td.picrole').html($('#pic_position').val());
				$('#tblPIC tbody tr.selected td.picemail').html($('#pic_email').val());
				$('#tblPIC tbody tr.selected td.pictelphp').html($('#pic_hp').val());
				console.log('berhasil mengupdate');
			},
			error:function(err){
				console.log('error mengupdate',err);
			}
		});
	});
	$('.btneditclientsite').click(function(){
		window.location.href = thisdomain+'client_sites/edit/'+$(this).stairUp({level:4}).attr("rowid");
	});
	$('.btneditsite').click(function(){
		var id = $(this).stairUp({level:4}).attr('siteid');
		console.log('id',id);
		$.ajax({
			url:thisdomain+'client_sites/getobjbyid/'+id,
			dataType:'json',
			success:function(dat){
				console.log('dat',dat);
				$('#city').val(dat.city);
				$('#siteaddress').val(dat.address);
				$('#btnupdatesite').show();
				$('#btnsavesite').hide();
				$('#addSiteDialog').modal();
			}
		});
	});
	$('#btnsavesite').click(function(){
		var myid = $('#site tbody tr.selected').attr('rowid');
		$('#inp_site').makekeyvalparam();
		$.ajax({
			url:thisdomain+'client_site/update',
			data:JSON.parse('{"id":"'+myid+'",'+$('#inp_site').attr('keyval')+'}'),
		});
	});
}(jQuery));
