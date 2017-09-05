<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Installation - Field Report</title>
<!-- bootstrap -->
<link href="<?php echo base_url();?>css/reports/bootstraps/bootstrap.min.css" rel="stylesheet">
<!-- -->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<link href="<?php echo base_url();?>reports/css/custom.css" rel="stylesheet">
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>css/aquarius/reports/padiReport.css' />
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/links.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.8.2.min.js'></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.14.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.debug.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.min.js"></script>
</head>

<body>
<div class="container" id="fromHTMLtestdiv">
	<div class="page-header">
		<h1 id="rpttype">Installation Reports</h1>
		<p class="lead">Laporan Hasil Instalasi <?php echo $objs->client->name . ' ' . $objs->address ;?></p>
		<div class="row padbot5">
			<div class="col-md-2 orgtext">Tanggal</div><div class="col-md-10" id="surveydate"><?php echo $objs->install_date;?></div>
		</div>
		<div class="row padbot5">
			<div class="col-md-2 orgtext">Pelaksana</div><div class="col-md-10"><?php echo $opr?></div>
		</div>
	</div><!-- page header end -->
	<h3>Data Pelanggan</h3>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Nama Pelanggan</div><div class="col-md-10" id="customername"><?php echo $objs->name;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Kontak</div><div class="col-md-10"><?php echo $objs->pic_name;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">No. Telp</div><div class="col-md-10"><?php echo $objs->pic_phone_area . ' ' . $objs->pic_phone;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Alamat</div><div class="col-md-10"><?php echo $objs->address;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Layanan</div><div class="col-md-10"><?php echo $objs->service;?></div>
	</div>
	<h3>Data Perangkat</h3>
	<?php foreach($routers as $router){?>
	<h4><?php echo $router->tipe;?></h4>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Nama Perangkat</div>
		<div class="col-md-10"><?php echo $router->tipe;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">MAC Board</div><div class="col-md-10"><?php echo $router->macboard;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">IP Public</div><div class="col-md-10"><?php echo $router->ip_public;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">IP Private</div><div class="col-md-10"><?php echo $router->ip_private;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">User</div><div class="col-md-10"><?php echo $router->user;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Password</div><div class="col-md-10"><?php echo $router->password;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Location</div><div class="col-md-10"><?php echo $router->location;?></div>
	</div>
	<?php }?>

	<?php foreach($pccards as $pccard){?>
	<h4><?php echo $pccard->name;?></h4>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">MAC PC Card</div><div class="col-md-10"><?php echo $pccard->macaddress;?></div>
	</div>
	<?php }?>
	<h3>AP Wifi</h3>
	<?php foreach($apwifis as $ap){?>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Tipe</div><div class="col-md-10"><?php echo $ap->tipe;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Security Key</div><div class="col-md-10"><?php echo $ap->security_key;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">ESSID</div><div class="col-md-10"><?php echo $ap->essid;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Location</div><div class="col-md-10"><?php echo $ap->location;?></div>
	</div>
	<?php }?>
	<h3>Wireless Radio</h3>
	<?php foreach($apwifis as $ap){?>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">IP AP</div><div class="col-md-10"><?php  echo $wirelessradios->ip_ap?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">ESSID</div><div class="col-md-10"><?php  echo $wirelessradios->essid?></div>
	</div>
	<?php }?>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Frekuensi</div><div class="col-md-10"><?php  echo $wirelessradios->freqwency?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Polarisasi</div><div class="col-md-10"><?php  echo $wirelessradios->polarization?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Signal</div><div class="col-md-10"><?php  echo $wirelessradios->signal?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Quality/CCQ</div><div class="col-md-10"><?php  echo $wirelessradios->quality?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Noise</div><div class="col-md-10"><?php  echo $wirelessradios->noise?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">User Radio</div><div class="col-md-10"><?php  echo $wirelessradios->user?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Password Radio</div><div class="col-md-10"><?php  echo $wirelessradios->password?></div>
	</div>
	<h3>Antenna</h3>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Lokasi Antena</div><div class="col-md-10"><?php  echo $antennas->location?></div>
	</div>
	<h3>Router</h3>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">User Router</div><div class="col-md-10"><?php  echo $routers->user?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Password Router</div><div class="col-md-10"><?php  echo $routers->password?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Lokasi Router/Switch</div><div class="col-md-10"><?php  echo $routers->location?></div>
	</div>
	<?php
	//$topologijaringan = $objs->install_image->where("title","Topologi Jaringan")->get();
	if($imgtj->result_count()>0){
	?>
	<h3>Topologi Jaringan</h3>
	<?php foreach($imgtj as $tj){?>
	<div class="row">
		<div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo $tj->img;?>"  width=1600 height=1200 /></div>
	</div>
	<?php
	echo $tj->description;
	}}
	?>
	<?php
	//$konfigAP = $objs->install_image->where("title","Konfigurasi AP")->get();
	if($imgka->result_count()>0){
	?>
	<h3>Konfigurasi AP</h3>
	<?php foreach($imgka as $ka){?>
	<div class="row">
		<div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo $ka->img;?>"  width=1600 height=1200 /></div>
	</div>
	<?php
	echo $ka->description;
	}}
	?>
	<?php
	//$speedTest = $objs->install_image->where("title","Speed Test")->get();
	if($imgst->result_count()>0){
	?>
	<h3>Speedtest</h3>
	<?php foreach($imgst as $st){?>
	<div class="row padbot10">
		 <div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo $st->img;?>"  width=1600 height=1200 /></div>
	</div>
	<?php
	echo $st->description;
	}}
	?>
	<?php
	//$documentPhoto = $objs->install_image->where("title","Dokumentasi Foto")->get();
	if($imgdok->result_count()>0){
	?>
	<h3>Dokumentasi Foto</h3>
	<?php foreach($imgdok as $df){?>
	<div class="row padbot10">
		<div class="col-md-12">
			<img class="img-responsive padbot10" src="<?php echo $df->img;?>"  width=1600 height=1200 />
		</div>
	</div>
	<?php
	echo $df->description;
	}}
	?>
	<?php
	switch($objs->status){
		case "1":
	?>
	<div class="panel panel-info">
  		<div class="panel-heading">
			<h3 class="panel-title">STATUS INSTALASI</h3>
  		</div>
  		<div class="panel-body">
			<strong>SELESAI DIKERJAKAN</strong>
  		</div>
	</div>
	<?php
		break;
		case "0":
	?>
	<div class="panel panel-warning">
  		<div class="panel-heading">
			<h3 class="panel-title">STATUS INSTALASI</h3>
  		</div>
  		<div class="panel-body">
			<strong>BELUM SELESAI</strong>
  		</div>
	</div>
	<?php
		break;
		case "":
	?>
	<div class="panel panel-danger">
  		<div class="panel-heading">
			<h3 class="panel-title">STATUS INSTALASI</h3>
  		</div>
  		<div class="panel-body">
			<strong>TIDAK DAPAT DIKERJAKAN</strong>
  		</div>
	</div>
	<?php
	}
	?>
</div><!-- container end -->
<div id="btnHome">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ke Menu Utama</div>
<div class="downloadPDF" id="downloadPDF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Download PDF</div>
<!--<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/TS/installs/installbyclient.js"></script>-->
<script type='text/javascript' src='<?php echo base_url();?>js/padilibs/padi.url.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/installs/report.js'></script>

</body>
</html>
