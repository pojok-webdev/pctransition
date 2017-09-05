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
                            
                            <div class="span9">
								<?php echo $obj->address;?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Layanan:</div>
                            <div class="span9">
								<?php echo $obj->client->service->name;?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Kota:</div>
                            <div class="span9">
								<?php echo $obj->city;?>
							</div>
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
									</tr>
								</thead>
								<tbody>
									<?php foreach($obj->clientservice as $service){?>
									<tr>
										<td><?php echo $service->name;?></td>
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
						</ul>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span3">Nama PIC:</div>
                            <div class="span9">
								<?php echo $obj->pic_name;?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Jabatan PIC:</div>
                            <div class="span9">
								<?php echo $obj->pic_position;?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Email PIC:</div>
                            <div class="span9">
								<?php echo $obj->pic_email;?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Phone:</div>
                            <div class="span3">
								<?php echo $obj->pic_phone_area;?>
							</div>
                            <div class="span6">
								<?php echo $obj->pic_phone;?>
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
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Sales/client_site_edit.js'></script>
</body>
</html>
