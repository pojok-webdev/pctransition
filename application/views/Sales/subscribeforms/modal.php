<div id="dAddOtherFee" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myAddOtherFeeModalLabel">Penambahan Biaya Lain</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Nama</div>
						<div class="span9">
							<span><input id="othername" class='other' /></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">DPP</div>
						<div class="span9">
							<span><input id="otherfee" class='autonum other' align='right' /></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">PPN</div>
						<div class="span9">
							<span><input id="otherppn" class='autonum other' /></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Total</div>
						<div class="span9">
							<span id="othertotal" class='autonum other'></span>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<button type="button" data-dismiss="modal closemodal" class="btn">Tutup</button>
				<button type="button" class="btn btn-primary closemodal" id="othersave">Simpan</button>
			</div>
		</div>
	</div>
</div>
