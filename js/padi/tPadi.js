(function($){
	$("#tPadi1").dataTable({
		"aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
		"iDisplayLength": 5,
		"serverSide":true,
		"processing":true,
		"ajax":{
			"url":"http://datatable/jsonp.php",
			"dataType":"jsonp"
		}
	});
}(jQuery))
