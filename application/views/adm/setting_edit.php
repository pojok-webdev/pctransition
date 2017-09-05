<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/radu.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Sales/surveys/edit.js'></script>
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
    <div id="dWarning" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Tanggal Survey harus diisi.</p>
        </div>
    </div>
    <div class="header" id="myheader" user_id="<?php echo $this->ionuser->id;?>" username="<?php echo $this->session->userdata['username'];?>">
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
                <li class="active">Add</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace" client_id="<?php echo $obj->id;?>">
        <input type="hidden" name="client_id" value="<?php echo $obj->client_id;?>" class="surveyrequest surveysite clientsite ">
        <input type="hidden" id="client_site_id" name="id" value="<?php echo $obj->client_site_id;?>" class="clientsite ">
        <input type="hidden" id="survey_site_id" name="id" value="<?php echo $obj->id;?>" class="surveysite ">
        <input type="hidden" name="sale_id" value="<?php echo $this->ionuser->id;?>" class="surveysite clientsite ">
        <input type="hidden" name="id" id="survey_request_id" value="<?php echo $obj->survey_request_id;?>" class="surveyrequest">
        <input type="hidden" name="createuser" value="<?php echo $this->ionuser->username;?>" class="surveysite clientsite surveyrequest">
	<div class="block-fluid without-head">
		<div class="toolbar clearfix">
			<div class="right">
				<div class="btn-group">
					<button class='btn btn-small btn-warning tip' title='Simpan' id='survey_save'  value='<?php echo $obj->id;?>'><span class="icon-ok icon-white"></span> Simpan</button>
				</div>
			</div>
		</div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Data Pelanggan</h4>
                        </div>
                        <div class="row-form clearfix">
			<div class="span3">Nama</div>
			<div class="span9">
				<?php echo form_input('client_id',$obj->client_site->client->name,'id="client_id" readonly');?>
			</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">PIC</div>
                            <div class="span9">
				<?php echo form_input('pic_name',$obj->pic_name,'id="pic_name" readonly');?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span2">
				<input type="text" name="pic_phone_area" id="pic_phone_area" value="<?php echo $obj->pic_phone_area;?>" readonly/>
                            </div>
                            <div class="span7">
				<input type="text" name="pic_phone" id="pic_phone" value="<?php echo $obj->pic_phone;?>" readonly/>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">PIC Position</div>
                            <div class="span9">
				<input type="text" name="pic_position" id="pic_position" value="<?php echo $obj->pic_position;?>" readonly/>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="pic_email" id="pic_email" value="<?php echo $obj->pic_email?>" readonly/>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Alamat</div>
                            <div class="span9">
				<?php echo form_input('address',$obj->address,'id="address" readonly');?>
			</div>
                        </div>
                        <div class="row-form clearfix">
		<div class="span3">Layanan</div>
		<div class="span9">
			<?php echo $obj->service_interested_to;?>
		</div>
                        </div>
                    </div>
                </div>
                <div class="span6 clearfix">
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Data Cabang Pelanggan yang hendak disurvey</h4>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Instalasi di Cabang PadiNET</div>
                            <div class="span9">
			<?php echo form_dropdown('install_area',$branches,$obj->branch_id,'id="install_area" class="surveyrequest clientsite" type="selectid"');?>
			</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Alamat Cabang</div>
                            <div class="span9">
			<?php echo form_input('address',$obj->address,'id="site_address"  class="surveyrequest surveysite clientsite emptycheck"');?>
			</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Kota</div>
                            <div class="span9">
			<?php echo form_input('city',$obj->city,'id="site_city"  class="surveyrequest surveysite clientsite emptycheck"');?>
			</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">PIC Cabang</div>
                            <div class="span9">
				<input type="text" name="pic_name"  value='<?php echo $obj->pic_name;?>' id='site_pic' class="surveyrequest surveysite emptycheck"/>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span2">
			<input type="text" name="pic_phone_area" id="pic_phone_area" value="<?php echo $obj->pic_phone_area;?>" class="surveyrequest surveysite clientsite emptycheck"/>
			</div>
			<div class="span7">
			<input type="text" name="pic_phone" id="pic_phone" value="<?php echo $obj->pic_phone;?>" class="surveyrequest surveysite clientsite emptycheck"/>
			</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">PIC Position</div>
                            <div class="span9">
				<input type="text" name="pic_position" id="site_pic_position" class="surveyrequest surveysite emptycheck"value="<?php echo $obj->pic_position;?>"/>
                            </div>
                        </div>
		<div class="row-form clearfix">
			<div class="span3">Email PIC Cabang</div>
			<div class="span9">
				<input type="text" name="pic_email"  value='<?php echo $obj->pic_email;?>' id='site_pic_email' class="surveyrequest surveysite emptycheck" />
                            </div>
                        </div>
                        <div class="row-form clearfix">
			<div class="span3">Tgl Survey</div>
			<div class="span5">
			<input type="text" name="survey_date"  id='survey_date' value="<?php echo date('d/m/Y')?>" class="surveyrequest surveysite datepicker emptycheck" />
			</div>
			<div class="span2">
				<?php echo form_dropdown('filterhour1',$hours,8,'id="filterhour1" class="dttime" parent="survey_date"');?>
			</div>
			<div class="span2">
				<?php echo form_dropdown('filterminute1',$minutes,'','id="filterminute1" class="dttime" grandparent="survey_date"');?>
			</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9">
				<textarea name="description" id="resume" class="surveyrequest surveysite" type="textarea"><?php echo $obj->longresume?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
