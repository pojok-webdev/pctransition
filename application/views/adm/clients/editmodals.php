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
            <h3 id="addPICModalLabel">Konfirmasi</h3>
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
								<select id='pic_position' class='inp_pic select' type='select'>
									<option value='PEMOHON'>PEMOHON</option>
									<option value='PENANGGUNG JAWAB'>PENANGGUNG JAWAB</option>
									<option value='ADMINISTRASI'>ADMINISTRASI</option>
									<option value='TEKNIS INSTALASI'>TEKNIS INSTALASI</option>
									<option value='PENAGIHAN'>PENAGIHAN</option>
									<option value='SUPPORT'>SUPPORT</option>
								</select>
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
					<button class="btn closemodal" type="button" id='btnupdatepic'>Simpan</button>
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>
        </div>
    </div>
    <div id="addSiteDialog" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="addSiteModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Alamat</div>
							<div class="span9">
								<input type='text' name='address' id='site_address' placeholder="Alamat" class="inp_site" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Kota</div>
							<div class="span9">
								<input type="text" name="city" id="site_city" value="" placeholder="Kota" class="inp_site" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Cabang PadiNEt</div>
							<div class="span9">
								<!--
								<input type="text" name="install_area" id="install_area" value="" placeholder="Surabaya" class="inp_site" />
								-->
									<?php echo form_dropdown("branch_id",$branches,"1","id=branch_id");?>
								
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">PIC Site</div>
							<div class="span9">
								<input type="text" name="pic_name" id="site_pic_name" value="" placeholder="Nama PIC" class="inp_site" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Telp PIC</div>
							<div class="span9">
								<input type="text" name="pic_phone" id="pic_phone" value="" placeholder="Telp PIC" class="inp_site" />
							</div>
						</div>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" type="button" id='btnsavesite'>Simpan</button>
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>
        </div>
    </div>
    <div id="addServiceDialog" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="addSiteModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='name' id='site_service' placeholder="Layanan" class="inp_service" />
							</div>
						</div>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" type="button" id='btnsaveservice'>Simpan</button>
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>
        </div>
    </div>
 
    <div id="changeAMDialog" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="changeAMModalLabel">Change AM</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<?php echo form_dropdown('sale_id',$users,'','id="sale_id"');?>
							</div>
						</div>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" type="button" id='btnsaveAM'>Simpan</button>
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>
        </div>
    </div>
 
 
 
 
 

