<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Installation - Field Report</title>
<!-- bootstrap -->
<link href="<?php echo base_url();?>reports/css/bootstrap.min.css" rel="stylesheet">
<!-- -->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<link href="<?php echo base_url();?>reports/css/custom.css" rel="stylesheet">
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>css/aquarius/reports/padiReport.css' />
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.8.2.min.js'></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.14.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.debug.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.min.js"></script>
</head>

<body>
<div class="container">
	<div class="page-header">
    	<h1>Installation Report</h1>
        <p class="lead">Laporan Hasil Instalasi <?php echo $objs->client_site->client->name . ' ' . $objs->client_site->address ;?></p>
        <div class="row padbot5">
        	<div class="col-md-2 orgtext">Tanggal</div><div class="col-md-10"><?php echo $objs->install_date;?></div>
        </div>
        <div class="row padbot5">
        	<div class="col-md-2 orgtext">Pelaksana</div><div class="col-md-10"><?php echo $opr?></div>
        </div>     
    </div><!-- page header end -->
    <h3>Data Pelanggan</h3>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Nama Pelanggan</div><div class="col-md-10"><?php echo $objs->client_site->client->name;?></div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Kontak</div><div class="col-md-10"><?php echo $objs->pic;?></div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">No. Telp</div><div class="col-md-10"><?php echo $objs->phone_area . ' ' . $objs->phone;?></div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Alamat</div><div class="col-md-10"><?php echo $objs->client_site->address;?></div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Layanan</div><div class="col-md-10"><?php echo $objs->client_site->client->service->name;?></div>
    </div>
    <h3>Data Perangkat</h3>
    <?php foreach($objs->install_router as $router){?>
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
    
    <?php foreach($objs->install_pccard as $pccard){?>
    <h4><?php echo $pccard->name;?></h4>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">MAC PC Card</div><div class="col-md-10"><?php echo $pccard->macaddress;?></div>
    </div>
    <?php }?>
    <?php foreach($objs->install_ap_wifis as $ap){?>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">IP bridge</div><div class="col-md-10">10.100.100.14/26</div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Nama AP BTS</div><div class="col-md-10">AP Architect Darmo</div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">IP AP</div><div class="col-md-10">10.100.100.6</div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">ESSID</div><div class="col-md-10">pd-architect-darmo</div>
    </div>
    <?php }?>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Frekuensi</div><div class="col-md-10">5350</div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Polarisasi</div><div class="col-md-10">Vertikal</div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Signal</div><div class="col-md-10">-60/-63 dBm</div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Quality/CCQ</div><div class="col-md-10">-100/-100 %</div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Noise</div><div class="col-md-10">38 dB</div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">User Radio</div><div class="col-md-10">admin</div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Password Radio</div><div class="col-md-10">mkmpd1989</div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">User Router RB450</div><div class="col-md-10">admin</div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Password Router</div><div class="col-md-10">mkmpd1989</div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Lokasi Antena</div><div class="col-md-10">Roof top kitchen restoran jepang</div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Lokasi Router/Switch</div><div class="col-md-10">Rak panel di samping kitchen restoran jepang</div>
    </div>
    
    <h3>Topologi Jaringan</h3> 
    <div class="row padbot10">
    	<div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-konfigrb450.jpg" /></div>
    </div> 
    <h3>Konfigurasi AP Unifi</h3>  
    <div class="row">
    	<div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-konfig-ap-unifi.jpg" /></div>
    </div>
    <div class="row">
    	<div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-konfig-ap-unifi-2.jpg" /></div>
    </div>
    <div class="row">
    	<div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-konfig-ap-unifi-3.jpg" /></div>
    </div>
    <div class="row padbot20">
    	<div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-konfig-ap-unifi-4.jpg" /></div>
    </div>
    <h3>Speedtest</h3>
    <div class="row padbot10">
    	 <div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-speedtest.jpg" /></div> 	
    </div>
    <div class="row padbot10">
    	 <div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-speedtest-2.jpg" /></div> 	
    </div>
    <div class="row padbot10">
    	 <div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-speedtest-3.jpg" /></div> 	
    </div>
    <h3>Dokumentasi Foto</h3>
    <div class="row padbot10">
    	<div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-foto1.jpg" title="Posisi Antena di roof top" /></div>
    </div>
    <div class="row padbot10">
    	<div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-foto2.jpg" title="Posisi Router, Switch dan Adaptor" /></div>
    </div>
    <div class="row padbot10">
    	<div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-foto3.jpg" title="Posisi Box Panel Padinet (diatas pintu dapur)" /></div>
    </div>
    <div class="row padbot10">
    	<div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-foto4.jpg" title="Posisi AP Office" /></div>
    </div>
    <div class="row padbot10">
    	<div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-foto5.jpg" title="Posisi AP Kyodai Garden" /></div>
    </div>
    <div class="row padbot10">
    	<div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-foto6.jpg" title="Posisi AP depan VIP Room" /></div>
    </div>
    <div class="row padbot10">
    	<div class="col-md-12"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-foto7.jpg" title="Posisi AP Robata (di depan pintu masuk toilet)" /></div>
    </div>
	<div class="panel panel-info">
  		<div class="panel-heading">
    		<h3 class="panel-title">STATUS INSTALASI</h3>
  		</div>
  		<div class="panel-body">
    		<strong>SELESAI DIKERJAKAN</strong>
  		</div>
	</div>
    <div class="panel panel-warning">
  		<div class="panel-heading">
    		<h3 class="panel-title">STATUS INSTALASI</h3>
  		</div>
  		<div class="panel-body">
    		<strong>DITUNDA</strong>
  		</div>
	</div>
    <div class="panel panel-danger">
  		<div class="panel-heading">
    		<h3 class="panel-title">STATUS INSTALASI</h3>
  		</div>
  		<div class="panel-body">
    		<strong>TIDAK DAPAT DIKERJAKAN</strong>
  		</div>
	</div>       	   
</div><!-- container end -->
<div id="btnHome">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ke Menu Utama</div>
<div class="downloadPDF" id="downloadPDF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Download PDF</div>
<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/installbyclient.js"></script>
</body>
</html>
