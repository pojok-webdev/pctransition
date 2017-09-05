(function($){
	console.log("invoked");
	$('#site').dataTable({
		bFilter:false,
		bSort:false,
		bPaginate:false,
//		bInfo:false,
		bLengthChange:false,
		bAutoWidth:false
	});
	$('.btnsave').click(function(){
		$('.inp_client').makekeyvalparam();
		$.ajax({
			url:thisdomain+'client_sites/update',
			type:'post',
			data:JSON.parse('{"id":"'+$("#client_id").val()+'",'+$('.inp_client').attr('keyval')+'}')
		}).done(function(data){
			$('#dModal').modal().hideafter(1000);
		}).fail(function(){
			alert("Tidak dapat mengupdate Pelanggan, silakan hubungi Developer");
		});
	});
	$('.closemodal').click(function(){
		$(this).stairUp({level:4}).modal('hide');
	});
	$('#btnaddservice').click(function(){
		$('#btnupdateservice').hide();
		$('#btnsaveservice').show();
		$('#addServiceDialog').modal();
	});
	$('#btnsaveservice').click(function(){
		$.ajax({
			url:thisdomain+'clientservices/save',
			data:{client_site_id:+$("#client_id").val(),name:$('#service_name').val()},
			type:'post',
			success:function(dt){
				var tr = '<tr class="servicename" trid="'+dt+'">';
				tr+='<td>'+$('#service_name').val()+'</td>';
				tr+='<td><div class="btn-group">';
				tr+='<button data-toggle="dropdown" class="btn btn-small dropdown-toggle" >Aksi <span class="caret"></span></button>';
				tr+='<ul class="dropdown-menu pull-right">'
				tr+='<li class="btneditservice"><a>Edit</a></li>';
				tr+='<li class="divider survey_save"></li>';
				tr+='<li class="btnremoveservice"><a>Hapus</a></li>';
				tr+='</ul>';
				tr+='</div></td>';
				tr+='</tr>';
				$("#service tbody").append(tr);
				console.log('save service success',dt);
			},
			error:function(err){
				console.log('error',err);
			}
		});
	});
	$('.btnremoveservice').click(function(){
		console.log('remover invoked');
		var selected = $(this).stairUp({level:4}),
			trid = $(this).stairUp({level:4}).attr('trid');
		$.ajax({
			url:thisdomain+'clientservices/remove',
			data:{id:trid},
			type:'post',
			success:function(){
				selected.remove();
				console.log('success remove service');
			},
			error:function(err){
				console.log('err',err);
			}
		});
	});
	$('.btneditservice').click(function(){
		var selected = $(this).stairUp({level:4}),
			trid = $(this).stairUp({level:4}).attr('trid');
			selected.addClass('selected');
		$.ajax({
			url:thisdomain+'clientservices/get',
			data:{id:trid},
			type:'post',
			dataType:'json',
			success:function(data){
				$('#btnupdateservice').show();
				$('#btnsaveservice').hide();
				$('#service_name').val(data.name);
				$('#addServiceDialog').modal();
				console.log('success load service');
			},
			error:function(err){
				console.log('err',err);
			}
		});
	});
	$('#btnupdateservice').click(function(){
		var selected = $('#service tbody tr.selected'),
			trid = selected.attr('trid');
		$.ajax({
			url:thisdomain+'clientservices/update',
			data:{id:trid,name:$('#service_name').val()},
			type:'post',
			success:function(){
				selected.find('td.servicename').html($('#service_name').val());
			},
			error:function(err){
				console.log("error "+trid+' '+$('#service_name').val(),err);
			}
		});
	});
}(jQuery));
