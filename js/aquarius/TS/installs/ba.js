(function($){
	$(".btn_addba").click(function(){
		$("#updateba").hide();
		$("#saveba").show();
		$("#dAddBeritaAcara").modal("show");
	});
	$(".remove_ba").click(function(){
		var selected = $(this).stairUp({level:5});
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"install_bas/remove",
			idElement:selected.attr("myid"),
			selectedElement:selected,
			totalElement:"total_ba",
			tableElement:"ba",
		});
	});
	$(".edit_ba").click(function(){
		selected = $(this).stairUp({level:5});
		$(".tBA tbody tr").removeClass("selected");
		selected.addClass("selected");
		$("#nameba").val(selected.find('.baname').html());
		$("#descriptionba").val(selected.find('.badesc').html());
		$("#baoutput").attr('src',selected.find('.baimg').attr('src'));
		$("#saveba").hide();
		$("#updateba").show();
		$("#dAddBeritaAcara").modal();
	});
	$("#saveba").click(function(){
		$.post(thisdomain+'install_bas/add',{
			install_site_id:$("#workplace").attr("install_site_id"),
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
			url:thisdomain+'install_bas/update',
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
}(jQuery))
$.fn.appendba = function(data){
	var cur_date = humandatetime();
	$(this).append('<tr myid='+data+'><td><a class="fancybox" rel="group" href="'+$('#baoutput').attr("src")+'"><img src="'+$('#baoutput').attr("src")+'" class="img-polaroid" width=50 height=38 /></a></td><td>'+cur_date+'</td><td>'+$("#nameba").val()+'</td><td>'+$("#descriptionba").val()+'</td><td><div class="btn-group"><button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span></button><ul class="dropdown-menu pull-right"><li class="pointer"><a class="edit_ba">Edit</a></li><li class="divider"></li><li class="pointer"><a class="remove_ba">Hapus</a></li></ul></div></td></tr>');
	update_rowcount($("#total_ba"),$("#ba tbody tr"));
	$(".remove_ba").bind("click",function(){
		var selected = $(this).stairUp({level:5});
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"install_bas/remove",
			idElement:selected.attr("myid"),
			selectedElement:selected,
			totalElement:"total_ba",
			tableElement:"ba",
		});
	});
}
	function loadImage(evt){
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
