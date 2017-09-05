$(document).ready(function(){
	$('.dtpicker').datepicker({dateFormat:'dd/mm/yy'});
	$('#btnnextdata').click(function(){
		$.post(thisdomain+'suspects/drop_client_priority',{client_id:$('#client_id').val()}).fail(function(){
			alert('drop client  failed');
		}).done(function(){
			var c=1;
			$.each($("#sortable li"),function(){
			$.post(thisdomain+'suspects/save_client_priority',{client_id:$('#client_id').val(),name:$(this).text(),priority:c});
			c+=1;
		});

		});
	$('.ttgpadinet').makekeyvalparam();
	$.post(thisdomain+'suspects/update',JSON.parse('{"id":"'+$('#workplace').attr('myid')+'",'+$('.ttgpadinet').attr('keyval')+'}')).done(function(data){
			$('#dModal').modal().hideafter({
				timeout:2000,
				nexturl:thisdomain+'suspects'
			});
		}).fail(function(){
			alert('Tidak dapat menyimpan,silakan hubungi Developer');
		});
	});
	$('#sortable').sortable();
	$('#sortable').disableSelection();
});
