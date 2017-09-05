<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
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
                <li><a href="#">Pelanggan</a> <span class="divider">></span></li>
                <li class="active">Edit (Administrator)</li>
            </ul>
        </div>
	<?php $this->load->view('adm/clients/editmodals');?>
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
								<input type="text" value="<?php echo $obj->fax_area;?> " name="fax_area" id="fax_area" class="inp_client"  />
							</div>
                            <div class="span6">
								<input type="text" value="<?php echo $obj->fax;?> " name="fax" id="fax" class="inp_client"  />
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Tanggal Aktif:</div>
                            <div class="span9">
								<input type="text" value="<?php echo $obj->hactivedate();?> " name="activedate" id="activedate" class="inp_client datepicker"  />
							</div>
							<div>
								<input type='hidden' class='dttime' parent='activedate' value='00'>
								<input type='hidden' class='dttime' grandparent='activedate' value='00'>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Tanggal Mulai:</div>
                            <div class="span9">
								<input type="text" value="<?php echo $obj->hperiod1();?> " name="period1" id="period1" class="inp_client datepicker"  />
								<input type='hidden' class='dttime' parent='period1' value='00'>
								<input type='hidden' class='dttime' grandparent='period1' value='00'>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Tanggal Berakhir:</div>
                            <div class="span9">
								<input type="text" value="<?php echo $obj->hperiod2();?> " name="period2" id="period2" class="inp_client datepicker" />
								<input type='hidden' class='dttime' parent='period2' value='00'>
								<input type='hidden' class='dttime' grandparent='period2' value='00'>

							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Jenis Bisnis:</div>
                            <div class="span9">
								<?php echo form_dropdown('business_field',$business_fields,$obj->business_field,'class="inp_client" type="select"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
							
					<div class="head clearfix">
                        <h1>PIC</h1>
						<ul class="buttons">
							<li><span class="isw-plus" title="Tambah" id="btnaddpic"></span></li>
						</ul>
                    </div>
                    
					<!--		<div class="head toolbar clearfix">
								PIC
								<div class="right">
									<div class="pagination pagination-mini">
										<ul>
											<li class="pointer" id="picAdd"><a>+</a></li>
										</ul>
									</div>
								</div>
							</div>-->

							<table class="table" id="tblPIC">
								<thead><tr><th>Nama</th><th>Posisi</th><th>Email</th><th>Telp</th><th>Aksi</th></tr></thead>
								<tbody>
									<?php foreach($obj->pics as $pic){?>
									<tr myid="<?php echo $pic->id?>">
										<td class='picname'><?php echo $pic->name;?></td>
										<td class='picrole'><?php echo $pic->prole;?></td>
										<td class='picemail'><?php echo $pic->email;?></td>
										<td class='pictelp'><?php echo $pic->telp_hp;?></td>
										<td>
											<div class="btn-group">
												<button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span></button>
												<ul class="dropdown-menu pull-right">
													<li class="editPIC pointer"><a>Edit</a></li>
													<!--<li class="rmPIC pointer"><a>Hapus</a></li>-->
												</ul>
											</div>			
										</td>
									</tr>
									<?php }?>
								</tbody>
							</table>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Account Manager:</div>
                            <div class="span9">
								<span id="amname"><?php echo $obj->user->username;?></span> <button id="editAM">Edit</button>
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
							<li><span class="isw-plus" title="Tambah" id="btnaddsite"></span></li>
						</ul>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
							<table id="site" class="table">
								<thead>
									<tr>
										<th>Alamat</th><th>Act</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$arr = array();
										foreach($obj->client_site as $site){?>
										<?php foreach($site->clientservice as $service){
											array_push($arr,$service->name);
										}
										$services = '(' . implode(',',$arr) . ')';
										?>
									<tr rowid='<?php echo $site->id;?>'>
										<td><?php echo $site->address . ' ' . $site->city . ' ' . $services;?></td>
										<td>
											<div class="btn-group">
												<button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span></button>
												<ul class="dropdown-menu pull-right">
													<li class="btneditsite"><a>Edit</a></li>
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
            </div>
        </div>
    </div>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/adm/clients/client_edit.js'></script>
</body>
</html>
