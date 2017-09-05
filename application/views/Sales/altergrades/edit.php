<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/radu.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/survey_edit.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/survey_edit2.js'></script>
<style type='text/css'>
.thumbnail{
	width: 30px;
	}
</style>
<body>
	<!-- start of from survey site-->
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Data telah tersimpan.</p>
        </div>
    </div>

    <!-- Start opr Operator -->
    <div id="dAddOperator" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Petugas Survey</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-picture"></div>
                        <h1>Pilih Petugas</h1>
                    </div>
                    <div class="block gallery clearfix">
                        <div class="block thumbs clearfix">
                        <?php foreach(User::get_user_by_group('TS') as $user){?>
                        <div class="thumbnail">
                            <a class="fancybox" rel="group" href="<?php echo base_url();?>media/users/<?php echo strtolower($user->username);?>.jpg"><img src="<?php echo base_url();?>media/users/<?php echo strtolower($user->username);?>.jpg" class="img-polaroid" width="40" height="40" /></a>
                            <div class="captionx">
                                <h3><?php echo $user->username;?></h3>
                                <p></p>
                                <p><a class="btn petugasSurvey" username='<?php echo $user->username;?>' surveyor_email='<?php echo $user->email;?>' survey_id=''>Pilih</a></p>
                            </div>
                        </div>
                        <?php }?>
                        </div>
                    </div>
                </div>
			</div>
        </div>
    </div>
    <!-- End of Operator -->
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

	<!-- end of from survey site -->
    <!-- start of Notifikasi modal -->
    <div id="dModalsurvey" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Data telah tersimpan.</p>
        </div>
    </div>
	<!-- end of notifikasi modal -->


    <div class="header" id="myheader" username="<?php echo $this->session->userdata['username'];?>">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET Internal App" title="DB Teknis -  PT PadiNET Surabaya"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>

	<?php $this->load->view('adm/menu',$path);?>
    <div class="content">


        <div class="breadLine">

            <ul class="breadcrumb">
                <li><a href="#">Padi App</a> <span class="divider">></span></li>
                <li><a href="#">Perubahan Layanan</a> <span class="divider">></span></li>
                <li class="active">Add</li>
            </ul>
                <!-- start of button -->
                <?php $this->load->view('adm/buttons');?>
				<!-- end of button -->
        </div>
        <div class="workplace" id="workplace" survey_id="<?php echo $obj->id;?>" site_id="<?php echo $obj->survey_site->id;?>">
			<div class="block-fluid without-head">
				<div class="toolbar clearfix">
					<div class="right">
						<div class="btn-group">
							<!--<button class="btn btn-small btn-warning tip survey_save"><span class="icon-ok icon-white"></span></button>
							<button class="btn btn-small survey_save" type="button">Simpan</button> -->
							<button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Simpan <span class="caret"></span></button>
							<ul class="dropdown-menu pull-right">
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
					<h4>PIC Pelanggan</h4>
					</div>
                        <!-- tempat form -->

                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo form_input('client_id',$obj->client->name,'id="client_id"');?>
								</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC</div>
                            <div class="span9"><input type="text" name="pic_name" id="pic_name" value="<?php echo $obj->pic_name;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span2"><input type="text" name="pic_phone_area" id="pic_phone_area" value="<?php echo $obj->pic_phone_area;?>"/></div>
                            <div class="span7"><input type="text" name="pic_phone" id="pic_phone" value="<?php echo $obj->pic_phone;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC Position</div>
                            <div class="span9"><input type="text" name="pic_position" id="pic_position" value="<?php echo $obj->pic_position;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="pic_email" id="pic_email" value="<?php echo $obj->pic_email?>"/></div>
                        </div>
						<!-- end of tempat form -->
                    </div>
                </div>

                <!-- start of sebelah kanan -->
                <div class="span6 clearfix">
                    <div class="block-fluid without-head">
						<!-- start of toolbar -->
						<div class="toolbar">
						<h4>Keterangan Pelanggan</h4>
						</div>
						<!-- end of toolbar -->
						<!-- start of right form -->
                        <div class="row-form clearfix">
                            <div class="span3">Alamat</div>
                            <div class="span9">
								<?php echo form_input('address',$obj->address,'id="address"');?>
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
                            <div class="span3">Tgl Survey</div>
                            <div class="span5"><input type="text" name="survey_date"  class="datepicker" id='survey_date' value= '<?php echo $dtpart["day"] . "/" . $dtpart["month"] . "/" . $dtpart["year"];?>' /></div>
							<div class="span2">
								<?php echo form_dropdown('surveyhour',$hours,$dtpart["hour"],'id="surveyhour" class="dttime"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('surveyminute',$minutes,$dtpart["minute"],'id="surveyminute" class="dttime"');?>
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
                            <div class="span3">Keterangan</div>
                            <div class="span9"><textarea name="longresume" id="longresume"><?php echo $obj->longresume?></textarea></div>
                        </div>
						<!-- end of right form -->
                    </div>
                </div>
                <!-- end of sebelah kanan -->
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
                        <!-- tempat form -->

<?php
$dtp = Common::longsql_to_datepart($obj->survey_site->execution_date);

?>
                        <div class="row-form clearfix">
                            <div class="span3">Tgl Eksekusi</div>
                            <div class="span4"><input type="text" id="site_execution_date" name="site_execution_date" class="datepicker survey_date" id="execution_date" value="<?php echo $dtp['day'];?>/<?php echo $dtp['month'];?>/<?php echo $dtp['year'];?>"/></div>
							<div class="span2">
								<?php echo form_dropdown('site_execution_hour',$hours,$dtp['hour'],'id="site_execution_hour" class="dttime"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('site_execution_minute',$minutes,$dtp['minute'],'id="site_execution_minute" class="dttime"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Alamat</div>
                            <?php $tmpaddr = (trim($obj->survey_site->address)!='')?$obj->survey_site->address:$obj->address?>
                            <div class="span9"><input type="text" name="site_address" id="site_address" value="<?php echo $tmpaddr;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Kota</div>
                            <?php $tmpcty = (trim($obj->survey_site->city)!=''&&!is_null($obj->survey_site->city))?$obj->survey_site->city:$obj->city?>
                            <div class="span9"><input type="text" name="site_city" id="site_city" value="<?php echo $obj->survey_site->city;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC</div>
                            <?php $tmppic = (trim($obj->survey_site->pic)!=''&&!is_null($obj->survey_site->city))?$obj->survey_site->pic:$obj->pic?>
                            <div class="span9"><input type="text" name="site_pic" id="site_pic" value="<?php echo $obj->survey_site->pic;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Jabatan PIC</div>
                            <div class="span9"><input type="text" name="site_pic_position" id="site_pic_position" value="<?php echo $obj->survey_site->pic_position;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span2"><input type="text" name="site_phone_area" id="site_phone_area" value="<?php echo $obj->survey_site->phone_area;?>"/></div>
                            <div class="span7"><input type="text" name="site_phone" id="site_phone" value="<?php echo $obj->survey_site->phone;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="site_pic_email" id="site_pic_email" value="<?php echo $obj->survey_site->pic_email?>"/></div>
                        </div>



						<!-- end of tempat form -->
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
                            <div class="span3">Lokasi</div>
                            <div class="span1">S:</div>
                            <div class="span3"><input type="text" name="location_s" id="location_s" value="<?php echo $obj->survey_site->location_s;?>"/></div>
                            <div class="span1">E:</div>
                            <div class="span3"><input type="text" name="location_e" id="location_e" value="<?php echo $obj->survey_site->location_e;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Bearing</div>
                            <div class="span9"><input type="text" name="bearing" id="bearing" value="<?php echo $obj->survey_site->bearing;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">AMSL</div>
                            <div class="span9"><input type="text" name="amsl" id="amsl" value="<?php echo $obj->survey_site->amsl;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">AGL</div>
                            <div class="span9"><input type="text" name="agl" id="agl" value="<?php echo $obj->survey_site->agl;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9"><textarea name="site_descriptions" id="site_descriptions"><?php echo $obj->survey_site->description?></textarea></div>
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
								<?php foreach($obj->survey_site->survey_material as $material){?>
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
								Total : <span id="total_material"><?php echo $obj->survey_site->survey_material->count();?></span>
                            </div>
                        </div>
                    </div>
				<!-- END OF MATERIAL -->

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
								<?php foreach($obj->survey_site->survey_site_distance as $client){?>
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
								Total : <span id="total_image"><?php echo $obj->survey_site->survey_site_distance->count();?></span>
                            </div>
                        </div>
                    </div>
                <!-- end of kolom kanan -->
                </div>
			</div>

            <div class="row-fluid">

				<div class="span6 clearfix">
				<!-- Start of Operator -->
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
                                    <th width="60">Jenis</th>
                                    <th>Nama</th>
                                    <th width="60">Email</th>
                                    <th width="40">Actions</th>
                                </tr>
                            </thead>
                            <tbody class='surveyor'>
								<?php foreach($obj->survey_surveyor as $surveyor){?>
                                <tr>
                                    <td><a><?php echo $surveyor->name;?></a></td>
                                    <td class="info"><a><?php echo $surveyor->name;?></a></td>
                                    <td><?php echo $surveyor->email;?></td>
                                    <td><a><span class="icon-remove surveyor_remove" surveyor_id="<?php echo $surveyor->id; ?>" ></span></a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>
                            <div class="right">
								Total : <span id="total_surveyor"><?php echo $obj->survey_surveyor->count();?></span>
                            </div>
                        </div>
                    </div>

				<!-- End of Operator -->
				</div>





				<div class="span6 clearfix">
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
								<?php foreach($obj->survey_site->survey_device as $device){?>
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
								Total : <span id="total_device"><?php echo $obj->survey_site->survey_device->count();?></span>
                            </div>
                        </div>
                    </div>

				<!-- End of Devices -->
				</div>

			</div>
			<div class="row-fluid">
				<div class="span6">
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
								<?php foreach($obj->survey_site->survey_image as $image){?>
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
								Total : <span id="total_image"><?php echo $obj->survey_site->survey_image->count();?></span>
                            </div>
                        </div>
                    </div>

				<!-- End of Images -->
                </div>
                <div class="span6">
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
								<?php foreach($obj->survey_site->survey_bts_distance as $bts){?>
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
								Total : <span id="total_bts"><?php echo $obj->survey_site->survey_bts_distance->count();?></span>
                            </div>
                        </div>
                    </div>
                <!-- end of kolom kanan -->
                </div>
<!-- batas bawah -->
            </div>

</body>
</html>
