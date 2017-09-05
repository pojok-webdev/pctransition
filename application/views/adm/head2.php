<?php
$csspath = base_url() . 'css/aquarius/';
$jspath = base_url() . 'js/aquarius/';
$imagepath = base_url() . 'img/aquarius/';
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    <title><?php echo humanize($this->uri->segment(2));?> - PadiApp</title>
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    <link media="screen" href="<?php echo base_url();?>css/msg/jquery.msg.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $csspath;?>stylesheets.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 8]>
        <link href="<?php echo $csspath;?>ie7.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <link rel='stylesheet' type='text/css' href='<?php echo $csspath;?>fullcalendar.print.css' media='print' />
    <link rel='stylesheet' type='text/css' href='/css/ajaxupload/styles.css' media='print' />
    <link rel="stylesheet" type="text/css" href="/css/jquery.simple-dtpicker.css" />
    <link rel="stylesheet" type="text/css" href="/css/jquery.datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="/css/teknis.css" />
    <link rel="stylesheet" type="text/css" href="/css/aquarius/cleditor.css" />
    <style type="text/css">
		.pointer{
			cursor:pointer;
		}
		.paditablehead{
			background: antiquewhite;
		}
		.checkboxlist{
			padding: 15;
		}
		.checkboxlist:hover{
			background: antiquewhite;
			cursor:pointer;
		}
		.caption{
			font-size:10px;
			text-align:center;
		}
		.imageholder{
			margin-left:auto;
			margin-right:auto;
		}
    </style>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/links.js'></script>
    <script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.8.2.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url();?>js/jquery-ui-1.10.4.custom.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/jquery.timeagopuji.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/jquery/jquery.mousewheel.min.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/cookie/jquery.cookies.2.2.0.min.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/bootstrap.min.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/charts/excanvas.min.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/charts/jquery.flot.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/charts/jquery.flot.stack.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/charts/jquery.flot.pie.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/charts/jquery.flot.resize.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/sparklines/jquery.sparkline.min.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/fullcalendar/fullcalendar.min.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/select2/select2.min.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/uniform/uniform.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/validation/languages/jquery.validationEngine-en.js' charset='utf-8'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/validation/jquery.validationEngine.js' charset='utf-8'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/animatedprogressbar/animated_progressbar.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/qtip/jquery.qtip-1.0.0-rc3.min.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/cleditor/jquery.cleditor.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/dataTables/jquery.dataTables.min.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins/fancybox/jquery.fancybox.pack.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>cookies.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>actions.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>charts.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>plugins.js'></script>
    <script type='text/javascript' src='<?php echo $jspath;?>jquery.balloon.js'></script>
    <script type='text/javascript' src='<?php echo base_url();?>js/jquery.simple-dtpicker.js'></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/msg/jquery.center.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/msg/jquery.msg.min.js"></script>
    <script type='text/javascript' src='<?php echo base_url();?>js/ajax_file_upload/ajaxupload.3.5.js'></script>
	<!-- start of jspdf -->
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.plugin.addimage.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.plugin.standard_fonts_metrics.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.plugin.split_text_to_size.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.plugin.from_html.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/basic.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/datetimepicker/jquery.datetimepicker.js"></script>

	<!-- end of jspdf -->
	<!-- start of Radu Cel Frumos -->
	<script type="text/javascript" src="<?php echo base_url();?>js/typeahead.0.10.2.js"></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/radu.js'></script>
	<!-- start of Radu Cel Frumos -->
</head>
