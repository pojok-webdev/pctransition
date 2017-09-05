(function($){
	$(".btn_edit").click(function(){
		myid = $(this).stairUp({level:4}).attr("myid");
		window.location.href = thisdomain+"altergrades/edit/"+myid;
	});
}(jQuery));
