(function($){
	function savesite(install_request_id){
		$.ajax({
			url:thisdomain+'install_sites/save',
			data:JSON.parse('{"install_request_id":"'+install_request_id+'",'+$('.installsite').attr('keyval')+'}'),
			type:'post',
			async:false
		}).done(function(){
			var createuser = $('#createuser').val(), 
			clientname = $('#client_name').val(),
			url = thisdomain+'install_requests/install_edit/'+install_request_id;
			//callback(createuser,clientname,url);
		}).fail(function(){
			alert('Tidak dapat menyimpan site instalasi, silakan hubungi Developer');
		});			
	}
	checkTrial = function(){
		switch($('#withtrial').val()){
			case '0':
			$('#dtrialrange').hide();
			break;
			case '1':
			$('#dtrialrange').show();
			break;
			default:
			$('#dtrialrange').hide();
			break;
		}		
	}
	checkTrial();
	$('#withtrial').change(function(){
		console.log('WITH TRIA VALUE',$(this).val());
		checkTrial();
	});
	$('#preview_save').click(function(){
		$('.installrequest').makekeyvalparam();
		$('.installsite').makekeyvalparam();
		console.log('KEYVAL OF INSTALL REQUEST',$('.installrequest').attr('keyval'));
		if($('#withtrial').val()!=='2'){
			if($(this).checkEmpty({className:"emptycheck"})){
				$.ajax({
					url:thisdomain+'install_requests/save',
					data:JSON.parse('{"withtrial":"'+$('#withtrial').val()+'","trialdistance":'+$('#trialrange').val()+','+$('.installrequest').attr('keyval')+'}'),
					type:'post',
					async:false
				}).done(function(install_request_id){
					savesite(install_request_id);
					console.log('install_requests save did');
					var createuser = $('#createuser').val(), 
					clientname = $('#client_name').val(),
					url = thisdomain+'install_requests/install_edit/'+install_request_id;
						$('#preview_save').attr('disabled','disabled');
						window.location.href = thisdomain+'install_requests/index/all';
				}).fail(function(){
					alert('Tidak dapat menyimpan site requests, silakan hubungi Developer');
				});
			}else{
				alert("Pastikan semua Field Terisi");
			}
		}else{
			alert('Konfirmasi Trial Harus terisi');
		}
	});
	$('.myeditor').cleditor({width:'300',height:'160px',controls:"bold italic underline | color highlight removeformat | bullets numbering"});
}(jQuery))
