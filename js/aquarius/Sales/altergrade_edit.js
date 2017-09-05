/*
 * written on 2014 by Radu
 * from PadiNET near Makam Kembang Kuning |,,,|
 * */
(function($){
	$('#demo-htmlselect').ddslick();
	$('.closemodal').click(function(){
		$(this).parent().parent().parent().parent().modal('hide');
	});
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
		$('.inp_altergrade').makekeyvalparam();
		$.post(thisdomain+'altergrades/update',JSON.parse('{"id":"'+$('#altergrade_id').val()+'",'+$('.inp_altergrade').attr('keyval')+'}')).done(function(data){
			$(this).showModal();
		}).fail(function(){
			alert('Tidak dapat mengupdate data, silakan menghubungi Developer');
		});
	});
	$("#saveReason").click(function(){
		$('.inp_altergrade').makekeyvalparam();
		$.post(thisdomain+'altergrades/update',JSON.parse('{"id":"'+$('#altergrade_id').val()+'","reason":"'+$("#reason").val()+'","status":"'+$(this).attr('status')+'",'+$('.inp_altergrade').attr('keyval')+'}')).done(function(data){

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
			data:{name:$(this).attr('officer_name'),altergrade_id:$('#workplace').attr('altergrade_id')}
		}).done(function(data){
			$('#tbl_executor tbody').append('<tr thisid='+data+'><td>'+picname+'</td><td><div class="btn-group"><button class="btn btn_executor_remove" type="button" >Hapus</button></div></td></tr>');
			$('#dAddOperator').modal('hide');
			$('#total_executor').val('Total : '+$('#tbl_executor > tbody > tr').length);
		}).fail(function(){
			alert('Tidak dapat menyimpan Operator, silakan hubungi Developer');
		});
	});

	$('.btn_executor_remove').click(function(){
		$.ajax({
			url:thisdomain+'altergrades/operatorremove',
			type:'post',
			data:{id:$(this).parent().parent().parent().attr('thisid')}
		});
	});
}(jQuery));
