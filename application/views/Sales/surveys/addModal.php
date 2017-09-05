<div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Konfirmasi</h3>
	</div>
	<div class="modal-body">
		<p id="modalMessage">Data telah tersimpan.</p>
	</div>
	</div>
	<div id="dWarning" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Konfirmasi</h3>
	</div>
	<div class="modal-body">
		<p>Tanggal Survey harus diisi.</p>
	</div>
</div>
<div id="dAddPic" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Penambahan PIC</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span5">Nama:</div>
							<div class="span7">
								<input type="text" name="name" id="pic_name" class="inp_pic">
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span5">Posisi:</div>
							<div class="span7">
								<?php echo form_dropdown("position",$positions,"","id='pic_position' type='select' class='inp_pic'");?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span5">Email:</div>
							<div class="span7">
								<input type="text" id="pic_email"  name="email" class="inp_pic">
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span5">HP:</div>
							<div class="span7">
								<input type="text" id="pic_hp" name="hp" class="inp_pic">
							</div>
						</div>
						<div class="footer">
							<button class="btn closemodal" type="button" id='savePic'>Simpan</button>
							<button class="btn closemodal" type="button" id='savePicSite'>Simpan</button>
							<button class="btn closemodal" type="button" id='updatePic'>Update</button>
							<button class="btn closemodal" type="button" id='updatePicSite'>Update</button>
							<button class="btn closemodal" type="button">Tutup</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div id="dConfirm" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3>Konfirmasi</h3>
	</div>
	<div class="modal-body">
		<p>Apakah benar akan menghapus PIC ?.</p>
		<div class="footer">
			<button class="btn closemodal" type="button" id='hapusPic'>Ya</button>
			<button class="btn closemodal" type="button" id='hapusPicSite'>Ya</button>
			<button class="btn closemodal" type="button">Batalkan</button>
		</div>
	</div>
</div>
