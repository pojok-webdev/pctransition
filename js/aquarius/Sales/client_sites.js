(function($){
	mytable = $('#tClient').dataTable({
		//"aoColumnDefs":[{"bSearchable":true,"bVisible":false,"aTargets":[5]}]
	});
	$(this).fieldUpdater({
		url:thisdomain+"client_sites/feedData",
		cellClass:'updatable',
		fieldName:'fieldName',
		idAttr:'myid',
		type:'get',
		enabled:true
	});
	$('.btnactivate').click(function(){
		$("#tClient tr").removeClass("selected");
		$(this).stairUp({level:4}).addClass("selected");
		myid=$(this).stairUp({level:4}).attr('myid');
		$.ajax({
			url:thisdomain+"client_sites/update",
			data:{id:myid,active:"1"},
			type:"post"
		})
		.done(function(res){
			console.log("Result",res);
			$("#tClient tr.selected .status").html("Aktif");
			$("#tClient tr.selected .btnactivate").hide();
			$("#tClient tr.selected .btninactivate").show();
		})
		.fail(function(err){
			console.log("Error",err);
		});
	});
	$('.btninactivate').click(function(){
		$("#tClient tr").removeClass("selected");
		$(this).stairUp({level:4}).addClass("selected");
		myid=$(this).stairUp({level:4}).attr('myid');
		$.ajax({
			url:thisdomain+"client_sites/update",
			data:{id:myid,active:"0"},
			type:"post"
		})
		.done(function(res){
			console.log("Result",res);
			$("#tClient tr.selected .status").html("Aktif");
			$("#tClient tr.selected .btnactivate").show();
			$("#tClient tr.selected .btninactivate").hide();
		})
		.fail(function(err){
			console.log("Error",err);
		});
	});
	$('.btneditclient').click(function(){
		id=$(this).stairUp({level:4}).attr('myid');
		window.location.href = '/client_sites/edit/'+id;
	});
	$('.btnremoveclient').click(function(){
		alert('Removeclient');
	});
	$('.btnsurvey').click(function(){
		//myid = $(this).stairUp({level:4}).attr('myid');
		myid = $(this).stairUp({level:4}).attr('clientid');
		window.location.href = '/survey_requests/add/'+myid;
	});
	$('.btninstallation').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = '/install_requests/edit/'+myid;
	});
	$('.btnupgrade').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = '/altergrades/add/'+myid;
	});
	$('.btndisconnection').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = '/disconnections/add/'+myid;
	});
	$('.btntroubleshoot').click(function(){
		window.location.href = '/troubleshoots/add_lookup';
	});
	$('.clientStatus').click(function(){
		$('.clientStatus').removeClass('selected');
		$(this).addClass('selected');
		$(this).parent().hide();
		$(this).parent().removeClass('active');
		mytable.fnDraw();		
	});
}(jQuery));

$.fn.dataTableExt.afnFiltering.push(function(oSettings, aData, iDataIndex){
	var status = $('.selected').attr('status');
	//n=str.search(status);
	/*if(aData[4]==status){
		return true;
	}*/
	/*if(aData[4].search(status)>=0){
		return true;
	}*/
});
