(function($){
	$("#tClient").on("click","tbody tr .btndisconnection",function(){
		var myid = $(this).stairUp({level:4}).attr("myid");
		console.log(myid+" clicked");
		window.location.href = thisdomain+"disconnections/add/"+myid;
	});
	console.log("client sites for Accounting");
}(jQuery))
