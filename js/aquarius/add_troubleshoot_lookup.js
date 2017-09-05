(function($){
	$('#tTroubleshoot').dataTable();
	$('.btnchoose').click(function(){
		myid = $(this).parent().parent().parent().attr('myid');
		window.location.href = thisdomain+'troubleshoots/add/'+myid;
	});
}(jQuery))
