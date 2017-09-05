<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
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
								<input type='text' name='password' id='password'>
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Konfirmasi Password</div>
							<div class="span9"><input type="text" name="konfirmasipassword" id="konfirmasipassword" value=""/></div>
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
	<!-- end of notifikasi modal -->
    
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiNET Application" title="PadiNET Application"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
<?php $this->load->view('adm/menu');?>
        
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Pelanggan</a> <span class="divider">></span></li>
                <li class="active">Edit Prospect</li>
            </ul>
            
        </div>
        
        <div class="workplace" user_id='<?php echo $obj->id;?>'>
        <input id="client_id" name="client_id" type="hidden" value="<?php echo $obj->id;?>">

            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
						<ul class="buttons">
							<li><span class="isw-save" id="btnsave" title="simpan"></span></li>
						</ul>
                    </div>
				</div>
			</div>
            
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Edit Pelanggan</h1>
                    </div>
                    <div class="block-fluid">                        
                        
                        <div class="row-form clearfix">
                            <div class="span3">Nama:</div>
                            <div class="span9"><input type="text" placeholder="Nama..." value="<?php echo $obj->name;?>" name='name' id='name' class="inp_client" /></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Layanan:</div>
                            <div class="span9"><?php echo form_dropdown('service_id',$services,$obj->service_id,'id="service" class="inp_client" type="selectid"');?></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Alamat:</div>
                            <div class="span9"><input type="text" placeholder="Nama..." value="<?php echo $obj->address;?>" name='address' id='address'  class="inp_client"/></div>
                        </div> 
                        
                        <div class="row-form clearfix">
                            <div class="span3">Kota:</div>
                            <div class="span9"><input type="text" placeholder="Nama..." value="<?php echo $obj->city;?>" name='city' id='city' class="inp_client" /></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Phone:</div>
                            <div class="span9"><input type="text" value="<?php echo $obj->phone;?> " name="phone" id="phone" class="inp_client"  /></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Fax:</div>
                            <div class="span9"><input type="text" value="<?php echo $obj->fax;?> " name="fax" id="fax" class="inp_client"  /></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Jenis Bisnis:</div>
                            <div class="span9">
								<?php echo form_dropdown('business_field',$business_fields,$obj->business_field,'class="inp_client" type="select"');?>
							</div>
                        </div>                         

                        <div class="row-form clearfix">
                            <div class="span3">Email:</div>
                            <div class="span9"><input type="text" value="<?php echo $obj->email?>" name='email' id='email'  class="inp_clientxxx" /></div>                            
                        </div> 
                        
                        <div class="row-form clearfix">
                            <div class="span3">Biaya:</div>
                            <div class="span9"><input type="text" placeholder="Biaya" value="<?php echo $obj->fee;?>" id='fee'  name='fee' class="inp_client" /></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Account Manager:</div>
                            <div class="span9">
								<?php echo form_dropdown('sale_id',$users,$obj->sale_id,'class="inp_client" id="sale_id" type="selectid"');?>
							</div>
                        </div>
                    </div>
                </div>
                

                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Cabang / Sites</h1>
						<ul class="buttons">
							<li><span class="isw-ok" title="simpan"></span></li>
						</ul>
                    </div>
                    <div class="block-fluid">                        
                        
                        <div class="row-form clearfix">
							<table id="site" class="table">
								<thead>
									<tr>
										<th>Alamat</th><th>PIC</th><th>Lihat Detail</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($obj->client_site as $site){?>
									<tr>
										<td><?php echo $site->address?></td><td><?php echo $site->pic?></td>
										<td>
											<div class="btn-group">
												<button class="btn btndetilsite" type="button" >Detil</button>
											</div>
										</td>
									</tr>
									<?php }?>
								</tbody>
							</table>
                        </div>                        
                    </div>
                </div>                
                
            </div>
            
        
        </div>
        
    </div>   
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Accounting/client_edit.js'></script>
</body>
</html>
