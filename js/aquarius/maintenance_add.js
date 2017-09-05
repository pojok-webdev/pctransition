changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}
$(document).ready(function(){
	$('#maintenance_add_save').click(function(){
		if($("#maintenance_date").val()==""){
			$("#dWarning").modal("show");
			setTimeout(function(){
				$("#dWarning").modal("hide");
				},1000);
		}else{
			$.post(thisdomain+'maintenances/addmaintenance',{client_id:$('#nameofmtype').val(),maintenance_type:$('#maintenance_type').val(),maintenance_date:changeformat($('#maintenance_date').val()),description:$('#description').val(),nameofmtype:$('#nameofmtype').val()}).done(function(data){
			}).fail(function(){
				alert('fail');
			});
			$.post(thisdomain+'adm/addalert',{group:'TS',sender:$('.workplace').attr('username'),description:'request maintenance baru',url:'adm/maintenances'}).done(function(data){}).fail(function(){alert('alert gagal');});
			$.post(thisdomain+'adm/addmessage',{group:'TS',sender:$('.workplace').attr('username'),description:'request maintenance baru'}).done(function(data){}).fail(function(){alert('alert gagal');});
			$("#dModal").modal("show");
			setTimeout(function(){
				$("#dModal").modal("hide");
				},1000);
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
		$("#nameofmtype").populate($(this).val());
	});
	$("#nameofmtype").populate($('#maintenance_type').val());
});
$.fn.populate = function(thisval){
	$(this).html("");
	opt = '';
	thiselement = $(this);
	switch(thisval){
		case 'backbone':
			$.ajax({
				url:thisdomain+"backbones/get",
				async:false,
				dataType:'json'
			}).done(function(data){
				$.each(data,function(x,y){
					opt+='<option value="'+y+'">'+y+'</option>';
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
					opt+='<option value="'+y+'">'+y+'</option>';
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
					opt+='<option value="'+y+'">'+y+'</option>';
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
					opt+='<option value="'+y+'">'+y+'</option>';
				});
				$(opt).appendTo(thiselement);
			});
		break;
	}
	return thiselement;
}
