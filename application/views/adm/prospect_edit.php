<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/prospect_edit.js'></script>
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

    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>

<?php $this->load->view('adm/menu');?>

    <div class="content">


        <div class="breadLine">

            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Client</a> <span class="divider">></span></li>
                <li class="active">Edit</li>
            </ul>

        </div>

        <div class="workplace" user_id='<?php echo $obj->id;?>'>
            <input type="hidden" id="client_id" value="<?php echo $this->uri->segment(3);?>">
            <div class="row-fluid">

                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Edit Prospect</h1>
                    </div>
                    <div class="block-fluid">

                        <div class="row-form clearfix">
                            <div class="span3">Nama:</div>
                            <div class="span9"><input type="text" placeholder="Nama..." value="<?php echo $obj->name;?>" name='name' id='name' class="inp_prospect"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Alamat:</div>
                            <div class="span9"><input type="text" placeholder="Alamat..." value="<?php echo $obj->address;?>" name='address' id='address' class="inp_prospect"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Kota:</div>
                            <div class="span9"><input type="text" placeholder="Kota..." value="<?php echo $obj->city;?>" name='city' id='city' class="inp_prospect"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Phone:</div>
                            <div class="span9">
								<input type="text" value="<?php echo $obj->phone;?> " name="phone" id="phone" class="inp_prospect" />
                            </div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Fax:</div>
                            <div class="span9">
								<input type="text" value="<?php echo $obj->fax;?> " name="fax" id="fax" class="inp_prospect" />
                            </div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Jenis Bisnis:</div>
                            <div class="span9">
								<input type='text' value="<?php echo $obj->business_field;?>" name="business_field" class="inp_prospect">
                            </div>
                        </div>

                        <div class="row-form clearfix">
							<div class="span12">PIC</div>
                            <table class="table" id="tbl_pic">
								<thead><tr><th>Nama</th><th>Email</th><th>Action</th></tr></thead>
									<tbody>
										<?php foreach($obj->pic as $pic){?>
											<tr>
												<td><?php echo $pic->name;?></td>
												<td><?php echo $pic->email;?></td>
												<td>Edit</td>
											</tr>
										<?php }?>
									</tbody>
							</table>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Memiliki koneksi Internet:</div>
                            <div class="span9">
								<?php echo form_dropdown('has_internet_connection',array('0'=>'Tidak','1'=>'Iya'),$obj->has_internet_connection,'id="has_internet_connection" class="inp_prospect" type="selectid"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Media:</div>
                            <div class="span9">
								<?php echo form_dropdown('media',$medias,Media::getIndex($obj->media),'id="media" class="inp_prospect div_has_internet_connection" type="select"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Kecepatan:</div>
                            <div class="span9">
								<?php echo form_dropdown('speed',$speeds,Speed::getIndex($obj->speed),'id="speed" class="inp_prospect div_has_internet_connection" type="select"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Rasio:</div>
                            <div class="span9"><input type="text" placeholder="Rasio" value="<?php echo $obj->ratio;?>" id='ratio'  name='ratio' class="inp_prospect div_has_internet_connection"/></div>
                        </div>

                        <div class="row-form clearfix" id="durationspace">
                            <div class="span3">Durasi:</div>
                            <div class="span9">
								<?php echo form_dropdown('duration',$durations,Duration::getIndex($obj->duration),'id="duration" class="inp_prospect div_has_internet_connection" type="select"');?>
							</div>
                        </div>

                        <div class="row-form clearfix" id="usageperiodspace">
                            <div class="span3">Lama penggunaan:</div>
                            <div class="span9">
								<?php echo form_dropdown('usage_period',$usage_periods,Usage_period::getIndex($obj->usage_period),'id="usage_period" class="inp_prospect div_has_internet_connection" type="select"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Jumlah Pengguna:</div>
                            <div class="span9">
								<?php echo form_dropdown('user_amount',$internet_users,Internet_user::getIndex($obj->user_amount),'id="user_amount" class="inp_prospect div_has_internet_connection" type="select"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Biaya:</div>
                            <div class="span9">
								<?php echo form_dropdown('fee',$internet_fees,Internet_fee::getIndex($obj->fee),'id="user_amount" class="inp_prospect div_has_internet_connection" type="select"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Operator:</div>
                            <div class="span9">
								<?php echo form_dropdown('operator',$operators,Operator::getIndex($obj->operator),'id="operator" class="inp_prospect div_has_internet_connection" type="select"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Akhir Kontrak:</div>
                            <?php
                            $endofcontract = Common::sql_to_human_date($obj->end_of_contract);
                            ?>
                            <div class="span9">
								<input type="text" placeholder="Akhir kontrak" value="<?php echo $endofcontract;?>" id='end_of_contract'  name='end_of_contract' class='datepicker inp_prospect div_has_internet_connection'/>
								<input type="hidden" parent="end_of_contract" value="00" class="dttime">
								<input type="hidden" grandparent="end_of_contract" value="00" class="dttime">
                            </div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Permasalahan yg sering dihadapi:</div>
                            <div class="span9">
								<?php echo form_dropdown('problems',$problems,Problem::getIndex($obj->problems),'id="problems" class="inp_prospect div_has_internet_connection" type="select"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Ada kebutuhan Internet:</div>
                            <div class="span9">
								<?php echo form_dropdown('internet_demand',array('0'=>'Tidak','1'=>'Iya'),$obj->internet_demand,' class="inp_prospect" type="selectid"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Tahu PadiNET:</div>
                            <div class="span9">
								<?php echo form_dropdown('known_us',array('0'=>'Tidak','1'=>'Iya'),$obj->known_us,'id="known_us" class="inp_prospect" type="selectid"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Tahu dari:</div>
                            <div class="span9"><input type="text" placeholder="Tahu dari" value="<?php echo $obj->known_from;?>" id='known_from'  name='known_from' class="inp_prospect"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Tertarik berlangganan:</div>
                            <div class="span9">
								<?php echo form_dropdown('interested',array('0'=>'Tidak','1'=>'Iya'),$obj->interested,'id="interested" class="inp_prospect" type="selectid"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Alasan tidak tertarik:</div>
                            <div class="span9">
								<input type="text" placeholder="Alasan Tidak tertarik" value="<?php echo $obj->reason2not_interested;?>" name='reason2not_interested' class="inp_prospect"/>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Layanan yang diminati:</div>
                            <div class="span9">
								<?php echo form_dropdown('service_interested_to',$services,$obj->service_interested_to,'id="service_interested_to" class="inp_prospect" type="select"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Account Manager:</div>
                            <div class="span9">
								<input type="text" placeholder="Account Manager" value="<?php echo $obj->user->username;?>" id='am'  name='am' disabled="disabled"/>
							</div>
                        </div>
                    </div>
                </div>


                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Edit Prospect</h1>
						<ul class="buttons">
							<li><span class="isw-ok" id="btnsave" title="simpan"></span></li>
						</ul>
                    </div>
                    <div class="block-fluid">

                        <div class="row-form clearfix">
                            <div class="span2">Status:</div>
                            <div class="span10 divisi">
								<?php echo form_dropdown('status',array('p'=>'In Progress','9'=>'join','2'=>'failed'),$obj->status,'id="status"');?>
                            </div>
                        </div>

                        <div class='row-form clearfix'>
							<button class='btn-mini' id="btn_survey_request">Ajukan Survey</button>
                        </div>

                    </div>
                </div>

            </div>


        </div>

    </div>

</body>
</html>
