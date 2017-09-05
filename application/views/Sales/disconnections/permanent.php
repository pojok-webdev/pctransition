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
                <li class="active">Detail</li>
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
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Sales/permanent_disconnection.js'></script>
</body>
</html>
