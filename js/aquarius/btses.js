$(document).ready(function(){
	tBTS = $("#tBTS").dataTable();
	$("#addbts").click(function(){
		$("#save_bts").show();
		$("#update_bts").hide();
		$("#dAddBTS").modal();
	});
	$("#save_bts").click(function(){
		$.post('/pbtses/add',{
			branch_id:$("#branches").val(),
			name:$('#bts_name').val(),
			location:$('#bts_location').val(),
			description:$('#bts_description').val(),
			user_name:$("#username").val()}
		).done(function(btsid){
			$('#dAddBTS').modal('hide');
			var newRow = tBTS.fnAddData([ 
				btsid,$("#bts_name").val(),$("#bts_location").val(),
				$("#bts_description").val(), 
				'<span class="icon-pencil pointer edit_bts"></span><span class="remove_bts pointer icon-trash"></span>'
				]),
				nTr = tBTS.fnSettings().aoData[newRow[0]].nTr,
				nTds = $('td', nTr),
				row = tBTS.fnGetNodes(newRow);
			nTds.eq(0).addClass('btsid');
			nTds.eq(1).addClass('btsname');
			nTds.eq(2).addClass('btslocation');
			nTds.eq(3).addClass('btsdescription');
			$(row).attr('thisid', btsid);			
			console.log("DATA",btsid);
			
		}).fail(function(err){
			alert('Tidak dapat menyimpan BTS, silakan hubungi Developer '+err);
			console.log(err);
		});
	});

	$("#tBTS").on("click","tr .edit_bts",function(){
		$("#tBTS tr").each(function(){
			$(this).removeClass("selected");
		});
		thistr = $(this).stairUp({level:2});
		thistr.addClass("selected");
		id = thistr.attr('thisid');
		$(".update_bts").attr("thisid",id);
		$("#save_bts").hide();
		$(".update_bts").show();
		$.getJSON('/pbtses/getJSONBts/'+id,function(data){
			$("#branches option").each(function(){
				console.log($(this).val());
				console.log(data["branch_id"]);
				if($(this).val()===data["branch_id"]){
					$(this).attr("selected","selected");
				}
			});
			$("#bts_name").val(data['name']);
			$("#bts_description").val(data['description']);
			$("#bts_location").val(data['location']);
		});
		$("#dAddBTS").modal();
	});
	$("#tBTS").on("click","tr .remove_bts",function(){
			thistr = $(this).stairUp({level:2});
			$("#tBTS tr").each(function(){
				$(this).removeClass("selected");
			});
			thistr.addClass("selected");
			$("#modal_bts_id").html($("#tBTS tr.selected").attr("thisid"));
			$("#dconfirmation").modal();	
	});
	$(".update_bts").click(function(){
		var trid = $('#tBTS tbody tr.selected').attr('thisid');
		$.post('/pbtses/update',{
			id:trid,
			name:$('#bts_name').val(),
			location:$('#bts_location').val(),
			description:$('#bts_description').val()
		}).done(function(data){
			$('#tBTS tbody tr.selected td.btsid').html(trid);
			$('#tBTS tbody tr.selected td.btsname').html($('#bts_name').val());
			$('#tBTS tbody tr.selected td.btslocation').html($('#bts_location').val());
			$('#tBTS tbody tr.selected td.btsdescription').html($('#bts_description').val());
			$('#dAddBTS').modal('hide');
		}).fail(function(err){
			alert('Tidak dapat mengupdate BTS, silakan hubungi Developer');
			console.log(err);
		});
	});
	$("#modal_bts_remove").click(function(){
		$.ajax({
			url:"/pbtses/update",
			type:"post",
			data:{"id":$("#tBTS tr.selected").attr("thisid"),active:"0"}
		}).done(function(data){
			$("#tBTS tr.selected").remove();
			$("#dconfirmation").modal("hide");
		});
	});
});
