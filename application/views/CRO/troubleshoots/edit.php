<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<body>
	<?php $this->load->view('TS/troubleshoots/editdialogs');?>
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
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET App" title="PadiNET App"/></a>
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
			<input type='hidden' id='troubleshoot_id' name='troubleshoot_id' value='<?php echo $obj->id;?>' />
			<input type='hidden' id='createuser' name='createuser' value='<?php echo $this->session->userdata['username'];?>' />
            <div class="row-fluid">
                <div class="span12">
                    <div class="block-fluid without-head">
                        <div class="toolbar clearfix">
                            <div class="left">
								ID Ticket : <span id='ticketid'><?php echo $obj->ticket_id;?></span>
								Kode Ticket : <span><?php echo $obj->ticket->kdticket;?></span>
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
								<?php echo $obj->ticket->requesttype;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo $obj->ticket->clientname;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Telp</div>
                            <div class="span9">
								<?php echo $obj->ticket->client_site->client->phone;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Keluhan</div>
                            <div class="span9">
								<?php echo $obj->ticket->complaint;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Butuh Surat Ijin</div>
                            <div class="span9">
                            <?php echo form_dropdown('surat_ijin',array('0'=>'Tidak','1'=>'Ya'),$obj->surat_ijin,'id="surat_ijin" class="troubleshoot" type="selectid"');?>
                            </div>
                        </div>
                        <?php
                        $request_date1 = Common::longsql_to_datepart($obj->request_date1);
                        ?>
                        <div class="row-form clearfix" id="downtimedetil">
                            <div class="span3">Rentang Waktu</div>
                            <div class="span3">
								<input type="text" id="request_date1" name="request_date1" class="datetimepickers dttime  datepicker texttohuman troubleshoot" value='<?php echo Common::longsql_to_human_date($obj->request_date1,'/');?>'/>
							</div>
							<div class="span2">
                            <?php echo form_dropdown('hour',$hours,$request_date1['hour'],'id="hour" parent="request_date1" class="dttime"');?>
							</div>
							<div class="span2">
                            <?php echo form_dropdown('minute',$minutes,$request_date1['minute'],'id="minute" grandparent="request_date1" class="dttime"');?>
                            </div>
                        </div>
                        <?php
                        $request_date2 = Common::longsql_to_datepart($obj->request_date2);
                        ?>
                        <div class="row-form clearfix" id="downtimedetil">
                            <div class="span3">s/d</div>
                            <div class="span3">
								<input type="text" id="request_date2" name="request_date2" class="datetimepickers dttime  datepicker texttohuman troubleshoot" value='<?php echo Common::longsql_to_human_date($obj->request_date2,'/');?>' />
							</div>
							<div class="span2">
                            <?php echo form_dropdown('hour',$hours,$request_date2['hour'],'id="hour" parent="request_date2" class="dttime"');?>
							</div>
							<div class="span2">
                            <?php echo form_dropdown('minute',$minutes,$request_date2['minute'],'id="minute" grandparent="request_date2" class="dttime"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Berbayar ?</div>
                            <div class="span9">
                            <?php echo form_dropdown('is_payable',array('0'=>'Tidak','1'=>'Ya'),$obj->is_payable,'id="is_payable" class="troubleshoot" type="selectid"');?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="block-fluid row-fluid without-head">
                        <div class="row-form clearfix">
                            <div class="span3">Lokasi</div>
                            <div class="span9">
								<?php echo $obj->ticket->location;?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9">
								<textarea name="description" id="description" class="troubleshoot textarea myeditor" type="textarea"><?php echo $obj->description?></textarea>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/troubleshoot_edit.js'></script>
</body>
</html>
