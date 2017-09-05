<div id="dAddUpgrade" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Perubahan Layanan</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<!--<div class="row-form clearfix">
						<div class="span5">Nama:</div>
						<div class="span7">
							<input type="text" name="name" id="pic_name" class="inp_pic">
						</div>
					</div>-->
					<div class="row-form clearfix optionholder" id='dpelanggan'>
						<div class="span4">Nama:</div>
						<div style="position: relative; height: 80px;" class="span8">
							<input type="text" name="country" id="autocomplete-pelanggan" />
							<input type='hidden' id='client_id' />
							<!--<label type="text" name="country" id="autocomplete-pelanggan-x"></label>-->
						</div>
						<div id="selction-client"></div>
					</div>					
					<div class="row-form clearfix">
						<div class="span5">Produk:</div>
						<div class="span7">
							<?php echo form_dropdown("position",array(),"","id='pic_position' type='select' class='inp_pic'");?>
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
