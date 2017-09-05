<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
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
                <li><a href="#">users</a> <span class="divider">></span></li>
                <li class="active">Edit</li>
            </ul>
        </div>
        <div class="workplace" user_id='<?php echo $obj->id;?>'>
            <input type="hidden" name="id" id="userid" value="<?php echo $obj->id;?>" class="inpuser" />
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Edit User</h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">

						<div class="ushort clearfix">
							<a href="#"><?php echo $obj->username;?></a>
							<a href="#"><img src="<?php echo $obj->pic;?>" class="img-polaroid" id='userpic' width=190 height=190></a>
						</div>
						<input type='file' onchange='uploadImage(event)'/>



                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Nama:</div>
                            <div class="span9">
								<input type="text" placeholder="Nama..." value="<?php echo $obj->username;?>" name='username' id='username' class="inpuser"/>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Golongan:</div>
                            <div class="span9"><?php echo form_dropdown('golongan',$golongan,$obj->golongan,'id="golongan" class="inpuser" type="select"');?></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Email:</div>
                            <div class="span9"><input type="text" value="<?php echo $obj->email?>" name='email' id='email' class="inpuser"/></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Phone:</div>
                            <div class="span9"><input type="text" value="<?php echo $obj->phone;?> " name="phone" id="phone"  class="inpuser"/></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">First name:</div>
                            <div class="span9"><input type="text" placeholder="First name" value="<?php echo $obj->first_name;?>" id='firstname'  name='first_name' class="inpuser"/></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Last name:</div>
                            <div class="span9"><input type="text" placeholder="Last name" value="<?php echo $obj->last_name;?>" id='lastname'  name='last_name' class="inpuser"/></div>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Divisi dan Cabang</h1>
						<ul class="buttons">
							<li><span class="isw-lock" id="btnchangepassword" title="ganti Password"></span></li>
							<li><span class="isw-ok" id="btnsaveuser" title="simpan"></span></li>
						</ul>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span2">Divisi:</div>
                            <div class="span10 divisi">
								<?php foreach(Group::populate() as $grp){?>
								<?php
								$checked = (User::is_member_of($obj->id,$grp->id))?'checked="checked"':'';
								?>
                                <label class="checkbox inline">
                                    <input type="checkbox" class='chkdivision' value="<?php echo $grp->id;?>" <?php echo $checked;?>/> <?php echo $grp->name;?>
                                </label>
                                <?php }?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span2">Cabang:</div>
                            <div class="span10 branch">
								<?php foreach(Branch::populate() as $branch){?>
								<?php
								$checked = (User::is_member_of_branch($obj->id,$branch->id))?'checked="checked"':'';
								?>
                                <label class="checkbox inline">
                                    <input class='chkbranch' type="checkbox" value="<?php echo $branch->id;?>" <?php echo $checked;?>/> <?php echo $branch->name;?>
                                </label>
                                <?php }?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Disupervisi oleh:</div>
                            <div class="span7 divisi">
								<?php echo form_dropdown('supervisor',User::get_combo_data("Tidak memiliki Supervisor"),$obj->supervisor->id,'id="supervisor_id"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Job Description:</div>
                            <div class="span7 divisi">
								<?php foreach($roles as $role){?>
									<?php
										$checked = (User::is_member_of_role($obj->id,$role->id))?'checked="checked"':'';
									?>
									<input class='jobdesc' type='checkbox' value='<?php echo $role->id;?>' <?php echo $checked;?> /><?php echo $role->name;?> &nbsp;
								<?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type='text/javascript' src='<?php echo base_url();?>js/padilibs/padi.imagelib.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/user_edit.js'></script>
</body>
</html>
