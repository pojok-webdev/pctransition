changeformat = function (mydate) {
	out = mydate.split("/");
	return out[2] + '-' + out[1] + '-' + out[0];
}
$(document).ready(function () {
	var nDate = new Date();
	var dt = nDate.getDate();
	var mt = nDate.getMonth()+1;
	var yr = nDate.getFullYear();
	var fullDate = yr+"-"+mt+"-"+dt;
	$('#survey_date').getdate().addhour($('#filterhour1')).addminute($('#filterminute1'));
	$('#survey_save').click(function () {
		$('.surveyrequest').makekeyvalparam();
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

		if(tsbranchok && salesbranchok){		
			if ($(this).checkEmpty({className: "emptycheck"})) {
				$.ajax({
					url: thisdomain + 'surveys/save',
					data: JSON.parse('{' + $('.surveyrequest').attr('keyval') + '}'),
					type: 'post',
					async: false
				}).done(function (survey_request_id) {
					$('.clientsite').makekeyvalparam();
					$.ajax({
						url: thisdomain + 'client_sites/save',
						data: JSON.parse('{"survey_request_id":"' + survey_request_id + '",' + $('.clientsite').attr('keyval') + '}'),
						type: 'post',
						async: false
					}).done(function (client_site_id) {
						console.log("CLIENT_SITE_ID",client_site_id);
	/*25ags2015
	 

										var clientname = $("#client_id").val(),
										status = 'test', 
										url = thisdomain+'surveys/edit/'+client_site_id,
										createuser = $('#createuser').val();
										console.log($("#client_id").val());
										sendsurveyrequest(createuser,clientname,status,url,function(subject,bodytext,tsmail,marketingmail){
											sendemail(subject,bodytext,tsmail,marketingmail);
										});
	/*endof 25ags2015*/
						
						
						
						$('.surveysite').makekeyvalparam();
						$.ajax({
							url: thisdomain + 'survey_sites/save',
							data: JSON.parse('{"client_site_id":"' + client_site_id + '","survey_request_id":"' + survey_request_id + '",' + $('.surveysite').attr('keyval') + '}'),
							type: 'post',
							async: false
						}).done(function (survey_site_id) {


	/*3sept2015
	 */

										var clientname = $("#client_id").val(),
										status = 'test', 
										url = thisdomain+'surveys/edit/'+survey_site_id,
										createuser = $('#createuser').val();
										console.log($("#client_id").val());
										/*sendsurveyrequest(createuser,clientname,status,url,function(subject,bodytext,tsmail,marketingmail){
											sendemail(subject,bodytext,tsmail,marketingmail);
										});*/
	/*endof 3sept2015*/

							$.ajax({
								url:thisdomain+'clients/update',
								data:{id:$('#client_id').val(),status:'3'},
								type:'post',
								async:false
							}).fail(function(){
								alert("error clients update");
							}).done(function(data){
								console.log("clients update success "+data);
									console.log("Client site id : "+client_site_id);
									$.ajax({
										url:thisdomain+"site_pics/save",
										data:{
											"client_id":$("#clientid").val(),
											"client_site_id":client_site_id,
											"name":$("#site_pic").val(),
											"position":$("#site_pic_position").val(),
											"hp":$("#pic_phone").val(),
											"email":$("#site_pic_email").val()
											},
										type:"post",
										async:false
									}).done(function(sitepic){

	/*									var clientname = $("#client_id").val(),
										status = 'test', 
										url = thisdomain+'surveys/edit/'+client_site_id,
										createuser = $('#createuser').val();
										console.log($("#client_id").val());
										sendsurveyrequest(createuser,clientname,status,url,function(subject,bodytext,tsmail,marketingmail){
											sendemail(subject,bodytext,tsmail,marketingmail);
										});
		*/							
										$.ajax({
											url:thisdomain+"reminders/save",
											data:{period:"0",perioddetail:fullDate,subject:"Pengajuan Survey",content:'Pengajuan Survey',recipient:"puji@padi.net.id"},
											type:"post",
											async:false
										}).done(function(){
												var str = "",salestr="";
												$("input.tsbranch:checked").each(function(){
													console.log("ts check",$(this).val());
													str+=$(this).val();
												});
												$("input.salesbranch:checked").each(function(){
													console.log("sales check",$(this).val());
													salestr+=$(this).val();
												});
												console.log("BRANCHES",str);
												console.log("CLIENTID",$("#clientid").val());
												$.ajax({
	//												url:thisdomain+"clients/update",
	//												data:{id:$("#clientid").val(),branches:str},
													url:thisdomain+"client_sites/savebranch",
													data:{client_site_id:client_site_id,branches:str},
													type:"post"
												})
												.done(function(data){
													console.log("client id",$("#clientid").val());
													console.log("client updated",data);
													//window.location.href = thisdomain + 'surveys';
													$.ajax({
														url:thisdomain+"client_sites/savesalesbranch",
														data:{client_site_id:client_site_id,branches:salestr},
														type:"post"
													})
													.done(function(data){
														console.log("client id",$("#clientid").val());
														console.log("client updated",data);
														window.location.href = thisdomain + 'surveys';
													})
													.fail(function(err){
														console.log("TIDAK DAPAT MENYIMPOAN BRANCH",err);
													});



												})
												.fail(function(err){
													console.log("TIDAK DAPAT MENYIMPOAN BRANCH",err);
												});

										});
									});
							});
							//window.location.href = thisdomain + 'surveys';
						}).fail(function () {
							alert('Tidak dapat menyimpan survey site, silakan hubungi Developer');
						});
					}).fail(function(){
						alert("Tidak dapat menyimpan Client_site");
					});
				}).fail(function () {
					alert('Tidak dapat menyimpan Pengajuan Survey, silakan hubungi Developer');
				});
			} else {
				$(this).showModal({message: "Pastikan semua field terisi"});
			};
		}else{
			$(this).showModal({message: "Pastikan pilihan cabang tidak kosong"});
		}
	});
	$('#close_form').click(function () {
		window.location.href = thisdomain + 'adm/surveys';
	});
	$("#btnAddPic").click(function(){
		$('#savePic').show();
		$('#savePicSite').hide();
		$('#updatePic').hide();
		$('#updatePicSite').hide();
		$("#dAddPic").modal();
	});
	$("#savePic").click(function(){
		$(".inp_pic").makekeyvalparam();
		$.ajax({
			url:thisdomain+"pics/save",
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
					url:thisdomain+"pics/getbyid",
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
		$(".piclists").each(function(){
			console.log("picid : "+$(this).attr("picid"));
			$(this).removeClass("selected");
		});
		thistr.addClass("selected");
		$("#hapusPicSite").hide();
		$("#hapusPic").show();
		$("#dConfirm").modal();
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
		$.ajax({
			url:thisdomain+"pics/getbyid",
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
	$("#updatePic").click(function(){
		$(".inp_pic").makekeyvalparam();
		$.ajax({
			url:thisdomain+"pics/update",
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
					url:thisdomain+"pics/getbyid",
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
	$("#hapusPic").click(function(){
		console.log($(".piclists.selected").attr("picid"));
		$.ajax({
			url:thisdomain+"pics/remove/",
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
	$("#btnAddPicSite").click(function(){
		$('#savePic').hide();
		$('#savePicSite').show();
		$('#updatePic').hide();
		$('#updatePicSite').hide();
		$("#dAddPic").modal();
	});
	$(".edit_sitepic").click(function(){
		$("#savePic").hide();
		$("#savePicSite").hide();
		$("#updatePic").hide();
		$("#updatePicSite").show();
		$(".sitepiclists").each(function(){
			$(this).removeClass("selected");
		});
		thistr = $(this).stairUp({level:3});
		thistr.addClass("selected");
		$.ajax({
			url:thisdomain+"site_pics/getbyid",
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
	$("#updatePicSite").click(function(){
		$(".inp_pic").makekeyvalparam();
		console.log("ID : " +$(".sitepiclists.selected").attr("picid"));
		$.ajax({
			url:thisdomain+"site_pics/update",
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
					$(this).removeClass("selected");
				});
				thistr = $(this).stairUp({level:3});
				thistr.addClass("selected");
				console.log("PIC ID :: "+thistr.attr("picid"));
				$.ajax({
					url:thisdomain+"site_pics/getbyid",
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
			url:thisdomain+"site_pics/remove/",
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
	$("#savePicSite").click(function(){
		$(".inp_pic").makekeyvalparam();
		$.ajax({
			url:thisdomain+"site_pics/save",
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
					url:thisdomain+"site_pics/getbyid",
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
	$(".closemodal").click(function(){
		$(this).stairUp({level:6}).modal("hide");
	});
$("#tslabel").click(function(){
	console.log("tslabel");
});
$('.myeditor').cleditor({width:'300',height:'160px',controls:"bold italic underline | color highlight removeformat | bullets numbering"});
});
