(function($){
	$('.client_label').html($('#tickettype').val());
		
		$('#client_id').populateCombo({
			keyvalpaired:true,
			url:thisdomain+'tickets/get_client_name/'+$('#tickettype').val()
		});

	$('.btnprint').click(function(){
		switch($('#reporttype').val()){
			case '1':
			$('#tickettype').show();
			window.location.href = thisdomain+'reports/ticketbyclient/'+$('#tickettype').val()+'/'+$('#client_id').val();
			break;
			case '2':
			$('#tickettype').show();
			window.location.href = thisdomain+'reports/tickets/'+$('#client_id').val();
			break;
			case '3':
			$('#tickettype').hide();
			window.location.href = thisdomain+'reports/surveybyclient/'+$('#client_id').val();
			break;
			case '4':
			$('#tickettype').hide();
			window.location.href = thisdomain+'reports/installbyclient/'+$('#client_id').val();
			break;
		}
	});

	$('#reporttype').change(function(){
		switch($(this).val()){
			case '1':
			$('.tickettype').show();
			break;
			case '2':
			$('.tickettype').show();
			break;
			case '3':
			$('.tickettype').hide();
			break;
			case '4':
			$('.tickettype').hide();
			break;
		}
	});
	
	$('#tickettype').change(function(){
		thisval = $(this).val();
		$('.client_label').html(thisval);
		$('#client_id').populateCombo({
			keyvalpaired:true,
			url:thisdomain+'tickets/get_client_name/'+thisval
		});
	});
}(jQuery));
