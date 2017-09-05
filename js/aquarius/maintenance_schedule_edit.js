changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}
$(document).ready(function(){
	$('#maintenance_add_save').click(function(){
		$(".inp_maintenance").makekeyvalparam();
		if($("#maintenance_date").val()==""){
			$(this).showModal({
				message:"Tanggal Maintenance harus diisi"
			});
		}else{
			$.post(thisdomain+'maintenances/update',JSON.parse('{'+$('.inp_maintenance').attr('keyval')+'}')/*{
				period_type:$('#periode_type').val(),
				client_site_id:$('#nameofmtype').val(),
				reminder:$('#reminder').val(),
				ispayable:$('#is_payable').val(),
				description:$('#description').val(),
				mdatetime:$('#mdatetime').getdate().addhour($('#mhour')).addminute($('#mminute')).attr('datetime'),
				maintenance_type:$('#maintenance_type').val(),
				nameofmtype:$('#nameofmtype').val(),
				id:$('#maintenance_id').val(),
			}*/).done(function(data){
				$(this).showModal({
					message:"Data sudah tersimpan"
				});
			}).fail(function(){
				alert('Tidak dapat menyimpan Penjadwalan Maintenance, silakan hubungi Developer');
			});
		}
	});
	$('#downtime_exist').change(function(){
		if($(this).find('option:selected').val()=='0'){
			$('#downtimedetil').hide();
		}
		if($(this).find('option:selected').val()=='1'){
			$('#downtimedetil').show();
		}
	});
	$("#maintenance_type").change(function(){
		$("#nameofmtype").populate({
			thisval:$(this).val(),
			keyvalpaired:true
		});
	});
	$("#nameofmtype").populate({
		thisval:$('#maintenance_type').val(),
		keyvalpaired:true
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
