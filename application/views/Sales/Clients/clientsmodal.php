<div id="dSetTSCabang" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<span class="isw-zoom" ></span>
		<h3 id="setTSCabangModalLabel" >&nbsp; Set TS Cabang</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid withoutt-head">
					<div class="row-form clearfix">
						<div class="span3">Nama</div>
						<div class="span9">
							<?php for($i=1;$i<=count($branches);$i++){?>
								<input type="checkbox" value="<?php echo $i;?>" class="tsbranch"><?php echo $branches[$i];?>
							<?php }?>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn">Tutup</button>
		<button type="button" class="btn btn-primary" id="search">Cari</button>
	</div>
</div>
<div id="dSetAM" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<span class="isw-user" ></span>
		<h3 id="setAMModalLabel" >&nbsp; Pemindahan AM</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid withoutt-head">
					<div class="row-form clearfix">
						<div class="span3">AM Sekarang</div>
						<div class="span9">
							<span id='ambefore'></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Nama AM Pengganti</div>
						<div class="span9">
							<?php echo form_dropdown("replacersales",$sales,1,"id='replacersales'");?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Tanggal Penggantian</div>
						<div class="span9">
							<?php echo form_input("displacementdate",date('d/m/Y'),"id='displacementdate' class='datepicker'");?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Alasan/Keterangan</div>
						<div class="span9">
							<?php echo form_textarea("description","","id='description' class='myeditor'");?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btnclose">Tutup</button>
		<button type="button" class="btn btn-primary" id="amsave">Simpan</button>
	</div>
</div>
<div id="dAMHistory" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<span class="isw-user" ></span>
		<h3 id="setAMHistoryModalLabel" >&nbsp; Histori AM</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid withoutt-head">
					<table id="tAMHistory" class="table">
						<thead>
							<th>Tanggal</th><th>Nama</th><th>Keterangan</th>
						</thead>
						<tbody>
							<tr><td>2 Jul 2016</td><td>Bando</td><td>abc</td></tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btnclose">Tutup</button>
		<button type="button" class="btn btn-primary" id="amsave">Simpan</button>
	</div>
</div>
