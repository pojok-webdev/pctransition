<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<script type="text/javascript">
$(document).ready(function(){
	alert('x');
	});
</script>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/createuser.js'></script>
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

    <div class="header" id="myheader" username="<?php echo $this->session->userdata['username'];?>">
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
                <li><a href="#">User</a> <span class="divider">></span></li>
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
							<button class="btn btn-small" id="btnsaveuser"><span class="icon-ok icon-white"></span> Simpan</button>
						</div>
					</div>            
				</div>
            </div>
            
            <div class="row-fluid">
                <div class="span6">
                    <div class="block-fluid without-head">                        
                        <!-- tempat form -->
						
                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo form_input('username','','id="username"');?>
								</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">First Name</div>
                            <div class="span9"><input type="text" name="fname" id="fname" /></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Last Name</div>
                            <div class="span9"><input type="text" name="lname" id="lname" /></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span9"><input type="text" name="user_phone" id="user_phone" /></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="user_email" id="user_email" /></div>
                        </div>
						<!-- end of tempat form -->
                    </div>                    
                </div>
                <!-- start of sebelah kanan -->
                <div class="span6 clearfix">
                    <div class="block-fluid without-head">
						<!-- start of toolbar -->
						<!-- end of toolbar -->
						<!-- start of right form -->
                        <div class="row-form clearfix">
                            <div class="span3">Password</div>
                            <div class="span9"><input type="text" name="user_password" id="user_password" /></div>
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
