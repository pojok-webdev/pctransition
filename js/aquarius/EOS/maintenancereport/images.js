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
			console.log("can i ?",uri);
			$("#output").attr("src",uri);
			$("#survimageurl").val(uri);
			$("body").css("cursor","default");
			$("#savesurveyimage").prop("disabled",false);
		});
  }
  fileReader.readAsDataURL(input.files[0]);
}
function uploadTopologi1(evt){
	console.log("UPLOAD TOPOLOGI INVOKED");
  var input = evt.target;
  var fileReader = new FileReader();
  fileReader.onloadend = function(){
	  	console.log("UPLOAD TOPOLOGI INVOKED....WAITTTT");
	  $("body").css("cursor","wait");
		resizeImage(fileReader.result,function(uri){
			console.log("UPLOAD TOPOLOGI INVOKED....RESIZED");
			console.log("can i ?",uri);
			$("#topologioutput").attr("src",uri);
			$("body").css("cursor","default");
		});
  }
  fileReader.readAsDataURL(input.files[0]);
}
$("#savedocument").click(function(){
    $.ajax({
        url:'/pmaintenances/savedocument',
        data:{
            maintenancereport_id:$("#maintenance_id").val(),
			image:$("#documentimage").attr("src"),
			imagetype:'2',
            name:$("#documentname").val(),
            description:$("#documentdescription").val()
        },
        type:'post'
    })
    .done(function(res){
        console.log("Save Document Success",res);
        str = '<tr myid="'+res+'">';
        str+= '<td><img class="documentimage" width="50" src="'+$("#documentimage").attr("src")+'"></td>';
        str+= '<td>'+$("#documentname").val()+'</td>';
        str+= '<td>'+$("#documentdescription").val()+'</td>';
        str+= '<td><span class="icon-trash btnremovekompetitor"></span></td>';
        str+= '</tr>';
        $("#tDocument").prepend(str);
    })
    .fail(function(err){
        console.log("Save Document Error",err);
    });
});
$(".closemodal2").click(function(){
    $(this).stairUp({level:2}).dialog("close");
})
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
$(".btn_addimage").click(function(){
    $("#dAddPicture").modal();
	//$("#dUpload").dialog();dAddTopologi
});
$(".btn_addtopologi").click(function(){
    $("#dAddTopologi").modal();
	//$("#dUpload").dialog();
});
function loadDocument(evt){
    console.log("Load Document done");
	var input = evt.target;
	var filereader = new FileReader();
	filereader.onload = function(){
		resizeImage(filereader.result, function(result){
			$("#documentimage").attr("src",result);
			console.log("Image loaded");
		})
	}
	filereader.readAsDataURL(input.files[0]);
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
	$('#btnSaveImage').click(function(){
		console.log("Document Name",$("#documentname").val());
		console.log("Document Desc",$("#documentdescription").val());
		$.ajax({
			url:'../../maintenancereports/saveimage',
			data:{
				maintenancereport_id:$('#maintenancereport').val(),
				image:$("#output").attr("src"),
				imagetype:'2',
				name:$("#documentname").val(),
				description:$("#documentdescription").val()
				},
			type:"post"
		})
		.done(function(res){
			console.log("Res",res);
			$("#dAddPicture").modal("hide");
			str = '<tr class="rImage">';
			str+= '<td class="image_path">';
			str+= '<a class="fancyboxx" rel=\"groupx\">';
			str+= '<img src='+$("#output").attr("src")+' class="img-polaroidx prevImage" onclick="viewImage(this)" width=50 height=38 />';
			str+= '</a>';
			str+= '</td><td class="info image_name"><a></a><span>'+$("#documentname").val()+'</span></td>';
			str+= '<td class="image_description">'+$("#documentdescription").val()+'</td>';
			str+= '<td><a><span class="icon-trash removemaintenanceimage"></span></a>';
			str+= '</td>';
			str+= '</tr>';
			$("#tImage tbody").append(str);
			update_rowcount($("#total_image"),$("#tImage tbody tr"));
		})
		.fail(function(err){
			console.log("Err",err);
		});
	});
	$('#btnSavetopologi').click(function(){
		$.ajax({
			url:'../../maintenancereports/saveimage',
			data:{
				maintenancereport_id:$('#maintenancereport').val(),
				image:$("#topologioutput").attr("src"),
				name:$("#topologiname").val(),
				imagetype:'1',
				description:$("#topologidescription").val()
				},
			type:"post"
		})
		.done(function(res){
			console.log("Res",res);
			$("#dAddTopologi").modal("hide");
			str = '<tr class="rImage">';
			str+= '<td class="image_path">';
			str+= '<a class="fancyboxx" rel=\"groupx\">';
			str+= '<img src='+$("#topologioutput").attr("src")+' class="img-polaroidx prevImage" onclick="viewImage(this)" width=50 height=38 />';
			str+= '</a>';
			str+= '</td><td class="info image_name"><a></a><span>'+$("#topologiname").val()+'</span></td>';
			str+= '<td class="image_description">'+$("#topologidescription").val()+'</td>';
			str+= '<td><a><span class="icon-trash removemaintenancetopologiimage"></span></a>';
			str+= '</td>';
			str+= '</tr>';
			$("#tTopologi tbody").append(str);
			update_rowcount($("#total_topologi"),$("#tTopologi tbody tr"));
		})
		.fail(function(err){
			console.log("Err",err);
		});
	});
	$("#tImage tbody").on("click",".removemaintenanceimage",function(){
		myrow = $(this).stairUp({level:3});
		myid = $(this).stairUp({level:3}).attr("myid");
		console.log("remove oamage ...",myid);
		$.ajax({
			url:'../removeimage',
			data:{id:myid},
			type:'post'
		})
		.done(function(res){
			console.log("Res",res);
			update_rowcount($("#total_image"),$("#tImage tbody tr"));
			myrow.hide();
		})
		.fail(function(err){
			console.log("Err",err);
		});
	})
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
	$("#tTopologi tbody tr").on("click",".removemaintenancetopologiimage",function(){
		$("#tTopologi tbody tr").removeClass("selected");
		$(this).stairUp({level:3}).addClass("selected");
		myid = $(this).stairUp({level:3}).attr("myid");
		console.log("MYID",myid);
		$.ajax({
			url:'/maintenancereports/removeimage',
			type:'post',
			data:{id:myid}
		})
		.done(function(res){
			console.log("remove maintenance topologi",res);
			$("#tTopologi tbody tr.selected").remove();
			update_rowcount($("#total_topologi"),$("#tTopologi tbody tr"));
		})
		.fail(function(err){
			console.log("fail remove maintenance topologi",err)
		});
	})
}(jQuery))
