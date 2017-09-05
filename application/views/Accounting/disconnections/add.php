<!DOCTYPE html>
<html lang="en">
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
                <li><a href="#">Disconnection</a> <span class="divider">></span></li>
                <li><a href="#">Isolir</a> <span class="divider">></span></li>
                <li class="active">Add</li>
            </ul>
        </div>
        <div class="workplace" >
        <input id="createuser" type="hidden" value="<?php echo $this->ionuser->username;?>" name="createuser" class="inp_disconnection" />
        <input type="hidden" name="client_site_id" value="<?php echo $this->uri->segment(3);?>" class="inp_disconnection">
		<div class="row-fluid"><div class="span12"><div class="head clearfix">
			<div class="right">
				<h1><?php echo $obj->name?></h1>
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
                        <h1>Pengajuan Isolir Pelanggan</h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span4">Alasan Pemutusan:</div>
                            <div class="span8">
								<textarea id="reason" name="reason" class="inp_disconnection" type="textarea"></textarea>
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
                        <h1>Keterangan</h1>
                    </div>
                    <div class="block-fluid">

                        <div class="row-form clearfix">
                            <div class="span3">Nama:</div>
                            <div class="span9"><?php echo $obj->client->name;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Alamat:</div>
                            <div class="span9"><?php echo $obj->address;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Kota:</div>
                            <div class="span9"><?php echo $obj->city;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Phone:</div>
                            <div class="span9"><?php echo $obj->phone;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Fax:</div>
                            <div class="span9"><?php echo $obj->fax;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Jenis Bisnis:</div>
                            <div class="span9"><?php echo $obj->client->business_field;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">PIC:</div>
                            <div class="span9"><?php echo $obj->pic_name?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Email:</div>
                            <div class="span9"><?php echo $obj->pic_email?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Biaya:</div>
                            <div class="span9"><input type="text" placeholder="Biaya" value="<?php echo $obj->fee;?>" id='fee'  name='fee'/></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Account Manager:</div>
                            <div class="span9"><?php echo $obj->createuser;?>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
        </div>
    </div>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Accounting/disconnectionadd.js'></script>
</body>
</html>
