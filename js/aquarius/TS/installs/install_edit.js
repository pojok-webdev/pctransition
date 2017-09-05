(function($){
	$(".installSave").click(function(){
		$(".installrequest").makekeyvalparam();
		var installstatus = $(this).attr("installstatus"),statustext;
		switch(installstatus){
			case "0":
			statustext="belum selesai";
			break;
			case "1":
			statustext="sudah selesai";
			break;
		}
		console.log("installstatus",installstatus);
		console.log("installrequest",$(".installrequest").attr('keyval'));
		$.ajax({
			url:"/install_requests/update",
			data:JSON.parse('{'+$(".installrequest").attr("keyval")+',"status":"'+installstatus+'"}'),
			type:"post",
			async:false
		}).done(function(){
			$(".iim").makekeyvalparam();
			$.ajax({
				url:"/install_sites/update",
				data:JSON.parse('{'+$(".iim").attr("keyval")+',"id":"'+$("#install_site_id").val()+'","status":"'+installstatus+'"}'),
				type:"post",
				async:false
			}).done(function(){
				console.log('update install_site sukses');
				$.ajax({
					url:"/clients/update",
					data:{"id":$("#workplace").attr("client_id"),"status":installstatus,"active":installstatus},
					type:"post",
					async:false
				}).done(function(){
					console.log('update client sukses');
					$.ajax({
						url:"/client_sites/update",
						data:{id:$("#client_site_id").val(),active:installstatus},
						type:"post",
						async:false
					}).done(function(){
						console.log('update client_site sukses');
						$('#installstatus').html(statustext);
						var createuser = $('#createuser').val(), 
							clientname = $("#client_id").val(),
							url = 'https://database.padinet.com/install_requests/install_edit/'+$("#install_request_id").val(),
							reporturl = 'https://database.padinet.com/install_requests/showreport2/'+$("#install_request_id").val();
						sendinstallresult(createuser,clientname,statustext,url,reporturl);
						window.location.href = '/install_requests';
					}).fail(function(){
						console.log('update client_site failed');
					});
				}).fail(function(){
					console.log('update client failed');
				});
			}).fail(function(){
				console.log('update install_site failed');
			});
		}).fail(function(){
			console.log('update install_request failed');
		});
	});
	$(".closemodal").click(function(){
		thisobj = $(this)
		for(var i=0;i<7;i++){
			if($(thisobj).hasClass("modal")){
				$(thisobj).modal("hide");
			}else{
				thisobj = thisobj.parent();
			}
		}
	});
}(jQuery))
