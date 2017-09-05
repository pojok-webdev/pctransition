<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/backbones.js'></script>
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
							<div class="span9"><?php echo form_dropdown('branches',$branches,0,'id="branches"');?></div>
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
							<button class="btn closemodal" type="button" id='save_backbone'>Simpan</button>
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
            <h3 id="myModalLabel"><span class="icon-plus icon-white"></span> Edit Backbone</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Cabang</div>
							<div class="span9"><?php echo form_dropdown('branches',$branches,0,'id="branches_update"');?></div>
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
							<button class="btn closemodal" type="button" id='update_backbone'>Simpan</button>
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
                        <h1>Jadwal</h1>
                        <ul class="buttons">
                            <li><a href="#" class="isw-plus" id="addBackbone"></a></li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">

<?php
	$this->load->view("schedules/schedules");
?>

                    </div>
                </div>

            </div>
            <!-- to use -->
            <div class="dr"><span></span></div>

        </div>

    </div>

</body>
</html>
