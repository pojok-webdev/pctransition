<html>
	<head>
		<link href="<?php echo base_url()?>css/aquarius/stylesheets.css" rel="stylesheet" type="text/css" />
		<link rel='stylesheet' href='<?php echo base_url()?>css/fullcalendars/fullcalendar.css' />
		<script src='<?php echo base_url()?>css/fullcalendars/lib/jquery.min.js'></script>
		<script src='<?php echo base_url()?>css/fullcalendars/lib/moment.min.js'></script>
		<script src='<?php echo base_url()?>css/fullcalendars/fullcalendar.js'></script>
		<script src='<?php echo base_url()?>js/aquarius/common.js'></script>
		<script src='<?php echo base_url()?>js/aquarius/links.js'></script>
	</head>
	<body>
		<div class="header">
			<a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="Padinet" title="Padinet"/></a>
			<ul class="header_menu">
				<li class="list_icon"><a href="#">&nbsp;</a></li>
			</ul>
		</div>
		<?php $this->load->view('adm/menu');?>
		<div class="content">
			<div class="breadLine">
				<ul class="breadcrumb">
					<li><a href="#">App</a> <span class="divider">></span></li>                
					<li><a href="#">Agenda</a> <span class="divider">></span></li>                
					<li class="active">Kalendar</li>
				</ul>
			</div>
			<div>
				<span style="background:yellow;padding:10px;margin:10px;">Survey</span>
				<span style="background:green;padding:10px;margin:10px;">Instalasi</span>
				<span style="background:red;padding:10px;margin:10px;">Troubleshoots</span>
				<span style="background:blue;padding:10px;margin:10px;">Maintenance</span>
			</div>
			<div class="workplace">
				<div id="calendar"></div>
			</div>
		</div>
		<script>
		$(document).ready(function() {
			/*
		    $('#calendar').fullCalendar({
			header:{
				left: 'prev,next',
				center: 'title',
				//right: ''
				right: 'month,agendaWeek,agendaDay'
			},
			defaultView:'agendaDay',
			events:[{
				title:"meeting",
				start:"2015-04-28T08:00:00.000Z",
				end:"2015-04-28T09:00:00.000Z"
				},{
				title:"makan siang",
				start:"2015-04-28T12:00:00.000Z",
				end:"2015-04-28T14:00:00.000Z"
				},{
				title:"kunjungan ke lapas",
				start:"2015-04-28T11:00:00.000Z",
				end:"2015-04-28T15:00:00.000Z"
				}
			]
		    })*/



			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();
			
			console.log("new date:"+new Date());
			console.log("new date="+new Date(y, m, 20));
			//console.log("current date "+getCurrentDate());
			$.ajax({
				url:thisdomain+"schedules/getJson",
			}).done(function(data){
				console.log(data);
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,basicWeek,agendaDay'
					},
					theme:true,
					defaultDate: getCurrentDate(),//'2015-04-04',
					//defaultDate: '2015-04-04',
					//defaultView:'agendaDay',
					defaultView:'month',
					editable: true,
					allDay:false,
					disableDragging:true,
					editable:false,
					eventLimit: true, // allow "more" link when too many events
					events:JSON.parse(data),
					   monthNames: ["Januari","Februari","Maret","April","Mei","Juni","Juli", "Agustus", "September", "Oktober", "Nopember", "Desember" ], 
					monthNamesShort: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nop','Des'],
					dayNames: [ 'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
					dayNamesShort: ['Min','Sen','Sel','Rab','Kam','Jum','Sab'],
					buttonText: {
						today: 'Sekarang',
						month: 'Bulan',
						week: 'Minggu',
						day: 'Hari'
					}
				});
			}).fail(function(){
				console.log("Cannot retrieve data");
			});

		});
		</script>
	</body>
</html>
