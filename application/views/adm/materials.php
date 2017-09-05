<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
	<?php $this->load->view("common/dialogs");?>
    <div id="dAddmaterial" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myAddMaterialModalLabel"><span class="icon-plus icon-white"></span> Penambahan Material</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Tipe</div>
							<div class="span9"><?php echo form_dropdown('materialtype_id',$materialtypes,0,'id="editmaterialtype_id" type="selectid" class="inp_material"');?></div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='name' id='material_name' class="inp_material">
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Satuan</div>
							<div class="span9"><input type="text" name="satuan" id="material_satuan" value="" class="inp_material"/></div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Keterangan</div>
							<div class="span9"><textarea name="description" id="material_description" type="textarea" class="inp_material"></textarea></div>
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
                <li><a href="#">Materials</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace" username="<?php echo $this->session->userdata['username'];?>">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Daftar Material</h1>
                        <ul class="buttons">
                            <li><a href="#" class="isw-plus" id="addmaterial"></a></li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table materials" id="tMaterial">
                            <thead>
                                <tr>
                                    <th width="41%">Nama</th>
                                    <th width="15%">Tipe</th>
                                    <th width='6%'>Satuan</th>
                                    <th width="31%">Keterangan</th>
                                    <th width="7%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <tr myid="<?php echo $obj->id;?>">
                                    <td class="materialname"><?php echo $obj->name;?></td>
                                    <td class="materialtype"><?php echo $obj->materialtype->name;?></td>
                                    <td class="materialsatuan"><?php echo $obj->satuan;?></td>
                                    <td class="materialdescription"><?php echo $obj->description;?></td>
                                    <td>
										<span class="icon-pencil material_edit pointer"></span>
										<span class="remove_material pointer icon-trash"></span>
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
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/materials.js'></script>
</body>
</html>
