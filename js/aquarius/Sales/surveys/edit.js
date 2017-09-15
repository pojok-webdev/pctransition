changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}
$(document).ready(function(){
	var today = new Date();
	var year = today.getFullYear();
	var month = today.getMonth()+1;
	var day = today.getDate();
	var minute = today.getMinutes();
	var hour = today.getHours();
	console.log(year+"-"+month+"-"+day+" "+hour+":"+minute);
	$('#survey_date').getdate().addhour($('#filterhour1')).addminute($('#filterminute1'));
	$('#survey_save').click(function(){
		console.log("save button clicked");
		$('.surveyrequest').makekeyvalparam();
		console.log($('.surveyrequest').attr("keyval"));
		var tsbranchok = false,salesbranchok = false;
		$(".tsbranch").each(function(){
			if($(".tsbranch").is(":checked")){
				tsbranchok = true;
			}
		});
		$(".salesbranch").each(function(){
			if($(".salesbranch").is(":checked")){
				salesbranchok = true;
			}
		});
		console.log("you clicked save button");
		
		if(tsbranchok && salesbranchok){
			if($(this).checkEmpty({className:"emptycheck"})){
				$.ajax({
					url:'/surveys/update',
					data:JSON.parse('{'+$('.surveyrequest').attr('keyval')+'}'),
					type:'post',
					async:false
				}).done(function(survey_request_query){
					$('.clientsite').makekeyvalparam();
					var today = new Date();
					var year = today.getFullYear();
					var month = today.getMonth()+1;
					var day = today.getDate();
					var minute = today.getMinutes();
					var hour = today.getHours();
					var survey_request_id = $("#survey_request_id").val();
					console.log("Keyval : "+$('.clientsite').attr('keyval'));
					console.log("survey_request_id : "+survey_request_id);
					$.ajax({
						url:"/reminders/save",
						data:{period:"0",perioddetail:year+"-"+month+"-"+day+" "+hour+":"+minute,recipient:"puji@padi.net.id"},
						type:"post",
						async:false
					})
					.done(function(res){
						console.log("Reminder save success",res);
					})
					.fail(function(err){
						console.log("Reminder save error",err);
					});
					$.ajax({
						url:'/client_sites/update',
						data:JSON.parse('{"survey_request_id":"'+survey_request_id+'",'+$('.clientsite').attr('keyval')+'}'),
						type:'post',
						async:false
					}).done(function(client_site_query){
						$('.surveysite').makekeyvalparam();
						console.log("Query : "+client_site_query);
						console.log("survey_site : "+$('.surveysite').attr("keyval"));
						$.ajax({
							url:'/survey_sites/update',
							data:JSON.parse('{"survey_request_id":"'+survey_request_id+'",'+$('.surveysite').attr('keyval')+'}'),
							type:'post',
							async:false
						}).done(function(survey_site_query){
							console.log("sukses");
							console.log(survey_site_query);
							$.post('/clients/update',{id:$('#client_id').val(),status:'3'}).done(function(datax){
									var str = "",salestr = "";
									$("input.tsbranch:checked").each(function(){
										console.log("check",$(this).val());
										str+=$(this).val();
									});
									$("input.salesbranch:checked").each(function(){
										console.log("check",$(this).val());
										salestr+=$(this).val();
									});
									console.log("BRANCHES",str);
									console.log("CLIENTID",$("#clientid").val());
									$.ajax({
										url:"/client_sites/savebranch",
										data:{client_site_id:$("#client_site_id").val(),branches:str},
										type:"post"
									})
									.done(function(data){
										console.log("client id",$("#clientid").val());
										console.log("client updated",data);
									//	window.location.href = '/surveys';
										$.ajax({
											url:"/client_sites/savesalesbranch",
											data:{client_site_id:$("#client_site_id").val(),branches:salestr},
											type:"post"
										})
										.done(function(data){
											console.log("client id",$("#clientid").val());
											console.log("client updated",data);
											window.location.href = '/surveys';
										})
										.fail(function(err){
											console.log("TIDAK DAPAT MENYIMPOAN sales BRANCH",err);
										});
									})
									.fail(function(err){
										console.log("TIDAK DAPAT MENYIMPOAN BRANCH",err);
									});
							});
							//window.location.href = '/surveys';
						}).fail(function(){
							alert('Survey Site Failed, Tidak dapat menyimpan, silakan hubungi Developer');
						});
					}).fail();
				}).fail(function(err){
					console.log("Error save survey",err);
					alert("Error menyimpan");
				});
			}else{
				$(this).showModal({message:"Pastikan semua field terisi"});
			};
		}else{
			$(this).showModal({message:"Pastikan pilihan cabang tidak kosong"});
		}
	});
	$('#close_form').click(function(){
		window.location.href = '/adm/surveys';
	});
	$("#btnAddPic").click(function(){
		$("#savePic").show();
		$("#savePicSite").hide();
		$("#updatePic").hide();
		$("#updatePicSite").hide();
		$("#dAddPic").modal();
	});
	$("#savePic").click(function(){
		$(".inp_pic").makekeyvalparam();
		$.ajax({
			url:"/pics/save",
			data:JSON.parse('{'+$(".inp_pic").attr('keyval')+'}'),
			type:"post"
		}).done(function(data){
			$("#listusers").append('<div class="item clearfix piclists" picid='+data+'><div class="infopic"><div><a class="name">'+$("#pic_name").val()+'</a><br />'+$("#pic_position :selected").text()+'<p /></div><span>'+$("#pic_email").val()+'<br />'+$("#pic_hp").val()+'</span><div class="controls"><a href="#" class="icon-pencil edit_pic"></a> <a href="#" class="icon-remove remove_pic"></a></div></div></div>');
			$("#dAddPic").modal("hide");

			$(".edit_pic").click(function(){
				$("#savePic").hide();
				$("#updatePic").show();
				thistr = $(this).stairUp({level:3});
				thistr.addClass("selected");
				console.log(thistr.attr("picid"));
				$.ajax({
					url:"/pics/getbyid",
					data:{id:thistr.attr("picid")},
					type:"post",
					dataType:"json"
				}).done(function(data){
					console.log(data["name"]);
					console.log(data);
					$("#pic_name").val(data["name"]);
					$("#pic_email").val(data["email"]);
					$("#pic_hp").val(data["hp"]);
					$("#pic_position option").each(function(){
						if($(this).text()===data["position"]){
							$(this).attr("selected","selected");
						}
					});
				}).fail(function(){
					console.log("tidak dapat load data");
				});
				$("#dAddPic").modal();
			});
			$(".remove_pic").click(function(){
				thistr = $(this).stairUp({level:3});
				thistr.addClass("selected");
				$("#hapusPicSite").hide();
				$("#hapusPic").show();
				$("#dConfirm").modal();
			});

		});
	});
	$(".remove_pic").click(function(){
		thistr = $(this).stairUp({level:3});
		thistr.addClass("selected");
		$("#hapusPicSite").hide();
		$("#hapusPic").show();
		$("#dConfirm").modal();
	});
	$("#hapusPic").click(function(){
		console.log($(".piclists.selected").attr("picid"));
		$.ajax({
			url:"/pics/remove/",
			data:{id:$(".piclists.selected").attr("picid")},
			type:"post"
		}).done(function(data){
			$("#dConfirm").modal("hide");
			$(".piclists.selected").remove();
			console.log(data);
		}).fail(function(){
			console.log("Tidak berhasil");
		});
	});
	$(".edit_pic").click(function(){
		$("#savePic").hide();
		$("#savePicSite").hide();
		$("#updatePicSite").hide();
		$("#updatePic").show();
		$(".piclists").each(function(){
			console.log("picid : "+$(this).attr("picid"));
			$(this).removeClass("selected");
		});
		thistr = $(this).stairUp({level:3});
		thistr.addClass("selected");
		//console.log(thistr.attr("picid"));
		$.ajax({
			url:"/pics/getbyid",
			data:{id:thistr.attr("picid")},
			type:"post",
			dataType:"json"
		}).done(function(data){
			//console.log(data["name"]);
			//console.log(data);
			$("#pic_name").val(data["name"]);
			$("#pic_email").val(data["email"]);
			$("#pic_hp").val(data["hp"]);
			$("#pic_position option").each(function(){
				if($(this).text()===data["position"]){
					$(this).attr("selected","selected");
				}
			});
		}).fail(function(){
			console.log("tidak dapat load data");
		});
		$("#dAddPic").modal();
	});
	$("#updatePic").click(function(){
		$(".inp_pic").makekeyvalparam();
		$.ajax({
			url:"/pics/update",
			data:JSON.parse('{"id":"'+$(".piclists.selected").attr("picid")+'",'+$(".inp_pic").attr('keyval')+'}'),
			type:"post"
		}).done(function(data){
			$(".piclists.selected").html('<div class="infopic"><div><a class="name">'+$("#pic_name").val()+'</a><br />'+$("#pic_position :selected").text()+'<p /></div><span>'+$("#pic_email").val()+'<br />'+$("#pic_hp").val()+'</span><div class="controls"><a class="icon-pencil edit_pic"></a><a class="icon-remove remove_pic"></a></div></div>');
			$(".remove_pic").bind("click",function(){
				$(".piclists").each(function(){
					console.log("picid : "+$(this).attr("picid"));
					$(this).removeClass("selected");
				});
				thistr = $(this).stairUp({level:3});
				thistr.addClass("selected");
				$("#hapusPicSite").hide();
				$("#hapusPic").show();
				$("#dConfirm").modal();
			});
			$(".edit_pic").bind("click",function(){
				$("#savePic").hide();
				$("#savePicSite").hide();
				$("#updatePic").show();
				$("#updatePicSite").hide();
				$(".piclists").each(function(){
					console.log("picid : "+$(this).attr("picid"));
					$(this).removeClass("selected");
				});
				thistr = $(this).stairUp({level:3});
				thistr.addClass("selected");
				console.log("after edit PICID"+thistr.attr("picid"));
				$.ajax({
					url:"/pics/getbyid",
					data:{id:thistr.attr("picid")},
					type:"post",
					dataType:"json"
				}).done(function(data){
					console.log(data["name"]);
					console.log(data);
					$("#pic_name").val(data["name"]);
					$("#pic_email").val(data["email"]);
					$("#pic_hp").val(data["hp"]);
					$("#pic_position option").each(function(){
						if($(this).text()===data["position"]){
							$(this).attr("selected","selected");
						}
					});
				}).fail(function(){
					console.log("tidak dapat load data");
				});
				$("#dAddPic").modal();
			});

			console.log(data);
		}).fail(function(){
			console.log("tidak dapat mengupdate");
		});
	});
	$(".closemodal").click(function(){
		$(this).stairUp({level:6}).modal("hide");
	});
	$("#btnAddPicSite").click(function(){
		$("#savePic").hide();
		$("#savePicSite").show();
		$("#updatePic").hide();
		$("#updatePicSite").hide();
		$("#dAddPic").modal();
	});
	$("#savePicSite").click(function(){
		$(".inp_pic").makekeyvalparam();
		$.ajax({
			url:"/site_pics/save",
			data:JSON.parse('{'+$(".inp_pic").attr('keyval')+'}'),
			type:"post"
		}).done(function(data){
			$("#listpicsite").append('<div class="item clearfix sitepiclists" picid='+data+'><div class="infopic"><div><a class="name">'+$('#pic_name').val()+'</a><br />'+$('#pic_position :selected').text()+'<p /></div><span>'+$('#pic_email').val()+'<br />'+$("#pic_hp").val()+'</span><div class="controls"><a class="icon-pencil edit_sitepic"></a><a class="icon-remove remove_sitepic"></a></div></div></div>');
			$(".edit_sitepic").click(function(){
				$("#savePic").hide();
				$("#savePicSite").hide();
				$("#updatePic").hide();
				$("#updatePicSite").show();
				thistr = $(this).stairUp({level:3});
				thistr.addClass("selected");
				console.log(thistr.attr("picid"));
				$.ajax({
					url:"/site_pics/getbyid",
					data:{id:thistr.attr("picid")},
					type:"post",
					dataType:"json"
				}).done(function(data){
					$("#pic_name").val(data["name"]);
					$("#pic_email").val(data["email"]);
					$("#pic_hp").val(data["hp"]);
					$("#pic_position option").each(function(){
						if($(this).text()===data["position"]){
							$(this).attr("selected","selected");
						}
					});
				}).fail(function(){
					console.log("tidak dapat load data");
				});
				$("#dAddPic").modal();
			});
			$(".remove_sitepic").click(function(){
				thistr = $(this).stairUp({level:3});
				thistr.addClass("selected");
				$("#hapusPicSite").show();
				$("#hapusPic").hide();
				$("#dConfirm").modal();
			});

		}).fail(function(){
			console.log("Tidak dapat menyimpan PIC Site");
		});
	});
	$(".edit_sitepic").click(function(){
		$("#savePic").hide();
		$("#savePicSite").hide();
		$("#updatePic").hide();
		$("#updatePicSite").show();
		$(".sitepiclists").each(function(){
			//console.log("picid : "+$(this).attr("picid"));
			$(this).removeClass("selected");
		});
		thistr = $(this).stairUp({level:3});
		thistr.addClass("selected");
		//console.log(thistr.attr("picid"));
		$.ajax({
			url:"/site_pics/getbyid",
			data:{id:thistr.attr("picid")},
			type:"post",
			dataType:"json"
		}).done(function(data){
			//console.log(data["name"]);
			//console.log(data);
			$("#pic_name").val(data["name"]);
			$("#pic_email").val(data["email"]);
			$("#pic_hp").val(data["hp"]);
			$("#pic_position option").each(function(){
				if($(this).text()===data["position"]){
					$(this).attr("selected","selected");
				}
			});
		}).fail(function(){
			console.log("tidak dapat load data");
		});
		$("#dAddPic").modal();
	});
	$("#updatePicSite").click(function(){
		$(".inp_pic").makekeyvalparam();
//		console.log($(".inp_pic").attr("keyval"));
		console.log("ID : " +$(".sitepiclists.selected").attr("picid"));
		$.ajax({
			url:"/site_pics/update",
			data:JSON.parse('{"id":"'+$(".sitepiclists.selected").attr("picid")+'",'+$(".inp_pic").attr('keyval')+'}'),
			type:"post"
		}).done(function(data){
			$(".sitepiclists.selected").html('<div class="infopic"><div><a class="name">'+$("#pic_name").val()+'</a><br />'+$("#pic_position :selected").text()+'<p /></div><span>'+$("#pic_email").val()+'<br />'+$("#pic_hp").val()+'</span><div class="controls"><a class="icon-pencil edit_sitepic"></a><a class="icon-remove remove_sitepic"></a></div></div>');
			$(".remove_sitepic").bind("click",function(){
				$(".sitepiclists").each(function(){
					console.log("picid : "+$(this).attr("picid"));
					$(this).removeClass("selected");
				});
				thistr = $(this).stairUp({level:3});
				thistr.addClass("selected");
				$("#hapusPicSite").show();
				$("#hapusPic").hide();
				$("#dConfirm").modal();
			});


			$(".edit_sitepic").bind("click",function(){
				$("#savePic").hide();
				$("#savePicSite").hide();
				$("#updatePicSite").show();
				$("#updatePic").hide();
				$(".sitepiclists").each(function(){
					//console.log("picid : "+$(this).attr("picid"));
					$(this).removeClass("selected");
				});
				thistr = $(this).stairUp({level:3});
				thistr.addClass("selected");
				console.log("PIC ID :: "+thistr.attr("picid"));
				$.ajax({
					url:"/site_pics/getbyid",
					data:{id:thistr.attr("picid")},
					type:"post",
					dataType:"json"
				}).done(function(data){
					console.log(data["name"]);
					console.log(data);
					$("#pic_name").val(data["name"]);
					$("#pic_email").val(data["email"]);
					$("#pic_hp").val(data["hp"]);
					$("#pic_position option").each(function(){
						if($(this).text()===data["position"]){
							$(this).attr("selected","selected");
						}
					});
				}).fail(function(){
					console.log("tidak dapat load data");
				});
				$("#dAddPic").modal();
			});

			console.log(data);
		}).fail(function(){
			console.log("tidak dapat mengupdate");
		});
	});
	$(".remove_sitepic").click(function(){
		$(".sitepiclists").each(function(){
			console.log("picid : "+$(this).attr("picid"));
			$(this).removeClass("selected");
		});
		thistr = $(this).stairUp({level:3});
		thistr.addClass("selected");
		$("#hapusPicSite").show();
		$("#hapusPic").hide();
		$("#dConfirm").modal();
	});
	$("#hapusPicSite").click(function(){
		console.log($(".piclists.selected").attr("picid"));
		$.ajax({
			url:"/site_pics/remove/",
			data:{id:$(".sitepiclists.selected").attr("picid")},
			type:"post"
		}).done(function(data){
			$("#dConfirm").modal("hide");
			$(".sitepiclists.selected").remove();
			console.log(data);
		}).fail(function(){
			console.log("Tidak berhasil");
		});
	});
	$('.myeditor').cleditor({width:'300',height:'160px',controls:"bold italic underline | color highlight removeformat | bullets numbering"});
});
