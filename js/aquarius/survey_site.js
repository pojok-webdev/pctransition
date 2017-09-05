//BEGIN OF SURVEY SITE
surveysite_save = function(){
	$.post(thisdomain+'adm/surveysite_update',{id:$('#workplace').attr('survey_site_id'),address:$('#address').val(),city:$('#city').val(),pic:$('#pic').val(),pic_position:$('#pic_position').val(),phone_area:$('#phone_area').val(),phone:$('#phone').val(),pic_email:$('#pic_email').val(),location_s:$('#location_s').val(),location_e:$('#location_e').val(),bearing:$('#bearing').val(),amsl:$('#amsl').val(),agl:$('#agl').val(),description:$('#description').val(),execution_date:$("#execution_date").getdate().addhour($('#execution_hour')).addminute($('#execution_minute')).attr('datetime'),}).fail(function(){alert('gagal');}).done(function(data){});
}
//BTS DISTANCE

createsurveybtsdistance = function(id,los){
	$('.btsdistance').append('<tr><td class="info"><a>'+$("#bts_id :selected").text()+'</a> <span></span> <span></span></td><td>'+los+'</td><td>'+$('#bts_distance').val()+'</td><td><a><span onClick="removesurveysite()" class="icon-remove pointer btsdistance_remove"  btsdistance_id='+id+'></span></a></td></tr>');
	$('.btsdistance_remove').bind('click',function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(thisdomain+"adm/btsdistance_remove",{btsdistance_id:$(this).attr('btsdistance_id')}).done(function(data){

		}).fail(function(data){
			alert('Tidak dapat menghapus jarak bts, silakan hubungi Developer');
		});
	});
}
//END OF BTS DISTANCE

//BEGIN OF DEVICE

createsurveydevice = function(id){
	$('.device').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+thisdomain+'img/aquarius/example_full.jpg"><img src="'+thisdomain+'img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td><td class="info"><a class="fancybox" rel="group" href="'+thisdomain+'img/aquarius/example_full.jpg">'+$("#device_name :selected").text()+'</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td><td>'+$('#device_amount').val()+'</td><td><a href="#"><span class="icon-pencil"></span></a> <a><span onClick="removesurveysite()" class="icon-remove pointer device_remove"  device_id='+id+' site_id=1></span></a></td></tr>');

	$('.device_remove').bind('click',function(){
		$(this).parent().parent().parent().remove();
		$.post(thisdomain+"adm/survey_removedevice",{device_id:$(this).attr('device_id')}).done(function(data){}).fail(function(){alert('gagal remove peralatan');});
		update_rowcount($("#total_device"),$(".device tbody tr"));
	});
}

insertsurveydevice = function(){
	$.post(thisdomain+'adm/addsurveydevice',{survey_site_id:$('#saveSurveyMaterial').attr('survey_site_id'),device_name:$('#device_name').val(),amount:$('#device_amount').val()}).fail(function(){alert('gagal menambah peralatan');}).done(function(data){createsurveydevice(data);});
	addsurveydevice();
}

//END OF DEVICE
//BEGIN OF CABANGKLIEN

createsurveyotherclient = function(id){
	$('.otherclient').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+thisdomain+'img/aquarius/example_full.jpg"><img src="'+thisdomain+'img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td><td class="info"><a class="fancybox" rel="group" href="'+thisdomain+'img/aquarius/example_full.jpg">'+$("#client_id :selected").text()+'</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td><td>'+$("#distance").val()+'</td><td><a href="#"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer otherclient_remove" ></span></a></td></tr>');

	$('.otherclient_remove').bind('click',function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(thisdomain+"adm/survey_removeotherclent",{id:id}).done(function(data){}).fail(function(){alert('gagal menghapus pelanggan lain');});
	});
}

addotherclient = function(){

}

populate_image = function(image_id,path,nama,user_name){

	$('.gambar').append("<tr image_id="+image_id+" image_path="+path+"><td><a class='fancybox' rel='group' href='"+baseurl+"media/surveys/"+path+"'><img src='"+baseurl+"media/surveys/"+path+"' class='img-polaroid' width=50 height=38 /></a></td><td class='info'><a>"+nama+"</a> <span>"+path+"</span> <span>"+Date.now()+"</span></td><td>"+user_name+"</td><td><a><span class='icon-remove removesurveyimage' id="+image_id+"></span></a></td></tr>");
	$('#'+image_id).bind('click',function(){
		$(this).parent().parent().parent().fadeOut(200);
		removesurveyimage($(this).parent().parent().parent().attr('image_id'));
		$.post(thisdomain+'adm/remove_image_path',{path:'./media/surveys/'+path});
		update_rowcount($("#total_image"),$(".gambar tbody tr"));
	});
}

populate_other_site = function(){
	$(".otherclient").append("<tr><td><a>"+$("#site_id :selected").text()+"</a></td><td class='info'><a>"+$("#site_distance").val()+"</a></td><td>"+$("#site_distance").val()+"</td><td><a href='#'><span class='icon-pencil'></span></a> <a><span class='icon-remove pointer link_navRemCabangKlien otherclient_remove' id="+""+" ></span></a></td></tr>");
}

saveotherclient = function(){
	$.post(thisdomain+'adm/addotherclient',{survey_site_id:$('#saveSurveyMaterial').attr('survey_site_id'),client_id:$('#client_id').val(),distance:$('#distance').val()}).fail(function(){alert('gagal menyimpan pelanggan lain');}).done(function(data){createsurveyotherclient(data);});
	addotherclient();

}
//END OF CABANGKLIEN

initimageupload = function(){
	var btnUpload=$('#uploadsurveyimage');
	var status=$('#status');
	new AjaxUpload(btnUpload, {
		action: thisdomain+'adm/upload_tmp',
		name: 'uploadfile',
		onSubmit: function(file, ext){
		if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
			// extension is not allowed
			status.text('Only JPG, PNG or GIF files are allowed');
			return false;
		}
		status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			//Add uploaded file to list
			if(response==="success"){
				$('#path').val(file);
			}
		}

	});
}

	removesurveyimage = function(image_id){
		$.post(thisdomain+'adm/surveyimage_remove',{id:image_id}).done(function(data){}).fail(function(){alert('gagal remove image');});
	}


	/*puji:mengisi ap berdasarkan bts*/
	$.fn.fill_ap = function(btsid,selected){
		$(this).html("");
		thisap = $(this);
		thisap.append('<option value="Belum ada AP" selected=selected>Belum ada AP</option>');
		$.getJSON('/aps/get_name_by_bts/'+btsid,function(data){
			$.each(data,function(x,y){
				if(selected==y){
					thisap.append('<option value='+y+' selected=selected>'+y+'</option>');
				}else{
					thisap.append('<option value='+y+'>'+y+'</option>');
				}
			});
		});
	}

$(document).ready(function(){
	initimageupload();

	if($("#losnlosselect :selected").text()=="NLOS"){
		$(".losap").hide();
	}else{
		$(".losap").show();
	}


	$('.btsdistance_edit').click(function(){
		btsdistance_id = $(this).parent().parent().parent().attr('id');
		$("#updatebtsdistance").show();
		$("#savebtsdistance").hide();
		$.getJSON(thisdomain+'survey_bts_distances/get/'+btsdistance_id,function(data){
			$('#bts_id').val(data['btstower_id']);
			$("#updatebtsdistance").attr("btsdistance_id",data['id']);
			$('#apselect').fill_ap(data['btstower_id'],data['ap']);
			$('#bts_distance').val(data['distance']);
			$('#losnlosselect').val(data['los']);
		});
		/*
		if($('#savebtsdistance').hasClass("savebtsdistance")){
			$('#savebtsdistance').removeClass("savebtsdistance");
			$('#savebtsdistance').addClass("editbtsdistance");
			$(".savebtsdistance").unbind("click");
			$(".editbtsdistance").bind("click",function(){
				$.post(thisdomain+'survey_bts_distance/edit',{id:$(this).attr('btsdistance_id'),btstower_id:$("#bts_id").val(),ap:$("#apselect :selected").text(),distance:$("#bts_distance").val(),los:$("#losnlosselect").val(),description:$("#bts_description").val()}).done(function(data){
					alert(data);
					});

			});
		}*/
		$("#savebtsdistance").attr('btsdistance_id',btsdistance_id)
		$('#dAddBTSDistance').modal();
	});
	//inisialisasi device
	$("#device_name").html("");
		$.getJSON(thisdomain+'devices/getdevice/1',function(data){
			$.each(data,function(x,y){
				filldeviceopt(x,y);
			});
			$(deviceopt).appendTo("#device_name");
		});

	//end of inisialisasi device

    $('.addbtsdistance').click(function(){
		if($("#savebtsdistance").hasClass("editbtsdistance")){
			$("#savebtsdistance").removeClass("editbtsdistance");
			$("#savebtsdistance").addClass("savebtsdistance");
		}
		$("#apselect").fill_ap($("#bts_id").val(),null);
		$("#dAddBTSDistance").modal("show");
	});

	$('.editbtsdistance').click(function(){
		$.post(thisdomain+'survey_bts_distance/edit',{id:$(this).attr('btsdistance_id'),btstower_id:$("#bts_id").val(),ap:$("#apselect :selected").text(),distance:$("#bts_distance").val(),los:$("#losnlosselect").val(),description:$("#bts_description").val()}).done(function(data){
			alert(data);
			});
	});

    $(".btn_addsurveyimage").click(function(){
		$("#dAddSurveyImage").modal("show");
	});

    $('#bts_id').change(function(){
		$("#apselect").fill_ap($(this).val(),null);
	});

	$(".closemodal").click(function(){
		$(this).parent().parent().parent().parent().parent().parent().modal("hide");
	});

	$(".device_remove").click(function(){
		$(this).parent().parent().parent().remove();
        $.post(thisdomain+"adm/survey_removedevice",{device_id:$(this).attr('device_id')}).done(function(data){}).fail(function(){alert('gagal');});
		update_rowcount($("#total_device"),$(".device tbody tr"));
	});

    $('#losnlosselect').change(function(){
		if($("#losnlosselect :selected").text()=="NLOS"){
			$(".losap").hide();
		}else{
			$(".losap").show();
		}

		//$('.losap').toggle();

	});

	$(".material_remove").click(function(){
		$(this).parent().parent().parent().remove();
		$.post(thisdomain+"adm/material_remove",{id:$(this).attr('id')}).done(function(data){
			$("#total_material").html($("#tsurveymaterial tbody tr:last").index()+1);
			})
	});

	$('#surveysite_save').click(function(){
		surveysite_save();
		setTimeout(function(){
			$('#dModal').modal('hide');
			},1000);
	});

	$('#add_surveyimage').click(function(){
		addsurveyimage();
	});

	$(".btnadddevice").click(function(){
		$("#dAddDevice").modal("show");
	});

	$('.removesurveyimage').click(function(){
		$(this).parent().parent().parent().fadeOut(200);
		removesurveyimage($(this).parent().parent().parent().attr('image_id'));
		$.post(thisdomain+'adm/remove_image_path',{path:'./media/surveys/'+$(this).parent().parent().parent().attr('image_path')});
		$("#total_image").html($(".gambar tbody tr:last").index());
//		update_rowcount($("#total_image"),$(".gambar tbody tr"));
	});

	/*start of btsdistance*/
	//dtbtsdistance = $(".btsdistance").dataTable();
    $('.btsdistance_remove').click(function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(thisdomain+"adm/btsdistance_remove",{btsdistance_id:$(this).attr('btsdistance_id')}).done(function(data){
			$("#total_bts").html($(".btsdistance tbody tr:last").index());
		}).fail(function(data){
			alert('Tidak dapat menghapus BTS, silakan hubungi Developer');
		});
        return false;
	});

	$('#savebtsdistance').click(function(){
		$.post(thisdomain+'survey_bts_distances/addbtsdistance',{survey_site_id:$('#workplace').attr('survey_site_id'),btstower_id:$('#bts_id').val(),los:$('#losnlosselect :selected').val(),distance:$('#bts_distance').val(),ap:$('#apselect :selected').text(),description:$("#bts_description").val(),obstacle:$("#obstacle").val()}).done(function(data){
			//alert(data);
			createsurveybtsdistance(data,($('#losnlosselect :selected').val()==='1')?'LOS':'NLOS');
			update_rowcount($("#total_bts"),$(".btsdistance tbody tr"));
		}).fail(function(){
			alert('Tidak dapat menyimpan BTS, silakan menghubungi Developer');
		});
	});
	$("#updatebtsdistance").click(function(){
		myid = $(this).attr('btsdistance_id');
		$.post(thisdomain+'survey_bts_distances/edit',{id:myid,btstower_id:$("#bts_id").val(),ap:$("#apselect :selected").text(),distance:$("#bts_distance").val(),los:$("#losnlosselect").val(),description:$("#bts_description").val(),obstacle:$("#obstacle").val()}).done(function(data){
			//alert(data);
	        /*
	        var anSelected = fnGetSelected( dtbtsdistance );
			if ( anSelected.length !== 0 ) {
				oTable.fnUpdate( [$("#bts_id :selected").text(),$("#losnlosselect").val(),$("#bts_distance").val(),'<a><span class="icon-remove btsdistance_remove" btsdistance_id='+myid+'></span></a><a class="icon-pencil btsdistance_edit" btsdistance_id='+myid+'> </a>'], anSelected[0]);
			}
			*/

		}).fail(function(){
			alert("Tidak dapat mengupdate Jarak BTS, silakan menghubungi Developer");
		});

	});
	/*end of btsdistance*/
	$("#saveSiteDistance").click(function(){
		$.post(thisdomain+'adm/surveysitedistanceadd',{survey_site_id:$("#workplace").attr("survey_site_id"),username:$("#workspace").attr("username"),address:$("#site_id :selected").text(),distance:$("#site_distance").val(),description:$("#site_description").val()}).done(function(data){
			//alert(data);
			populate_other_site();
		}).fail(function(){
			alert("Tidak bisa menyimpan jarak site, hubungi Developer");
		});
	});

	$('#savesurveyimage').click(function(){
		$.post(thisdomain+'adm/surveysite_saveimage',{survey_site_id:$('#workplace').attr('survey_site_id'),name:$('#file_name').val(),path:$('#path').val(),user_name:$('#workplace').attr('user_name')}).done(function(data){
			populate_image(data,$('#path').val(),$('#file_name').val(),$('#workplace').attr('user_name'));
			update_rowcount($("#total_image"),$(".gambar tbody tr"));
		}).fail(function(){
			alert('tidak dapat memasukkan gambar, silakan hubungi Developer');
		});
	});

	$("#savesurveymaterial").click(function(){
		$.post(thisdomain+'adm/addsurveymaterial',{survey_site_id:$('#workplace').attr('survey_site_id'),material_type:$("#material_type :selected").text(),name:$('#material_name :selected').text(),amount:$('#material_amount').val()}).done(function(data){
			$('.material').append('<tr><td><a>'+$('#material_type :selected').text()+'</a></td><td class="info"><a>'+$("#material_name :selected").text()+'</a></td><td>'+$("#material_amount").val()+'</td><td><a><span class="icon-remove pointer material_remove"  id='+data+' site_id=1></span></a></td></tr>');
			$("#"+data).bind("click",function(){
				$(this).parent().parent().parent().remove();
				$.post(thisdomain+"adm/material_remove",{id:data}).done(function(data){
					update_rowcount($("#total_material"),$(".material tbody tr"));
				});
			});
			update_rowcount($("#total_material"),$(".material tbody tr"));
		}).fail(function(){
			alert('Tidak dapat menyimpan material, silakan hubungi Developer');
		});
	});

	$("#savesurveydevice").click(function(){
		$.post(thisdomain+'adm/addsurveydevice',{survey_site_id:$('#workplace').attr('survey_site_id'),name:$('#device_name :selected').text(),device_id:$('#device_name').val(),amount:$('#device_amount').val()}).done(function(data){
			$(".device").append('<tr><td><a>'+$("#device_type :selected").text()+'</a></td><td class="info">'+$("#device_name :selected").text()+'</a></td><td>'+$("#device_amount").val()+'</td><td><a><span class="icon-remove device_remove" device_id='+data+' ></span></a></td></tr>');
			update_rowcount($("#total_device"),$(".device tbody tr"));
			$('.device_remove').bind('click',function(){
				$(this).parent().parent().parent().remove();
				$.post(thisdomain+"adm/survey_removedevice",{device_id:$(this).attr('device_id')}).done(function(data){
					update_rowcount($("#total_device"),$(".device tbody tr"));
					}).fail(function(){alert('gagal');});
			});
		});
	});

	$(".addMaterial").click(function(){
		$("#dAddMaterial").modal("show");
	});

	$(".addSite").click(function(){
		$("#dAddSiteDistance").modal("show");
	});

	var deviceopt;
	$("#device_type").change(function(){
		$("#device_name").html("");
		filldevice($(this).val());
	});

	filldeviceopt = function(x,y){
		deviceopt+="<option value="+x+">"+y+"</option>";
	}

	filldevice = function(devicetype){
		$("#device_name").html("");
		deviceopt = "";
		$.getJSON(thisdomain+'devices/getdevice/'+devicetype,function(data){
			$.each(data,function(x,y){
				filldeviceopt(x,y);
			});
			$(deviceopt).appendTo("#device_name");
		});
	}

	var materialopt;
	$("#material_type").change(function(){
		$("#material_name").html("");
		fillmaterial($(this).val());
	});

	fillmaterialopt = function(x,y){
		materialopt+="<option value="+x+">"+y+"</option>";
	}

	fillmaterial = function(materialtype){
		$("#material_name").html("");
		materialopt = "";
		$.getJSON(thisdomain+'materials/getmaterial/'+materialtype,function(data){
			$.each(data,function(x,y){
				fillmaterialopt(x,y);
			});
			$(materialopt).appendTo("#material_name");
		});
	}

	update_rowcount = function(myselector,mytable){
		myselector.html(mytable.length);
	}

});


function fnGetSelected( oTableLocal )
{
    return oTableLocal.$('tr.row_selected');
}
