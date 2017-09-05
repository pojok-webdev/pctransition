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
								<?php echo form_input('client_id',$obj->name,'id="client_id" readonly');?>
								</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC</div>
                            <div class="span9"><input type="text" name="pic_name" id="pic_name" value="<?php echo $obj->pic->name;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span2"><input type="text" name="pic_phone_area" id="pic_phone_area" value="<?php echo $obj->phone_area;?>"/></div>
                            <div class="span7"><input type="text" name="pic_phone" id="pic_phone" value="<?php echo $obj->phone;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC Position</div>
                            <div class="span9"><input type="text" name="pic_position" id="pic_position" value="<?php echo $obj->pic->position;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
							
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="pic_email" id="pic_email" value="<?php echo $obj->pic->email?>"/></div>
                        </div>
                        
                        <div class="row-form clearfix">
                            <div class="span3">Alamat</div>
                            <div class="span9">
								<?php echo form_input('address',$obj->address,'id="address"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Layanan</div>
                            <div class="span9">
								<?php echo form_dropdown('service',$services,$obj->service_interested_to,'id="service_id"');?>
							</div>
                        </div>
                        
                        
                        <div class="row-form clearfix">
                            <div class="span3">Perijinan</div>
                            <div class="span9">
								<select name='pengantar' id='pengantar'>
									<option value='1'>Ya</option>
									<option value='0'>Tidak</option>
								</select>
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
                            <div class="span3">Alamat Cabang</div>
                            <div class="span9">
								<?php echo form_input('site_address',$obj->address,'id="site_address"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Kota</div>
                            <div class="span9">
								<?php echo form_input('site_city',$obj->city,'id="site_city"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC Cabang</div>
                            <div class="span9"><input type="text" name="site_pic"  value='<?php echo $obj->pic->name;?>' id='site_pic' /></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">PIC Position</div>
                            <div class="span9"><input type="text" name="site_pic_position" id="site_pic_position" value="<?php echo $obj->pic->position;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Telp Cabang</div>
                            <div class="span2">
								<input type="text" name="site_phone_area"  value='<?php echo $obj->phone_area;?>'  id='site_phone' />
                            </div>
                            <div class="span7">
								<input type="text" name="site_phone"  value='<?php echo $obj->phone;?>'  id='site_phone' />
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email PIC Cabang</div>
                            <div class="span9"><input type="text" name="site_pic_email"  value='<?php echo $obj->pic->email;?>'  id='site_pic_email' /></div>
                        </div>


                        <div class="row-form clearfix">
                            <div class="span3">Tgl Survey</div>
                            <div class="span5"><input type="text" name="survey_date" class="datepicker"  id='survey_date' value="<?php echo date('d/m/Y')?>" /></div>
							<div class="span2">
								<?php echo form_dropdown('filterhour1',$hours,8,'id="filterhour1" class="dttime" parent="survey_date"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('filterminute1',$minutes,'','id="filterminute1" class="dttime" grandparent="survey_date"');?>
							</div>
                        </div>
                        

                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9"><textarea name="resume" id="resume"><?php echo $obj->longresume?></textarea></div>
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
