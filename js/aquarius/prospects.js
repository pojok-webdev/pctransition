$(document).ready(function(){
	mytable = $('#tProspect').dataTable({
		iDisplayLength:5,
		aLengthMenu:[[5,10,15,-1],[5,10,15,'Semua']],
	});
	$("#btnaddprospect").click(function(){
		window.location.href = thisdomain+"prospects/add_prospect";
	});	
	/*$('.btn_edit').click(function(){
		var prospectid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'prospects/edit/'+prospectid;
	});*/
	$('#tProspect').on('click','tr .btn_survey',function(){
		var prospectid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'survey_requests/add/'+prospectid;
	});
	$("#tProspect").on("click",".btn_edit",function(){
		var prospectid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'prospects/edit/'+prospectid;		
	});
});
