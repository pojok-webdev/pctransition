<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Maintenance - EOS Report</title>
<!-- bootstrap -->
<link href="/css/reports/bootstraps/bootstrap.min.css" rel="stylesheet">
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
		<h1 id="rpttype">Maintenance Reports</h1>
		<p class="lead">Laporan Hasil Maintenance <?php echo $clientname . ' ' . $address ;?></p>
		<div class="row padbot5">
			<div class="col-md-2 orgtext">Tanggal</div><div class="col-md-10" id="surveydate"><?php echo $install_date;?></div>
		</div>
		<div class="row padbot5">
			<div class="col-md-2 orgtext">Pelaksana</div><div class="col-md-10"><?php echo implode(",",$eosteam)?></div>
		</div>
	</div><!-- page header end -->
	<h3>Data Pelanggan</h3>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Nama Pelanggan</div><div class="col-md-10" id="customername"><?php echo $clientname;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Kontak</div><div class="col-md-10"><?php echo $picname;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">No. Telp</div><div class="col-md-10"><?php echo $pic_phone_area . ' ' . $pic_phone;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Alamat</div><div class="col-md-10"><?php echo $address;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Layanan</div><div class="col-md-10"><?php echo $service;?></div>
	</div>
	<h3>Topologi</h3>
	<?php foreach($topologies as $topology){?>
	<h4><?php echo $topology->name;?></h4>
	<div class="row padbot5">
		<div class="col-md-12"><img width="500" src='<?php echo $topology->image;?>'></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">keterangan</div><div class="col-md-10"><?php echo $topology->description;?></div>
	</div>
	<?php }?>

	<?php foreach($competitors as $competitor){?>
	<h4><?php echo $competitor->name;?></h4>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Keterangan</div><div class="col-md-10"><?php echo $competitor->description;?></div>
	</div>
	<?php }?>

	<h3>Dokumen</h3>
	<?php foreach($documents as $document){?>
	<h4><?php echo $document->name;?></h4>
	<div class="row padbot5">
		<div class="col-md-12"><img width="500" src='<?php echo $document->image;?>'></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">keterangan</div><div class="col-md-10"><?php echo $document->description;?></div>
	</div>
	<?php }?>

	<h3>Pembagian Antar Operator</h3>
	<h4></h4>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Keterangan</div><div class="col-md-10"><?php echo $distribution;?></div>
	</div>
	<h3>Keluhan Pelanggan</h3>
	<h4></h4>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Keterangan</div><div class="col-md-10"><?php echo $maintenancescheduledescription;?></div>
	</div>
	<h3>Kegiatan di Lapangan</h3>
	<h4></h4>
	<div class="row padbot5">
		<div class="col-md-12"><?php echo $eosactivity;?></div>
	</div>
	<h3>Perangkat Pelanggan di PadiNET</h3>
	<?php $c=1;?>
	<?php foreach($clientdevices as $device){?>
	<div class="row padbot5">
		<div class="col-md-1 orgtext"><?php echo $c;?></div><div class="col-md-2 orgtext">Tipe</div><div class="col-md-9"><?php echo $device->devicetype;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-1 orgtext"></div><div class="col-md-2 orgtext">Nama</div><div class="col-md-9"><?php echo $device->name;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-1 orgtext"></div><div class="col-md-2 orgtext">MacAddress</div><div class="col-md-9"><?php  echo $device->macaddress;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-1 orgtext"></div><div class="col-md-2 orgtext">No. Seri</div><div class="col-md-9"><?php  echo $device->serialno;?></div>
	</div>
	<?php 
	$c++;
	}
	?>
	<h3>Perangkat PadiNET di Pelanggan</h3>
	<?php $c=1;?>
	<?php foreach($padinetdevices as $device){?>
	<div class="row padbot5">
		<div class="col-md-1 orgtext"><?php echo $c;?></div><div class="col-md-2 orgtext">Tipe</div><div class="col-md-9"><?php  echo $device->devicetype;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-1 orgtext"></div><div class="col-md-2 orgtext">Nama</div><div class="col-md-9"><?php  echo $device->name;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-1 orgtext"></div><div class="col-md-2 orgtext">MacAddress</div><div class="col-md-9"><?php  echo $device->macaddress;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-1 orgtext"></div><div class="col-md-2 orgtext">No. Seri</div><div class="col-md-9"><?php  echo $device->serialno;?></div>
	</div>
	<?php 
	$c++;
	}
	?>
	<h3>VAS</h3>
	<?php $c=1;?>
	<?php foreach($vases as $vas){?>
	<div class="row padbot5">
		<div class="col-md-12"><?php echo  $c . ". " . $vas->vas;?></div>
	</div>
	<?php
	$c++;
	}
	?>
	
	
</div><!-- container end -->
<div id="btnHome">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ke Menu Utama</div>
<div class="downloadPDF" id="downloadPDF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Download PDF</div>
<!--<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/TS/installs/installbyclient.js"></script>-->
<script type='text/javascript' src='<?php echo base_url();?>js/padilibs/padi.url.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/EOS/maintenancereport/report.js'></script>

</body>
</html>
