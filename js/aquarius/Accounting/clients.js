$(function($){
	$('#tClient').on('click','tbody .btneditclient',function(){
		var clientid = $(this).parent().parent().parent().parent().attr('myclient_id');
		var siteid = $(this).parent().parent().parent().parent().attr('my_id');
		window.location.href = thisdomain+'clients/edit/'+clientid;
	});
	$('#tClient').on('click','tbody .btndisconnection',function(){
		var clientid = $(this).parent().parent().parent().parent().attr('myclient_id');
		var siteid = $(this).parent().parent().parent().parent().attr('my_id');
		window.location.href = thisdomain+'disconnections/add/'+clientid;
	});
}(jQuery));
