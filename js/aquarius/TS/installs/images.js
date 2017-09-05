//(function($){
	$(".btn_addinstallimage").click(function(){
		$("#path_image").val("");
		$("#description_image").val("");
		$("#imageModalLabel").text("Penambahan Gambar Instalasi");
		$("#dAddInstallImage").modal("show");
	});
	$("#install_image").on("click",".removeinstallimage",function(){
		var selected = $(this).stairUp({level:3});
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"install_images/remove",
			idElement:selected.attr("image_id"),
			selectedElement:selected,
			totalElement:"total_image",
			tableElement:"install_image",
		});
	});
	function loadImage1(evt){
		var input = evt.target;
		var filereader = new FileReader();
		filereader.onload = function(){
			resizeImage(filereader.result, function(result){
				$("#output").attr("src",result);
				$("#addImage").val(result);
			})
		}
		filereader.readAsDataURL(input.files[0]);
	}
	viewImage = function(elem){
		var _this = $(elem).stairUp({level:3});
		$("#install_image tbody tr").each(function(){
			$(this).removeClass("selected");
		});
		_this.addClass("selected");
		$("#imageModalLabel").text("Edit gambar Instalasi");
		$("#output").attr("src",elem.src);
		$("#imageTitle").val($("#install_image tbody tr.selected td.image_name span.image_title").html());
		$("#description_image").val($("#install_image tbody tr.selected td.image_description").html());
		$("#dAddInstallImage").modal();
	}
	$("#saveimage").click(function(){
		switch($("#imageModalLabel").text()){
			case "Edit gambar Instalasi":
				updateImage()
			break;
			case "Penambahan Gambar Instalasi":
				saveNewImage();
			break;
		}
	});
	updateImage = function(){
		$.ajax({
			url:thisdomain+"install_images/update",
			data:{
				id:$("#install_image tbody tr.selected").attr("image_id"),
				img:$("#output").attr("src"),
				description:$("#description_image").val(),
				title:$("#imageTitle :selected").text()
				},
			type:"post"
		})
		.done(function(){
			$("#install_image tbody tr.selected img").attr("src",$("#output").attr("src"));
			$("#install_image tbody tr.selected td.image_name span.image_title").html($("#imageTitle :selected").text());
			$("#install_image tbody tr.selected td.image_description").html($("#description_image").val());
			console.log("update success");
		})
		.fail(function(err){
			console.log("update failed");
		});
	}
	saveNewImage = function(){
		$.ajax({
			url:thisdomain+"install_images/add",
			data:{
				install_site_id:$("#workplace").attr("install_site_id"),
				user_name:$("#createuser").val(),
				img:$("#output").attr("src"),
				description:$("#description_image").val(),
				title:$("#imageTitle").val(),
				username:$("#createuser").val()
				},
			type:"post"
		})
		.done(function(data){			
			$("#install_image tbody").append('<tr class="rImage" image_id='+data+' ><td class="image_path"><a class="fancyboxx" rel="group"><img src="'+$("#output").attr("src")+'" class="img-polaroid" onclick="viewImage(this)" width=50 height=38 /></a></td><td class="info image_name"><a class="fancybox" rel="group"</a> <span></span> <span class="image_title">'+$('#imageTitle').val()+'</span></td> <td class="image_description">'+$('#description_image').val()+'</td><td><a><span class="icon-trash removeinstallimage pointer" ></span></a>	<a><span class="icon-arrow-up switchup pointer"></span></a>	<a><span class="icon-arrow-down switchdown pointer"></span></a>	<a><span class="icon-pencil imageedit pointer"></span></a> </td>  </tr>');
                                
			$("#install_image").on("click",".newimage",function(){
				var selected = $(this).stairUp({level:3});
				console.log("image_id",selected.attr("image_id"));
				$("#dConfirmation").removeConfirmation({
					removeUrl:thisdomain+"install_images/remove",
					idElement:selected.attr("image_id"),
					selectedElement:selected,
					totalElement:"total_image",
					tableElement:"install_image",
				});
			});			
			update_rowcount($("#total_image"),$("#install_image tbody tr"));
			$(".switchup").bind("click",function(){
				var thisrow = $(this).stairUp({level:3});
				var prevrow = $(this).stairUp({level:3}).prev();
				var image_description = thisrow.find(".image_description").html();
				var image_filename = thisrow.find(".image_path").html();
				var image_name = thisrow.find(".image_name").html();
				var image_id = thisrow.attr("image_id");
				var image_path = thisrow.attr("image_path");
				var pimage_description = prevrow.find(".image_description").html();
				var pimage_filename = prevrow.find(".image_path").html();
				var pimage_name = prevrow.find(".image_name").html();
				var pimage_id = prevrow.attr("image_id");
				var pimage_path = prevrow.attr("image_path");
				if(prevrow.hasClass("rImage")){
					$.ajax({
						url:thisdomain+"install_images/switch_order/"+thisrow.attr("image_id")+"/"+prevrow.attr("image_id"),
					}).done(function(){
						thisrow.find(".image_description").html(pimage_description);
						prevrow.find(".image_description").html(image_description);
						thisrow.find(".image_path").html(pimage_filename);
						prevrow.find(".image_path").html(image_filename);
						thisrow.find(".image_name").html(pimage_name);
						prevrow.find(".image_name").html(image_name);
						thisrow.attr("image_id",pimage_id);
						prevrow.attr("image_id",image_id);
						thisrow.attr("image_path",pimage_path);
						prevrow.attr("image_path",image_path);
					});
				}else{
					console.log("there is no prev row");
				}
			});
			$(".switchdown").bind("click",function(){
				var thisrow = $(this).stairUp({level:3});
				var nextrow = $(this).stairUp({level:3}).next();
						var image_description = thisrow.find(".image_description").html();
						var image_filename = thisrow.find(".image_path").html();
						var image_name = thisrow.find(".image_name").html();
						var image_id = thisrow.attr("image_id");
						var image_path = thisrow.attr("image_path");
						var nimage_description = nextrow.find(".image_description").html();
						var nimage_filename = nextrow.find(".image_path").html();
						var nimage_name = nextrow.find(".image_name").html();
						var nimage_id = nextrow.attr("image_id");
						var nimage_path = nextrow.attr("image_path");
				if(nextrow.hasClass("rImage")){
					$.ajax({
						url:thisdomain+"install_images/switch_order/"+thisrow.attr("image_id")+"/"+nextrow.attr("image_id"),
					}).done(function(){
						thisrow.find(".image_description").html(nimage_description);
						nextrow.find(".image_description").html(image_description);
						thisrow.find(".image_path").html(nimage_filename);
						nextrow.find(".image_path").html(image_filename);
						thisrow.find(".image_name").html(nimage_name);
						nextrow.find(".image_name").html(image_name);
						thisrow.attr("image_id",nimage_id);
						nextrow.attr("image_id",image_id);
						thisrow.attr("image_path",nimage_path);
						nextrow.attr("image_path",image_path);
					});
				}else{
					console.log("there is no next row");
				}
			});
		});
	}
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
	$("#install_image tbody .imageedit").click(function(){
		var selected = $(this).stairUp({level:3});
		//window.location.href = thisdomain+"adm/canvasinstalledit/"+selected.attr("image_path");
		window.location.href = thisdomain+"install_images/imageedit/"+selected.attr("image_id");
	});
//}(jQuery));
