<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type='text/javascript' src='<?php echo base_url();?>js/processing-1.4.8.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/surveys/survey_edit2.js'></script>
<body>
	<?php $this->load->view("TS/surveys/edit_modal")?>
	<?php $this->load->view("modals")?>
	<div class="header" id="myheader" username="<?php echo $this->session->userdata['username'];?>">
		<input type="hidden" name="createuser" id="createuser" value="<?php echo $this->session->userdata['username'];?>" />
		<a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/></a>
		<ul class="header_menu">
			<li class="list_icon"><a href="#">&nbsp;</a></li>
		</ul>
	</div>
	<?php $this->load->view('adm/menu');?>
	<div class="content">
		<div class="breadLine">
			<ul class="breadcrumb">
				<li><a href="#">PadiApp</a> <span class="divider">></span></li>
				<li><a href="#">Survey</a> <span class="divider">></span></li>
				<li class="active">Edit</li>
			</ul>
			<?php $this->load->view('adm/buttons');?>
		</div>
		<div class="workplace" id="workplace" site_id="<?php echo $obj->id;?>">
		<input type='hidden' value='<?php echo $obj->survey_request_id;?>' name='id' id='survey_request_id' class="surveyrequest" />
		<input type='hidden' value='<?php echo $obj->id;?>' name='survey_site_id' id='survey_site_id' class="inp_bts inp_devices inp_resume" />
		<input type='hidden' value='<?php echo $obj->survey_request->client->id;?>' name='client_id' id='client_id' class="inp_pic" />
		<input type='hidden' value='<?php echo $this->ionuser->username;?>' name='createuser' id='createuser' class="inp_bts inp_devices inp_resume" />
		<div class="block-fluid without-head">
		<div class="toolbar clearfix">
			<div class="left"><span id="surveyresult"><?php echo $hasilsurvey[$obj->survey_request->resume];?></span></div>
			<div class="right">
				<div class="btn-group">
					<button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Simpan <span class="caret"></span></button>
					<ul class="dropdown-menu pull-right" id="surveyresultdropdown">
						<li class="survey_save" resume="1"><a href="#">Bisa dilaksanakan</a></li>
						<li class="survey_save" resume="0"><a href="#">Belum ada kesimpulan</a></li>
						<li class="survey_save" resume="2"><a href="#">Bisa dilaksanakan dengan syarat</a></li>
						<li class="divider survey_save"></li>
						<li class="survey_save" resume="3"><a href="#">Tidak bisa dilaksanakan</a></li>
					</ul>
				</div>
			</div>
		</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<div class="block-fluid without-head">
					<div class="toolbar">
					<h4>Peruntukan</h4>
					</div>
						<div class="row-form clearfix">
							<div class="span3">Peruntukan</div>
							<div class="span9">
								<?php echo form_dropdown('direction',$direction,$obj->direction,'id="direction" class="surveysite" type="selectid"');?>
							</div>
						</div>
					</div>
					<div class="block-fluid without-head">
					<div class="toolbar">
					<h4>PIC Pelanggan</h4>
					</div>
					    <div class="row-form clearfix">
						<div class="head clearfix">
						    <div></div>
						    <h1>PIC Pelanggan</h1>
						    <ul class="buttons">
						        <li>
							  <a id="btnAddPicSite" class="isw-plus"></a>
						        </li>
						    </ul>
						</div>
						<div class="block-fluid users" id="listpicsite">
							<?php foreach($sitepics as $pic){?>
						        <div class="item clearfix sitepiclists" picid=<?php echo $pic->id;?>>
							  <div class="infopic">
							      <div>
							      <a class="name"><?php echo $pic->name;?></a><br />
							      <?php echo $pic->position;?><p />

							      </div>
							      <span><?php echo $pic->email;?><br /><?php echo $pic->hp;?></span>

							      <div class="controls">
								<a class="icon-pencil edit_sitepic"></a>
								<a class="icon-remove remove_sitepic"></a>
							      </div>
							  </div>
						        </div>
							<?php }?>
						</div>
				      </div>
						<div class="row-form clearfix">
							<div class="span3">Alamat</div>
							<?php $tmpaddr = (trim($obj->address)!='')?$obj->address." ".$obj->city:$obj->address." ".$obj->city;?>
							<div class="span9"><input type="text" name="address" id="site_address" value="<?php echo $tmpaddr;?>" class="surveysite"/>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Kota</div>
							<?php $tmpcty = (trim($obj->city)!=''&&!is_null($obj->city))?$obj->city:$obj->survey_request->city?>
							<div class="span9"><input type="text" name="city" id="site_city" value="<?php echo $obj->city;?>" class="surveysite" class="surveysite"/></div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">PIC</div>
							<?php $tmppic = (trim($obj->pic)!=''&&!is_null($obj->city))?$obj->pic:$obj->survey_request->pic?>
							<div class="span9">
								<input type="text" name="pic_name" id="site_pic" value="<?php echo $obj->pic_name;?>" class="surveyrequest"/>
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Jabatan PIC</div>
							<div class="span9"><input type="text" name="pic_position" id="site_pic_position" value="<?php echo $obj->pic_position;?>" class="surveysite"/></div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Telepon</div>
							<div class="span2">
								<input type="text" name="pic_phone_area" id="site_phone_area" value="<?php echo $obj->pic_phone_area;?>" class="surveysite"/>
							</div>
							<div class="span7">
								<input type="text" name="pic_phone" id="site_phone" value="<?php echo $obj->pic_phone;?>" class="surveysite"/>
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Email</div>
							<div class="span9">
							<input type="text" name="pic_email" id="site_pic_email" value="<?php echo $obj->pic_email?>" class="surveysite"/>
							</div>
						</div>
					</div>
				</div>
				<div class="span6 clearfix">
					<div class="block-fluid without-head">
						<div class="toolbar">
						<h4>Keterangan Pelanggan</h4>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
							<?php echo form_input('client_name',$obj->survey_request->client->name,'id="client_name"');?>
								</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Alamat</div>
							<div class="span9">
								<?php echo form_input('address',$obj->address,'id="address" class="surveyrequest"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Layanan</div>
							<div class="span9">
								<?php echo form_dropdown('service',$services,$obj->service_interested_to,'id="service_id"');?>
							</div>
						</div>
						<div class="row-form clearfix">
						<?php $dtpart = Common::longsql_to_datepart($obj->survey_date);?>
							<div class="span3">Jadwal Survey</div>
							<div class="span4"><input type="text" name="survey_date"  class="datepicker" id='survey_date' value= '<?php echo $dtpart["day"] . "/" . $dtpart["month"] . "/" . $dtpart["year"];?>' /></div>
							<div class="span2">
								<?php echo form_dropdown('surveyhour',$hours,$dtpart["hour"],'id="surveyhour" class="dttime"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('surveyminute',$minutes,$dtpart["minute"],'id="surveyminute" class="dttime"');?>
								<input type="hidden" name="surveysecond" id="surveysecond" value="<?php echo $dtpart["second"];?>">
							</div>
						</div>
						<?php
						$dtp = Common::longsql_to_datepart($obj->execution_date);
						?>
						<div class="row-form clearfix">
							<div class="span3">Tgl Eksekusi</div>
							<div class="span4"><input type="text" id="site_execution_date" name="execution_date" class="datepicker survey_date surveysite surveyrequest" id="execution_date" value="<?php echo $dtp['day'];?>/<?php echo $dtp['month'];?>/<?php echo $dtp['year'];?>"/></div>
							<div class="span2">
								<?php echo form_dropdown('site_execution_hour',$hours,$dtp['hour'],'id="site_execution_hour" class="dttime" parent="site_execution_date"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('site_execution_minute',$minutes,$dtp['minute'],'id="site_execution_minute" class="dttime" grandparent="site_execution_date"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Perijinan</div>
							<div class="span9">
								<select name='pengantar' id='pengantar'>
									<option value='1'>Ya</option>
									<option value='0'>Tidak</option>
								</select>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Punya Tangga</div>
							<div class="span9">
								<?php echo form_dropdown('has_ladder',array('1'=>'Ya','0'=>'Tidak'),$obj->has_ladder,'id="has_ladder" class="surveysite" type="selectid"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Keterangan Survey</div>
							<div class="span9"><textarea name="longresume" id="longresume"><?php echo $obj->description?></textarea></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<div class="block-fluid without-head">
					<div class="toolbar">
					<h4>Detail Site Pelanggan</h4>
					</div>
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
						<div class="span3">Lokasi</div>
						<div class="span1">S:</div>
						<div class="span2">
							<input type="text" name="location_s_d" id="location_s_d" value="<?php echo $obj->location_s_d;?>" class="surveysite"/>
						</div>
						<div class="span1">Menit:</div>
						<div class="span2"><input type="text" name="location_s_m" id="location_s_m" value="<?php echo $obj->location_s_m;?>" class="surveysite"/>
						</div>
						<div class="span1">Detik:</div>
						<div class="span2"><input type="text" name="location_s_s" id="location_s_s" value="<?php echo $obj->location_s_s;?>" class="surveysite"/>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Lokasi</div>
						<div class="span1">E:</div>
						<div class="span2"><input type="text" name="location_e_d" id="location_e_d" value="<?php echo $obj->location_e_d;?>" class="surveysite"/>
						</div>
						<div class="span1">Menit:</div>
						<div class="span2">
							<input type="text" name="location_e_m" id="location_e_m" value="<?php echo $obj->location_e_m;?>" class="surveysite"/>
						</div>
						<div class="span1">Detik:</div>
						<div class="span2">
							<input type="text" name="location_e_s" id="location_e_s" value="<?php echo $obj->location_e_s;?>" class="surveysite"/>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Bearing</div>
						<div class="span9"><input type="text" name="bearing" id="bearing" value="<?php echo $obj->bearing;?>" class="surveysite"/>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">AMSL</div>
						<div class="span9"><input type="text" name="amsl" id="amsl" value="<?php echo $obj->amsl;?>" class="surveysite"/>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">AGL</div>
						<div class="span9"><input type="text" name="agl" id="agl" value="<?php echo $obj->agl;?>" class="surveysite"/>
						</div>
					</div>
				</div>
			</div>
			<div class="span6 clearfix">
				<div class="block-fluid without-head">
				<div class="toolbar">
				<h4>Detail Lokasi</h4>
				</div>
					<div class="toolbar clearfix">
						<div class="right">
							<div class="btn-group">
							</div>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Keterangan</div>
						<div class="span9">
						<textarea name="description" id="site_descriptions" class="surveysite" type="textarea"><?php echo $obj->description?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
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
			</div>
			<div class="span6">
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
								<th width="20">Jarak</th>
								<th width="20">LOS/NLOS</th>
								<th width="20">Penghalang</th>
								<th width="60">Keterangan</th>
								<th width="40">Actions</th>
							</tr>
						</thead>
						<tbody class='site'>
							<?php foreach($obj->survey_site_distance as $client){?>
								<?php
								switch($client->los){
									case "0":
									$los = "NLOS";
									break;
									case "2":
									$los = "nLOS";
									break;
									case "1":
									$los = "LOS";
									break;
								}
								?>
							<tr myid="<?php echo $client->id;?>">
								<td><a><?php echo $client->address;?></a></td>
								<td><?php echo $client->distance;?></td>
								<td><a><?php echo $los;?></a></td>
								<td><a><?php echo $client->obstacle;?></a></td>
								<td class="info"><a><?php echo $client->description;?></a></td>
								<td>
									<a><span class="icon-remove pointer otherclient_remove"></span></a>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<div class="toolbar bottom-toolbar clearfix">
						<div class="left">
						</div>
						<div class="right">
							Total : <span id="total_client_site"><?php echo $obj->survey_site_distance->count();?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6 clearfix">
				<div class="block-fluid without-head">
					<div class="toolbar nopadding-toolbar clearfix">
						<h4>Petugas</h4>
					</div>
					<div class="toolbar clearfix paditablehead">
						<div class="left">
							<div class="btn-group">
								<button type="button" class="btn btn-small btn-danger tip btnaddoperator" title="Tambah Petugas">
									<span class="icon-plus icon-white"></span>
								</button>
								<button type="button" class="btn btn-small tip btnaddoperator" title="Tambah Petugas">
									Tambah Petugas
								</button>
							</div>
						</div>
					</div>
					<table cellpadding="0" cellspacing="0" width="100%" class="table images tsurveyor">
						<thead>
							<tr>
								<th width="5"></th>
								<th width="60">Jenis</th>
								<th>Nama</th>
								<th width="60">Email</th>
								<th width="40">Actions</th>
							</tr>
						</thead>
						<tbody class='surveyor'>
							<?php foreach($obj->survey_request->survey_surveyor as $surveyor){?>
							<tr>
								<td class="info"><a><img src="<?php echo getfieldbyusername($surveyor->name,'pic');?>" width=20 height=20  class="img-polaroid" /></a></td>
								<td><a><?php echo $surveyor->name;?></a></td>
								<td class="info"><a><?php echo $surveyor->name;?></a></td>
								<td><?php echo $surveyor->email;?></td>
								<td><a><span class="icon-trash surveyor_remove" surveyor_id="<?php echo $surveyor->id; ?>" ></span></a></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<div class="toolbar bottom-toolbar clearfix">
						<div class="left">
						</div>
						<div class="right">
							Total : <span id="total_surveyor"><?php echo $obj->survey_request->survey_surveyor->count();?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="span6 clearfix">
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
								<button type="button" class="btn btn-small tip" id="btndevicepackage" title="Tambah Peralatan">
									Tambah Peralatan dari Paket
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
							<tr thisid="<?php echo $device->id;?>">
								<td class="editable type"><a><?php echo $device->device->devicetype->name;?></a></td>
								<td class="info editable name"><a><?php echo $device->device->name;?></a>
								<?php echo $device->description;?>
								</td>
								<td class="editable amount"><?php echo $device->amount;?></td>
								<td><span class="icon-remove device_remove"></span></td>
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
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
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
							<?php foreach($obj->survey_image->order_by("roworder","asc")->get() as $image){?>
							<tr class="rImage" image_id='<?php echo $image->id;?>' image_path='<?php echo $image->path;?>'>
								<td class="image_path">
									<a class="fancyboxx" rel="groupx">
									<img src="<?php echo $image->img?>" class="img-polaroidx prevImage" onclick="viewImage(this)" width=50 height=38 />
									</a>
								</td>
								<td class="info image_name"><a><?php echo $image->path;?></a><span><?php echo $image->create_date;?></span></td>
								<td class="image_description"><?php echo $image->description;?></td>
								<td>
									<a><span class="icon-remove removesurveyimage"></span></a>
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
							Total : <span id="total_image"><?php echo $obj->survey_image->count();?></span>
						</div>
					</div>
				</div>


					
					
					
					
					
					
					
					
					
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Berita Acara, Serah Terima Barang, dan Form Kegiatan</h4>
                        </div>
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip btn_addba" title="Tambah" id="btn_addba">
										<span class="icon-plus icon-white"></span>
									</button>
                                    <button type="button" class="btn btn-small btn_addba">Penambahan BA dll</button>
                                </div>
                            </div>
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="table images tBA" id="ba">
                            <thead>
                                <tr>
                                    <th width="30">File</th>
                                    <th width="60">Nama</th>
                                    <th width="80">Keterangan</th>
                                    <th width="20"><span class="icon-th-large"></span></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->survey_ba as $ba){?>
                                <tr myid=<?php echo $ba->id;?>>
                                    <td>
										<a class="fancybox" rel="group" href="<?php echo base_url();?>survey_sites/bapreview/<?php echo $ba->id;?>">
											<img src="<?php echo $ba->img;?>" class="img-polaroid baimg" width=50 height=38 />
										</a>
									</td>
                                    <td class="baname"><?php echo $ba->name;?></td>
                                    <td class="badesc"><?php echo $ba->description;?></td>
                                    <td class="centered">
										<div class="btn-group">
												<button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span></button>
												<ul class="dropdown-menu pull-right">
														<li class="pointer"><a class="edit_ba">Edit</a></li>
														<li class="divider"></li>
														<li class="pointer"><a class="remove_ba">Hapus</a></li>
												</ul>
										</div>										
										
									</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>
                            <div class="right">
								Total : <span id="total_ba"><?php echo $obj->survey_ba->count();?></span>
                            </div>
                        </div>
                    </div>
					
					
					
					
					
					
					
			</div>
			<div class="span6">
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
					<table cellpadding="0" cellspacing="0" width="100%" class="table btsdistance" id="tBTS">
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
							<?php
								switch($bts->los){
									case '0':
									$sighting = 'NLOS';
									break;
									case '1':
									$sighting = 'LOS';
									break;
									case '2':
									$sighting = 'nLOS';
									break;
								}
							?>
							<tr class="btsrows" id='<?php echo $bts->id;?>'>
								<td class="info"><a><?php echo $bts->btstower->name;?></a> <span></span> <span></span></td>
								<td class="ilosnlos"><?php echo $sighting;?></td>
								<td class="idistance"><?php echo $bts->distance;?></td>
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
<!--			</div>
			<div class="span6">-->
				<div class="block-fluid without-head">
					<div class="toolbar nopadding-toolbar clearfix">
						<h4>Resume</h4>
					</div>
					<div class="toolbar clearfix">
						<div class="left">
							<div class="btn-group">
								<button type="button" class="btn btn-small btn-danger tip addresume" title="Tambah">
									<span class="icon-plus icon-white"></span></button>
								<button type="button" class="btn btn-small addresume">Resume</button>
							</div>
						</div>
					</div>
					<table cellpadding="0" cellspacing="0" width="100%" class="table resume" id="tblResume">
						<thead>
							<tr>
								<th>Nama</th>
								<th width="40">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($obj->survey_resume as $resume){?>
							<tr rowid='<?php echo $resume->id;?>' class="resumerow">
								<td class="info"><a class="resume_edit pointer"><?php echo $resume->name;?></a></td>
								<td>
									<a><span class="icon-remove resume_remove"></span></a>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<div class="toolbar bottom-toolbar clearfix">
						<div class="left">
						</div>
						<div class="right">
							Total : <span id="total_resume"><?php echo $obj->survey_resume->count();?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type='text/javascript' src='<?php echo base_url();?>js/padilibs/padi.sendmail.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/surveys/edit.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/surveys/images.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/surveys/btses.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/surveys/resumes.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/surveys/operators.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/surveys/devices.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/surveys/materials.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/surveys/othersite.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/surveys/ba.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>js/padilibs/padi.imagelib.js'></script>
		<!--<script type='text/javascript' src='<?php echo base_url(); ?>js/padi.auth.js'></script>-->
	</body>
</html>
