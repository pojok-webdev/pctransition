$(document).ready(function(){
	$("#adddevice").click(function(){
		$("#update_device_type").hide();
		$("#save_device_type").show();
		$("#dAddDeviceType").modal("show");
	});
	$(".deviceTypeModalClose").click(function(){
		$(this).stairUp({level:6}).modal("hide");
	});
	$("#update_device_type").click(function(){
		$(".inpdevicetype").makekeyvalparam();
		$.ajax({
			url:thisdomain+'devicetypes/update/',
			data:JSON.parse('{'+$(".inpdevicetype").attr("keyval")+'}'),
			type:'post',
			async:false
		}).done(function(data){
			$("#tDeviceType tbody tr.selected td.devicedescription").html($("#devicetype_description").val());
			$("#tDeviceType tbody tr.selected td.devicename").html($("#devicetype_name").val());
		}).fail(function(){
			alert("Tidak dapat mengupdate Tipe Perangkat, silakan hubungi Developer");
		});
	});
	$(".confirmationModalClose").click(function(){
		$(this).stairUp({level:3}).modal("hide");
	});
	$(".closemodal").click(function(){
		$(this).modalClose({depth:7});
	});
	$("#tDeviceType").on("click",".remove_device").click(function(){
		var selected = $(this).stairUp({level:2});
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"devicetypes/remove",
			idElement:selected.attr("myid"),
			selectedElement:selected,
			totalElement:"total_ba",
			tableElement:"ba",
		});
	});
	$("#save_device_type").click(function(){
		$.post(thisdomain+'devicetypes/save',{name:$("#devicetype_name").val(),description:$("#devicetype_description").val(),createuser:$("#workplace").attr("username")}).done(function(data){
				$(".devices").dataTable().fnAddData(['<input type="checkbox" name="checkbox" value="<?php echo $obj->id;?> style=\'opacity=0\'"/>',data,$("#devicetype_name").val(),$("#devicetype_description").val(),'<span class="icon-pencil"></span><span class="icon-trash"></span>']);
		}).fail(function(){
			alert("Tidal dapat menambahkan Jenis Peralatan, silakan hubungi Developer");
		});
	});
	$("#tDeviceType").dataTable();
	$("#tDeviceType").on('click','.dtedit',function(){
		$("#devicetype_id").val($(this).stairUp({level:2}).attr('myid'));
		$("#tDeviceType tbody tr").removeClass("selected");
		$(this).stairUp({level:2}).addClass("selected");
		$("#update_device_type").show();
		$("#save_device_type").hide();
		$.ajax({
			url:thisdomain+'devicetypes/get_by_id',
			data:{id:$(this).stairUp({level:2}).attr('myid')},
			type:'post',
			dataType:'json',
		}).done(function(data){
			$("#devicetype_name").val(data['name']);
			$("#devicetype_description").val(data['description']);
		}).fail(function(){
			alert("Tidak dapat menampilkan Jenis Perangkat, silakan hubungi Developer");
		});
		$("#dAddDeviceType").modal();
	});
});
fnGetRow = function(){
	return $(".devices").find("tr.row_selected").index();
}
