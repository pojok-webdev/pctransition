<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('adm/head') ?>
    <script type='text/javascript' src='<?php echo base_url();?>js/padilibs/padi.sendmail.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>js/aquarius/Sales/surveys/add.js'></script>
    <body>
		<?php $this->load->view("Sales/surveys/addModal");?>
	<div class="header" id="myheader" user_id="<?php echo $this->ionuser->id; ?>" username="<?php echo $this->session->userdata['username']; ?>">
		<a class="logo" href="index.html"><img src="<?php echo base_url(); ?>img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/></a>
		<ul class="header_menu">
			<li class="list_icon"><a href="#">&nbsp;</a></li>
		</ul>
	</div>
	<?php $this->load->view('adm/menu'); ?>
        <div class="content">
            <div class="breadLine">
                <ul class="breadcrumb">
                    <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                    <li><a href="#">Survey</a> <span class="divider">></span></li>
                    <li class="active">Add</li>
                </ul>
                <?php $this->load->view('adm/buttons'); ?>
            </div>
            <div class="workplace" id="workplace" client_id="<?php echo $obj->id; ?>">
                <input type="hidden" name="client_id" id="clientid" value="<?php echo $obj->id; ?>" class="surveyrequest surveysite clientsite inp_pic">
                <input type="hidden" name="sale_id" value="<?php echo $this->ionuser->id; ?>" class="surveysite clientsite ">
                <input type="hidden" name="createuser" id="createuser" value="<?php echo $this->ionuser->username; ?>" class="surveysite clientsite surveyrequest">
                <input type="hidden" name="branch_id" value="<?php echo $user->branch->id; ?>" class="clientsite">
                <div class="block-fluid without-head">
                    <div class="toolbar clearfix">
                        <div class="right">
                            <div class="btn-group">
                                <button class='btn btn-small btn-warning tip' title='Simpan' id='survey_save'  value='<?php echo $obj->id; ?>'><span class="icon-ok icon-white"></span> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
					<div class="span12">
						<div class="block-fluid without-head">
                            <div class="row-form clearfix">
                                <div class="span3" id="tslabel">Area TS Cabang Yang menangani <?php //echo $obj->branches;?></div>
                                <div class="span3">
									<?php
									// for($i=1;$i<=count($branches);$i++){
									 foreach($branches as $k=>$v){
										?>
										<?php
										//echo $i;
											$ischecked = false;
/*											$checked = "";
											$pos = strpos($obj->branches,strval($i));
											if($pos!==false){
												$checked = "checked";
											}else{
												$checked = "";
											}*/
//											for($j=0;$j<count($userbranches);$j++){
											foreach($userbranches as $key=>$val){
												//echo $userbranches[$j] . "<br />";
												if($key===$k){
													//echo $userbranches[$j] . " AND " . $i . "<br />";
													$ischecked = true;
												}
											}
											if ($ischecked) {
												$checked = "checked";
											}else{
												$checked = "";
											}
										?>
										<input type="checkbox" class="tsbranch" <?php echo $checked;?> value="<?php echo $k;?>"><?php echo $branches[$k];?>
									<?php }?>
                                </div>
                                <div class="span3">Area Sales</div>
                                <div class="span3">
									<!--
									untuk pejabat dg cabang > 1, dapat memilih cabang mana yang sales nya memperoleh email
									-->
									<?php 
									//for($i=0;$i<count($userbranches);$i++){
									if(count($userbranches)===1){
										$checked = "checked='checked'";
									}else{
										$checked = "";
									}
									foreach($userbranches as $cbranch){
										echo "<input type='checkbox' $checked class='salesbranch' value=".$cbranch." >".getbranch($cbranch);
									}?>
                                </div>
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
                                    <?php echo form_input('client_id', $obj->name, 'id="client_id" readonly'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
							<div class="row-form clearfix">
							<div class="head clearfix">
								<div></div>
								<h1>PIC Pusat</h1>
								<ul class="buttons">
								<li>
									<a id="btnAddPic" class="isw-plus"></a>
								</li>
								</ul>
							</div>
							<div class="block-fluid users" id="listusers">
								<?php foreach($pics as $pic){?>
								<div class="item clearfix piclists" picid=<?php echo $pic->id;?>>
								  <div class="infopic">
									  <div>
									  <a class="name"><?php echo $pic->name;?></a><br />
									  <?php echo $pic->position;?><p />

									  </div>
									  <span><?php echo $pic->email;?><br /><?php echo $pic->hp;?></span>

									  <div class="controls">
										<a class="icon-pencil edit_pic"></a>
										<a class="icon-remove remove_pic"></a>
									  </div>
								  </div>
								</div>
								<?php }?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Alamat</div>
							<div class="span9">
								<?php echo form_input('address', $obj->address, 'id="address" readonly'); ?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Layanan</div>
							<div class="span9">
								<?php echo form_dropdown("service_id",$services,$obj->service_interested_to,'class="surveyrequest clientsite" type="selectid"');?>
							</div>
						</div>
                        </div>
                    </div>
				</div>
                    <div class="span6 clearfix">
                        <div class="block-fluid without-head">
                            <div class="toolbar nopadding-toolbar clearfix">
                                <h4>Data Cabang Pelanggan yang hendak disurvey, diisi jika site berbeda</h4>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Instalasi di Cabang PadiNET</div>
                                <div class="span9">
                                    <?php echo form_dropdown('install_area', $branches, $obj->branch_id, 'id="install_area" class="surveyrequest clientsite" type="selectid"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Alamat Cabang</div>
                                <div class="span9">
                                    <?php echo form_input('address', $obj->address, 'id="site_address"  class="surveyrequest surveysite clientsite emptycheck"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Kota</div>
                                <div class="span9">
                                    <?php echo form_input('city', $obj->city, 'id="site_city"  class="surveyrequest surveysite clientsite emptycheck"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">PIC Cabang</div>
                                <div class="span9">
                                    <input type="text" name="pic_name"  value='<?php echo $obj->pic->name; ?>' id='site_pic' class="surveyrequest surveysite emptycheck"/>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Telepon</div>
                                <div class="span2">
                                    <input type="text" name="pic_phone_area" id="pic_phone_area" value="<?php echo $obj->phone_area; ?>" class="surveyrequest surveysite clientsite emptycheck"/>
                                </div>
                                <div class="span7">
                                    <input type="text" name="pic_phone" id="pic_phone" value="<?php echo $obj->phone; ?>" class="surveyrequest surveysite clientsite emptycheck"/>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">PIC Position</div>
                                <div class="span9">
                                    <input type="text" name="pic_position" id="site_pic_position" class="surveyrequest surveysite emptycheck"value="<?php echo $obj->pic->position; ?>"/>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Email PIC Cabang</div>
                                <div class="span9">
                                    <input type="text" name="pic_email"  value='<?php echo $obj->pic->email; ?>' id='site_pic_email' class="surveyrequest surveysite emptycheck" />
                                </div>
                            </div>
                            <div class="row-form clearfix">

                            <div class="row-form clearfix">
                                <div class="span3">Tgl Survey</div>
                                <div class="span5">
                                    <input type="text" name="survey_date"  id='survey_date' value="<?php echo date('d/m/Y') ?>" class="surveyrequest surveysite datepicker emptycheck" />
                                </div>
                                <div class="span2">
                                    <?php echo form_dropdown('filterhour1', $hours, 8, 'id="filterhour1" class="dttime" parent="survey_date"'); ?>
                                </div>
                                <div class="span2">
                                    <?php echo form_dropdown('filterminute1', $minutes, '', 'id="filterminute1" class="dttime" grandparent="survey_date"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Keterangan</div>
                                <div class="span9">
                                    <textarea name="description" id="resume" class="surveyrequest surveysite myeditor" type="textarea"><?php echo $obj->longresume ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
