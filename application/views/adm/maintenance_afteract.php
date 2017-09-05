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
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/maintenance_afteract.js'></script>
	
<body>
    <div id='notify'></div>
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>

<?php $this->load->view('adm/menu',$data);?>
    <div class="content">
        
        <!-- start of breadline -->
			<?php $this->load->view('adm/breadline'); ?>
        <!-- end of breadline -->
        
        <div class="workplace">
            
            <div class="row-fluid">                
                <div class="span3">
                    <div class="ushort clearfix">
                        <a href="#"><?php echo $obj->id . ' - ' . $obj->client->name;?></a>
                        <a href="#"><img src="<?php echo base_url();?>img/aquarius/users/user_profile.jpg" class="img-polaroid"></a>
                        <input type="file" name="image"/>
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
                                    <button type="submit" class="btn btn-small btn-warning tip" title="Quick save" id='maintenance_afteract_save' value='<?php echo $obj->id;?>'><span class="icon-ok icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn-danger tip" title="Delete user"><span class="icon-remove icon-white"></span></button>
                                </div>
                            </div>
                        </div>
                        <!-- tempat form -->
        <form action='<?php echo base_url();?>index.php/adm/handler' method='POST' id='xyx'>
        <input type='hidden' name='sender' value='<?php echo $sender;?>' />
        <input type='hidden' name='id' value='<?php echo $obj->id;?>' />
        <input type='hidden' name='service_id' value='<?php echo $obj->service_id;?>' />


                        <div class="row-form clearfix">
                            <div class="span3">Perlu surat Ijin</div>
                            <div class="span9">
								<?php echo form_dropdown('permit',array('1'=>'Ya','0'=>'Tidak'),$obj->permit,'id="permit"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Konfirmasi dg email</div>
                            <div class="span9">
								<?php echo form_dropdown('confirm_by_mail',array('0'=>'H - 1','1'=>'J - 1'),1,'id="confirm_by_mail"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Tgl Pelaksanaan</div>
                            <div class="span9"><input type="text" name="maintenance_date" class='mysqldatepicker' id="maintenance_date" value="<?php echo $obj->maintenance_date;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Real Down Time</div>
                            <div class="span9">
								<input type="text" name="real_downtime_hour" id="real_downtime_hour" value="<?php echo $obj->real_downtime_hour;?>"/>
								<input type="text" name="real_downtime_minute" id="real_downtime_minute" value="<?php echo $obj->real_downtime_minute;?>"/>
								</div>
                        </div>

						</form>
						<!-- end of tempat form -->
                    </div>                    
                </div>
                <div class="span3 clearfix">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="block-fluid without-head">
                                <div class="row-form clearfix">                            
                                    <div class="span10">
                                        Activated user
                                    </div>
                                    <div class="span2">
                                        <input type="checkbox" value="1" name="activate" checked="checked"/> 
                                    </div>
                                </div>
                                <div class="row-form clearfix">                            
                                    <div class="span10">
                                        Allowed to comment
                                    </div>
                                    <div class="span2">
                                        <input type="checkbox" value="1" name="comment"/> 
                                    </div>
                                </div>
                                <div class="row-form clearfix">                            
                                    <div class="span10">
                                        Premium account
                                    </div>
                                    <div class="span2">
                                        <input type="checkbox" value="1" name="premium" checked="checked"/> 
                                    </div>
                                </div>
                                <div class="row-form clearfix">                            
                                    <div class="span10">
                                        Allowed to post
                                    </div>
                                    <div class="span2">
                                        <input type="checkbox" value="1" name="activate" checked="checked"/>
                                    </div>
                                </div>                        
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">                        
                            <div class="block-fluid without-head clearfix">
                                <ul class="sList" id="selectable_1">
                                    <li>Administrator</li>                                    
                                    <li>Content manager</li>
                                    <li class="ui-selected">Devaloper</li>
                                    <li>User</li>
                                </ul>                                                
                            </div>                   
                        </div>
                    </div>
                </div>                
            </div>            
            
            <div class="row-fluid">
                <div class="span6">
                <!-- start of PETUGAS Maintenance -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Petugas Maintenance</h4>
                            <!-- Add popup -->
                            <div id="navPopPetugasInstall" class="popup" style="display: none;">
                                <div class="head clearfix">
                                    <div class="arrow"></div>
                                    <span class="isw-chats"></span>
                                    <span class="name">Pilih Petugas Install</span>
                                </div>
                                <div class="body messages">
								<?php foreach(User::get_user_by_group('TS') as $user){?>
                                    <div class="item clearfix">
                                        <div class="image petugasInstall"><a><img src="<?php echo $imagepath;?>users/aqvatarius.jpg" class="img-polaroid"/></a></div>
                                        <div class="info">
                                            <a class="name petugasInstall" id='<?php echo $user->id;?>' maintenance_request_id='<?php echo $obj->id;?>' username='<?php echo $user->username;?>'><?php echo $user->username;?></a>
                                            <p><?PHP echo $user->email;?></p>
                                            <span><?PHP echo $user->createdate;?></span>
                                        </div>
                                    </div>
								<?php }?>
                                </div>
                                <div class="footer">
                                    <button class="btn link_navPopPetugasInstall" type="button">Close</button>
                                </div>
                            </div>                                                                                                                          
                            <!-- End of popup -->
                            
                        </div>                         
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-eye-close icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn-danger tip link_navPopPetugasInstall" title="Add"><span class="icon-plus icon-white"></span></button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images" id="PetugasInstall">
                            <thead>
                                <tr>
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Image</th>
                                    <th>Name</th>
                                    <th width="60">Size</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody class='maintenanceoperator'>
								<?php foreach($obj->user as $installer){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><img src="<?php echo base_url();?>img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><?php echo $installer->username;?></a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer link_navRemPetugasMaintenance" maintenance_request_id='<?php echo $obj->id;?>' user_id='<?php echo $installer->id;?>'></span></a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                   
                            <div class="right">
                                    <div class="pagination pagination-mini">
                                        <ul>
                                            <li class="disabled"><a href="#">Prev</a></li>
                                            <li class="disabled"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">Next</a></li>
                                        </ul>
                                    </div>                             
                            </div>                        
                        </div>                    

                    </div>
                <!-- end of PETUGAS Maintenance -->


                </div>
                
                <div class="span6">
                <!-- begin of Uploaded Form -->
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Form yang diupload</h4>
                            <!-- Add popup -->
                            <div id="navPopUploadForm" class="popup" style="display: none;">
                                <div class="head clearfix">
                                    <div class="arrow"></div>
                                    <span class="isw-chats"></span>
                                    <span class="name">Form yang diupload</span>
                                </div>
                                <div class="body messages">
								<!-- begin of form -->
								

								<div class="row-form clearfix">
									<div class="span3">Deskripsi</div>
									<div class="span9">
										<input type='text' name='form_upload_description' id='form_upload_description'>
										</div>
								</div>

								<div class="row-form clearfix">
									<div class="span3">File</div>
									<div class="span9">
										<input type='text' name='form_upload_image' id='form_upload_image'>
										<img id='form_upload_img' />
										<span id='status_form_upload'></span>
										<span id='pilih_form_upload'>Pilih</span>

										</div>
								</div>

								<!-- end of form -->
                                </div>
                                <div class="footer">
									<button class="btn link_navPopUploadForm" type="button" id='saveUploadForm' request_id='<?php echo $obj->id;?>' >Simpan</button>
                                    <button class="btn link_navPopUploadForm" type="button">Tutup</button>
                                </div>
                            </div>
                            <!-- End of popup -->
                        </div>
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-eye-close icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn-danger tip link_navPopUploadForm" title="Tambah"><span class="icon-plus icon-white"></span></button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table upload_form" id='upload_form'>
                            <thead>
                                <tr>
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Image</th>
                                    <th>Name</th>
                                    <th width="60">Size</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody class='site'>
								<?php foreach($obj->maintenance_image as $site){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>media/<?php echo $site->name;?>"><img src="<?php echo base_url() .'media/'. $site->name;?>" class="img-polaroid" width=50 height=38 /></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><?php echo $site->name;?></a> <span>fk-hseosqassr.jpg</span> <span><?php echo $site->description?></span></td>
                                    <td><?php echo '';?></td>
                                    <td><a href="<?php echo base_url();?>adm/survey_site/<?php echo $site->id;?>"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer link_navRemUploadForm" maintenance_id='<?php echo $obj->id;?>' image_id='<?php echo $site->id?>' "></span></a></td>                                    
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
                                    <div class="pagination pagination-mini">
                                        <ul>
                                            <li class="disabled"><a href="#">Prev</a></li>
                                            <li class="disabled"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">Next</a></li>
                                        </ul>
                                    </div>                             
                            </div>                        
                        </div>                    

                    </div>
                
                <!-- end of Uploaded Form -->


                </div>

<!-- batas bawah -->                
            </div>            
            
            
            
        </div>
        <!-- </form> -->
    </div>   
    
</body>
</html>
