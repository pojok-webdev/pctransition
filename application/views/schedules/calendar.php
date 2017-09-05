<!DOCTYPE html>
<html lang="en">
	<?php echo $this->load->view("adm/head");?>
	<script src='<?php echo base_url()?>js/fullcalendars/moment.min.js'></script>

	<script src='<?php echo base_url()?>js/aquarius/common.js'></script>
	<body>
		<div class="header">
			<a class="logo" href="index.html"><img src="img/logo.png" alt="PadiNET App" title="PadiNET App"/></a>
			<ul class="header_menu">
				<li class="list_icon"><a href="#">&nbsp;</a></li>
			</ul>	
		</div>
		<?php $this->load->view('adm/menu');?>		
		<div class="content">
			<div class="breadLine">
			  <ul class="breadcrumb">
			      <li><a href="#">PadiApp</a> <span class="divider">></span></li>
			      <li><a href="#">Calendar</a> <span class="divider">></span></li>
			      <li class="active">Days</li>
			  </ul>
				<?php $this->load->view('adm/buttons');?>			
			</div>
			<div class="workplace">
			        <div class="breadLine">
				<div class="row-fluid">
					<div class="span12">
						<div class="head clearfix">
							<div class="isw-calendar"></div>
							<h1>Calendar</h1>
						</div>
						<div class="block-fluid">
							<div id="mycalendar" class="fcx"></div>
						</div>
					</div>
				</div>			
			</div>
		</div>   
		<script type="text/javascript">
		$(document).ready(function() {
			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();
			
			console.log("new date:"+new Date());
			console.log("new date="+new Date(y, m, 20));
			console.log("current date "+getCurrentDate());
			$.ajax({
				url:thisdomain+"schedules/getJson",
			}).done(function(data){
				$('#mycalendar').fullCalendar({
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
					allDay:false,
					eventLimit: true, // allow "more" link when too many events
					events:JSON.parse(data)
				});
			}).fail(function(){
				console.log("Cannot retrieve data");
			});
		});
		</script>
	</body>
</html>
