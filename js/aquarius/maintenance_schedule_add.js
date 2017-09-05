changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}
$(document).ready(function(){
	$('#maintenance_add_save').click(function(){
		$('.inp_maintenance').makekeyvalparam();
		if($("#mdatetime").val()==""){
			$(this).showModal({
				message:'Tanggal Survey Harus diisi',
				element:'dModal',
			});
		}else{
			$.post(thisdomain+'maintenances/save',JSON.parse('{'+$('.inp_maintenance').attr('keyval')+'}')).done(function(data){
				$(this).showModal({
					message:'Penjadwalan Maintenance telah berhasil disimpan',
					element:'dModal',
				});
			}).fail(function(){
				alert('Tidak dapat menyimpan Penjadwalan Maintenance, silakan hubungi Developer');
			});
		}
	});
	$("#maintenance_type").change(function(){
		thisval = $(this).val();
		$("#nameofmtype").populate({
			thisval:$(this).val(),
			keyvalpaired:true
		});
		if(thisval=='pelanggan'){
			$("#client_site_id").addClass('inp_maintenance');
			$(".client_site_id").show();
			$("#client_site_id").populateCombo({
				url:thisdomain+'client_sites/populatebyclient/'+$("#nameofmtype").val(),
				keyvalpaired:true,
			});
		}else{
			$("#client_site_id").removeClass('inp_maintenance');
			$(".client_site_id").hide();
		}
	});
	$("#nameofmtype").populate({
		thisval:$('#maintenance_type').val(),
		keyvalpaired:true
	});
	if($("#maintenance_type").val()=='pelanggan'){
		$("#client_site_id").addClass('inp_maintenance');
		$(".client_site_id").show();
		$("#client_site_id").populateCombo({
			url:thisdomain+'client_sites/populatebyclient/'+$("#nameofmtype").val(),
			keyvalpaired:true,
		});
	}else{
		$("#client_site_id").removeClass('inp_maintenance');
		$(".client_site_id").hide();
	}
	$("#nameofmtype").change(function(){
		thisid = $(this).val();
		$("#client_site_id").populateCombo({
			url:thisdomain+'client_sites/populatebyclient/'+thisid,
			keyvalpaired:true,
		});
	});
});
$.fn.populate = function(options){
	settings = $.extend({
		keyvalpaired:false,
		url:'',
		selected:'',
		thisval:''
	},options);
	$(this).html("");
	opt = '';
	thiselement = $(this);
	switch(settings.thisval){
		case 'backbone':
			$.ajax({
				url:thisdomain+"backbones/get",
				async:false,
				dataType:'json'
			}).done(function(data){
				$.each(data,function(x,y){
					if(settings.keyvalpaired==true){
						opt+='<option value="'+x+'">'+y+'</option>';
					}else{
						opt+='<option value="'+y+'">'+y+'</option>';
					}
				});
				$(opt).appendTo(thiselement);
			});
		break;
		case 'pelanggan':
			$.ajax({
				url:thisdomain+"clients/get_combo_data_address",
				async:false,
				dataType:'json'
			}).done(function(data){
				$.each(data,function(x,y){
					if(settings.keyvalpaired==true){
						opt+='<option value="'+x+'">'+y+'</option>';
					}else{
						opt+='<option value="'+y+'">'+y+'</option>';
					}
				});
				$(opt).appendTo(thiselement);
			});
		break;
		case 'datacenter':
			$.ajax({
				url:thisdomain+"datacenters/get",
				async:false,
				dataType:'json'
			}).done(function(data){
				$.each(data,function(x,y){
					if(settings.keyvalpaired==true){
						opt+='<option value="'+x+'">'+y+'</option>';
					}else{
						opt+='<option value="'+y+'">'+y+'</option>';
					}
				});
				$(opt).appendTo(thiselement);
			});
		break;
		case 'bts':
			$.ajax({
				url:thisdomain+"btses/get",
				async:false,
				dataType:'json'
			}).done(function(data){
				$.each(data,function(x,y){
					if(settings.keyvalpaired==true){
						opt+='<option value="'+x+'">'+y+'</option>';
					}else{
						opt+='<option value="'+y+'">'+y+'</option>';
					}
				});
				$(opt).appendTo(thiselement);
			});
		break;
	}
	return thiselement;
}
