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
	<script type='text/javascript'>
	prospectclick = function(){
		$.getJSON('<?php echo base_url();?>index.php/adm/get_prospects/'+$('#client_id').val(),function(data){
			$('#pic_name').val(data['pic_name']);
		});
	}
	$('.removesurveyor').click(function(){
		$(this).parent().parent().fadeOut(200);
		});
	</script>
	
<body>
    
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
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
                        
            <ul class="buttons">
                <li>
                    <a href="#" class="link_bcPopupList"><span class="icon-user"></span><span class="text">Users list</span></a>

                    <div id="bcPopupList" class="popup">
                        <div class="head">
                            <div class="arrow"></div>
                            <span class="isw-users"></span>
                            <span class="name">List users</span>
                            <div class="clear"></div>
                        </div>
                        <div class="body-fluid users">

                            <div class="item">
                                <div class="image"><a href="#"><img src="<?php echo base_url();?>img/aquarius/users/aqvatarius_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Aqvatarius</a>                                    
                                    <span>online</span>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="item">
                                <div class="image"><a href="#"><img src="<?php echo base_url();?>img/aquarius/users/olga_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Olga</a>                                
                                    <span>online</span>
                                </div>
                                <div class="clear"></div>
                            </div>                        

                            <div class="item">
                                <div class="image"><a href="#"><img src="<?php echo base_url();?>img/aquarius/users/alexey_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Alexey</a>  
                                    <span>online</span>
                                </div>
                                <div class="clear"></div>
                            </div>                              
                        
                            <div class="item">
                                <div class="image"><a href="#"><img src="<?php echo base_url();?>img/aquarius/users/dmitry_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Dmitry</a>                                    
                                    <span>online</span>
                                </div>
                                <div class="clear"></div>
                            </div>                         

                            <div class="item">
                                <div class="image"><a href="#"><img src="<?php echo base_url();?>img/aquarius/users/helen_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Helen</a>                                                                        
                                </div>
                                <div class="clear"></div>
                            </div>                                  

                            <div class="item">
                                <div class="image"><a href="#"><img src="<?php echo base_url();?>img/aquarius/users/alexander_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Alexander</a>                                                                        
                                </div>
                                <div class="clear"></div>
                            </div>                                  

                        </div>
                        <div class="footer">
                            <button class="btn" type="button">Add new</button>
                            <button class="btn btn-danger link_bcPopupList" type="button">Close</button>
                        </div>
                    </div>                    
                    
                </li>                
                <li>
                    <a href="#" class="link_bcPopupSearch"><span class="icon-search"></span><span class="text">Search</span></a>
                    
                    <div id="bcPopupSearch" class="popup">
                        <div class="head">
                            <div class="arrow"></div>
                            <span class="isw-zoom"></span>
                            <span class="name">Search</span>
                            <div class="clear"></div>
                        </div>
                        <div class="body search">
                            <input type="text" placeholder="Some text for search..." name="search"/>
                        </div>
                        <div class="footer">
                            <button class="btn" type="button">Search</button>
                            <button class="btn btn-danger link_bcPopupSearch" type="button">Close</button>
                        </div>
                    </div>                
                </li>
            </ul>
            
        </div>
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
                                    <button type="submit" class="btn btn-small btn-warning tip" title="Quick save" id='surveysite_save' value='<?php echo $obj->id;?>' onClick="surveysite_save();"><span class="icon-ok icon-white"></span></button>
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
                            <div class="span3">Alamat</div>
                            <div class="span9"><input type="text" name="address" id="address" value="<?php echo $obj->address;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Kota</div>
                            <div class="span9"><input type="text" name="city" id="city" value="<?php echo $obj->city;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC</div>
                            <div class="span9"><input type="text" name="pic" id="pic" value="<?php echo $obj->pic;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Jabatan PIC</div>
                            <div class="span9"><input type="text" name="pic_position" id="pic_position" value="<?php echo $obj->pic_position;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Kode Area</div>
                            <div class="span9"><input type="text" name="phone_area" id="phone_area" value="<?php echo $obj->phone_area;?>"/></div>
                        </div>


                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span9"><input type="text" name="phone" id="phone" value="<?php echo $obj->phone;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="pic_email" id="pic_email" value="<?php echo $obj->pic_email?>"/></div>
                        </div>                                                
                        
                        <div class="row-form clearfix">
                            <div class="span3">Lokasi</div>
                            <div class="span9"><input type="text" name="location" id="location" value="<?php echo $obj->location;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Elevation Ground</div>
                            <div class="span9"><input type="text" name="elevation_ground" id="elevation_ground" value="<?php echo $obj->elevation_ground;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Elevation Rooftop</div>
                            <div class="span9"><input type="text" name="elevation_rooftop" id="elevation_rooftop" value="<?php echo $obj->elevation_rooftop;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Bearing</div>
                            <div class="span9"><input type="text" name="bearing" id="bearing" value="<?php echo $obj->bearing;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Leg Course</div>
                            <div class="span9"><input type="text" name="leg_course" id="leg_course" value="<?php echo $obj->leg_course;?>"/></div>
                        </div>
                        
                        <div class="row-form clearfix">
                            <div class="span3">Leg Dist</div>
                            <div class="span9"><input type="text" name="leg_dist" id="leg_dist" value="<?php echo $obj->leg_dist;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">AMSL</div>
                            <div class="span9"><input type="text" name="amsl" id="amsl" value="<?php echo $obj->amsl;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">AGL</div>
                            <div class="span9"><input type="text" name="agl" id="agl" value="<?php echo $obj->agl;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Tgl Survey</div>
                            <div class="span9"><input type="text" name="survey_date" value="<?php echo (!is_null($obj->survey_date))?Common::longsql_to_human_date($obj->survey_date):'';?>" class="datepicker" id='survey_date' /></div>
                        </div>
                        
                        <div class="row-form clearfix">
                            <div class="span3">Pengantar</div>
                            <div class="span9">
								<select name='pengantar' id='pengantar'>
									<option value='1'>Ya</option>
									<option value='0'>Tidak</option>
								</select>
							</div>
                        </div>                        

                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9"><textarea name="resume" id="resume"><?php echo $obj->longresume?></textarea></div>
                        </div>


                        <div class="row-form clearfix">
                            <div class="span3">Kesimpulan</div>
                            <div class="span9">
                            <input type='radio' name='shortresume' value='2' class='resume' />Bisa dilaksanakan
                            <input type='radio' name='shortresume' value='1' class='resume' />Bisa dilaksanakan dengan syarat
                            <input type='radio' name='shortresume' value='0' class='resume' />Tidak bisa dilaksanakan
                            <input type='radio' name='shortresume' value='3' class='resume' />Belum ada kesimpulan
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
                <!-- START OF MATERIAL -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Material yang dibawa</h4>
							<!-- begin popup -->
                            <div id="navPopSurveyMaterial" class="popup" style="display: none;">
                                <div class="head clearfix">
                                    <div class="arrow"></div>
                                    <span class="isw-chats"></span>
                                    <span class="name">Penambahan Material</span>
                                </div>
                                <div class="body messages">
								<input type='hidden' name='sender' value='cabangklienadd' />
								<div class="row-form clearfix">
									<div class="span3">Nama</div>
									<div class="span9">
										<input type='text' name='material_name' id='material_name'>
										</div>
								</div>

								<div class="row-form clearfix">
									<div class="span3">Jumlah</div>
									<div class="span9"><input type="text" name="material_amount" id="material_amount" value=""/></div>
								</div>								</div>

                                <div class="footer">
									<button class="btn link_navPopSurveyMaterial" type="button" id='saveSurveyMaterial' survey_site_id='<?php echo $obj->id;?>' onClick="insertsurveymaterial()">Simpan</button>
                                    <button class="btn link_navPopSurveyMaterial" type="button" onClick="addsurveymaterial()">Tutup</button>
                                </div>

							</div>
							<!-- end popup -->
                        </div>                         
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-eye-close icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn-danger tip link_navPopSurveyMaterial" title="Tambah Material" onClick="addsurveymaterial()"><span class="icon-plus icon-white"></span></button>
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
								<?php foreach($obj->survey_material as $material){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><img src="<?php echo base_url();?>img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><?php echo $material->name;?></a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td><?php echo $material->amount;?></td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a><span class="icon-remove material_remove" material_id='<?php echo $material->id;?>'></span></a></td>
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
				<!-- END OF MATERIAL -->

				<!-- Start of Devices -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Peralatan yang dibawa</h4>
							<!-- begin popup -->
                            <div id="navPopSurveyDevice" class="popup" style="display: none;">
                                <div class="head clearfix">
                                    <div class="arrow"></div>
                                    <span class="isw-chats"></span>
                                    <span class="name">Penambahan Peralatan</span>
                                </div>
                                <div class="body messages">
								<input type='hidden' name='sender' value='cabangklienadd' />
								<div class="row-form clearfix">
									<div class="span3">Peralatan</div>
									<div class="span9">
										<?php echo form_dropdown('device_name',$devices,0,'id="device_name"');?>
										</div>
								</div>

								<div class="row-form clearfix">
									<div class="span3">Jumlah</div>
									<div class="span9"><input type="text" name="device_amount" id="device_amount" value=""/></div>
								</div>								</div>

                                <div class="footer">
									<button class="btn link_navPopSurveyDevice" type="button" id='saveSurveyDevice' survey_id='<?php echo $obj->id;?>' onClick="insertsurveydevice()">Simpan</button>
                                    <button class="btn link_navPopSurveyDevice" type="button" onClick="addsurveydevice()">Tutup</button>
                                </div>

							</div>
							<!-- end popup -->
                        </div>                         
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-eye-close icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn-danger tip" title="Tambah Material" onClick="addsurveydevice()"><span class="icon-plus icon-white"></span></button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images device">
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
								<?php foreach($obj->survey_device as $device){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><img src="<?php echo base_url();?>img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><?php echo $device->device->name;?></a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td><?php echo $device->amount;?></td>
                                    <td><a><span class="icon-pencil"></span></a> <a><span class="icon-remove device_remove" device_id="<?php echo $device->id; ?>" ></span></a></td>                                    
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
				
				<!-- Dnd of Devices -->


				<!-- Start of Images -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Gambar SUrvey</h4>
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
								<?php foreach($obj->survey_image as $image){?>
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
				
				<!-- End of Images -->
                </div>
                
                <div class="span6">
                <!-- begin of kolom kanan -->
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Jarak dengan Klien yang lain</h4>
                            <!-- Add popup -->
                            <div id="navPopCabangKlien" class="popup" style="display: none;">
                                <div class="head clearfix">
                                    <div class="arrow"></div>
                                    <span class="isw-chats"></span>
                                    <span class="name">Pilih Surveyor</span>
                                </div>
                                <div class="body messages">
								<!-- begin of form -->
								<form id='formcabangklien' action='<?php echo base_url();?>index.php/adm/handler' method='POST'>
								<input type='hidden' name='sender' value='cabangklienadd' />
								<div class="row-form clearfix">
									<div class="span3">Nama</div>
									<div class="span9">
										<?php echo form_dropdown('client',$clients,0,'id="client_id"');?>
										</div>
								</div>
								<div class="row-form clearfix">
									<div class="span3">Jarak</div>
									<div class="span9">
										<input type='text' name='distance' id='distance'>
										</div>
								</div>
								</form>
								<!-- end of form -->									
                                </div>
                                <div class="footer">
									<button class="btn link_navPopCabangKlien" type="button" id='saveotherclient' survey_id='123'>Simpan</button>
                                    <button class="btn link_navPopCabangKlien" type="button">Tutup</button>
                                </div>
                            </div>
                            <!-- End of popup -->
                        </div>
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-eye-close icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn-danger tip link_navPopCabangKlien" title="Add"><span class="icon-plus icon-white"></span></button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images otherclient">
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
								<?php foreach($obj->survey_client_distance as $client){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><img src="<?php echo base_url();?>img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><?php echo $client->client->name;?></a> <span>fk-hseosqassr.jpg</span> <span><?php //echo $site->pic?></span></td>
                                    <td><?php echo $client->distance;?></td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer link_navRemCabangKlien otherclient_remove" id='<?php echo $client->id;?>' ></span></a></td>                                    
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
                
                <!-- end of kolom kanan -->

                <!-- begin of kolom kanan -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Jarak dengan BTS sekitar</h4>
                            <!-- Add popup -->
                            <div id="navPopBTSDistance" class="popup" style="display: none;">
                                <div class="head clearfix">
                                    <div class="arrow"></div>
                                    <span class="isw-chats"></span>
                                    <span class="name">Pilih BTS</span>
                                </div>
                                <div class="body messages">
<!-- begin of form -->
								<form id='formbtsdistance' action='<?php echo base_url();?>index.php/adm/handler' method='POST'>
								<input type='hidden' name='sender' value='cabangklienadd' />
								<div class="row-form clearfix">
									<div class="span3">Nama BTS</div>
									<div class="span9">
										<?php echo form_dropdown('bts',$btstowers,0,'id="bts_id"');?>
										</div>
								</div>
								<div class="row-form clearfix">
									<div class="span3">Jarak</div>
									<div class="span9">
										<input type='text' name='bts_distance' id='bts_distance'>
										</div>
								</div>
								</form>
<!-- end of form -->									
                                </div>
                                <div class="footer">
									<button class="btn link_navPopBTSDistance addbtsdistance" type="button" id='saveBTSDistance' survey_site_id='<?php echo $obj->id;?>' onClick='savebtsdistance();'>Simpan</button>
                                    <button class="btn link_navPopBTSDistance addbtsdistance" type="button">Tutup</button>
                                </div>
                            </div>
                            <!-- End of popup -->
                        </div>                         
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-eye-close icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn-danger tip addbtsdistance" title="Tambah"><span class="icon-plus icon-white"></span></button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images btsdistance">
                            <thead>
                                <tr>
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Image</th>
                                    <th>Name</th>
                                    <th width="60">Size</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->survey_bts_distance as $bts){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><img src="<?php echo base_url();?>img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><?php echo $bts->btstower->name;?></a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td><?php echo $bts->distance;?></td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a><span class="icon-remove btsdistance_remove" btsdistance_id='<?php echo $bts->id;?>'></span></a></td>                                    
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-eye-close icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn-danger tip" title="Delete"><span class="icon-remove icon-white"></span></button>
                                </div>                                
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
                
                <!-- end of kolom kanan -->
                </div>

<!-- batas bawah -->                
            </div>            
            
            
            
        </div>
        <!-- </form> -->
    </div>   
    
</body>
</html>
