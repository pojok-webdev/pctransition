(function($){
	mytable = $('#tClient').dataTable({
		"aLengthMenu":[[5,10,-1],[5,10,"Semua"]],"iDisplayLength":5,
	});
	$(this).fieldUpdater({
		url:thisdomain+"client_sites/feedData",
		cellClass:'updatable',
		fieldName:'fieldName',
		idAttr:'myid',
		type:'get',
		enabled:true
	});
	$('.view_devices').click(function(){
		id=$(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'client_sites/view_devices/'+id;
	});
}(jQuery));
