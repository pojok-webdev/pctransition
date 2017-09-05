<!DOCTYPE html>
<html lang="en">
	<style type='text/css'>
		.userpic{
			float:left;
			width:60px;
			height:50px;
		}
		.pic{
			width:40px;
			padding-left:auto;
			padding-right:auto;
		}
	</style>
<?php $this->load->view('adm/head');?>
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
    <div id="dAddOperator" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Petugas</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<?php foreach($officers as $office){?>
							<div class="userpic" officer_name="<?php echo $office->username;?>" officer_id="<?php echo $office->id;?>">
								<a class="pic" title="<?php echo $office->username;?>" >
								<img src="<?php echo base_url();?>media/users/<?php echo strtolower($office->username);?>.jpg" class="img-polaroid" width=20px/>
								</a><br />
							<?php echo $office->username;?>
							</div>
			            <?php }?>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>
        </div>
    </div>
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiNET Application" title="PadiNET Application"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
<?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Disconnection</a> <span class="divider">></span></li>
                <li class="active">Edit</li>
            </ul>
        </div>
        <div class="workplace" user_id='<?php echo $obj->id;?>'>
        <input id="disconnection_id" type="hidden" value="<?php echo $this->uri->segment(3);?>" />
        <input id="createuser" type="hidden" value="<?php echo $this->ionuser->username;?>" name="createuser" class="inp_disconnection" />
        <input id="user_id" type="hidden" value="<?php echo $this->ionuser->id;?>" name="createuser" class="inp_disconnection" />
		<div class="row-fluid"><div class="span12"><div class="head clearfix">
			<div class="right">
				<ul class="buttons">
					<li><span class="isw-save" id="btnsave" title="simpan"></span></li>
				</ul>
            </div>
		</div>
		</div>
		</div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Edit Disconnection</h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span4">Alasan Pemutusan:</div>
                            <div class="span8">
								<textarea id="reason" name="reason" class="inp_disconnection" type="textarea"></textarea>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span4">Jangka waktu pemutusan:</div>
                            <div class="span8">
								<?php echo form_dropdown('period',array('1'=>'1 Bulan','2'=>'2 Bulan','3'=>'3 Bulan'),'1','id="period" name="period" class="inp_disconnection" type="selectid"');?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span4">Mulai tanggal:</div>
                            <div class="span4">
								<?php echo form_input('startdate','','id="startdate"  class="inp_disconnection datepicker" type="text"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('hour',$hours,'0','id="day"  parent="startdate" class="dttime"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('minute',$minutes,'0','id="minute"  grandparent="startdate" class="dttime"');?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span4">Hingga tanggal:</div>
                            <div class="span4">
								<?php echo form_input('finishdate','','id="finishdate"  class="inp_disconnection datepicker" type="text"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('hour',$hours,'0','id="day"  parent="finishdate" class="dttime"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('minute',$minutes,'0','id="minute"  grandparent="finishdate" class="dttime"');?>
							</div>
                        </div>

                    </div>
                </div>
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Cabang / Sites</h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
							<table id="site" class="table">
								<thead>
									<tr>
										<th>Alamat</th><th>PIC</th><th>Lihat Detail</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($obj->client->client_site as $site){?>
									<tr>
										<td><?php echo $site->address?></td><td><?php echo $site->pic?></td>
										<td>
											<div class="btn-group">
												<button class="btn btndetilsite" type="button" >Detil</button>
											</div>
										</td>
									</tr>
									<?php }?>
								</tbody>
							</table>
                        </div>
                    </div>
                </div>
			</div>
			<div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-cloud"></div>
                        <h1>Detail Pelanggan</h1>
                        <ul class="buttons">
                            <li class="toggle active"><a href="#"></a></li>
                        </ul>
                    </div>
                    <div class="block" style="display: none;">
                        <p>This widget always closed on page load. After page refresh or navigate to another page it stay closed.</p>
                        <div class="row-form clearfix">
                            <div class="span3">Nama:</div>
                            <div class="span9"><input type="text" placeholder="Nama..." value="<?php echo $obj->name;?>" name='name' id='name'/></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Alamat:</div>
                            <div class="span9"><input type="text" placeholder="Nama..." value="<?php echo $obj->address;?>" name='address' id='address'/></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Kota:</div>
                            <div class="span9"><input type="text" placeholder="Nama..." value="<?php echo $obj->city;?>" name='city' id='city'/></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Phone:</div>
                            <div class="span9"><input type="text" value="<?php echo $obj->phone;?> " name="phone" id="phone" /></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Fax:</div>
                            <div class="span9"><input type="text" value="<?php echo $obj->fax;?> " name="fax" id="fax" /></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Jenis Bisnis:</div>
                            <div class="span9"><input type='text'></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Email:</div>
                            <div class="span9"><input type="text" value="<?php echo $obj->email?>" name='email' id='email' /></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Biaya:</div>
                            <div class="span9"><input type="text" placeholder="Biaya" value="<?php echo $obj->fee;?>" id='fee'  name='fee'/></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Account Manager:</div>
                            <div class="span9"><input type="text" placeholder="First name" value="<?php echo $obj->last_name;?>" id='lastname'  name='lastname'/></div>
                        </div>
                    </div>
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Operator</h4>
                        </div>
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip btn_addoperator" title="Tambah Operator"><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn_addoperator">Penambahan Operator</button>
                                </div>
                            </div>
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tblOperator">
                            <thead>
                                <tr>
                                    <th width="35%">Nama</th>
                                    <th width="5%"><span class="icon-th-large"></span></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->disconnection_operator as $operator){?>
                                <tr rowid='<?php echo $operator->id;?>'>
                                    <td><?php echo $operator->username;?></td>
                                    <td>
										<a><span class="icon-trash row_remove remove_operator pointer" operator_id="<?php echo $operator->id; ?>" ></span></a>
									</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>
                            <div class="right">
								Total : <span id='total_operator'><?php echo $obj->disconnection_operator->count();?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/disconnection.js'></script>
</body>
</html>
