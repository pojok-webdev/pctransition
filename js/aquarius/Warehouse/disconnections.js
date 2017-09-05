(function($){
	$('.btneditdisconnection').click(function(){
		window.location.href = thisdomain+'disconnections/edit/'+$(this).parent().parent().parent().parent().attr('myid');
	});
}(jQuery));
