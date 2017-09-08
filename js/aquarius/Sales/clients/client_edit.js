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
	var mysites = $("#mySites");
$('.extrachild').hide();
$("#mySites").on("click","tr td.expander",function(){
	var _this = $(this),tr = $(this).stairUp({level:1}).next();
	$('.extrachild').hide();
	$('.expander').find('span').removeClass('isw-minus');
	$('.expander').find('span').addClass('isw-plus');
	if(tr.hasClass('shown')){
		tr.hide();
		tr.removeClass('shown');
		_this.find('span').removeClass('isw-minus');
		_this.find('span').addClass('isw-plus');
	}else{
		tr.show();
		tr.addClass('shown');
		_this.find('span').removeClass('isw-plus');
		_this.find('span').addClass('isw-minus');
	}
});
	$("#btnAddSite").click(function(){
		$('#city').val("");
		$('#siteaddress').val("");
		$('#btnupdatesite').hide();
		$('#btnsavesite').show();
		$("#addSiteDialog").modal();
	});
	$('#mySites').on('click','.btnaddservice',function(){
		$('.clientsites').removeClass('selected');
		var siteid = $(this).stairUp({level:4}).attr('rowid');
		$(this).stairUp({level:4}).addClass('selected');
		$('#btnupdateservice').hide();
		$('#btnsaveservice').show();
		$('#myAddServiceModalLabel').html("Penambahan Layanan");
		$('#addServiceDialog').modal();
	});
	$('#mySites').on('click','.tService .btneditservice',function(){
		$('.clientsites').removeClass('selected');
		var siteid = $(this).stairUp({level:8}).prev().attr('rowid'),
			service = $(this).stairUp({level:4}),
			service_id = service.attr('rowid');
		console.log('siteid',siteid);
		console.log('service_id',service_id);
		$(this).stairUp({level:8}).prev().addClass('selected');
		$('.tService tr').removeClass('selected');
		service.addClass('selected');
		$('#btnupdateservice').show();
		$('#btnsaveservice').hide();
		$('#servicename').val(service.find(".servicename").html());
		$('#myAddServiceModalLabel').html("Edit Layanan");
		$('#addServiceDialog').modal();
	});
	$('#btnsaveservice').click(function(){
		$.ajax({
			url:'/clientservices/save',
			data:{"name":$("#servicename").val(),"client_site_id":$('.clientsites.selected').attr('rowid')},
			type:"post",
			success:function(data){
				var tr = '<tr rowid='+data+'>';
					tr+= '<td class="servicename">'+$('#servicename').val()+'</td>';
					tr+= '<td>';
					tr+= '<div class="btn-group">';
					tr+= '<button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span></button>';
					tr+= '<ul class="dropdown-menu pull-right">';
					tr+= '<li class="btneditservice pointer"><a>Edit Layanan</a></li>';
					tr+= '<li class="btnremoveservice pointer"><a>Hapus Layanan</a></li>';
					tr+= '</ul>';
					tr+= '</div>';
					tr+= '</td>';
					tr+= '</tr>';
				$('.clientsites.selected').next().find('.tService tbody').prepend(tr);
				console.log('data',data);
			},
			error:function(err){
				console.log('error',err);
			}
		});
	});
	$('#btnupdateservice').click(function(){
		$.ajax({
			url:'/clientservices/update',
			data:{"name":$("#servicename").val(),"id":$(".tService tr.selected").attr("rowid")},
			type:"post",
			success:function(data){
				var tr = '';
					tr+= '<td class="servicename">'+$('#servicename').val()+'</td>';
					tr+= '<td>';
					tr+= '<div class="btn-group">';
					tr+= '<button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span></button>';
					tr+= '<ul class="dropdown-menu pull-right">';
					tr+= '<li class="btneditservice"><a>Edit</a></li>';
					tr+= '</ul>';
					tr+= '</div>';
					tr+= '</td>';
					tr+= '';
				$(".tService tbody tr.selected").html(tr);
			}
		});
	});
	$("#mySites .tService tbody").on("click",".btnremoveservice",function(){
		$('.clientsites').removeClass('selected');
		var siteid = $(this).stairUp({level:8}).attr('rowid'),
			service = $(this).stairUp({level:4}),
			service_id = service.attr('rowid');
		$(this).stairUp({level:8}).addClass('selected');
		$('#tService tbody tr').removeClass('selected');
		service.addClass('selected');
		$("#confirmModalLabel").html("Konfirmasi penghapusan layanan");
		$("#dConfirmation").modal();
	})
	$("#btnConfirmYes").click(function(){
		switch($("#confirmModalLabel").html()){
			case "Konfirmasi penghapusan layanan":
			$.ajax({
				url:thisdomain+"clientservices/remove",
				data:{id:$('.tService tbody tr.selected').attr('rowid')},
				type:'post',
				success:function(){
					$('.tService tbody tr.selected').remove();
				},
				error:function(err){
					console.log("tidak dapat menghapus layanan",err);
				}
			});
			break;
			case "Konfirmasi penghapusan cabang":
			$.ajax({
				url:thisdomain+"client_sites/remove",
				data:{id:$('#mySites tbody tr.selected').attr('rowid')},
				type:'post',
				success:function(){
					$('#mySites tbody tr.selected').remove();
				},
				error:function(err){
					console.log("tidak dapat menghapus cabang",err);
				}
			});
			break;
		}
	});
	$('#btnsave').click(function(){
		$('.inp_client').makekeyvalparam();
		$.ajax({
			url:'/clients/update',
			type:'post',
			data:JSON.parse('{"id":"'+$("#client_id").val()+'",'+$('.inp_client').attr('keyval')+'}')
		}).done(function(data){
			$('#dModal').modal().hideafter(1000);
		}).fail(function(err){
			console.log("Err",err);
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
			url:'/../../pics/save',
			data:JSON.parse('{'+$('.inp_pic').attr('keyval')+',"createuser":"'+$('#username').val()+'"}'),
			type:'post'
		}).fail(function(err){
			console.log("Err save pic",err);
		}).done(function(data){
			$('#tblPIC tbody').append('<tr myid="'+data+'"><td>'+$('#pic_name').val()+'</td><td>'+$('#pic_position').val()+'</td><td>'+$('#pic_email').val()+'</td><td>'+$('#pic_hp').val()+'</td><td><span class="rmPIC pointer">Hapus</span></td></tr>');
			$('.rmPIC').on('click',function(){
				thisrow = $(this).stairUp({level:2});
				$.ajax({
					url:'/pics/remove',
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
			url:'/pics/remove',
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
			$('#prole').select_text({"compared":$('#tblPIC tbody tr.selected td.picrole').html(),"casesensitif":false});
			$('#pic_email').val($('#tblPIC tbody tr.selected td.picemail').html());
			$('#pic_hp').val($('#tblPIC tbody tr.selected td.pictelphp').html());
			$('#btnupdatepic').show();
			$('#btnsavepic').hide();
		$('#addPICDialog').modal();
	});
	$('#btnupdatepic').click(function(){
		$('.inp_pic').makekeyvalparam();
		console.log('keyvalparamn',$('.inp_pic').attr('keyval'));
		console.log("myid",$('#tblPIC tbody tr.selected').attr('myid'));
		$.ajax({
			url:'/pics/update',
			data:JSON.parse('{"id":"'+$('#tblPIC tbody tr.selected').attr('myid')+'",'+$('.inp_pic').attr('keyval')+'}'),
			type:'post',
			success:function(){
				$('#tblPIC tbody tr.selected td.picname').html($('#pic_name').val());
				$('#tblPIC tbody tr.selected td.picrole').html($('#prole :selected').text());
				$('#tblPIC tbody tr.selected td.picemail').html($('#pic_email').val());
				$('#tblPIC tbody tr.selected td.pictelphp').html($('#pic_hp').val());
				console.log('berhasil mengupdate',$('#tblPIC tbody tr.selected').attr('myid'));
			},
			error:function(err){
				console.log('error mengupdate',err);
			}
		});
	});
	$('.btneditclientsite').click(function(){
		window.location.href = '/client_sites/edit/'+$(this).stairUp({level:4}).attr("rowid");
	});
	$('#mySites').on('click','.btneditsite',function(){
		var id = $(this).stairUp({level:4}).attr('rowid');
		$('#mySites tbody tr').removeClass('selected');
		$(this).stairUp({level:4}).addClass('selected');
		console.log('id',id);
		$.ajax({
			url:'/client_sites/getobjbyid/'+id,
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
		$('.inp_site').makekeyvalparam();
		$.ajax({
			url:'/client_sites/save',
			data:JSON.parse('{'+$('.inp_site').attr('keyval')+'}'),
			type:'post',
			success:function(data){
				var tr = '';
				tr+='<tr class="clientsites" rowid='+data+'>';
				tr+='					<td class="expander"><span class="isw-plus"></span></td>';
				tr+='					<td class="clientaddress">'+$('#siteaddress').val()+''+$('#city').val()+'</td>';
				tr+='					<td>';
				tr+='						<div class="btn-group">';
				tr+='							<button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span></button>';
				tr+='							<ul class="dropdown-menu pull-right">';
				tr+='								<li class="btneditsite pointer"><a>Edit Cabang</a></li>';
				tr+='								<li class="btnremovesite pointer"><a>Hapus Cabang</a></li>';
				tr+='								<li class="btnaddservice pointer"><a>Tambah Layanan</a></li>';
				tr+='							</ul>';
				tr+='						</div>										';
				tr+='					</td>';
				tr+='				</tr>';
				
				
					tr+='			<tr class="extrachild" style="display:none">';
					tr+='			<td></td>';
					tr+='			<td>';
					tr+='				<table class="table tService bordered" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
					tr+='					<thead><th>Layanan</th><th>Aksi</th></thead>';
					tr+='					<tbody>';
					tr+='					</tbody>';
					tr+='				</table>';
					tr+='			</td><td></td>';
					tr+='			</tr>';
				$('#mySites tbody').append(tr);
			},
			error:function(err){
				console.log('error',err);
			}
		});
	});
	$('#btnupdatesite').click(function(){
		var myid = $('#mySites tbody tr.selected').attr('rowid');
		$('.inp_site').makekeyvalparam();
		$.ajax({
			url:'/client_sites/update',
			data:JSON.parse('{"id":"'+myid+'",'+$('.inp_site').attr('keyval')+'}'),
			type:'post',
			success:function(){
				$('#mySites tbody tr.selected td.clientaddress').html($('#siteaddress').val()+' '+$('#city').val());
			}
		});
	});
	$('#mySites').on('click','.btnremovesite',function(){
		$("#confirmModalLabel").html("Konfirmasi penghapusan cabang");
		$('.clientsites').removeClass('selected');
		$(this).stairUp({level:4}).addClass('selected');
		$("#dConfirmation").modal();
	});
}(jQuery));
