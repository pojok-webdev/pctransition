<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
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

    <div id="dWarning" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Tanggal Survey harus diisi.</p>
        </div>
    </div>

			<div id="dAddPIC" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myPICModalLabel">Penambahan PIC</h3>
				</div>
				<div class="modal-body">
					<div class='row-fluid'>
						<div class="span12">
							<div class="without-head">
									<div class="span4">Nama:</div>
									<div class="span8">
										<input type='text' class='addpic' name='addpic' id='addpic' />
									</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnSavePIC">Simpan</button>
					<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
				</div>
			</div>
			
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
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Trial</a> <span class="divider">></span></li>
                <li class="active">Add</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace">
			<input type='hidden' name='createuser' value='<?php echo $this->ionuser->username;?>' class='inp_trial' />
			<input type='hidden' name='prevtrial' id="prevtrial" value='<?php echo $prevtrial;?>' class='inp_trial' />
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
                <div class="span12">                                        
                    <div class="block-fluid without-head">                        
                        <!-- tempat form -->
						<form action='<?php echo base_url();?>index.php/adm/handler' method='POST' id='xyx'>
						<input type='hidden' name='client_site_id' class="inp_trial" value='<?php echo $obj->id;?>' />

                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo $obj->client->name;?>
								</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Dari tanggal</div>
                            <div class="span9"><input type="text" name="startdate" class="datepicker inp_trial" id='startdate' value="<?php echo $dates->today?>" /></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Hingga tanggal</div>
                            <div class="span9"><input type="text" name="enddate" class="datepicker inp_trial" id='enddate'  value="<?php echo $dates->weeklater?>"/></div>
                        </div>
                        
            
                        
						</form>
						<!-- end of tempat form -->
                    </div>                    
                </div>
            </div>            
        </div>
    </div>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Sales/trials/add.js'></script>
</body>
</html>
