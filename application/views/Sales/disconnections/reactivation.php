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
                <li><a href="#">Disconnection</a> <span class="divider">></span></li>
                <li><a href="#">Reactivation</a> <span class="divider">></span></li>
                <li class="active">Edit</li>
            </ul>
        </div>
        <div class="workplace" user_id='<?php echo $obj->id;?>'>
        <input id="id" name="id" type="hidden" value="<?php echo $this->uri->segment(3);?>" class="inp_disconnection" />
        <input id="createuser" type="hidden" value="<?php echo $this->ionuser->username;?>" name="createuser" />
        <input id="user_id" type="hidden" value="<?php echo $this->ionuser->id;?>" name="createuser" />
        <input id="status" type="hidden" value="2" name="status" class="inp_disconnection" />
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
                        <h1>Detail Disconnection</h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span4">Alasan Pemutusan:</div>
                            <div class="span8">
								<?php
								echo $obj->reason;
								?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span4">Tanggal Reaktivasi:</div>
                            <div class="span4">
								<?php echo form_input('reactivationdate','','id="reactivationdate"  class="inp_disconnection datepicker" type="text"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('hour',$hours,'0','id="day"  parent="reactivationdate" class="dttime"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('minute',$minutes,'0','id="minute"  grandparent="reactivationdate" class="dttime"');?>
							</div>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Cabang / Sites</h1>
                    </div>
                    <div class="block" style="display: block;">
                        <div class="row-form clearfix">
                            <div class="span3">Nama:</div>
                            <div class="span9">
								<?php echo $obj->client_site->client->name;?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Alamat:</div>
                            <div class="span9">
								<?php echo $obj->client_site->client->address;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Kota:</div>
                            <div class="span9">
								<?php echo $obj->client_site->client->city;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Phone:</div>
                            <div class="span9">
								<?php echo $obj->client_site->client->phone_area . ' ' . $obj->client_site->client->phone;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Fax:</div>
                            <div class="span9">
								<?php echo $obj->client_site->client->fax_area . ' ' . $obj->client_site->client->fax;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Jenis Bisnis:</div>
                            <div class="span9">
								<?php echo $obj->client_site->client->business_field;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Email:</div>
                            <div class="span9">
								<?php echo $obj->client_site->client->pic->email;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Account Manager:</div>
                            <div class="span9">
								<?php echo $obj->client_site->client->user->username;?>
							</div>
                        </div>
                    </div>
                </div>
			</div>
        </div>
    </div>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Sales/reactivation.js'></script>
</body>
</html>
