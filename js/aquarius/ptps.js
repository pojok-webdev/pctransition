(function($){
	console.log("CORE JS");
	var tPtp = $("#tPtp").dataTable();
	$("#addptp").click(function(){
		console.log("add ptp invoked");
		$("#updatePtp").hide();
		$("#savePtp").show();
		$("#dAddPTP").modal();
	});
	$("#savePtp").click(function(){
		console.log("SAVE AP INVOKED");
		$.ajax({
			url:thisdomain+"ptps/save",
			data:{
				name:$("#ptp_name").val(),
				branch_id:$("#branch_id").val(),
				btstower_id:$("#bts_name").val(),
				"description":$("#description").val()
			},
			type:"post"
		})
		.done(function(res){
			var newRow = tPtp.fnAddData([ 
				$("#ptp_name").val(),$("#bts_name :selected").text(),
				$("#description").val(), 
				'<span class="icon-pencil pointer editPtp"></span><span class="removePtp pointer icon-trash"></span>'
				]);
			var row = tPtp.fnGetNodes(newRow);
			$(row).attr('thisid', res);			
			console.log("DATA",res);
		})
		.fail(function(err){
			console.log("ERROR",err);
		});
	});
	$("#updatePtp").click(function(){
		var selected = $("#tPtp .selected"),
		trid = $("#tPtp .selected").attr("thisid");
		console.log("UPDATE AP INVOKED",trid);
		$.ajax({
			url:thisdomain+"ptps/update",
			data:{
				id:trid,
				name:$("#ptp_name").val(),
				branch_id:$("#branch_id").val(),
				btstower_id:$("#bts_name").val(),
				description:$("#description").val()
			},
			type:"post"
		})
		.done(function(data){
			selected.find(".ptpname").html($("#ptp_name").val());
			selected.find(".ptptowername").html($("#bts_name :selected").text());
			selected.find(".ptpdescription").html($("#description").val());
			console.log("DATA",data);
		})
		.fail(function(err){
			console.log("ERROR",err);
		});
	});
	$(".closemodal").click(function(){
		$(this).stairUp({level:6}).modal("hide");
	});
	$("#tPtp").on("click",".editPtp",function(){
		$("#tPtp tbody tr").removeClass("selected");
		var id = $(this).stairUp({level:2}).attr("thisid");
		$(this).stairUp({level:2}).addClass("selected");
		$("#updatePtp").show();
		$("#savePtp").hide();
		$.ajax({
			url:thisdomain+"ptps/get/"+id,
			type:"get",
			dataType:"json",
		})
		.done(function(res){
			console.log("RES",res);
			$("#ptp_name").val(res.name);
			$("#bts_name").val(res.btstower_id);
			$("#description").val(res.description);
			console.log("NAME",res.name);
			console.log("BTS_ID",res.btstower_id);
			console.log("DESCRIPTION",res.description);
			$("#dAddPTP").modal();
		})
		.fail(function(err){
			console.log("ERROR Edit Ptp",id,err);
		});
	});
	$("#tPtp").on("click",".removePtp",function(){
		$("#tPtp tbody tr").removeClass("selected");
		$(this).stairUp({level:2}).addClass("selected");
		$("#modal_ptp_name").html($("#tPtp .selected").find(".ptpname").html())
		$("#modal_ptp_id").html($("#tPtp .selected").attr("thisid"))
		$("#dconfirmation").modal();
	});
	$("#modal_ptp_remove").click(function(){
		var id = $("#tPtp .selected").attr("thisid");
		$.ajax({
			url:thisdomain+"ptps/remove/"+id,
			type:"get",
		})
		.done(function(res){
			console.log("RES",res);
			tPtp.fnDeleteRow($("#tPtp .selected")[0]);
			//tPtp.fnDeleteRow($("#tPtp tbody tr[thisid="+id+"]"));
//			$("#tPtp .selected").remove();
		})
		.fail(function(err){
			console.log("ERROR",id,err);
		});		
	});
	$(".modalclose").click(function(){
		console.log("modalclose invoked");
		$(this).stairUp({level:4}).modal('hide');
		$("#dconfirmation").modal('hide');
	});
}(jQuery))
