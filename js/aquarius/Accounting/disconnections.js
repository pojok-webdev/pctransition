
(function($){
	oTable = $('#tClient').dataTable();
	var dt;
	$('.btneditdisconnection').click(function(){
		id = $(this).parent().parent().parent().parent().attr('myid');
		window.location.href = thisdomain+'disconnections/edit/'+id;
	});
	$('#reactivation').click(function(){
		var dropdown = $(this).parent();
		dropdown.hide();
		dt='Reaktifasi';
		oTable.fnDraw();
	});
	$('#isolir').click(function(){
		var dropdown = $(this).parent();
		dropdown.hide();
		dt='Isolir';
		oTable.fnDraw();
	});
	$('#temporer').click(function(){
		var dropdown = $(this).parent();
		dropdown.hide();
		dt='Temporer';
		oTable.fnDraw();
	});
	$('#permanent').click(function(){
		var dropdown = $(this).parent();
		dropdown.hide();
		dt='Permanen';
		oTable.fnDraw();
	});
	$('#all').click(function(){
		var dropdown = $(this).parent();
		dropdown.hide();
		dt='Semua';
		oTable.fnDraw();
	});

	$.fn.dataTableExt.afnFiltering.push(function(oSettings, aData, iDataIndex){
		if(aData[1]==dt){
			return true;
		}
		if(dt=='Semua'){
			return true;
		}
		return false;
	});

	
}(jQuery));
