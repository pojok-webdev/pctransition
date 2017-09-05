(function($){
	$('.btnedit').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'troubleshoots/edit/'+myid;
		//window.location.href = thisdomain+'troubleshoots/entry_report/'+myid;
	});
	$('.btnUsedDevice').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'troubleshoots/used_device/'+myid;
	});
	$('.btnWithdrawedDevice').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'troubleshoots/withdrawed_device/'+myid;
	});
	$('.btnEntryReport').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'troubleshoots/entry_report/'+myid;
	});
	$('.btnViewReport').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		//window.location.href = thisdomain+'troubleshoots/view_report/'+myid;
		window.location.href = thisdomain+'troubleshoots/report/'+myid;
	});
	$('#tTroubleshoot').dataTable({
		"aaSorting":[[1,"desc"]]
	});
}(jQuery));
