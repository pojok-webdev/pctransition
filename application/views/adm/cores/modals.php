    <div id="dAddCore" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3><span id="penambahanaplabel">Penambahan AP</span></h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9"><?php echo form_input('ap_name','','id="ap_name"');?></div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">BTS</div>
							<div class="span9"><?php echo form_dropdown('bts_name',$btses,0,'id="bts_name"');?></div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">IP Address</div>
							<div class="span9">
								<input type='text' name='ipaddress' id='ipaddress'>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Keterangan</div>
							<div class="span9"><input type="text" name="description" id="description" value=""/></div>
						</div>
						<div class="footer">
							<button class="btn closemodal" type="button" id='saveAp'>Simpan</button>
							<button class="btn closemodal update_ap" type="button" myid='update_ap'>Update</button>
							<button class="btn closemodal" type="button">Tutup</button>
						</div>
					</div>
				</div>
			</div>

        </div>
    </div>
