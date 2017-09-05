<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<?php
$data = array(
'csspath' => $csspath,
'jspath' => $jspath,
'imagepath' => $imagepath,
);
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/maintenance_schedule_add.js'></script>
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
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET App" title="PadiNET App"/></a>
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
                <li class="active">Add</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" username="<?php echo $this->session->userdata['username'];?>" id="workplace">
		<input type="hidden" name="createuser" value="<?php echo $this->session->userdata['username'];?>" class="inp_maintenance" />
		<input type="hidden" name="user_id" value="<?php echo $this->session->userdata['user_id'];?>" class="inp_maintenance" />
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
                                    <button type="submit" class="btn btn-small btn-warning tip" title="Simpan" id='maintenance_add_save' ><span class="icon-ok icon-white"></span></button>
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
								<select name='maintenance_type' id='maintenance_type' class="inp_maintenance" type="selectid">
									<option value='backbone'>Backbone</option>
									<option value='datacenter'>Data Center</option>
									<option value='bts'>BTS</option>
									<option value='pelanggan'>Pelanggan</option>
								</select>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo form_dropdown('nameofmtype',array(),1,'id="nameofmtype" class="inp_maintenance" type="selectid"');?>
							</div>
                        </div>
                        <div class="row-form clearfix client_site_id">
                            <div class="span3">Cabang Pelanggan</div>
                            <div class="span9">
								<?php echo form_dropdown('client_site_id',array(),1,'id="client_site_id" class="" type="selectid"');?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Tgl Maintenance</div>
                            <div class="span5"><input type="text" name="mdatetime" value="<?php echo (!is_null($obj->mdatetime))?Common::longsql_to_human_date($obj->maintenance_date):'';?>" class="datepicker inp_maintenance" id='mdatetime' /></div>
							<div class="span2">
								<?php echo form_dropdown('mhour',$hours,'','id="mhour" class="dttime" parent="mdatetime"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('mminute',$minutes,'','id="mminute" class="dttime" grandparent="mdatetime"');?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Waktu yang diinginkan</div>
                            <div class="span9">
                            <?php echo form_dropdown('period_type',$periode_type,'1','id="periode_type" class="inp_maintenance" type="selectid"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Jadwal Reminder</div>
                            <div class="span9">
                            <?php echo form_dropdown('reminder',$reminder,'1','id="reminder" class="inp_maintenance" type="selectid"');?>
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
                            <div class="span3">Berbayar ?</div>
                            <div class="span9">
                            <?php echo form_dropdown('ispayable',array('0'=>'Tidak','1'=>'Ya'),'1','id="is_payable" class="inp_maintenance" type="selectid"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9"><textarea name="description" id="description" class="inp_maintenance" type="textarea"><?php echo $obj->description?></textarea></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                </div>
                <div class="span6">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
