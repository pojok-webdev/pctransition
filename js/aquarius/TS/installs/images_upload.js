(function($){
	$(".btn_addinstallimage").click(function(){
		$("#dAddInstallImage").modal("show");
	});
	$(".removeinstallimage").click(function(){
		selected = $(this).stairUp({level:3});
		$.post(thisdomain+'install_images/remove',{id:$(this).stairUp({level:3}).attr("image_id")});
		selected.fadeOut(2000);selected.remove();
		update_rowcount($("#total_image"),$("#install_image tbody tr"));
	});
	$("#saveimage").click(function(){
		$.post(thisdomain+'install_images/add',{install_site_id:$("#workplace").attr("install_site_id"),user_name:$("#createuser").val(),path:$("#path_image").val(),description:$("#description_image").val()}).done(function(data){
			$("#install_image tbody").append('<tr class="rImage" image_id='+data+' image_path='+$("#path_image").val()+'><td class="image_path"><a class="fancybox" rel="group" href="'+baseurl+'db_teknis/media/installs/'+$("#path_image").val()+'"><img src="'+baseurl+'db_teknis/media/installs/'+$("#path_image").val()+'" class="img-polaroid" width=50 height=38 /></a></td><td class="info image_name"><a class="fancybox" rel="group" href="'+baseurl+'db_teknis/media/installs/'+$("#path_image").val()+'"></a> <span>'+$("#path_image").val()+'</span></td><td class="image_description">'+$("#description_image").val()+'</td><td><a><span class="icon-trash removeinstallimage pointer" ></span></a><a><span class="icon-arrow-up switchup pointer"></span></a><a><span class="icon-arrow-down switchdown pointer"></span></a></td></tr>');
			update_rowcount($("#total_image"),$("#install_image tbody tr"));
			$(".removeinstallimage").bind('click',function(){
				selected = $(this).stairUp({level:3});
				$.post(thisdomain+'install_images/remove',{id:data}).done(function(){
					selected.fadeOut();selected.remove();
					update_rowcount($("#total_image"),$("#install_image tbody tr"));
				});
			});
			$(".switchup").on("click",function(){
				var thisrow = $(this).stairUp({level:3});
				var prevrow = $(this).stairUp({level:3}).prev();
				if(prevrow.hasClass("rImage")){
					$.ajax({
						url:thisdomain+"install_images/switch_order/"+thisrow.attr("image_id")+"/"+prevrow.attr("image_id"),
					}).done(function(){
						var image_description = thisrow.find(".image_description").html();
						var image_filename = thisrow.find(".image_path").html();
						var image_name = thisrow.find(".image_name").html();
						var image_id = thisrow.attr("image_id");
						var image_path = thisrow.attr("image_path");
						thisrow.find(".image_description").html(prevrow.find(".image_description").html());
						prevrow.find(".image_description").html(image_description);
						thisrow.find(".image_path").html(prevrow.find(".image_path").html());
						prevrow.find(".image_path").html(image_filename);
						thisrow.find(".image_name").html(prevrow.find(".image_name").html());
						prevrow.find(".image_name").html(image_name);
						thisrow.attr("image_id",prevrow.attr("image_id"));
						prevrow.attr("image_id",image_id);
						thisrow.attr("image_path",prevrow.attr("image_path"));
						prevrow.attr("image_path",image_path);
					});
				}else{
					console.log("there is no prev row");
				}
			});
			$(".switchdown").on("click",function(){
				var thisrow = $(this).stairUp({level:3});
				var nextrow = $(this).stairUp({level:3}).next();
				if(nextrow.hasClass("rImage")){
					$.ajax({
						url:thisdomain+"install_images/switch_order/"+thisrow.attr("image_id")+"/"+nextrow.attr("image_id"),
					}).done(function(){
						var image_description = thisrow.find(".image_description").html();
						var image_filename = thisrow.find(".image_path").html();
						var image_name = thisrow.find(".image_name").html();
						var image_id = thisrow.attr("image_id");
						var image_path = thisrow.attr("image_path");
						thisrow.find(".image_description").html(nextrow.find(".image_description").html());
						nextrow.find(".image_description").html(image_description);
						thisrow.find(".image_path").html(nextrow.find(".image_path").html());
						nextrow.find(".image_path").html(image_filename);
						thisrow.find(".image_name").html(nextrow.find(".image_name").html());
						nextrow.find(".image_name").html(image_name);
						thisrow.attr("image_id",nextrow.attr("image_id"));
						nextrow.attr("image_id",image_id);
						thisrow.attr("image_path",nextrow.attr("image_path"));
						nextrow.attr("image_path",image_path);
					});
				}else{
					console.log("there is no next row");
				}
			});			
		});
	});
	$("#install_image tbody .switchdown").click(function(){
		var thisrow = $(this).stairUp({level:3});
		var nextrow = $(this).stairUp({level:3}).next();
		if(nextrow.hasClass("rImage")){
			$.ajax({
				url:thisdomain+"install_images/switch_order/"+thisrow.attr("image_id")+"/"+nextrow.attr("image_id"),
			}).done(function(){
				var image_description = thisrow.find(".image_description").html();
				var image_filename = thisrow.find(".image_path").html();
				var image_name = thisrow.find(".image_name").html();
				var image_id = thisrow.attr("image_id");
				var image_path = thisrow.attr("image_path");
				thisrow.find(".image_description").html(nextrow.find(".image_description").html());
				nextrow.find(".image_description").html(image_description);
				thisrow.find(".image_path").html(nextrow.find(".image_path").html());
				nextrow.find(".image_path").html(image_filename);
				thisrow.find(".image_name").html(nextrow.find(".image_name").html());
				nextrow.find(".image_name").html(image_name);
				thisrow.attr("image_id",nextrow.attr("image_id"));
				nextrow.attr("image_id",image_id);
				thisrow.attr("image_path",nextrow.attr("image_path"));
				nextrow.attr("image_path",image_path);
			});
		}else{
			console.log("there is no next row");
		}
	});
	$("#install_image tbody .switchup").click(function(){
		var thisrow = $(this).stairUp({level:3});
		var prevrow = $(this).stairUp({level:3}).prev();
		if(prevrow.hasClass("rImage")){
			$.ajax({
				url:thisdomain+"install_images/switch_order/"+thisrow.attr("image_id")+"/"+prevrow.attr("image_id"),
			}).done(function(){
				var image_description = thisrow.find(".image_description").html();
				var image_filename = thisrow.find(".image_path").html();
				var image_name = thisrow.find(".image_name").html();
				var image_id = thisrow.attr("image_id");
				var image_path = thisrow.attr("image_path");
				thisrow.find(".image_description").html(prevrow.find(".image_description").html());
				prevrow.find(".image_description").html(image_description);
				thisrow.find(".image_path").html(prevrow.find(".image_path").html());
				prevrow.find(".image_path").html(image_filename);
				thisrow.find(".image_name").html(prevrow.find(".image_name").html());
				prevrow.find(".image_name").html(image_name);
				thisrow.attr("image_id",prevrow.attr("image_id"));
				prevrow.attr("image_id",image_id);
				thisrow.attr("image_path",prevrow.attr("image_path"));
				prevrow.attr("image_path",image_path);
			});
		}else{
			console.log("there is no prev row");
		}
	});
}(jQuery));
initimageupload = function(){
	var btnUpload=$('#uploadinstallimage');
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
				$('#path_image').val(file);
			}
		}
	});
	console.log("Image initiated");
}
