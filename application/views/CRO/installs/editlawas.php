<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/install_edit.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/install_edit2.js'></script>
<body>
	
    <!-- start of Notifikasi modal -->
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Data telah tersimpan.</p>
        </div>
    </div>
	<!-- end of notifikasi modal -->
    
    <!-- start of modal to add site -->
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
							<div class="span9"><input type="text" name="pic" id="site_pic_name" value="" class="installsite"/>
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Posisi</div>
							<div class="span9"><input type="text" name="pic_position" id="site_pic_position" value="" class="installsite"/>
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Telepon</div>
							<div class="span3"><input type="text" name="phone_area" id="site_phone_area" value="" class="installsite"/></div>
							<div class="span6"><input type="text" name="phone" id="site_phone" value="" class="installsite"/></div>
						</div>								

						<div class="row-form clearfix">
							<div class="span3">Email</div>
							<div class="span9"><input type="text" name="pic_email" id="site_email" value="" class="installsite"/></div>
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
    <!-- end of mola to add site -->
    
    <!-- start of copy from install site-->
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
								<?php echo form_dropdown("pemilik_router",array("1"=>"PadiNET","0"=>"Pelanggan"),0,'id="pemilik_router"');?>
							</div>
						</div>
					
						<div class="row-form clearfix" id="router_pelanggan">
							<div class="span3">Tipe</div>
							<div class="span9">
								<?php echo form_input("tipe_router_pelanggan","",'id="tipe_router_pelanggan"');?>
							</div>
						</div>

						<div class="row-form clearfix" id="router_padinet">
							<div class="span3">Tipe</div>
							<div class="span9">
								<?php echo form_dropdown("tipe_router",$routers,0,'id="tipe_router"');?>
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">MacBoard</div>
							<div class="span9"><input type="text" name="macboard_router" id="macboard_router" value=""/></div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">IP Public</div>
							<div class="span9"><input type="text" name="ip_public_router" id="ip_public_router" value=""/></div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">IP Private</div>
							<div class="span9"><input type="text" name="ip_private_router" id="ip_private_router" value=""/></div>
						</div>
			
					</div>
				</div>
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">User</div>
							<div class="span9"><input type="text" name="user_router" id="user_router" value=""/></div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Password</div>
							<div class="span9"><input type="text" name="password_router" id="password_router" value=""/></div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Location</div>
							<div class="span9"><input type="text" name="location_router" id="location_router" value=""/></div>
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
            <h3 id="myModalLabel">Penambahan Petugas</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<?php foreach($officers as $office){?>
							<div class="userpic" officer_name="<?php echo $office->username;?>">
							<a title="<?php echo $office->username;?>" >
							<img src="<?php echo base_url();?>media/users/<?php echo $office->username;?>.jpg" class="img-polaroid" width=20px/>
							</a><br />
							<?php echo $office->username;?>
							</div>
			            <?php }?>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal saveofficer" type="button" id='saveofficer'>Simpan</button>
					<button class="btn closemodal updateoficer" type="button" id='updateofficer'>Update</button>
					<button class="btn closemodal" type="button">Tutup</button>
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
            <h3 id="myModalLabel">Penambahan Gambar Instalasi</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='name_image' id='name_image'>
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Gambar</div>
							<div class="span6"><input type="text" name="path_image" id="path_image" value=""/></div>
							<div class="span3"><button class="btn btn-settings" id="uploadinstallimage"><span class="icon-settings"></span></button></div>
						</div>


					</div>
				</div>
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Ket.</div>
							<div class="span9">
								<textarea id="description_image" name="description_image"></textarea>
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
								<?php echo form_dropdown('tipe_wireless_radio',$pccards,'','id="tipe_wireless_radio"');?>
							</div>
						</div>

						<div class="row-form clearfix">
							MacBoard
							<div class="span12"><input type="text" name="macboard_wireless_radio" id="macboard_wireless_radio" value=""/></div>
						</div>

						<div class="row-form clearfix">
							Polarisasi
							<div class="span12">
								<?php echo form_dropdown('polarization_wireless_radio',array('vertical'=>'vertical','horizontal'=>'horizontal'),'','id="polarization_wireless_radio"');?>
							</div>
						</div>

			

					</div>
				</div>
				
				<div class="span3">
					<div class="block-fluid without-head">

						<div class="row-form clearfix">
							BTS
							<div class="span12">
								<?php echo form_dropdown('bts_wireless_radio',$btstowers,'','id="bts_wireless_radio"');?>
							</div>
						</div>

						<div class="row-form clearfix">
							IP AP
							<div class="span12">
								<?php echo form_dropdown('ip_ap_wireless_radio',array(),'','id="ip_ap_wireless_radio"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							IP Radio
							<div class="span12"><input type="text" name="ip_radio_wireless_radio" id="ip_radio_wireless_radio" value=""/></div>
						</div>
						<div class="row-form clearfix">
							IP Ethernet
							<div class="span12">
							<input type="text" name="ip_ethernet_wireless_radio" id="ip_ethernet_wireless_radio" value=""/>
							</div>
						</div>


				
					</div>
				</div>
				
				<div class="span3">
					<div class="block-fluid without-head">


						<div class="row-form clearfix">
							Kualitas/CCQ
							<div class="span12"><input type="text" name="quality_wireless_radio" id="quality_wireless_radio" value=""/></div>
						</div>

						<div class="row-form clearfix">
							Frekwensi
							<div class="span12"><input type="text" name="freqwency_wireless_radio" id="freqwency_wireless_radio" value=""/></div>
						</div>

						<div class="row-form clearfix">
							Throughput UDP
							<div class="span12"><input type="text" name="troughput_udp_wireless_radio" id="troughput_udp_wireless_radio" value=""/></div>
						</div>

						<div class="row-form clearfix">
							Throughput TCP
							<div class="span12"><input type="text" name="troughput_tcp_wireless_radio" id="troughput_tcp_wireless_radio" value=""/></div>
						</div>



				
					</div>
				</div>
				
				<div class="span3">
					<div class="block-fluid without-head">

						<div class="row-form clearfix">
							EssId
							<div class="span12"><input type="text" name="essid_wireless_radio" id="essid_wireless_radio" value=""/></div>
						</div>

						<div class="row-form clearfix">
							User
							<div class="span12">
							<input type="text" name="user_wireless_radio" id="user_wireless_radio" value=""/>
							</div>
						</div>

						<div class="row-form clearfix">
							Passwd
							<div class="span12">
							<input type="text" name="password_wireless_radio" id="password_wireless_radio" value=""/>
							</div>
						</div>


						<div class="row-form clearfix">
							Sinyal
							<div class="span12"><input type="text" name="signal_wireless_radio" id="signal_wireless_radio" value=""/></div>
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
            <h3 id="myModalLabel">Penambahan Antenna</h3>
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
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='nameba' id='nameba'>
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">File</div>
							<div class="span9"><input type="text" name="pathba" id="pathba" value=""/></div>
							<div class="span3"><button class="btn btn-settings" id="uploadinstallba"><span class="icon-settings"></span></button></div>
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
							<button class="btn closemodal" type="button">Tutup</button>
						</div>
				
					</div>
				</div>
			</div>
			
        </div>
    </div>      
    
    <!-- end of copy from install site -->
    
    <div class="header" username="<?php echo $this->session->userdata['username'];?>">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET Internal App" title="PadiNET Internal App"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>

	<?php $this->load->view('adm/menu',$path);?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Install</a> <span class="divider">></span></li>
                <li class="active">Edit</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>            
		</div>
        <div class="workplace" id="workplace" username = "<?php echo $this->session->userdata['username'];?>" client_id="<?php echo $obj->client_id;?>" install_id="<?php echo $obj->id;?>" install_site_id="<?php echo $obj->install_site->id;?>">
            <input type="hidden" id="install_site_id" value="<?php echo $this->uri->segment(3);?>">
            <div class="block-fluid without-head">                        
				<div class="toolbar clearfix">
					<div class="left">
						<span id="installstatus"><?php echo ($obj->status==9)?'Selesai':'Belum selesai';?></span>
					</div>
					<div class="right">
						<div class="btn-group">
							<button data-toggle="dropdown" class="btn dropdown-toggle">Simpan <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a class='install_save' value='<?php echo $obj->id;?>' clientstatus='9' installstatus='1'>Selesai</a></li>
								<li><a class='install_save' value='<?php echo $obj->id;?>' clientstatus='5' installstatus='0'>Belum selesai</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

            <div class="row-fluid">                
                <div class="span6">                                        
                    <div class="block-fluid without-head">                        

                        <div class="row-form clearfix">
                            <div class="span3">Nama Pelanggan</div>
                            <div class="span9">
								<?php echo form_input("client_id",$obj->client->name,"id='client_id' readonly");?>
								</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Layanan</div>
                            <div class="span9">
								<?php echo form_dropdown("service_id",$services,$obj->service_id,"id='service_id'");?>
								</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Nama PIC</div>
                            <div class="span9"><input type="text" name="pic_name" id="pic_name" value="<?php echo $obj->pic_name;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span2">
								<input type="text" name="pic_phone_area" id="pic_phone_area" value="<?php echo $obj->pic_phone_area;?>"/>
							</div>
                            <div class="span7">
								<input type="text" name="pic_phone" id="pic_phone" value="<?php echo $obj->pic_phone;?>"/>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Jabatan PIC</div>
                            <div class="span9"><input type="text" name="pic_position" id="pic_position" value="<?php echo $obj->pic_position;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="pic_email" id="pic_email" value="<?php echo $obj->pic_email?>"/></div>
                        </div>                                                
                    </div>                    
                </div>
                
                <div class="span6">                                        
                    <div class="block-fluid without-head">        
						
                        <div class="row-form clearfix">
                            <div class="span3">Tgl Instalasi</div>
                            <?php
                            $installdate = Common::longsql_to_datepart($obj->install_site->install_date);
                            ?>
                            <div class="span5">
								<input type="text" name="install_date" value="<?php echo (!is_null($obj->install_site->install_date))?$installdate['day'] . '/' . $installdate['month'] . '/' . $installdate['year']:'';?>" class="datepicker installsite installrequest" id='install_date' />
                            </div>
							<div class="span2">
								<?php echo form_dropdown('hour',$hours,$installdate['hour'],'id="hour" parent="install_date" class="dttime"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('minute',$minutes,$installdate['minute'],'id="minute" grandparent="install_date" class="dttime"');?>
							</div>
                        </div>
                        
                        <div class="row-form clearfix">
                            <div class="span3">Perijinan</div>
                            <div class="span9">
								<select name='permit' id='permit' type="selectid"  class="installsite">
									<option value='1'>Ya</option>
									<option value='0'>Tidak</option>
								</select>
							</div>
                        </div>                        

                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9">
								<textarea name="description" id="description" class="installsite">
									<?php echo $obj->description?>
								</textarea>
							</div>
                        </div>

					</div>
				</div>
                
            </div>            
                        
            <div class="row-fluid">                

                <div class="span6">
                    <div class="block-fluid without-head">
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                </div>                                
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                </div>
                            </div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Alamat</div>
                            <div class="span9"><input type="text" name="address" id="address" value="<?php echo $obj->client->address;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Kota</div>
                            <div class="span9"><input type="text" name="city" id="city" value="<?php echo $obj->client->city;?>"/></div>
                        </div>						
                    </div>                    
                </div>
               
                <div class="span6 clearfix">
                    <div class="block-fluid without-head">
						<div class="toolbar clearfix">
							<div class="right">
								<div class="btn-group">
								
								</div>
							</div>
						</div>
                        
                        <div class="row-form clearfix">
                            <div class="span3">PIC</div>
                            <div class="span9"><input type="text" name="pic" id="pic" value="<?php echo $obj->pic_name;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Jabatan PIC</div>
                            <div class="span9"><input type="text" name="pic_position" id="pic_position" value="<?php echo $obj->pic_position;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span2"><input type="text" name="phone_area" id="phone_area" value="<?php echo $obj->pic_phone_area;?>"/></div>
                            <div class="span7"><input type="text" name="phone" id="phone" value="<?php echo $obj->pic_phone;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="pic_email" id="pic_email" value="<?php echo $obj->pic_email?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9"><textarea name="description" id="description"><?php echo $obj->description?></textarea></div>
                        </div>

                    </div>
                </div>                
            
            </div>            
            
            <div class="row-fluid">
				
                <div class="span6">
                <!-- START OF Router -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Router</h4>
                        </div>                         
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip btn_addrouter" title="Tambah Router"><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small tip btn_addrouter">Penambahan Router</button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images " id="router">
                            <thead>
                                <tr>
                                    <th width="30%">Tipe</th>
                                    <th width="30%">Keterangan</th>
                                    <th width="30%">Lokasi</th>
                                    <th width="10%"><span class="icon-th-large"></span></th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->install_site->install_router as $router){?>
                                <tr>
                                    <td><?php echo $router->tipe;?></td>
                                    <td class="info"><a><?php echo $router->macboard;?></a> <span><?php echo $router->ip_public;?></span> <span><?php echo $router->ip_private;?></span></td>
                                    <td><?php echo $router->location;?></td>
                                    <td>
										<a><span class="icon-trash row_remove remove_router pointer" router_id='<?php echo $router->id;?>'></span></a>
										<a><span class="icon-edit edit_router pointer" id='<?php echo $router->id;?>'></span></a>
									</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								<span id="total_router">Total : <?php echo $obj->install_site->install_router->count();?></span>
                            </div>                        
                        </div>                    

                    </div>
				<!-- END OF Router -->

				<!-- Start of AP Wifi -->
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
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table ap_wifi" id="ap_wifi">
                            <thead>
                                <tr>
                                    <th width="30%">Tipe</th>
                                    <th width="30%">Keterangan</th>
                                    <th width="30%">Lokasi</th>
                                    <th width="10%"><span class="icon-th-large"></span></th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->install_site->install_ap_wifi as $wifi){?>
                                <tr>
                                    <td><?php echo $wifi->tipe;?></td>
                                    <td class="info"><a><?php echo $wifi->macboard;?></a> <span><?php echo $wifi->ip_adress;?></span> <span><?php echo $wifi->essid;?></span></td>
                                    <td><?php echo $wifi->location;?></td>
                                    <td>
										<a><span class="icon-trash row_remove remove_wifi pointer" wifi_id="<?php echo $wifi->id; ?>" ></span></a>
										<a><span class="icon-edit update_wifi pointer" id="<?php echo $wifi->id; ?>" ></span></a>
									</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id='total_wifi'><?php echo $obj->install_site->install_ap_wifi->count();?></span>
                            </div>                        
                        </div>                    

                    </div>
				
				<!-- Dnd of AP Wifi -->


				<!-- Start of Images -->
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Gambar Instalasi</h4>
                            <span id="status" ></span>
                        </div> 
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip btn_addinstallimage" title="Tambah Gambar" ><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn_addinstallimage">Penambahan Gambar Instalasi</button>
                                </div>
                            </div>
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images gambar" id="install_image">
                            <thead>
                                <tr>
                                    <th width="60">Gambar</th>
                                    <th>Nama</th>
                                    <th width="80">Keterangan</th>
                                    <th width="20"><span class="icon-th-large"></span></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->install_site->install_image as $image){?>
                                <tr image_id='<?php echo $image->id;?>' image_path='<?php echo $image->path;?>'>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>media/installs/<?php echo $image->path;?>"><img src="<?php echo base_url();?>media/installs/<?php echo $image->path?>" class="img-polaroid" width=50 height=38 /></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="<?php echo base_url();?>media/installs/<?php echo $image->path;?>"><?php echo $image->name;?></a> <span><?php echo $image->path;?></span> <span><?php echo $image->create_date;?></span></td>
                                    <td><?php echo $image->description;?></td>
                                    <td><a><span class="icon-trash removeinstallimage pointer" ></span></a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id="total_image"><?php echo $obj->install_site->install_image->count();?></span>
                            </div>                        
                        </div>                    

                    </div>
				
				<!-- End of Images -->


				<!-- Start of Material Terpakai -->
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
								<?php foreach($obj->install_site->install_material as $material){?>
                                <tr>
                                    <td><?php echo $material->tipe;?></td>
                                    <td class="info"><a><?php echo $material->name;?></a> </td>
                                    <td><?php echo $material->description;?></td>
                                    <td>
										<a><span class="icon-trash row_remove remove_material pointer" material_id="<?php echo $material->id; ?>" ></span></a>
										<a><span class="icon-edit update_material pointer" id="<?php echo $material->id; ?>" ></span></a>
									</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id='total_wifi'><?php echo $obj->install_site->install_ap_wifi->count();?></span>
                            </div>                        
                        </div>                    

                    </div>
				
				<!-- End of Material Terpakai -->

                </div>
                
                <div class="span6">
                <!-- begin of wireless radio -->
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Wireless Boards</h4>
                        </div>
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip btn_addwirelessradio" title="Add"><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn_addwirelessradio">Penambahan Wireless Radio</button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images" id="wirelessradio">
                            <thead>
                                <tr>
                                    <th width="60">Tipe</th>
                                    <th>Keterangan</th>
                                    <th width="80">ESSID</th>
                                    <th width="40"><span class="icon-th-large"></span></th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->install_site->install_wireless_radio as $wirelessradio){ ?>
                                <tr>
                                    <td><?php echo $wirelessradio->tipe;?></td>
                                    <td class="info"><a>Macboard: <?php echo $wirelessradio->macboard;?></a> <span>IP Radio : <?php echo $wirelessradio->ip_radio;?></span> <span><?php echo 'Frek.' . $wirelessradio->freqwency;?></span></td>
                                    <td><?php echo $wirelessradio->essid;?></td>
                                    <td>
										<a><span class="icon-trash pointer row_remove remove_wireless_radio" wireless_radio_id='<?php echo $wirelessradio->id;?>' ></span></a>
										<a><span class="icon-edit pointer edit_wireless_radio" id='<?php echo $wirelessradio->id;?>' ></span></a>
									</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id="total_wireless_radio"><?php echo $obj->install_site->install_wireless_radio->count();?></span>
                            </div>                        
                        </div>                    

                    </div>
                
                <!-- end of wireless radio -->

                <!-- begin of PC Card -->
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
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images" id="tblpccards">
                            <thead>
                                <tr>
                                    <th width="60">Nama</th>
                                    <th>Mac Address</th>
                                    <th width="40"><span class="icon-th-large"></span></th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->install_site->install_pccard as $pccard){?>
                                <tr>
                                    <td><?php echo $pccard->name;?></td>
                                    <td class="info"><a>Macboard: <?php echo $pccard->macaddress;?></a> <span></td>
                                    <td>
										<a><span class="icon-trash pointer row_remove remove_pccard" pccard_id='<?php echo $pccard->id;?>' ></span></a>
										<a><span class="icon-edit pointer edit_pccard" id='<?php echo $pccard->id;?>' ></span></a>
									</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id="total_pccard"><?php echo $obj->install_site->install_pccard->count();?></span>
                            </div>                        
                        </div>                    

                    </div>
                
                <!-- end of PC Card -->


                <!-- begin of Antenna -->
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Antenna</h4>
                        </div>
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip btn_addantenna" title="Add"><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn_addantenna">Penambahan Antenna</button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images" id="tblantennas">
                            <thead>
                                <tr>
                                    <th width="60">Tipe</th>
                                    <th>Lokasi</th>
                                    <th width="40"><span class="icon-th-large"></span></th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->install_site->install_antenna as $antenna){?>
                                <tr>
                                    <td><?php echo $antenna->name;?></td>
                                    <td class="info"><a>Lokasi: <?php echo $antenna->location;?></a> <span></td>
                                    <td>
										<a><span class="icon-trash pointer row_remove remove_antenna" antenna_id='<?php echo $antenna->id;?>' ></span></a>
										<a><span class="icon-edit pointer edit_antenna" id='<?php echo $antenna->id;?>' ></span></a>
									</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id="total_antenna"><?php echo $obj->install_site->install_antenna->count();?></span>
                            </div>                        
                        </div>                    

                    </div>
                
                <!-- end of Antenna -->


                <!-- begin of kolom kanan -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Berita Acara, Serah Terima Barang, dan Form Kegiatan</h4>
                        </div>
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip btn_addba" title="Tambah" id="btn_addba"><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn_addba">Penambahan BA dll</button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images btsdistance" id="ba">
                            <thead>
                                <tr>
                                    <th width="30">File</th>
                                    <th width="60">Nama</th>
                                    <th>Path</th>
                                    <th width="80">Keterangan</th>
                                    <th width="20"><span class="icon-th-large"></span></th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->install_site->install_ba as $ba){?>
                                <tr>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>media/installs/<?php echo $ba->path;?>"><img src="<?php echo base_url();?>media/installs/<?php echo $ba->path?>" class="img-polaroid" width=50 height=38 /></a></td>
                                    <td><?php echo $ba->name;?></td>
                                    <td class="info"><a><?php echo $ba->path;?></a> <span></span> <span></span></td>
                                    <td><?php echo $ba->description;?></td>
                                    <td class="centered">
										<a><span class="icon-trash row_remove remove_ba pointer" ba_id='<?php echo $ba->id;?>'></span></a>
									</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id="total_ba"><?php echo $obj->install_site->install_ba->count();?></span>
                            </div>                        
                        </div>                    

                    </div>
                
                <!-- end of kolom kanan -->


                <!-- begin of petugas -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Petugas</h4>
                        </div>
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip btn_addofficer" title="Tambah" id="btn_addofficer"><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn_addofficer">Penambahan Petugas</button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images" id="officer">
                            <thead>
                                <tr>
                                    <th width="60">Image</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->install_site->install_installer as $installer){?>
                                <tr>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>media/users/<?php echo $installer->name;?>.jpg"><img src="<?php echo base_url();?>media/users/<?php echo $installer->name;?>.jpg" class="img-polaroid" width=20 height=20 /></a></td>
                                    <td class="info"><a><?php echo $installer->name;?></a></td>
                                    <td>
										<a><span class="icon-trash pointer row_remove remove_installer" installer_name='<?php echo $installer->name;?>' ></span></a>
									</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id="total_installer"><?php echo $obj->install_site->install_ba->count();?></span>
                            </div>                        
                        </div>                    

                    </div>
                
                <!-- end of petugas-->
                </div>

<!-- batas bawah -->                
            </div>            
            
            
            
        </div>

			</div>   
        </div>
    </div>   
    <iframe frameborder="0" width="500" height="400"></iframe>
</body>
</html>
