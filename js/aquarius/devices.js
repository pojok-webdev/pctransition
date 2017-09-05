$(document).ready(function(){
	oTable = $("#tDevice").dataTable({
		"aLengthMenu":[[5,10,25,-1],[5,10,25,"Semua"]],"iDisplayLength":5,
	});
	$('#adddevice').click(function(){
		$("#dAddDevice").modal();
	});
	oTable.on("click",".editdevice",function(){
		$("#editdevicetype_id").val($(this).attr("devicetype_id"));
		$("#editdevice_id").val($(this).attr("device_id"));
		$("#editdevice_name").val($(this).attr("device_name"));
		$("#editdevice_satuan").val($(this).attr("device_satuan"));
		$("#editdevice_description").val($(this).attr("device_description"));
		$("#dEditDevice").modal();
		});
	$("#editsave_device").click(function(){
		$.post(thisdomain+'adm/deviceupdate',{id:$('#editdevice_id').val(),devicetype_id:$('#editdevicetype_id').val(),name:$('#editdevice_name').val(),satuan:$('#editdevice_satuan').val(),description:$('#editdevice_description').val(),user_name:$('#workplace').attr('username')}).done(function(data){
			/*
			var $rowNode = $('#myTable').find('tbody tr:eq(0)').get(0);
			var data = table.fnGetData($rowNode);
			*/
			var nodes = oTable.fnGetNodes();
			var row = null;
			jQuery.each(nodes,function(key,val){
				if(jQuery(val).attr("device_id") == $("#editdevice_id").val()){
					oTable.fnUpdate(['<input type="checkbox" name="checkbox" value="'+$("#editdevice_id").val()+'"/>',$('#editdevice_name').val(),$('#editdevicetype_id :selected').text(),$('#editdevice_description').val(),'<span class="icon-pencil editdevice"  device_name="'+$("#editdevice_name").val()+'" device_id="'+$("#editdevice_id").val()+'" devicetype_id="'+$("#editdevicetype_id").val()+'"device_satuan="'+$("#editdevice_satuan").val()+'" device_description="'+$("#editdevice_description").val()+'"></span><span class="remove_device icon-trash" device_name="'+$("#editdevice_name").val()+'" device_id="'+$("#editdevice_id").val()+'"></span>'],key);
				}
			});
		});
	});
	$(".closemodal").click(function(){
		$(this).modalClose({depth:7});
	});
	oTable.on("click",".remove_device",function(){
		var selected = $(this).stairUp({level:2});
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"devices/remove",
			idElement:selected.attr("device_id"),
			selectedElement:selected,
			totalElement:"",
			tableElement:"",
		});
	});
	$("#save_device").click(function(){
		$.post(thisdomain+'devices/save',{devicetype_id:$('#devicetype_id').val(),name:$('#device_name').val(),satuan:$('#device_satuan').val(),description:$('#device_description').val(),user_name:$('#workplace').attr('username')}).done(function(data){
			console.log("ID : "+data);
			newRow = oTable.fnAddData(["<input type='checkbox' name='checkbox' />",$('#device_name').val(),$('#device_satuan').val(),$('#device_description').val(),"<span class='icon-pencil'></span><span class='remove_device icon-trash' device_name='"+$('#device_name').val()+"' device_id='"+data+"'></span>"]);
			var row = oTable.fnGetNodes(newRow);
			$(row).attr('device_id', data);
			$(".remove_device").bind("click",function(e){
				var selected = $(this).stairUp({level:2});
				$("#dConfirmation").removeConfirmation({
					removeUrl:thisdomain+"devices/remove",
					idElement:selected.attr("device_id"),
					selectedElement:selected,
					totalElement:"",
					tableElement:"",
				});				
			});
		}).fail(function(){alert('gagal');});
	});
});

editdevice = function(device_id,devicetype,name,satuan,description){
	$("#devicetype_id").val(devicetype);
	$("#device_name").val(name);
	$("#device_satuan").val(satuan);
	$("#device_description").val(description);
	$("#save_device").toggleClass("edit_device");
	//$("#save_device").addClass("edit_device");
	//$("#save_device").removeClass("save_device");
		$("#myModalLabel").text("Edit Peralatan "+device_id);
	$(".edit_device").bind("click",function(){
		//$(this).removeClass("edit_device");
		//$(this).addClass("save_device");
		$.post(thisdomain+'adm/deviceupdate',{id:device_id,devicetype_id:$('#devicetype_id').val(),name:$('#device_name').val(),satuan:$('#device_satuan').val(),description:$('#device_description').val(),user_name:$('#workplace').attr('username')}).done(function(data){alert(data);});
	});
		$("#dAddDevice").modal();
	}

populaterow = function(device_id,name,satuan,description){
	$("#tSortable").append('<tr><td><input type="checkbox" name="checkbox" value="'+device_id+'"/></td><td>'+name+'</td><td>'+satuan+'</td><td>'+description+'</td><td><span class="icon-pencil"></span><span class="icon-trash"></span></td></tr>');
}

function fnGetSelected()
{
    return $(".devices").find('tr.row_selected').index();
}

