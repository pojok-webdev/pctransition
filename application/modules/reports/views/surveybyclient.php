<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Survey - Field Report</title>
<!-- bootstrap -->
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>css/aquarius/reports/padiReport.css' media="screen"/>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.8.2.min.js'></script>
<link href="<?php echo base_url();?>reports/css/bootstrap.min.css" rel="stylesheet" media="screen">
<!-- -->

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

</head>

<body>
<div class="container" id="fromHTMLtestdiv">
	<div class="page-header">
    	<h1>Survey Report</h1>
        <p class="lead">Laporan Hasil Survey Database Teknis</p>
        <div class="row padbot5">
        	<div class="col-md-2 orgtext"><font style="color:red">LOKASI</font></div><div class="col-md-10"><?php echo $objs->city;?></div>
        </div>
        <div class="row padbot5">
        	<div class="col-md-2 orgtext">JENIS</div><div class="col-md-10">SURVEY</div>
        </div>
        <div class="row padbot5">
        	<div class="col-md-2 orgtext">KEBUTUHAN</div><div class="col-md-10"><?php echo $objs->survey_request->service->name;?></div>
        </div>      
    </div><!-- page header end -->
    <h3>1. Data Calon Pelanggan</h3>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Nama Calon Customer</div><div class="col-md-10"><?php echo $objs->client_site->client->name;?></div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Tipe Bisnis</div><div class="col-md-10"><?php echo $objs->client_site->client->business_field;?></div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Kontak Teknis</div><div class="col-md-10">-</div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Alamat</div><div class="col-md-10"><?php echo $objs->client_site->client->address;?></div>
    </div>
    <div class="row padbot5">
    	<div class="col-md-2 orgtext">Tanggal Pelaksanaan</div><div class="col-md-10"><?php echo $objs->survey_date;?></div>
    </div>
    <div class="row padbot5">
		<?php 
		$surve = '';
		foreach($objs->survey_request->survey_surveyor as $surveyor){
			$surve.=$surveyor;
		}
		?>
    	<div class="col-md-2 orgtext">Pelaksana</div><div class="col-md-10"><?php echo $surve;?></div>
    </div>
    <h3>2. Data Teknis</h3>
    <?php foreach($objs->client_site as $site){?>
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
					<?php foreach($objs->survey_bts_distance as $sbd){?>
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
    <?php foreach($objs->survey_image as $img){?>
    <?php echo $img->name;?>
    <div class="row">
    	<div class="col-md-6"><img class="img-responsive padbot10" src="<?php echo base_url();?>media/surveys/<?php echo $img->path;?>" width=250 height=250 /></div>
    </div>
    <?php }?>
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
					<?php $c=0;?>
					<?php foreach($objs->survey_material as $material){?>
					<?php $c+=1;?>
                	<tr>
                    	<td><?php echo $c;?></td>
                        <td><?php echo $material->material_type . ' ' . $material->name;?></td>
                        <td><?php echo $material->amount;?></td>                        
                    </tr>
                    <?php }?>
					<?php foreach($objs->survey_device as $device){?>
                	<?php $c+=1;?>
                	<tr>
                    	<td><?php echo $c;?></td>
                        <td><?php echo $device->name;?></td>
                        <td><?php echo $device->amount;?></td>                        
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div><!-- table-responsive end -->    	
    </div>
    <h3>6. Resume</h3>
    <div class="row padbot50">
    	<div class="col-md-12">
        	<ol>
				<?php foreach($objs->survey_resume as $resume){?>
            	<li><?php echo $resume->name;?></li>
            	<?php }?>
            </ol>
        </div>
    </div>
	<div class="panel panel-info">
  		<div class="panel-heading">
    		<h3 class="panel-title">STATUS PROJECT</h3>
  		</div>
  		<div class="panel-body">
			<?php
				switch($objs->survey_request->status){
					case '1':
					$status = "DAPAT DILAKSANAKAN";
					break;
					case '0':
					$status = "BELUM ADA KESIMPULAN";
					break;
					case '2':
					$status = "DAPAT DILAKSANAKAN DG SYARAT";
					break;
					case '3':
					$status = "TIDAK DAPAT DILAKSANAKAN";
					break;
				}
			?>
    		<strong><?php echo $status;?></strong>
  		</div>
	</div>
</div><!-- container end -->
<div id="btnHome">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ke Menu Utama</div>
<div class="downloadPDF" id="downloadPDF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Download PDF</div>
</body>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/report.js'></script>
</html>
