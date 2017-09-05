$(document).ready(function(){
	var tInstall = $("#tInstall").dataTable({
		"bPaginate":true,
		"aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
		"iDisplayLength": 5,
		"bSort":true,
		"aaSorting":[[1,"desc"]],
	});
	var nNodes = tInstall.fnGetNodes();
	$(nNodes).find(".tohuman").sql2idformat();
	$(nNodes).find(".tohumandate").formatiddate();
	$(nNodes).find(".tohumanhourminute").formatidtime();
	$(this).fieldUpdater({
		url:thisdomain+"install_requests/feedData",
		cellClass:'updatable',
		fieldName:'fieldName',
		idAttr:'install_id',
		enabled:true
	});	
	$('#permintaanmainstalasi').click(function(){
		window.location.href = thisdomain+'install_requests/add_lookup';
	});
	$('#tInstall').on("click","tbody tr .btn_edit",function(){
		window.location.href = thisdomain+'install_requests/install_edit/'+$(this).stairUp({level:4}).attr('install_id');
	});
	$('#tInstall').on("click","tbody tr .btnReport",function(){
		window.location.href = thisdomain+'install_requests/showreport/'+$(this).stairUp({level:4}).attr('install_id');
	});	
});
