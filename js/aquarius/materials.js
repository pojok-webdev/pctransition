(function($){
	var tMaterial = $("#tMaterial").dataTable();
	$('#addmaterial').click(function(){
		$("#update_material").hide();
		$("#save_material").show();		
		$("#dAddmaterial").modal("show");
	});
	$(".closemodal").click(function(){
		$(this).modalClose({depth:7});
	});
	$('#tMaterial').on('click','tr .remove_material',function(){
		var selected = $(this).stairUp({level:2});
		console.log("id "+selected.attr("myid"));
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"materials/remove",
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
			url:thisdomain+"materials/getJson",
			data:{id:selected.attr("myid")},
			type:"post",
			dataType:"json"
		}).done(function(data){
			console.log(data["name"]);
			$("#myAddMaterialModalLabel").html('<span class="icon-plus icon-white"></span> Edit Jenis Material');
			$("#update_material").show();
			$("#save_material").hide();
			$("#material_name").val(data["name"]);
			$("#material_description").val(data["description"]);
			$("#material_satuan").val(data["satuan"]);
			$("#editmaterialtype_id").val(data["editmaterialtype_id"]);
			$("#dAddmaterial").modal();			
		});
	});
	$("#save_material").click(function(){
		$(".inp_material").makekeyvalparam();
		$.ajax({
			url:thisdomain+"adm/materialsave",
			data:JSON.parse('{'+$(".inp_material").attr("keyval")+'}'),
			type:"post",
		}).done(function(data){//});
		tMaterial.fnAddData(["<input type='checkbox' name='checkbox' />",$('#material_name').val(),$('#material_satuan').val(),$('#material_description').val(),"<span class='icon-pencil pointer material_edit'></span><span class='remove_material pointer icon-trash' material_name='"+$('#material_name').val()+"' material_id='"+data+"'></span>"]);
		$(".remove_material").bind("click",function(e){
			var selected = $(this).stairUp({level:2});
			$("#dConfirmation").removeConfirmation({
				removeUrl:thisdomain+"materials/remove",
				idElement:selected.attr("myid"),
				selectedElement:selected,
				viewTotal:false,
				totalElement:"",
				tableElement:"",
			});
		});
	}).fail(function(){
		alert('gagal');});
	});
	$("#update_material").click(function(){
		$(".inp_material").makekeyvalparam();
		$.ajax({
			url:thisdomain+"materials/update",
			data:JSON.parse('{"id":"'+$("#tMaterial tbody tr.selected").attr("myid")+'",'+$(".inp_material").attr("keyval")+'}'),
			type:"post"
		}).fail(function(){
			console.log("Tidak dapat mengupdate");
		}).done(function(){
			$("#tMaterial tbody tr.selected").find(".materialname").html($("#material_name").val());
			$("#tMaterial tbody tr.selected").find(".materialtype").html($("#editmaterialtype_id :selected").text());
			$("#tMaterial tbody tr.selected").find(".materialsatuan").html($("#material_satuan").text());
			$("#tMaterial tbody tr.selected").find(".materialdescription").html($("#material_description").val());
		});
	});	
}(jQuery))
populaterow = function(material_id,name,satuan,description){
	$("#tSortable").append('<tr><td><input type="checkbox" name="checkbox" value="'+material_id+'"/></td><td>'+name+'</td><td>'+satuan+'</td><td>'+description+'</td><td><span class="icon-pencil"></span><span class="icon-trash"></span></td></tr>');
}

function fnGetSelected()
{
    return $(".materials").find('tr.row_selected').index();
}
