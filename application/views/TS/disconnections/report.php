<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div class="header">
        <a class="logo" href="/"><img src="/img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="/">PadiApp</a> <span class="divider">></span></li>
                <li><a href="/disconnections">Disconnection</a> <span class="divider">></span></li>
                <li class="active">Entri Report</li>
            </ul>
        </div>
        <div class="workplace" user_id='<?php echo $obj->id;?>'>
        <input id="disconnection_id" type="hidden" value="<?php echo $this->uri->segment(3);?>" />
        <input id="client_site_id" type="hidden" class="inp_disconnection" name="client_site_id" value="<?php echo $obj->client_site_id;?>" />
        <input id="createuser" type="hidden" value="<?php echo $this->ionuser->username;?>" name="createuser" class="inp_disconnection" />
        <input type='hidden' id='disconnectiontype' value='<?php echo $obj->disconnectiontype;?>' />
        <?php
        ?>
		<div class="row-fluid"><div class="span12"><div class="head clearfix">
			<div class="left">
				<h1><?php echo $dtype . " " . $obj->client->name;?>, Jadwal Pemutusan: <?php echo $obj->executiondate;?></h1>
			</div>
			<div class="right">
				<ul class="buttons">
					<li><span class="isw-save" id="disconnectionbtnsave" title="simpan"></span></li>
				</ul>
            </div>
		</div>
		</div>
		</div>
            <div class="row-fluid">
                <div class="span6">
					<div class="block-fluid without-head">
						<div class="toolbar nopadding-toolbar clearfix">
							<h4>Switch</h4>
							<span id="status" ></span>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSwitch">
							<thead>
								<tr>
									<th width="20">Nama</th>
									<th width="60">Keterangan</th>
									<th width="30">Kondisi</th>
									<th width="30">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($switches as $ob){?>
								<tr myid='<?php echo $ob->id;?>' >
									<td class="info image_name"><a><?php echo $ob->name;?></a>
                                        <span><?php echo $ob->description;?></span>
                                    </td>
									<td class="image_description"><?php echo $ob->mac;?></td>
									<td><input class="ele" type="checkbox"> Baik</td>
									<td>
										<a><span class="<?php echo $ob->deviceclass?> removeswitch"></span></a>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
						<div class="toolbar bottom-toolbar clearfix">
							<div class="left">
							</div>
							<div class="right">
								Total : <span id="total_switch">0</span>
							</div>
						</div>
					</div>
                </div>
                <div class="span6">
					<div class="block-fluid without-head">
						<div class="toolbar nopadding-toolbar clearfix">
							<h4>PC Card</h4>
							<span id="status" ></span>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tPccard">
							<thead>
								<tr>
									<th width="20">Nama</th>
									<th width="60">Keterangan</th>
									<th width="30">Kondisi</th>
									<th width="30">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($pccards as $ob){?>
								<tr myid='<?php echo $ob->id;?>' >
									<td class="info image_name"><a><?php echo $ob->name;?></a>
                                        <span><?php echo $ob->description;?></span>
                                    </td>
									<td class="image_description"><?php echo $ob->macaddress;?></td>
									<td><input class="ele" type="checkbox"> Baik</td>
									<td>
										<a><span class="<?php echo $ob->deviceclass?> removepccard"></span></a>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
						<div class="toolbar bottom-toolbar clearfix">
							<div class="left">
							</div>
							<div class="right">
								Total : <span id="total_pccard">0</span>
							</div>
						</div>
					</div>                        
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="toolbar nopadding-toolbar clearfix">
							<h4>Wireless Radio</h4>
							<span id="status" ></span>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tWirelessradio">
							<thead>
								<tr>
									<th width="20">Tipe</th>
									<th width="60">Macboard</th>
									<th>Kondisi</th>
									<th width="30">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($wireless_radios as $ob){?>
								<tr myid='<?php echo $ob->id;?>' >
									<td class="info image_name"><a><?php echo $ob->tipe;?></a>
										<span><?php echo $ob->macboard;?></span>
									</td>
									<td class="image_description"><?php echo $ob->macboard;?></td>
									<td>
										<div>
										<label class="switch">
											<input class="ele" type="checkbox"> Baik
											<div class="sliderx round"></div>
										</label>
										</div>
									</td>
									<td>
										<a><span class="<?php echo $ob->deviceclass?> removeWirelessradio"></span></a>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
						<div class="toolbar bottom-toolbar clearfix">
							<div class="left">
							</div>
							<div class="right">
								Total : <span id="total_wirelessradio">0</span>
							</div>
						</div>
					</div>
				</div>
                <div class="span6">
					<div class="block-fluid without-head">
						<div class="toolbar nopadding-toolbar clearfix">
							<h4>Peralatan</h4>
							<span id="status" ></span>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tDevice">
							<thead>
								<tr>
									<th width="20">Nama</th>
									<th width="60">Lokasi</th>
									<th width=30>Kondisi</th>
									<th width="30">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($devices as $ob){?>
								<tr myid='<?php echo $ob->id;?>' >
									<td class="info image_name"><a><?php echo $ob->name;?></a>
                                        <span><?php echo $ob->devicetype;?></span>
                                    </td>
									<td class="image_description"><?php echo $ob->location;?></td>
									<td><input class="ele" type="checkbox"> Baik</td>
									<td>
										<a><span class="<?php echo $ob->deviceclass?> removedevice"></span></a>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
						<div class="toolbar bottom-toolbar clearfix">
							<div class="left">
							</div>
							<div class="right">
								Total : <span id="total_device">0</span>
							</div>
						</div>
					</div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
					<div class="block-fluid without-head">
						<div class="toolbar nopadding-toolbar clearfix">
							<h4>AP Wifi</h4>
							<span id="status" ></span>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tApwifi">
							<thead>
								<tr>
									<th width="20">Nama</th>
									<th width="60">Lokasi</th>
									<th width=30>Kondisi</th>
									<th width="30">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($apwifis as $ob){?>
								<tr myid='<?php echo $ob->id;?>' >
									<td class="info image_name"><a><?php echo $ob->tipe;?></a>
                                        <span><?php echo $ob->macboard;?></span>
                                    </td>
									<td class="image_description"><?php echo $ob->location;?></td>
									<td><input class="ele" type="checkbox"> Baik</td>
									<td>
										<a><span class="<?php echo $ob->deviceclass?> removeapwifi"></span></a>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
						<div class="toolbar bottom-toolbar clearfix">
							<div class="left">
							</div>
							<div class="right">
								Total : <span id="total_apwifi">0</span>
							</div>
						</div>
					</div>
                </div>
                <div class="span6">
					<div class="block-fluid without-head">
						<div class="toolbar nopadding-toolbar clearfix">
							<h4>Router</h4>
							<span id="status" ></span>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tRouter">
							<thead>
								<tr>
									<th width="20">Nama</th>
									<th width="60">Lokasi</th>
									<th width=30>Kondisi</th>
									<th width="30">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($routers as $ob){?>
								<tr myid='<?php echo $ob->id;?>' >
									<td class="info image_name"><a><?php echo $ob->tipe;?></a>
                                        <span><?php echo $ob->macboard;?></span>
                                    </td>
									<td class="image_description"><?php echo $ob->location;?></td>
									<td><input class="ele" type="checkbox"> Baik</td>
									<td>
										<a><span class="<?php echo $ob->deviceclass?> removerouter"></span></a>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
						<div class="toolbar bottom-toolbar clearfix">
							<div class="left">
							</div>
							<div class="right">
								Total : <span id="total_router">0</span>
							</div>
						</div>
					</div>
                </div>
            </div>

        </div>
    </div>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/disconnections/report.js'></script>
</body>
</html>
