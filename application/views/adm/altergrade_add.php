<link rel="stylesheet" href="<?php echo base_url();?>css/jqueryui-1.10.4/jquery-ui.css">
<script src="<?php echo base_url();?>js/jquery-1.8.2.min.js"></script>
<script src="<?php echo base_url();?>js/jqueryui.1.10.4/jquery-ui.js"></script>

<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>css/aquarius/altergrade_edit.css'>

<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
	
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/jquery.ddslick.min.js'></script>
<body>
    <input type='hidden' class='inp_executor' name='altergrade_id' id='altergrade_id' value='<?php echo $this->uri->segment(3);?>'>
    
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
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET App" title="PadiNET App"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>

<?php $this->load->view('adm/menu',$path);?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">DB_Teknis</a> <span class="divider">></span></li>
                <li><a href="#">Upgrade/Downgrade</a> <span class="divider">></span></li>
                <li class="active">Add</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>            
		</div>
        <div class="workplace" id="workplace" username="<?php echo $this->session->userdata['username'];?>" >
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
									<button data-toggle="dropdown" class="btn " id="btn_save">Simpan <span class="disk"></span></button>
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
								<?php echo form_dropdown('altertype',array('Upgrade','Downgrade'),0,'id="altertype" class="inp_altergrade" type="select"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo form_dropdown('client_site_id',$clientsites,1,'id="client_site_id" class="inp_altergrade" type="select"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Tgl Request</div>
                            <div class="span9"><input type="text" name="request_date" id="request_date" class="datepicker inp_altergrade" value="<?php echo date('d/m/Y');?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Waktu Trial</div>
                            <div class="span9">
                            <input type="text" name="trialstart" id="trialstart" class="datepicker inp_altergrade" value="<?php echo date('d/m/Y');?>"/>
                            s/d
                            <input type="text" name="trialend" id="trialend" class="datepicker inp_altergrade" value="<?php echo date('d/m/Y');?>"/>
                            </div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Waktu Aktivasi</div>
                            <div class="span9"><input type="text" name="activation_date" id="activation_date" class="datepicker inp_altergrade" value="<?php echo date('d/m/Y');?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Layanan menjadi</div>
                            <div class="span9">
                            <?php echo form_dropdown('serviceafter',$services,1,'class="inp_altergrade" type="select"');?>
                            </div>
                        </div>                                                
                    </div>                    
                </div>

                <div class="span6">

					<div class="row-form clearfix">
						<div class="span3">Ada Downtime ?</div>
						<div class="span9"><?php echo form_dropdown('downtimeexists',array('1'=>'Ya','0'=>'Tidak'),1,'id="downtime_exist" class="inp_altergrade" type="select"');?></div>
					</div>

					<div class="row-form clearfix">
						<input type='hidden' name='downtime_hour_approximately' id='downtime_hour_approximately' class='inp_altergrade' />
						<div class="span4">Perkiraan Durasi Downtime</div>
						<div class="span2">
							<select id='downtime_day'></select>
						</div>
						<div class="span2">
							<select id='downtime_hour'></select>
						</div>
						<div class="span2">
							<select id='downtime_minute'></select>
						</div>
					</div>

					<div class="row-form clearfix">
						<div class="span3">Catatan</div>
						<div class="span9"><textarea name="description" id="notes" class="inp_altergrade" type='textarea'></textarea></div>
					</div>

					<div class="row-form clearfix">
						<div class="span3">Berbayar ?</div>
						<div class="span9"><?php echo form_dropdown('payable',array('1'=>'Ya','0'=>'Tidak'),1,'id="payable" class="inp_altergrade" type="select"');?></div>
					</div>
					
                    </div>                    
                </div>

			</div>
            
        </div>
        
    </div>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/altergrade_add.js'></script>
</body>
</html>
