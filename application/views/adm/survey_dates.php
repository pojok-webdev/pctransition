<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<?php 
$data = array(
'csspath' => $csspath,
'jspath' => $jspath,
'imagepath' => $imagepath,
);
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/survey_dates.js'></script>
	<script type='text/javascript'>
		$(document).ready(function(){
		var btnUpload=$('#pilih_gambar');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: '<?php echo base_url()?>index.php/adm/upload_clientimage',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				status.text('Uploading...');
			},
			onComplete: function(file, response){
				alert(response);
				//On completion clear the status
				status.text('');
				//Add uploaded file to list
				if(response==="success"){
					$('#clientimage').attr('src','./media/clients/'+file);
//					$('<li></li>').appendTo('#files').html('<img src="./uploads/'+file+'" alt="" /><br />'+file).addClass('success');
				} else{
	//				$('<li></li>').appendTo('#files').text(file).addClass('error');
				}
			}
		});
					
		});
		
	</script>
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


    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET Internal App" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>

	<?php $this->load->view('adm/menu',$data);?>
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Simple Admin</a> <span class="divider">></span></li>
                <li><a href="#">Edit user</a> <span class="divider">></span></li>
                <li class="active">Aqvatarius</li>
            </ul>
			<!-- buttons -->
            <?php $this->load->view('adm/buttons');?>
            <!-- buttons -->
        </div>
        <div class="workplace" id="workplace" username = "<?php echo $this->session->userdata['username'];?>" survey_id="<?php echo $obj->id;?>">
            
            <div class="row-fluid">                
                <div class="span3">
                    <div class="ushort clearfix">
                        <a href="#"><?php echo $obj->client->name;?></a>
                        <a href="#"><img id="clientimage" src="<?php echo base_url();?>img/aquarius/users/user_profile.jpg" class="img-polaroid"></a>
                        <span id='status'></span>
						<span id='pilih_gambar'>Pilih</span>
                    </div>      
                    
                </div>
                <div class="span6">                                        
                    <div class="block-fluid without-head">                        
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-success tip" title="Send mail"><span class="icon-envelope icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn-info tip" title="User page"><span class="icon-info-sign icon-white"></span></button>                                    
                                </div>                                
                            </div>
                            <div class="right">
                                <div class="btn-group">
									<a href="#dModal" role="button"  class="btn btn-small btn-warning tip" title="Quick save"  data-toggle="modal" id='survey_date_save' survey_request_id='<?php echo $obj->id;?>' username='<?php echo $this->session->userdata['username']?>'><span class="icon-ok icon-white"></span></a>
                                    <button type="button" class="btn btn-small btn-danger tip" title="Delete user"><span class="icon-remove icon-white" survey_request_id='<?php echo $obj->id;?>' id="survey_request_id"></span></button>
                                </div>
                            </div>
                        </div>
                        <!-- tempat form -->

                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<label><?php echo $obj->client->name;?></label>
								</div>
                        </div>

                        
                        <div class="row-form clearfix">
                            <div class="span3">Tgl Survey</div>
                            <div class="span9"><input type="text" name="schedule_date" class="datepicker" id='schedule_date' /></div>
                        </div>
                        
                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9"><textarea name="reason" id="reason"></textarea></div>
                        </div>


						<!-- end of tempat form -->
                    </div>                    
                </div>
                <!-- begin of right panel -->
                <div class="span3 clearfix">
                    <div class="row-fluid">
                        <div class="span12">                        
                            <div class="block-fluid without-head clearfix">
                                <ul class="sList" id="selectable_1x">
                                    <li class="ui-selected"></li>
                                </ul>                                                
                            </div>                   
                        </div>
                    </div>
                </div>                
				<!-- end of right panel -->
            </div>            
            
            <div class="row-fluid">
                <div class="span6">
                </div>
                
                <div class="span6">
                </div>

<!-- batas bawah -->                
            </div>            
            
            
            
        </div>
        <!-- </form> -->
    </div>   
    
</body>
</html>
