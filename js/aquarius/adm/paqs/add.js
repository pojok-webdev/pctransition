(function($){
	if($("#question").length > 0){
		var qeditor = $("#question").cleditor({width:"100%", height:"100%"})[0].focus();
	}
	if($("#explanation").length > 0){
		var eeditor = $("#explanation").cleditor({width:"100%", height:"100%"})[0].focus();
	}
	$("#btnsave").click(function(){
		$.ajax({
			url:thisdomain+"paqs/save",
			data:{question:$("#question").val(),explanation:$("#explanation").val(),},
			type:"post"
		}).done(function(){
			window.location.href = thisdomain+"paqs";
		}).fail(function(){
			console.log("Tidak dapat menyimpan paq");
		});
		
	});
	$(window).resize(function() {
		if($("#question").length > 0) qeditor.refresh();
		if($("#explanation").length > 0) eeditor.refresh();
	});
}(jQuery))
