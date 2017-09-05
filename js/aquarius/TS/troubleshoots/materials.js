$.fn.fill_material = function(materialtype,selected){
	console.log(materialtype);
	console.log(selected);
	$(this).html("");
	thisap = $(this);
	$.getJSON(thisdomain+'materials/get_name_by_parent/'+materialtype,function(data){
		$.each(data,function(x,y){
			if(selected==y){
				console.log("selected"+y);
				thisap.append('<option value='+y+' selected=selected>'+y+'</option>');
			}else{
				console.log("not selected"+y);
				thisap.append('<option value='+y+'>'+y+'</option>');
			}
		});
	});
}
	$("#usedmaterial").html("");
	$.getJSON(thisdomain+'materials/get_name_by_parent/'+$("#materialtype").val(),function(data){
		$.each(data,function(x,y){
			$("#usedmaterial").append('<option value='+y+'>'+y+'</option>');
		});
	});
	$(".btn_addmaterial").click(function(){
		$('.updateusedmaterial').hide();
		$("#dUsedMaterial").modal();
	});
	$("#materialtype").change(function(){
		$("#usedmaterial").fill_material($(this).val());
	});
	$('.saveusedmaterial').click(function(){
		$.post(thisdomain+'troubleshoot_materials/save',{
			troubleshoot_request_id:$('#troubleshoot_id').val(),
			tipe:$('#materialtype :selected').text(),
			name:$('#usedmaterial :selected').text(),
			description:$('#usedmaterialdescription').val(),
			username:$('#createuser').val()
			})
		.done(function(data){
			$('#tbl_usedmaterial').append('<tr thisid='+data+'><td>'+$('#materialtype :selected').text()+'</td><td class="info"><a>'+$('#usedmaterial :selected').text()+'</a> </td><td>'+$('#usedmaterialdescription').val()+'</td><td><a><span class="icon-trash remove_material pointer" material_id="'+data+'" ></span></a></td></tr>');
			$('#dUsedMaterial').modal('hide');
			update_rowcount($("#total_material"),$("#tbl_usedmaterial tbody tr"));
		}).fail(function(){
			alert('Tidak dapat menyimpan material, silakan hubungi Developer');
		});
	});
	$("#tbl_usedmaterial").on("click",".remove_material",function(){
		var selected = $(this).stairUp({level:3});
		console.log(selected.attr("thisid"));
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"troubleshoot_materials/delete",
			idElement:selected.attr("thisid"),
			selectedElement:selected,
			totalElement:"total_material",
			tableElement:"tbl_usedmaterial",
		});
	});
$('.closemodal').click(function(){
	$(this).stairUp({level:2}).modal('hide');
});
