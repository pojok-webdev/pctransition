(function($){
	var packagetable = $("#tPackage").dataTable();
	console.log("surveypackage.js");
	$("#addmaterial").click(function(){
		$("#update_package").hide();
		$("#save_package").show();
		$("#dAddmaterial").modal();
	});
	$(".closemodal").click(function(){
		$("#dAddmaterial").modal("hide");
	});
	$("#save_package").click(function(){
		$(".inp_package").makekeyvalparam();
		$.ajax({
			url:thisdomain+"surveypackages/save",
			data:JSON.parse('{'+$(".inp_package").attr("keyval")+'}'),
			type:"post"
		}).done(function(data){
			newRow = packagetable.fnAddData([$("#package_name").val(),$("#package_description").val(),'<div class="btn-group"><button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span></button><ul class="dropdown-menu pull-right"><li class="packageedit"><a href="#">Edit</a></li><li class="packagedetail" ><a href="#">Detail</a></li><li class="divider survey_save"></li><li class="packageremove" ><a href="#">Hapus</a></li></ul></div>']);
			var row = packagetable.fnGetNodes(newRow);
			$(row).attr('thisid', data);
			$(".packageedit").click(function(){
				var selected = $(this).stairUp({level:4});
				$("#tPackage tbody tr").removeClass("selected");
				var myid = selected.attr("thisid");
				$.ajax({
					url:thisdomain+"surveypackages/getjsonbyid",
					data:{id:myid},
					type:"post",
					dataType:"json"
				}).done(function(data){
					$("#package_name").val(data["name"]);
					$("#package_description").val(data["description"]);
					$("#update_package").show();
					$("#save_package").hide();
					selected.addClass("selected");
					$("#dAddmaterial").modal();
				});				
			});
		}).fail(function(){
			console.log("Tidak dapat menyimpan paket, silakan hubungi Developer");
		});
	});
	$("#tPackage").on("click","tbody tr .packageedit",function(){
		var selected = $(this).stairUp({level:4});
		$("#tPackage tbody tr").removeClass("selected");
		var myid = selected.attr("thisid");
		$.ajax({
			url:thisdomain+"surveypackages/getjsonbyid",
			data:{id:myid},
			type:"post",
			dataType:"json"
		}).done(function(data){
			$("#package_name").val(data["name"]);
			$("#package_description").val(data["description"]);
			$("#update_package").show();
			$("#save_package").hide();
			selected.addClass("selected");
			$("#dAddmaterial").modal();
		});
	});
	$("#tPackage").on("click","tbody tr .packagedetail",function(){
		window.location.href = thisdomain+'surveypackagedetails/index/'+$(this).stairUp({level:4}).attr("thisid");
	});
	$("#update_package").click(function(){
		var selected = $("#tPackage tbody tr.selected");
		$(".inp_package").makekeyvalparam();
		$.ajax({
			url:thisdomain+"surveypackages/update",
			data:JSON.parse('{"id":"'+selected.attr("thisid")+'",'+$(".inp_package").attr("keyval")+'}'),
			type:"post",
		}).done(function(data){
			selected.find(".packagename").html($("#package_name").val());
			selected.find(".packagedescription").html($("#package_description").val());
			console.log(data);
		});		
	});
	$("#tPackage tbody tr .packageremove").click(function(){
		var selected = $(this).stairUp({level:4});
		$.ajax({
			url:thisdomain+"surveypackages/remove",
			data:{id:selected.attr("thisid")},
			type:"post"
		}).done(function(){
			selected.fadeOut(200);selected.remove();
		});
	});
}(jQuery))
