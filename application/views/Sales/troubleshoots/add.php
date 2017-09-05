<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/troubleshoot_add.js'></script>
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
    <div id="dconfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <h3 id="myModalLabel"> Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Untuk menambah kantor cabang, Anda harus menyimpan permintaan troubleshoot ini terlebih dahulu. Setelah itu lakukan penambahan kantor cabang melalui menu Edit, pada tabel permintaan troubleshoot</p>
            <p>Apakah anda akan menyimpannya sekarang ?</p>
            <p></p>
            <p>
				<div class="button-group">
					<button type="button" class="btn btn-small btn-warning tip btnconfirmation" id="troubleshoot_save"><span class="icon-ok"></span> Simpan</button>
					<button type="button" class="btn btn-small btn-warning tip btnconfirmation" id="cancel_install_save"><span class="icon-remove"></span> Batal</button>
				</div>
			</p>
        </div>
    </div>
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
        <div class="workplace" id="workplace" username = "<?php echo $this->session->userdata['username'];?>" client_id="<?php echo $obj->client_id;?>" survey_id="<?php echo $obj->id;?>">
            
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
                            <div class="span9"><input type="text" name="troubleshoot_date" value="<?php echo (!is_null($obj->install_date))?Common::longsql_to_human_date($obj->install_date):'';?>" class="datepicker" id='troubleshoot_date' /></div>
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
                


                </div>

<!-- batas bawah -->                
            </div>            
            
            
            
        </div>
        <!-- </form> -->
    </div>   
    
</body>
</html>
