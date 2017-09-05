setInterval(function(){
	$.ajax({
		url:thisdomain+"adm/checkauth",
		type:"post"
	}).done(function(data){
		console.log(data);
		if(data==="yes"){
			console.log("is logged in");
			$("#dLogin").modal("hide");
		}else{
			console.log("is not logged in");
			$("#dLogin").modal();
		}
	});
},3000);
$("#btnlogin").click(function(){
	$.ajax({
		url:thisdomain+"adm/setlogin",
		data:{"username":$("#username").val(),"password":$("#password").val()},
		type:"post"
	}).done(function(data){
		console.log(data);
	});
});
$(".btnlogout").click(function(){
	console.log("Officially Logged out");
	$.ajax({
		url:thisdomain+"adm/setlogout",
		type:"post"
	}).done(function(){
		window.history.forward(1);
		$("#Login").modal();
	});
});
