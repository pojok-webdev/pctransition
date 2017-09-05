(function($){
	$(".btnChooseRole").click(function(){
		var role = $(this).val();
		$.ajax({
			url:thisdomain+"adm/setRole",
			data:{role:role},
			type:"post",
		}).done(function(){
			console.log($("#pending_url").val());
			if(!$.trim($("#pending_url").val().length)){
				console.log($("#pending_url").val());
				window.location.href = $("#pending_url").val();
			}else{
				switch(role){
					case "TS":
					window.location.href = thisdomain+"tickets";
					break;
					case "Sales":
					window.location.href = thisdomain+"surveys";
					break;
					case "Administrator":
					window.location.href = thisdomain+"users";
					break;
					case "Umum dan Warehouse":
					window.location.href = thisdomain+"adm/devicetypes";
					break;
					case "Accounting":
					window.location.href = thisdomain+"disconnections";
					break;
					case "EOS":
					window.location.href = thisdomain+"pmaintenances";
					break;					
					case "CRO":
					window.location.href = thisdomain+"tickets";
					break;					
				}
			}
		});
		console.log(role);
	});
	$(".btnLogout").click(function(){
		window.location.href = thisdomain+"adm/logout";
	});
}(jQuery));
