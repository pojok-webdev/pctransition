<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link rel='stylesheet' href='<?php echo base_url()?>css/fullcalendars/themes/sunny/jquery-ui.min.css' />
<link href='<?php echo base_url()?>css/fullcalendars/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo base_url()?>css/fullcalendars/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='<?php echo base_url()?>js/fullcalendars/moment.min.js'></script>
<script src='<?php echo base_url()?>js/fullcalendars/jquery.min.js'></script>
<script src='<?php echo base_url()?>js/fullcalendars/fullcalendar.min.js'></script>
<script src='<?php echo base_url()?>js/aquarius/links.js'></script>
<script src='<?php echo base_url()?>js/aquarius/common.js'></script>
<script>
	$(document).ready(function() {
		console.log("current date "+getCurrentDate());
		console.log("new dateo	"+new Date(y, m, 20));
		$.ajax({
			url:thisdomain+"schedules/getJson",
		}).done(function(data){
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,basicWeek,agendaDay'
				},
				theme:true,
				defaultDate: getCurrentDate(),//'2015-04-04',
				//defaultDate: '2015-04-04',
				defaultView:'agendaDay',
				editable: true,
				eventLimit: true, // allow "more" link when too many events
				events:JSON.parse(data)
			});
		}).fail(function(){
			console.log("Cannot retrieve data");
		});
	});
</script>
<style>
	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}
	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}
</style>
</head>
<body>
	<div id='calendar'></div>
</body>
</html>
