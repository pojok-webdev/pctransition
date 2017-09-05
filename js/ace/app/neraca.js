$(document).ready(function(){
	$("#btnfilter").click(function(){
		$("#bFilter").modal();
	});

	$('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});

});