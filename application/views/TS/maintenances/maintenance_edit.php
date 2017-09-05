<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/maintenance_edit.js'></script>
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
    <div id="dModalOperator" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Operator</h3>
        </div>
        <div class="modal-body">
        <p>
		<div class="row-fluid">
			<div class="span12">
				<div class="block">
					<ul class="the-icons clearfix">
						<?php foreach(User::get_user_by_group('TS') as $user){?>
							<li username='<?php echo $user->username;?>'><img src="<?php echo base_url();?>media/users/<?php echo $user->username;?>.jpg" width=32 height=32 class="img-polaroid petugasMaintenance"/><a class="petugasMaintenance" id='<?php echo $user->id;?>' survey_id='<?php echo $obj->id;?>'><?php echo $user->username;?></a></li>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
		</p>
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
                <li><a href="#">Maintenance Report</a> <span class="divider">></span></li>
                <li class="active">Edit</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
		</div>
        <div class="workplace" id="workplace" maintenance_id="<?php echo $obj->id;?>" username="<?php echo $this->session->userdata['username'];?>">
        <input type="hidden" name="id" value="<?php echo $obj->id;?>" class="inp_maintenance">
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
									<a href="#dModal" role="button"  class="btn btn-small btn-warning tip" title="Simpan" data-toggle="modal" id='btn_save' value='<?php echo $obj->id;?>'><span class="icon-ok icon-white"></span></a>
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
								<?php echo $obj->client_site->client->name;?>
								<?php }else{?>
								<?php echo form_dropdown('nameofmtype',array(),$obj->nameofmtype,'id="nameofmtype" class="inp_maintenance" type="selectid"');?>
								<?php }?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Lokasi</div>
                            <div class="span9">
								<?php echo $obj->client_site->address;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Pendamping</div>
                            <div class="span9">
								<?php echo $obj->client_site->pic_name;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Jabatan</div>
                            <div class="span9">
								<?php echo $obj->client_site->pic_position;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span2">
								<?php echo $obj->client_site->pic_phone_area;?>
                            </div>
                            <div class="span7">
								<?php echo $obj->client_site->pic_phone;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9">
								<?php echo $obj->client_site->pic_email?>
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
                            <div class="span3">Sifat</div>
                            <div class="span9"><?php echo form_dropdown('period_type',$periods,$obj->period_type,'id="period" class="inp_maintenance" type="select"');?></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Waktu</div>
                            <div class="span4"><?php echo form_input('required_time1x',$required_time1,'id="required_time1x" class="datetimepicker"');?></div>
                            <div class="span1"> s/d </div>
                            <div class="span4"><?php echo form_input('required_time2x',$required_time2,'id="required_time2x" class="datetimepicker"');?></div>
                            <div class="span4"><label id="timetotal"></label></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Ada Downtime ?</div>
                            <div class="span9"><?php echo form_dropdown('downtime_exist',array('1'=>'Ya','0'=>'Tidak'),$obj->downtime_exist,'id="downtime_exist" class="inp_maintenance"');?></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span6">Durasi Downtime</div>
                            <div class="span3">
								<input type="text" name="downtime_duration_hour" id="downtime_duration_hour" class="inp_maintenance" placeholder="Jam" />
								</div>
                            <div class="span3">
								<input type="text" name="downtime_duration_minute" id="downtime_duration_minute" class="inp_maintenance" placeholder="Menit" />
							</div>
						</div>
                        <div class="row-form clearfix">
                            <div class="span3">Notes</div>
                            <div class="span9"><textarea name="notes" id="notes" class="inp_maintenance" type="textarea"><?php echo $obj->notes;?></textarea></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Berbayar ?</div>
                            <div class="span9"><?php echo form_dropdown('ispayable',array('1'=>'Ya','0'=>'Tidak'),$obj->ispayable,'id="payable" class="inp_maintenance" type="selectid"');?></div>
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
                                    <button type="button" class="btn btn-small btn-danger tip link_navPopMaintenanceOperator" title="Tambah Petugas" ><span class="icon-plus icon-white"></span></button>
                                </div>
                            </div>
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="table images material operator">
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
                                <tr>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>media/users/<?php echo $operator->name?>.jpg"><img src="<?php echo base_url();?>media/users/<?php echo $operator->name;?>.jpg" class="img-polaroid" width=32 height=32 /></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="<?php echo base_url();?>media/users/<?php echo $operator->name?>.jpg"><?php echo $operator->name;?></a></td>
                                    <td><?php echo $operator->amount;?></td>
                                    <td><a><span class="icon-trash operator_remove" id='<?php echo $operator->id;?>'></span></a></td>
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
                </div>
            </div>
        </div>
    </div>
</body>
</html>
