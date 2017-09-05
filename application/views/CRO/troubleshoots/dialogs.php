<div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Konfirmasi</h3>
	</div>
	<div class="modal-body">
	<p>Data telah tersimpan.</p>
	</div>
</div>
<div id="dConfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Konfirmasi</h3>
	</div>
	<div class="modal-body">
	<p>Akan menghapus, anda yakin ?</p>
	</div>
	<div class="modal-footer">
	<button class="btn btn-warning closemodal" type="button" id='yesButton'>Hapus</button>
	<button class="btn closemodal" type="button">Tutup</button>
	</div>
</div>
<div id="dWithdraw" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myWithdrawLabel">Konfirmasi Penarikan Perangkat</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Nama Perangkat</div>
						<div class="span9">
							<span id="deviceName"></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Tipe Perangkat</div>
						<div class="span9">
							<span id="deviceType"></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Status</div>
						<div class="span9">
							<?php echo form_dropdown("status",array("1"=>"Baik","0"=>"Rusak"),0,'id="status" class="" type="selectid"');?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-warning closemodal" type="button" id='removeDeviceBtn'>Tarik</button>
			<button class="btn closemodal" type="button">Batalkan</button>
		</div>
	</div>
</div>
<div id="dAddRouter" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="routerModalLabel">Penambahan Router</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
		<div class="span6">
			<div class="block-fluid without-head">
				<div class="row-form clearfix">
					<div class="span3">Pemilik</div>
						<div class="span9">
						<?php echo form_dropdown("milikpadinet",array("1"=>"PadiNET","0"=>"Pelanggan"),0,'id="pemilik_router" class="inp_router" type="selectid"');?>
					</div>
				</div>
				<div class="row-form clearfix" id="router_pelanggan">
					<div class="span3">Tipe</div>
					<div class="span9">
					<?php echo form_input("tipe","",'id="tipe_router_pelanggan"');?>
					</div>
				</div>
				<div class="row-form clearfix" id="router_padinet">
					<div class="span3">Tipe</div>
					<div class="span9">
					<?php echo form_dropdown("tipe",$routersboards,0,'id="tipe_router" type="select" class="inp_router"');?>
					</div>
				</div>
				<div class="row-form clearfix">
					<div class="span3">MacBoard</div>
					<div class="span9"><input type="text" name="macboard" id="macboard_router" value="" class="inp_router"/></div>
				</div>
				<div class="row-form clearfix">
					<div class="span3">IP Public</div>
					<div class="span9"><input type="text" name="ip_public" id="ip_public_router" value="" class="inp_router"/></div>
				</div>
				<div class="row-form clearfix">
					<div class="span3">IP Private</div>
					<div class="span9"><input type="text" name="ip_private" id="ip_private_router" value="" class="inp_router"/></div>
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="block-fluid without-head">
				<div class="row-form clearfix">
					<div class="span3">User</div>
					<div class="span9"><input type="text" name="user" id="user_router" value="" class="inp_router"/></div>
				</div>
				<div class="row-form clearfix">
					<div class="span3">Password</div>
					<div class="span9"><input type="text" name="password" id="password_router" value="" class="inp_router"/></div>
				</div>
				<div class="row-form clearfix">
					<div class="span3">Location</div>
					<div class="span9"><input type="text" name="location" id="location_router" value="" class="inp_router"/></div>
				</div>
				<div class="row-form clearfix">
					<div class="span3">Serial No</div>
					<div class="span9"><input type="text" name="serialno" id="serialno_router" value="" class="inp_router"/></div>
				</div>
				<div class="row-form clearfix">
					<div class="span3">Barcode</div>
					<div class="span9"><input type="text" name="barcode" id="barcode_router" value="" class="inp_router"/></div>
				</div>
			</div>
		</div>
		</div>
		<div class="footer">
			<button class="btn closemodal saverouter" type="button" id='saverouter'>Simpan</button>
			<button class="btn closemodal updaterouter" type="button" id='updaterouter'>Update</button>
			<button class="btn closemodal" type="button">Tutup</button>
		</div>
	</div>
</div>
<div id="dAddAPWifi" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="wifiModalLabel">Penambahan AP Wifi</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Tipe</div>
							<div class="span9">
							<?php echo form_dropdown('tipe',$apwifis,0,'id="tipe_apwifi" class="inp_apwifi" type="select"');?>
							</div>
						</div>
					<div class="row-form clearfix">
						<div class="span3">MacBoard</div>
						<div class="span9"><input type="text" name="macboard" id="macboard_apwifi" value="" class="inp_apwifi"/></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">IP Address</div>
						<div class="span9"><input type="text" name="ip_address" id="ip_address_apwifi" value="" class="inp_apwifi"/></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">ESS ID</div>
						<div class="span9"><input type="text" name="essid" id="essid_apwifi" value="" class="inp_apwifi"/></div>
					</div>
					<div class="row-form clearfix">
					<div class="span3">Owner</div>
					<div class="span9"><input type="text" name="owner" id="owner_apwifi" value="" class="inp_apwifi"/></div>
				</div>
				</div>
			</div>
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Security Key</div>
						<div class="span9"><input type="text" name="security_key" id="security_key_apwifi" value="" class="inp_apwifi"/></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">User</div>
						<div class="span9"><input type="text" name="user" id="user_apwifi" value="" class="inp_apwifi"/></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Password</div>
						<div class="span9"><input type="text" name="password" id="password_apwifi" value="" class="inp_apwifi"/></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Location</div>
						<div class="span9"><input type="text" name="location" id="location_apwifi" value="" class="inp_apwifi"/></div>
					</div>
				</div>
					
			</div>
		
		</div>
		<div class="footer">
			<button class="btn closemodal savewifi" type="button" id='savewifi'>Simpan</button>
			<button class="btn closemodal updatewifi" type="button" id='updatewifi'>Update</button>
			<button class="btn closemodal" type="button">Tutup</button>
		</div>
	</div>
	
</div>
<div id="dAddWirelessRadio" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="wirelessModalLabel">Penambahan Wireless Board</h3>
	</div>
	<div class="modal-body">
	<div class="row-fluid">
	<div class="span3">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
	Tipe
	<div class="span12">
	<?php echo form_dropdown('tipe',$boards,'','id="tipe_wireless_radio" class="inp_wireless" type="select"');?>
	</div>
	</div>
	<div class="row-form clearfix">
	MacBoard
	<div class="span12"><input type="text" name="macboard" id="macboard_wireless_radio"  class="inp_wireless"value=""/></div>
	</div>
	<div class="row-form clearfix">
	Polarisasi
	<div class="span12">
	<?php echo form_dropdown('polarization',array('vertical'=>'vertical','horizontal'=>'horizontal'),'','id="polarization_wireless_radio" class="inp_wireless" type="select"');?>
	</div>
	</div>
	<div class="row-form clearfix">
	Noise
	<div class="span12">
	<input type="text" name="noise" id="noise"  class="inp_wireless"value=""/>
	</div>
	</div>
	</div>
	</div>
	<div class="span3">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
	BTS
	<div class="span12">
	<?php echo form_dropdown('bts_wireless_radio',$btstowers,'','id="bts_wireless_radio" class="" type="select"');?>
	</div>
	</div>
	<div class="row-form clearfix">
	IP AP
	<div class="span12">
	<?php echo form_dropdown('ip_ap',array(),'','id="ip_ap_wireless_radio" class="inp_wireless" type="select"');?>
	</div>
	</div>
	<div class="row-form clearfix">
	IP Radio
	<div class="span12"><input type="text" name="ip_radio" id="ip_radio_wireless_radio" class="inp_wireless" value=""/></div>
	</div>
	<div class="row-form clearfix">
	IP Ethernet
	<div class="span12">
	<input type="text" name="ip_ethernet" id="ip_ethernet_wireless_radio" class="inp_wireless" value=""/>
	</div>
	</div>
	</div>
	</div>
	<div class="span3">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
	Kualitas/CCQ
	<div class="span12"><input type="text" name="quality" id="quality_wireless_radio" class="inp_wireless" value=""/></div>
	</div>
	<div class="row-form clearfix">
	Frekwensi
	<div class="span12"><input type="text" name="freqwency" id="freqwency_wireless_radio" class="inp_wireless" value=""/></div>
	</div>
	<div class="row-form clearfix">
	Throughput UDP
	<div class="span12"><input type="text" name="throughput_udp" id="troughput_udp_wireless_radio" class="inp_wireless" value=""/></div>
	</div>
	<div class="row-form clearfix">
	Throughput TCP
	<div class="span12"><input type="text" name="throughput_tcp" id="troughput_tcp_wireless_radio" class="inp_wireless" value=""/></div>
	</div>
	</div>
	</div>
	<div class="span3">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
	EssId
	<div class="span12"><input type="text" name="essid" id="essid_wireless_radio" class="inp_wireless" value=""/></div>
	</div>
	<div class="row-form clearfix">
	User
	<div class="span12">
	<input type="text" name="user" id="user_wireless_radio" class="inp_wireless" value=""/>
	</div>
	</div>
	<div class="row-form clearfix">
	Passwd
	<div class="span12">
	<input type="text" name="password" id="password_wireless_radio" class="inp_wireless" value=""/>
	</div>
	</div>
	<div class="row-form clearfix">
	Sinyal
	<div class="span12"><input type="text" name="signal" id="signal_wireless_radio" class="inp_wireless" value=""/></div>
	</div>
	</div>
	</div>
	</div>
	<div class="footer">
		<button class="btn closemodal savewr" type="button" id='savewirelessradio'>Simpan</button>
		<button class="btn closemodal updatewr" type="button" id='updatewirelessradio'>Update</button>
		<button class="btn closemodal" type="button">Tutup</button>
	</div>
	</div>
</div>
<div id="dAddSwitch" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="switchModalLabel">Penambahan Switch</h3>
	</div>
	<div class="modal-body">
	<div class="row-fluid">
	<div class="span6">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
	<div class="span6">Nama</div>
	<div class="span6">
	<?php echo form_dropdown("name",$switches,"0","id='switchname' class='inp_switch' type='select'");?>
	</div>
	</div>
	<div class="row-form clearfix">
	<div class="span6">Jumlah Port</div>
	<div class="span6">
	<?php echo form_dropdown("port",$ports,"0",'id="switchport" class="inp_switch" type="select"');?>
	</div>
	</div>
	</div>
	</div>
	<div class="span6">
	<div class="block-fluid without-head">
		<div class="row-form clearfix">
			<div class="span6">Is managed</div>
			<div class="span6">
			<?php echo form_dropdown('ismanaged',array("1"=>"Ya","0"=>"Tidak"),0,'id="ismanaged" class="inp_switch" type="selectid"');?>
			</div>
		</div>
		<div class="row-form clearfix switch_user">
			<div class="span6">User</div>
			<div class="span6"><input type="text" name="user" id="switchuser" value="" class="inp_switch"/></div>
		</div>
		<div class="row-form clearfix switch_password">
			<div class="span6">Password</div>
			<div class="span6"><input type="text" name="password" id="switchpassword" value="" class="inp_switch"/></div>
		</div>
	</div>
	</div>
	</div>
	<div class="footer">
		<button class="btn closemodal saveswitch" type="button" id='saveswitch'>Simpan</button>
		<button class="btn closemodal updateswitch" type="button" id='updateswitch'>Update</button>
		<button class="btn closemodal" type="button">Tutup</button>
	</div>
	</div>
</div>
<div id="dAddPccard" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="pccardModalLabel">Penambahan Mini PCI</h3>
	</div>
	<div class="modal-body">
	<div class="row-fluid">
	<div class="span6">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
	<div class="span3">Tipe</div>
	<div class="span9">
	<?php echo form_dropdown('name',$pccards,0,'id="pccards" class="inp_pccard" type="select"');?>
	</div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">MacAddress</div>
	<div class="span9"><input type="text" name="macaddress" id="pccard_macaddress"  class="inp_pccard" value=""/></div>
	</div>
	</div>
	</div>
	</div>
	<div class="footer">
	<button class="btn closemodal savepccard" type="button" id='savepccard'>Simpan</button>
	<button class="btn closemodal updatepccard" type="button" id='updatepccard'>Update</button>
	<button class="btn closemodal" type="button">Tutup</button>
	</div>
	</div>
</div>
<div id="dAddDevice" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="deviceModalLabel">Penambahan Peralatan Lainnya</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Tipe</div>
						<div class="span9">
						<?php echo form_dropdown('devicetype',$antennas,0,'id="devicetype" class="inp_device" type="select"');?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Lokasi</div>
						<div class="span9"><input type="text" name="location" id="device_location" value="" class="inp_device"/></div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<button class="btn closemodal" type="button" id='savedevice'>Simpan</button>
			<button class="btn closemodal" type="button" id='updatedevice'>Update</button>
			<button class="btn closemodal" type="button">Tutup</button>
		</div>
	</div>
</div>
<div id="dUsedMaterial" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Material Terpakai</h3>
	</div>
	<div class="modal-body">
	<div class="row-fluid">
	<div class="span12">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
	<div class="span3">Jenis</div>
	<div class="span9">
	<?php echo form_dropdown("materialtype",$materialtypes,"","id='materialtype'");?>
	</div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">Nama</div>
	<div class="span9">
	<?php echo form_dropdown("usedmaterial",$materials,"","id='usedmaterial'");?>
	</div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">Keterangan</div>
	<div class="span9">
	<?php echo form_textarea("usedmaterialdescription","","id='usedmaterialdescription'");?>
	</div>
	</div>
	</div>
	</div>
	<div class="footer">
	<button class="btn closemodal saveusedmaterial" type="button" id='saveusedmaterial'>Simpan</button>
	<button class="btn closemodal updateusedmaterial" type="button" id='updateusedmaterial'>Update</button>
	<button class="btn closemodal" type="button">Tutup</button>
	</div>
	</div>
	</div>
</div>
<div id="dAddOfficer" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="officerModalLabel">Penambahan Petugas</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">


			<div class="span12">
			<div class="block gallery clearfix">
			<div class="block thumbas clearfix">
			<?php foreach(User::get_user_by_group('TS') as $user){?>
			<div class="thumbnail petugasTroubleshoot pointer userpic" officer_name="<?php echo $user->username;?>" surveyor_email="<?php echo $user->email;?>">
			<div class="imageholder">
			<img src="<?php echo $user->pic;?>" width="50" height="50" />
			</div>
			<div class="caption">
			<?php echo $user->username;?>
			</div>
			</div>
			<?php }?>
			</div>
			</div>
			</div>
			
			
			
		</div>
		<div class="footer">
			<button class="btn closemodal" type="button" id='saveOfficer'>Simpan</button>
			<button class="btn closemodal" type="button" id='updateOfficer'>Update</button>
			<button class="btn closemodal" type="button">Tutup</button>
		</div>
	</div>
</div>
<div id="dAddTroubleshootImage" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalImageLabel">Penambahan Gambar Troubleshoots</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">File</div>							
						<div class="span9">
							<img id="output" width=200 height=200>
							<input type="file" id="addImage" onchange="uploadImage(event)"/>
							<input type='hidden' id='troubleshootimageurl' />
						</div>
						<div class="span1" id="status"></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Nama</div>
						<div class="span9"><input type="text" name="name" id="imagename" /></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Ket.</div>
						<div class="span9"><textarea type="text" name="file_description" id="file_description" ></textarea></div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<button class="btn closemodal" type="button" id='savetroubleshootimage'>Simpan</button>
			<button class="btn closemodal" type="button" id='updatetroubleshootimage'>Update</button>
			<button class="btn closemodal" type="button">Tutup</button>
		</div>
	</div>
</div>
