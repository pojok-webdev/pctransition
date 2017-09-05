(function($){
	$(".btn_addantenna").click(function(){
		$('.updateantenna').hide();
		$("#saveantenna").show();
		$("#dAntenna").modal();
	});
	$("#tblantennas").on("click",".edit_antenna",function(){
		$("#tblantennas tbody tr").removeClass('selected');
		$(this).stairUp({level:4}).addClass('selected');
		$.ajax({
			url:thisdomain+'install_antennas/getbyid',
			data:{id:$('#install_site_id').val()},
			type:'post',
			dataType:'json',
			success:function(data){
				$('#tipe_antenna option').each(function(){
					if($(this).text() === data['name']){
						$(this).attr('selected','selected');
					}
				});
				$('#antenna_location').val(data['location']);
				$("#saveantenna").hide();
				$("#updateantenna").show();
				$("#dAntenna").modal();
			},
			error:function(err){
				console.log(err);
			}
		});
	});
	$("#tblantennas").on("click",".remove_antenna",function(){
		var selected = $(this).stairUp({level:4});
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"install_sites/delete_antenna",
			idElement:selected.attr("myid"),
			selectedElement:selected,
			totalElement:"total_antenna",
			tableElement:"tblantennas",
		});
	});
	$("#updateantenna").click(function(){
		$.ajax({
			url:thisdomain+'install_antennas/update',
			data:{
				id:$("#tblantennas tbody tr.selected").attr('myid'),
				name:$("#tipe_antenna :selected").text(),
				location:$("#antenna_location").val(),
				createuser:$("#createuser").val()},
			type:'post',
			dataType:'json',
			success:function(data){
				$("#tblantennas tbody tr.selected").find(".info").html('Location:'+$("#antenna_location").val());
				$("#tblantennas tbody tr.selected").find(".antenna_name").html($("#tipe_antenna :selected").text());
			},
			error:function(err){
				
			}
		});
	});
	$("#saveantenna").click(function(){
		$.post(thisdomain+'install_sites/add_antenna',{install_site_id:$('#workplace').attr('install_site_id'),name:$("#tipe_antenna :selected").text(),location:$("#antenna_location").val(),createuser:$("#createuser").val()}).fail(function(){
			alert("Tidak dapat menyimpan Antenna, silakan hubungi Developer");
		}).done(function(data){
			var tr = '';
			tr = '<tr myid='+data+'>';
			tr+= '<td>'+$('#tipe_antenna :selected').text()+'</td>';
			tr+= '<td class="info"><a>Lokasi: '+$('#antenna_location').val()+'</a> <span></td>';
			tr+= '<td><div class="btn-group">';
			tr+= '<button data-toggle="dropdown" class="btn btn-small dropdown-toggle"  > Aksi <span class="caret"></span></button>';
			tr+= '<ul class="dropdown-menu pull-right">';
			tr+= '<li class="edit_antenna pointer"><a>Edit</a></li>';
			tr+= '<li class="divider"></li>';
			tr+= '<li class="remove_antenna pointer"><a>Hapus</a></li>';
			tr+= '</ul>';
			tr+= '</div></td></tr>';
			$('#tblantennas').append(tr);
			$("#total_antenna").html($("#tblantennas").rowcount());
			update_rowcount($("#total_antenna"),$("#tblantennas tbody tr"));
		});
		$("#dAntenna").modal("hide");
	});
}(jQuery))
