$(document).ready(function(){
	$('#agenda').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		events: "http://db_teknis/index.php/adm/d_calendar",
		dayClick:function(date,jsEvent,view){
			alert('a day');
		}
	});
	
	document.oncontextmenu = function(){return false;};
	
	$('.fc-widget-content').mousedown(function(e){
		if(e.button==2){
			alert('klik kanan');
		}
	});
	
	$('.fc-widget-content').dblclick(function(){
		$('<div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="myModalLabel">Menu</h3></div><div class="modal-body"><p><button id="btnaddsurvey">Penambahan Survey</button><button>Penambahan Instalasi</button><button>Perubahan Layanan</button><button>Penambahan Troubleshoot</button></p></div></div>').modal();
		$('#btnaddsurvey').bind('click',function(){
			alert('add survey');
			//window.location.href = thisdomain+'preclients/lookup';
			});
	});
});
