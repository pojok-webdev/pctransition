<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='<?php echo base_url()?>css/fullcalendars/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo base_url()?>css/fullcalendars/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='<?php echo base_url()?>js/fullcalendars/moment.min.js'></script>
<script src='<?php echo base_url()?>js/fullcalendars/jquery.min.js'></script>
<script src='<?php echo base_url()?>js/fullcalendars/fullcalendar.min.js'></script>

<script>

	$(document).ready(function() {
	
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '2015-02-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: {
				//url: 'php/get-events.php',
				url:'https://teknis/schedules/getJson',
				error: function() {
					$('#script-warning').show();
				}
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			}
		});
		
	});

</script>
<style>

	body {
		margin: 0;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#script-warning {
		display: none;
		background: #eee;
		border-bottom: 1px solid #ddd;
		padding: 0 10px;
		line-height: 40px;
		text-align: center;
		font-weight: bold;
		font-size: 12px;
		color: red;
	}

	#loading {
		display: none;
		position: absolute;
		top: 10px;
		right: 10px;
	}

	#calendar {
		max-width: 900px;
		margin: 40px auto;
		padding: 0 10px;
	}

</style>
</head>
<body>

	<div id='script-warning'>
		<code>php/get-events.php</code> must be running.
	</div>

	<div id='loading'>loading...</div>

	<div id='calendar'></div>

</body>
</html>
