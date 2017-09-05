<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/radu.js'></script>
<body>
    <div id="dconfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <h3 id="myModalLabel"> Konfirmasi</h3>
        </div>
        <div class="modal-body">
			<p><b>Peringatan !</b></p>
            <p>Anda hendak menghapus <span id="modal_ptp_name"></span> (id = <span id="modal_ptp_id"></span>) dari daftar PTP</p>
            <p>Apakah anda yakin ?</p>
            <p></p>
            <p>
		<div class="button-group">
			<button type="button" class="btn btn-small btn-warning tip modalclose" id="modal_ptp_remove"><span class="icon-ok"></span> Yakin</button>
			<button type="button" class="btn btn-small btn-warning tip modalclose" id="cancel_install_save"><span class="icon-remove"></span> Tidak</button>
		</div>
	</p>
        </div>
    </div>
    <div id="dAddPTP" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3><span id="penambahanaplabel">Penambahan PTP</span></h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9"><?php echo form_input('ptp_name','','id="ptp_name"');?></div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Cabang</div>
							<div class="span9"><?php echo form_dropdown('branch',$branches,0,'id="branch_id"');?></div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">BTS</div>
							<div class="span9"><?php echo form_dropdown('bts_name',$btses,0,'id="bts_name"');?></div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Keterangan</div>
							<div class="span9"><input type="text" name="description" id="description" value=""/></div>
						</div>
						<div class="footer">
							<button class="btn closemodal" type="button" id='savePtp'>Simpan</button>
							<button class="btn closemodal updatePtp" type="button" id='updatePtp'>Update</button>
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
                <li><a href="#">PTP</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace" username="<?php echo $this->session->userdata['username'];?>">
        <input type="hidden" name="username" id="username" value="<?php echo $this->session->userdata['username'];?>" />
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Daftar PTP</h1>
                        <ul class="buttons">
                            <li><a href="#" class="isw-plus" id="addptp"></a></li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tPtp">
                            <thead>
                                <tr>
                                    <th width="31%">Nama</th>
                                    <th width="25%">BTS</th>
                                    <th width="31%">Keterangan</th>
                                    <th width="7%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
									<tr thisid="<?php echo $obj->id;?>">
										<td class="ptpname"><?php echo $obj->name;?></td>
										<td class="ptptowername"><?php echo $obj->btstower;?></td>
										<td class="ptpdescription"><?php echo $obj->description;?></td>
										<td>
											<span class="icon-pencil editPtp"></span>
											<span class="removePtp icon-trash"></span>
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
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/ptps.js'></script>
</body>
</html>
