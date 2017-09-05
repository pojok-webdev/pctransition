(function($){
    $(".btn_addsurveyimage").click(function(){
		$("#path").val("");
		$("#file_description").val("");
		$("#dAddSurveyImage").modal("show");
	});
	$('.removesurveyimage').click(function(){
		$(this).stairUp({level:3}).fadeOut(200);
		$.post(thisdomain+'adm/remove_image_path',{path:'./media/surveys/'+$(this).stairUp({level:3}).attr('image_path')});
		var selected = $(this).stairUp({level:3});
		var imagepath = selected.attr('image_path');
		$.post(thisdomain+'adm/surveyimage_remove',{id:selected.attr('image_id')}).done(function(data){
			$.post(thisdomain+'adm/remove_image_path',{path:'./media/surveys/'+imagepath});
			selected.fadeOut(2000);selected.remove();
			update_rowcount($("#total_image"),$("#tImage tbody tr"));
		}).fail(function(){
			console.log('Tidak dapat menghapus image, silakan hubungi Developer');
		});
		update_rowcount($("#total_image"),$("#tImage tbody tr"));
	});
	$('#savesurveyimage').click(function(){
		$.post(thisdomain+'adm/surveysite_saveimage',{survey_site_id:$('#workplace').attr('site_id'),path:$('#path').val(),description:$('#file_description').val(),createuser:$('#createuser').val()}).done(function(data){
			$("#tImage tbody").append('<tr  class="rImage" image_id='+data+' image_path='+$('#path').val()+'><td class="image_path"><a class="fancybox" rel="group" href="'+baseurl+'db_teknis/media/surveys/'+$('#path').val()+'"><img src="'+baseurl+'db_teknis/media/surveys/'+$('#path').val()+'" class="img-polaroid" width=50 height=38 /></a></td><td class="info image_name"><a>'+$('#path').val()+'</a><span>'+Date.now()+'</span></td><td class="image_description">'+$('#file_description').val()+'</td><td><a><span class="icon-remove removesurveyimage" id='+data+'></span></a><a><span class="icon-arrow-up pointer switchup"></span></a><a><span class="icon-arrow-down pointer switchdown"></span></a></td></tr>');
			update_rowcount($("#total_image"),$("#tImage tbody tr"));
			$(".removesurveyimage").click(function(){
				var selected = $(this).stairUp({level:3});
				var imagepath = selected.attr('image_path');
				$.post(thisdomain+'adm/surveyimage_remove',{id:selected.attr('image_id')}).done(function(data){
					$.post(thisdomain+'adm/remove_image_path',{path:'./media/surveys/'+imagepath});
					selected.fadeOut(2000);selected.remove();
					update_rowcount($("#total_image"),$("#tImage tbody tr"));
				}).fail(function(){
					console.log('Tidak dapat menghapus image, silakan hubungi Developer');
				});
			});
			$(".switchup").on("click",function(){
				var thisrow = $(this).stairUp({level:3});
				var prevrow = $(this).stairUp({level:3}).prev();
				if(prevrow.hasClass("rImage")){
					$.ajax({
						url:thisdomain+"survey_images/switch_order/"+thisrow.attr("image_id")+"/"+prevrow.attr("image_id"),
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
						url:thisdomain+"survey_images/switch_order/"+thisrow.attr("image_id")+"/"+nextrow.attr("image_id"),
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
		}).fail(function(){
			alert('tidak dapat memasukkan gambar, silakan hubungi Developer');
		});
	});
	$("#tImage tbody .switchdown").click(function(){
		var thisrow = $(this).stairUp({level:3});
		var nextrow = $(this).stairUp({level:3}).next();
		if(nextrow.hasClass("rImage")){
			$.ajax({
				url:thisdomain+"survey_images/switch_order/"+thisrow.attr("image_id")+"/"+nextrow.attr("image_id"),
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
	$("#tImage tbody .switchup").click(function(){
		var thisrow = $(this).stairUp({level:3});
		var prevrow = $(this).stairUp({level:3}).prev();
		if(prevrow.hasClass("rImage")){
			$.ajax({
				url:thisdomain+"survey_images/switch_order/"+thisrow.attr("image_id")+"/"+prevrow.attr("image_id"),
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
}(jQuery))
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
