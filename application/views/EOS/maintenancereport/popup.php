<div id="dFollowUp" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class='modal-dialog modal-lg'><div class='modal-content'>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="followUpModalLabel">Follow Up</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Keluhan:</div>
						<div class="span9" id='ticketcontent'>
						</div>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Penyebab</div>
						<div class="span9">
							<textarea></textarea>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span4">Konfirmasi Pelanggan:</div>
						<div class="span8">
							<div class="btn-group" data-toggle="buttons-radio">
								<button type="button" class="btn btn-success" value="1" id="btnOK">OK</button>
								<button type="button" class="btn btn-info" value="0" id="btnNotOK">Belum OK</button>
								<button type="button" class="btn btn-warning" id="btnCouldNotBeContacted">Belum bisa dihubungi</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn" id="btnReset">Reset</button>
		<button type="button" class="btn btnHistory" value="2" id="btnHistory">History</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCloseTicket">Tutup Tiket</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnProgress">Progress</button>
	</div>
	</div></div>
</div>
<div id="dAddKompetitor" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
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
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnSaveAddCompetitor">Simpan</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCloseTicketx">Tutup</button>
	</div>
</div>

<div id="dAddVAS" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="addVASLabel">Penambahan Value Added Service</h3>
	</div>
	<div class="modal-body">
		<div class='row-fluid'>
			<div class="span12">
				<div class="block-fluid row-fluid without-head">
					<table cellpadding="0" cellspacing="0" width="100%" class="table tVas" id="tVas">
						<thead>
							<tr>
								<th >Nama</th>
								<th width="60">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($vases as $vas){?>
							<tr myid="<?php echo $vas->id;?>">
								<td class="operatorname" title="<?php echo $vas->description;?>"><?php echo $vas->name;?></td>
								<td class="action"><a><span title="Tambahkan" class="icon-list vas_add text-center"></span></a></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCloseVAS">Tutup</button>
	</div>
</div>

<div id="dApplication" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="addApplicationLabel">Penambahan Aplikasi</h3>
	</div>
	<div class="modal-body">
		<div class='row-fluid'>
			<div class="span12">
				<div class="block-fluid row-fluid without-head">
					<table cellpadding="0" cellspacing="0" width="100%" class="table tApplication" id="tApplication">
						<thead>
							<tr>
								<th >Nama</th>
								<th width="60">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($applications as $app){?>
							<tr myid="<?php echo $app->id;?>">
								<td class="operatorname"><?php echo $app->name;?></td>
								<td class="action"><a><span title="Tambahkan" class="icon-list app_add text-center"></span></a></td>
							</tr>
							<?php }?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCloseApp">Tutup</button>
	</div>
</div>

<div id="dAddPicture" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalImageLabel">Penambahan Gambar Maintenance</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">File</div>
						<div class="span9">
							<img id="output" width=100 height=100>
							<input type="file" id="addImage" onchange="uploadImage1(event)"/>
						</div>
						<div class="span1" id="status"></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Nama</div>
						<div class="span9"><input type="text" name="documentname" id="documentname" ></textarea></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Ket.</div>
						<div class="span9"><textarea type="text" name="documentdescription" id="documentdescription" ></textarea></div>
					</div>
					<div class="footer">
						<button class="btn closemodal" type="button" id='btnSaveImage'>Simpan</button>
						<button class="btn closemodal" type="button">Tutup</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>