<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type='text/javascript' src='/js/aquarius/backbones.js'></script>
<body>
    <div id="dconfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <h3 id="myModalLabel"> Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p><b>Peringatan !</b></p>
                    <p>Anda hendak menghapus <span id="modal_material_name"></span> (id = <span id="modal_backbone_id"></span>) dari daftar Backbone !</p>
                    <p>Apakah anda yakin ?</p>
                    <p></p>
                    <p>
                <div class="button-group">
                    <button type="button" class="btn btn-small btn-warning tip modalclose" id="modal_backbone_remove"><span class="icon-ok"></span> Yakin</button>
                    <button type="button" class="btn btn-small btn-warning tip modalclose" id="cancel_install_save"><span class="icon-remove"></span> Tidak</button>
                </div>
            </p>
        </div>
    </div>
    <div id="dAddBackbone" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel"><span class="icon-plus icon-white"></span> Penambahan Backbone</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Cabang</div>
							<div class="span9">
								<?php foreach($branches as $key=>$val){?>
									<input type="checkbox" value="<?php echo $key?>" textvalue="<?php echo $val?>"><?php echo $val?>
								<?php }?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='backbone_name' id='backbone_name'>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Lokasi</div>
							<div class="span9"><input type="text" name="location" id="location" value=""/></div>
						</div>
						<div class="footer">
							<button class="btn closemodalx" type="button" id='save_backbone'>Simpan</button>
							<button class="btn closemodal" type="button">Tutup</button>
						</div>
					</div>
				</div>
			</div>

        </div>
    </div>
    <div id="dEditBackbone" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel"><span class="icon-plus icon-white"></span>Edit Backbone</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span12" id="listcabang">
								<?php foreach($branches as $key=>$val){?>
                                    <label id="<?php echo "branchsign_".$val;?>" strval="<?php echo $key;?>" class="branchsign">
                                    &#9746;
                                    </label>
                                    <label id="<?php echo "branch_".$key;?>" class="backbonebranchedit">
                                    <?php echo $val;?>
                                    </label>
								<?php }?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='backbone_name_update' id='backbone_name_update'>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Location</div>
							<div class="span9"><input type="text" name="location_update" id="location_update" value=""/></div>
						</div>

						<div class="footer">
							<button class="btn closemodalx" type="button" id='update_backbone'>Update</button>
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
                <li><a href="#">Backbones</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace" username="<?php echo $this->session->userdata['username'];?>">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Daftar Backbone</h1>
                        <ul class="buttons">
                            <li><a href="#" class="isw-plus" id="addBackbone"></a></li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table materials tblbackbone" id="tBackbone">
                            <thead>
                                <tr>
                                    <th width="6%">ID</th>
                                    <th width="20%">Cabang</th>
                                    <th width="20%">Nama</th>
                                    <th width="47%">Lokasi</th>
                                    <th width="7%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php foreach($objs as $obj){?>
								<?php 
/*									$arr = array();
									foreach($obj->branch as $branch){
										array_push($arr,$branch->name);
									}
									$brstr = implode(",",$arr);*/
								?>
                                <tr thisid="<?php echo $obj->id;?>">
                                    <td><?php echo $obj->id;?></td>
                                    <td class="backbonebranch"><?php echo $obj->branch;?></td>
                                    <td class="backbonename"><?php echo $obj->name;?></td>
                                    <td class="backbonelocation"><?php echo $obj->location;?></td>
                                    <td>
										<span class="icon-pencil editbackbone pointer"></span>
										<span class="remove_backbone icon-trash" material_name="<?php echo $obj->name;?>" material_id="<?php echo $obj->id;?>"></span>
									</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- to use -->
            <div class="dr"><span></span></div>
        </div>
    </div>
</body>
</html>
