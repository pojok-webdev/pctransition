$(document).ready(function(){
	$('#tClient').dataTable({
		"bProcessing":true,
		"sAjaxSource":thisdomain+'clients/dttblresource'
	});
});
