$(document).ready(function(){
	var pelangganopt = "";
	var btsopt = "";
	var backboneopt = "";
	var datacenteropt = "";
	$(".datetimepicker").datetimepicker({
		step:1,
		onChangeDateTime: function(a,b){
			//alert(b.val());
			start = $('#required_time1x').val();
			end   = $('#required_time2x').val();
			result = start - end;
			//alert(result);
			$.post(thisdomain+'adm/differenceintimes',{starttime:start,endtime:end}).done(function(data){
				$("#timetotal").html(data);
			}).fail(function(){
				alert("tidak bisa mencetak hasil "+thisdomain);
			});
			//alert($('#troubleshoot_date2').val()-$('#troubleshoot_date').val());
			}
	});

	fillbackboneopt = function(x,y){
		backboneopt+="<option value="+x+">"+y+"</option>";
	}

	fillpelangganopt = function(x,y){
		pelangganopt+="<option value="+x+">"+y+"</option>";
	}

	filldatacenteropt = function(x,y){
		datacenteropt+="<option value="+x+">"+y+"</option>";
	}

	fillbtsopt = function(x,y){
		btsopt+="<option value="+x+">"+y+"</option>";
	}

	fillbackbone = function(){
		$.getJSON(thisdomain+'backbones/get',function(data){
			$.each(data,function(x,y){
				fillbackboneopt(x,y);
			});
			$(backboneopt).appendTo("#nameofmtype");
		});
	}

	fillpelanggan = function(){
		$.getJSON(thisdomain+'clients/get',function(data){
			$.each(data,function(x,y){
				fillpelangganopt(x,y);
			});
			$(pelangganopt).appendTo("#nameofmtype");
		});
	}

	filldatacenter = function(){
		$.getJSON(thisdomain+'datacenters/get',function(data){
			$.each(data,function(x,y){
				filldatacenteropt(x,y);
			});
			$(datacenteropt).appendTo("#nameofmtype");
		});
	}

	fillbts = function(){
		$.getJSON(thisdomain+'btses/get',function(data){
			$.each(data,function(x,y){
				fillbtsopt(x,y);
			});
			$(btsopt).appendTo("#nameofmtype");
		});
	}

	switch($('#maintenance_type').val()){
		case 'pelanggan':
			fillpelanggan();
		break;
		case 'datacenter':
			filldatacenter();
		break;
		case 'backbone':
			fillbackbone();
		break;
		case 'bts':
			fillbts();
		break;
	}


	$('#maintenance_act_save').click(function(){
		if($('#reschedule').length>0){
			rschedule = $('#reschedule').val();
		}else{
			rschedule = '0000-00-00';
		}
		$.post(thisdomain+'adm/maintenanceupdate',{id:$(this).val(),maintenance_type:$('#maintenance_type').val(),nameofmtype:$('#nameofmtype').val(),location:$('#location').val(),pic_name:$('#pic_name').val(),pic_position:$('#pic_position').val(),pic_phone_area:$('#pic_phone_area').val(),pic_phone:$('#pic_phone').val(),pic_email:$('#pic_email').val(),period:$('#period').val(),downtime_exist:$('#downtime_exist').val(),downtime_duration_hour:$('#downtime_duration_hour').val(),downtime_duration_minute:$('#downtime_duration_minute').val(),notes:$('#notes').val(),is_payable:$('#payable').val(),follow_up:$('.follow_up:checked').val(),rescheduledate:rschedule}).done(function(data){}).fail(function(){alert('failed');});
	});

	$('#btn_save').click(function(){
		if($('#reschedule').length>0){
			rschedule = $('#reschedule').val();
		}else{
			rschedule = '0000-00-00';
		}
		$('.inp_maintenance').makekeyvalparam();
		$.post(thisdomain+'maintenance_requests/update',JSON.parse('{'+$('.inp_maintenance').attr('keyval')+'}')).done(function(data){
			$(this).showModal({
				message:'Berhasil menyimpan ',
			});
		}).fail(function(){
			$(this).showModal({
				message:'Tidak Berhasil menyimpan',
			});			
		});
	});

	$('#required_time1').appendDtpicker({inline:"true"});

	$('*[name=required_time2]').appendDtpicker({inline:"true"});

	$('.follow_up').click(function(){
		if($(this).val() == 1){
			$('#jadwal_ulang').html('<input type="textbox" class="datepicker" id="reschedule" />');
			$('#reschedule').datepicker({dateFormat:'yy-m-d'});
		}else{
			$('#jadwal_ulang').html('');
			$('#reschedule').val('0000-00-00');
		}
	});

	$('#maintenance_type').change(function(){
		$('#nameofmtype').html("");
		switch($(this).val()){
			case 'pelanggan':
				fillpelanggan();
			break;
			case 'datacenter':
			filldatacenter();
			break;
			case 'backbone':
				fillbackbone();
			break;
			case 'bts':
				fillbts();
			break;
		}
	});

    $('.link_navPopMaintenanceOperator').click(function(){
		addmaintenanceoperator();
	});

	$('.operator_remove').click(function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(thisdomain+"adm/maintenance_removeofficer",{id:$(this).attr('id')}).done(function(data){
			}).fail(function(){
				alert('Tidak dapat menghapus operator maintenance, hubungi Developer');
			});
	});


    $('.petugasMaintenance').click(function(){
		opname = $(this).parent().attr('username');
		$.post(thisdomain+"adm/addmaintenanceofficer",{maintenance_request_id:$('#workplace').attr('maintenance_id'),name:$(this).parent().attr('username')}).done(function(data){
				addoperator(data,opname);
			}).fail(function(){

			});

		$("#dModalOperator").modal("hide");

	}
	);

    $('#setbelumselesai').click(function(){
		$.post(thisdomain+"adm/updatemaintenancestatus",{id:$('#workplace').attr('maintenance_id'),status:$(this).attr('status')}).done(function(data){}).fail(function(){alert('mengupdate status maintenance gagal, hubungi Developer');});
	});

    $('#setdalamprogress').click(function(){
		$.post(thisdomain+"adm/updatemaintenancestatus",{id:$('#workplace').attr('maintenance_id'),status:$(this).attr('status')}).done(function(data){}).fail(function(){alert('mengupdate status maintenance gagal, hubungi Developer');});
	});

    $('#setselesai').click(function(){
		$.post(thisdomain+"adm/updatemaintenancestatus",{id:$('#workplace').attr('maintenance_id'),status:$(this).attr('status')}).done(function(data){}).fail(function(){alert('mengupdate status maintenance gagal, hubungi Developer');});
	});
});

addoperator = function(data,opname){
		$('.operator').append('<tr><td><a class="fancybox" rel="group" href="'+baseurl+'media/users/'+opname+'.jpg"><img src="'+baseurl+'media/users/'+opname+'.jpg" class="img-polaroid"  width=32 height=32 /></a></td><td class="info"><a class="fancybox" rel="group" href="'+baseurl+'media/users/'+opname+'.jpg">'+opname+'</a></td><td></td><td><a><span onClick="removepetugassurvey()" class="icon-trash pointer operator_remove"  id='+data+' user_id='+$(this).attr('id')+'></span></a></td></tr>');
		$('#'+data).bind('click',function(){
            $(this).parent().parent().parent().fadeOut(200);
            $.post(thisdomain+"adm/maintenance_removeofficer",{id:data}).done(function(data){}).fail(function(){});
		});

}


addmaintenanceoperator = function(){
	if($("#navMaintenanceOperator").is(":visible")){
		$("#navMaintenanceOperator").fadeOut(200);
	}else{
		$("#navMaintenanceOperator").fadeIn(300);
	}
	$("#dModalOperator").modal();
	return false;
}
