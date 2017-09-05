<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<script type="text/javascript">
$(document).ready(function(){
	alert('x');
	$("#survey_date").balloon({contents:"test"});
	});
</script>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/radu.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/survey_add.js'></script>
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
        <div class="workplace" id="workplace" client_id="<?php echo $obj->id;?>">
			<div class="block-fluid without-head">
				<div class="toolbar clearfix">
					<div class="right">
						<div class="btn-group">
							<button class='btn btn-small btn-warning tip' title='Simpan' id='survey_save'  value='<?php echo $obj->id;?>'><span class="icon-ok icon-white"></span> Simpan</button>
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
                        <!-- tempat form -->
						
                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo form_input('client_id',$obj->clientname,'id="client_id" readonly');?>
								</div>
                        </div>
                        
						<!-- end of tempat form -->
                    </div>                    
                </div>
                <!-- start of sebelah kanan -->
                <div class="span6 clearfix">
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Data Cabang Pelanggan yang hendak disurvey</h4>
                        </div>
						<!-- start of toolbar -->
						<!-- end of toolbar -->
						<!-- start of right form -->
						
                        <div class="row-form clearfix">
                            <div class="span3">Awal Trial<?php echo "hrstart:	" . $obj->hrstart." mnstart:".$obj->mnstart?></div>
                            <div class="span5">
								<?php echo form_input('trialstart',$obj->dtstart,'id="trialstart" class="datepicker"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('filterhour1',$hours,$obj->hrstart,'id="filterhour1" class="dttime" parent="survey_date"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('filterminute1',$minutes,$obj->mnstart,'id="filterminute1" class="dttime" grandparent="survey_date"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Akhir Trial</div>
                            <div class="span5">
								<?php echo form_input('trialend',$obj->dtend,'id="trialend" class="datepicker"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('filterhour1',$hours,$obj->hrend,'id="filterhour1" class="dttime" parent="survey_date"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('filterminute1',$minutes,$obj->mnend,'id="filterminute1" class="dttime" grandparent="survey_date"');?>
							</div>
                        </div>

                        

						<!-- end of right form -->
                    </div>
                </div>     
                <!-- end of sebelah kanan -->
            </div>
            
            
            
            
            
            
        </div>
        <!-- </form> -->
    </div>   
    
</body>
</html>
