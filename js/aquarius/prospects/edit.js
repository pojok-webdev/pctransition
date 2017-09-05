$(document).ready(function(){
	console.log("prospect edit.js loaded");
	$("#amsave").click(function(){
		displacementdate = $("#displacementdate").getdate();
		$.ajax({
			url:thisdomain+'clients/displaceam',
			data:{'id':$("#client_id").val(),'sale_id':$('#replacersales').val()},
			type:'post'
		})
		.done(function(res){
			$("#dSetAM").modal("hide");
			console.log("Result",res);
			$.ajax({
				url:thisdomain+'clients/saveamhistory',
				data: {'client_id':$("#client_id").val(),'user_id':$('#replacersales').val(),'username':$('#replacersales :selected').text(),'displacementdate':$("#displacementdate").attr("datetime"),'description':$('#description').val(),'createuser':'puji'},
				type:'post'
			});
		})
		.fail(function(err){
			console.log("Err",err);
		});
	});
	$("#btnChangeAM").click(function(){
		$("#dSetAM").modal();
	});
	$("#btnaddPIC").click(function(){
		$("#savePic").show();
		$("#updatePic").hide();
		$("#dAddPic").modal();
	});
	$("#btnaddFollowup").click(function(){
		$("#saveFollowup").show();
		$("#updateFollowup").hide();
		$("#dAddFollowup").modal();
	});	
	$(".closemodal").click(function(){
		$("#dAddPic").modal("hide");
	});
	$("#tblpics").on("click","tbody tr .editPic",function(){
		var myid = $(this).stairUp({level:2}).attr("myid");
		$("#savePic").show();
		$("#updatePic").hide();
		$("#dAddPic").modal();
	});
	switch($("#has_internet_connection").val()){
		case "0":
		console.log("has no connection");
			$(".div_has_internet_connection").val("0");
			$(".div_has_internet_connection").attr("disabled","disabled");
		break;
		case "1":
		console.log("has connection");
			$(".div_has_internet_connection").removeAttr("disabled","disabled");
		break;
	}
	$("#has_internet_connection").change(function(){
		switch($(this).val()){
			case "0":
				$(".div_has_internet_connection").val("0");
				$(".div_has_internet_connection").attr("disabled","disabled");
			break;
			case "1":
				$(".div_has_internet_connection").removeAttr("disabled","disabled");
			break;
		}
	})
	$('#btnsave').click(function(){
		$('.inp_prospect').makekeyvalparam();
		$.ajax({
			url:thisdomain+'prospects/update',
			data:JSON.parse('{"id":"'+$('#client_id').val()+'","status":"'+$('#status').val()+'",'+$('.inp_prospect').attr('keyval')+'}'),
			type:'post'
		}).done(function(data){
			$('#dModal').modal().hideafter({timeout:2000});
		}).fail(function(){
			alert('Tidak dapat menyimpan Prospect, silakan hubungin Developer');
		});
	});
	$('#btn_survey_request').click(function(){
		window.location.href = thisdomain+'survey_requests/add/'+$('#client_id').val();
	});
	$("#tPic tbody tr .pic_remove").click(function(){
		var selected = $(this).stairUp({level:3});
		$.ajax({
			url:thisdomain+"pics/remove",
			data:{id:selected.attr("thisid")},
			type:"post"
		}).done(function(data){
			selected.fadeOut(2000);selected.remove();
			update_rowcount($("#total_pic"),$("#tPic tbody tr"));
		});
	});
	$("#tFollowup tbody tr .followup_remove").click(function(){
		var selected = $(this).stairUp({level:3});
		$.ajax({
			url:thisdomain+"clientfollowups/remove",
			data:{id:selected.attr("thisid")},
			type:"post"
		}).done(function(data){
			selected.fadeOut(2000);selected.remove();
			update_rowcount($("#total_followup"),$("#tFollowup tbody tr"));
		});
	});	
	$("#savePic").click(function(){
		$(".inp_pic").makekeyvalparam();
		$.ajax({
			url:thisdomain+"pics/save",
			data:JSON.parse('{'+$(".inp_pic").attr("keyval")+'}'),
			type:"post"
		}).done(function(data){
			console.log("data tersimpan");
			$("#tPic tbody").append('<tr thisid="'+data+'"><td><a>'+$("#pic_name").val()+'</a></td><td class="info"><a>'+$("#pic_hp").val()+'</a>'+$("#pic_email").val()+'</td><td>'+$("#pic_position :selected").text()+'</td><td><a><span class="icon-remove pic_remove"></span></a></td></tr>');
			update_rowcount($("#total_pic"),$("#tPic tbody tr"));
			$(".pic_remove").click(function(){
				var selected = $(this).stairUp({level:3});
				$.ajax({
					url:thisdomain+"pics/remove",
					data:{id:selected.attr("thisid")},
					type:"post"
				}).done(function(data){
					selected.fadeOut(2000);selected.remove();
					update_rowcount($("#total_pic"),$("#tPic tbody tr"));
				});
			});
		}).fail(function(){
			console.log("error data tidak tersimpan");
		});
	});
	$("#saveFollowup").click(function(){
		$('#followupdate').getdate();
		$.ajax({
			url:thisdomain+"clientfollowups/save",
			data:{'client_id':$("#client_id").val(),'followupdate':$('#followupdate').attr('datetime'),'description':$('#description').val()},
			type:"post"
		}).done(function(data){
			$("#tFollowup tbody").append('<tr thisid="'+data+'"><td><a>'+$('#followupdate').attr('datetime')+'</a></td><td class="info"><a>'+$('#description').val()+'</a></td><td><a><span class="icon-remove followup_remove"></span></a></td></tr>');
			$(".followup_remove").click(function(){
				var selected = $(this).stairUp({level:3});
				$.ajax({
					url:thisdomain+"clientfollowups/remove",
					data:{id:selected.attr("thisid")},
					type:"post"
				}).done(function(data){
					selected.fadeOut(2000);selected.remove();
					update_rowcount($("#total_followup"),$("#tFollowup tbody tr"));
				});				
			});
			console.log("Data",data);
		})
		.fail(function(err){
			console.log("Err",err);
		});	});	
});
