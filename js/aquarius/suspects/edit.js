$(document).ready(function(){
	console.log("suspect edit");
	$.ajax({
		url:thisdomain+'suspects/getFields/'+$('#client_id').val(),
		type:'get',
		dataType:'json',
		async:false
	}).done(function(fields){
		if(fields['has_internet_connection']=='0'){
			$('.has_internet_connection').hide();
			$('.hic').removeClass('suspectfield');
		}else{
			$('.has_internet_connection').show();
		}
		if(fields['interested']=='0'){
			$('.notinterested').show();
			$('.interested').hide();
		}else{
			$('.interested').show();
			$('.notinterested').hide();
		}
	});
	$(".addPic").click(function(){
		$("#dAddPic").modal();
	});
	$("#btnsavepic").click(function(){
		$(".inp_pic").makekeyvalparam();
		console.log($(".inp_pic").attr("keyval"));
		$.ajax({
			url:thisdomain+"pics/save",
			data:JSON.parse('{'+$(".inp_pic").attr("keyval")+'}'),
			type:"post"
		}).done(function(data){
			console.log("created id : "+data);
			$("#tPic tbody").append('<tr thisid="'+data+'"><td><a>'+$("#pic_name").val()+'</a></td><td class="info"><a>'+$("#pic_hp").val()+'</a>'+$("#pic_email").val()+'</td><td>'+$("#pic_position :selected").text()+'</td><td><a><span class="icon-remove pic_remove"></span></a></td></tr>');
			update_rowcount($("#total_pic"),$("#tPic tbody tr"));
			$(".pic_remove").click(function(){
				selected = $(this).stairUp({level:3});
				$.ajax({
					url:thisdomain+"pics/remove",
					data:{id:selected.attr("thisid")},
					type:"post"
				}).done(function(data){
					console.log(data);
					selected.fadeOut(2000);selected.remove();
					update_rowcount($("#total_pic"),$("#tPic tbody tr"));
				});
			});
		});
	});
	$("#btnsavefollowup").click(function(){
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
		});
	});
	$('#has_internet_connection').change(function(){
		if($(this).val()=='0'){
			$('.has_internet_connection').hide();
			$('.hic').removeClass('suspectfield');
		}
		if($(this).val()=='1'){
			$('.has_internet_connection').show();
			$('.hic').addClass('suspectfield');
		}
	});
	$('#interested').change(function(){
		if($(this).val()=='0'){
			$('.notinterested').show();
			$('.interested').hide();
		}
		if($(this).val()=='1'){
			$('.interested').show();
			$('.notinterested').hide();
		}
	});
	$('.dtpicker').datepicker({dateFormat:'dd/mm/yy'});
	$('#btnsave').click(function(){
			$('.suspectfield').makekeyvalparam();
				console.log("KEYVAL",$('.suspectfield').attr('keyval'));

			$.post(thisdomain+'suspects/update',JSON.parse('{'+$('.suspectfield').attr('keyval')+',"id":"'+$("#myid").val()+'"}'))
			.done(function(res){
				console.log("Res suspect",res);
				$.post(thisdomain+'clients/update',JSON.parse('{'+$('.suspectfield').attr('keyval')+',"id":"'+$("#client_id").val()+'"}'))
				.done(function(res){
					console.log("Res client",res);
					$('#dModal').modal().hideafter({'timeout':2000});
				}).fail(function(){
					alert("Tidak dapat menyimpan data, silakan hubungi Developer");
				});
				$('#dModal').modal().hideafter({'timeout':2000});
			}).fail(function(){
				alert("Tidak dapat menyimpan data, silakan hubungi Developer");
			});
	});
	$('#is_prospect').change(function(){
		if($(this).attr('checked')){
			$.post(thisdomain+'suspects/set_prospect',{id:$('#client_id').val()});
		}else{
			$.post(thisdomain+'suspects/unset_prospect',{id:$('#client_id').val()});
		}
	});
	$("#tPic tbody .pic_remove").click(function(){
		selected = $(this).stairUp({level:3});
		$.ajax({
			url:thisdomain+"pics/remove",
			data:{id:selected.attr("thisid")},
			type:"post"
		}).done(function(data){
			console.log(data);
			selected.fadeOut(2000);selected.remove();
			update_rowcount($("#total_pic"),$("#tPic tbody tr"));
		});
	});
	$("#tPic tbody .pic_edit").click(function(){
		selected = $(this).stairUp({level:3});
		$("#tPic tbody tr").removeClass("selected");
		selected.addClass("selected");
		$.ajax({
			url:'/suspects/getpics',
			data:{id:selected.attr('thisid')},
			type:'post',
			dataType:'json'
		})
		.done(function(res){
			$("#picname").val(res.name);
			$("#pictelp").val(res.telp_hp);
			$("#pichp").val(res.hp);
			$("#picemail").val(res.email);
			$("#picposition").val(res.position);
			$("#dPicEdit").modal();
		})
		.fail(function(err){
			console.log("Err",err);
		});
	});
	$("#btnupdatepic").click(function(){
		id = $("#tPic tbody tr.selected").attr("thisid");
		$.ajax({
			url:'/suspects/updatepic',
			data:{'id':id,'name':$('#picname').val(),
				'telp_hp':$('#pictelp').val(),
				'hp':$('#pichp').val(),
				'email':$('#picemail').val(),
				'position':$('#picposition').val()
			},
			type:'post'
		})
		.done(function(res){
			console.log("Res",res);
			$("#tPic tbody tr.selected").find(".info")
			.html('<a>'+$("#pictelp").val()+' '+$("#pichp").val()+'</a>'+$("#picemail").val())
			$("#tPic tbody tr.selected").find(".position")
			.html($("#picposition").val());
		})
		.fail(function(err){
			console.log("Err",err);
		});
	});
	$(".closemodal").click(function(){
		$(this).stairUp({level:4}).modal("hide");
	})
	$(".btnaddFollowup").click(function(){
		$("#saveFollowup").show();
		$("#updateFollowup").hide();
		$("#dAddFollowup").modal();
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
	$('.myeditor').cleditor({width:'300',height:'160px',controls:"bold italic underline | color highlight removeformat | bullets numbering"});
});
