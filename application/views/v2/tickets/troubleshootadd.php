<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<body>
    <div id="dWarning" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Tanggal  harus diisi.</p>
        </div>
    </div>
    <div class="header">
        <a class="logo" href="index.html">
        <img src="/img/aquarius/logo.png" alt="PadiNET App" title="PadiNET App"/>
        </a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
	<?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Troubleshoots</a> <span class="divider">></span></li>
                <li class="active">Add</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" username="<?php echo $this->session->userdata['username'];?>" id="workplace">
			<input type='hidden' class='troubleshoot' name='client_site_id' value='<?php echo $obj->client_site_id;?>' />
            <div class="row-fluid">
                <div class="span12">
                    <div class="block-fluid without-head">
                        <div class="toolbar clearfix">
                            <div class="left">
								ID Ticket : <span id='ticketid'><?php echo $ticketid;?></span>
								Kode Ticket : <span><?php echo $obj->kdticket;?></span>
                                <div class="btn-group">

                                </div>
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-small tip" title="Simpan" id='troubleshoot_save' ><span class="icon-ok icon-white"></span> Simpan</button>
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
                            <div class="span3">Jenis</div>
                            <div class="span9">
								<input type="text" id="troubleshoottype" name="troubleshoottype" class="troubleshoot" value="<?php echo $obj->requesttype;?>"/>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<input type="text" id="nameofmtype" name="nameofmtype" class="troubleshoot" value="<?php echo $obj->clientname;?>"/>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Telp</div>
                            <div class="span9">
								<input type="text" id="phone" name="phone" class="troubleshoot" value="<?php echo $obj->clientphone;?>"/>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Keluhan</div>
                            <div class="span9">
								<span id='complaint'><?php echo $obj->complaint;?></span>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Butuh Surat Ijin</div>
                            <div class="span9">
                            <?php echo form_dropdown('surat_ijin',array('0'=>'Tidak','1'=>'Ya'),'1','id="surat_ijin" class="troubleshoot" type="selectid"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix" id="downtimedetil">
                            <div class="span3">Rentang Waktu</div>
                            <div class="span3">
								<input type="text" id="request_date1" name="request_date1" class="datetimepickers dttime  datepicker texttohuman troubleshoot" />
							</div>
							<div class="span2">
                            <?php echo form_dropdown('hour',$hours,'0','id="hour" parent="request_date1" class="dttime"');?>
							</div>
							<div class="span2">
                            <?php echo form_dropdown('minute',$minutes,'0','id="minute" grandparent="request_date1" class="dttime"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix" id="downtimedetil">
                            <div class="span3">s/d</div>
                            <div class="span3">
								<input type="text" id="request_date2" name="request_date2" class="datetimepickers dttime  datepicker texttohuman troubleshoot" />
							</div>
							<div class="span2">
                            <?php echo form_dropdown('hour',$hours,'0','id="hour" parent="request_date2" class="dttime"');?>
							</div>
							<div class="span2">
                            <?php echo form_dropdown('minute',$minutes,'0','id="minute" grandparent="request_date2" class="dttime"');?>
                            </div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Berbayar ?</div>
                            <div class="span9">
                            <?php echo form_dropdown('is_payable',array('0'=>'Tidak','1'=>'Ya'),'1','id="is_payable" class="troubleshoot" type="selectid"');?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="span6">
                    <div class="block-fluid row-fluid without-head">

                        <div class="row-form clearfix">
                            <div class="span3">Lokasi</div>
                            <div class="span9">
								<?php echo $obj->location;?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9">
								<textarea name="description" id="description" class="troubleshoot textarea myeditor" type="textarea"><?php echo $obj->description?></textarea>
							</div>
                        </div>
                    </div>
					<div class="block-fluid without-head">
						<div class="toolbar nopadding-toolbar clearfix">
							<h4>Petugas</h4>
						</div>
						<div class="toolbar clearfix paditablehead">
							<div class="left">
								<div class="btn-group">
									<button type="button" class="btn btn-small btn-danger tip btn_addofficer" title="Tambah" id="btn_addofficer">
										<span class="icon-plus icon-white"></span>
									</button>
									<button type="button" class="btn btn-small btn_addofficer">Penambahan Petugas</button>
								</div>
							</div>
						</div>
						<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tOfficer">
							<thead>
								<tr>
									<th width="60">Image</th>
									<th>Nama</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
						<div class="toolbar bottom-toolbar clearfix">
							<div class="left"></div>
							<div class="right">
								Total : <span id="total_installer">10</span>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
    <script src='/js/padilibs/padi.dateTime.js'></script>
    <script src='/js/v2/tickets/troubleshoot_add.js'></script>
</body>
</html>
