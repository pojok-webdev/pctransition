<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div id="dconfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <h3 id="myModalLabel"> Konfirmasi</h3>
        </div>
        <div class="modal-body">
			<p><b>Peringatan !</b></p>
            <p>Anda hendak menghapus <span id="modal_material_name"></span> (id = <span id="modal_material_id"></span>) dari daftar Peralatan, data yang telah terhapus tidak dapat dikembalikan.</p>
            <p>Apakah anda yakin ?</p>
            <p></p>
            <p>
				<div class="button-group">
					<button type="button" class="btn btn-small btn-warning tip modalclose" id="modal_material_remove"><span class="icon-ok"></span> Yakin</button>
					<button type="button" class="btn btn-small btn-warning tip modalclose" id="cancel_install_save"><span class="icon-remove"></span> Tidak</button>
				</div>
			</p>
        </div>
    </div>
    <div id="dAddmaterial" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel"><span class="icon-plus icon-white"></span> Penambahan Peralatan</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Tipe</div>
							<div class="span9">
								<?php echo form_dropdown('editmaterialtype',$materialtypes,0,'id="materialtype"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<?php echo form_dropdown('device_id',array(),0,'id="device_id" class="inp_materials" type="selectid"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Banyaknya</div>
							<div class="span9"><input type="text" name="amount" id="material_amount" value="" class="inp_materials"/></div>
						</div>
						<div class="footer">
							<button class="btn closemodal" type="button" id='save_material'>Simpan</button>
							<button class="btn closemodal" type="button" id='update_material'>Update</button>
							<button class="btn closemodal" type="button">Tutup</button>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>media/logo.png" alt="PadiNET App" title="PadiNET App"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Survey Materials</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace">
        <input type="hidden" name="createuser" value="<?php echo $this->session->userdata['username'];?>" class="inp_materials" />
        <input type="hidden" name="surveypackage_id" value="<?php echo $this->uri->segment(3);?>" class="inp_materials" />
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Daftar Paket Perangkat Survey</h1>
                        <ul class="buttons">
                            <li><a href="#" class="isw-plus" id="addmaterial"></a></li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table materials" id="tSurveypackagedetails">
                            <thead>
                                <tr>
                                    <th width="41%">Nama</th>
                                    <th width="15%">Tipe</th>
                                    <th width="31%">Banyaknya</th>
                                    <th width="7%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <tr thisid="<?php echo $obj->id;?>">
                                    <td class="devicename"><?php echo $obj->name;?></td>
                                    <td class="devicetypename"><?php echo $obj->device->devicetype->name;?></td>
                                    <td class="deviceamount"><?php echo $obj->amount;?></td>
                                    <td>
										<div class="btn-group">
											<button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span></button>
											<ul class="dropdown-menu pull-right">
												<li class="deviceedit"><a href="#">Edit</a></li>
												<li class="divider survey_save"></li>
												<li class="deviceremove" ><a href="#">Hapus</a></li>
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
            <div class="dr"><span></span></div>
        </div>
    </div>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Warehouse/surveypackagedetails.js'></script>
</body>
</html>
