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
				<tr myid="<?php echo $officer->id;?>">
					<td class="name"><?php echo $officer->username;?></td>
					<td><span class="icon-ok"></span></td>
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
<div id="dUpload" class="modal hide" role="dialog" title="Upload Dokumen">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3>Upload Dokumen</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Gambar</div>
						<div class="span6">
							<img id="documentimage" width=200 height=200>
							<input type="file" id="adddocumentimage" name="adddocumentimage" onchange="loadDocument(event)"/>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Nama</div>
						<div class="span9">
						<input type='text' name='documentname' id='documentname'>
						</div>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Deskripsi</div>
						<div class="span9"><input type="text" name="documentdescription" id="documentdescription" value=""/></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn closemodal2" type="button" id='savedocument'>Simpan</button>
		<button class="btn closemodal2" type="button" id='updatedocument'>Update</button>
		<button class="btn closemodal2">Tutup</button>
	</div>
	<p></p>
</div>
<div id="dAddKompetitor" class="modal hide" role="dialog">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="addKomptetitorLabel">Penambahan Kompetitor</h3>
	</div>
	<div class="modal-body">
		<div class='row-fluid'>
			<div class="span12">
				<div class="block-fluid row-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Kompetitor</div>
						<div class="span9">
							<?php echo form_dropdown("operator",$operatorarray,1,"id='competitor_id'");?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Layanan</div>
						<div class="span9">
							<input type="text" id="competitor_service">
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Keterangan</div>
						<div class="span9">
							<textarea id="competitor_description"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btnclose" data-dismiss="modal" aria-hidden="true" id="btnSaveAddCompetitor">Simpan</button>
		<button class="btn btnclose" data-dismiss="modal" aria-hidden="true">Tutup</button>
	</div>
</div>
