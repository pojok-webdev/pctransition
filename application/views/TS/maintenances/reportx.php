<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type="text/javascript">
</script>
<body>
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p id="modalMessage">Data telah tersimpan.</p>
        </div>
    </div>
    <div id="dModalPenugasan" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penugasan</h3>
        </div>
        <div class="modal-body">
        <p>
		<div class="row-fluid">
			<div class="span12">
				<div class="block">
					<ul class="the-icons clearfix">
						<?php foreach(User::get_user_by_group('TS') as $user){?>
							<li username='<?php echo $user->username;?>'>
							<img src="<?php echo base_url();?>media/users/<?php echo strtolower($user->username);?>.jpg" width=32 height=32 class="img-polaroid petugasMaintenance"/>
							<a class="petugasMaintenance" >
							<?php echo $user->username;?></a>
							</li>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
		</p>
        </div>
    </div>
    <div id="dKepuasanPelanggan" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Form Kepuasan Pelanggan</h3>
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
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
<?php $this->load->view('adm/menu',$path);?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Maintenance</a> <span class="divider">></span></li>
                <li><a href="#">Reporting</a> <span class="divider">></span></li>
                <li class="active">Edit</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
		</div>
        <div class="workplace" id="workplace">
        <input type="hidden" name="id" id="maintenance_request_id" value="<?php echo $obj->id;?>" class="inp_maintenance">
        <input type="hidden" name="createuser" id="createuser" value="<?php echo $this->session->userdata['username'];?>">
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
									<a role="button" class="btn btn-small tip" title="Simpan" data-toggle="modal" id="btn_save"><span class="icon-ok icon-white"></span> Simpan</a>
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
                        <div class="row-form clearfix">
                            <div class="span3">Jenis</div>
                            <div class="span9">
								<?php echo $obj->maintenance_type;?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php if($obj->maintenance_type=='pelanggan'){?>
								<?php echo $tomaintain->client->name;?>
								<?php }else{?>
								<?php echo $tomaintain->name;?>
								<?php }?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Lokasi</div>
                            <div class="span9">
								<?php echo $tomaintain->location;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Sifat</div>
                            <div class="span9">
								<?php echo $obj->period;?>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <div class="span3">Waktu</div>
                            <div class="span4">
								<?php echo form_input('required_time1',$required_time1,'id="required_time1" class="datepicker inp_maintenance"');?>
                            </div>
                            <div class="span2"><?php echo form_dropdown('hour1',$hours,0,'class="dttime" parent="required_time1"');?></label></div>
                            <div class="span2"><?php echo form_dropdown('minute1',$minutes,0,'class="dttime" grandparent="required_time1"');?></label>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">s/d</div>
                            <div class="span4">
								<?php echo form_input('required_time2',$required_time2,'id="required_time2" class="datepicker inp_maintenance"');?>
                            </div>
                            <div class="span2"><?php echo form_dropdown('hour2',$hours,0,'class="dttime" parent="required_time2"');?></label></div>
                            <div class="span2"><?php echo form_dropdown('minute2',$minutes,0,'class="dttime" grandparent="required_time2"');?></label></div>
                            <div class="span1"><label id="timetotal"></label></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Ada Downtime ?</div>
                            <div class="span9"><?php echo form_dropdown('downtime_exist',array('1'=>'Ya','0'=>'Tidak'),$obj->downtime_exist,'id="downtime_exist" class="inp_maintenance" type="selectid"');?></div>
                        </div>
                        <div class="row-form clearfix dtdurationdiv">
                            <div class="span6">Durasi Downtime</div>
                            <div class="span3">
								<?php echo form_dropdown('downtime_duration_hour',$hours,1,'id="downtime_duration_hour" type="select"');?>
								</div>
                            <div class="span3">
								<?php echo form_dropdown('downtime_duration_minute',$minutes,1,'id="downtime_duration_minute" type="select"');?>
							</div>
						</div>
                        <div class="row-form clearfix">
                            <div class="span3">Notes</div>
                            <div class="span9"><textarea name="notes" id="notes" class="inp_maintenance" type="textarea"><?php echo $obj->notes;?></textarea></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Berbayar ?</div>
                            <div class="span9"><?php echo form_dropdown('is_payable',array('1'=>'Ya','0'=>'Tidak'),$obj->is_payable,'id="is_payable" class="inp_maintenance" type="selectid"');?></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Petugas Maintenance</h4>
                        </div>
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip btnAddOperator" title="Tambah Petugas" >
										<span class="icon-plus icon-white">
										</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="table images tOperator">
                            <thead>
                                <tr>
                                    <th width="60">Image</th>
                                    <th>Name</th>
                                    <th width="60"></th>
                                    <th width="40">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->maintenance_operator as $operator){?>
                                <tr myid="<?php echo $operator->id;?>">
                                    <td>
										<a class="fancybox" rel="group" href="<?php echo base_url();?>media/users/<?php echo $operator->name?>.jpg">
										<img src="<?php echo base_url();?>media/users/<?php echo strtolower($operator->name);?>.jpg" class="img-polaroid" width=32 height=32 />
										</a>
                                    </td>
                                    <td class="info">
										<a class="fancybox" rel="group" href="<?php echo base_url();?>media/users/<?php echo $operator->name?>.jpg"><?php echo $operator->name;?>
										</a>
                                    </td>
                                    <td>
										<?php echo $operator->amount;?>
                                    </td>
                                    <td><a><span class="icon-trash operator_remove"></span></a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>
                            <div class="right">
                            </div>
                        </div>
                    </div>

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
								<?php foreach($obj->maintenance_pics as $image){?>
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
                </div>
            </div>
            

        </div>
    </div>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/maintenances/assign.js'></script>
</body>
</html>
