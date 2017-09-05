(function($){
	console.log("tested");
	mytable = $('#tClient').dataTable({
		"aLengthMenu":[[5,10,-1],[5,10,"Semua"]],"iDisplayLength":5,
	});
	$("#tClient").on("click",".btnviewsites",function(){
		window.location.href = thisdomain+"client_sites/index/"+$(this).stairUp({level:4}).attr('myid');
	});
}(jQuery));
