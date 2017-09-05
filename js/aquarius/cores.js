(function($){
	console.log("CORE JS");
	var tCore = $("#tCore").dataTable();
	$("#addcore").click(function(){
		console.log("add core invoked");
		$("#updateAp").hide();
		$("#saveAp").show();
		$("#dAddCore").modal();
	});
	$("#saveAp").click(function(){
		console.log("SAVE AP INVOKED");
		$.ajax({
			url:thisdomain+"cores/save",
			data:{
				name:$("#core_name").val(),
				branch_id:$("#branch_id").val(),
				btstower_id:$("#bts_name").val(),
				"description":$("#description").val()
			},
			type:"post"
		})
		.done(function(res){
			var newRow = tCore.fnAddData([res, $("#core_name").val(), $("#bts_name :selected").text(),$("#description").val(), '<span class="icon-pencil pointer editCore"></span><span class="removeCore pointer icon-trash"></span>']);
			var row = tCore.fnGetNodes(newRow);
			$(row).attr('thisid', res);
			console.log("DATA",res);
		})
		.fail(function(err){
			console.log("ERROR",err);
		});
	});
	$("#updateAp").click(function(){
		var selected = $("#tCore .selected"),
		trid = $("#tCore .selected").attr("thisid");
		console.log("UPDATE AP INVOKED",trid);
		$.ajax({
			url:thisdomain+"cores/update",
			data:{
				id:trid,
				name:$("#core_name").val(),
				branch_id:$("#branch_id").val(),
				btstower_id:$("#bts_name").val(),
				description:$("#description").val()
			},
			type:"post"
		})
		.done(function(data){
			selected.find(".corename").html($("#core_name").val());
			selected.find(".coretowername").html($("#bts_name :selected").text());
			selected.find(".coredescription").html($("#description").val());
			console.log("DATA",data);
		})
		.fail(function(err){
			console.log("ERROR",err);
		});
	});
	$(".closemodal").click(function(){
		$(this).stairUp({level:6}).modal("hide");
	});
	$("#tCore").on("click",".editCore",function(){
		$("#tCore tbody tr").removeClass("selected");
		var id = $(this).stairUp({level:2}).attr("thisid");
		$(this).stairUp({level:2}).addClass("selected");
		$("#updateAp").show();
		$("#saveAp").hide();
		$.ajax({
			url:thisdomain+"cores/get/"+id,
			type:"get",
			dataType:"json",
		})
		.done(function(res){
			console.log("RES",res);
			$("#core_name").val(res.name);
			$("#bts_name").val(res.btstower_id);
			$("#description").val(res.description);
			console.log("NAME",res.name);
			console.log("BTS_ID",res.btstower_id);
			console.log("DESCRIPTION",res.description);
			$("#dAddCore").modal();
		})
		.fail(function(err){
			console.log("ERROR",id,err);
		});
	});
	$("#tCore").on("click",".removeCore",function(){
		$("#tCore tbody tr").removeClass("selected");
		$(this).stairUp({level:2}).addClass("selected");
		$("#modal_core_name").html($("#tCore .selected").find(".corename").html());
		$("#modal_core_id").html($("#tCore .selected").attr("thisid"));
		$("#dconfirmation").modal();
	});
	$("#modal_core_remove").click(function(){
		var id = $("#tCore .selected").attr("thisid");
		tr = $("#tCore .selected");
		//tr = $("#tCore body tr");
//		console.log(tr.html());
//		tCore.fnDeleteRow($("#tCore .selected")[0]);
		$.ajax({
			url:thisdomain+"cores/remove/"+id,
			type:"get",
		})
		.done(function(res){
			console.log("RES",res);
//			$("#tCore .selected").remove();
			tCore.fnDeleteRow($("#tCore .selected")[0]);
//			tCore.fnDeleteRow($("#tCore tbody tr[thisid="+id+"]"));
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
