<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<?php $this->load->view('Sales/client_sites/modals');?>
<body>
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
				<li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="<?php echo base_url();?>index.php/clients">Pelanggan</a> <span class="divider">></span></li>
                <li><a href="#">Cabang Pelanggan</a> <span class="divider">></span></li>
                <li class="active">Edit</li>
            </ul>
        </div>
        <div class="workplace" user_id='<?php echo $obj->id;?>'>
        <input id="client_id" name="client_id" type="hidden" value="<?php echo $obj->id;?>" class="inp_pic">
			<div class="block-fluid without-head">
				<div class="toolbar clearfix">
					<div class="left">
						<?php echo $obj->client->name;?>
					</div>
					<div class="right">
						<div class="btn-group">
							<button class="btn btn-small btn-warning tip btnsave"><span class="icon-ok icon-white"></span></button>
							<button class="btn btn-small btnsave" type="button">Simpan</button>
						</div>
					</div>
				</div>
            </div>
			<div class="row-fluid">
				<div class="span12">
					<div class="head clearfix">
						<div class="isw-documents"></div>
						<h1>Cabang PadiNET yang menangani</h1>
					</div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span3">Cabang PadiNET yang menangani:</div>
                            <div class="span9">
									<?php for($i=1;$i<=count($branches);$i++){?>
										<?php
											$tocheck = true;
											foreach($obj->branch as $br){
												
												if($i===$br->id){
													$tocheck = false;
												}else{
												}
											}
											if(!$tocheck){
												$checked = 'checked="checked"';
											}else{
												$checked = '';
											}
										?>
										<input type="checkbox" <?php echo $checked;?> value="<?php echo $i;?>"><?php echo $branches[$i];?>
									<?php }?>
							</div>
                        </div>
                    </div>
				</div>
			</div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Edit Cabang Pelanggan (<?php echo $obj->client->name;?>)</h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span3">Alamat:</div>
                            <div class="span9"><input type="text" placeholder="Nama..." value="<?php echo $obj->address;?>" name='address' id='address'  class="inp_client"/></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Layanan:</div>
                            <div class="span9"><?php echo form_dropdown('service_id',$services,$obj->client->service_id,'id="service" class="inp_client" type="selectid"');?></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Kota:</div>
                            <div class="span9"><input type="text" placeholder="Kota..." value="<?php echo $obj->city;?>" name='city' id='city' class="inp_client" /></div>
                        </div>


                    </div>
                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Layanan</h1>
						<ul class="buttons">
							<li><span class="isw-plus" title="Tambah" id="btnaddservice"></span></li>
						</ul>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
							<table id="service" class="table">
								<thead>
									<tr>
										<th>Nama</th><th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($obj->clientservice as $service){?>
									<tr myid=<?php echo $service->id;?>>
										<td class="sname"><?php echo $service->product;?> <?php echo $service->name;?></td>
                                        <td>
                                            <div class="btn-group">                                        
                                            <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Action 
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="btneditservice">Edit</a></li>
                                                <li class="divider"></li>
                                                <li><a class="btnremoveservice">Hapus</a></li>
                                            </ul>
                                        </div> 
                                        </td>
									</tr>
									<?php }?>
								</tbody>
							</table>
                        </div>
                    </div>

                </div>
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>PIC</h1>
						<ul class="buttons">
							<li><span class="isw-plus" title="simpan"></span></li>
						</ul>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span3">Nama PIC:</div>
                            <div class="span9"><input type="text" placeholder="PIC..." value="<?php echo $obj->pic_name;?>" name='pic_name' id='pic_name' class="inp_client" /></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Jabatan PIC:</div>
                            <div class="span9"><input type="text" placeholder="Jabatan PIC..." value="<?php echo $obj->pic_position;?>" name='pic_position' id='pic_position' class="inp_client" /></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email PIC:</div>
                            <div class="span9"><input type="text" placeholder="Email PIC..." value="<?php echo $obj->pic_email;?>" name='pic_email' id='pic_email' class="inp_client" /></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Phone:</div>
                            <div class="span3">
								<input type="text" value="<?php echo $obj->pic_phone_area;?> " name="pic_phone" id="pic_phone" class="inp_client"  />
							</div>
                            <div class="span6">
								<input type="text" value="<?php echo $obj->pic_phone;?> " name="pic_phone" id="pic_phone" class="inp_client"  />
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Account Manager:</div>
                            <div class="span9">
								<?php echo $obj->client->user->username;?>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='/js/aquarius/Sales/client_sites/client_site_edit.js'></script>
</body>
</html>
