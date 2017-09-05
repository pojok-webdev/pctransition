/*
 * WRITTEN BY PUJI W PRAYITNO
 * 072015
 * emailto: puji@padi.net.id
 * */
updateStatus = function(status,solvedschedule){
	$('.inp_troubleshoot').makekeyvalparam();	
	$.ajax({
		url:thisdomain+'troubleshoots/update',
		data:JSON.parse('{"id":"'+$('#troubleshoot_id').val()+'","status":"'+status+'","solvedschedule":"'+solvedschedule+'",'+$('.inp_troubleshoot').attr('keyval')+'}'),
		type:'post'
	}).done(function(data){
		$.ajax({
			url:thisdomain+'troubleshoots/update',
			data:{
				id:$('#troubleshoot_id').val(),
				activities:$('#activities').val(),
				resume:$("#resume").val()
				},
			type:'post'
		}).done(function(data){
			console.log("Data activities",data);
		}).fail(function(err){
			console.log('Error activities',err);
		});
		console.log('Update Troubleshoot berhasil',data);
		window.location = thisdomain+'troubleshoots';
	}).fail(function(){
		console.log('Tidak dapat meng-update Troubleshoot');
	});	
}
$('#btn_progress').click(function(){
	//updateStatus('0',NULL);
	updateStatus('0','0000-00-00 00:00:00');
}); 
$('#btn_monitoring').click(function(){
	var dtp = $('#troubleshoot_date').datepicker('getDate');
	console.log('DATEPICKER',dtp);
	console.log('dt',dtp.getDate());
	console.log('mn',dtp.getMonth());
	console.log('yr',dtp.getFullYear());
	//updateStatus('2',getdate('sql',7));
	updateStatus('2',getcustomdate(dtp,'sql',7));
});
$.ajax({
	url:thisdomain+'troubleshoots/getdata/'+$('#troubleshoot_id').val(),
	type:'get',
	dataType:'json'
}).done(function(data){
	//$('#activities').val(data.activities).blur();
	date1 = sqldateparts(data.troubleshoot_date);
	date2 = sqldateparts(data.troubleshoot_date2);
	$('#troubleshoot_date').val(date1.day+'/'+date1.month+'/'+date1.year);
	$('#troubleshoot_date2').val(date2.day+'/'+date2.month+'/'+date2.year);
	$('#hour1').selectopt(date1.hour);
	$('#hour2').selectopt(date2.hour);
	$('#minute1').selectopt(date1.minute);
	$('#minute2').selectopt(date2.minute);
}).fail(function(){
	console.log('Tidak dapat retrieve data Troubleshoot');
});
