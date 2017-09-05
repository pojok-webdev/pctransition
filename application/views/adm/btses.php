<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/btses.js'></script>
<body>
    <div id="dconfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <h3 id="myModalLabel"> Konfirmasi</h3>
        </div>
        <div class="modal-body">
			<p><b>Peringatan !</b></p>
            <p>Anda hendak menghapus <span id="modal_bts_name"></span> (id = <span id="modal_bts_id"></span>) dari daftar Peralatan, data yang telah terhapus tidak dapat dikembalikan.</p>
            <p>Apakah anda yakin ?</p>
            <p></p>
            <p>
		<div class="button-group">
			<button type="button" class="btn btn-small btn-warning tip modalclose" id="modal_bts_remove"><span class="icon-ok"></span> Yakin</button>
			<button type="button" class="btn btn-small btn-warning tip modalclose" id="cancel_install_save"><span class="icon-remove"></span> Tidak</button>
		</div>
	</p>
        </div>
    </div>
    <div id="dAddBTS" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel"> Penambahan BTS</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Cabang</div>
							<div class="span9"><?php echo form_dropdown('branches',$branches,0,'id="branches"');?></div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9"><?php echo form_input('bts_name','','id="bts_name"');?></div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Lokasi</div>
							<div class="span9">
								<input type='text' name='bts_location' id='bts_location'>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Keterangan</div>
							<div class="span9"><input type="text" name="bts_description" id="bts_description" value=""/></div>
						</div>
						<div class="footer">
							<button class="btn closemodal" type="button" id='save_bts'>Simpan</button>
							<button class="btn closemodal update_bts" type="button" id='update_bts'>Update</button>
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
                <li><a href="#">BTSes</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace" username="<?php echo $this->session->userdata['username'];?>">
        <input type="hidden" name="username" id="username" value="<?php echo $this->session->userdata['username'];?>"/ >
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Daftar BTS</h1>
                        <ul class="buttons">
                            <li><a href="#" class="isw-plus" id="addbts"></a></li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table btses" id="tBTS">
                            <thead>
                                <tr>
                                    <th width="6%">ID</th>
                                    <th width="31%">Nama</th>
                                    <th width="25%">Lokasi</th>
                                    <th width="31%">Keterangan</th>
                                    <th width="7%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <tr thisid="<?php echo $obj->id;?>">
                                    <td class="btsid"><?php echo $obj->id;?></td>
                                    <td class="btsname"><?php echo $obj->name;?></td>
                                    <td class="btslocation"><?php echo $obj->location;?></td>
                                    <td class="btsdescription"><?php echo $obj->description;?></td>
                                    <td>
										<span class="icon-pencil edit_bts"></span>
										<span class="remove_bts icon-trash"></span>
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
