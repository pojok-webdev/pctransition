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
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p><span id="modalMessage">Data telah tersimpan.</span></p>
        </div>
    </div>

    <div class="header" id="myheader" username="<?php echo $this->session->userdata['username'];?>">
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
                <li><a href="#">Survey</a> <span class="divider">></span></li>
                <li class="active">Edit</li>
            </ul>
                <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace" survey_id="<?php echo $obj->id;?>" site_id="<?php echo $obj->survey_site->id;?>">
			<div class="block-fluid without-head">
				<div class="toolbar clearfix">
					<div class="left">
					</div>
					<div class="right">
						<div class="btn-group">
							<button class="btn btn-small btn-warning tip survey_save"><span class="icon-ok icon-white"></span></button>
							<button class="btn btn-small survey_save" type="button">Simpan</button>
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
								<?php echo form_dropdown('direction',$direction,$obj->direction,'type="selectid" id="direction" class="surveypic"');?>
							</div>
						</div>
					</div>

                    <div class="block-fluid without-head">
					<div class="toolbar">
					<h4>PIC Pelanggan</h4>
					</div>
                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo form_input('client_id',$obj->client->name,'id="client_id"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC</div>
                            <div class="span9"><input type="text" name="pic_name" id="pic_name" value="<?php echo $obj->pic_name;?>" class="surveypic"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span2"><input type="text" name="pic_phone_area" id="pic_phone_area" value="<?php echo $obj->pic_phone_area;?>" class="surveypic"/></div>
                            <div class="span7"><input type="text" name="pic_phone" id="pic_phone" value="<?php echo $obj->pic_phone;?>" class="surveypic"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC Position</div>
                            <div class="span9"><input type="text" name="pic_position" id="pic_position" value="<?php echo $obj->pic_position;?>" class="surveypic"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="pic_email" id="pic_email" value="<?php echo $obj->pic_email?>" class="surveypic"/></div>
                        </div>
                    </div>
                </div>

                <div class="span6 clearfix">
                    <div class="block-fluid without-head">
						<div class="toolbar">
						<h4>Keterangan Pelanggan</h4>
						</div>
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
                            <div class="span5"><input type="text" name="survey_date"  class="datepicker surveypic" id='survey_date' value= '<?php echo $dtpart["day"] . "/" . $dtpart["month"] . "/" . $dtpart["year"];?>' /></div>
							<div class="span2">
								<?php echo form_dropdown('surveyhour',$hours,$dtpart["hour"],'id="surveyhour" class="dttime" parent="survey_date"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('surveyminute',$minutes,$dtpart["minute"],'id="surveyminute" class="dttime" grandparent="survey_date"');?>
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
                            <div class="span3">Punya Tangga ?</div>
                            <div class="span9">
								<?php echo form_dropdown('has_ladder',array('1'=>'Ya','0'=>'Tidak'),$obj->has_ladder,'id="has_ladder" class="surveypic" type="select"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9"><textarea type="textarea" name="longresume" id="longresume" class="surveypic"></textarea></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid clearfix">
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
                            <div class="span3">Alamat</div>
                            <?php $tmpaddr = (trim($obj->survey_site->address)!='')?$obj->survey_site->address:$obj->address?>
                            <div class="span9"><input type="text" name="address" id="site_address" value="<?php echo $tmpaddr;?>" class="surveysite emptycheck"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Kota</div>
                            <?php $tmpcty = (trim($obj->survey_site->city)!=''&&!is_null($obj->survey_site->city))?$obj->survey_site->city:$obj->city?>
                            <div class="span9"><input type="text" name="city" id="site_city" value="<?php echo $obj->survey_site->city;?>" class="surveysite emptycheck"/>
                            </div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC</div>
                            <?php $tmppic = (trim($obj->survey_site->pic)!=''&&!is_null($obj->survey_site->city))?$obj->survey_site->pic_name:$obj->pic_name?>
                            <div class="span9"><input type="text" name="pic" id="site_pic" value="<?php echo $obj->survey_site->pic_name;?>" class="surveysite emptycheck"/>
                            </div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Jabatan PIC</div>
                            <div class="span9"><input type="text" name="pic_position" id="site_pic_position" value="<?php echo $obj->survey_site->pic_position;?>"  class="surveysite emptycheck" /></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span2"><input type="text" name="phone_area" id="site_phone_area" value="<?php echo $obj->survey_site->pic_phone_area;?>" class="surveysite emptycheck"/></div>
                            <div class="span7"><input type="text" name="phone" id="site_phone" value="<?php echo $obj->survey_site->pic_phone;?>" class="surveysite emptycheck"/>
                            </div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="pic_email" id="site_pic_email" value="<?php echo $obj->survey_site->pic_email?>" class="surveysite emptycheck"/></div>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>
