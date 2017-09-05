(function($){
	$('#demo-htmlselect').ddslick();
	$('.closemodal').click(function(){
		$(this).stairUp({level:4}).modal('hide');
	});
	$('.hiddenelement').hide();
	$( "#selectable" ).selectable({
		selected:function(event,ui){
			$(this).attr('myval',$(this).find('.ui-selected').text());
			$('#dModalOperator').modal('hide');
		}
	});
	$('#reader').click(function(){
		alert($('#selectable').val());
	});
	$('.btnsave').click(function(){
		$('#downtime_hour_approximately').attr('datetime',$('#downtime_day').val()).addhour($('#downtime_hour')).addminute($('#downtime_minute'));
		$('#downtime_hour_approximately').val(($('#downtime_hour_approximately').attr('datetime')));
		$('.inp_altergrade').makekeyvalparam();
		if($('#executiontime').getdate().getjsdate().attr('jsdate')==$('#originalexecutiontime').getdate().getjsdate().attr('jsdate')){
			$.post(thisdomain+'altergrades/update',JSON.parse('{"id":"'+$('#altergrade_id').val()+'","status":"'+$(this).attr('status')+'",'+$('.inp_altergrade').attr('keyval')+'}')).done(function(data){
				$(this).showModal({message:"Data Perubahan Layanan sudah disimpan"});
			}).fail(function(){
				alert('Tidak dapat mengupdate data, silakan menghubungi Developer');
			});
		}else{
			$('#saveReason').attr('status',$(this).attr('status'));
			$('#dReason').modal();
		}
	});
	$("#saveReason").click(function(){
		$('.inp_altergrade').makekeyvalparam();
		$.post(thisdomain+'altergrades/update',JSON.parse('{"id":"'+$('#altergrade_id').val()+'","reason":"'+$("#reason").val()+'","status":"'+$(this).attr('status')+'",'+$('.inp_altergrade').attr('keyval')+'}')).done(function(data){
			$('#originalexecutiontime').val($('#executiontime').val());
		}).fail(function(){
			alert('Tidak dapat mengupdate data, silakan menghubungi Developer');
		});

	});
	$('#downtime_day').populateDay({dayNum:20,selected:8});
	$('#downtime_hour').populateHour({selected:7});
	$('#downtime_minute').populateMinute({selected:17});
	$('.btn_addoperator').click(function(){
		$('#dAddOperator').modal();
	});
	$('.userpic').click(function(){
		var picname = $(this).attr("officer_name");
		$.ajax({
			url:thisdomain+'altergrades/operatorsave',
			type:'post',
			data:{name:$(this).attr('officer_name'),altergrade_id:$('#workplace').attr('altergrade_id'),createuser:$("#createuser").val()}
		}).done(function(data){
			$('#tbl_executor tbody').append('<tr thisid='+data+'><td>'+picname+'</td><td><div class="btn-group"><button class="btn btn_executor_remove" type="button" >Hapus</button></div></td></tr>');
			$('#dAddOperator').modal('hide');
			update_rowcount($('#total_executor'),$('#tbl_executor tbody tr'));
			$('.btn_executor_remove').click(function(){
				selected = $(this).stairUp({level:3});
				$.ajax({
					url:thisdomain+'altergrades/operatorremove',
					type:'post',
					data:{id:selected.attr('thisid')}
				}).done(function(){
					selected.fadeOut(2000).remove();
					update_rowcount($('#total_executor'),$('#tbl_executor tbody tr'));
				}).fail(function(){
					alert("Tidak dapat menghapus Operator, silakan hubungi Developer");
				});
			});
		}).fail(function(){
			alert('Tidak dapat menyimpan Operator, silakan hubungi Developer');
		});
	});
	$('.btn_executor_remove').click(function(){
		selected = $(this).stairUp({level:3});
		$.ajax({
			url:thisdomain+'altergrades/operatorremove',
			type:'post',
			data:{id:selected.attr('thisid')}
		}).done(function(){
			selected.fadeOut(2000).remove();
			update_rowcount($('#total_executor'),$('#tbl_executor tbody tr'));
		}).fail(function(){
			alert("Tidak dapat menghapus Operator, silakan hubungi Developer");
		});
	});
}(jQuery));
