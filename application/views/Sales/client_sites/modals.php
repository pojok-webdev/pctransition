<div id="dAddService" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Penambahan Layanan</h3>
    </div>
    <div class="modal-body">
        <div class="row-fluid">
            <div class="span12">
                <div class="block-fluid without-head">
                    <div class="row-form clearfix">
                        <div class="span5">Nama:</div>
                        <div class="span7">
                            <input type="text" id="sname">
                        </div>
                    </div>
                    <div class="row-form clearfix">
                        <div class="span5">Produk:</div>
                        <div class="span7">
                            <?php echo form_dropdown("product",$products,"","id='sproduct' type='select' class='inp_service'");?>
                        </div>
                    </div>
                    <div class="row-form clearfix" id="dsmartvalue">
                        <div class="span5">Value Smart Value:</div>
                        <div class="span7">
                            <?php echo form_dropdown("smartvalue",$smartvalue,$obj->integer_part,"id='smartvalue'");?>
                        </div>
                    </div>
                    <div class="row-form clearfix" id="dbusiness">
                        <div class="span5">Value Business:</div>
                        <div class="span7">
                            <?php echo form_dropdown("business",$business,$obj->integer_part,"id='business'");?>
                        </div>
                    </div>
                    <div class="row-form clearfix" id="denterprise">
                        <div class="span3">Value Entrprise:</div>
                        <div class="span2">Up (Mbps):</div>
                        <div class="span1">
                            <input type="text" id="integer_part_enterprise_up" value="" class="tipb integer_part" title="angka depan koma (Up Speed dalam Mbps)">
                        </div>
                        <div class="span1">
                            <input type="text" id="fraction_part_enterprise_up" value="" class="tipb fraction_part" title="angka belakang koma (Up Speed dalam Mbps)">
                        </div>
                        <div class="span2 align-right">Down (Mbps):</div>
                        <div class="span1">
                            <input type="text" id="integer_part_enterprise_down" value="" class="tipb integer_part_down" title="angka depan koma (Down Speed dalam Mbps)">
                        </div>
                        <div class="span1">
                            <input type="text" id="fraction_part_enterprise_down" value="" class="tipb fraction_part_down" title="angka belakang koma (Down Speed dalam Mbps)">
                        </div>
                        </div>
                        <div class="row-form clearfix" id="diix">
                            <div class="span3">Value IIX:</div>
                            <div class="span2">Up (Mbps):</div>
                            <div class="span1">
                                <input type="text" id="integer_part_iix_up" value="" class="tipb integer_part" title="angka depan koma (Up Speed dalam Mbps)">
                            </div>
                            <div class="span1">
                                <input type="text" id="fraction_part_iix_up" value="" class="tipb fraction_part" title="angka belakang koma (Up Speed dalam Mbps)">
                            </div>
                            <div class="span2 align-right">Down (Mbps):</div>
                            <div class="span1">
                                <input type="text" id="integer_part_iix_down" value="" class="tipb integer_part_down" title="angka depan koma (Down Speed dalam Mbps)">
                            </div>
                            <div class="span1">
                                <input type="text" id="fraction_part_iix_down" value="" class="tipb fraction_part_down" title="angka belakang koma (Down Speed dalam Mbps)">
                            </div>
                        </div>
                        <div class="row-form clearfix" id="dlocalloop">
                            <div class="span3">Value Local Loop:</div>
                            <div class="span2">
                                <input type="text" id="integer_part" value="0" class="tipb integer_part" title="angka depan koma (Speed dalam Mbps, simetris)">
                            </div>
                            <div class="span2">
                                <input type="text" id="fraction_part" value="0" class="tipb fraction_part" title="angka belakang koma (Speed dalam Mbps, simetris)">
                            </div>
                        </div>
                    <div class="footer">
                        <button class="btn closemodal6" type="button" id='saveaddservice'>Simpan</button>
                        <button class="btn closemodal6" type="button" id='updateservice'>Update</button>
                        <button class="btn closemodal6" type="button">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
