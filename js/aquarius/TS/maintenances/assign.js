(function($){
	switch($("#downtime_exist").val()){
		case "0":
			$(".dtdurationdiv").hide();
			$("#downtime_duration_minute").removeClass("inp_maintenance");
			$("#downtime_duration_hour").removeClass("inp_maintenance");
		break;
		case "1":
			$(".dtdurationdiv").show();
			$("#downtime_duration_hour").addClass("inp_maintenance");
			$("#downtime_duration_minute").addClass("inp_maintenance");
		break;
	}
	$(".btnAddOperator").click(function(){
		$("#dModalPenugasan").modal();
	});
	$("#downtime_exist").change(function(){
		switch($(this).val()){
			case "0":
				$(".dtdurationdiv").hide();
				$("#downtime_duration_minute").removeClass("inp_maintenance");
				$("#downtime_duration_hour").removeClass("inp_maintenance");
				$("#downtime_duration_minute").removeAttr("value");
				$("#downtime_duration_hour").removeAttr("value");
			break;
			case "1":
				$(".dtdurationdiv").show();
				$("#downtime_duration_hour").addClass("inp_maintenance");
				$("#downtime_duration_minute").addClass("inp_maintenance");
			break;
		}
	});
	$("#btn_save").click(function(){
		$('.inp_maintenance').makekeyvalparam();
		$.ajax({
			url:thisdomain+'maintenance_requests/update',
			data:JSON.parse('{'+$('.inp_maintenance').attr('keyval')+'}'),
			type:'post'
		}).done(function(){
			$(this).showModal({
				message:"Assignment sudah dibuat",
			});
		}).fail(function(){
			alert("Tidak dapat memberikan assignment, silakan hubungi Developer");
		});
	});
	$(".operator_remove").click(function(){
		myrow = $(this).stairUp({level:3});
		$.ajax({
			url:thisdomain+'maintenance_operators/remove',
			data:{id:myrow.attr("myid")},
			type:'post'
		}).fail(function(){
			alert("Tidak dapat menghapus operator, silakan hubungi Developer");
		}).done(function(){
			myrow.fadeOut(2000).remove();
			update_rowcount($("#totalOperator"),$("#tOperator tbody tr"));
		});
	});
	$(".petugasMaintenance").click(function(){
		oprName = $(this).parent().attr("username").toLowerCase();
		$.ajax({
			url:thisdomain+'maintenance_operators/save',
			data:{name:oprName,maintenance_request_id:$("#maintenance_request_id").val(),createuser:$("#createuser").val()},
			type:'post',
		}).done(function(data){
			console.log(data+" tersimpan ...");
			$("#tOperator tbody").append('<tr myid='+data+'><td><a class="fancybox" rel="group" href="'+baseurl+'media/users/'+oprName+'.jpg"><img src="'+baseurl+'media/users/'+oprName+'.jpg" class="img-polaroid" width=32 height=32 /></a></td><td class="info"><a class="fancybox" rel="group" href="'+baseurl+'media/users/'+oprName+'.jpg">'+oprName+'</a></td><td><a><span class="icon-trash operator_remove"></span></a></td></tr>');
			update_rowcount($("#totalOperator"),$("#tOperator tbody tr"));
			$(".operator_remove").click(function(){
				mytr = $(this).stairUp({level:3});
				$.ajax({
					url:thisdomain+'maintenance_operators/remove',
					data:{id:data},
					type:'post'
				}).fail(function(){
					alert("Tidak dapat menghapus operator, silakan hubungi Developer");
				}).done(function(){
					mytr.fadeOut(2000).remove();
					update_rowcount($("#totalOperator"),$("#tOperator tbody tr"));
				});
			});
			$("#dModalPenugasan").modal("hide");
		}).fail(function(){
			alert("Tidak dapat menyimpan Petugas, silakan hubungi Developer");
		});
	});
}(jQuery))
