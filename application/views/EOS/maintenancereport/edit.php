<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type="text/javascript" src="/js/aquarius/plugins/cleditor/jquery.cleditor.js"></script>
<body>
	<div class="header" id="myheader" username="<?php echo $this->session->userdata['username'];?>">
		<input type="hidden" name="createuser" id="createuser" value="<?php echo $this->session->userdata['username'];?>" />
		<a class="logo" href="index.html"><img src="/img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/></a>
		<ul class="header_menu">
			<li class="list_icon"><a href="#">&nbsp;</a></li>
		</ul>
	</div>
	<?php $this->load->view('adm/menu');?>
	<?php $this->load->view('EOS/maintenancereport/modals');?>
	<div class="content">
		<div class="breadLine">
			<ul class="breadcrumb">
				<li><a href="#">PadiApp</a> <span class="divider">></span></li>
				<li>
					<a href="<?php echo base_url();?>maintenancereports">Maintenance</a> 
					<span class="divider">></span>
				</li>
				<li class="active">Add</li>
			</ul>
			<?php $this->load->view('adm/buttons');?>
		</div>
		<div class="workplace" id="workplace" site_id="">
		<input type='hidden' value='<?php echo $this->ionuser->username;?>' name='createuser' id='createuser' class="inp_bts inp_devices inp_resume" />
		<input type="hidden" name="maintenancereport" id="maintenancereport" value="<?php echo $obj->maintenance_id?>" />
		<input type="hidden" name="report" id="report" value="<?php echo $obj->id?>" />
		<div class="block-fluid without-head">
			<div class="toolbar clearfix">
				<div class="left"><span id="maintenanceinfo"></span></div>
				<div class="right">
					<div class="btn-group">
						<button data-toggle="dropdown" class="btn dropdown-toggle">Simpan 
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right">
							<li id="btnsavereport" class="pointer btnsavereport" status="1"><a>Selesai</a></li>
							<li class="pointer btnsavereport" status="0"><a class="">Belum Selesai</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="toolbar nopadding-toolbar clearfix">
						<h4>Data Kompetitor</h4>
					</div>
					<div class="toolbar clearfix paditablehead">
						<div class="left">
							<div class="btn-group">
								<button type="button" class="btn btn-small btn-danger tip addKompetitor">
								<span class="icon-plus icon-white"></span>
								</button>
								<button type="button" class="btn btn-small addKompetitor">Penambahan Kompetitor</button>
							</div>
						</div>
					</div>
					<table cellpadding="0" cellspacing="0" width="100%" class="table images tKompetitor" id="tKompetitor">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Layanan</th>
								<th>Keterangan</th>
								<th width="40">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($kompetitors as $opr){?>
							<tr myid="<?php echo $opr->id;?>">
								<td><a><?php echo $opr->name;?></a></td>
								<td><a><?php echo $opr->service;?></a></td>
								<td><a><?php echo $opr->description;?></a></td>
								<td><a><span class="icon-remove kompetitor_remove"></span></a></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<div class="toolbar bottom-toolbar clearfix">
						<div class="left">
						</div>
						<div class="right">
							Total : <span id="total_kompetitor">2</span>
						</div>
					</div>
				</div>
			</div>
			<div class="span6 clearfix">
				<div class="block-fluid without-head">
					<div class="toolbar"><h4>Tanggal Maintenance</h4></div>
				</div>
				<div class="row-form clearfix">
					<div class="span5">Tanggal Maintenance</div>
					<div class="span3">
						<input type="text" name="maintenancedate" id="maintenancedate" class="dtpicker" value="<?php echo $obj->maintenancedate;?>">
					</div>
					<div class="span4">
						<input type="hidden" name="mHour" id="mHour" value="00">
					</div>
					<div class="span4">
						<input type="hidden" name="mMinute" id="mMinute" class="dtpicker" value="00">
					</div>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6 clearfix">
				<div class="block-fluid without-head">
					<div class="toolbar">
						<h4>Pelapor</h4>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Pelapor</div>
						<div class="span9">
							<input type="text" name="reporter" id="reporter" value="<?php echo $obj->reporter;?>">
						</div>
					</div>
				</div>
			</div>
			<div class="span6 clearfix">
				<div class="block-fluid without-head">
					<div class="toolbar">
						<h4>Pembagian Kompetitor</h4>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Deskripsi</div>
						<div class="span9">
							<textarea name="distribution" id="distribution" class="myeditor">
								<?php echo $obj->distribution;?>
							</textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="toolbar nopadding-toolbar clearfix">
						<h4>Penggunaan Internet Untuk Apa saja</h4>
					</div>
					<div class="toolbar clearfix">
						<div class="left">
							<div class="btn-group">
								<button type="button" class="btn btn-small btn-danger tip addUsage" title="Penambahan Penggunaan Internet">
									<span class="icon-plus icon-white"></span>
								</button>
								<button type="button" class="btn btn-small addUsage">Penambahan Penggunaan Internet</button>
							</div>
						</div>
					</div>
					<table cellpadding="0" cellspacing="0" width="100%" class="table images t_usage">
						<thead>
							<tr>
								<th width="">Keterangan</th>
								<th width="40">Actions</th>
							</tr>
						</thead>
						<tbody class='site'>
							<?php foreach($mapplications as $app){?>
							<tr myid="<?php echo $app->application_id;?>">
								<td><a><?php echo $app->name;?></a></td>
								<td><a><span class="icon-remove pointer usage_remove"></span></a></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<div class="toolbar bottom-toolbar clearfix">
						<div class="left">
						</div>
						<div class="right">
							Total : <span id="total_application">3</span>
						</div>
					</div>
				</div>
			</div>
			<div class="span6 clearfix">
				<div class="block-fluid without-head">
					<div class="toolbar">
						<h4>Keluhan/Permasalahan</h4>
					</div>
					<div class="toolbar clearfix">
						<div class="left">
							<div class="btn-group">
								<button type="button" class="btn btn-small btn-danger tip addClientProblem" title="Permasalahan Pelanggan">
									<span class="icon-plus icon-white"></span>
								</button>
								<button type="button" class="btn btn-small addClientProblem">Permasalahan Pelanggan</button>
							</div>
						</div>
					</div>
					<table cellpadding="0" cellspacing="0" width="100%" class="table images tClientProblem" id="tClientProblem">
						<thead>
							<tr>
								<th width="">Keterangan</th>
								<th width="40">Actions</th>
							</tr>
						</thead>
						<tbody class='site'>
							<?php foreach($clientproblems as $problem){?>
							<tr myid="<?php echo $problem->id;?>">
								<td><a><?php echo $problem->problem;?></a></td>
								<td><a><span class="icon-remove pointer clientproblem_remove"></span></a></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<div class="toolbar bottom-toolbar clearfix">
						<div class="left">
						</div>
						<div class="right">
							Total : <span id="total_problem"></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Keterangan</div>
						<div class="span9">
							<textarea name="problems" id="problems" class="myeditor">
								<?php echo $obj->problems;?>
							</textarea>
						</div>
					</div>



				</div>
			</div>			
		</div>
<!-- START OF LIST PERANGKAT-->
		<div class="row-fluid">
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="toolbar nopadding-toolbar clearfix">
						<h4>Daftar Perangkat Pelanggan di PadiNET</h4>
					</div>
					<div class="toolbar clearfix">
						<div class="left">
							<div class="btn-group">
								<button type="button" class="btn btn-small btn-danger tip addClientDevice" title="Penambahan Penggunaan Internet">
									<span class="icon-plus icon-white"></span>
								</button>
								<button type="button" class="btn btn-small addClientDevice">Penambahan Perangkat</button>
							</div>
						</div>
					</div>
					<table cellpadding="0" cellspacing="0" width="100%" class="table images tClientDevice" id="tClientDevice">
						<thead>
							<tr>
								<th width="">Nama</th>
								<th width="">Keterangan</th>
								<th width="40">Actions</th>
							</tr>
						</thead>
						<tbody class='site'>
							<?php foreach($clientdevices as $device){?>
							<tr myid="<?php echo $device->id;?>">
								<td><a><?php echo $device->devicetype . " - " . $device->name;?></a></td>
								<td><a><?php echo $device->macaddress . " - " . $device->serialno;?></a></td>
								<td><a><span class="icon-remove pointer tclientdeviceremove"></span></a></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<div class="toolbar bottom-toolbar clearfix">
						<div class="left">
						</div>
						<div class="right">
							Total : <span id="total_clientdevice"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="span6 clearfix">
				<div class="block-fluid without-head">
					<div class="toolbar">
						<h4>Daftar perangkat PadiNET di Pelanggan</h4>
					</div>
					<div class="toolbar clearfix">
						<div class="left">
							<div class="btn-group">
								<button type="button" class="btn btn-small btn-danger tip addPadiNETDevice" title="Penambahan Penggunaan Internet">
									<span class="icon-plus icon-white"></span>
								</button>
								<button type="button" class="btn btn-small addPadiNETDevice">Penambahan Perangkat</button>
							</div>
						</div>
					</div>
					<table cellpadding="0" cellspacing="0" width="100%" class="table images tPadinetDevice" id="tPadinetDevice">
						<thead>
							<tr>
								<th width="">Nama</th>
								<th width="">Keterangan</th>
								<th width="40">Actions</th>
							</tr>
						</thead>
						<tbody class='site'>
							<?php foreach($padinetdevices as $device){?>
							<tr myid="<?php echo $device->id;?>">
								<td><a><?php echo $device->devicetype . " - " . $device->name;?></a></td>
								<td><a><?php echo $device->macaddress . " - " . $device->serialno;?></a></td>
								<td><a><span class="icon-remove pointer tpadinetdeviceremove"></span></a></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<div class="toolbar bottom-toolbar clearfix">
						<div class="left">
						</div>
						<div class="right">
							Total : <span id="total_padinetdevice"></span>
						</div>
					</div>
				</div>
			</div>			
		</div>
<!-- END OF LIST PERANGKAT-->
		<div class="row-fluid">
			<div class="span6 ">
				<div class="block-fluid without-head">
					<div class="toolbar">
						<h4>Tim EOS</h4>
					</div>
					<div class="toolbar clearfix">
						<div class="left">
							<div class="btn-group">
								<button type="button" class="btn btn-small btn-danger tip addEos" title="Penambahan Tim Eos">
									<span class="icon-plus icon-white"></span>
								</button>
								<button type="button" class="btn btn-small addEos">Penambahan Tim EOS</button>
							</div>
						</div>
					</div>
					<table cellpadding="0" cellspacing="0" width="100%" class="table images tEos" id="tEos">
						<thead>
							<tr>
								<th width="">Nama</th>
								<th width="40">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($eosteams as $eosteam){?>
							<tr myid="<?php echo $eosteam->id;?>">
								<td><a><?php echo $eosteam->name;?></a></td>
								<td><span class="icon-trash pointer teosremove"></span></a></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<div class="toolbar bottom-toolbar clearfix">
						<div class="left">
						</div>
						<div class="right">
							Total : <span id="total_padinetdevice"></span>
						</div>
					</div>
				</div>
			</div>		
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="toolbar nopadding-toolbar clearfix">
						<h4>Usulan VAS</h4>
					</div>
					<div class="toolbar clearfix">
						<div class="left">
							<div class="btn-group">
								<button type="button" class="btn btn-small btn-danger tip addVAS" title="Penambahan VAS">
									<span class="icon-plus icon-white"></span>
								</button>
								<button type="button" class="btn btn-small addVAS">Penambahan VAS</button>
							</div>
						</div>
					</div>
					<table cellpadding="0" cellspacing="0" width="100%" id="t_vas" class="table images t_vas">
						<thead>
							<tr>
								<th width="">Nama</th>
								<th width="40">Actions</th>
							</tr>
						</thead>
						<tbody class='site'>
							<?php foreach($maintenancereport_vas as $vas){?>
							<tr myid="<?php echo $vas->id;?>">
								<td><a><?php echo $vas->vas;?></a></td>
								<td><a><span class="icon-remove pointer vas_remove"></span></a></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<div class="toolbar bottom-toolbar clearfix">
						<div class="left">
						</div>
						<div class="right">
							Total : <span id="total_vas">2</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6 ">
				<div class="block-fluid without-head">
					<div class="toolbar">
						<h4>Request Pelanggan</h4>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Deskripsi</div>
						<div class="span9">
							<textarea name="clientrequest" id="clientrequest" class="myeditor">
								<?php echo $obj->clientrequest;?>
							</textarea>
						</div>
					</div>
					<div class="row-form clearfix" style="display:none">
						<div class="span3">Status</div>
						<div class="span9">
							<?php echo form_dropdown("mrstatus",$mrstatusarray,$obj->clientrequeststatus,"id=mrstatus");?>
						</div>
					</div>
				</div>
			</div>		
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="toolbar nopadding-toolbar clearfix">
						<h4>Kegiatan Di Lapangan</h4>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Deskripsi</div>
						<div class="span9">
							<textarea name="eosactivity" id="eosactivity" class="myeditor">
								<?php echo $obj->eosactivity;?>
							</textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="toolbar nopadding-toolbar clearfix">
						<h4>Upload Dokumen</h4>
						<span id="status" ></span>
					</div>
					<div class="toolbar clearfix paditablehead">
						<div class="left">
							<div class="btn-group">
								<button type="button" class="btn btn-small btn-danger tip btn_addimage" title="Tambah Gambar">
									<span class="icon-plus icon-white"></span>
								</button>
								<button type="button" class="btn btn-small btn_addimage">Penambahan Dokumen</button>
							</div>
						</div>
					</div>
					<table cellpadding="0" cellspacing="0" width="100%" class="table images gambar" id="tImage">
						<thead>
							<tr>
								<th width="30">Dokumen</th>
								<th width="20">Nama</th>
								<th width="60">Keterangan</th>
								<th width="30">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($images as $img){?>
							<tr class="rImage" myid=<?php echo $img->id;?>>
								<td class="image_path">
									<a class="fancyboxx" rel="groupx">
									<img src="<?php echo $img->image;?>" class="img-polaroidx prevImage" onclick="viewImage(this)" width=50 height=38 />
									</a>
								</td>
								<td class="info image_name"><a></a><span><?php echo $img->name;?></span></td>
								<td class="image_description"><?php echo $img->description;?></td>
								<td>
									<a><span class="icon-trash removemaintenanceimage"></span></a>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<div class="toolbar bottom-toolbar clearfix">
						<div class="left">
						</div>
						<div class="right">
							Total : <span id="total_image">1</span>
						</div>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="toolbar nopadding-toolbar clearfix">
						<h4>Upload Topologi</h4>
						<span id="status" ></span>
					</div>
					<div class="toolbar clearfix paditablehead">
						<div class="left">
							<div class="btn-group">
								<button type="button" class="btn btn-small btn-danger tip btn_addtopologi" title="Tambah Gambar Topologi">
									<span class="icon-plus icon-white"></span>
								</button>
								<button type="button" class="btn btn-small btn_addtopologi">Penambahan Topologi</button>
							</div>
						</div>
					</div>
					<table cellpadding="0" cellspacing="0" width="100%" class="table images gambar" id="tTopologi">
						<thead>
							<tr>
								<th width="30">Dokumen</th>
								<th width="20">Nama</th>
								<th width="60">Keterangan</th>
								<th width="30">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($topologi as $img){?>
							<tr class="rImage" myid=<?php echo $img->id;?>>
								<td class="image_path">
									<a class="fancyboxx" rel="groupx">
									<img src="<?php echo $img->image;?>" class="img-polaroidx prevImage" onclick="viewImage(this)" width=50 height=38 />
									</a>
								</td>
								<td class="info image_name"><a></a><span><?php echo $img->name;?></span></td>
								<td class="image_description"><?php echo $img->description;?></td>
								<td>
									<a><span class="icon-trash removemaintenancetopologiimage"></span></a>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<div class="toolbar bottom-toolbar clearfix">
						<div class="left">
						</div>
						<div class="right">
							Total : <span id="total_topologi">1</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	<script type="text/javascript" src="/js/padilibs/padi.dateTimes.js"></script>	
	<script type="text/javascript" src="/js/padilibs/padi.imagelib.js"></script>
	<script type='text/javascript' src='/js/aquarius/EOS/maintenancereport/add.js'></script>
	<script type='text/javascript' src='/js/aquarius/EOS/maintenancereport/images.js'></script>
	<script type='text/javascript' src='/js/aquarius/EOS/maintenancereport/vas.js'></script>
	<script type='text/javascript' src='/js/aquarius/EOS/maintenancereport/applications.js'></script>
	</body>
</html>
