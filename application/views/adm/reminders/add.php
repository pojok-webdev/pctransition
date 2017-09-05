<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<body>
    
    <!-- start of Notifikasi modal -->

    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Data telah tersimpan.</p>
        </div>
    </div>      

	<!-- end of notifikasi modal -->

    <!-- start of Notifikasi modal -->

    <div id="dWarning" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Tanggal Survey harus diisi.</p>
        </div>
    </div>      

	<!-- end of notifikasi modal -->


    <div class="header" id="myheader" user_id="<?php echo $this->ionuser->id;?>" username="<?php echo $this->session->userdata['username'];?>">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET Internal App" title="DB Teknis -  PT PadiNET Surabaya"/></a>
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
                <!-- start of button -->       
                <?php $this->load->view('adm/buttons');?>
				<!-- end of button -->
        </div>
        <div class="workplace" id="workplace">
			<input type='hidden' name='createuser' value='<?php echo $this->ionuser->username;?>' class='inp_trial' />
			<div class="block-fluid without-head">
				<div class="toolbar clearfix">
					<div class="right">
						<div class="btn-group">
							<button class='btn btn-small btn-warning tip' title='Simpan' id='trial_save'  value='<?php echo $obj->id;?>'><span class="icon-ok icon-white"></span> Simpan</button>
						</div>
					</div>            
				</div>
            </div>
            
            <div class="row-fluid">
                <div class="span6">
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Data Pelanggan</h4>
                        </div>                         
						
                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo form_dropdown('client_site_id',$clientsites,1,'id="client_site_id" type="selectid" class="inp_trial"');?>
							</div>
                        </div>

                    </div>                    
                </div>
                <div class="span6 clearfix">
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Tanggal</h4>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Start Date</div>
                            <div class="span5"><input type="text" name="startdate" id="startdate" class="datepicker inp_trial" type="datepicker" /></div>
                            <div class="span2"><?php echo form_dropdown('starthour',$hours,0,'parent="startdate" class="dttime"');?></div>
                            <div class="span2"><?php echo form_dropdown('startminute',$minutes,0,'grandparent="startdate" class="dttime"');?></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">End Date</div>
                            <div class="span5"><input type="text" name="enddate" id="enddate" class="datepicker inp_trial" type="datepicker" /></div>
                            <div class="span2"><?php echo form_dropdown('endhour',$hours,0,'parent="enddate" class="dttime"');?></div>
                            <div class="span2"><?php echo form_dropdown('endminute',$minutes,0,'grandparent="enddate" class="dttime"');?></div>
                        </div>

                    </div>
                </div>     
            </div>
        </div>
    </div>   
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/trial_add.js'></script>
</body>
</html>
