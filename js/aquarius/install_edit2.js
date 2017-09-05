$(document).ready(function(){
	initimageupload();
	initbaupload();
	update_rowcount($("#total_installer"),$("#officer tbody tr"));






	$(".installsite_save").click(function(){
		$.post(thisdomain+'adm/install_updatesite',{id:$("#workplace").attr("install_site_id"),address:$('#address').val(),city:$('#city').val(),pic:$('#pic').val(),pic_position:$('#pic_position').val(),phone_area:$('#phone_area').val(),phone:$('#phone').val(),pic_email:$('#pic_email').val(),description:$('#description').val(),user_name:$("#workplace").attr("user_name")}).done(function(data){}).fail(function(){alert("Tidak dapat mengupdate site instalasi, hubungi Developer");});
		$("#dModal").modal("show");
		setTimeout(function(){
			$("#dModal").modal("hide");
			},1000);
	});


	$(".closemodal").click(function(){
		$(this).stairUp({level:6}).modal("hide");
	});

	$(".closemodalparent2").click(function(){
		$(this).stairUp({level:3}).modal("hide");
	});

	$(".row_remove").click(function(){
		$(this).stairUp({level:3}).fadeOut(200);
	});

	$(".btn_addofficer").click(function(){
		$('.updateoficer').hide();
		$("#dAddOfficer").modal();
	});


});





	$.fn.fill_ap = function(btsid,selected){
		$(this).html("");
		thisap = $(this);
		thisap.append('<option value="Belum ada AP" selected=selected>Belum ada AP</option>');
		$.getJSON('/paps/get_name_by_bts/'+btsid,function(data){
			$.each(data,function(x,y){
				if(selected==y){
					thisap.append('<option value='+y+' selected=selected>'+y+'</option>');
				}else{
					thisap.append('<option value='+y+'>'+y+'</option>');
				}
			});
		});
	}





initbaupload = function(){
	var btnUpload=$('#uploadinstallba');
	var status=$('#status');
	new AjaxUpload(btnUpload, {
		action: thisdomain+'adm/upload_ba',
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
			console.log('response : '+response);
			if(response==="success"){
				$('#pathba').val(file);
			}
		}

	});



}


