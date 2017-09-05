<link rel="stylesheet" href="<?php echo base_url();?>css/jqueryui-1.10.4/jquery-ui.css">
<script src="<?php echo base_url();?>js/jquery-1.8.2.min.js"></script>
<script src="<?php echo base_url();?>js/jqueryui.1.10.4/jquery-ui.js"></script>

<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>css/aquarius/altergrade_edit.css'>
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

<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>

	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/jquery.ddslick.min.js'></script>
<body>
    <input type='hidden' class='inp_pccard inp_wireless_radio inp_apwifi inp_antenna inp_router inp_executor inp_altergrade' name='client_id' value='<?php echo $obj->client_id;?>' />
    <input type='hidden' class='inp_executor' name='altergrade_id' id='altergrade_id' value='<?php echo $this->uri->segment(3);?>'>

    <div id="dConfirmation" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						Data telah tersimpan
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>

        </div>
    </div>

    <div id="dReason" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Alasan perbedaan tanggal</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="span3">
							Alasan perbedaan
						</div>
						<div class="span9">
							<textarea id="reason" type="textarea"></textarea>
						</div>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" id="saveReason" type="button">Simpan</button>
				</div>
			</div>

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
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET App" title="PadiNET App"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>

<?php $this->load->view('adm/menu',$path);?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiAPP</a> <span class="divider">></span></li>
                <li><a href="#">Perubahan Layanan</a> <span class="divider">></span></li>
                <li class="active">Edit</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
		</div>
        <div class="workplace" id="workplace"  username="<?php echo $this->session->userdata['username'];?>" >
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
									<button class="btn btnsave">Action </button>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="block-fluid without-head">
                        <div class="row-form clearfix">
                            <div class="span3">Jenis </div>
                            <div class="span9">
								<?php echo form_dropdown('altertype',array('Upgrade','Downgrade'),1,'id="altertype" class="inp_altergrade"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo form_dropdown('client_site_idx',$clientsites,$obj->id,'id="client_site_id" class="inp_altergradex" type="select"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Tgl Request</div>
                            <div class="span9">
								<input type="text" id="requestdate" class="datepicker">
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Layanan sebelumnya</div>
                            <div class="span7">
								<?php echo form_input('servicebefore','','class="inp_altergrade" type="text" ');?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Layanan sesudahnya</div>
                            <div class="span7">
								<?php echo form_input('serviceafter','','class="inp_altergrade" type="text" ');?>
							</div>
                        </div>

                    </div>
                </div>

				<div class="span6">
					<div class="block-fluid without-head">


                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo form_input('client_id',$obj->client->name,'id="client_id"');?>
								</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC</div>
                            <div class="span9"><input type="text" name="pic_name" id="pic_name" value="<?php echo $obj->pic_name;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span2"><input type="text" name="pic_phone_area" id="pic_phone_area" value="<?php echo $obj->pic_phone_area;?>"/></div>
                            <div class="span7"><input type="text" name="pic_phone" id="pic_phone" value="<?php echo $obj->pic_phone;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC Position</div>
                            <div class="span9"><input type="text" name="pic_position" id="pic_position" value="<?php echo $obj->pic_position;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="pic_email" id="pic_email" value="<?php echo $obj->pic_email?>"/></div>
                        </div>


                     </div>
				</div>
			</div>

        </div>
        <!-- </form> -->
    </div>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Sales/altergrade_add.js'></script>
</body>
</html>
