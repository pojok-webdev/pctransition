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
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/maintenance_schedule_edit.js'></script>
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
                <li class="active">Edit</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" username="<?php echo $this->session->userdata['username'];?>" id="workplace">
		<input name="id" id="id" type="hidden" value="<?php echo $obj->id;?>" class="inp_maintenance">
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
                                    <button type="submit" class="btn btn-small tip" title="Quick save" id='maintenance_add_save' ><span class="icon-ok icon-white"></span> Simpan</button>
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
								<?php echo form_dropdown('maintenance_type',$maintenance_types,$obj->maintenance_type,'id="maintenance_type" class="inp_maintenance" type="selectid"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo form_dropdown('nameofmtype',array(),$obj->nameofmtype,'id="nameofmtype" class="inp_maintenance" type="selectid"');?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Tgl Maintenance</div>
                            <?php
                            $mdate = Common::longsql_to_datepart($obj->mdatetime)
                            ?>
                            <div class="span5"><input type="text" name="mdatetime" value="<?php echo (!is_null($obj->mdatetime))?$mdate['day'] .'/'. $mdate['month'].'/'.$mdate['year']:'';?>" class="datepicker inp_maintenance" id='mdatetime' /></div>
								<div class="span2">
									<?php echo form_dropdown('mhour',$hours,$mdate['hour'],'id="mhour" class="dttime" parent="mdatetime"');?>
								</div>
								<div class="span2">
									<?php echo form_dropdown('mminute',$minutes,$mdate['minute'],'id="mminute" class="dttime" grandparent="mdatetime"');?>
								</div>
							</div>
						</div>
                        <div class="row-form clearfix">
                            <div class="span3">Waktu yang diinginkan</div>
                            <div class="span9">
                            <?php echo form_dropdown('period_type',$periode_type,$obj->period_type,'id="periode_type" class="inp_maintenance"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Jadwal Reminder</div>
                            <div class="span9">
                            <?php echo form_dropdown('reminder',$reminder,$obj->reminder,'id="reminder" class="inp_maintenance" type="selectid"');?>
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
                            <?php echo form_dropdown('ispayable',array('0'=>'Tidak','1'=>'Ya'),$obj->id,'id="is_payable" class="inp_maintenance" type="selectid"');?>
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
