<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('adm/head'); ?>
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
        <div id="dChangePassword" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Konfirmasi</h3>
            </div>
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="block-fluid without-head">
                            <div class="row-form clearfix">
                                <div class="span3">Password</div>
                                <div class="span9">
                                    <input type='text' name='password' id='password'>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Konfirmasi Password</div>
                                <div class="span9"><input type="text" name="konfirmasipassword" id="konfirmasipassword" value=""/></div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <button class="btn closemodal" type="button" id='btnsavepassword'>Simpan</button>
                        <button class="btn closemodal" type="button">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="dPicEdit" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myPicEditModalLabel">Konfirmasi</h3>
            </div>
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="block-fluid without-head">
                            <div class="row-form clearfix">
                                <div class="span3">Nama</div>
                                <div class="span9">
                                    <input type='text' name='picname' id='picname'>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Telepon</div>
                                <div class="span9"><input type="text" name="pictelp" id="pictelp" value=""/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">HP</div>
                                <div class="span9"><input type="text" name="pichp" id="pichp" value=""/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Email</div>
                                <div class="span9">
                                    <input type='text' name='picemail' id='picemail'>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Jabatan</div>
                                <div class="span9"><input type="text" name="picposition" id="picposition" value=""/></div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <button class="btn closemodal" type="button" id='btnupdatepic'>Simpan</button>
                        <button class="btn closemodal" type="button">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    <div id="dAddFollowup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Follow Up</h3>
        </div>
        <div class="row-fluid">
            <div class="block-fluid">
                <div class="row-form clearfix">
                    <div class="span3">Tanggal:</div>
                    <div class="span9"><input type="text" class="datepicker" name="followupdate" id="followupdate"></div>
                </div>
                <div class="row-form clearfix">
                    <div class="span3">Keterangan:</div>
                    <div class="span9"><textarea id="description" name="description"></textarea></div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-warning btnclose" data-dismiss="modal" aria-hidden="true" id="btnsavefollowup">Simpan</button>
            <button class="btn btnclose" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>            
        <div id="dAddPic" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Penambahan PIC</h3>
            </div>
            <div class="row-fluid">
                <div class="block-fluid">
                    <div class="row-form clearfix">
                        <div class="span3">Nama:</div>
                        <div class="span9"><input type="text" class="inp_pic" name="name" id="pic_name" placeholder="Nama PIC"></div>
                    </div>
                    <div class="row-form clearfix">
                        <div class="span3">Posisi:</div>
                        <div class="span9"><?php echo form_dropdown("position", $positions, 1, 'class="inp_pic" id="pic_position" type="select"'); ?></div>
                    </div>
                    <div class="row-form clearfix">
                        <div class="span3">HP:</div>
                        <div class="span9"><input type="text" class="inp_pic" id="pic_hp" name="hp" placeholder="HP/Telepon"></div>
                    </div>
                    <div class="row-form clearfix">
                        <div class="span3">Email:</div>
                        <div class="span9"><input type="text" class="inp_pic" id="pic_email" name="email" placeholder="Email"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning btnclose" data-dismiss="modal" aria-hidden="true" id="btnsavepic">Simpan</button>
                <button class="btn btnclose" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
        <div class="header">
            <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiApp" title="PadiApp"/></a>
            <ul class="header_menu">
                <li class="list_icon"><a href="#">&nbsp;</a></li>
            </ul>
        </div>
        <?php $this->load->view('adm/menu'); ?>
        <div class="content">
            <div class="breadLine">
                <ul class="breadcrumb">
                    <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                    <li><a href="#">Suspect</a> <span class="divider">></span></li>
                    <li class="active">Edit</li>
                </ul>
            </div>
            <div class="workplace" id='#workplace' client_id='<?php echo $obj->id; ?>'>
                <input type="hidden" name="id" id="myid" value="<?php echo $obj->id; ?>" class="" />
                <input type="hidden" name="client_id" id="client_id" value="<?php echo $obj->client_id; ?>" class="inp_pic" />
                <div class="row-fluid">
                    <div class="span6">
                        <div class="head clearfix">
                            <div class="isw-documents"></div>
                            <h1>Edit Suspect</h1>
                        </div>
                        <div class="block-fluid">
                            <div class="row-form clearfix">
                                <div class="span3">Nama:</div>
                                <div class="span9"><input type="text" placeholder="Nama..." value="<?php echo $obj->name; ?>" name='name' id='name' class='suspectfield'/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Alamat:</div>
                                <div class="span9"><input type="text" placeholder="Nama..." value="<?php echo $obj->address; ?>" name='address' id='address' class='suspectfield'/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Kota:</div>
                                <div class="span9"><input type="text" placeholder="Nama..." value="<?php echo $obj->city; ?>" name='city' id='city' class='suspectfield'/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Phone:</div>
                                <div class="span2">
                                    <input type="text" value="<?php echo $obj->phone_area; ?> " name="phone_area" id="phone_area"  class='suspectfield'/>
                                </div>
                                <div class="span7">
                                    <input type="text" value="<?php echo $obj->phone; ?> " name="phone" id="phone"  class='suspectfield'/>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Fax:</div>
                                <div class="span2">
                                    <input type="text" value="<?php echo $obj->fax_area; ?> " name="fax_area" id="fax_area"  class='suspectfield'/>
                                </div>
                                <div class="span7">
                                    <input type="text" value="<?php echo $obj->fax; ?> " name="fax" id="fax" class='suspectfield' />
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Jenis Bisnis:</div>
                                <div class="span9"><?php echo form_dropdown('business_field', $businesstypes, $obj->business_field, 'id="business_field" class="suspectfield" type="select"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Memiliki koneksi Internet:</div>
                                <div class="span9">
                                    <?php echo form_dropdown('has_internet_connection', array( '1' => 'Iya','0' => 'Tidak'), $obj->has_internet_connection, 'id="has_internet_connection" class="suspectfield" type="selectid"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix has_internet_connection">
                                <div class="span3">Media:</div>
                                <div class="span9">
                                    <?php echo form_dropdown('media', $medias, Media::getIndex($obj->media), 'id="media" class="suspectfield hic" type="select"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix has_internet_connection">
                                <div class="span3">Kecepatan:</div>
                                <div class="span9">
                                    <?php echo form_dropdown('speed', $speeds, Speed::getIndex($obj->speed), 'id="speed" class="suspectfield hic" type="select"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix has_internet_connection">
                                <div class="span3">Rasio:</div>
                                <div class="span9"><input type="text" placeholder="Rasio" value="<?php echo $obj->ratio; ?>" id='ratio'  name='ratio' class='suspectfield hic'/></div>
                            </div>
                            <div class="row-form clearfix has_internet_connection">
                                <div class="span3">Durasi:</div>
                                <div class="span9">
                                    <?php echo form_dropdown('duration', $durations, Duration::getIndex($obj->duration), 'id="duration" class="suspectfield hic" type="select"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix has_internet_connection">
                                <div class="span3">Lama penggunaan:</div>
                                <div class="span9">
                                    <?php echo form_dropdown('usage_period', $usage_periods, Usage_period::getIndex($obj->usage_period), 'id="usage_period" class="suspectfield hic" type="select"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix has_internet_connection">
                                <div class="span3">Jumlah Pengguna:</div>
                                <div class="span9">
                                    <?php echo form_dropdown('user_amount', $internet_users, Internet_user::getIndex($obj->user_amount), 'id="user_amount" class="suspectfield hic" type="select"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix has_internet_connection">
                                <div class="span3">Biaya:</div>
                                <div class="span9">
                                    <?php echo form_dropdown('fee', $internet_fees, Internet_fee::getIndex($obj->fee), 'id="fee" class="suspectfield hic" type="select"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix has_internet_connection">
                                <div class="span3">Operator:</div>
                                <div class="span9">
                                    <?php echo form_dropdown('operator', $operators, Operator::getIndex($obj->operator), 'id="operator" class="suspectfield hic" type="select"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix has_internet_connection">
                                <div class="span3">Akhir Kontrak:</div>
                                <div class="span9"><input type="text" placeholder="Akhir kontrak" value="<?php echo ($obj->end_of_contract == null) ? '' : Common::sql_to_human_date($obj->end_of_contract); ?>" id='end_of_contract'  name='end_of_contract' class='dtpicker suspectfield hic'/></div>
                            </div>
                            <div class="row-form clearfix has_internet_connection">
                                <div class="span3">Permasalahan yg sering dihadapi:</div>
                                <div class="span9">
                                    <?php echo form_dropdown('problems', $problems, Problem::getIndex($obj->problems), 'id="problems" class="suspectfield hic" type="select"'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="head clearfix">
                            <div class="isw-grid"></div>
                            <h1>...</h1>
                            <ul class="buttons">
                                <li><span class="isw-ok" id="btnsave" title="simpan"></span></li>
                            </ul>
                        </div>
                        <div class="block-fluid">
                            <div class="row-form clearfix">
                                <div class="span3">Ada kebutuhan Internet:</div>
                                <div class="span9">
                                    <?php echo form_dropdown('internet_demand', array('0' => 'Tidak', '1' => 'Iya'), $obj->internet_demand, 'id="internet_demand" class="suspectfield" type="selectid"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Tahu PadiNET:</div>
                                <div class="span9">
                                    <?php echo form_dropdown('known_us', array('0' => 'Tidak', '1' => 'Iya'), $obj->known_us, 'id="known_us" class="suspectfield" type="selectid"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Tahu dari:</div>
                                <div class="span9"><input type="text" placeholder="Tahu PadiNET dari ..." value="<?php echo $obj->known_from; ?>" id='known_from' name='known_from' class='suspectfield'/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Tertarik berlangganan:</div>
                                <div class="span9"><?php echo form_dropdown('interested', array(1 => 'Ya', 0 => 'Tidak'), $obj->interested, 'id="interested" class="suspectfield" type="selectid"'); ?></div>
                            </div>
                            <div class="row-form clearfix notinterested">
                                <div class="span3">Alasan tidak tertarik:</div>
                                <div class="span9"><input type="text" placeholder="Alasan tidak tertarik" value="<?php echo $obj->reason2not_interested; ?>" id='reason2not_interested'  name='reason2not_interested' class='suspectfield' /></div>
                            </div>
                            <div class="row-form clearfix interested">
                                <div class="span3">Layanan yang diminati:</div>
                                <div class="span9">
                                    <?php echo form_dropdown('service_interested_to', $services, $obj->service_interested_to, 'id="service_interested_to" class="suspectfield" type="select"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix interested">
                                <div class="span3">Budget:</div>
                                <div class="span9">
                                    <?php echo form_dropdown('budget', $budgets, Budget::getId($obj->budget), 'id="budget" class="suspectfield" type="select"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix interested">
                                <?php
                                $fu = Common::longsql_to_datepart($obj->follow_up);
                                ?>
                                <div class="span3">Tgl Follow Up:</div>
                                <div class="span5">
                                    <input type="text" placeholder="Tgl Follow Up" value="<?php echo ($obj->follow_up == null) ? '' : $fu['day'] . '/' . $fu['month'] . '/' . $fu['year']; ?>" id='follow_up'  name='follow_up' class='datepicker suspectfield'/>
                                </div>
                                <div class="span2">
                                    <?php echo form_dropdown('fuhour', $hours, $fu['hour'], 'parent="follow_up" class="dttime"'); ?>
                                </div>
                                <div class="span2">
                                    <?php echo form_dropdown('fuminute', $minutes, $fu['minute'], 'grandparent="follow_up" class="dttime"'); ?>
                                </div>
                            </div>
                            <div class="row-form clearfix interested">
                                <?php
                                $it = Common::longsql_to_datepart($obj->implementation_target);
                                ?>
                                <div class="span3">Target Implementasi:</div>
                                <div class="span5">
                                    <input type="text" placeholder="Target Implementasi" value="<?php echo ($obj->implementation_target == null) ? '' : $it['day'] . '/' . $it['month'] . '/' . $it['year']; ?>" id='implementation_target'  name='implementation_target' class='datepicker suspectfield'/>
                                </div>
                                <div class="span2">
                                    <?php echo form_dropdown('ithour', $hours, $it['hour'], 'parent="implementation_target" class="dttime"'); ?>
                                </div>
                                <div class="span2">
                                    <?php echo form_dropdown('itminute', $minutes, $it['minute'], 'grandparent="implementation_target" class="dttime"'); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="span6">
                        <div class="block-fluid without-head">
                            <div class="toolbar nopadding-toolbar clearfix">
                                <h4>Daftar PIC</h4>
                            </div>
                            <div class="toolbar clearfix paditablehead">
                                <div class="left">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-small btn-danger tip addPic">
                                            <span class="icon-plus icon-white"></span>
                                        </button>
                                        <button type="button" class="btn btn-small addPic">Penambahan PIC</button>
                                    </div>
                                </div>
                            </div>
                            <table cellpadding="0" cellspacing="0" width="100%" class="table images material" id="tPic">
                                <thead>
                                    <tr>
                                        <th width="60">Nama</th>
                                        <th>Telp/Email</th>
                                        <th width="60">Jabatan</th>
                                        <th width="40">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pics as $pic) { ?>
                                        <tr thisid="<?php echo $pic->id; ?>">
                                            <td><a><?php echo $pic->name ?></a></td>
                                            <td class="info">
                                                <a><?php echo $pic->telp_hp . " " .$pic->hp; ?></a>
                                                <?php echo $pic->email; ?>
                                            </td>
                                            <td class="position"><?php echo $pic->position; ?></td>
                                            <td>
                                                <a><span class="icon-remove pic_remove"></span></a>
                                                <a><span class="icon-edit pic_edit"></span></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
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
							<h4>History Followup</h4>
						</div>
						<div class="toolbar clearfix paditablehead">
							<div class="left">
								<div class="btn-group">
									<button type="button" class="btn btn-small btn-danger tip btnaddFollowup">
									<span class="icon-plus icon-white"></span>
									</button>
									<button type="button" class="btn btn-small btnaddFollowup" id="btnaddFollowup">Penambahan Followup</button>
								</div>
							</div>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="table images material" id="tFollowup">
							<thead>
								<tr>
									<th width="60">Tanggal</th>
									<th width="60">Keterangan</th>
									<th width="40">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($followups as $fu){?>
								<tr thisid="<?php echo $fu->id;?>">
									<td><a><?php echo $fu->followupdate?></a></td>
									<td class="info"><a><?php echo $fu->description;?></a></td>
									<td><a><span class="icon-remove followup_remove"></span></a></td>
								</tr>
								<?php }?>
							</tbody>
						</table>
						<div class="toolbar bottom-toolbar clearfix">
							<div class="left">
							</div>
							<div class="right">
								Total : <span id="total_followup"><?php echo $totalfollowups;?></span>
							</div>
						</div>
					</div>



                    </div>
                </div>
            </div>
        </div>
        <script type='text/javascript' src='<?php echo base_url(); ?>js/aquarius/suspects/edit.js'></script>
    </body>
</html>
