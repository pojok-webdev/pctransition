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
	<script>surveysiteid=<?php echo $survey_site_id;?></script>
</head>

<body>
<div class="container" id="fromHTMLtestdiv">
	<div class="page-header">
		<h1 id="rpttype">Survey Report</h1>
		<p class="lead">Laporan Hasil Survey Database Teknis</p>
		<div class="row padbot5">
			<div class="col-md-2 orgtext"><font style="color:red">LOKASI</font></div><div class="col-md-10"><?php echo $objs->city;?></div>
		</div>
		<div class="row padbot5">
			<div class="col-md-2 orgtext">JENIS</div><div class="col-md-10">SURVEY</div>
		</div>
		<div class="row padbot5">
			<div class="col-md-2 orgtext">KEBUTUHAN</div><div class="col-md-10"><?php echo $objs->service;?></div>
		</div>	  
	</div><!-- page header end -->
	<h3>1. Data Calon Pelanggan</h3>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Nama Calon Customer</div><div class="col-md-10" id="customername"><?php echo $objs->name;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Tipe Bisnis</div><div class="col-md-10"><?php echo $objs->business_field;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Kontak Teknis</div><div class="col-md-10">-</div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Alamat</div><div class="col-md-10"><?php echo $objs->address;?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Tanggal Pelaksanaan</div><div class="col-md-10" id="surveydate"><?php echo (substr($objs->execution_date,0,10)==="0000-00-00")?substr($objs->survey_date,0,10):substr($objs->execution_date,0,10);?></div>
	</div>
	<div class="row padbot5">
		<div class="col-md-2 orgtext">Pelaksana</div><div class="col-md-10"><?php echo $surveyors;?></div>
	</div>
	<h3>2. Data Teknis</h3>
	<?php foreach($objs as $site){?>
		<?php echo $site->address;?>
		<div class="row padbot5">
			<div class="col-md-2 orgtext">Location</div>
			<div class="col-md-10">
			<?php echo $site->location_s_d . "<sup>o</sup> " . $site->location_s_m . '" ' . $site->location_s_s . "' ";?> <br />
			<?php echo $site->location_e_d . "<sup>o</sup> " . $site->location_e_m . '" ' . $site->location_e_s . "' ";?></div>
		</div>
		<div class="row padbot5">
			<div class="col-md-2 orgtext">Elevation</div>
			<div class="col-md-10">
			<?php echo $site->amsl;?> m (AMSL)<br />
			<?php echo $site->agl;?> m (AGL)</div>
		</div>
	<?php }?>
	<h3 class="sub-">3. Data Jarak</h3> 
	<div class="row padbot10">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr class="orgtext">
						<th width="20%">BTS / Site</th>
						<th width="20%">Jarak</th>
						<th width="10%">NLOS/LOS</th>
						<th width="10%">AP</th>
						<th width="20%">Penghalang</th>
						<th width="20%">Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($btsdistance as $sbd){?>
						<?php switch($sbd->los){
							case "0":
							$los = "NLOS";
							break;	
							case "1":
							$los = "LOS";
							break;	
							case "2":
							$los = "nLOS";
							break;	
						}?>
					<tr>
						<td><?php echo $sbd->btstower->name;?></td>
						<td><?php echo $sbd->distance;?> </td>
						<td><?php echo $los;?></td>
						<td><?php echo $sbd->ap;?></td>
						<td><?php echo $sbd->obstacle;?></td>
						<td><?php echo $sbd->description;?></td>
					</tr>
					<?php }?>
					<?php foreach($sitedistance as $ssd){?>
						<?php switch($ssd->los){
							case "0":
							$los = "NLOS";
							break;	
							case "1":
							$los = "LOS";
							break;	
							case "2":
							$los = "nLOS";
							break;	
						}?>
					<tr>
						<td><?php echo $ssd->address;?></td>
						<td><?php echo $ssd->distance;?> </td>
						<td><?php echo $los;?> </td>
						<td></td>
						<td><?php echo $ssd->obstacle;?></td>
						<td><?php echo $ssd->description;?></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div><!-- table-responsive end -->
	</div> 
	<h3>4. Foto Lokasi</h3>  
	<?php foreach($images as $img){?>
	<?php echo $img->name;?>
	<div class="row">
		<div class="col-md-12">
			<img class="img-responsive padbot10" src="<?php echo $img->img;?>" width=1600 height=1200 />
		</div>
	</div>
	<?php echo $img->description;?>
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
					<?php foreach($materials as $material){?>
					<?php $c+=1;?>
					<tr>
						<td><?php echo $c;?></td>
						<td><?php echo $material->material_type . ' ' . $material->name;?></td>
						<td><?php echo $material->amount;?></td>						
					</tr>
					<?php }?>
					<?php foreach($sds as $device){?>
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
				<?php foreach($sr as $resume){?>
					<li><?php echo $resume->name;?></li>
				<?php }?>
			</ol>
		</div>
	</div>
	<h3>7. Status</h3>
	<div class="row padbot50">
		<div class="col-md-12">
			<?php
			$stt = "";
				switch($objs->resume){
					case "0":
					$stt = "Belum ada kesimpulan";
					break;
					case "1":
					$stt = "Bisa dilaksanakan";
					break;
					case "2":
					$stt = "Bisa dilaksanakan dengan syarat";
					break;
					case "3":
					$stt = "Tidak dapat dilaksanakan";
					break;
				}
			?>
			<?php echo $stt;?>
		</div>
	</div>
</div><!-- container end -->
<div id="btnHome">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ke Menu Utama</div>
<div class="downloadPDF" id="downloadPDF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Download PDF</div>
<div class="downloadPDF2" id="downloadPDF2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Download PDF2</div>
</body>
<script type='text/javascript' src='/js/aquarius/TS/surveys/report.js'></script>
<script type='text/javascript' src='/js/aquarius/TS/surveys/report.1.js'></script>
</html>
