<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p id="modalMessage">Data telah tersimpan.</p>
        </div>
    </div>
    <div id="addPICDialog" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='name' id='pic_name' placeholder="Nama PIC" class="inp_pic" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Posisi</div>
							<div class="span9">
								<input type="text" name="position" id="pic_position" value="" placeholder="Posisi/Jabatan" class="inp_pic" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Phone</div>
							<div class="span9">
								<input type="text" name="hp" id="pic_hp" value="" placeholder="No Telepon/HP" class="inp_pic" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Email</div>
							<div class="span9">
								<input type="text" name="email" id="pic_email" value="" placeholder="Email PIC" class="inp_pic"/>
							</div>
						</div>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" type="button" id='btnsavepic'>Simpan</button>
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>
        </div>
    </div>
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
                <li><a href="#">Pelanggan</a> <span class="divider">></span></li>
                <li class="active">Edit</li>
            </ul>
        </div>
        <div class="workplace" user_id='<?php echo $obj->id;?>'>
        <input id="client_id" name="client_id" type="hidden" value="<?php echo $obj->id;?>" class="inp_pic">
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
                            <div class="span3">
								<input type="text" value="<?php echo $obj->phone_area;?>" name="phone" id="phone" class="inp_client"  />
							</div>
                            <div class="span6">
								<input type="text" value="<?php echo $obj->phone;?>" name="phone" id="phone" class="inp_client"  />
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Fax:</div>
                            <div class="span3">
								<input type="text" value="<?php echo $obj->fax_area;?> " name="fax" id="fax" class="inp_client"  />
							</div>
                            <div class="span6">
								<input type="text" value="<?php echo $obj->fax;?> " name="fax" id="fax" class="inp_client"  />
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Jenis Bisnis:</div>
                            <div class="span9">
								<?php echo form_dropdown('business_field',$business_fields,$obj->business_field,'class="inp_client" type="select"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
							<div class="head toolbar clearfix">
								PIC
								<div class="right">
										<div class="pagination pagination-mini">
											<ul>
												<li class="pointer" id="picAdd"><a>+</a></li>
											</ul>
										</div>
								</div>
							</div>

							<table class="table" id="tblPIC">
								<thead><tr><th>Nama</th><th>Jabatan</th><th>Email</th><th>Telp</th><th>Aksi</th></tr></thead>
								<tbody>
									<?php foreach($obj->pic as $pic){?>
									<tr myid="<?php echo $pic->id?>">
										<td><?php echo $pic->name;?></td>
										<td><?php echo $pic->position;?></td>
										<td><?php echo $pic->email;?></td>
										<td><?php echo $pic->hp;?></td>
										<td><span class="rmPIC pointer">Hapus</span></td>
									</tr>
									<?php }?>
								</tbody>
							</table>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Account Manager:</div>
                            <div class="span9">
								<?php echo $obj->user->username;?>
								<?php //echo form_dropdown('sale_id',$users,$obj->sale_id,'class="inp_client" id="sale_id" type="selectid"');?>
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
										<th>Alamat</th><th>PIC</th><th>Telp</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($obj->client_site as $site){?>
									<tr>
										<td><?php echo $site->address . ' ' . $site->city;?></td><td><?php echo $site->pic_name . ' ' . $site->position?></td><td><?php echo $site->pic_phone_area . ' ' . $site->pic_phone;?></td>
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
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Warehouse/client_edit.js'></script>
</body>
</html>
