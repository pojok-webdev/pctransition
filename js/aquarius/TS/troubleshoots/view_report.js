/*
 * WRITTEN BY PUJI W PRAYITNO
 * 072015
 * emailto: puji@padi.net.id
 * */
updateStatus = (status,solvedschedule) => {
	$('.inp_troubleshoot').makekeyvalparam();	
	$.ajax({
		url:thisdomain+'troubleshoots/update',
		data:JSON.parse('{"id":"'+$('#troubleshoot_id').val()+'","status":"'+status+'","activities":"'+$('#activities').val()+'","solvedschedule":"'+solvedschedule+'",'+$('.inp_troubleshoot').attr('keyval')+'}'),
		type:'post'
	}).done(function(data){
		console.log('Update Troubleshoot berhasil');
	}).fail(function(){
		console.log('Tidak dapat meng-update Troubleshoot');
	});	
}
$('#btn_progress').click(function(){
	updateStatus('0','0000-00-00 00:00:00');
}); 
$('#btn_monitoring').click(function(){
	updateStatus('2',getdate('sql',7));
});
$.ajax({
	url:thisdomain+'troubleshoots/getdata/'+$('#troubleshoot_id').val(),
	type:'get',
	dataType:'json'
}).done(function(data){
	$('#activities').val(data.activities).blur();
	date1 = sqldateparts(data.request_date1);
	date2 = sqldateparts(data.request_date2);
	$('#request_date1').html(date1.day+'/'+date1.month+'/'+date1.year);
	$('#request_date2').html(date2.day+'/'+date2.month+'/'+date2.year);
	$('#hour1').html(date1.hour);
	$('#hour2').html(date2.hour);
	$('#minute1').html(date1.minute);
	$('#minute2').html(date2.minute);
}).fail(function(){
	console.log('Tidak dapat retrieve data Troubleshoot');
});
