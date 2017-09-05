<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/radu.js'></script>
<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/survey_site.js'></script>
	
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
	<!-- start of kebutuhan material -->
    <div id="dAddMaterial" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Material</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Jenis</div>
							<div class="span9">
								<?php echo form_dropdown('material_type',$material_type,0,'id="material_type"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
							<?php echo form_dropdown('material_name',array(),0,'id="material_name"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Jumlah</div>
							<div class="span9"><input type="text" name="material_amount" id="material_amount" value=""/></div>
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Keterangan</div>
							<div class="span9"><textarea type="text" name="material_description" id="material_description" ></textarea></div>
						</div>
						<div class="footer">
							<button class="btn closemodal" type="button" id='savesurveymaterial'>Simpan</button>
							<button class="btn closemodal" type="button">Tutup</button>
						</div>
					</div>
				</div>
			</div>
			
        </div>
    </div><!-- end of kebutuhan material -->
	<!-- start of kebutuhan peralatan -->
    <div id="dAddDevice" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Peralatan</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Jenis</div>
							<div class="span9">
								<?php echo form_dropdown('device_type',$device_type,0,'id="device_type"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<?php echo form_dropdown('device_name',array(),0,'id="device_name"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Jumlah</div>
							<div class="span9"><input type="text" name="device_amount" id="device_amount" value=""/></div>
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Keterangan</div>
							<div class="span9"><textarea type="text" name="device_description" id="device_description" ></textarea></div>
						</div>
						<div class="footer">
							<button class="btn closemodal" type="button" id='savesurveydevice'>Simpan</button>
							<button class="btn closemodal" type="button">Tutup</button>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div><!-- end of kebutuhan peralatan -->
	<!-- start of gambar survey -->
    <div id="dAddSurveyImage" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Gambar Survey</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='file_name' id='file_name'>
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">File</div>
							<div class="span6"><input type="text" name="path" id="path" value=""/></div>
							
							<div class="span3"><span class="btn btn-mini" id="uploadsurveyimage"><span class="icon-upload"></span></span></div>
							<div class="span1" id="status"></div>
						</div>
			
					</div>
				</div>
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Ket.</div>
							<div class="span9"><textarea type="text" name="file_description" id="file_description" ></textarea></div>
						</div>

						<div class="footer">
							<button class="btn closemodal" type="button" id='savesurveyimage'>Simpan</button>
							<button class="btn closemodal" type="button">Tutup</button>
						</div>
				
					</div>
				</div>
			</div>
			
        </div>
    </div>      

	
	<!-- end of gambar survey -->

	<!-- start of jarak site -->
	
    <div id="dAddSiteDistance" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Jarak Site</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">

						<div class="row-form clearfix">
							<div class="span3">Nama Site</div>
							<div class="span9">
								<?php echo form_dropdown('site',$sites,0,'id="site_id"');?>
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Jarak</div>
							<div class="span9"><input type="text" name="site_distance" id="site_distance" value=""/></div>
						</div>
			
						<div class="row-form clearfix">
							<div class="span3">Keterangan</div>
							<div class="span9"><textarea type="text" name="site_description" id="site_description" ></textarea></div>
						</div>

						<div class="footer">
							<button class="btn closemodal" type="button" id='saveSiteDistance'>Simpan</button>
							<button class="btn closemodal" type="button">Tutup</button>
						</div>


					</div>
				</div>
				
			</div>
			
        </div>
    </div>      

	
	<!-- end of jarak site -->



	<!-- start of jarak bts -->
	
    <div id="dAddBTSDistance" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Jarak BTS</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">

						<div class="row-form clearfix">
							<div class="span3">Nama BTS</div>
							<div class="span9">
								<?php echo form_dropdown('bts',$btstowers,0,'id="bts_id"');?>
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Jarak</div>
							<div class="span9"><input type="text" name="bts_distance" id="bts_distance" value=""/></div>
						</div>
			
						<div class="row-form clearfix">
							<div class="span3">LOS/NLOS</div>
							<div class="span4">
								<select id="losnlosselect">
									<option value="0">NLOS</option>
									<option value="1" selected="selected">LOS</option>
									<option value="2">nLOS</option>
								</select>
							</div>

							<div class="span1 losap" id="aplabel">AP</div>
							<div class="span4 losap" id="apoption">
								<?php echo form_dropdown("apselect",$aps,0,"id='apselect'");?>
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Penghalang</div>
							<div class="span9"><input type="text" name="obstacle" id="obstacle" value=""/></div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Keterangan</div>
							<div class="span9"><textarea type="text" name="bts_description" id="bts_description" ></textarea></div>
						</div>

						<div class="footer">
							<button class="btn closemodal savebtsdistance" type="button" id='savebtsdistance' btsdistance_id='' >Simpan</button>
							<button class="btn closemodal savebtsdistance" type="button" id='updatebtsdistance' btsdistance_id='' >Update</button>
							<button class="btn closemodal" type="button">Tutup</button>
						</div>


					</div>
				</div>
				
			</div>
			
        </div>
    </div>      

	
	<!-- end of jarak bts -->


    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
<?php
$data['user'] = User::get_user_by_id($user->id);
?>
<?php $this->load->view('adm/menu',$path);?>
    <div class="content">
        
        
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">DB_Teknis</a> <span class="divider">></span></li>
                <li><a href="<?php echo base_url();?>adm/survey_result/<?php echo $obj->survey_request_id;?>">Survey</a> <span class="divider">></span></li>
                <li class="active">Edit_Site</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace" survey_site_id="<?php echo $obj->id;?>" user_name="<?php echo $this->session->userdata['username']?>">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="toolbar clearfix">
							<div class="right">
								<div class="btn-group">
									<a href="#dModal" role="button"  class="btn btn-small btn-warning tip" title="Simpan"  data-toggle="modal" id='surveysite_save' value='<?php echo $obj->id;?>'>
									<span class="icon-ok icon-white"></span> Simpan
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

<?php
$dtp = Common::longsql_to_datepart($obj->execution_date);

?>
                        <div class="row-form clearfix">
                            <div class="span3">Tgl Eksekusi</div>
                            <div class="span4"><input type="text" id="execution_date" name="execution_date" class="datepicker survey_date" id="execution_date" value="<?php echo $dtp['day'];?>/<?php echo $dtp['month'];?>/<?php echo $dtp['year'];?>"/></div>
							<div class="span2">
								<?php echo form_dropdown('execution_hour',$hours,$dtp['hour'],'id="execution_hour" class="dttime"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('execution_minute',$minutes,$dtp['minute'],'id="execution_minute" class="dttime"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Alamat</div>
                            <div class="span9"><input type="text" name="address" id="address" value="<?php echo $obj->address;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Kota</div>
                            <div class="span9"><input type="text" name="city" id="city" value="<?php echo $obj->city;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC</div>
                            <div class="span9"><input type="text" name="pic" id="pic" value="<?php echo $obj->pic;?>"/></div>
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
                            <div class="span3">Lokasi</div>
                            <div class="span1">S:</div>
                            <div class="span3"><input type="text" name="location_s" id="location_s" value="<?php echo $obj->location_s;?>"/></div>
                            <div class="span1">E:</div>
                            <div class="span3"><input type="text" name="location_e" id="location_e" value="<?php echo $obj->location_e;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Bearing</div>
                            <div class="span9"><input type="text" name="bearing" id="bearing" value="<?php echo $obj->bearing;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">AMSL</div>
                            <div class="span9"><input type="text" name="amsl" id="amsl" value="<?php echo $obj->amsl;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">AGL</div>
                            <div class="span9"><input type="text" name="agl" id="agl" value="<?php echo $obj->agl;?>"/></div>
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
                <!-- START OF MATERIAL -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Kebutuhan Material</h4>
                        </div>                         
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip addMaterial">
                                    <span class="icon-plus icon-white"></span>
                                    </button>
                                    <button type="button" class="btn btn-small addMaterial">Penambahan Material</button>
                                </div>                                
                            </div>                        
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="table images material" id="tsurveymaterial">
                            <thead>
                                <tr>
                                    <th width="60">Jenis</th>
                                    <th>Nama</th>
                                    <th width="60">Jumlah</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->survey_material as $material){?>
                                <tr>
                                    <td><a><?php echo $material->material_type?></a></td>
                                    <td class="info"><a><?php echo $material->name;?></a></td>
                                    <td><?php echo $material->amount;?></td>
                                    <td><a><span class="icon-remove material_remove" id='<?php echo $material->id;?>'></span></a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id="total_material"><?php echo $obj->survey_material->count();?></span>
                            </div>                        
                        </div>                    
                    </div>
				<!-- END OF MATERIAL -->

				<!-- Start of Devices -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Kebutuhan Peralatan</h4>
                        </div>                         
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip btnadddevice" title="Tambah Peralatan">
										<span class="icon-plus icon-white"></span>
                                    </button>
                                    <button type="button" class="btn btn-small tip btnadddevice" title="Tambah Peralatan">
										Tambah Peralatan
                                    </button>
                                    
                                </div>                                
                            </div>                        
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="table images device">
                            <thead>
                                <tr>
                                    <th width="60">Jenis</th>
                                    <th>Nama</th>
                                    <th width="60">Jumlah</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->survey_device as $device){?>
                                <tr>
                                    <td><a><?php echo $device->device->devicetype->name;?></a></td>
                                    <td class="info"><a><?php echo $device->device->name;?></a></td>
                                    <td><?php echo $device->amount;?></td>
                                    <td><a><span class="icon-remove device_remove" device_id="<?php echo $device->id; ?>" ></span></a></td>                                    
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id="total_device"><?php echo $obj->survey_device->count();?></span>
                            </div>                        
                        </div>
                    </div>
				
				<!-- End of Devices -->


				<!-- Start of Images -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Gambar Survey</h4>
                            <span id="status" ></span>
                        </div>                         
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip btn_addsurveyimage" title="Tambah Gambar"><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn_addsurveyimage">Penambahan Gambar Survey</button>
                                </div>                                
                            </div>                        
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="table images gambar">
                            <thead>
                                <tr>
                                    <th width="60">Gambar</th>
                                    <th>Nama</th>
                                    <th width="60">Petugas</th>
                                    <th width="40">Aksi</th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->survey_image as $image){?>
                                <tr image_id='<?php echo $image->id;?>' image_path='<?php echo $image->path;?>'>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>media/surveys/<?php echo $image->path;?>"><img src="<?php echo base_url();?>media/surveys/<?php echo $image->path?>" class="img-polaroid" width=50 height=38 /></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><?php echo $image->name;?></a> <span><?php echo $image->path;?></span> <span><?php echo $image->create_date;?></span></td>
                                    <td><?php echo $image->user_name;?></td>
                                    <td><a><span class="icon-remove removesurveyimage"></span></a></td>                                    
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    
                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id="total_image"><?php echo $obj->survey_image->count();?></span>
                            </div>                        
                        </div>
                    </div>
				
				<!-- End of Images -->
                </div>
                
                <div class="span6">
                <!-- begin of kolom kanan -->
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Jarak antar Site</h4>
                        </div>
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip link_navPopCabangKlienx addSite" title="Add"><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small addSite">Penambahan Jarak Antar Site</button>
                                </div>                                
                            </div>                        
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="table images otherclient">
                            <thead>
                                <tr>
                                    <th width="">Alamat</th>
                                    <th width="60">Keterangan</th>
                                    <th width="60">Jarak</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody class='site'>
								<?php foreach($obj->survey_site_distance as $client){?>
                                <tr>
                                    <td><a><?php echo $client->address;?></a></td>
                                    <td class="info"><a><?php echo $client->description;?></a></td>
                                    <td><?php echo $client->distance;?></td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer link_navRemCabangKlien otherclient_remove" id='<?php echo $client->id;?>' ></span></a></td>                                    
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    
                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id="total_image"><?php echo $obj->survey_site_distance->count();?></span>
                            </div>                        
                        </div>                    
                    </div>
                <!-- end of kolom kanan -->
                <!-- begin of kolom kanan -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Jarak dengan BTS sekitar</h4>
                        </div>
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip addbtsdistance" title="Tambah"><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small addbtsdistance">Penambahan BTS Sekitar</button>
                                </div>                                
                            </div>                        
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="table btsdistance">
                            <thead>
                                <tr>
                                    <th>Nama BTS</th>
                                    <th width="60">LOS</th>
                                    <th width="60">Jarak</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->survey_bts_distance as $bts){?>
                                <tr id='<?php echo $bts->id;?>'>
                                    <td class="info"><a><?php echo $bts->btstower->name;?></a> <span></span> <span></span></td>
                                    <td><?php echo ($bts->los=='1')?'LOS':'NLOS';?></td>
                                    <td><?php echo $bts->distance;?></td>
                                    <td>
										<a><span class="icon-remove btsdistance_remove" btsdistance_id='<?php echo $bts->id;?>'></span></a>
										<a><span class="icon-edit btsdistance_edit"></span></a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    
                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id="total_bts"><?php echo $obj->survey_bts_distance->count();?></span>
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
