(function($){
    $('#bts_id').change(function(){
		$("#apselect").fill_ap($(this).val(),null);
	});
    $('.addbtsdistance').click(function(){
		$('#bts_id').val(0);
		$('#bts_distance').val('');
		$('#updatebtsdistance').hide();
		$('#savebtsdistance').show();
		$("#apselect").fill_ap($("#bts_id").val(),null);
		$("#dAddBTSDistance").modal("show");
	});
    $('#tBTS').on("click",".btsdistance_remove",function(){
		$(this).stairUp({level:3}).fadeOut(200).remove();
		$.post(thisdomain+"adm/btsdistance_remove",{btsdistance_id:$(this).attr('btsdistance_id')}).done(function(data){
			update_rowcount($("#total_bts"),$(".btsdistance tbody tr"));
		}).fail(function(data){
			alert('Tidak dapat menghapus BTS, silakan hubungi Developer');
		});
        return false;
	});
	$('#tBTS').on('click','.btsdistance_edit',function(){
		$(this).callbtsedit();
	});
	$.fn.callbtsedit = function(){
		btsdistance_id = $(this).stairUp({level:3}).attr('id');
		$('.btsrows').removeClass("selected");
		$(this).stairUp({level:3}).addClass("selected");
		$("#updatebtsdistance").show();
		$("#savebtsdistance").hide();
		$.getJSON(thisdomain+'survey_bts_distances/get/'+btsdistance_id,function(data){
			$('#bts_id').val(data['btstower_id']);
			$("#updatebtsdistance").attr("btsdistance_id",data['id']);
			$('#apselect').fill_ap(data['btstower_id'],data['ap']);
			$('#bts_distance').val(data['distance']);
			$('#losnlosselect').val(data['los']);
			$('#obstacle').val(data['obstacle']);
			$('#bts_description').val(data['description']);
		});
		$("#savebtsdistance").attr('btsdistance_id',btsdistance_id)
		$('#dAddBTSDistance').modal();
	}

	$('#savebtsdistance').click(function(){
		if($('#bts_id').val()=='0'){
			alert('BTS harus dipilih');
		}else{
			$('.inp_bts').makekeyvalparam();
			$.post(thisdomain+'survey_bts_distances/addbtsdistance',JSON.parse('{'+$('.inp_bts').attr('keyval')+'}')).done(function(data){
				switch($('#losnlosselect :selected').val()){
					case '0':
						sighting='NLOS';
						break;
					case '1':
						sighting='LOS';
						break;
					case '2':
						sighting='nLOS';
						break;
				}
				$('.btsdistance').append('<tr id="'+data+'" class="btsrows"><td class="info"><a>'+$("#bts_id :selected").text()+'</a> <span></span> <span></span></td><td class="ilosnlos">'+sighting+'</td><td class="idistance">'+$('#bts_distance').val()+'</td><td><a><span onClick="removesurveysite()" class="icon-remove pointer btsdistance_remove"  btsdistance_id='+data+'></span></a><a><span class="icon-edit btsdistance_edit"></span></a></td></tr>');
				update_rowcount($("#total_bts"),$(".btsdistance tbody tr"));
			}).fail(function(){
				alert('Tidak dapat menyimpan BTS, silakan menghubungi Developer');
			});
		}
	});

	$("#updatebtsdistance").click(function(){
		myid = $(this).attr('btsdistance_id');
		$('.inp_bts').makekeyvalparam();
		$.post(thisdomain+'survey_bts_distances/edit',JSON.parse('{"id":'+myid+','+$('.inp_bts').attr('keyval')+'}')).done(function(data){
			$(".btsrows.selected").find('.info').html('<a>'+$("#bts_id :selected").text()+'</a>');
			$(".btsrows.selected").find('.ilosnlos').html('<a>'+$("#losnlosselect :selected").text()+'</a>');
			$(".btsrows.selected").find('.idistance').html('<a>'+$("#bts_distance").val()+'</a>');
		}).fail(function(){
			alert("Tidak dapat mengupdate Jarak BTS, silakan menghubungi Developer");
		});
	});

}(jQuery));
