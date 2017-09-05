<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/devices.js'></script>
<body>
    <div id="dConfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Akan menghapus, anda yakin ?</p>
        </div>
		<div class="modal-footer">
			<button class="btn btn-warning closemodal" type="button" id='yesButton'>Hapus</button>
			<button class="btn closemodal" type="button">Tutup</button>
		</div>        
    </div>    
    <div id="dAddDevice" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
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
							<div class="span9"><?php echo form_dropdown('devicetype',$devicetypes,0,'id="devicetype_id"');?></div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='device_name' id='device_name'>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Satuan</div>
							<div class="span9"><input type="text" name="device_satuan" id="device_satuan" value=""/></div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Keterangan</div>
							<div class="span9"><textarea name="device_description" id="device_description"></textarea></div>
						</div>
						<div class="footer">
							<button class="btn closemodal" type="button" id='save_device'>Simpan</button>
							<button class="btn closemodal" type="button">Tutup</button>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
    <div id="dEditDevice" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel"><span class="icon-plus icon-white"></span> Sunting Peralatan</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Tipe</div>
							<div class="span9"><?php echo form_dropdown('editdevicetype',$devicetypes,0,'id="editdevicetype_id"');?></div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">ID</div>
							<div class="span9">
								<input type='text' name='device_name' id='editdevice_id' readonly="">
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='device_name' id='editdevice_name'>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Satuan</div>
							<div class="span9"><input type="text" name="device_satuan" id="editdevice_satuan" value=""/></div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Keterangan</div>
							<div class="span9"><textarea name="device_description" id="editdevice_description"></textarea></div>
						</div>
						<div class="footer">
							<button class="btn closemodal" type="button" id='editsave_device'>Simpan</button>
							<button class="btn closemodal" type="button">Tutup</button>
						</div>
					</div>
				</div>
			</div>

        </div>
    </div>
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Device Types</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace" username="<?php echo $this->session->userdata['username'];?>">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Daftar Peralatan</h1>
                        <ul class="buttons">
                            <li><a href="#" class="isw-plus" id="adddevice"></a></li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table devices" id="tDevice">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkall"/></th>
                                    <th width="31%">Name</th>
                                    <th width="31%">Tipe</th>
                                    <th width="31%">Keterangan</th>
                                    <th width="7%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
					<?php foreach($objs as $obj){?>
                                <tr device_id="<?php echo $obj->id?>">
                                    <td><input type="checkbox" name="checkbox" value="<?php echo $obj->id;?>"/></td>
                                    <td><?php echo $obj->name;?></td>
                                    <td><?php echo $obj->devicetype->name;?></td>
                                    <td><?php echo $obj->description;?></td>
                                    <td>
					<span class="icon-pencil editdevice"  device_name="<?php echo $obj->name;?>" device_id="<?php echo $obj->id;?>" devicetype_id="<?php echo $obj->devicetype_id;?>" device_satuan="<?php echo $obj->satuan;?>" device_description="<?php echo $obj->description;?>"></span>
					<span class="remove_device icon-trash" device_name="<?php echo $obj->name;?>" device_id="<?php echo $obj->id;?>"></span>
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
</body>
</html>
