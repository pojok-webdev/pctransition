(function($){
	var materialopt;
	$("#material_type").change(function(){
		$("#material_name").html("");
		fillmaterial($(this).val());
	});
	fillmaterialopt = function(x,y){
		materialopt+="<option value="+x+">"+y+"</option>";
	}
	fillmaterial = function(materialtype){
		$("#material_name").html("");
		materialopt = "";
		$.getJSON(thisdomain+'materials/getmaterial/'+materialtype,function(data){
			$.each(data,function(x,y){
				fillmaterialopt(x,y);
			});
			$(materialopt).appendTo("#material_name");
		});
	}
	$(".addMaterial").click(function(){
		$("#dAddMaterial").modal("show");
	});
	$("#savesurveymaterial").click(function(){
		$.post(thisdomain+'adm/addsurveymaterial',{survey_site_id:$('#workplace').attr('site_id'),material_type:$("#material_type :selected").text(),name:$('#material_name :selected').text(),amount:$('#material_amount').val(),createuser:$('#createuser').val()}).done(function(data){
			$('.material').append('<tr><td><a>'+$('#material_type :selected').text()+'</a></td><td class="info"><a>'+$("#material_name :selected").text()+'</a></td><td>'+$("#material_amount").val()+'</td><td><a><span class="icon-remove pointer material_remove"  id='+data+' site_id=1></span></a></td></tr>');
			$("#"+data).bind("click",function(){
				$(this).stairUp({level:3}).remove();
				$.post(thisdomain+"adm/material_remove",{id:data}).done(function(data){
					update_rowcount($("#total_material"),$(".material tbody tr"));
				});
			});
			update_rowcount($("#total_material"),$(".material tbody tr"));
		}).fail(function(){
			alert('Tidak dapat menyimpan material, silakan hubungi Developer');
		});
	});
	$("#tsurveymaterial").on("click",".material_remove",function(){
		$(this).stairUp({level:3}).remove();
		$.post(thisdomain+"adm/material_remove",{id:$(this).attr('id')}).done(function(data){
			$("#total_material").html($("#tsurveymaterial tbody tr:last").index()+1);
		})
	});
}(jQuery))
