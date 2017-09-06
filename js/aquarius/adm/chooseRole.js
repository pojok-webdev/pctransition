(function($){
	$(".btnChooseRole").click(function(){
		var role = $(this).val();
		$.ajax({
			url:"/adm/setRole",
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
					window.location.href = "/tickets";
					break;
					case "Sales":
					window.location.href = "/surveys";
					break;
					case "Administrator":
					window.location.href = "/users";
					break;
					case "Umum dan Warehouse":
					window.location.href = "/adm/devicetypes";
					break;
					case "Accounting":
					window.location.href = "/disconnections";
					break;
					case "EOS":
					window.location.href = "/pmaintenances";
					break;					
					case "CRO":
					window.location.href = "/tickets";
					break;					
				}
			}
		});
		console.log(role);
	});
	$(".btnLogout").click(function(){
		window.location.href = "/adm/logout";
	});
}(jQuery));
