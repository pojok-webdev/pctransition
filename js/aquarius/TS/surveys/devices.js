(function($){
	$("#device_name").html("");
	$("#device_type").val("1");
	$.getJSON(thisdomain+'devices/getdevice/1',function(data){
		$.each(data,function(x,y){
			filldeviceopt(x,y);
		});
		$(deviceopt).appendTo("#device_name");
	});
	$(".btnadddevice").click(function(){
		$("#myDeviceLabel").html("Penambahan Peralatan");
		$("#savesurveydevice").show();
		$("#updatesurveydevice").hide();
		$("#dAddDevice").modal("show");
	});
	$(".device").on("click","tbody tr td.editable",function(){
		selected = $(this).stairUp({level:1});
		$.ajax({
			url:thisdomain+"survey_devices/jsonbyid/"+$(this).stairUp({level:1}).attr("thisid"),
			type:"get",
			dataType:"json",
		}).done(function(data){
			$("#device_type").selectopt(data["devicetype_id"]);
			$("#device_name").populateCombo({
				url:thisdomain+"devices/getdevice/"+data["devicetype_id"],
				selected:data["device_id"],
				keyvalpaired:true,
				namebasedselect:false
			});
			$("#device_description").val(data["description"]);
			$("#device_amount").val(data["amount"]);
			$("#myDeviceLabel").html("Update Peralatan");
			$("#updatesurveydevice").show();
			$("#savesurveydevice").hide();
			$(".device tbody tr").removeClass("selected");
			selected.addClass("selected");
			$("#dAddDevice").modal("show");
		}).fail(function(){
			console.log("Tidak dapat mengambil data, silakan hubungi Developer");
		});
	});
	$("#savesurveydevice").click(function(){
		$(".inp_devices").makekeyvalparam();
		$.post(thisdomain+'adm/addsurveydevice',JSON.parse('{'+$(".inp_devices").attr("keyval")+',"name":"'+$('#device_name :selected').text()+'"}')).done(function(data){
			$(".device").append('<tr thisid='+data+'><td class="editable type"><a>'+$("#device_type :selected").text()+'</a></td><td class="info editable name"><a>'+$("#device_name :selected").text()+'</a>'+$('#device_description').val()+'</td><td class="editable amount">'+$("#device_amount").val()+'</td><td><span class="icon-remove device_remove"></span></td></tr>');
			update_rowcount($("#total_device"),$(".device tbody tr"));
			$('.device_remove').bind('click',function(){
				selected = $(this).stairUp({level:2});
				$.post(thisdomain+"survey_devices/remove",{id:selected.attr('thisid')}).done(function(data){
					selected.fadeOut(2000);selected.remove();
					update_rowcount($("#total_device"),$(".device tbody tr"));
				}).fail(function(){
					alert('Tidak dapat menghapus peralatan, silakan hubungi Developer');
				});
			});

		});
	});
	$("#updatesurveydevice").click(function(){
		$(".inp_devices").makekeyvalparam();
		$.ajax({
			url:thisdomain+'survey_devices/update',
			data:JSON.parse('{'+$(".inp_devices").attr("keyval")+',"name":"'+$('#device_name :selected').text()+'","id":"'+$(".device tbody tr.selected").attr("thisid")+'"}'),
			type:"post",
		}).done(function(){
			$(".device tbody tr.selected").find(".type").html($('#device_type :selected').text());
			$(".device tbody tr.selected").find(".name").html('<a>'+$('#device_name :selected').text()+'</a>'+$('#device_description').val());
			$(".device tbody tr.selected").find(".amount").html($('#device_amount').val());
		});
	});
	var deviceopt;
	$("#device_type").change(function(){
		$("#device_name").html("");
		filldevice($(this).val());
	});
	filldeviceopt = function(x,y){
		deviceopt+="<option value="+x+">"+y+"</option>";
	}
	filldevice = function(devicetype){
		$("#device_name").html("");
		deviceopt = "";
		$.getJSON(thisdomain+'devices/getdevice/'+devicetype,function(data){
			$.each(data,function(x,y){
				filldeviceopt(x,y);
			});
			$(deviceopt).appendTo("#device_name");
		});
	}
}(jQuery))
