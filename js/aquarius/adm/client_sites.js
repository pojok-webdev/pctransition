console.log("client_sites.js invoked");
$('.btnSetCabang').click(function(){
	$('#tClient tbody tr').removeClass('selected');
	$(this).stairUp({level:4}).addClass('selected');
	console.log("ID",$('#tClient tbody tr.selected').attr('myid'));
	$.ajax({
		url:thisdomain+'client_sites/getobjbyid/'+$('#tClient tbody tr.selected').attr('myid'),
		type:'get',
		dataType:'json'
	})
	.done(function(data){
		console.log('BRANCH ID',data.branch_id);
		$('#branch_id option').each(function(val){
			//console.log(key,'~',val);
			if($(this).val()===data.branch_id){
				$(this).attr('selected','selected');
			}
		});
	})
	.fail();
	$('#setBranchDialog').modal();
});
$('.closemodal').click(function(){
	$(this).stairUp({level:4}).modal('hide');
});
$('#tClient tbody').on('click',' .setBranch',function(){
	myid=$(this).stairUp({level:7}).attr('myid');
	$('#tClient tbody tr').removeClass('selected');
	$(this).stairUp({level:7}).addClass('selected')
	console.log('ID',myid);
	console.log('THISVAL',$(this).attr('value'));
	switch($(this).attr('value')){
		case '1':
		myval='Surabaya';
		break;
		case '2':
		myval='Jakarta';
		break;
		case '3':
		myval='Malang';
		break;
		case '4':
		myval='Bali';
		break;
	}
	$.ajax({
		url:thisdomain+'client_sites/set_branch',
		data:{"id":myid,"branch_id":$(this).attr('value'),"install_area":$(this).attr('value')},
		type:'post'
	})
	.done(function(data){
		console.log('DATA',data);
		$('#tClient tbody tr.selected td.branch').html(myval);
	})
	.fail(function(err){
		console.log('ERROR',err);
	});	
});
$('#btnupdatebranch').click(function(){
	console.log("ID",$('#tClient tbody tr.selected').attr('myid'));
	var id=$('#tClient tbody tr.selected').attr('myid');
	$.ajax({
		url:thisdomain+'client_sites/set_branch',
		data:{"id":id,"branch_id":$('#branch_id').val(),"install_area":$('#branch_id').val()},
		type:'post'
	})
	.done(function(data){
		console.log('DATA',data);
		$('#tClient tbody tr.selected td.branch').html($("#branch_id :selected").text());
	})
	.fail(function(err){
		console.log('ERROR',err);
	});
});
