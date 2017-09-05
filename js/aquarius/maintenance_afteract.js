$(document).ready(function(){
	
		var btnUpload=$('#pilih_form_upload');
		var status=$('#status_form_upload');
		new AjaxUpload(btnUpload, {
			action: thisdomain+'adm/upload_file',
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
				//update_userpic(file);
				//On completion clear the status
				status.text('');
				//Add uploaded file to list
				if(response==="success"){
					$('#form_upload_image').val(file);
					$('#form_upload_img').attr('src',thisdomain+'media/'+file);
				}else{
					alert('upload gagal');
					}
			}
		});

	/* start of not confirmed */
	appenduploadform = function(tj_id,description,name){
		$('#upload_form').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+thisdomain+'media/'+name+'"><img width="50" src="'+thisdomain+'media/'+name+'" class="img-polaroid"/></a></td><td class="info"><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg">'+name+'</a> <span>fk-hseosqassr.jpg</span> <span>x</span></td><td>'+description+'</td><td><a href="#"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer link_navRemUploadForm"  id='+tj_id+' ></span></a></td></tr>');
		$('.link_navRemUploadForm').bind('click',function(){
			$(this).parent().parent().parent().fadeOut(200);
			$.post(thisdomain+'adm/removemaintenanceimage',{id:tj_id}).done(function(data){}).fail(function(){});
		});
		
	}		


	$('#saveUploadForm').click(function(){
		$.post(thisdomain+"adm/addmaintenanceuploadform",{maintenance_request_id:$(this).attr('request_id'),name:$('#form_upload_image').val(),description:$('#form_upload_description').val(),path:$('#form_upload_img').attr('src')}).done(function(data){appenduploadform(data,$('#form_upload_description').val(),$('#form_upload_image').val());}).fail(function(){alert('gagal')});
		
	});
	/* end of not confirmed */
	
	$('.link_navRemUploadForm').click(function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(thisdomain+'adm/removemaintenanceimage',{id:$(this).attr('image_id')}).done(function(data){}).fail(function(){alert('gagal');});
	});
	
	$('#maintenance_afteract_save').click(function(){
		$.post(thisdomain+'adm/maintenanceupdate',{id:$(this).val(),permit:$('#permit').val(),confirm_by_mail:$('#confirm_by_mail').val(),maintenance_date:$('#maintenance_date').val(),real_downtime_hour:$('#real_downtime_hour').val(),real_downtime_minute:$('#real_downtime_minute').val()}).done(function(data){}).fail(function(){alert('ora iso')});
	});
	
	$('.link_navPopPetugasInstall').click(function(){
        if($("#navPopPetugasInstall").is(":visible")){
            $("#navPopPetugasInstall").fadeOut(200);
        }else{
            $("#navPopPetugasInstall").fadeIn(300);
        }
        return false;	
	});
	
	$('.petugasInstall').click(function(){
		$.post(thisdomain+"adm/maintenance_addoperator",{maintenance_request_id:$(this).attr('maintenance_request_id'),user_id:$(this).attr('id')}).done(function(data){}).fail(function(){alert('Insert petugas instalasi gagal')});
		
		$("#navPopPetugasInstall").fadeOut(200);
		
		$('.maintenanceoperator').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg"><img src="'+baseurl+'img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td><td class="info"><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg">'+$(this).attr("username")+'</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td><td>260 Kb</td><td><a href="#"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer link_navRemPetugasMaintenance"  maintenance_request_id='+$(this).attr("maintenance_request_id")+' user_id='+$(this).attr('id')+'></span></a></td></tr>');
		$('.link_navRemPetugasMaintenance').bind('click',function(){
            $(this).parent().parent().parent().fadeOut(200);
            $.post(thisdomain+"adm/maintenance_removeoperator",{maintenance_request_id:$(this).attr('maintenance_request_id'),user_id:$(this).attr('user_id')});
		});

		
	});

	$('.link_navRemPetugasMaintenance').click(function(){
		$.post(thisdomain+'adm/maintenance_removeoperator',{maintenance_request_id:$(this).attr('maintenance_request_id'),user_id:$(this).attr('user_id')}).done(function(data){}).fail(function(){alert('gagal')});
		$(this).parent().parent().parent().fadeOut(200);
	});
	
	$('.link_navPopUploadForm').click(function(){
        if($("#navPopUploadForm").is(":visible")){
            $("#navPopUploadForm").fadeOut(200);
        }else{
            $("#navPopUploadForm").fadeIn(300);
        }
        return false;	
	});
});
