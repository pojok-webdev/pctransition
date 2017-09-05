<div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Konfirmasi</h3>
	</div>
	<div class="modal-body">
	<p>Data telah tersimpan.</p>
	</div>
</div>
<div id="dialog" class="modal hide" role="dialog" title="Penambahan Petugas">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	</div>
	<div class="modal-body">
		<div>
		<table class="table" id="tOfficer">
			<thead>
				<tr><th>Nama</th><th>Aksi</th></tr>
			</thead>
			<tbody>
				<?php foreach($officers as $officer){?>
				<tr myid="<?php echo $officer->id;?>"><td class="name"><?php echo $officer->username;?></td><td><span class="icon-ok"></span></td></tr>
				<?php }?>
			</tbody>
		</table>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btnclose">Tutup</button>
	</div>
	<p></p>
</div>
<div id="competitordialog" class="modal hide" role="dialog" title="Penambahan Kompetitor">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	</div>
	<div class="modal-body">
		<div>
		<table class="table" id="tKompetitor">
			<thead>
				<tr><th>Nama</th><th>Aksi</th></tr>
			</thead>
			<tbody>
				<?php foreach($competitors as $key=>$val){?>
				<tr myid="<?php echo $key;?>">
					<td class="opr"><?php echo $val;?></td>
					<td>
						<span class="icon-ok btnaddoperator"></span>
					</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btnclose">Tutup</button>
	</div>
	<p></p>
</div>