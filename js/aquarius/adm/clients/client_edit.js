(function($){
	$('#editAM').click(function(){
		$('#changeAMDialog').modal();
	});
	$('#btnsaveAM').click(function(){
		$.ajax({
			url:thisdomain+'clients/update',
			data:{
				"id":$('#client_id').val(),
				"sale_id":$('#sale_id').val(),
				"user_id":$('#sale_id').val()
			},
			type:'post'
		}).done(function(res){
			console.log("Berhasil update sales",res);
			$("#amname").html($("#sale_id :selected").text());
		}).fail(function(err){
			console.log("Tidak berhasil update sales",err);
		});
	});
	$('#btnaddsite').click(function(){
		$("#addSiteDialog").modal();
	});
	$('#btnsavesite').click(function(){
		$('.inp_site').makekeyvalparam();
		$.ajax({
			url:thisdomain+'client_sites/save',
			type:'post',
			data:JSON.parse('{"client_id":"'+$('#client_id').val()+'",'+$('.inp_site').attr('keyval')+'}'),
			success:function(site){
				$.ajax({
					url:thisdomain+"client_sites/savebranch",
					data:{client_site_id:site,branches:$("#branch_id").val()},
					type:"post"					
				});
				$('#site tbody').append('<tr><td>'+$('#site_address').val()+' '+$('#site_city').val()+'</td><td>'+$('#site_pic_name').val()+'</td><td>'+$('#pic_phone').val()+'</td></tr>');
			},
			error:function(err){
				alert("err0r"+ err);
			}
		});
	});
	$('.btneditsite').click(function(){
		window.location.href = thisdomain+'client_sites/edit/'+$(this).stairUp({level:4}).attr("rowid");
	});
	$('#btnaddservice').click(function(){
		$("#addServiceDialog").modal();
	});
	$('#btnsaveservice').click(function(){
		$('.inp_service').makekeyvalparam();
		$.ajax({
			url:thisdomain+'clientservices/save',
			type:'post',
			data:JSON.parse('{"client_id":"'+$('#client_id').val()+'",'+$('.inp_service').attr('keyval')+'}'),
			success:function(site){
				$('#service tbody').append('<tr><td>'+$('#site_service').val()+'</td></tr>');
			},
			error:function(err){
				alert("err0r"+ err);
			}
		});
	});
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
		console.log($('.inp_client').attr('keyval'));
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
	$('#btnaddpic').click(function(){
		$('#pic_hp').val('');
		$('#pic_email').val('');
		$('#pic_position').val('');
		$('#pic_name').val('');
		$('#btnupdatepic').hide();
		$('#btnsavepic').show();
		$('#addPICModalLabel').html('Penambahan PIC');
		$('#addPICDialog').modal();
	});
	$('#btnsavepic').click(function(){
		$('.inp_pic').makekeyvalparam();
		$.ajax({
			url:thisdomain+'pics/save',
			data:JSON.parse('{'+$('.inp_pic').attr('keyval')+',"position":"'+$('#pic_position').val()+'","prole":"'+$('#pic_position').val()+'","telp_hp":"'+$('#pic_hp').val()+'"}'),
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
		thisrow = $(this).stairUp({level:4});
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
		thisrow = $(this).stairUp({level:4});
		thisid = thisrow.attr('myid');
		$('#tblPIC tbody tr').removeClass('selected');
		thisrow.addClass('selected');
		$('#pic_name').val(thisrow.find('td.picname').html());
		$('#pic_position').val(thisrow.find('td.picrole').html());
		$('#pic_email').val(thisrow.find('td.picemail').html());
		$('#pic_hp').val(thisrow.find('td.pictelp').html());
		$('#addPICModalLabel').html('Edit PIC');
		$('#btnupdatepic').show();
		$('#btnsavepic').hide();
		$('#addPICDialog').modal();
	});
	$('#btnupdatepic').click(function(){
		var myrow = $('#tblPIC tbody tr.selected'),myid = $('#tblPIC tbody tr.selected').attr('myid');
		$.ajax({
			url:thisdomain+'pics/update',
			data:{id:myid,name:$('#pic_name').val(),prole:$('#pic_position').val(),position:$('#pic_position').val(),telp_hp:$('#pic_hp').val(),email:$('#pic_email').val()},
			type:'post',
			success:function(){
		myrow.find('td.picname').html($('#pic_name').val());
		myrow.find('td.picrole').html($('#pic_position').val());
		myrow.find('td.picemail').html($('#pic_email').val());
		$('#pic_hp').val(thisrow.find('td.pictelp').html());
				console.log('sukses mengupdate pic');
			},
			error:function(err){
				console.log(err);
			}
		});
	});
}(jQuery));
