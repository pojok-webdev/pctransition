$(document).ready(function(){
	$('#btnsaveuser').click(function(){
		$('.inpuser').makekeyvalparam();
                spv='';
                if($("#supervisor_id :selected").text()!="Tidak memiliki Supervisor"){
                    spv = '"supervisor_id":"'+$("#supervisor_id").val()+'"';
                }
                console.log(spv);
		$.ajax({
			url:thisdomain+'users/update',
			data:JSON.parse('{'+$('.inpuser').attr('keyval')+'}'),
			type:'POST',
			dataType:'text',
			async: false
		}).done(function(){
			$('#dModal').modal();
			setTimeout(function(){
				$('#dModal').modal('hide');
			},1500);
		}).fail(function(){
			alert('Tidak dapat menyimpan data User, silakan hubungi Developer');
		});
	});
	$('.chkdivision').change(function(){
		if($(this).attr('checked')){
			$.post(thisdomain+'users/associate_user_group',{user_id:$("#userid").val(),group_id:$(this).val()}).done(function(data){
			}).fail(function(){
				alert('Tidak dapat mengupdate Group - User, silakan hubungi Developer');
			});
		}else{
			$.post(thisdomain+'users/disassociate_user_group',{user_id:$("#userid").val(),group_id:$(this).val()}).done(function(data){
			}).fail(function(){
				alert('Tidak dapat mengupdate Group - User, silakan hubungi Developer');
			});
		}
	});
	$('.chkbranch').change(function(){
		if($(this).attr('checked')){
			$.post(thisdomain+'users/associate_user_branch',{user_id:$("#userid").val(),branch_id:$(this).val()}).done(function(data){
				console.log("Data",data);
			}).fail(function(){
				alert('Tidak dapat mengupdate Cabang - User, silakan hubungi Developer');
			});
		}else{
			$.post(thisdomain+'users/disassociate_user_branch',{user_id:$("#userid").val(),branch_id:$(this).val()}).done(function(data){
				console.log("Data",data);
			}).fail(function(){
				alert('Tidak dapat mengupdate Cabang - User, silakan hubungi Developer');
			});
		}
	});
	$('.jobdesc').change(function(){
		if($(this).attr('checked')){
			$.post(thisdomain+'users/associate_user_role',{user_id:$("#userid").val(),role_id:$(this).val()}).done(function(data){
				console.log("Data",data);
			}).fail(function(){
				alert('Tidak dapat menyimpan Role - User, silakan hubungi Developer');
			});
		}else{
			$.post(thisdomain+'users/disassociate_user_role',{user_id:$("#userid").val(),role_id:$(this).val()}).done(function(data){
				console.log("Data",data);
			}).fail(function(){
				alert('Tidak dapat menghapus Role - User, silakan hubungi Developer');
			});
		}
	});
	$('#btnchangepassword').click(function(){
		$('#dChangePassword').modal();
	});
	$('#closemodal').click(function(){
		$('#dChangePassword').modal('hide');
	});
	$('#btnsavepassword').click(function(){
		$.post(thisdomain+'users/updatepassword',{email:$('#email').val(),newpassword:$('#password').val()}).done(function(data){
			$('#dChangePassword').modal('hide');
		}).fail(function(){
			alert('Tidak dapat menyimpan password, silakan hubungi Developer');
		});
	});
	$('#supervisor_id').change(function(){
		$.ajax({
			url:thisdomain+'users/associate_supervisor_user',
			data:{supervisor_id:$(this).val(),user_id:$("#userid").val()},
			type:'post'
		}).done(function(){

		}).fail(function(){
			console.log('Tidak dapat menyimpan Supervisor, silakan hubungi Developer');
		});
	});
	uploadImage = (evt) => {
		var input = evt.target;
		var fileReader = new FileReader();
		fileReader.onloadend = () => {
			resizeImage2(fileReader.result,200,(uri) => {
				$('#userpic').attr('src',uri);
				$.post(thisdomain+'adm/userupdate',{
					id:$("#userid").val(),
					pic:uri
				}).done(function(data){
				}).fail(function(){
					console.log('cannot upload image');
				});
			});
		}
		fileReader.readAsDataURL(input.files[0]);
	}
});
