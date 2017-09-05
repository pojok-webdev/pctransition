function viewImage(elem){
	var _this = $(elem).stairUp({level:3});
	$("#tImage tbody tr").each(function(){
		$(this).removeClass("selected");
	});
	_this.addClass("selected");
	var src = elem.src;
	$("#output").attr("src",src);
	$("#file_description").val($("#tImage tbody tr.selected td.image_description").html());
	$("#myModalImageLabel").html("Edit Gambar Survey");
	$("#dAddSurveyImage").modal();
}
function uploadImage1(evt){
  var input = evt.target;
  var fileReader = new FileReader();
  fileReader.onloadend = function(){
	  $("body").css("cursor","wait");
	  $("#savesurveyimage").prop("disabled",true);
		resizeImage(fileReader.result,function(uri){
			$("#output").attr("src",uri);
			$("#survimageurl").val(uri);
			$("body").css("cursor","default");
			$("#savesurveyimage").prop("disabled",false);
		});
  }
  fileReader.readAsDataURL(input.files[0]);
}
function changeImage(evt){
  var input = evt.target;
  var fileReader = new FileReader();
  fileReader.onload = function(){
	$("body").css("cursor","wait");
	$("#saveEditSurveyImage").prop("disabled",true);
	$(".closemodal").prop("disabled",true);
	resizeImage(fileReader.result,function(uri){
		$("#hiddenEditImage").val(uri);
		$("#changeSurveyImage").attr("src",uri);
		$("body").css("cursor","default");
		$("#saveEditSurveyImage").prop("disabled",false);
		$(".closemodal").prop("disabled",false);
	});
  }
  fileReader.readAsDataURL(input.files[0]);
}
(function($){
    $(".btn_addsurveyimage").click(function(){
		$("#path").val("");
		$("#file_description").val("");
		$("#myModalImageLabel").html("Penambahan Gambar Survey");
		$("#dAddSurveyImage").modal("show");
	});
	$("#tImage").on("click","tbody .removesurveyimage",function(){
		$(this).stairUp({level:3}).fadeOut(200);
		var selected = $(this).stairUp({level:3});
		var imagepath = selected.attr('image_path');
		$.post(thisdomain+'adm/surveyimage_remove',{id:selected.attr('image_id')})
		.done(function(data){
			selected.fadeOut(2000);selected.remove();
			update_rowcount($("#total_image"),$("#tImage tbody tr"));
		})
		.fail(function(){
			console.log('Tidak dapat menghapus image, silakan hubungi Developer');
		});
		update_rowcount($("#total_image"),$("#tImage tbody tr"));
	});
	$('#savesurveyimage').click(function(){
		switch($("#myModalImageLabel").html()){
			case "Penambahan Gambar Survey":
				$.post(thisdomain+'adm/surveysite_saveimage',{
						survey_site_id:$('#workplace').attr('site_id'),
						img:$('#output').attr("src"),
						path:$("#addImage").val(),
						description:$('#file_description').val(),
						createuser:$('#createuser').val()
					}).done(function(data){
						var d = new Date();
						$("#tImage tbody").append('<tr  class="rImage" image_id='+data+' image_path='+$('#path').val()+'><td class="image_path"><a class="fancyboxx" rel="group"><img src="'+$("#output").attr("src")+'" onclick="viewImage(this)" class="img-polaroidx" width=50 height=38 /></a></td><td class="info image_name"><a>'+$("#addImage").val()+'</a><span>'+d.getFullYear()+'-'+d.getMonth()+'-'+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds()+'</span></td><td class="image_description">'+$('#file_description').val()+'</td><td><a><span class="icon-remove removesurveyimage" id='+data+'></span></a><a><span class="icon-arrow-up pointer switchup"></span></a><a><span class="icon-arrow-down pointer switchdown"></span></a><a><span class="icon-pencil imageedit pointer"></span></a></td></tr>');
						update_rowcount($("#total_image"),$("#tImage tbody tr"));
						$("#dAddSurveyImage").modal("hide");
					}).fail(function(){
						alert('tidak dapat memasukkan gambar, silakan hubungi Developer');
					});
			break;
			case "Edit Gambar Survey":
				$.ajax({
					url:thisdomain+"survey_images/update",
					data:{
						id:$("#tImage tbody tr.selected").attr("image_id"),
						img:$("#output").attr("src"),
						path:$("#addImage").val(),
						description:$("#file_description").val()
						},
					type:"post"
				}).done(function(data){
					var mydate = new Date();
					$("#tImage tbody tr.selected").find("img.prevImage").attr("src",$("#output").attr("src"));
					$("#tImage tbody tr.selected td.image_name").html('<a>'+$("#addImage").val()+'</a>'+'<span>'+mydate.getFullYear()+'-'+(mydate.getMonth()+1)+'-'+mydate.getDate()+' '+mydate.getHours()+':'+mydate.getMinutes()+':'+mydate.getSeconds()+'<span>');
					$("#tImage tbody tr.selected td.image_description").html($("#file_description").val());
					$("#dChangeImage").modal("hide");
				}).fail(function(){
					console.log("error tidak dapat mengupdate image");
				});
			break;
		}
	});
	$("#tImage").on("click","tbody .switchdown",function(){
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
	$("#tImage").on("click"," tbody .switchup",function(){
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
	$("#tImage").on("click","tbody .imageedit",function(){
		var selected = $(this).stairUp({level:3});
		window.location.href = thisdomain+"surveys/imageedit/"+selected.attr("image_id");
	});
	$(".closemodal").click(function(){
		$(this).stairUp({level:3}).modal("hide");
	});
}(jQuery))
