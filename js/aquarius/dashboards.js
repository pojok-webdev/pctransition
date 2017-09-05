
(function($){
	$('#agenda').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		events: "http://localhost/db_teknis/index.php/adm/d_calendar",
		dayClick:function(date,jsEvent,view){
			//alert(date.getDate());
		}
	});
	
	$('#btnaddsurvey').click(function(){
		window.location.href = thisdomain+'surveys/add';
	});
	
	document.oncontextmenu = function(){return false;};
	
	$('.fc-widget-content').mousedown(function(e){
		//alert($(this).val());
		if(e.button==2){
			//alert($(this).val());
		}
	});
	
	$('.fc-widget-content').dblclick(function(){
		$('#myModalLabel').text('Menu '+$(this).text() + ' ' + getHumanMonth());
		$('#dModal').modal();
	});
}(jQuery));

function getArrayMonth(){
	var date = $("#agenda").fullCalendar('getDate');
	return date.getMonth();
}

function getHumanMonth(){
	return getArrayMonth()+1;
}

