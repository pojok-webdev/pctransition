$('.btn_addtroubleshootimage').click(function(){
	$('#myModalImageLabel').html('Penambahan Gambar Troubleshoot');
	$('#file_description').val("");
	$('#imagename').val("");
	$('#updatetroubleshootimage').hide();
	$('#savetroubleshootimage').show();
	$('#output').removeAttr('src');
	$('#dAddTroubleshootImage').modal();
});
function uploadImage(evt){
  var input = evt.target;
  var fileReader = new FileReader();
  fileReader.onloadend = function(){
	  $("body").css("cursor","wait");
	  $("#savetroubleshootimage").prop("disabled",true);
		resizeImage(fileReader.result,function(uri){
			$("#output").attr("src",uri);
			$("#troubleshootimageurl").val(uri);
			$("body").css("cursor","default");
			$("#savetroubleshootimage").prop("disabled",false);
		});
  }
  fileReader.readAsDataURL(input.files[0]);
}
$('#savetroubleshootimage').click(function(){
	$.ajax({
		url:thisdomain+'troubleshoots/save_image',
		type:'post',
		data:{img:$('#output').attr("src"),troubleshoot_request_id:$('#troubleshoot_id').val(),name:$('#imagename').val(),description:$('#file_description').val()}
	}).done(function(data){
		console.log("data",data);
		$('#tImage').append('<tr class="rImage" image_id='+data+'><td class="image_path"><a class="fancyboxx" rel="groupx"><img src="'+$('#output').attr("src")+'" class="img-polaroidx prevImage" onclick="viewImage(this)" width=50 height=38 /></a></td><td class="info image_name"><a>'+$('#imagename').val()+'</a><span>tglpembuatan</span></td><td class="image_description">'+$('#file_description').val()+'</td><td><a><span class="icon-remove removesurveyimage"></span></a><a><span class="icon-arrow-up switchup pointer"></span></a><a><span class="icon-arrow-down switchdown pointer"></span></a><a><span class="icon-pencil imageedit pointer"></span></a></td></tr>');
		$('.switchup').click(function(){
			var thisrow = $(this).stairUp({level:3});
			var prevrow = $(this).stairUp({level:3}).prev();
			if(prevrow.hasClass("rImage")){
				$.ajax({
					url:thisdomain+"troubleshoot_images/switch_order/"+thisrow.attr("image_id")+"/"+prevrow.attr("image_id"),
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
		$('.switchdown').click(function(){
			var thisrow = $(this).stairUp({level:3});
			var nextrow = $(this).stairUp({level:3}).next();
			if(nextrow.hasClass("rImage")){
				$.ajax({
					url:thisdomain+"troubleshoot_images/switch_order/"+thisrow.attr("image_id")+"/"+nextrow.attr("image_id"),
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
		console.log("tidak dapat menyimpan data");
	});
});
function viewImage(elem){
	var _this = $(elem).stairUp({level:3});
	$("#tImage tbody tr").each(function(){
		$(this).removeClass("selected");
	});
	_this.addClass("selected");
	var src = elem.src;
	//$("#changeSurveyImage").attr("src",src);
	//$("#dChangeImage").modal();
	$("#output").attr("src",src);
	$("#file_description").val($("#tImage tbody tr.selected td.image_description").html());
	$("#myModalImageLabel").html("Edit Gambar Troubleshoot");




//		$('#myModalImageLabel').html('Edit Gambar Troubleshoot');
//		$('#file_description').val(data.description);
		$('#imagename').val($("#tImage tbody tr.selected td.image_name").find('a').html());
		$('#updatetroubleshootimage').show();
		$('#savetroubleshootimage').hide();
//		$('#output').attr('src',data.img);



	$("#dAddTroubleshootImage").modal();
}
$('.removetroubleshootimage').click(function(){
	tr = $(this).stairUp({level:3});
	$.ajax({
		url:thisdomain+'troubleshoots/removeimage',
		type:'post',
		data:{id:$(this).stairUp({level:3}).attr('image_id')}
	}).done(function(data){
		tr.remove();
		console.log('data',data);
	}).fail(function(){
		console.log('tidak dapat menghapus data');
	});
});
$('.imageedit').click(function(){
	/*
	var tr = $(this).stairUp({level:3});
	$('#tImage tbody tr').removeClass('selected');
	tr.addClass('selected');
	$.ajax({
		url:thisdomain+'troubleshoot_images/getbyid/'+tr.attr('image_id'),
		type:'post',
		dataType:'json'
	}).done(function(data){
		$('#myModalImageLabel').html('Edit Gambar Troubleshoot');
		$('#file_description').val(data.description);
		$('#imagename').val(data.name);
		$('#updatetroubleshootimage').show();
		$('#savetroubleshootimage').hide();
		$('#output').attr('src',data.img);
		$('#dAddTroubleshootImage').modal();		
	}).fail(function(){
		console.log('Tidak dapat meretrieve troubleshoot image');
	});
	*/
		var selected = $(this).stairUp({level:3});
		window.location.href = thisdomain+"troubleshoots/imageedit/"+selected.attr("image_id");
	
});
$('#updatetroubleshootimage').click(function(){
	$.ajax({
		url:thisdomain+'troubleshoots/update_image',
		type:'post',
		data:{
			id:$('#tImage tr.selected').attr('image_id'),
			img:$('#output').attr("src"),
			troubleshoot_request_id:$('#troubleshoot_id').val(),
			name:$('#imagename').val(),
			description:$('#file_description').val()
			}
	}).done(function(data){
		console.log('data',data);
		$('#tImage tr.selected td.image_name').html('<a>'+$('#imagename').val()+'</a>');
		$('#tImage tr.selected td.image_description').html(''+$('#file_description').val()+'');
		$('#tImage tr.selected td.image_path').html('<a class="fancyboxx" rel="groupx"><img src="'+$('#output').attr("src")+'" class="img-polaroidx prevImage" onclick="viewImage(this)" width=50 height=38 /></a>');
	}).fail(function(){
		console.log('tidak dapat mengupdate troubleshoot image');
	});
});
$('.removetroubleshootimage').click(function(){
	var tr = $(this).stairUp({level:3}),
		imageid = $(this).stairUp({level:3}).attr('image_id');
	tr.addClass('selected');
	$.ajax({
		url:thisdomain+'troubleshoots/removeimage/'+imageid,
		type:'post',
		data:{id:id}
	}).done(function(data){
		$('#tImage tbody tr.selected').remove();
		console.log(data);
	}).fail(function(){
		console.log('Tidak dapat menghapus image troubleshoot');
	});
});
	$("#tImage tbody .switchdown").click(function(){
		var thisrow = $(this).stairUp({level:3});
		var nextrow = $(this).stairUp({level:3}).next();
		if(nextrow.hasClass("rImage")){
			$.ajax({
				url:thisdomain+"troubleshoot_images/switch_order/"+thisrow.attr("image_id")+"/"+nextrow.attr("image_id"),
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
				url:thisdomain+"troubleshoot_images/switch_order/"+thisrow.attr("image_id")+"/"+prevrow.attr("image_id"),
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
