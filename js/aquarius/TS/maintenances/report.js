(function($){
	$(".btn_addform").click(function(){
		$("#name_image").val("");
		$("#path_image").val("");
		$("#description_image").val("");
		$("#dKepuasanPelanggan").modal();
	});
	initimageupload = function(){
		var btnUpload=$('#uploadinstallimage');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: thisdomain+'adm/upload_tmp',
			name: 'uploadfile',
			onSubmit: function(file, ext){
			if (! (ext && /^(jpg|png|jpeg|gif|doc|docx|odt|pdf)$/.test(ext))){
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
					$('#path_image').val(file);
					console.log("Sukses : "+$('#path_image').val());
				}
			}
		});
	}
	$("#btn_save").click(function(){
		$(".inp_maintenance").makekeyvalparam();
		$.ajax({
			url:thisdomain+"maintenance_requests/update",
			data:JSON.parse('{'+$(".inp_maintenance").attr("keyval")+'}'),
			type:"post"
		}).done(function(data){
			console.log(data);
		});
	});
	$("#maintenance_image").on("click",".removeimage",function(){
		mytr = $(this).stairUp({level:3});
		myid = mytr.attr("myid");
		$.ajax({
			url:thisdomain+'maintenance_images/delete',
			data:{id:myid},
			type:'post'
		}).done(function(){
			mytr.fadeOut(2000).remove();
			$(this).showModal({message:"File sudah dihapus"});
			update_rowcount($("#total_image"),$("#maintenance_image tbody tr"));
		});
	});
	$("#saveimage").click(function(){
		$.post(thisdomain+'maintenance_requests/imageadd',{maintenance_request_id:$("#maintenance_request_id").val(),createuser:$("#createuser").val(),path:$("#path_image").val(),description:$("#description_image").val()}).done(function(data){
			$("#maintenance_image tbody").append('<tr myid='+data+'><td><a href="'+baseurl+'media/maintenances/'+$("#path_image").val()+'">'+$("#path_image").val()+'</a></td><td>'+$("#description_image").val()+'</td><td><a><span class="icon-trash removeimage pointer" ></span></a></td></tr>');
			$(".removeimage").click(function(){
				mytr = $(this).stairUp({level:3});
				myid = mytr.attr("myid");
				$.ajax({
					url:thisdomain+'maintenance_images/delete',
					data:{id:myid},
					type:'post'
				}).done(function(){
					mytr.fadeOut(2000).remove();
					$(this).showModal({message:"File sudah dihapus"});
					update_rowcount($("#total_image"),$("#maintenance_image tbody tr"));
				});
			});
			update_rowcount($("#total_image"),$("#maintenance_image tbody tr"));
		});
	});
}(jQuery));
