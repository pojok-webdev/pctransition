<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Dashboard DB Teknis</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo base_url();?>asset/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>asset/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>asset/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>asset/plugins/fullcalendar/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>asset/plugins/fullcalendar/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>asset/plugins/fullcalendar/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>asset/plugins/fullcalendar/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo base_url();?>asset/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?php echo base_url();?>asset/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->   
	<div class="header navbar navbar-inverse navbar-fixed-top">
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->   
	<div class="page-container row-fluid">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        
			<ul class="page-sidebar-menu">
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li>
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search">
						<div class="input-box">
							<a href="javascript:;" class="remove"></a>
							<input type="text" placeholder="Search..." />
							<input type="button" class="submit" value=" " />
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="start ">
					<a href="index.html">
					<i class="icon-home"></i> 
					<span class="title">Dashboard</span>
					</a>
				</li>
				<li >
					<a href="<?php echo base_url();?>index.php/adm/surveys">
					<i class="icon-home"></i> 
					<span class="title">Surveys</span>
					</a>
				</li>
				<li >
					<a href="<?php echo base_url();?>index.php/adm/installs">
					<i class="icon-home"></i> 
					<span class="title">Instalasi</span>
					</a>
				</li>
				<li >
					<a href="<?php echo base_url();?>index.php/adm/maintenances">
					<i class="icon-home"></i> 
					<span class="title">Maintenance</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>portlet Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							Calendar <small>calendar page</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.html">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="#">Pages</a>
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Calendar</a></li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="portlet box blue calendar">
						<div class="portlet-title">
							<div class="caption"><i class="icon-reorder"></i>Calendar</div>
						</div>
						<div class="portlet-body light-grey">
							<div class="row-fluid">
								<div class="span3 responsive" data-tablet="span12 fix-margin" data-desktop="span8">
									<!-- BEGIN DRAGGABLE EVENTS PORTLET-->    
									<h3 class="event-form-title">Draggable Events</h3>
									<div id="external-events">
										<form class="inline-form">
											<input type="text" value="" class="m-wrap span12" placeholder="Event Title..." id="event_title" /><br />
											<a href="javascript:;" id="event_add" class="btn green">Add Event</a>
										</form>
										<hr />
										<div id="event_box"></div>
										<label for="drop-remove">
										<input type="checkbox" id="drop-remove" />remove after drop                         
										</label>
										<hr class="visible-phone" />
									</div>
									<!-- END DRAGGABLE EVENTS PORTLET-->            
								</div>
								<div class="span9">
									<div id="calendar" class="has-toolbar"></div>
								</div>
							</div>
							<!-- END CALENDAR PORTLET-->
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER--> 
		</div>
		<!-- END PAGE -->    
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			2013 &copy; Metronic by keenthemes.
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="<?php echo base_url();?>asset/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>asset/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url();?>asset/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="<?php echo base_url();?>asset/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>asset/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="<?php echo base_url();?>asset/plugins/excanvas.min.js"></script>
	<script src="<?php echo base_url();?>asset/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="<?php echo base_url();?>asset/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>asset/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?php echo base_url();?>asset/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>asset/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo base_url();?>asset/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url();?>asset/plugins/fullcalendar/js/app.js"></script>
	<script src="<?php echo base_url();?>asset/plugins/fullcalendar/js/calendar.js"></script>    
	<script>
		jQuery(document).ready(function() {       
//alert(new Date());
		   // initiate layout and plugins
		   App.init();
		   Calendar.init();
		});
	</script>
	<!-- END PAGE LEVEL SCRIPTS -->
</body>
<!-- END BODY -->
</html>
