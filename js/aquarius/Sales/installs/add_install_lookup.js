//$(document).ready(function(){
	console.log("add install lookup.js");
	$('#tInstall').dataTable();
	$('#tInstall').on("click","tbody tr .doinstall",function(){
		mysurveyid = $(this).attr('survey_id');
		console.log(mysurveyid);
/*		$.ajax({
			url:thisdomain+'add_install_lookup/copy_survey_install',
			data:{survey_id:mysurveyid},
			type:'POST',
			async: false
		}).done(function(data){
			window.location.href=thisdomain+'install_requests/edit/'+data;
		}).fail(function(){
			alert('Tidak dapat menyalin data ke Instalasi, silakan hubungi Developer');
		});	*/
		window.location.href = thisdomain+'install_requests/preview/'+mysurveyid;
	});
//});
