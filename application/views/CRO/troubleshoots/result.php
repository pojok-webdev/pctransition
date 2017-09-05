<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/troubleshoot_add.js'></script>
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
    

    <!-- start of konfirmasi -->
    <div id="dconfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <h3 id="myModalLabel"> Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Untuk menambah kantor cabang, Anda harus menyimpan permintaan troubleshoot ini terlebih dahulu. Setelah itu lakukan penambahan kantor cabang melalui menu Edit, pada tabel permintaan troubleshoot</p>
            <p>Apakah anda akan menyimpannya sekarang ?</p>
            <p></p>
            <p>
				<div class="button-group">
					<button type="button" class="btn btn-small btn-warning tip btnconfirmation" id="troubleshoot_save"><span class="icon-ok"></span> Simpan</button>
					<button type="button" class="btn btn-small btn-warning tip btnconfirmation" id="cancel_install_save"><span class="icon-remove"></span> Batal</button>
				</div>
			</p>
            
        </div>
    </div>
	<!-- end of konfirmasi -->

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
            <h3 id="myModalLabel">Penambahan Wireless Radio</h3>
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
            <h3 id="myModalLabel">Penambahan PC Card</h3>
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

    <div class="header" username="<?php echo $this->session->userdata['username'];?>">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET Internal App" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>

	<?php $this->load->view('adm/menu',$path);?>
    <div class="content">
        
        <!-- start of breadline -->
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Troubleshoots</a> <span class="divider">></span></li>
                <li class="active">Result</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>            
		</div>
        <!-- end of breadline -->
        <div class="workplace" id="workplace" username = "<?php echo $this->session->userdata['username'];?>" client_id="<?php echo $obj->client_id;?>" survey_id="<?php echo $obj->id;?>">
            
            <div class="row-fluid">                
                <div class="span12">                                        
                    <div class="block-fluid without-head">                        
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                </div>
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                    <button class="btn btn-small btnsavetroubleshoot" title="Simpan Pengajuan Troubleshoot" type="button"><span class="icon-ok icon-white"></span> Simpan</button>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>

            <div class="row-fluid">                
                <div class="span6">                                        
                    <div class="block-fluid without-head">                        
                        <!-- tempat form -->
                        <div class="row-form clearfix">
                            <div class="span3">Nama Pelanggan</div>
                            <div class="span9">
								<?php echo form_input("client_id",$obj->client->name,"id='client_id' readonly");?>
								</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Alamat</div>
                            <div class="span9">
								<?php echo form_input("address",$obj->client->address,"id='address' readonly");?>
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
						<!-- end of tempat form -->
                    </div>                    
                </div>
                
                <div class="span6">                                        
                    <div class="block-fluid without-head">                        
                        <div class="row-form clearfix">
                            <div class="span3">Waktu Troubleshoot</div>
                            <div class="span9"><input type="text" name="troubleshoot_date" value="<?php echo (!is_null($obj->install_date))?Common::longsql_to_human_date($obj->install_date):'';?>" class="datepicker" id='troubleshoot_date' /></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Nama Pelaksana</div>
                            <div class="span9">
								<?php echo form_dropdown('service',$services,$obj->service_id,'id="service_id"');?>
							</div>
                        </div>                        

                        <div class="row-form clearfix">
                            <div class="span3">Butuh Surat Ijin ?</div>
                            <div class="span9">
								<select name='is_paid' id='is_paid'>
									<option value='1'>Ya</option>
									<option value='0'>Tidak</option>
								</select>
							</div>
                        </div>                        

                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9"><textarea name="description" id="description"><?php echo $obj->description?></textarea></div>
                        </div>

					</div>
				</div>
                <!-- x -->
            </div>            
            

<!-- batas bawah -->                
            </div>            
            
            
            
        </div>
        <!-- </form> -->
    </div>   
    
</body>
</html>
