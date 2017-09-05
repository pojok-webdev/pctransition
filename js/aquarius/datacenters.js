$(document).ready(function(){
	console.log("DataCenter");
	tDataCenter = $("#tDataCenter").dataTable();
	$("#addDataCenter").click(function(){
		$("#save_datacenter").show();
		$("#update_datacenter").hide();
		$("#penambahandatacenterlabel").html("Penambahan DataCenter");
		$("#dAddDataCenter").modal();
	});
	$("#tDataCenter").on("click","tbody tr .editdatacenter",function(){
		$("#save_datacenter").hide();
		$("#update_datacenter").show();
		$("#penambahandatacenterlabel").html("Update DataCenter");
		id = $(this).parent().parent().attr("thisid");
		thistr = $(this).stairUp({level:2});
		$("#tDataCenter tr").each(function(){
			$(this).removeClass("selected");
		});
		thistr.addClass("selected");
		$.ajax({
			url:thisdomain+'datacenters/getJSON/'+id,
			async:false,
			dataType:'json'
		}).done(function(data){
			$("#datacenter_name").val(data['name']);
			$("#branch_name").selectopt(data['branch_id']);
			$("#datacenter_location").val(data['location']);
			$("#description").val(data['description']);
			$("#dAddDataCenter").modal();
		}).fail(function(err){
			console.log("Error getJSON DataCenter",err);
		});
	});
	$("#save_datacenter").click(function(){
		console.log($('#branch_name').val(),$('#datacenter_name').val(),$('#datacenter_location').val(),$('#description').val(),$("#username").val());
		$.post(thisdomain+'datacenters/save',{
			branch_id:$('#branch_name').val(),
			name:$('#datacenter_name').val(),
			location:$('#datacenter_location').val(),
			description:$('#description').val(),
			createuser:$("#username").val()
		}).done(function(res){
			$("#dAddDataCenter").modal("hide");
			tDataCenter.fnAddData([res,$('#datacenter_name').val(),$('#datacenter_location').val(),$('#description').val(),'<span class="icon-pencil pointer editdatacenter"></span><span class="remove_datacenter icon-trash"></span>']);
		}).fail(function(err){
			alert("Tidak dapat menyimpan DataCenter, silakan menghubungi Developer",err);
		});
	});	
	$(".update_datacenter").click(function(){
		$.post(thisdomain+'datacenters/update',{
			id:$("#tDataCenter tr.selected").attr("thisid"),
			branch_id:$('#branch_name').val(),
			name:$('#datacenter_name').val(),
			location:$('#datacenter_location').val(),
			description:$('#description').val()
		}).done(function(updateres){
			console.log("Update Datacenter success",updateres);
			$('#tDataCenter tbody tr.selected td.dcname').html($('#datacenter_name').val());
			$('#tDataCenter tbody tr.selected td.dclocation').html($('#datacenter_location').val());
			$('#tDataCenter tbody tr.selected td.dcdescription').html($('#description').val());
			$("#dAddDataCenter").modal("hide");
		}).fail(function(err){
			alert("Tidak dapat menyimpan DataCenter, silakan menghubungi Developer",err);
		});
	});
	$("#tDataCenter").on("click","tr .remove_datacenter",function(){
		thistr = $(this).stairUp({level:2});
		console.log("ID "+thistr.attr("thisid"));
		$("#tDataCenter tr").each(function(){
			$(this).removeClass("selected");
		});
		thistr.addClass("selected");
		$("#modal_datacenter_id").html(thistr.attr("thisid"));
		$("#dconfirmation").modal();
	});
	$("#modal_datacenter_remove").click(function(){
		$.ajax({
			url:thisdomain+"datacenters/remove",
			data:{"id":$("#tDataCenter tr.selected").attr("thisid"),"active":"0"},
			type:"post"
		}).done(function(data){
			$("#dconfirmation").modal("hide");
			//$("#tDataCenter tr.selected").remove();
			tDataCenter.fnDeleteRow($("#tDataCenter tr.selected"));
		});
	});
});
