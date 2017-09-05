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
<div id="dAddInstallSite" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Penambahan Site</h3>
	</div>
	<div class="modal-body">
	<div class="row-fluid">
	<div class="span6">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
	<div class="span3">Alamat</div>
	<div class="span9">
	<input type='text' name='site_address' id='site_address'>
	</div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">Kota</div>
	<div class="span9"><input type="text" name="site_city" id="site_city" value=""/></div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">Ket.</div>
	<div class="span9">
	<textarea name="site_description" id="site_description"></textarea>
	</div>
	</div>
	</div>
	</div>
	<div class="span6">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
	<div class="span3">PIC</div>
	<div class="span9"><input type="text" name="pic_name" id="site_pic_name" value="" class=""/>
	</div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">Posisi</div>
	<div class="span9"><input type="text" name="pic_position" id="site_pic_position" value="" class=""/>
	</div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">Telepon</div>
	<div class="span3"><input type="text" name="pic_phone_area" id="site_phone_area" value="" =""/></div>
	<div class="span6"><input type="text" name="phone" id="site_phone" value="" class=""/></div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">Email</div>
	<div class="span9"><input type="text" name="pic_email" id="site_email" value="" class=""/></div>
	</div>
	<div class="footer">
	<button class="btn closemodal" type="button" id='saveinstallsite'>Simpan</button>
	<button class="btn closemodal" type="button">Tutup</button>
	</div>
	</div>
	</div>
	</div>
	</div>
</div>
<div id="dAddResume" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myResumeModalLabel">Penambahan Resume</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Resume</div>
						<div class="span9">
						<textarea id="resume" name="name" style="height: 300px;" type="textarea" class="myeditor inp_resume"></textarea>
						</div>
					</div>
	<div class="footer">
	<button class="btn closemodal saveresume" type="button" id='saveresume'>Simpan</button>
	<button class="btn closemodal updateresume" type="button" id='updateresume'>Update</button>
	<button class="btn closemodal" type="button">Tutup</button>
	</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="dAddRouter" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Penambahan Router</h3>
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
	<?php echo form_dropdown("tipe",$routersboards,0,'id="tipe_router" type="select"');?>
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
	<div class="footer">
	<button class="btn closemodal saverouter" type="button" id='saverouter'>Simpan</button>
	<button class="btn closemodal updaterouter" type="button" id='updaterouter'>Update</button>
	<button class="btn closemodal" type="button">Tutup</button>
	</div>
	</div>
	</div>
	</div>
	</div>
</div>
<div id="dAddOfficer" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Penambahan Petugas Survey</h3>
	</div>
	<div class="modal-body">
	<div class="row-fluid">
	<div class="span12">
	<div class="block gallery clearfix">
	<div class="block thumbas clearfix">
	<?php foreach(User::get_user_by_group('TS') as $user){?>
	<div class="thumbnail petugasSurvey pointer userpic" officer_name="<?php echo $user->username;?>" surveyor_email="<?php echo $user->email;?>">
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
	</div>
</div>
<div id="dAddAPWifi" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Penambahan AP Wifi</h3>
	</div>
	<div class="modal-body">
	<div class="row-fluid">
	<div class="span6">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
	<div class="span3">Tipe</div>
	<div class="span9">
	<?php echo form_dropdown('tipe_apwifi',$apwifis,0,'id="tipe_apwifi"');?>
	</div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">MacBoard</div>
	<div class="span9"><input type="text" name="macboard_apwifi" id="macboard_apwifi" value=""/></div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">IP Address</div>
	<div class="span9"><input type="text" name="ip_address_apwifi" id="ip_address_apwifi" value=""/></div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">ESS ID</div>
	<div class="span9"><input type="text" name="essid_apwifi" id="essid_apwifi" value=""/></div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">Owner</div>
	<div class="span9"><input type="text" name="owner_apwifi" id="owner_apwifi" value=""/></div>
	</div>
	</div>
	</div>
	<div class="span6">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
	<div class="span3">Security Key</div>
	<div class="span9"><input type="text" name="security_key_apwifi" id="security_key_apwifi" value=""/></div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">User</div>
	<div class="span9"><input type="text" name="user_apwifi" id="user_apwifi" value=""/></div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">Password</div>
	<div class="span9"><input type="text" name="password_apwifi" id="password_apwifi" value=""/></div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">Location</div>
	<div class="span9"><input type="text" name="location_apwifi" id="location_apwifi" value=""/></div>
	</div>
	<div class="footer">
	<button class="btn closemodal savewifi" type="button" id='savewifi'>Simpan</button>
	<button class="btn closemodal updatewifi" type="button" id='btnsavewifi'>Update</button>
	<button class="btn closemodal" type="button">Tutup</button>
	</div>
	</div>
	</div>
	</div>
	</div>
</div>
<div id="dAddInstallImage" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="imageModalLabel">Penambahan Gambar Instalasi</h3>
	</div>
	<div class="modal-body">
	<div class="row-fluid">
	<div class="span12">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
		<div class="span3">Gambar</div>
		<div class="span6">
			<img id="output" width=200 height=200>
			<input type="file" id="addImage" name="addImage" onchange="loadImage1(event)"/>
		</div>
	</div>
	<div class="row-form clearfix">
		<div class="span3">Tipe Gambar</div>
		<div class="span9">
			<?php echo form_dropdown("title",array("Topologi Jaringan"=>"Topologi Jaringan",
			"Konfigurasi Wireless Radio"=>"Konfigurasi Wireless Radio",
			"Speed Test"=>"Speed Test",
			"Dokumentasi Foto"=>"Dokumentasi Foto"),"","id='imageTitle'");?>
		</div>
	</div>
	
	<div class="row-form clearfix">
		<div class="span3">Ket.</div>
		<div class="span9">
			<textarea id="description_image" name="description" class="" type="textarea"></textarea>
		</div>
	</div>

	<div class="footer">
		<button class="btn closemodal" type="button" id='saveimage'>Simpan</button>
		<button class="btn closemodal" type="button">Tutup</button>
	</div>

	</div>
	</div>
	</div>
	</div>
</div>
<div id="dAddWirelessRadio" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Penambahan Wireless Board</h3>
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
	<?php echo form_dropdown('bts',$btstowers,'','id="bts_wireless_radio" class="inp_wireless" type="select"');?>
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
	<button class="btn closemodalparent2 savewr" type="button" id='savewirelessradio'>Simpan</button>
	<button class="btn closemodalparent2 updatewr" type="button" id='updatewirelessradio'>Update</button>
	<button class="btn closemodalparent2" type="button">Tutup</button>
	</div>
	</div>
</div>
<div id="dPCCard" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Penambahan Mini PCI</h3>
	</div>
	<div class="modal-body">
	<div class="row-fluid">
	<div class="span6">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
	<div class="span3">Tipe</div>
	<div class="span9">
	<?php echo form_dropdown('tipe_apwifi',$pccards,0,'id="pccards"');?>
	</div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">MacAddress</div>
	<div class="span9"><input type="text" name="pccard_macaddress" id="pccard_macaddress" value=""/></div>
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
<div id="dAntenna" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Penambahan Peralatan Lainnya</h3>
	</div>
	<div class="modal-body">
	<div class="row-fluid">
	<div class="span6">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
	<div class="span3">Tipe</div>
	<div class="span9">
	<?php echo form_dropdown('tipe_antenna',$antennas,0,'id="tipe_antenna"');?>
	</div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">Lokasi</div>
	<div class="span9"><input type="text" name="antenna_location" id="antenna_location" value=""/></div>
	</div>
	</div>
	</div>
	</div>
	<div class="footer">
	<button class="btn closemodal saveantenna" type="button" id='saveantenna'>Simpan</button>
	<button class="btn closemodal updateantenna" type="button" id='updateantenna'>Update</button>
	<button class="btn closemodal" type="button">Tutup</button>
	</div>
	</div>
</div>
<div id="dSwitch" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Penambahan Switch</h3>
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
	<?php echo form_dropdown("port",$ports,"0","id='switchport' class='inp_switch' type='select'");?>
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
	<div class="span6"><input type="text" name="user" id="switchuser" value=""/></div>
	</div>
	<div class="row-form clearfix switch_password">
	<div class="span6">Password</div>
	<div class="span6"><input type="text" name="password" id="switchpassword" value=""/></div>
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
<div id="dAddBeritaAcara" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Penambahan Berita Acara</h3>
	</div>
	<div class="modal-body">
	<div class="row-fluid">
	<div class="span6">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
		<div class="span3">Gambar</div>
		<div class="span6">
			<img id="baoutput" width=200 height=200>
			<input type="file" id="addBAImage" name="addBAImage" onchange="loadImage(event)"/>
		</div>
	</div>
	<div class="row-form clearfix">
	<div class="span3">Nama</div>
	<div class="span9">
	<input type='text' name='nameba' id='nameba'>
	</div>
	</div>
	</div>
	</div>
	<div class="span6">
	<div class="block-fluid without-head">
	<div class="row-form clearfix">
	<div class="span3">Deskripsi</div>
	<div class="span9"><input type="text" name="descriptionba" id="descriptionba" value=""/></div>
	</div>
	<div class="footer">
	<button class="btn closemodal" type="button" id='saveba'>Simpan</button>
	<button class="btn closemodal" type="button" id='updateba'>Update</button>
	<button class="btn closemodal" type="button">Tutup</button>
	</div>
	</div>
	</div>
	</div>
	</div>
</div>
<div id="dChangeImage" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Change Image</h3>
	</div>
	<div class="modal-body">
	<div class="row-fluid">
	<div class="span12">
	<img id="changeSurveyImage" src="" />
	</div>
	<div class="span12">
	<input type="hidden" id="hiddenEditImage"/>
	<input id="fileEditImage" type="file" onchange="changeImage(event)" />
	</div>
	</div>
	<div class="footer">
	<button class="btn closemodal" type="button" id='saveEditInstallImage'>Simpan</button>
	<button class="btn closemodal" type="button">Tutup</button>
	</div>
	</div>
</div>

