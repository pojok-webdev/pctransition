(function($){
	var tMaterial = $("#tMaterial").dataTable();
	console.log("texst");
	$("#addmaterial").click(function(){
		$("#myAddMaterialModalLabel").html('<span class="icon-plus icon-white"></span> Penambahan Jenis Material');
		$("#update_material_type").hide();
		$("#save_material_type").show();
		$("#dAddMaterialType").modal("show");
	});
	$(".closemodal").click(function(){
		$(this).modalClose({depth:7});
	});
	$(".modalclose").click(function(){
		$(this).modalClose({depth:7});
	});
	$('#tMaterial').on('click','tr .remove_material',function(){
		var selected = $(this).stairUp({level:2});
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"materialtypes/remove",
			idElement:selected.attr("myid"),
			selectedElement:selected,
			viewTotal:false,
			totalElement:"",
			tableElement:"",
		});
	});
	$("#tMaterial").on("click","tr .material_edit",function(){
		var selected = $(this).stairUp({level:2});
		$("#tMaterial tbody tr").removeClass("selected");
		selected.addClass("selected");
		$.ajax({
			url:thisdomain+"materialtypes/getJson",
			data:{id:selected.attr("myid")},
			type:"post",
			dataType:"json"
		}).done(function(data){
			console.log(data["name"]);
			$("#myAddMaterialModalLabel").html('<span class="icon-plus icon-white"></span> Edit Jenis Material');
			$("#update_material_type").show();
			$("#save_material_type").hide();
			$("#materialtype_name").val(data["name"]);
			$("#materialtype_description").val(data["description"]);
			$("#dAddMaterialType").modal();			
		});
	});
	$("#save_material_type").click(function(){
		$.post(thisdomain+'adm/materialtypeadd',{name:$("#materialtype_name").val(),description:$("#materialtype_description").val(),createuser:$("#workplace").attr("username")}).done(function(data){
			updaterow(data);
		}).fail(function(){
			alert("Tidal dapat menambahkan Jenis Peralatan, hubungi Developer");
		});
	});
	$("#update_material_type").click(function(){
		$(".inp_material").makekeyvalparam();
		$.ajax({
			url:thisdomain+"materialtypes/update",
			data:JSON.parse('{"id":"'+$("#tMaterial tbody tr.selected").attr("myid")+'",'+$(".inp_material").attr("keyval")+'}'),
			type:"post"
		}).fail(function(){
			console.log("Tidak dapat mengupdate");
		}).done(function(){
			$("#tMaterial tbody tr.selected").find(".materialname").html($("#materialtype_name").val());
			$("#tMaterial tbody tr.selected").find(".materialdescription").html($("#materialtype_description").val());
		});
	});
}(jQuery))
updaterow = function(data){
	$(".materials").dataTable().fnAddData(['<input type="checkbox" name="checkbox" value="<?php echo $obj->id;?> style=\'opacity=0\'"/>',data,$("#materialtype_name").val(),$("#materialtype_description").val(),'<span class="icon-pencil"></span><span class="icon-trash"></span>']);
}
fnGetRow = function(){
	return $(".materials").find("tr.row_selected").index();
}
