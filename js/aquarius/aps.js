$(document).ready(function(){
	console.log("APS");
	tAP = $("#tAP").dataTable();
	$("#addap").click(function(){
		$("#save_ap").show();
		$(".update_ap").hide();
		$("#penambahanaplabel").html("Penambahan AP");
		$("#dAddAP").modal();
	});
	
	$(".aps tbody tr .editap").live("click",function(){
		$("#save_ap").hide();
		$(".update_ap").show();
		$("#penambahanaplabel").html("Update AP");
		id = $(this).parent().parent().attr("thisid");
		thistr = $(this).stairUp({level:2});
		$("#tAP tr").each(function(){
			$(this).removeClass("selected");
		});
		console.log("ID",id);
		thistr.addClass("selected");
		$.ajax({
			url:'/paps/getJSON/'+id,
			async:false,
			dataType:'json'
		}).done(function(data){
			$("#ap_name").val(data['name']);
			$("#bts_name").selectopt(data['btstower_id']);
			$("#ipaddress").val(data['ipaddr']);
			$("#description").val(data['description']);
		});
		$("#dAddAP").modal();
		
	});
	
	$("#save_ap").click(function(){
		$.post('/paps/add',{
			btstower_id:$('#bts_name').val(),
			name:$('#ap_name').val(),
			ipaddr:$('#ipaddress').val(),
			description:$('#description').val(),
			user_name:$("#username").val()
		}).done(function(apid){
			console.log("APID",apid);
			var newRow = tAP.fnAddData([ 
				apid,$("#ap_name").val(),$("#bts_name :selected").text(),
				$("#description").val(), 
				'<span class="icon-pencil pointer editap"></span><span class="remove_ap pointer icon-trash"></span>'
				]),			
				nTr = tAP.fnSettings().aoData[newRow[0]].nTr,
				nTds = $('td', nTr),
				row = tAP.fnGetNodes(newRow);
				console.log("variables ended");
			nTds.eq(0).addClass('apid');
			nTds.eq(1).addClass('apname');
			nTds.eq(2).addClass('aptowername');
			nTds.eq(3).addClass('apdescription');
			$(row).attr('thisid', apid);			
			console.log("DATA",apid);			
			$("#dAddAP").modal("hide");
		}).fail(function(err){
			console.log("Error insert AP",err);
			alert("Tidak dapat menyimpan AP, silakan menghubungi Developer");
		});
	});
	
	$(".update_ap").click(function(){
		$.post('/paps/update',{
			id:$("#tAP tr.selected").attr("thisid"),
			btstower_id:$('#bts_name').val(),
			name:$('#ap_name').val(),
			ipaddr:$('#ipaddress').val(),
			description:$('#description').val()
		}).done(function(data){
			console.log("OK");
			$('#tAP tbody tr.selected td.aptowername').html($('#bts_name :selected').text());
			$('#tAP tbody tr.selected td.apname').html($('#ap_name').val());
			$('#tAP tbody tr.selected td.apdescription').html($('#description').val());
			$("#dAddAP").modal("hide");
		}).fail(function(){
			alert("Tidak dapat menyimpan AP, silakan menghubungi Developer");
		});
	});
	$("#tAP").on("click","tr .remove_ap",function(){
		thistr = $(this).stairUp({level:2});
		console.log("ID "+thistr.attr("thisid"));
		$("#tAP tr").each(function(){
			$(this).removeClass("selected");
		});
		thistr.addClass("selected");
		$("#modal_ap_id").html(thistr.attr("thisid"));
		$("#dconfirmation").modal();
	});
	$("#modal_ap_remove").click(function(){
		$.ajax({
			url:"/paps/update",
			data:{"id":$("#tAP tr.selected").attr("thisid"),"active":"0"},
			type:"post"
		}).done(function(data){
			$("#dconfirmation").modal("hide");
			$("#tAP tr.selected").remove();
		});
	});
});
