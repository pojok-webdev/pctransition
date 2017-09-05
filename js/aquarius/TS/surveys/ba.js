console.log("HEHHEE");
$(".btn_addba").click(function(){
	console.log("Add BA loaded");
	$("#updateba").hide();
	$("#saveba").show();
	$("#dAddBeritaAcara").modal();
});
$(".closemodal").click(function(){
	$(this).stairUp({level:6}).modal('hide');
});
$(".edit_ba").click(function(){
	selected = $(this).stairUp({level:5});
	$(".tBA tbody tr").removeClass("selected");
	selected.addClass("selected");
	$("#updateba").show();
	$("#saveba").hide();
	$("#nameba").val(selected.find('.baname').html());
	$("#descriptionba").val(selected.find('.badesc').html());
	$("#baoutput").attr('src',selected.find('.baimg').attr('src'));
	$("#saveba").hide();
	$("#updateba").show();
	$("#dAddBeritaAcara").modal();
});
$(".remove_ba").click(function(){
	var selected = $(this).stairUp({level:5});
	$("#dConfirmation").removeConfirmation({
		removeUrl:thisdomain+"survey_bas/remove",
		idElement:selected.attr("myid"),
		selectedElement:selected,
		totalElement:"total_ba",
		tableElement:"ba",
	});
});
$(".closemodal").click(function(){
	$(this).stairUp({level:2}).modal('hide');
});
$("#saveba").click(function(){
	$.post(thisdomain+'survey_bas/add',{
		survey_site_id:$("#survey_site_id").val(),
		createuser:$("#workplace").attr("user_name"),
		name:$("#nameba").val(),
		img:$("#baoutput").attr("src"),
		description:$("#descriptionba").val()
	})
	.done(function(data){
		$("#ba").appendba(data)
	})
	.fail(function(err){
		alert("tidak dapat menambah Berita Acara, hubungi Developer",err);
	});
});
$("#updateba").click(function(){
	$.ajax({
		url:thisdomain+'survey_bas/update',
		data:{id:$(".tBA tbody tr.selected").attr('myid'),name:$("#nameba").val(),description:$("#descriptionba").val(),img:$("#baoutput").attr("src")},
		type:"post"
	})
	.done(function(res){
		selected.find('.baimg').attr('src',$('#baoutput').attr('src'));
		selected.find('.badesc').html($("#descriptionba").val());
		selected.find('.baname').html($("#nameba").val());
		console.log("RES",$('#baoutput').attr('src'));
	})
	.fail(function(err){
		console.log("RES",err);
	});
});

$.fn.appendba = function(data){
	$(this).append('<tr myid='+data+'><td><a class="fancybox" rel="group" href="'+$('#baoutput').attr("src")+'"><img src="'+$('#baoutput').attr("src")+'" class="img-polaroid" width=50 height=38 /></a></td><td>'+$("#nameba").val()+'</td><td>'+$("#descriptionba").val()+'</td><td><div class="btn-group"><button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span></button><ul class="dropdown-menu pull-right"><li class="pointer"><a class="edit_ba">Edit</a></li><li class="divider"></li><li class="pointer"><a class="remove_ba">Hapus</a></li></ul></div></td></tr>');
	update_rowcount($("#total_ba"),$("#ba tbody tr"));
	$(".sremove_ba").bind("click",function(){
		var selected = $(this).stairUp({level:3});
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"survey_bas/remove",
			idElement:selected.attr("myid"),
			selectedElement:selected,
			totalElement:"total_ba",
			tableElement:"ba",
		});
	});
}
function baloadImage(evt){
	var input = evt.target;
	var filereader = new FileReader();
	filereader.onload = function(){
		resizeImage(filereader.result, function(result){
			$("#baoutput").attr("src",result);
			$("#addBAImage").val(result);
		})
	}
	filereader.readAsDataURL(input.files[0]);
}
