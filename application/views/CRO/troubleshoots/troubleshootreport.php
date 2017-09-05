<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TROUBLESHOOT - Field Report</title>
<!-- bootstrap -->
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>css/aquarius/reports/padiReport.css' media="screen"/>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.8.2.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/links.js'></script>
<link href="<?php echo base_url();?>css/reports/bootstraps/bootstrap.min.css" rel="stylesheet" media="screen">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<link href="<?php echo base_url();?>reports/css/custom.css" rel="stylesheet">
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.8.2.min.js'></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.14.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.debug.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/html2canvas/html2canvas.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/html2canvas/canvas2image.js"></script>
</head>

<body>
<div class="container" id="fromHTMLtestdiv">
	<div class="page-header">
		<h1 id="rpttype">Troubleshoot Report</h1>
		<p class="lead">Laporan Hasil Troubleshoot</p>
		<div class="row padbot5">
			<div class="col-md-2 orgtext"><font style="color:red">LOKASI</font></div><div class="col-md-10">&nbsp;<?php echo $objs->client_site->city;?></div>
		</div>
		<div class="row padbot5">
			<div class="col-md-2 orgtext">TGL TROUBLESHOOT</div><div class="col-md-10">&nbsp;<?php echo $objs->troubleshoot_date;?></div>
		</div>
		<div class="row padbot5">
			<div class="col-md-2 orgtext">SITE</div><div class="col-md-10">&nbsp;<?php echo $objs->description . $objs->nameofmtype;?></div>
		</div>	  

	<div class="row padbot5">
		<div class="col-md-2 orgtext">Nama Calon Customer</div><div class="col-md-10" id="customername">&nbsp;<?php echo $objs->client_site->client->name;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Tipe Bisnis</div><div class="col-md-10">&nbsp;<?php echo $objs->client_site->client->business_field;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Kontak Teknis</div><div class="col-md-10">&nbsp;<?php echo $objs->pic_name;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Alamat</div><div class="col-md-10">&nbsp;<?php echo $objs->client_site->address;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Keluhan</div><div class="col-md-10">&nbsp;<?php echo $complaint;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Tanggal Pelaksanaan</div>
		<div class="col-md-10" id="surveydate">&nbsp;<?php echo (substr($objs->troubleshoot_date,0,10)==="0000-00-00")?substr($objs->troubleshoot_date,0,10):substr($objs->troubleshoot_date,0,10);?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Pelaksana</div><div class="col-md-10">&nbsp;<?php echo $officers;?></div>
	</div>

	</div><!-- page header end -->
	<h3>1. ROUTER</h3>
	<?php foreach($objs->client_site->site_router as $obj){?>
		<div class="row padbot5">
			<div class="col-md-2 orgtext"><b>TIPE</b></div><div class="col-md-10">&nbsp;<b><?php echo $obj->tipe;?></b></div>
			<div class="col-md-2 orgtext">MACBOARD</div><div class="col-md-10">&nbsp;<?php echo $obj->macboard;?></div>
			<div class="col-md-2 orgtext">IP PUBLIC</div><div class="col-md-10">&nbsp;<?php echo $obj->ip_public;?></div>
			<div class="col-md-2 orgtext">IP PRIVATE</div><div class="col-md-10">&nbsp;<?php echo $obj->ip_private;?></div>
			<div class="col-md-2 orgtext">USER</div><div class="col-md-10">&nbsp;<?php echo $obj->user;?></div>
			<div class="col-md-2 orgtext">PASSWORD</div><div class="col-md-10">&nbsp;<?php echo $obj->password;?></div>
			<div class="col-md-2 orgtext">LOCATION</div><div class="col-md-10">&nbsp;<?php echo $obj->location;?></div>
		</div>
	<?php }?>
	<h3>2. AP WIFI</h3>
	<?php foreach($objs->client_site->site_apwifi as $obj){?>
		<div class="row padbot5">
			<div class="col-md-2 orgtext"><b>TIPE</b></div><div class="col-md-10">&nbsp;<b><?php echo $obj->tipe;?></b></div>
			<div class="col-md-2 orgtext">MACBOARD</div><div class="col-md-10">&nbsp;<?php echo $obj->macboard;?></div>
			<div class="col-md-2 orgtext">IPADDRESS</div><div class="col-md-10">&nbsp;<?php echo $obj->ip_address;?></div>
			<div class="col-md-2 orgtext">ESSID</div><div class="col-md-10">&nbsp;<?php echo $obj->essid;?></div>
			<div class="col-md-2 orgtext">SECURITY KEY</div><div class="col-md-10">&nbsp;<?php echo $obj->security_key;?></div>
			<div class="col-md-2 orgtext">USER</div><div class="col-md-10">&nbsp;<?php echo $obj->user;?></div>
			<div class="col-md-2 orgtext">PASSWORD</div><div class="col-md-10">&nbsp;<?php echo $obj->password;?></div>
			<div class="col-md-2 orgtext">LOCATION</div><div class="col-md-10">&nbsp;<?php echo $obj->location;?></div>
		</div>
	<?php }?>
	<h3 class="sub-">3. WIRELESS BOARD</h3> 
	<?php foreach($objs->client_site->site_wireless_radio as $obj){?>
		<div class="row padbot5">
			<div class="col-md-2 orgtext"><b>TIPE</b></div><div class="col-md-10">&nbsp;<b><?php echo $obj->tipe;?></b></div>
			<div class="col-md-2 orgtext">MACBOARD</div><div class="col-md-10">&nbsp;<?php echo $obj->macboard;?></b></div>
			<div class="col-md-2 orgtext">IP RADIO</div><div class="col-md-10">&nbsp;<?php echo $obj->ip_radio;?></div>
			<div class="col-md-2 orgtext">IP AP</div><div class="col-md-10">&nbsp;<?php echo $obj->ip_ap;?></div>
			<div class="col-md-2 orgtext">IP ETHERNET</div><div class="col-md-10">&nbsp;<?php echo $obj->ip_ethernet;?></div>
			<div class="col-md-2 orgtext">ESSID</div><div class="col-md-10">&nbsp;<?php echo $obj->essid;?></div>
			<div class="col-md-2 orgtext">FREKWENSI</div><div class="col-md-10">&nbsp;<?php echo $obj->freqwency;?></div>
			<div class="col-md-2 orgtext">USER</div><div class="col-md-10">&nbsp;<?php echo $obj->user;?></div>
			<div class="col-md-2 orgtext">PASSWORD</div><div class="col-md-10">&nbsp;<?php echo $obj->password;?></div>
			<div class="col-md-2 orgtext">LOCATION</div><div class="col-md-10">&nbsp;<?php echo $obj->location;?></div>
		</div>
	<?php }?>
	<h3>4. SWITCH</h3>  
	<?php foreach($objs->client_site->site_switch as $obj){?>
	<?php echo $obj->name;?>
		<div class="row padbot5">
			<div class="col-md-2 orgtext"><b>TIPE</b></div><div class="col-md-10">&nbsp;<b><?php echo $obj->name;?></b></div>
		</div>
	<?php }?>
	<h3>5. MINI PCI</h3>
	<?php foreach($objs->client_site->site_pccard as $obj){?>
		<div class="row padbot5">
			<div class="col-md-2 orgtext"><b>TIPE</b></div><div class="col-md-10">&nbsp;<b><?php echo $obj->name;?></b></div>
		</div>
	<?php }?>
	<h3>6. PERANGKAT LAIN</h3>
	<?php foreach($objs->client_site->site_device as $obj){?>
		<div class="row padbot5">
			<div class="col-md-2 orgtext"><b>TIPE</b></div><div class="col-md-10">&nbsp;<b><?php echo $obj->devicetype;?></b></div>
		</div>
	<?php }?>
	<h3>7. AKTIFITAS DI LOKASI</h3>
	<?php echo $objs->activities; ?>
	<h3>8. FOTO LOKASI</h3>
	<?php foreach($objs->troubleshoot_image as $image){?>
		<div class="row">
			<div class="col-md-12">
				<img width="1000" src="<?php echo $image->img;?>" />
				
			</div>
		</div>
		<?php echo $image->description;?>
	<?php }?>
	<h3>9. KESIMPULAN</h3>
	<?php 
		//echo $objs->ticket->solution; 
		echo $objs->resume; 
	?>
	<h3>10. STATUS</h3>
	<div class="row padbot5">
		<div class="col-md-2 orgtext"><b>STATUS</b></div><div class="col-md-10">&nbsp;<b><?php echo $status;?></b></div>
	</div>
</div><!-- container end -->
<div id="btnHome">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ke Menu Utama</div>
<div class="downloadPDF" id="downloadPDF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Download PDF</div>
</body>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/report.js'></script>
</html>
