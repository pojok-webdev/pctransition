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
    <input type='hidden' class='inp_pccard inp_wireless_radio inp_apwifi inp_antenna inp_router inp_executor inp_altergrade' name='client_site_id' value='<?php echo $obj->client_site_id;?>' />
    <input type='hidden' class='inp_executor' name='altergrade_id' id='altergrade_id' value='<?php echo $this->uri->segment(3);?>'>
    <input type="hidden" name="createuser" id="createuser" value="<?php echo $this->ionuser->username;?>">
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p id="modalMessage">Data telah tersimpan.</p>
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
					<button class="btn closemodal" id="saveReason" type="button" >Simpan</button>
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
                <li><a href="#">Perubahan Layanan</a> <span class="divider">></span></li>
                <li class="active">Edit</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
		</div>
        <div class="workplace" id="workplace" altergrade_id="<?php echo $obj->id;?>" username="<?php echo $this->session->userdata['username'];?>" client_site_id='<?php echo $obj->id;?>'>
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
									<button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>
									<ul class="dropdown-menu pull-right" >
										<li><a status='0' class='btnsave'>Belum Selesai</a></li>
										<li><a status='1' class='btnsave'>Selesai</a></li>
									</ul>
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
								<?php echo ($obj->altertype=='1')?'Upgrade':'Downgrade';?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo $obj->client_site->client->name;?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                        <?php $dtpart = Common::longsql_to_datepart($obj->createdate);?>
                            <div class="span3">Tgl Request</div>
                            <div class="span9">
								<input type="text" id="requestdate" value='<?php echo $dtpart["day"] . "/" . $dtpart["month"] . "/" . $dtpart["year"];?>' disabled="disabled">
							</div>
                        </div>
                        <div class="row-form clearfix">
                        <?php $dtpart = Common::longsql_to_datepart($obj->executiontime);?>
                            <div class="span3">Waktu eksekusi</div>
                            <div class="span5">
								<input type="text" name="executiontime" id="executiontime" class="datepicker inp_altergrade" value="<?php echo $dtpart["day"] . "/" . $dtpart["month"] . "/" . $dtpart["year"];?>"/>
							</div>
							<div class="span2">
								<?php echo form_dropdown('hour',$hours,0,'id="executionhour" class="dttime" parent="executiontime"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('minute',$minutes,0,'id="executionminute" class="dttime" grandparent="executiontime"');?>
							</div>
                        </div>
                        <div class="row-form clearfix hiddenelement" >
                        <?php $dtpart = Common::longsql_to_datepart($obj->executiontime);?>
                            <div class="span3">Waktu eksekusi</div>
                            <div class="span5">
								<input type="text" name="originalexecutiontime" id="originalexecutiontime" class="datepicker " value="<?php echo $dtpart["day"] . "/" . $dtpart["month"] . "/" . $dtpart["year"];?>"/>
							</div>
							<div class="span2">
								<?php echo form_dropdown('originalhour',$hours,0,'id="originalexecutionhour" class="dttime" parent="originalexecutiontime"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('originalminute',$minutes,0,'id="originalexecutionminute" class="dttime" grandparent="originalexecutiontime"');?>
							</div>
                        </div>
					<div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Teknisi</h4>
                        </div>
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger tip btn_addoperator" title="Tambah Teknisi"><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small tip btn_addoperator">Penambahan Teknisi</button>
                                </div>
							</div>
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="table images " id="tbl_executor">
                            <thead>
                                <tr>
                                    <th width="30%">Nama</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->alterexecutor as $executor){?>
                                <tr thisid='<?php echo $executor->id;?>'>
                                    <td><?php echo $executor->name;?></td>
                                    <td>
										<div class="btn-group">
											<button class="btn btn_executor_remove" type="button" obj_id='<?php echo $obj->executor->id;?>' pccard_id='<?php echo $executor->id;?>'>Hapus</button>
										</div>
									</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>
                            <div class="right">
								Total : <span id="total_executor"><?php echo $obj->alterexecutor->count();?></span>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

				<div class="span6">
					<div class="block-fluid without-head">
                        <div class="row-form clearfix">
                            <div class="span5">Layanan sebelumnya</div>
                            <div class="span7">
								<input type="text" name="servicebefore" id="servicebefore" value="<?php echo $obj->servicebefore;?>" disabled="disabled" />
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Layanan sesudahnya</div>
                            <div class="span7">
								<?php echo form_input('serviceafter',$obj->serviceafter,'class="inp_altergrade" type="text" disabled="disabled"');?>
							</div>
                        </div>
                     </div>
				</div>
			</div>

        </div>
    </div>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/altergrade_edit.js'></script>
</body>
</html>
