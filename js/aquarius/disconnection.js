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

	$("#btnsave").click(function(){
		$('.inp_disconnection').makekeyvalparam();
		$.ajax({
			url:thisdomain+'disconnections/save/',
			type:'post',
			data:JSON.parse('{"client_site_id":"'+$('#clientid').val()+'",'+$('.inp_disconnection').attr('keyval')+'}')
		}).done(function(data){
			$("#dModal").modal().hideafter(2000);
		}).fail(function(){
			alert("Tidak dapat menyimpan ...");
		});
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
	$('#disconnectiontype').change(function(){
		switch($(this).val()){
			case '1':
				$('#executiondate').hide();
				$('#makepermanent').show();
				$('#disconnectionfee').hide();
			break;
			case '2':
				$('#executiondate').hide();
				$('#makepermanent').show();
				$('#disconnectionfee').show();
			break;
			case '3':
				$('#executiondate').show();
				$('#makepermanent').hide();
				$('#disconnectionfee').hide();
			break;
		}
	});
	$('.makePermanent').click(function(){
		$.post(thisdomain+'disconnections/update',{id:$('#disconnection_id').val(),disconnectiontype:'3'}).done(function(data){
			$('#makepermanentdiv').hide();
			$('#executiondatediv').show();
		}).fail(function(){
			alert('Tidak dapat menjadikan permanen, silakan hubungi Developer');
		});
	});
}(jQuery))
