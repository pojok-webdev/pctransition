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
	$('.btneditclient').click(function(){
		id=$(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'client_sites/edit/'+id;
	});
	$('.btnremoveclient').click(function(){
		alert('Removeclient');
	});
	$('.btnsurvey').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'survey_requests/add/'+myid;
	});
	$('.btninstallation').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'install_requests/edit/'+myid;
	});
	$('.btnupgrade').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'altergrades/add/'+myid;
	});
	$('.btndisconnection').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'disconnections/add/'+myid;
	});
	$('.btntroubleshoot').click(function(){
		window.location.href = thisdomain+'troubleshoots/add_lookup';
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
