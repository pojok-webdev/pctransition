    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p id="modalMessage">Data telah tersimpan.</p>
        </div>
    </div>
    <div id="dConfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
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
            <h3 id="myModalLabel">Konfirmasi</h3>
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
								<input type="text" name="position" id="pic_position" value="" placeholder="Posisi/Jabatan" class="inp_pic" />
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
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>
        </div>
    </div>
    <div id="addServiceDialog" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Layanan</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='name' id='service_name' placeholder="Nama Layanan" class="inp_service" />
							</div>
						</div>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" type="button" id='btnsaveservice'>Simpan</button>
					<button class="btn closemodal" type="button" id='btnupdateservice'>Simpan</button>
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>
        </div>
    </div>
    <div id="setBranchDialog" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Set TS Cabang</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Cabang</div>
							<div class="span9">
								<select type='select' name='name' id='branch_id' class="inp_service" >
									<option value="1">Surabaya</option>
									<option value="2">Jakarta</option>
									<option value="3">Malang</option>
									<option value="4">Bali</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" type="button" id='btnupdatebranch'>Simpan</button>
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>
        </div>
    </div>
