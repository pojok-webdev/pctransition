<div id="dialogotp" class="modal hide fade" role="dialog">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Entri OTP</h3>
	</div>
	<div class="modal-body">
        <div class="row-fluid">
            <div class="span12">
                <div class="block-fluid without-head">
                    <div class="row-form clearfix">
                        <div class="span5">OTP:</div>
                        <div class="span7">
                            <input type="text" id="otp">
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btnclose" id="sendotp">Kirim</button>
		<button class="btn btnclose">Tutup</button>
	</div>
	<p></p>
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
				</div>
			</div>
			<div class="footer">
				<button class="btn closemodal" type="button" id='btnsavepic'>Simpan</button>
				<button class="btn closemodal" type="button">Tutup</button>
			</div>
		</div>
	</div>
</div>
