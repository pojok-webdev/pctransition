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
/*	prospectclick = function(){
		$.getJSON('<?php echo base_url();?>index.php/adm/get_prospects/'+$('#client_id').val(),function(data){
			$('#pic_name').val(data['pic_name']);
		});
	}
	$('.removesurveyor').click(function(){
		$(this).parent().parent().fadeOut(200);
		});*/
	</script>
<body>
    
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
                        <a href="#"><?php echo $obj->client->name;?></a>
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
                                    <button type="submit" class="btn btn-small btn-warning tip" title="Quick save" id='survey_save' value='<?php echo $obj->id;?>'><span class="icon-ok icon-white"></span></button>
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
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo form_dropdown('client_id',$clients,$obj->client_id,'onClick="prospectclick()" id="client_id"');?>
								</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC</div>
                            <div class="span9"><input type="text" name="pic_name" id="pic_name" value="<?php echo $obj->pic_name;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span9"><input type="text" name="pic_phone" id="pic_phone" value="<?php echo $obj->pic_phone;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC Position</div>
                            <div class="span9"><input type="text" name="pic_position" id="pic_position" value="<?php echo $obj->pic_position;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="pic_email" id="pic_email" value="<?php echo $obj->pic_email?>"/></div>
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
                            <input type='radio' name='shortresume' value='2' class='resume' <?php echo $check2;?>/>Bisa dilaksanakan
                            <input type='radio' name='shortresume' value='1' class='resume' <?php echo $check1;?>/>Bisa dilaksanakan dengan syarat
                            <input type='radio' name='shortresume' value='0' class='resume' <?php echo $check0;?>/>Tidak bisa dilaksanakan
                            <input type='radio' name='shortresume' value='3' class='resume' <?php echo $check3;?>/>Belum ada kesimpulan
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
                <!-- start of PETUGAS SURVEY -->
                    <div class="block-fluid without-head">                        
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Petugas Survey</h4>
                            <!-- Add popup -->
                            <div id="navPopPetugasSurvey" class="popup" style="display: none;">
                                <div class="head clearfix">
                                    <div class="arrow"></div>
                                    <span class="isw-chats"></span>
                                    <span class="name">Pilih Surveyor</span>
                                </div>
                                <div class="body messages">
								<?php foreach(User::get_user_by_group('TS') as $user){?>
                                    <div class="item clearfix">
                                        <div class="image petugasSurvey"><a><img src="<?php echo $imagepath;?>users/aqvatarius.jpg" class="img-polaroid"/></a></div>
                                        <div class="info">
                                            <a class="name petugasSurvey" id='<?php echo $user->id;?>' survey_id='<?php echo $obj->id;?>' username='<?php echo $user->username;?>'><?php echo $user->username;?></a>
                                            <p><?PHP echo $user->email;?></p>
                                            <span><?PHP echo $user->createdate;?></span>
                                        </div>
                                    </div>
								<?php }?>
                                </div>
                                <div class="footer">
                                    <button class="btn link_navPopPetugasSurvey" type="button">Close</button>
                                </div>
                            </div>                                                                                                                          
                            <!-- End of popup -->
                            
                        </div>                         
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-eye-close icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn-danger tip link_navPopPetugasSurvey" title="Add"><span class="icon-plus icon-white"></span></button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images">
                            <thead>
                                <tr>
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Image</th>
                                    <th>Name</th>
                                    <th width="60">Size</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody class='surveyor'>
								<?php foreach($obj->user as $surveyor){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><img src="<?php echo base_url();?>img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><?php echo $surveyor->username;?></a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer link_navRemPetugasSurvey" survey_id='<?php echo $obj->id;?>' user_id='<?php echo $surveyor->id;?>'></span></a></td>
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
                <!-- end of PETUGAS SURVEY -->
                </div>
                
                <div class="span6">
                <!-- begin of kolom kanan -->
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Cabang kantor klien</h4>
                            <!-- Add popup -->
                            <div id="navPopSurveySite" class="popup" style="display: none;">
                                <div class="head clearfix">
                                    <div class="arrow"></div>
                                    <span class="isw-chats"></span>
                                    <span class="name">Tambah kantor cabang</span>
                                </div>
                                <div class="body messages">
								<!-- begin of form -->
								<form id='formsurveysite' action='<?php echo base_url();?>index.php/adm/handler' method='POST'>
								<input type='hidden' name='sender' value='surveysiteadd' />
								<div class="row-form clearfix">
									<div class="span3">Alamat</div>
									<div class="span9">
										<input type='text' name='address' id='site_address'>
										</div>
								</div>

								<div class="row-form clearfix">
									<div class="span3">Kota</div>
									<div class="span9"><input type="text" name="pic_name" id="site_city" value="<?php echo $obj->client->pic->name;?>"/></div>
								</div>


								<div class="row-form clearfix">
									<div class="span3">Phone Area</div>
									<div class="span9">
										<input type='text' name='site_phone_area' id='site_phone_area'>
										</div>
								</div>

								<div class="row-form clearfix">
									<div class="span3">Phone</div>
									<div class="span9"><input type="text" name="site_phone" id="site_phone" /></div>
								</div>


								<div class="row-form clearfix">
									<div class="span3">PIC</div>
									<div class="span9"><input type="text" name="site_pic_name" id="site_pic_name" /></div>
								</div>


								<div class="row-form clearfix">
									<div class="span3">PIC Position</div>
									<div class="span9">
										<?php echo form_dropdown('client_id',array('Direktur','Manager','Staff'),1,'id="site_pic_position"');?>
										</div>
								</div>
								</form>
								<!-- end of form -->
                                </div>
                                <div class="footer">
									<button class="btn link_navPopSurveySite" type="button" id='saveSurveySite' survey_id='<?php echo $obj->id;?>' >Simpang</button>
                                    <button class="btn link_navPopSurveySite" type="button" onClick="addsurveysite();">Tutup</button>
                                </div>
                            </div>
                            <!-- End of popup -->
                        </div>
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-eye-close icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn-danger tip link_navPopSurveySite" title="Tambah" onClick="addsurveysite()"><span class="icon-plus icon-white"></span></button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images">
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
								<?php foreach($obj->survey_site as $site){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><img src="<?php echo base_url();?>img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="<?php echo base_url();?>img/aquarius/example_full.jpg"><?php echo $site->address . ' - ' . $site->city;?></a> <span>fk-hseosqassr.jpg</span> <span><?php echo $site->pic?></span></td>
                                    <td><?php echo '(' . $site->phone_area . ')' . $site->phone;?></td>
                                    <td><a href="<?php echo base_url();?>adm/survey_site/<?php echo $site->id;?>"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer link_navRemSurveySite" survey_id='<?php echo $obj->id;?>' site_id='<?php echo $site->id?>' "></span></a></td>                                    
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

                </div>

<!-- batas bawah -->                
            </div>            
            
            
            
        </div>
        <!-- </form> -->
    </div>   
    
</body>
</html>

