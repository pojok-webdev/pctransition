(function($){
	$.ajax({
		url:thisdomain+"surveys/getresume",
		data:{id:$("#survey_site_id").val()},
		type:"post"
	}).done(function(data){
		switch(data){
			case "0":
			result = "Belum ada kesimpulan";
			break;
			case "1":
			result = "Bisa dilaksanakan";
			break;
			case "2":
			result = "Bisa dilaksanakan dengan syarat";
			break;
			case "3":
			result = "Tidak dapat dilaksanakan";
			break;
		}
		$("#surveyresult").html(result);
	});
	$("#btndevicepackage").click(function(){
		$("#dPackage").modal();
	});
	$(".choosePackage").click(function(){
		$.ajax({
			url:thisdomain+"surveypackagedetails/jsonbypackageid/"+$(this).attr("thisid"),
			dataType:"json",
		}).done(function(data){
			console.log(data);
			$.each(data,function(detail,device){
				$.ajax({
					url:thisdomain+'survey_devices/save',
					data:{"survey_site_id":$("#survey_site_id").val(),"device_id":device["device_id"],"name":device["device_name"],"amount":device["amount"],"createuser":$("#createuser").val()},
					type:"post",
				}).done(function(data){
					$(".device tbody").append('<tr thisid='+data+'><td class="editable type"><a>'+device["type"]+'</a></td><td class="info editable name"><a>'+device["device_name"]+'</a></td><td class="editable amount">'+device["amount"]+'</td><td><span class="icon-remove device_remove"></span></td></tr>');
					update_rowcount($("#total_device"),$(".device tbody tr"));
					$(".device_remove").click(function(){
						var selected = $(this).stairUp({level:2});
						$.ajax({
							url:thisdomain+"survey_devices/remove",
							data:{"id":selected.attr("thisid")},
							type:"post"
						}).done(function(){
							selected.fadeOut(2000);selected.remove();
							update_rowcount($("#total_device"),$(".device tbody tr"));
						});
					});
					$(".device tbody tr td.editable").click(function(){
						selected = $(this).stairUp({level:1});
						$.ajax({
							url:thisdomain+"survey_devices/jsonbyid/"+$(this).stairUp({level:1}).attr("thisid"),
							type:"get",
							dataType:"json",
						}).done(function(data){
							$("#device_type").selectopt(data["devicetype_id"]);
							$("#device_name").populateCombo({
								url:thisdomain+"devices/getdevice/"+data["devicetype_id"],
								selected:data["device_id"],
								keyvalpaired:true,
								namebasedselect:false
							});
							$("#device_description").val(data["description"]);
							$("#device_amount").val(data["amount"]);
							$("#myDeviceLabel").html("Update Peralatan");
							$("#updatesurveydevice").show();
							$("#savesurveydevice").hide();
							$(".device tbody tr").removeClass("selected");
							selected.addClass("selected");
							$("#dAddDevice").modal("show");
						}).fail(function(){
							console.log("Tidak dapat mengambil data, silakan hubungi Developer");
						});
					});
				});
			});
		});
	});
	$(".closemodal").click(function(){
		$(this).stairUp({level:5}).modal("hide");
	});
	$(".device_remove").click(function(){
		var selected = $(this).stairUp({level:2});
		$.ajax({
			url:thisdomain+"survey_devices/remove",
			data:{"id":selected.attr("thisid")},
			type:"post"
		}).done(function(data){
			console.log(selected.attr(data));
			selected.fadeOut(2000);selected.remove();
			update_rowcount($("#total_device"),$(".device tbody tr"));
		});
	});
	$(".survey_save").click(function(){
		var thiselement = $(this);
		var thisstatus='3';
		var result;
		$("#survey_date").getdate().addhour($("#surveyhour")).addminute($("#surveyminute"));
		switch(thiselement.attr('resume')){
			case '1':
			thisstatus='9';
			break;
			case '2':
			thisstatus='9';
			break;
			case '0':
			thisstatus='3';
			break;
		}
		if($('#longresume').val()==='' && surveydatehaschange($('#workplace').attr('survey_id'))){
			$(this).showModal({
				message:"Jika telah mengganti waktu survey, keterangan tidak boleh kosong",
				expire:2000
			});
		}else{
			$('.surveyrequest').makekeyvalparam();
			console.log('Keyval: '+$('.surveyrequest').attr("keyval"));
			$.ajax({
				url:thisdomain+'surveys/update',
				data:JSON.parse('{"id":"'+$('#workplace').attr('survey_id')+'","resume":"'+thiselement.attr('resume')+'",'+$('.surveyrequest').attr('keyval')+'}'),
				type:'POST',
				async:false
			}).done(function(data){
				console.log("these are : "+data);
				$('.surveysite').makekeyvalparam();
				$.ajax({
					url:thisdomain+'survey_sites/update',
					data:JSON.parse('{"id":"'+$('#workplace').attr('site_id')+'","resultsent":"0",'+$('.surveysite').attr('keyval')+'}'),
					type:'POST',
					async:false
				}).done(function(){
					$('#surveyresult').html(thiselement.text());
					var createuser = $('#createuser').val(),
					clientname = $("#client_name").val(),
					status = thiselement.text(),
					url = thisdomain+"surveys/edit/"+$('#workplace').attr('site_id'),
					reporturl = thisdomain+"surveys/showreport/"+$('#workplace').attr('site_id');
					//sendsurveyresult(createuser,clientname,status,url,reporturl);
				}).fail(function(){
					alert('Tidak dapat mengupdate Survey Request, silakan hubungi Developer');
				});
			});
			$('#dModal').modal().hideafter({timeout:2000});
		}
	});
	$("#btnAddPicSite").click(function(){
		$("#savePicSite").show();
		$("#updatePicSite").hide();
		$("#addPicLabel").html("Penambahan PIC");
		$("#dAddPic").modal();
	});
	$(".edit_sitepic").click(function(){
		$("#savePicSite").hide();
		$("#updatePicSite").show();
		$("#addPicLabel").html("Edit PIC");
		thistr = $(this).stairUp({level:3});
		$(".sitepiclists").each(function(){
			$(this).removeClass("selected");
		});
		thistr.addClass("selected");
		$("#dAddPic").modal();
	});
	$("#savePicSite").click(function(){
		$(".inp_pic").makekeyvalparam();
		$.ajax({
			url:thisdomain+"site_pics/save",
			data:JSON.parse('{'+$(".inp_pic").attr("keyval")+'}'),
			type:"post"
		}).fail(function(){
			console.log("Tidak ");
		}).done(function(data){
			$("#listpicsite").append('<div class="item clearfix sitepiclists" picid='+data+'><div class="infopic"><div><a class="name">'+$("#pic_name").val()+'</a><br />'+$("#pic_position :selected").text()+'<p /></div><span>'+$("#pic_email").val()+'<br />'+$("#pic_hp").val()+'</span><div class="controls"><a class="icon-pencil edit_sitepic"></a><a class="icon-remove remove_sitepic"></a></div></div></div>');
			$(".edit_sitepic").click(function(){
				thistr = $(this).stairUp({level:3});
				$(".sitepiclists").each(function(){
					$(this).removeClass("selected");
				});
				thistr.addClass("selected");
				$("#savePicSite").hide();
				$("#updatePicSite").show();
				$("#addPicLabel").html("Edit PIC");
				$("#dAddPic").modal();
			});
			$(".remove_sitepic").click(function(){
				thistr = $(this).stairUp({level:3});
				$(".sitepiclists").each(function(){
					$(this).removeClass("selected");
				});
				thistr.addClass("selected");
				$("#dConfirm").modal();
			});
		});
	});
	$("#updatePicSite").click(function(){
		$(".inp_pic").makekeyvalparam();
		$.ajax({
			url:thisdomain+"site_pics/update",
			data:JSON.parse('{"id":"'+$(".sitepiclists.selected").attr("picid")+'",'+$(".inp_pic").attr("keyval")+'}'),
			type:"post"
		}).done(function(data){
			$(".sitepiclists.selected").html('<div class="infopic"><div><a class="name">'+$("#pic_name").val()+'</a><br />'+$("#pic_position :selected").text()+'<p /></div><span>'+$("#pic_email").val()+'<br />'+$("#pic_hp").val()+'</span><div class="controls"><a class="icon-pencil edit_sitepic"></a><a class="icon-remove remove_sitepic"></a></div></div>');
			$(".edit_sitepic").click(function(){
				thistr = $(this).stairUp({level:3});
				$(".sitepiclists").each(function(){
					$(this).removeClass("selected");
				});
				thistr.addClass("selected");
				$("#savePicSite").hide();
				$("#updatePicSite").show();
				$("#addPicLabel").html("Edit PIC");
				$("#dAddPic").modal();
			});
			$(".remove_sitepic").click(function(){
				thistr = $(this).stairUp({level:3});
				$(".sitepiclists").each(function(){
					$(this).removeClass("selected");
				});
				thistr.addClass("selected");
				$("#dConfirm").modal();
			});
		});
	});
	$(".remove_sitepic").click(function(){
		thistr = $(this).stairUp({level:3});
		$(".sitepiclists").each(function(){
			$(this).removeClass("selected");
		});
		thistr.addClass("selected");
		$("#dConfirm").modal();
	});
	$("#hapusPicSite").click(function(){
		$.ajax({
			url:thisdomain+"site_pics/remove",
			data:{"id":$(".sitepiclists.selected").attr("picid")},
			type:"post"
		}).done(function(){
			$("#dConfirm").modal("hide");
			$(".sitepiclists.selected").hide();
		});
	});
}(jQuery));
surveydatehaschange = function(surveyid){
	var result;
	$.ajax({
		url:thisdomain+'surveys/get_by_id/',
		data:{id:surveyid},
		dataType:'json',
		type:'POST',
		success:function(data){
			$("#survey_date").getdate().addhour($("#surveyhour")).addminute($("#surveyminute")).addminute($("#surveysecond"));
			console.log($('#survey_date').attr('datetime'));
			if(data['survey_date']==$('#survey_date').attr('datetime')){
				result = false;
			}else{
				result = true;
			};
		},
		async:false
	});
	return false;
}
$('.myeditor').cleditor({width:'300',height:'100',controls:"bold italic underline | color highlight removeformat | bullets numbering"});
