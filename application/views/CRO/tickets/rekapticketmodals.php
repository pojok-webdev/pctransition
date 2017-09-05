<div id="dSearch" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<span class="isw-zoom" ></span>
		<h3 id="myModalLabel" >&nbsp; Pencarian</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid withoutt-head">
					<div class="row-form clearfix">
						<div class="span3">Jenis</div>
						<div class="span5">
							<select id="requesttype" >
								<option value="backbone">Backbone</option>
								<option value="datacenter">DataCenter</option>
								<option value="bts">BTS</option>
								<option value="pelanggan">Pelanggan</option>
							</select>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Nama</div>
						<div class="span5">
							<select id="client_id" name="client_id">
								<option></option>
							</select>
						</div>
					</div>
					<div class="row-form clearfix" id="client_site_div">
						<div class="span4">Lokasi</div>
						<div class="span8">
							<select id="client_site_id" name="client_site_id" class="inp_ticket" type="selectid" >
								<option></option>
							</select>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Rentang waktu</div>
						<div class="span9">
							<input type="text" class="datepicker" id="searchtime1">
							<input type="text" class="datepicker" id="searchtime2">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn closemodal">Tutup</button>
		<button type="button" class="btn btn-primary closemodal" id="showRekap">Tampilkan</button>
	</div>
</div>
