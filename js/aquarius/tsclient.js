(function($){
	$('#tClient').dataTable({
		"aLengthMenu":[[5,10,30,-1],[5,10,30,'Semua']],
		"bPaginate":true,
		"bFilter":true
	});
	$('#btn_edit').click(function(){
		myid = $(this).parent().attr('clientid');
		window.location.href = thisdomain+'clients/edit/'+$(this).parent().attr('clientid');
	});
	$('#tClient').on('click','tr .btnviewdetail',function(){
		window.location.href = thisdomain+'clients/edit/'+$(this).stairUp({level:4}).attr('rowid');
	});
	$('#tClient').on('click','tr .btnviewsite',function(){
		window.location.href = thisdomain+"client_sites/index/"+$(this).stairUp({level:4}).attr('rowid');
	});
	$('#tClient').on('click','tr .btnAddAlias',function(){
		var id=$(this).stairUp({level:4}).attr('rowid');
		$('#tClient tbody tr').removeClass('selected');
		$(this).stairUp({level:4}).addClass('selected');
		$.ajax({
			url:thisdomain+'clients/getJson/'+id,
			type:'get',
			dataType:'json'
		})
		.done(function(res){
			console.log('RES ALIAAAS',res.alias);
			$('#alias').val(res.alias);
			$('#myAliasModalLabel').html('Penambahan Alias '+res.name);
			$('#dAddAlias').modal();
		});
		
	});
	$('#btnSaveAlias').click(function(){
		var myid=$('#tClient tbody tr.selected').attr('rowid');
		$.ajax({
			url:thisdomain+'clients/update',
			data:{id:myid,alias:$('#alias').val()},
			type:'post'
		})
		.done(function(res){
			$('#tClient tbody tr.selected .alias').html($('#alias').val());
			console.log('RES',res);
			$('#dAddAlias').modal('hide');
		});
	});
	$('.closemodal').click(function(){
		$(this).stairUp({level:4}).modal('hide');
	});
}(jQuery))
