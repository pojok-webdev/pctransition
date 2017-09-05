<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
	<?php $this->load->view('adm/client_sites/clientsitemodal');?>
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET Application" title="PadiNET Application"/></a>
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
                            <div class="span3">Cabang PadiNET:</div>
                            <div class="span9"><?php echo form_dropdown('branch_id',$branches,$obj->branch_id,'id="branch" class="inp_client" type="selectid"');?></div>
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
										<th>Nama</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($obj->clientservice as $service){?>
									<tr trid='<?php echo $service->id;?>'>
										<td class="servicename"><?php echo $service->name;?></td>
										<td>
											<div class="btn-group">
												<button data-toggle="dropdown" class="btn btn-small dropdown-toggle" >Aksi <span class="caret"></span></button>
												<ul class="dropdown-menu pull-right">
													<li class="btneditservice"><a>Edit</a></li>
													<li class="divider survey_save"></li>
													<li class="btnremoveservice"><a>Hapus</a></li>
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
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/adm/client_site_edit.js'></script>
</body>
</html>
