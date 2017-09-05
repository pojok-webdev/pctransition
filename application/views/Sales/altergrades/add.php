<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/radu.js'></script>
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
	
    <div class="header" id="myheader" username="<?php echo $this->session->userdata['username'];?>">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET Internal App" title="PadiNET App"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>

	<?php $this->load->view('adm/menu',$path);?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">DB_Teknis</a> <span class="divider">></span></li>
                <li><a href="#">Survey</a> <span class="divider">></span></li>
                <li class="active">Penambahan</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace" site_id="">
			<input type="hidden" id="client_id" name="client_id" class="inp_altergrade" value="<?php echo $client->id;?>" />
			<div class="block-fluid without-head">
				<div class="toolbar clearfix">
					<div class="right">
						<div class="btn-group">
							<button class="btn btn-small" id='btn_save'>Simpan </button>
						</div>
					</div>            
				</div>
            </div>
            <div class="row-fluid">                
                <div class="span6">
                    <div class="block-fluid without-head">
					<div class="toolbar">
					<h4>Detail Site Pelanggan</h4>
					</div>
					<?php $tmpaddr = (trim($client->address)!='')?$client->address:$client->address?>
                    <?php $tmpcty = (trim($client->city)!=''&&!is_null($client->city))?$client->city:$client->city?>
                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo $client->client->name . ', ' . $tmpaddr . ', ' . $tmpcty;?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Jenis Perubahan</div>
                            <div class="span9"><?php echo form_dropdown('altertype',array('0'=>'Downgrade','1'=>'Upgrade'),'1','id="altertype" class="inp_altergrade" type="selectid"');?></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Untuk dilaksanakan</div>
                            <div class="span9"><?php echo form_input('altertime','','id="altertime" class="datepicker inp_altergrade"');?></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Berbayar ?</div>
                            <div class="span9"><?php echo form_dropdown('payable',array('0'=>'Tidak','1'=>'Ya'),'1','id="payable" class="inp_altergrade" type="selectid"');?></div>
                        </div>

                    </div>                    
                </div>
                <div class="span6">
                    <div class="block-fluid without-head">                        
					<div class="toolbar">
					<h4>PIC Pelanggan</h4>
					</div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC</div>
                            <div class="span9"><input type="text" name="pic_name" id="pic_name" value="<?php echo $client->pic;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span2"><input type="text" name="pic_phone_area" id="pic_phone_area" value="<?php echo $client->phone_area;?>"/></div>
                            <div class="span7"><input type="text" name="pic_phone" id="pic_phone" value="<?php echo $client->phone;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC Position</div>
                            <div class="span9"><input type="text" name="pic_position" id="pic_position" value="<?php echo $client->pic_position;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="pic_email" id="pic_email" value="<?php echo $client->pic_email?>"/></div>
                        </div>
                    </div>                    
                </div>
            </div>
	</body>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/altergrade_add.js'></script>
</html>
