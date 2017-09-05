$(document).ready(function(){
	oTable = $('#tAltergrades').dataTable({
		iDisplayLength: 5,
		aLengthMenu: [[5, 10, -1], [5, 10, "Semua"]],
                                          "aaSorting":[[0,"asc"]],
		pagingType:"full_numbers"
	});
	$("#addaltergrade").click(function(){
		//$('#dAddAltergrade').modal();
		console.log("~~~~");
		$('#dAddUpgrade').modal();
	});
	$('#btnsave').click(function(){
		$('.inp_request').makekeyvalparam();
		$.post(thisdomain+'altergrades/save',JSON.parse('{'+$('.inp_request').attr('keyval')+'}')).done(function(){
			$('#dAddAltergrade').modal('hide');
		}).fail(function(){
			alert('Tidak dapat menyimpan, silakan hubungi Developer');
		});
	});
	$('.btn_edit').click(function(){
		window.location.href=thisdomain+'altergrades/edit/'+$(this).stairUp({level:4}).attr('myid');
	});
	$('.btn_remove').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		$('#btn_remove').attr('myid',myid);
		$('#dConfirmation').modal();
	});
	$('#btn_remove').click(function(){
		$.post(thisdomain+'altergrades/remove',{id:$(this).attr('myid')}).done(function(data){
			$('#tAltergrades').find('tr.row_selected').remove();
			$('#dConfirmation').modal('hide');
		}).fail(function(){
			alert('Tidak dapat menghapus, silakan hubungi Developer');
		});
	});
	$('#service').populateservice();
	$.getJSON(thisdomain+'altergrades/getclient',function(data){
			$('.typeahead').typeahead({
				hint: true,
				highlight: true,
				minLength: 1
			},
			{
				name: 'states',
				displayKey: 'value',
				source: substringMatcher(data)
			}
		);
	}).fail(function(){
		alert('Tidak dapat mengakses data Klien, silakan hubungi Developer');
	});
	$('#tAltergrades').tableRowSelect();
	$('.typeahead').click(function(){

	});

	$('#tAltergrades').find('tr').each(function(){
		switch($(this).attr('status')){
			case '0':
			$(this).find('td').css('background-color','azure');
			break;
			case '1':
			$(this).find('td').css('background-color','cornsilk');
			break;
		}
	});
});

$.fn.populateservice = function(){
	opt = '';
	$.getJSON(thisdomain+'services/getJSON/',function(data){
		$.each(data,function(x,y){
			opt+='<option value="'+x+'">'+y+'</option>';
		});
		$(opt).appendTo('#service');
	}).fail(function(){
		alert('Tidak dapat menampilkan layanan, silakan hubungi Developer');
	}).done(function(){
		//alert(thisdomain);
	});
};

$.fn.colorizeTable = function(row){
	$(this).find('tbody>tr:nth-child('+row+') td').css('background-color','red');
};
