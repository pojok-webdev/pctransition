(function($){
	switch($('#disconnectiontype').val()){
		case '1':
			$('#executiondatediv').hide();
			$('#makepermanentdiv').show();
			$('#disconnectionfeediv').hide();
		break;
		case '2':
			$('#executiondatediv').hide();
			$('#makepermanentdiv').show();
			$('#disconnectionfeediv').show();
		break;
		case '3':
			$('#executiondatediv').show();
			$('#makepermanentdiv').hide();
			$('#disconnectionfeediv').hide();
		break;
	}
	$.getJSON(thisdomain+'disconnections/getData/'+$('#disconnection_id').val(),function(data){
		if(data['executed']=='1'){
			$('#executed-icon').show();
		}
		if(data['executed']=='0'){
			$('#executed-icon').hide();
		}
	});
	//alert($('#executed-icon').css('display'));
	$("#disconnectionbtnsave").click(function(){
		$('.inp_disconnection').makekeyvalparam();
		$.ajax({
			url:thisdomain+'disconnections/update/',
			type:'post',
			data:JSON.parse('{"id":"'+$("#disconnection_id").val()+'",'+$('.inp_disconnection').attr('keyval')+'}'),
		}).done(function(data){
			$("#dModal").modal().hideafter(2000);
		}).fail(function(){
			alert("Tidak dapat menyimpan ...");
		});
	});
	$('#executed').click(function(){
		if($('#executed-icon').is(":visible")){
			$.post(thisdomain+'disconnections/update',{id:$('#disconnection_id').val(),executed:'0'});
		}
		else{
			$.post(thisdomain+'disconnections/update',{id:$('#disconnection_id').val(),executed:'1',status:"1"});
		}
		$('#executed-icon').toggle();
	});
	$('.makePermanent').click(function(){
		$.post(thisdomain+'disconnections/update',{id:$('#disconnection_id').val(),disconnectiontype:'3'}).done(function(data){
			$('#makepermanentdiv').hide();
			$('#executiondatediv').show();
		}).fail(function(){
			alert('Tidak dapat menjadikan permanen, silakan hubungi Developer');
		});
	});
	$('#btnsave').click(function(){
		alert('aw');
	});
	$('.btn_addoperator').click(function(){
		$('#dAddOperator').modal();
	});
	$('.userpic').click(function(){
		officer_name=$(this).attr('officer_name');
		officer_id=$(this).attr('officer_id');
		$.ajax({
			url:thisdomain+'disconnections/officeradd/',
			type:'post',
			data:{username:$(this).attr('officer_name'),createuser:$('#createuser').val(),disconnection_id:$('#disconnection_id').val(),user_id:$(this).attr('officer_id')}
		}).done(function(data){
			$('#dAddOperator').modal('hide');
			$('#tblOperator tbody').append('<tr><td>'+officer_name+'</td><td><a><span class="icon-trash row_remove remove_operator pointer"'+officer_id+'" ></span></a></td></tr>');
			$('#total_operator').val($('#tblOperator > tbody > tr').length);
		}).fail(function(){
			alert("Tidak dapat menyimpan Operator, silakan hubungi Developer");
		});
	});
	$('.remove_operator').click(function(){
		thistr = $(this).parent().parent().parent();
		$.ajax({
			url:thisdomain+'disconnections/officerremove',
			type:'post',
			data:{id:$(this).parent().parent().parent().attr('rowid')}
		}).done(function(data){
			thistr.hide();
			$('#total_operator').val($('#tblOperator > tbody > tr').length);
		}).fail(function(){
			alert('Tidak dapat menghapus Operator, silakan hubungi Developer');
		});
	});
}(jQuery))
