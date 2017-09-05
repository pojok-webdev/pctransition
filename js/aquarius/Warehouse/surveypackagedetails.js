(function($){
	var tSurveypackagedetail = $("#tSurveypackagedetails").dataTable();
	$("#device_id").populateCombo({
		keyvalpaired:true,
		url:thisdomain+'surveypackagedetails/devices/'+$("#materialtype").val(),
	});
	$("#addmaterial").click(function(){
		$("#update_material").hide();
		$("#save_material").show();
		$("#dAddmaterial").modal();
	});
	$(".closemodal").click(function(){
		$("#dAddmaterial").modal("hide");
	});
	$("#tSurveypackagedetails").on("click","tbody tr .deviceedit",function(){
		var selected = $(this).stairUp({level:4});
		var thisid = selected.attr("thisid");
		$.ajax({
			url:thisdomain+"surveypackagedetails/jsonbyid/"+thisid,
			dataType:"json"
		}).done(function(data){
			$("#materialtype").val(data["devicetype_id"]);
			$("#device_id").populateCombo({
				keyvalpaired:true,
				url:thisdomain+'surveypackagedetails/devices/'+$("#materialtype").val(),
			});			
			$("#device_id").val(data["device_id"]);
			$("#material_amount").val(data["amount"]);
			$("#tSurveypackagedetails tbody tr").removeClass("selected");
			$("#update_material").show();
			$("#save_material").hide();
			selected.addClass("selected");
			$("#dAddmaterial").modal();
		}).fail(function(){
			console.log("Tidak dapat mengambil data");
		});
	});
	$("#save_material").click(function(){
		$(".inp_materials").makekeyvalparam();
		$.ajax({
			url:thisdomain+'surveypackagedetails/save',
			data:JSON.parse('{'+$(".inp_materials").attr("keyval")+',"name":"'+$("#device_id :selected").text()+'"}'),
			type:'post'
		}).fail(function(){
			console.log("Failed to insert : "+$(".inp_materials").attr("keyval"));
		}).done(function(data){
			newRow = tSurveypackagedetail.fnAddData([$("#device_id :selected").text(),$("#materialtype :selected").text(),$("#material_amount").val(),'<div class="btn-group"><button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span></button><ul class="dropdown-menu pull-right"><li class="deviceedit"><a href="#">Edit</a></li><li class="divider survey_save"></li><li class="deviceremove" ><a href="#">Hapus</a></li></ul></div>']);
			var row = tSurveypackagedetail.fnGetNodes(newRow);
			$(row).attr('thisid', data);
			$(".deviceedit").click(function(){
				var selected = $(this).stairUp({level:4});
				var thisid = selected.attr("thisid");
				$.ajax({
					url:thisdomain+"surveypackagedetails/jsonbyid/"+thisid,
					dataType:"json"
				}).done(function(data){
					$("#materialtype").val(data["devicetype_id"]);
					$("#device_id").populateCombo({
						keyvalpaired:true,
						url:thisdomain+'surveypackagedetails/devices/'+$("#materialtype").val(),
					});			
					$("#device_id").val(data["device_id"]);
					$("#material_amount").val(data["amount"]);
					$("#tSurveypackagedetails tbody tr").removeClass("selected");
					$("#update_material").show();
					$("#save_material").hide();
					selected.addClass("selected");
					$("#dAddmaterial").modal();
				}).fail(function(){
					console.log("Tidak dapat mengambil data");
				});				
			});
		});
	});
	$("#update_material").click(function(){
		$(".inp_materials").makekeyvalparam();
		var myid = $("#tSurveypackagedetails tbody tr.selected").attr("thisid");
		$.ajax({
			url:thisdomain+'surveypackagedetails/update',
			data:JSON.parse('{"id":"'+myid+'",'+$(".inp_materials").attr("keyval")+',"name":"'+$("#device_id :selected").text()+'"}'),
			type:'post'
		}).fail(function(){
			console.log("Failed to update : "+$(".inp_materials").attr("keyval"));
		}).done(function(data){
			$("#tSurveypackagedetails tbody tr.selected").find(".devicename").html($("#device_id :selected").text());
			$("#tSurveypackagedetails tbody tr.selected").find(".devicetypename").html($("#materialtype :selected").text());
			$("#tSurveypackagedetails tbody tr.selected").find(".deviceamount").html($("#material_amount").val());
			console.log(data);
		});		
	});
	$("#materialtype").change(function(){
		var thisid = $(this).val();
		$("#device_id").populateCombo({
			keyvalpaired:true,
			url:thisdomain+'surveypackagedetails/devices/'+thisid,
		});
	});
}(jQuery))
