<html>
	<head>
		<style>
			.rpt{
				width: 100%;
				border: none;
			}
			.sepertiga{
				width:33%;
			}
			.duapertiga{
				width:67%;
			}
			.seperempat{
				width:25%;
			}
			.duaperempat{
				width:75%;
			}
			.seperlima{
				width:20%;
			}
			.duaperlima{
				width:80%;
			}
		</style>
<!--		<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>css/aquarius/reports/padiReport.css' media="screen"/>-->
		<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.8.2.min.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/links.js'></script>
		<link href="<?php echo base_url();?>css/reports/bootstraps/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url();?>reports/css/custom.css" rel="stylesheet">
		<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.8.2.min.js'></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.14.custom.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.debug.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.min.js"></script>
	</head>
	<body id="fromHTMLtestdiv">
		<h1 id="rpttype">Survey Report</h1>
		<h2>Laporan Hasil Survey Database Teknis</h2>
		<table class="rpt">
			<tr><th class="seperlima">Lokasi</th><th class="duaperlima">: <?php echo $objs->city;?></th></tr>
			<tr><th class="seperlima">Jenis</th><th class="duaperlima">: Survey</th></tr>
			<tr><th class="seperlima">Kebutuhan</th><th class="duaperlima">: <?php echo $objs->service;?></th></tr>
		</table>
		<h2>Data Calon Pelanggan</h2>
	<table style="border:none">
		<tr><td>Nama Calon Customer</td><td id="customername">: <?php echo $objs->name;?></td></tr>
		<tr><td>Tipe Bisnis</td><td id="customername">: <?php echo $objs->business_field;?></td></tr>
		<tr><td>Kontak Teknis</td><td id="customername">: <?php echo $objs->name;?></td></tr>
		<tr><td>Alamat</td><td id="customername">: <?php echo $objs->address;?></td>
		</tr><tr><td>Tanggal Pelaksanaan</td><td  id="surveydate">: <?php echo (substr($objs->execution_date,0,10)==="0000-00-00")?substr($objs->survey_date,0,10):substr($objs->execution_date,0,10);?></td></tr>
		<tr><td>Pelaksana</td><td id="customername">: <?php echo $objs->surveyors;?></td>
	</table>

		
		
		<div id="btnHome">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ke Menu Utama</div>
		<div class="downloadPDF" id="downloadPDF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Download PDF</div>
		<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/surveys/report.js'></script>
	</body>
</html>
