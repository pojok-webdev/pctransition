$(document).ready(function(){
    var btnUpload=$('#pilih_gambar');
	var status=$('#status');
	new AjaxUpload(btnUpload, {
		action: '<?php echo base_url()?>index.php/adm/upload_file',
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
			alert(response);
			//On completion clear the status
			status.text('');
			//Add uploaded file to list
			if(response==="success"){
				$('<li></li>').appendTo('#files').html('<img src="./uploads/'+file+'" alt="" /><br />'+file).addClass('success');
			} else{
				$('<li></li>').appendTo('#files').text(file).addClass('error');
			}
		}
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
		$.post(thisdomain+"adm/install_addofficer",{request_id:$(this).attr('install_id'),user_id:$(this).attr('id')}).done(function(data){}).fail(function(){alert('Insert petugas instalasi gagal')});
		$("#navPopPetugasInstall").fadeOut(200);
		$('.installer').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg"><img src="'+baseurl+'img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td><td class="info"><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg">'+$(this).attr("username")+'</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td><td>260 Kb</td><td><a href="#"><span class="icon-pencil"></span></a> <a><span onClick="removepetugassurvey()" class="icon-remove pointer link_navRemPetugasSurvey"  survey_id='+$(this).attr("survey_id")+' user_id='+$(this).attr('id')+'></span></a></td></tr>');
		$('.link_navRemPetugasInstall').bind('click',function(){
            $(this).parent().parent().parent().fadeOut(200);
            $.post(baseurl+"index.php/adm/install_removeofficer",{survey_id:$(this).attr('install_id'),user_id:$(this).attr('user_id')});
		});
	});
	

	$('.link_navPopRouter').click(function(){
        if($("#navPopRouter").is(":visible")){
            $("#navPopRouter").fadeOut(200);
        }else{
            $("#navPopRouter").fadeIn(300);
        }
        return false;
	});
	
	appendrouter = function(router_id,tipe_router,macboard,location){
		$('#router').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg"><img src="'+baseurl+'img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td><td class="info"><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg">'+tipe_router+'</a> <span>fk-hseosqassr.jpg</span> <span>'+macboard+'</span></td><td>'+location+'</td><td><a href="#"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer link_navRemRouter"  id='+router_id+' ></span></a></td></tr>');
		$('.link_navRemRouter').bind('click',function(){
			$(this).parent().parent().parent().fadeOut(200);
			$.post(thisdomain+'index.php/adm/install_removerouter',{id:router_id}).done(function(data){}).fail(function(){});
		});
	}
	
	$('#saveRouter').click(function(){
		$.post(thisdomain+"adm/addrouter",{install_request_id:$(this).attr('request_id'),tipe:$('#tipe_router').val(),macboard:$('#macboard').val(),ip_public:$('#ip_public').val(),ip_private:$('#ip_private').val(),user:$('#user').val(),password:$('#password').val(),location:$('#location').val()}).done(function(data){appendrouter(data,$('#tipe_router').val(),$('#macboard').val(),$('#location').val());}).fail(function(){alert('gagal')});
		
	});
	
	$('.link_navRemRouter').click(function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(thisdomain+'index.php/adm/install_removerouter',{id:$(this).attr('id')}).fail(function(){alert('gaga;');});		
	});
	
	$('.link_navPopRW').click(function(){
        if($("#navPopRW").is(":visible")){
            $("#navPopRW").fadeOut(200);
        }else{
            $("#navPopRW").fadeIn(300);
        }
        return false;
	});
	
	appendrw = function(rw_id,tipe,macboard,ip_radio){
		$('#rw').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg"><img src="'+baseurl+'img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td><td class="info"><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg">'+tipe+'</a> <span>fk-hseosqassr.jpg</span> <span>'+macboard+'</span></td><td>'+ip_radio+'</td><td><a href="#"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer link_navRemRW"  id='+rw_id+' ></span></a></td></tr>');
		$('.link_navRemRW').bind('click',function(){
			$(this).parent().parent().parent().fadeOut(200);
			$.post(thisdomain+'index.php/adm/install_removerw',{id:rw_id}).done(function(data){}).fail(function(){});
		});
		
	}
	
	$('#saveRW').click(function(){
		$.post(thisdomain+"adm/addrw",{install_request_id:$(this).attr('request_id'),tipe:$('#tipe_rw').val(),macboard:$('#macboard_rw').val(),ip_radio:$('#ip_radio').val(),ap_id:$('#ap_id').val(),user:$('#user_rw').val(),password:$('#password_rw').val(),antenna_location:$('#antenna_location').val()}).done(function(data){appendrw(data,$('#tipe_rw').val(),$('#macboard_rw').val(),$('#ip_radio').val());}).fail(function(){alert('gagal');});
	});

	$('.link_navRemRW').click(function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(thisdomain+'index.php/adm/install_removerw',{id:$(this).attr('id')}).done(function(data){}).fail(function(){});
		
	});
	
	$('.link_navPopAW').click(function(){
        if($("#navPopAW").is(":visible")){
            $("#navPopAW").fadeOut(200);
        }else{
            $("#navPopAW").fadeIn(300);
        }
        return false;
	});
	
	appendaw = function(aw_id,tipe,macboard,ip_radio){
		$('#aw').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg"><img src="'+baseurl+'img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td><td class="info"><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg">'+tipe+'</a> <span>fk-hseosqassr.jpg</span> <span>'+macboard+'</span></td><td>'+ip_radio+'</td><td><a href="#"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer link_navRemAW"  id='+aw_id+' ></span></a></td></tr>');
		$('.link_navRemAW').bind('click',function(){
			$(this).parent().parent().parent().fadeOut(200);
			$.post(thisdomain+'index.php/adm/install_removeaw',{id:aw_id}).done(function(data){}).fail(function(){});
		});
		
	}
	
	$('#saveAW').click(function(){
		$.post(thisdomain+"adm/addaw",{install_request_id:$(this).attr('request_id'),tipe:$('#tipe_aw').val(),ip_address:$('#ip_aw').val(),essid:$('#essid_aw').val()}).done(function(data){appendaw(data,$('#tipe_aw').val(),$('#macboard_aw').val(),$('#ip_aw').val())}).fail(function(){alert('gagal')});
	});
	
	$('.link_navRemAW').click(function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(thisdomain+'index.php/adm/install_removeaw',{id:$(this).attr('id')}).done(function(data){}).fail(function(){alert('gagal')});
		
	});
	
	$('.link_navPopTopologiJaringan').click(function(){
        if($("#navPopTopologiJaringan").is(":visible")){
            $("#navPopTopologiJaringan").fadeOut(200);
        }else{
            $("#navPopTopologiJaringan").fadeIn(300);
        }
        return false;
	});
	
		var btnUpload=$('#pilih_gambar_topologi');
		var status=$('#status_topologi');
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
					$('#topologi_image').val(file);
					$('#topologi_img').attr('src',thisdomain+'media/'+file);
				}else{
					alert('upload gagal');
					}
			}
		});
		
	appendtopologijaringan = function(tj_id,description,name){
		$('#topologijaringan').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+thisdomain+'media/'+name+'"><img width="50" src="'+thisdomain+'media/'+name+'" class="img-polaroid"/></a></td><td class="info"><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg">'+name+'</a> <span>fk-hseosqassr.jpg</span> <span>x</span></td><td>'+description+'</td><td><a href="#"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer link_navRemTopologiJaringan"  id='+tj_id+' ></span></a></td></tr>');
		$('.link_navRemTopologiJaringan').bind('click',function(){
			$(this).parent().parent().parent().fadeOut(200);
			$.post(thisdomain+'index.php/adm/install_removetopologijaringan',{id:tj_id}).done(function(data){}).fail(function(){});
		});
		
	}		
		
	$('#saveTopologiJaringan').click(function(){
		$.post(thisdomain+"adm/addtopologijaringan",{install_request_id:$(this).attr('request_id'),name:$('#topologi_image').val(),description:$('#topologi_description').val(),path:$('#topologi_img').attr('src')}).done(function(data){appendtopologijaringan(data,$('#topologi_description').val(),$('#topologi_image').val());}).fail(function(){alert('gagal')});
	});
	
	$('.link_navRemTopologiJaringan').click(function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(thisdomain+'index.php/adm/install_removetopologijaringan',{id:$(this).attr('id')}).done(function(data){}).fail(function(){alert('gagal')});
		
	});
});
