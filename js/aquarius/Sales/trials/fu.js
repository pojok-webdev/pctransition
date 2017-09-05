console.log("fu js loaded");
$("#btnSimpan").click(function(){
	console.log("saved");
	switch($("#btnChoice .active").html()){
		case "Cancel":
			$.ajax({
				url:thisdomain+"trials/updatestatus/",
				data:{cancel:"1",cancelsent:"0",extend:"0",isjoin:"0",id:$("#id").val()},
				type:"post"
			})
			.done(function(res){
				console.log("Res",res);
			})
			.fail(function(err){
				console.log("err,err");
			});		
		break;
		case "Join":
			$.ajax({
				url:thisdomain+"trials/updatestatus/",
				data:{cancel:"0",extend:"0",isjoin:"1",joinsent:"0",id:$("#id").val()},
				type:"post"
			})
			.done(function(res){
				console.log("Res",res);
			})
			.fail(function(err){
				console.log("err,err");
			});		
		break;
		case "Extend":
			$.ajax({
				url:thisdomain+"trials/updatestatus/",
				data:{cancel:"0",extend:"1",extendsent:"0",isjoin:"0",id:$("#id").val()},
				type:"post"
			})
			.done(function(res){
				$("#extendend").getdate();
				$.ajax({
					url:thisdomain+'trials/save',
					data:{client_site_id:$("#client_site_id").val(),startdate:$("#enddate").val(),enddate:$("#extendend").attr("datetime"),prevtrial:$("#id").val()},
					type:"post"
				})
				.done(function(res){
					console.log("new Extend Res",res);
				})
				.fail(function(err){
					console.log("new Extend Err",err);
				});
				console.log("Res",res);
			})
			.fail(function(err){
				console.log("err,err");
			});		
		break;
	}
	console.log("Value",$("#btnChoice .active").html());
})
$("#btnJoinTrial").click(function(){
	$("#extendtrialdate").hide();
	console.log("join trial clicked",$("#id").val());

});
$("#btnExtendTrial").click(function(){
	$("#extendtrialdate").show();
	console.log("extend trial clicked",$("#id").val());

});
$("#btnCancelTrial").click(function(){
	$("#extendtrialdate").hide();
	console.log("cancel trial clicked",$("#id").val());

});
