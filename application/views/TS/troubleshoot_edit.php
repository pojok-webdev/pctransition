<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<link rel="stylesheet" href="<?php echo base_url();?>css/datetimepicker/jquery.datetimepicker.css" />
<style type="text/css">
.datetimeinput{
	width:10px;
	}
</style>
<script type='text/javascript' src='<?php echo base_url();?>js/datetimepicker/jquery.datetimepicker.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/troubleshoot_edit.js'></script>
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
    

    <!-- start of konfirmasi -->
    <div id="dconfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <h3 id="myModalLabel"> Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Untuk menambah kantor cabang pelanggan, Anda harus menyimpan perubahan pada form penambahan pelanggan terlebih dahulu.</p>
            <p>Apakah anda akan menyimpannya sekarang ?</p>
            <p></p>
            <p>
				<div class="button-group">
					<button type="button" class="btn btn-small btn-warning tip install_save"><span class="icon-ok"></span> Simpan</button>
					<button type="button" class="btn btn-small btn-warning tip" id="cancel_install_save"><span class="icon-remove"></span> Batal</button>
				</div>
			</p>
            
        </div>
    </div>
	<!-- end of konfirmasi -->

	<!-- start of penambahan kantor cabang -->
	
    <div id="dAddSite" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Site</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Alamat</div>
							<div class="span9">
								<input type='text' name='site_address' id='site_address'>
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Kota</div>
							<div class="span9"><input type="text" name="site_city" id="site_city" value=""/></div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">PIC</div>
							<div class="span9"><input type="text" name="site_pic" id="site_pic" value=""/></div>
						</div>
			
					</div>
				</div>
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Telepon</div>
							<div class="span2"><input type="text" name="site_phone_area" id="site_phone_area" value=""/></div>
							<div class="span7"><input type="text" name="site_phone" id="site_phone" value=""/></div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Email</div>
							<div class="span9"><input type="text" name="site_email" id="site_email" value=""/></div>
						</div>

						<div class="row-form clearfix">
							Keterangan
							<div class="span12"><textarea name="site_description" id="site_description" /></textarea></div>
						</div>
						<div class="footer">
							<button class="btn closemodal" type="button" id='savetroublesite'>Simpan</button>
							<button class="btn closemodal" type="button">Tutup</button>
						</div>
				
					</div>
				</div>
			</div>
			
        </div>
    </div>      

	
	<!-- end of penambahan kantor cabang -->
	
    <div class="header" username="<?php echo $this->session->userdata['username'];?>">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET Internal App" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>

	<?php $this->load->view('adm/menu',$path);?>
    <div class="content">
        
        <!-- start of breadline -->
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">DB_Teknis</a> <span class="divider">></span></li>
                <li><a href="#">Troubleshoot</a> <span class="divider">></span></li>
                <li class="active">Add</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>            
		</div>
        <!-- end of breadline -->
	<?php $myuser = $this->ion_auth->user()->row();?>
        <div class="workplace" id="workplace" username = "<?php echo $myuser->username;?>" client_id="<?php echo $obj->client_id;?>" troubleshoot_id="<?php echo $obj->id;?>">
            
            <div class="row-fluid">                
                <div class="span12">                                        
                    <div class="block-fluid without-head">                        
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                </div>
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                    <button class="btn btn-small btnsavetroubleshoot" title="Simpan Pengajuan Troubleshoot" type="button"><span class="icon-ok icon-white"></span> Simpan</button>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>

            <div class="row-fluid">                
                <div class="span6">                                        
                    <div class="block-fluid without-head">                        
                        <!-- tempat form -->

                        <div class="row-form clearfix">
                            <div class="span3">Nama Pelanggan</div>
                            <div class="span9">
								<?php echo form_input("client_id",$obj->client->name,"id='client_id' readonly");?>
								</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Alamat</div>
                            <div class="span9">
								<?php echo form_input("address",$obj->client->address,"id='address' readonly");?>
								</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Nama PIC</div>
                            <div class="span9"><input type="text" name="pic_name" id="pic_name" value="<?php echo $obj->pic_name;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span2">
								<input type="text" name="pic_phone_area" id="pic_phone_area" value="<?php echo $obj->pic_phone_area;?>"/>
							</div>
                            <div class="span7">
								<input type="text" name="pic_phone" id="pic_phone" value="<?php echo $obj->pic_phone;?>"/>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Jabatan PIC</div>
                            <div class="span9"><input type="text" name="pic_position" id="pic_position" value="<?php echo $obj->pic_position;?>"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9"><input type="text" name="pic_email" id="pic_email" value="<?php echo $obj->pic_email?>"/></div>
                        </div>
						<!-- end of tempat form -->
                    </div>                    
                </div>
                
                <div class="span6">                                        
                    <div class="block-fluid without-head">                        
                        <div class="row-form clearfix">
                            <div class="span3">Waktu Troubleshoot</div>
                            
                            <div class="span4"><?php echo form_input('required_time1',(!is_null($obj->request_date1))?Common::longsql_to_human_date($obj->request_date1):'','id="troubleshoot_date" class="datetimepicker troubleshootdatetimepicker"');?></div>
                            <div class="span1"> s/d </div>
                            <div class="span4"><?php echo form_input('required_time2','','id="troubleshoot_date2" class="datetimepicker troubleshootdatetimepicker"');?></div>
                            
                            <div class="span4"><label id="timetotal"></label></div>
                        </div>
                        

                        <div class="row-form clearfix">
                            <div class="span3">Layanan</div>
                            <div class="span9">
								<?php echo form_dropdown('service',$services,$obj->service_id,'id="service_id"');?>
							</div>
                        </div>                        

                        <div class="row-form clearfix">
                            <div class="span3">Berbayar ?</div>
                            <div class="span9">
								<select name='is_paid' id='is_paid'>
									<option value='1'>Ya</option>
									<option value='0'>Tidak</option>
								</select>
							</div>
                        </div>                        

                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9"><textarea name="description" id="description"><?php echo $obj->description?></textarea></div>
                        </div>

					</div>
				</div>
                <!-- x -->
            </div>            
            
            <div class="row-fluid">
                <div class="span6">


                </div>
                
                <div class="span6">
                <!-- begin of kolom kanan -->
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Cabang kantor klien</h4>
                        </div>
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
									<button class="btn btn-small btn-danger tip btnaddsite" type="button"><span class="icon-plus icon-white"></span> Penambahan site</button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images" id="site">
                            <thead>
                                <tr>
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Alamat</th>
                                    <th>Name</th>
                                    <th width="60">Email</th>
                                    <th width="40">Actions</th>
                                </tr>
                            </thead>
                            <tbody class='site'>
								<?php foreach($obj->troubleshootsite as $site){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td class="info"><a><?php echo $site->address;?></a><span><?php echo $site->city;?></span></td>
                                    <td class="info">
										<a><?php echo $site->pic_name?></a>
										<span><?php echo $site->pic_position;?></span>
										<span><?php echo '(' . $site->pic_phone_area . ')' . $site->pic_phone;?></span>
									</td>
                                    <td><?php echo $site->pic_email;?></td>
                                    <td><a href="<?php echo base_url();?>index.php/adm/troubleshoot_site/<?php echo $site->id;?>"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer btnRemoveTroubleshootSite"  site_id='<?php echo $site->id?>' ></span></a></td>                                    
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    


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
