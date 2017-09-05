$("#btnactivate").click(function(){
	//$(".inp_activate").makekeyvalparam();
	$("#active_date").getdate().addhour($("#active_hour")).addminute($("#active_minute"));
	//$("#active_date").getdate().addhour($("#surveyhour")).addminute($("#surveyminute"));
	console.log("INP ACTIVE",$("#active_date").attr("datetime"));
	$.ajax({
		url:thisdomain+"client_sites/update",
		data:{id:$("#client_site_id").val(),"active":"1","active_date":$("#active_date").attr("datetime")},
		type:"post"
	})
	.done(function(res){
		console.log("Res",res);
	})
	.fail(function(err){
		console.log("Error",err);
	});
});
