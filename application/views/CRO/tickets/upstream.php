<div id="dAddUpstream" class="modal hide fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
				<h4 id="addUpstreamTitle">Penambahan Tiket Upstream</h4>
			</div>
			<div class="modal-body">
				<div class="row-fluid">
					<div class="span12">
						<!--<div class="block-fluid without-head">
							<div class="row-form clearfix">
								<div class="span4">Start Request</div>
								<div class="span8">
									<input type="text" id="ticketstart" name="ticketstart" class="datetimepickers dttime  datepicker texttohuman" />
								</div>
							</div>
						</div>-->
						
						<div class="block-fluid without-head">
							<div class="row-form clearfix">
								<div class="span4">Jenis</div>
								<div class="span8">
									<select id="upstreamtype" class="upstreamtype">
										<option value="backbone">Backbone</option>
										<option value="bts">BTS</option>
										<option value="datacenter">Datacenter</option>
										<option value="ptp">PTP</option>
										<option value="core">Core</option>
										<option value="ap">AP</option>
									</select>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span4">Nama</div>
								<div class="span8">
									<input type="text" id="upstream" class="upstream">
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span4">Keluhan</div>
								<div class="span8">
									<input type="text" id="ucomplaint">
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span4">Pelapor</div>
								<div class="span8">
									<input type="text" id="ureporter">
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span4">Telp Pelapor</div>
								<div class="span8">
									<input type="text" id="ureporterphone">
								</div>
							</div>
							<div class="row-form clearfix" id="dudescription">
								<div class="span4">Keterangan</div>
								<div class="span8">
									<textarea type="text" id="udescription" class="myeditor"></textarea>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span4">Pelanggan</div>
								<div class="span8">
									<button id='btnLookUp'>
										Lookup
									</button>
								</div>
							</div>
							<div class="row-form clearfix">
								<table id="selectedClient" class="table">
									<thead></thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn" id="btnupdateupstream_">Update</button>
				<button type="button" data-dismiss="modal" class="btn" id="btnsaveupstream">Simpan</button>
			</div>
		</div>
	</div>
</div>
<div id="dClientLookup" class="modal hide fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
				<h4 id="addClientLookupTitle">Lookup Pelanggan</h4>
			</div>
			<div class="modal-body">
				<div class="row-fluid">
					<div class="span12">
						<table id="clientLookup" class="table" cellpadding="0" cellspacing="0" width="100%" >
							<thead>
								<tr><th>Nama</th><th>Alamat</th><th>Aksi</th></tr>
							</thead>
							<tbody>
								<?php foreach($clients as $client){?>
								<tr trid="<?php echo $client->id;?>" siteid="<?php echo $client->client_site_id;?>"><td class="cName"><?php echo $client->name?></td>
								<td class="cAddress"><?php echo $client->address?></td>
								<td class="cAction">Pilih</td></tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn" id="btnsaveticketupstream">Simpan</button>
			</div>
		</div>
	</div>
</div>
