<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Survey - Field Report</title>
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

</head>

<body>
<div class="container">
	<div class="page-header">
    	<h1>Survey Report</h1>
        <p class="lead">Laporan Hasil Survey Database Teknis</p>
        <div class="row padbot5">
        	<div class="col-md-2 orgtext">LOKASI</div><div class="col-md-10">SURABAYA</div>
        </div>
        <div class="row padbot5">
        	<div class="col-md-2 orgtext">JENIS</div><div class="col-md-10">SURVEY</div>
        </div>
        <div class="row padbot5">
        	<div class="col-md-2 orgtext">KEBUTUHAN</div><div class="col-md-10">SMART VALUE up to 2 Mbps</div>
        </div>      
    </div><!-- page header end -->
    <h3>1. Data Calon Pelanggan</h3>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Nama Calon Customer</div><div class="col-md-10"><?php echo $client_name;?></div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Tipe Bisnis</div><div class="col-md-10"><?php echo $business_field;?></div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Kontak Teknis</div><div class="col-md-10">-</div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Alamat</div><div class="col-md-10"><?php echo $client_address;?></div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Tanggal Pelaksanaan</div><div class="col-md-10"><?php echo $survey_date;?></div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Pelaksana</div><div class="col-md-10"><?php echo $surveyor;?></div>
    </div>
    <h3>2. Data Teknis</h3>
    <?php foreach($sites as $site){?>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Location</div><div class="col-md-10"><?php echo (is_null($site->location_s))?'-':$site->location_s;?> <br /><?php echo (is_null($site->location_e))?'-':$site->location_e;?></div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Elevation</div><div class="col-md-10"><?php echo (is_null($site->amsl))?'-':$site->amsl;?> m (AMSL)<br /><?php echo (is_null($site->agl))?'-':$site->agl;?> m (AGL)</div>
    </div>
    <?php }?>
    <h3 class="sub-">3. Data Jarak</h3> 
    <div class="row padbot10">
    	<div class="table-responsive">
        	<table class="table table-striped">
            	<thead>
                	<tr class="orgtext">
                    	<th>BTS</th>
                        <th>Jarak</th>
                        <th>NLOS/LOS</th>
                        <th>AP</th>
                        <th>Penghalang</th>
                    </tr>
                </thead>
                <tbody>
					<?php foreach($sites->survey_bts_distance as $sbd){?>
                	<tr>
                    	<td><?php echo $sbd->btstower->name;?></td>
                        <td><?php echo $sbd->distance;?> Km</td>
                        <td><?php echo ($sbd->los=='1')?'LOS':'nLOS';?></td>
                        <td><?php echo $sbd->ap;?></td>
                        <td><?php echo $sbd->obstacle;?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div><!-- table-responsive end -->
    </div> 
    <h3>4. Foto Lokasi</h3>  
    <?php foreach($obj->survey_site->survey_image as $img){?>
    <?php echo $img->name;?>
    <div class="row">
    	<div class="col-md-6"><img class="img-responsive padbot10" src="<?php echo base_url();?>media/surveys/<?php echo $img->path;?>" /></div>
    	<div class="col-md-6"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-pandangan-btsneo-nlos.jpg" /></div>
    </div>
    <?php }?>
    <div class="row">
    	<div class="col-md-6"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-pandangan-btsarch-Nlos.jpg" /></div>
    	<div class="col-md-6"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-pandangan-btssmith-Nlos.jpg" /></div>
    </div>
    <div class="row padbot20">
    	<div class="col-md-6"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-pos-tiang.jpg" /></div>
    	<div class="col-md-6"><img class="img-responsive padbot10" src="<?php echo base_url();?>reports/images/william-lt-1-2-3.jpg" /></div>
    </div>
    <h3>5. Kebutuhan Instalasi</h3>
    <div class="row padbot10">
    	<div class="table-responsive">
        	<table class="table table-striped requirement">
            	<thead>
                	<tr class="orgtext">
                    	<th width="10%">No.</th>
                        <th width="60%">Kebutuhan</th>
                        <th width="30%">Banyak/Satuan</th>
                    </tr>
                </thead>
                <tbody>
                	<tr>
                    	<td>1</td>
                        <td>Pipa 1,5"</td>
                        <td>6 m</td>                        
                    </tr>
                	<tr>
                    	<td>2</td>
                        <td>Kawat seling</td>
                        <td>35 m</td>
                    </tr>                	
                    <tr>
                    	<td>3</td>
                        <td>Spanscrew</td>
                        <td>3 pcs</td>
                    </tr>
                    <tr>
                    	<td>4</td>
                        <td>Kabel UTP</td>
                        <td>30 m</td>                        
                    </tr>
                    <tr>
                    	<td>5</td>
                        <td>Splitzen</td>
                        <td>1 pcs</td>                        
                    </tr>
                    <tr>
                    	<td>6</td>
                        <td>Kabel NYA 16 mm</td>
                        <td>35 m</td>                        
                    </tr>
                    <tr>
                    	<td>7</td>
                        <td>Ground rod</td>
                        <td>1 batang</td>                        
                    </tr>                    
                </tbody>
            </table>
        </div><!-- table-responsive end -->    	
    </div>
    <h3>6. Resume</h3>
    <div class="row padbot50">
    	<div class="col-md-12">
        	<ol>
            	<li>Bangunan rumah 3 lt, difungsikan sebagai tempat kos (30 kamar).</li>
                <li>Ketinggian tiang yang direkomendasikan 6 m diatas roof lt 3.</li>
                <li>Posisi penempatan tiang di klem pada samping tembok dengan 3 tarikan suspender.</li>
                <li>Posisi penempatan switch belum diketahui karena saat survey hanya ada penjaga rumah.</li>
                <li>Tiang antenna direkomendasikan memakai penangkal petir.</li>
            </ol>
        </div>
    </div>
	<div class="panel panel-info">
  		<div class="panel-heading">
    		<h3 class="panel-title">STATUS PROJECT</h3>
  		</div>
  		<div class="panel-body">
    		<strong>DAPAT DILAKSANAKAN</strong>
  		</div>
	</div>
    <div class="panel panel-warning">
  		<div class="panel-heading">
    		<h3 class="panel-title">STATUS PROJECT</h3>
  		</div>
  		<div class="panel-body">
    		<strong>DITUNDA</strong>
  		</div>
	</div>
    <div class="panel panel-danger">
  		<div class="panel-heading">
    		<h3 class="panel-title">STATUS PROJECT</h3>
  		</div>
  		<div class="panel-body">
    		<strong>TIDAK DAPAT DILAKSANAKAN</strong>
  		</div>
	</div>       	   
</div><!-- container end -->
</body>
</html>
