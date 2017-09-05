$(document).ready(function(){
	$('#permintaanmaintenance').click(function(){
		window.location.href = thisdomain+'maintenances/maintenance_add';
	});
	oTable = $("#tMaintenance").dataTable({"aLengthMenu":[5,10],"iDisplayLength":5});
	$(".tohuman").sql2idformat();
	$('#createschedule').click(function(){
		window.location.href = thisdomain+'maintenances/schedule_add';
	});
	$("#tMaintenance").on("click","tbody tr td .btnAssign",function(){
		window.location.href = thisdomain+'maintenance_requests/assign/'+$(this).stairUp({level:4}).attr("myid");
	});
	$("#tMaintenance").on("click","tbody tr td .btnReport",function(){
		window.location.href = thisdomain+'maintenance_requests/report/'+$(this).stairUp({level:4}).attr("myid");
	});
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
