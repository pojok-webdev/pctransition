<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/devicetypes.js'></script>
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
    <div id="dAddDeviceType" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel"><span class="icon-plus icon-white"></span> Penambahan Jenis Peralatan</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<input type='hidden' name='id' id='devicetype_id' class="inpdevicetype">
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='name' id='devicetype_name' onclick='this.select();' class="inpdevicetype">
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Keterangan</div>
							<div class="span9">
								<textarea name="description" id="devicetype_description" onclick="this.select();" class="inpdevicetype" type="textarea"></textarea>
							</div>
						</div>
						<div class="footer">
							<button class="btn deviceTypeModalClose" type="button" id='save_device_type'>Simpan</button>
							<button class="btn deviceTypeModalClose" type="button" id='update_device_type'>Edit</button>
							<button class="btn deviceTypeModalClose" type="button">Tutup</button>
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
                        <h1>Daftar Jenis Peralatan</h1>
                        <ul class="buttons">
                            <li><a class="isw-plus" id="adddevice"></a></li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table devices" id="tDeviceType">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkall"/></th>
                                    <th width="31%">ID</th>
                                    <th width="31%">Name</th>
                                    <th width="31%">Keterangan</th>
                                    <th width="7%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <tr myid="<?php echo $obj->id;?>">
                                    <td><input type="checkbox" name="checkbox" value="<?php echo $obj->id;?>"/></td>
                                    <td><?php echo $obj->id;?></td>
                                    <td class="devicename"><?php echo $obj->name;?></td>
                                    <td class="devicedescription"><?php echo $obj->description;?></td>
                                    <td>
										<span class="icon-pencil dtedit"></span>
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
