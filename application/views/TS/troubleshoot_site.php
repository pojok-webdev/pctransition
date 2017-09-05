<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/troubleshoot_site.js'></script>
	
<body>
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Data telah tersimpan.</p>
        </div>
    </div>
    
    <div id="dAddDevice" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Perangkat</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Tipe</div>
							<div class="span9">
								<?php echo form_dropdown('devicetype_id',$devicetypes,0,'id="devicetype_id"');?>
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<?php echo form_dropdown('device_id',$devices,0,'id="device_id"');?>
								</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Keterangan</div>
							<div class="span9">
								<?php echo form_textarea('description','','id="device_description"');?>
								</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Jumlah</div>
							<div class="span9"><input type="text" name="device_amount" id="device_amount" value=""/></div>
						</div>
						<div class="footer">
							<button class="btn closemodal" type="button" id='savedevice'>Simpan</button>
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
								<input type='text' name='tipe_wireless_radio' id='tipe_wireless_radio'>
							</div>
						</div>

						<div class="row-form clearfix">
							MacBoard
							<div class="span12"><input type="text" name="macboard_wireless_radio" id="macboard_wireless_radio" value=""/></div>
						</div>

						<div class="row-form clearfix">
							IP Radio
							<div class="span12"><input type="text" name="ip_radio_wireless_radio" id="ip_radio_wireless_radio" value=""/></div>
						</div>

						<div class="row-form clearfix">
							AP ID
							<div class="span12"><input type="text" name="ap_id_wireless_radio" id="ap_id_wireless_radio" value=""/></div>
						</div>
			

					</div>
				</div>
				
				<div class="span3">
					<div class="block-fluid without-head">

						<div class="row-form clearfix">
							IP AP
							<div class="span12"><input type="text" name="ip_ap_wireless_radio" id="ip_ap_wireless_radio" value=""/></div>
						</div>

						<div class="row-form clearfix">
							Polarisasi
							<div class="span12"><input type="text" name="polarization_wireless_radio" id="polarization_wireless_radio" value=""/></div>
						</div>

						<div class="row-form clearfix">
							Sinyal
							<div class="span12"><input type="text" name="signal_wireless_radio" id="signal_wireless_radio" value=""/></div>
						</div>

						<div class="row-form clearfix">
							Kualitas
							<div class="span12"><input type="text" name="quality_wireless_radio" id="quality_wireless_radio" value=""/></div>
						</div>


						<div class="row-form clearfix">
							Frekwensi
							<div class="span12"><input type="text" name="freqwency_wireless_radio" id="freqwency_wireless_radio" value=""/></div>
						</div>

				
					</div>
				</div>
				
				<div class="span3">
					<div class="block-fluid without-head">

						<div class="row-form clearfix">
							Throughput UDP
							<div class="span12"><input type="text" name="troughput_udp_wireless_radio" id="troughput_udp_wireless_radio" value=""/></div>
						</div>

						<div class="row-form clearfix">
							Throughput TCP
							<div class="span12"><input type="text" name="troughput_tcp_wireless_radio" id="troughput_tcp_wireless_radio" value=""/></div>
						</div>

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

				
					</div>
				</div>
				
				<div class="span3">
					<div class="block-fluid without-head">


						<div class="row-form clearfix">
							Tipe PC Card
							<div class="span12"><input type="text" name="pc_card_type_wireless_radio" id="pc_card_type_wireless_radio" value=""/></div>
						</div>

						<div class="row-form clearfix">
							Mac Address PC Card
							<div class="span12"><input type="text" name="pc_card_mac_address_wireless_radio" id="pc_card_mac_address_wireless_radio" value=""/></div>
						</div>

						<div class="row-form clearfix">
							Tipe Antena
							<div class="span12"><input type="text" name="antenna_type_wireless_radio" id="antenna_type_wireless_radio" value=""/></div>
						</div>

						<div class="row-form clearfix">
							Lokasi Antena
							<div class="span12"><input type="text" name="antenna_location_wireless_radio" id="antenna_location_wireless_radio" value=""/></div>
						</div>

				
					</div>
				</div>

			</div>
			<div class="footer">
				<button class="btn closemodalparent2" type="button" id='savewirelessradio'>Simpan</button>
				<button class="btn closemodalparent2" type="button">Tutup</button>
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

    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
<?php
$myuser = $this->ion_auth->user()->row();
$data['user'] = User::get_user_by_id($myuser->id);
?>
<?php $this->load->view('adm/menu',$path);?>
    <div class="content">
        
        
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">DB_Teknis</a> <span class="divider">></span></li>
                <li><a href="#">Survey</a> <span class="divider">></span></li>
                <li class="active">Edit_Site</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace" troubleshoot_id="<?php echo $obj->id;?>" username="<?php echo $this->session->userdata['username']?>">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="toolbar clearfix">
							<div class="right">
								<div class="btn-group">
									<button class="btn btn-small installsite_save" id="installsite_save"><span class="icon-ok"></span></button>
									<button class="btn btn-small btn-warning tip installsite_save" id="installsite_save">Simpan</button>
									</a>
								</div>
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
                        <!-- tempat form -->


                        <div class="row-form clearfix">
                            <div class="span3">Alamat</div>
                            <div class="span9"><input type="text" name="address" id="address" value="<?php echo $obj->address;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Kota</div>
                            <div class="span9"><input type="text" name="city" id="city" value="<?php echo $obj->city;?>"/></div>
                        </div>


						
                        
                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9"><textarea name="description" id="description"><?php echo $obj->description?></textarea></div>
                        </div>
                        

                        
						<!-- end of tempat form -->
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
                            <div class="span2"><input type="text" name="phone_area" id="phone_area" value="<?php echo $obj->phone_area;?>"/></div>
                            <div class="span7"><input type="text" name="phone" id="phone" value="<?php echo $obj->phone;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="pic_email" id="pic_email" value="<?php echo $obj->pic_email?>"/></div>
                        </div>


                    </div>
                </div>                
            </div>            
            
            <div class="row-fluid">
                <div class="span6">
                <!-- START OF Router -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Perangkat Cadangan Yang Dibawa</h4>
                        </div>                         
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger btn_adddevice" title="Tambah Perangkat"><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small tip btn_adddevice">Penambahan Perangkat</button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images " id="router">
                            <thead>
                                <tr>
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Tipe</th>
                                    <th>Keterangan</th>
                                    <th width="80">Lokasi</th>
                                    <th width="20"><span class="icon-th-large"></span></th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->troubleshootdevice as $device){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><?php echo $device->device->name;?></td>
                                    <td class="info"><a><?php echo $device->description;?></a></td>
                                    <td><?php echo $device->device->devicetype->name;?></td>
                                    <td><a><span class="icon-trash row_remove remove_router pointer" device_id='<?php echo $device->id;?>'></span></a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								<span id="total_router">Total : <?php echo $obj->install_router->count();?></span>
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
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Tipe</th>
                                    <th>Keterangan</th>
                                    <th width="80">Lokasi</th>
                                    <th width="20"><span class="icon-th-large"></span></th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->install_ap_wifi as $wifi){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><?php echo $wifi->tipe;?></td>
                                    <td class="info"><a><?php echo $wifi->macboard;?></a> <span><?php echo $wifi->ip_adress;?></span> <span><?php echo $wifi->essid;?></span></td>
                                    <td><?php echo $wifi->location;?></td>
                                    <td><a><span class="icon-trash row_remove remove_wifi pointer" wifi_id="<?php echo $wifi->id; ?>" ></span></a></td>                                    
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id='total_wifi'><?php echo $obj->install_ap_wifi->count();?></span>
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
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Gambar</th>
                                    <th>Nama</th>
                                    <th width="80">Keterangan</th>
                                    <th width="20"><span class="icon-th-large"></span></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->install_image as $image){?>
                                <tr image_id='<?php echo $image->id;?>' image_path='<?php echo $image->path;?>'>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>media/installs/<?php echo $image->path;?>"><img src="<?php echo base_url();?>media/installs/<?php echo $image->path?>" class="img-polaroid" width=50 height=38 /></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><?php echo $image->name;?></a> <span><?php echo $image->path;?></span> <span><?php echo $image->create_date;?></span></td>
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
								Total : <span id="total_image"><?php echo $obj->install_image->count();?></span>
                            </div>                        
                        </div>                    

                    </div>
				
				<!-- End of Images -->

                </div>
                
                <div class="span6">
                <!-- begin of kolom kanan -->
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Wireless Radio</h4>
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
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Tipe</th>
                                    <th>Keterangan</th>
                                    <th width="80">ESSID</th>
                                    <th width="20"><span class="icon-th-large"></span></th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->install_wireless_radio as $wirelessradio){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><?php echo $wirelessradio->tipe;?></td>
                                    <td class="info"><a>Macboard: <?php echo $wirelessradio->macboard;?></a> <span>IP Radio : <?php echo $wirelessradio->ip_radio;?></span> <span><?php echo 'Frek.' . $wirelessradio->freqwency;?></span></td>
                                    <td><?php echo $wirelessradio->essid;?></td>
                                    <td><a><span class="icon-trash pointer row_remove remove_wireless_radio pointer" wireless_radio_id='<?php echo $wirelessradio->id;?>' ></span></a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id="total_wireless_radio"><?php echo $obj->install_wireless_radio->count();?></span>
                            </div>                        
                        </div>                    

                    </div>
                
                <!-- end of kolom kanan -->

                <!-- begin of kolom kanan -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Berita Acara</h4>
                        </div>
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip " title="Tambah" id="btn_addba"><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small">Penambahan Berita Acara</button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images btsdistance" id="ba">
                            <thead>
                                <tr>
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Nama</th>
                                    <th>Path</th>
                                    <th width="80">Keterangan</th>
                                    <th width="20"><span class="icon-th-large"></span></th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->install_ba as $ba){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
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
								Total : <span id="total_ba"><?php echo $obj->install_ba->count();?></span>
                            </div>                        
                        </div>                    

                    </div>
                
                <!-- end of kolom kanan -->
                </div>

<!-- batas bawah -->                
            </div>            
            
            
            
        </div>
        <!-- </form> -->
    </div>   
    
</body>
</html>
