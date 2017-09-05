<!DOCTYPE html>
<html lang="en">
	<style>
	#dAddWirelessRadio{
		width:1000px;
		margin-left: -450px;
	}
	</style>
<?php $this->load->view('adm/head')?>
<body>
	<?php $this->load->view('TS/troubleshoots/dialogs');?>
	<?php $this->load->view('adm/header');?>
	<?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Troubleshoot</a> <span class="divider">></span></li>
                <li class="active">Entry Report</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace">
            <input type="hidden" id="troubleshoot_id" name="troubleshoot_id" value="<?php echo $obj->id;?>">
            <input type="hidden" id="client_site_id" name="client_site_id" value="<?php echo $obj->client_site_id;?>" class="inp_router">
            <input type="hidden" id="createuser" name="createuser" value="<?php echo $this->session->userdata["username"];?>" class="iim inp_switch installrequest inp_router inp_apwifi inp_wireless inp_pccard inp_device">
            <input type="hidden" id="updateuser" name="updateuser" value="<?php echo $this->session->userdata["username"];?>" class="inp_router inp_apwifi inp_wireless inp_switch inp_pccard inp_device">
            <div class="block-fluid without-head">
				<div class="toolbar clearfix">
					<div class="left">
						<?php echo $obj->ticket->content;?>
					</div>
					<div class="right">
						<div class="btn-group">
							<button data-toggle="dropdown" class="btn dropdown-toggle">Simpan <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a id='btn_progress'>Progress</a></li>
								<li><a id='btn_monitoring'>Monitoring</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Kode Ticket</div>
							<div class="span9">
								<?php echo $obj->ticket->kdticket;?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Tgl Troubleshoot</div>
							<div class="span5">
								<input type="text" name="troubleshoot_date" value="" class="datepicker inp_troubleshoot" id='troubleshoot_date' />
							</div>
							<div class="span2">
								<?php echo form_dropdown('hour',$hours,0,'id="hour1" parent="troubleshoot_date" class="dttime"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('minute',$minutes,0,'id="minute1" grandparent="troubleshoot_date" class="dttime"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">s/d</div>
							<div class="span5">
								<input type="text" name="troubleshoot_date2" value="" class="datepicker inp_troubleshoot" id='troubleshoot_date2' />
							</div>
							<div class="span2">
								<?php echo form_dropdown('hour',$hours,0,'id="hour2" parent="troubleshoot_date2" class="dttime"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('minute',$minutes,0,'id="minute2" grandparent="troubleshoot_date2" class="dttime"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama Pelanggan</div>
							<div class="span9">
								<?php
									if($obj->troubleshoottype==='pelanggan'){
										echo $obj->client_site->client->name;
									}else{
										echo $obj->nameofmtype;
									}
								?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Keluhan</div>
							<div class="span9">
								<?php echo $obj->complaint;?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Kegiatan di lokasi</div>
							<div class="span9">
								<textarea id='activities' name='activities' class='myeditor' value='test'><?php echo $obj->activities?></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Layanan</div>
							<div class="span9">
								<?php echo $obj->services->name;?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Alamat</div>
							<div class="span9">
								<?php
									if($obj->troubleshoottype==='pelanggan'){
										echo $obj->client_site->client->address;
									}else{
										echo $obj->address;
									} 
								?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Kota</div>
							<div class="span9">
								<?php 
									if($obj->troubleshoottype==='pelanggan'){
										echo $obj->client_site->client->city;
									}else{
										echo '';
									}
								
								?>
							</div>
						</div>
					</div>
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Kesimpulan</div>
							<div class="span9">
								<textarea id="resume" class="myeditor">
									<?php echo $obj->resume;?>
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
							<h4>Router</h4>
						</div>
						<div class="toolbar clearfix paditablehead">
							<div class="left">
								<div class="btn-group">
									<button type="button" class="btn btn-small btn-danger tip btn_addrouter" title="Tambah Router">
										<span class="icon-plus icon-white"></span>
									</button>
									<button type="button" class="btn btn-small tip btn_addrouter">Penambahan Router</button>
								</div>
							</div>
							<div class="right">
								<div class="btn-group">
									<button type="button" class="btn btn-small btn-success tt btnCurrentRouter" title="Tampilkan Router yg Ada">
										<span class="icon-ok-sign"></span>
									</button>
									<button type="button" class="btn btn-small btn-link tt btnWithdrawnRouter" title="Tampilkan Router yg Ditarik">
										<span class="icon-remove-sign"></span>
									</button>
								</div>
							</div>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="table images " id="tRouter">
							<thead>

							</thead>
							<tbody>
							</tbody>
						</table>
						<div class="toolbar bottom-toolbar clearfix">
							<div class="left">
							</div>
							<div class="right">
								<span id="total_router">Total : 0</span>
							</div>
						</div>
					</div>
					<div class="block-fluid without-head">
						<div class="toolbar nopadding-toolbar clearfix">
							<h4>AP Wifi</h4>
						</div>
						<div class="toolbar clearfix paditablehead">
							<div class="left">
								<div class="btn-group">
									<button type="button" class="btn btn-small btn-danger tip btn_addapwifi" title="Tambah APWifi"><span class="icon-plus icon-white"></span></button>
									<button type="button" class="btn btn-small btn_addapwifi">Penambahan AP Wifi</button>
								</div>
							</div>
							<div class="right">
								<div class="btn-group">
									<button type="button" class="btn btn-small btn-success tt btnCurrentApwifi" title="Tampilkan AP Wifi yg Ditarik">
										<span class="icon-ok-sign"></span>
									</button>
									<button type="button" class="btn btn-small btn-link tt btnWithdrawnApwifi" title="Tampilkan AP Wifi yg Aktif">
										<span class="icon-remove-sign"></span>
									</button>
								</div>
							</div>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="table ap_wifi" id="tApwifi">
							<thead>
							</thead>
							<tbody>
							</tbody>
						</table>
						<div class="toolbar bottom-toolbar clearfix">
							<div class="left">
							</div>
							<div class="right">
								<span id='total_apwifi'></span>
							</div>
						</div>
					</div>



					<div class="block-fluid without-head">
						<div class="toolbar nopadding-toolbar clearfix">
							<h4>Gambar Troubleshoots</h4>
							<span id="status" ></span>
						</div>
						<div class="toolbar clearfix paditablehead">
							<div class="left">
								<div class="btn-group">
									<button type="button" class="btn btn-small btn-danger tip btn_addtroubleshootimage" title="Tambah Gambar"><span class="icon-plus icon-white"></span></button>
									<button type="button" class="btn btn-small btn_addtroubleshootimage">Penambahan Gambar Troubleshoots</button>
								</div>
							</div>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="table images gambar" id="tImage">
							<thead>
								<tr>
									<th width="30">Gambar</th>
									<th width="20">Nama</th>
									<th width="60">Keterangan</th>
									<th width="30">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($obj->troubleshoot_image->order_by("roworder","asc")->get() as $image){?>
								<tr class="rImage" image_id='<?php echo $image->id;?>' >
									<td class="image_path">
										<a class="fancyboxx" rel="groupx">
										<img src="<?php echo $image->img?>" class="img-polaroidx prevImage" onclick="viewImage(this)" width=50 height=38 />
										</a>
									</td>
									<td class="info image_name"><a><?php echo $image->name;?></a><span><?php echo $image->create_date;?></span></td>
									<td class="image_description"><?php echo $image->description;?></td>
									<td>
										<a><span class="icon-remove removetroubleshootimage"></span></a>
										<a><span class="icon-arrow-up switchup pointer"></span></a>
										<a><span class="icon-arrow-down switchdown pointer"></span></a>
										<a><span class="icon-pencil imageedit pointer"></span></a>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
						<div class="toolbar bottom-toolbar clearfix">
							<div class="left">
							</div>
							<div class="right">
								Total : <span id="total_image"><?php echo $obj->troubleshoot_image->count();?></span>
							</div>
						</div>
					</div>
					<div class="block-fluid without-head">
						<div class="toolbar nopadding-toolbar clearfix">
							<h4>Petugas</h4>
							<span id="status" ></span>
						</div>
						<div class="toolbar clearfix paditablehead">
							<div class="left">
								<div class="btn-group">
									<button type="button" class="btn btn-small btn-danger tip btn_addofficer" title="Tambah Petugas"><span class="icon-plus icon-white"></span></button>
									<button type="button" class="btn btn-small btn_addofficer">Penambahan Petugas</button>
								</div>
							</div>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="table officer" id="tOfficer">
							<thead>
								<tr>
									<th width="30">Gambar</th>
									<th width="20">Nama</th>
									<th width="30">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($obj->troubleshoot_officer as $image){?>
								<tr class="rImage" officer_id='<?php echo $image->id;?>' >
									<td class="image_path">
										<a class="fancyboxx" rel="groupx">
										<img src="<?php echo getfieldbyusername($image->name,'pic');?>" class="img-polaroidx prevImage" onclick="viewImage(this)" width=50 height=38 />
										</a>
									</td>
									<td class="info image_name"><a><?php echo $image->name;?></a><span><?php echo $image->create_date;?></span></td>
									<td>
										<a><span class="icon-remove removeofficer"></span></a>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
						<div class="toolbar bottom-toolbar clearfix">
							<div class="left">
							</div>
							<div class="right">
								Total : <span id="total_officer"><?php echo $obj->troubleshoot_officer->count();?></span>
							</div>
						</div>
					</div>






				</div>
				<div class="span6">
				<div class="block-fluid without-head">
					<div class="toolbar nopadding-toolbar clearfix">
						<h4>Wireless Boards</h4>
					</div>
					<div class="toolbar clearfix paditablehead">
						<div class="left">
							<div class="btn-group">
								<button type="button" class="btn btn-small btn-danger tip btn_addwirelessradio" title="Add"><span class="icon-plus icon-white"></span></button>
								<button type="button" class="btn btn-small btn_addwirelessradio">Penambahan Wireless Boards</button>
							</div>
						</div>
						<div class="right">
							<div class="btn-group">
								<button type="button" class="btn btn-small btn-success ttLT btnCurrentWirelessradio" title="Tampilkan Wirelessradio yg Ditarik">
									<span class="icon-ok-sign"></span>
								</button>
								<button type="button" class="btn btn-small btn-link ttLT btnWithdrawnWirelessradio" title="Tampilkan Wirelessradio yg Aktif">
									<span class="icon-remove-sign"></span>
								</button>
							</div>
						</div>
					</div>
					<table cellpadding="0" cellspacing="0" width="100%" class="table images" id="tWirelessradio">
						<thead>
							<tr>
								<th width="60">Tipe</th>
								<th>Keterangan</th>
								<th width="80">ESSID</th>
								<th width="40"><span class="icon-th-large"></span></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
					<div class="toolbar bottom-toolbar clearfix">
						<div class="left">
						</div>
						<div class="right">
							<span id="total_wirelessradio"></span>
						</div>
					</div>
				</div>

				<div class="block-fluid without-head">
					<div class="toolbar nopadding-toolbar clearfix">
						<h4>Switch</h4>
					</div>
					<div class="toolbar clearfix paditablehead">
						<div class="left">
							<div class="btn-group">
								<button type="button" class="btn btn-small btn-danger tip btn_addswitch" title="Add"><span class="icon-plus icon-white"></span></button>
								<button type="button" class="btn btn-small btn_addswitch">Penambahan Switch</button>
							</div>
						</div>
						<div class="right">
							<div class="btn-group">
								<button type="button" class="btn btn-small btn-success ttLT btnCurrentSwitch" title="Tampilkan Switch yg Aktif">
									<span class="icon-ok-sign"></span>
								</button>
								<button type="button" class="btn btn-small btn-link ttLT btnWithdrawnSwitch" title="Tampilkan Switch yg Ditarik">
									<span class="icon-remove-sign"></span>
								</button>
							</div>
						</div>
					</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="table images" id="tSwitch">
							<thead>
								<tr>
									<th width="60">Tipe</th>
									<th width="40">Keterangan</th>
									<th width="10"><span class="icon-th-large"></span></th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						<div class="toolbar bottom-toolbar clearfix">
							<div class="left">
							</div>
							<div class="right">
								<span id="total_switch"></span>
							</div>
						</div>
					</div>
					<div class="block-fluid without-head">
						<div class="toolbar nopadding-toolbar clearfix">
							<h4>Mini PCI</h4>
						</div>
						<div class="toolbar clearfix paditablehead">
							<div class="left">
								<div class="btn-group">
									<button type="button" class="btn btn-small btn-danger tip btn_addpccard" title="Add"><span class="icon-plus icon-white"></span></button>
									<button type="button" class="btn btn-small btn_addpccard">Penambahan Mini PCI</button>
								</div>
							</div>
							<div class="right">
								<div class="btn-group">
									<button type="button" class="btn btn-small btn-success ttLT btnCurrentPccard" title="Tampilkan Pccard yg Aktif">
										<span class="icon-ok-sign"></span>
									</button>
									<button type="button" class="btn btn-small btn-link ttLT btnWithdrawnPccard" title="Tampilkan Pccard yg Ditarik">
										<span class="icon-remove-sign"></span>
									</button>
								</div>
							</div>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="table images" id="tPccard">
							<thead>
								<tr>
									<th width="60">Nama</th>
									<th>Mac Address</th>
									<th width="40"><span class="icon-th-large"></span></th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						<div class="toolbar bottom-toolbar clearfix">
							<div class="left">
							</div>
							<div class="right">
								<span id="total_pccard"></span>
							</div>
						</div>
					</div>
					<div class="block-fluid without-head">
						<div class="toolbar nopadding-toolbar clearfix">
							<h4>Peralatan Lainnya</h4>
						</div>
						<div class="toolbar clearfix paditablehead">
							<div class="left">
								<div class="btn-group">
									<button type="button" class="btn btn-small btn-danger tip btn_adddevice" title="Add"><span class="icon-plus icon-white"></span></button>
									<button type="button" class="btn btn-small btn_adddevice">Penambahan Peralatan Lainnya</button>
								</div>
							</div>
							<div class="right">
								<div class="btn-group">
									<button type="button" class="btn btn-small btn-success ttLT btnCurrentDevice" title="Tampilkan Peralatan yg Aktif">
										<span class="icon-ok-sign"></span>
									</button>
									<button type="button" class="btn btn-small btn-link ttLT btnWithdrawnDevice" title="Tampilkan Peralatan yg Ditarik">
										<span class="icon-remove-sign"></span>
									</button>
								</div>
							</div>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="table images" id="tDevice">
							<thead>
							</thead>
							<tbody>
							</tbody>
						</table>
						<div class="toolbar bottom-toolbar clearfix">
							<div class="left">
							</div>
							<div class="right">
								<span id="total_device"></span>
							</div>
						</div>
					</div>

                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Material Terpakai</h4>
                        </div>
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip btn_addmaterial" title="Tambah Material"><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn_addmaterial">Penambahan Material</button>
                                </div>
                            </div>
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="table tbl_usedmaterial" id="tbl_usedmaterial">
                            <thead>
                                <tr>
                                    <th width="30%">Tipe</th>
                                    <th width="30%">Nama</th>
                                    <th width="30%">Keterangan</th>
                                    <th width="10%"><span class="icon-th-large"></span></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->troubleshoot_material as $material){?>
                                <tr thisid="<?php echo $material->id;?>">
                                    <td><?php echo $material->tipe;?></td>
                                    <td class="info"><a><?php echo $material->name;?></a> </td>
                                    <td><?php echo $material->description;?></td>
                                    <td>
										<a><span class="icon-trash remove_material pointer" material_id="<?php echo $material->id; ?>" ></span></a>
									</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>
                            <div class="right">
								Total : <span id='total_material'><?php echo $obj->troubleshoot_material->count();?></span>
                            </div>
                        </div>
                    </div>
					
				</div>
			</div>
        </div>
	</div>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/troubleshoothelper.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/router.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/apwifi.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/wirelessradio.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/switch.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/minipci.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/other_device.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/officers.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/entry_report.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/images.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/materials.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/padilibs/padi.imagelib.js'></script>
</body>
</html>
