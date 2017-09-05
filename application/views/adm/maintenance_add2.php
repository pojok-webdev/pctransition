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
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/maintenance_add2.js'></script>
	
<body>
    <div id='notify'></div>
    
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
									
									<a href="#dModal" role="button"  class="btn btn-small btn-warning tip" title="Quick save"  data-toggle="modal" id='maintenance_act_save' value='<?php echo $obj->id;?>'><span class="icon-ok icon-white"></span></a>

                                    <button type="button" class="btn btn-small btn-danger tip" title="Delete user"><span class="icon-remove icon-white"></span></button>
                                </div>
                            </div>
                        </div>
                        <!-- tempat form -->


                        <div class="row-form clearfix">
                            <div class="span3">Jenis</div>
                            <div class="span9">
								<?php echo form_dropdown('maintenance_type',$maintenance_type,$obj->maintenance_type,'id="maintenance_type"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo form_dropdown('nameofmtype',array(),1,'id="nameofmtype"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Lokasi</div>
                            <div class="span9"><input type="text" name="location" id="location" value="<?php echo $obj->location;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC</div>
                            <div class="span9"><input type="text" name="pic_name" id="pic_name" value="<?php echo $obj->pic;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Jabatan PIC</div>
                            <div class="span9"><input type="text" name="pic_position" id="pic_position" value="<?php echo $obj->pic_position;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Kode Area</div>
                            <div class="span9"><input type="text" name="pic_phone_area" id="pic_phone_area" value="<?php echo $obj->phone_area;?>"/></div>
                        </div>


                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span9"><input type="text" name="pic_phone" id="pic_phone" value="<?php echo $obj->phone;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="pic_email" id="pic_email" value="<?php echo $obj->pic_email?>"/></div>
                        </div>                                                
                        
                        <div class="row-form clearfix">
                            <div class="span3">Waktu</div>
                            <div class="span9"><?php echo form_dropdown('period',$periods,1,'id="period"');?></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Ada Downtime ?</div>
                            <div class="span9"><?php echo form_dropdown('downtime_exist',array('1'=>'Ya','0'=>'Tidak'),1,'id="downtime_exist"');?></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Durasi Downtime</div>
                            <div class="span9"><input type="text" name="downtime_duration_hour" id="downtime_duration_hour"/><input type="text" name="downtime_duration_minute" id="downtime_duration_minute"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Notes</div>
                            <div class="span9"><textarea name="notes" id="notes"></textarea></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Berbayar ?</div>
                            <div class="span9"><?php echo form_dropdown('payable',array('1'=>'Ya','0'=>'Tidak'),1,'id="payable"');?></div>
                        </div>
                        
                        <div class="row-form clearfix">
                            <div class="span3">Tindak Lanjut</div>
                            <div class="span9">
								<input type="radio" name="follow_up" class="follow_up" value="0"/>Diterima
								<input type="radio" name="follow_up" class="follow_up" value="1"/>Dijadwal Ulang
								<input type="radio" name="follow_up" class="follow_up" value="2"/>Konfirmasi
                            </div>
                            <div id='jadwal_ulang'>
                            </div>
                        </div>




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
                <!-- START OF Maintenance Operator -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Petugas Maintenance</h4>
							<!-- begin popup -->
                            <div id="navPopSurveyMaterial" class="popup" style="display: none;">
                                <div class="head clearfix">
                                    <div class="arrow"></div>
                                    <span class="isw-chats"></span>
                                    <span class="name">Penambahan Petugas Maintenance</span>
                                </div>
                                <div class="body messages">
								<input type='hidden' name='sender' value='cabangklienadd' />
								<div class="row-form clearfix">
									<div class="span3">Nama</div>
									<div class="span9">
										<input type='text' name='operator_name' id='operator_name'>
										</div>
								</div>


                                <div class="footer">
									<button class="btn link_navPopMaintenanceOperator" type="button" id='savemaintenanceoperator' survey_site_id='<?php echo $obj->id;?>' >Simpan</button>
                                    <button class="btn link_navPopMaintenanceOperator" type="button" onClick="addmaintenanceoperator()">Tutup</button>
                                </div>

							</div>
							<!-- end popup -->
                        </div>                         
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-eye-close icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn-danger tip link_navPopMaintenanceOperator" title="Tambah Petugas" ><span class="icon-plus icon-white"></span></button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images material">
                            <thead>
                                <tr>
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Image</th>
                                    <th>Name</th>
                                    <th width="60">Jumlah</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->user as $operator){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><img src="<?php echo base_url();?>img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><?php echo $operator->username;?></a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td><?php echo $operator->amount;?></td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a><span class="icon-remove material_remove" material_id='<?php echo $operator->id;?>'></span></a></td>
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
				<!-- END OF Operator -->


                </div>
                
                <div class="span6">
				<!-- Start of Uploaded Form -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Form yang diupload</h4>
                            <span id="status" ></span>
							<!-- begin popup -->
                            <div id="navPopSurveyImage" class="popup" style="display: none;">
                                <div class="head clearfix">
                                    <div class="arrow"></div>
                                    <span class="isw-chats"></span>
                                    <span class="name">Penambahan Gambar Survey</span>
                                </div>
                                <div class="body messages">
								<input type='hidden' name='sender' value='cabangklienadd' />
								<div class="row-form clearfix">
									<div class="span3">Alamat</div>
									<div class="span9">
										<input type='text' name='material_name' id='material_name'>
										</div>
								</div>

								<div class="row-form clearfix">
									<div class="span3">Kota</div>
									<div class="span9"><input type="text" name="material_amount" id="material_amount" value=""/></div>
								</div>								</div>

                                <div class="footer">
									<button class="btn link_navPopSurveyImage" type="button" id='saveSurveyImage' survey_id='<?php echo $obj->id;?>' onClick="addsurveyimage()">Simpan</button>
                                    <button class="btn link_navPopSurveyImage" type="button" onClick="addsurveyimage()">Tutup</button>
                                </div>

							</div>
							<!-- end popup -->
                        </div>                         
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-eye-close icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn-danger tip" title="Tambah Gambar"  id="addsurveyimage"  ><span class="icon-plus icon-white"></span></button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images gambar">
                            <thead>
                                <tr>
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Image</th>
                                    <th>Name</th>
                                    <th width="60">Jumlah</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->maintenance_image as $image){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>media/<?php echo $image->path;?>"><img src="<?php echo base_url();?>media/<?php echo $image->path?>" class="img-polaroid" width=50 height=38 /></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><?php echo $image->name;?></a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td><?php echo $material->amount;?></td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
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
				
				<!-- End of Uploaded Form -->

                </div>

<!-- batas bawah -->                
            </div>            
            
            
            
        </div>
        <!-- </form> -->
    </div>   
</body>
</html>
