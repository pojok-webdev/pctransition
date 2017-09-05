$('.btn_addofficer').click(function(){
	console.log('add officer clicked');
	$('#dAddOfficer').modal();
});
$('.petugasTroubleshoot').click(function(){
	console.log('add officer clicked',$(this).attr('officer_name'));
	oName = $(this).attr('officer_name');
	src = $(this).find('.imageholder img').attr('src');
	$.ajax({
		url:thisdomain+'troubleshoot_officers/save',
		type:'post',
		data:{
			name:oName,
			troubleshoot_request_id:$('#troubleshoot_id').val()
		}
	}).done(function(res){
		console.log('success save officer',res);
		newRow = '<tr class="rImage" officer_id='+res+'><td class="image_path">';
		newRow+= '<a class="fancyboxx" rel="groupx">';
		newRow+= '<img src="'+src+'" class="img-polaroidx prevImage" onclick="viewImage_(this)" width=50 height=38 />';
		newRow+= '</a>';
		newRow+= '</td>';
		newRow+= '<td class="info image_name"><a>'+oName+'</a><span></span></td>';
		newRow+= '<td>';
		newRow+= '<a><span class="icon-remove removeofficer"></span></a>';
		newRow+= '</td>';
		newRow+= '</tr>';
		$('#tOfficer tbody').prepend(newRow);
		$('#total_officer').html($('#tOfficer').rowcount());
		$('#dAddOfficer').modal('hide');
	}).fail(function(err){
		console.log(err);
	});
});
$('#tOfficer').on('click','tbody .removeofficer',function(){
	tr=$(this).stairUp({level:3});
	troubleshootId=tr.attr('officer_id');
	$.ajax({
		url:thisdomain+'troubleshoot_officers/rmv',
		type:'post',
		data:{id:troubleshootId}
	}).done(function(res){
		console.log('success remove officer',res);
		tr.remove();
		$('#total_officer').html($('#tOfficer').rowcount());
	}).fail(function(err){
		console.log('error remove officer',err);
	});
});
