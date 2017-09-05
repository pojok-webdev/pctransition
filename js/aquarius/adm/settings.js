(function($){
	initimageupload = function(){
		var btnUpload=$('#pilih_gambar');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: thisdomain+'adm/upload_profile',
			name: 'uploadfile',
			onSubmit: function(file, ext){
			if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
				status.text('Only JPG, PNG or GIF files are allowed');
				return false;
			}
			status.text('Uploading...');
			},
			onComplete: function(file, response){
				status.text('');
				if(response==="success"){
					$("#userpic").attr("src",baseurl+"media/users/"+$("#username").val());
					$("#userimage").attr("src",baseurl+"media/users/"+$("#username").val());
				}
			}
		});
	}
	//initimageupload();
	$('#btnchangepassword').click(function(){
		console.log("change password clicked");
		$('#dChangePassword').modal();
	});
	$('#btnsavepassword').click(function(){
		$.post(thisdomain+'users/updatepassword',{email:$('#useremail').val(),newpassword:$('#password').val()}).done(function(data){
			$('#dChangePassword').modal('hide');
		}).fail(function(){
			alert('Tidak dapat menyimpan password, silakan hubungi Developer');
		});
	});
	$("#user_save").click(function(){
		var thisdob = $("#dob").formatDate({inputFormat:"dd/MM/YYYY",outputFormat:"YYYY-MM-dd"});
		console.log(thisdob);
		$.post(thisdomain+'adm/userupdate',{
			id:$('#workplace').attr('user_id'),
			email:$('#email').val(),
			phone:$('#phone').val(),
			dob:thisdob
		}).done(function(data){
			$(this).showModal({message:"Data sudah tersimpan"});
		}).fail(function(){
			alert('gagal edit user');
		});
	});
	uploadImage = function(evt){
		var input = evt.target;
		var fileReader = new FileReader();
		fileReader.onloadend = function(){
			resizeImage(fileReader.result,function(uri){
				$('#userpic').attr('src',uri);
				$.post(thisdomain+'adm/userupdate',{
					id:$('#workplace').attr('user_id'),
					pic:uri
				}).done(function(data){
				}).fail(function(){
					console.log('cannot upload image');
				});
			});
		}
		fileReader.readAsDataURL(input.files[0]);
	}
}(jQuery));
