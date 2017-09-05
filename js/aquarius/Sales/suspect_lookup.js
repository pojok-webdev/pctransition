$(document).ready(function(){
	var sl = $("#tblsurveyLookup").dataTable({
		"aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
		"iDisplayLength": 5,
		"aaSorting": [[2, "desc"]]
	});	
	$('#tblsurveyLookup').on("click", "tbody tr .btn_survey", function () {
		window.location.href = thisdomain+'survey_requests/add/'+$(this).attr('client_id');
	});
});
