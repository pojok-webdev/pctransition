$(document).ready(function(){
	$('#survey_date_save').click(function(){
		$.post(thisdomain+'adm/addsurveydate',{survey_request_id:$(this).attr('survey_request_id'),schedule_date:changeformat($('#schedule_date').val()),reason:$('#reason').val(),username:$(this).attr('username')}).done(function(data){});
		$.post(thisdomain+'adm/addmessage',{group:'sales',sender:$('#workplace').attr('username'),description:'koreksi tanggal survey <a href="http://db_teknis/adm/surveys">Lihat Link</a>'}).done(function(data){}).fail(function(){alert('alert gagal');});
		$.post(thisdomain+'adm/addalert',{group:'sales',sender:$('#workplace').attr('username'),description:'koreksi tanggal survey <a href="http://db_teknis/adm/surveys">Lihat Link</a>'}).done(function(data){}).fail(function(){alert('alert gagal');});
	});
});


changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}
