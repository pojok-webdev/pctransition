(function($){
	console.log("Isolir add");
	$("#btnsave").click(function(){
		$(".inp_disconnection").makekeyvalparam();
		console.log($(".inp_disconnection").attr("keyval"));
		$.ajax({
			url:thisdomain+"disconnections/save",
			data:JSON.parse('{'+$(".inp_disconnection").attr("keyval")+',"disconnectiontype":"1","status":"0"}'),
			type:'post'
		}).done(function(){
			$(this).showModal({message:"Pengajuan Isolir telah disimpan"});
			window.location.href = thisdomain+"disconnections";
		}).fail(function(){
			console.log("Tidak dapat menyimpan pengajuan Isolir, silakan hubungi Developer");
		});
	});
}(jQuery))
