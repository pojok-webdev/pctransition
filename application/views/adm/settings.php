<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div id="dModal" class="modal hidez fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p id="modalMessage">Data telah tersimpan.</p>
        </div>
    </div>
    <div id="dChangePassword" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Password</div>
							<div class="span9">
								<input type='password' name='password' id='password'>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Konfirmasi Password</div>
							<div class="span9"><input type="password" name="konfirmasipassword" id="konfirmasipassword" value=""/></div>
						</div>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" type="button" id='btnsavepassword'>Simpan</button>
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>
        </div>
    </div>
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
	<?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">User</a> <span class="divider">></span></li>
                <li class="active">Settings</li>
            </ul>
				<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace" user_id="<?php echo $user->id;?>" useremail="<?php echo $user->email;?>">
        <input type="hidden" name="useremail" id="useremail" value="<?php echo $user->email;?>">
        <input type="hidden" name="userid" id="userid" value="<?php echo $user->id;?>">
        <input type="hidden" name="username" id="username" value="<?php echo $user->username;?>">
            <div class="row-fluid">
                <div class="span3">
                    <div class="ushort clearfix">
                        <a href="#"><?php echo $this->session->userdata['username'];?></a>
                        <a href="#"><img src="<?php echo $user->pic;?>" class="img-polaroid" id='userpic' width=190 height=190></a>
                    </div>
					<input type='file' onchange='uploadImage(event)'/>
                </div>
                <div class="span9">
                    <div class="block-fluid without-head">
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                </div>
                            </div>
                            <div class="right">
                                <div class="btn-group">
									<button class='btn btn-small btn-warning' id="user_save"><span class="isw-ok" title="Simpan"></span></button>
									<button class='btn btn-small btn-warning' id="btnchangepassword">
										<span class="isw-lock" title="Ganti Password"></span>
									</button>
                                </div>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Name</div>
                            <div class="span9"><input type="text" name="username" id='username' readonly="readonly" value="<?php echo $user->username;?>"/></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="email" id="email" value="<?php echo $user->email;?>"/></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Phone</div>
                            <div class="span9"><input type="text" name="phone" id="phone" value="<?php echo $user->email;?>"/></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Tanggal Lahir</div>
                            <div class="span9">
								<input type="text" name="dob" id="dob" class="input-mini datepicker" value="<?php echo $user->dob;?>" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='<?php echo base_url();?>js/padilibs/padi.imagelib.js'></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/aquarius/adm/settings.js"></script>
</body>
</html>
