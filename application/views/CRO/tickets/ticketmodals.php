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
					<div class="row-form clearfix">
						<div class="span3">Pelapor:</div>
						<div class="span3" id='reporter'></div>
						<div class="span2"></div>
						<div class="span2">Telp:</div>
						<div class="span2" id='reporterphone'>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Tanggal:</div>
						<div class="span5">
							<input type='text' class='datepicker' name='followUpDate' id='followUpDate' />
						</div>
						<div class="span2">
							<?php echo form_dropdown('followUpHour', $hours, 1, 'id="followUpHour" class="dttime"'); ?>
						</div>
						<div class="span2">
							<?php echo form_dropdown('followUpMinute', $minutes, 1, 'id="followUpMinute" class="dttime"'); ?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Action:</div>
						<div class="span9">
							<textarea id="fuDescription" name="fuDescription" class='okreq myeditor'></textarea>
						</div>
					</div>
					<?php
					switch($objs->downtimestart){
						case '0000-00-00 00:00:00':
						$ds = "";
						break;
						default:
						$ds = $objs->downtimestart;
						break;
					}
					switch($objs->downtimeend){
						case '0000-00-00 00:00:00':
						$de = "";
						break;
						default:
						$de = $objs->downtimeend;
						break;
					}
					?>
					<div class="row-form clearfix">
						<div class="span3">Start Downtime</div>
						<div class="span4">
							<input type="text" id="futs" name="downtimestart" class="datetimepickers dttime inp_futicket datepicker texttohuman" value="<?php echo $objs->downtimestart?>">
						</div>
						<div class="span2">
							<?php echo form_dropdown('hour', $hours, '', 'id="futsh" class="dttime" parent="ts"'); ?>
						</div>
						<div class="span2">
							<?php echo form_dropdown('minute', $minutes, '', 'id="futsm" class="dttime" grandparent="ts"'); ?>
						</div>
						<div class="span1"><a id="clearawaldowntime" class="icon-repeat cleardatetime" title="clear downtime"></a></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">End Downtime</div>
						<div class="span4">
							<input type="text" id="fute" name="downtimeend" class="datetimepickers dttime inp_futicket datepicker texttohuman" value="<?php echo $de?>">
						</div>
						<div class="span2">
							<?php echo form_dropdown('hour', $hours, '', 'id="futeh" class="dttime" parent="te"'); ?>
						</div>
						<div class="span2">
							<?php echo form_dropdown('minute', $minutes, '', 'id="futem" class="dttime" grandparent="te"'); ?>
						</div>
						<div class="span1"><a id="clearakhirdowntime" class="icon-repeat cleardatetime" title="clear downtime"></a></div>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Penyebab</div>
						<div class="span9">
							<?php echo form_dropdown('cause', $ticketcauses, 0, 'id="cause" class="inp_ticket" type="select"'); ?>
						</div>
					</div>
					<div class="row-form clearfix" id='dothercouse'>
						<div class="span3">Penyebab Lainnya</div>
						<div class="span9">
							<input type='text' id='othercause' name='cause'>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3" id='showtrsolution'>
							Kesimpulan
						</div>
						<div class="span9">
							<textarea id='solusi' class='okreq myeditor'></textarea>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">PIC/Jabatan/Telp:</div>
						<div class="span3">
							<input type='text' name='followUpPIC' id='followUpPIC' class='shorttext okreq' />
						</div>
						<div class="span3">
							<input type='text' name='picPosition' id='picPosition' class='shorttext okreq' />
						</div>
						<div class="span3">
							<input type='text' name='picPhone' id='picPhone' class='shorttext okreq' />
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Hasil Konfirmasi:</div>
						<div class="span9">
							<textarea id='confirmationresult' class='okreq_ myeditor'></textarea>
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
<div id="dFollowUpHistory" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myHistoryModalLabel">Histori Follow Up</h3>
	</div>
	<div class="modal-body">
		<div class='row-fluid'>
			<div class="span12">
				<div class="row-fluid">
				<span class="label label-warning" id='complaint'></span>
				</div>
				<div class="block-fluid row-fluid without-head">
					<table cellpadding="0" cellspacing="0" width="100%" class="table images display" id="tblHistory">
						<thead>
							<tr>
								<th width="60">Tanggal</th>
								<th>PIC</th>
								<th>Jabatan</th>
								<th>Telp</th>
								<th>Status</th>
								<th>Petugas</th>
								<th>Keterangan</th>
							</tr>
						</thead>
					</table>

				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCloseTicketx">Tutup</button>
	</div>
</div>
<div id="dSearch" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<span class="isw-zoom" ></span>
		<h3 id="searchModalLabel" >&nbsp; Pencarian</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid withoutt-head">
					<div class="row-form clearfix">
						<div class="span1"><input type="checkbox"  id="cbnama" checked="checked"/></div>
						<div class="span4">Nama</div>
						<div class="span7"><input type="text"  id="searchname"></div>
					</div>
					<div class="row-form clearfix">
						<div class="span1"><input type="checkbox" id="cbrentangwaktu" /></div>
						<div class="span4">Rentang waktu</div>
						<div class="span3"><input type="text" class="datetimepickers"  id="searchtime1"></div>
						<div class="span2">
							<?php echo form_dropdown('filterhour1', $hours, '', 'id="filterhour1" class="dttime"'); ?>
						</div>
						<div class="span2">
							<?php echo form_dropdown('filterminute1', $minutes, '', 'id="filterminute1" class="dttime"'); ?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span5">s/d</div>
						<div class="span3"><input type="text" class="datetimepickers"  id="searchtime2"></div>
						<div class="span2">
							<?php echo form_dropdown('filterhour2', $hours, '', 'id="filterhour2" class="dttime"'); ?>
						</div>
						<div class="span2">
							<?php echo form_dropdown('filterminute2', $minutes, '', 'id="filterminute2" class="dttime"'); ?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span1"><input type="checkbox"  id="cbdurasi"/></div>
						<div class="span4">Durasi</div>
						<div class="span7">
							<select  id="searchduration">
								<option>&lt; 30 menit</option>
								<option>30 menit - &lt; 1 jam</option>
								<option>1 jam - &lt; 2 jam</option>
								<option>2 jam - &lt; 4 jam</option>
								<option>4 jam - &lt; 24 jam</option>
								<option>&gt; 24 jam</option>
							</select>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span1"><input type="checkbox"  id="cbcause"/></div>
						<div class="span4">Penyebab</div>
						<div class="span7">
							<?php echo form_dropdown('searchcause', $ticketcauses, 0, 'id="searchcause" class="cause"'); ?>
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
<div id="dInfo" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="infoModalLabel">Info</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Nama</div>
						<div class="span9">
							<span id="info_name"></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">PIC</div>
						<div class="span9">
							<span id="info_pic_name"></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Phone</div>
						<div class="span9">
							<span id="info_pic_phone"></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Email</div>
						<div class="span9">
							<span id="info_pic_email"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<button class="btn closemodal" type="button">Tutup</button>
			</div>
		</div>
	</div>
</div>
<div id="dDescription" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="descriptionModalLabel">Info</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Keluhan</div>
						<div class="span9">
							<span id="complaintcontent"></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Penyebab</div>
						<div class="span9">
							<span id="causecontent"></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Aktifitas</div>
						<div class="span9">
							<span id="descriptioncontent"></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Hasil Konfirmasi</div>
						<div class="span9">
							<span id="confirmationresultcontent"></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Kesimpulan</div>
						<div class="span9">
							<span id="solutioncontent"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<button class="btn closemodal" type="button">Tutup</button>
			</div>
		</div>
	</div>
</div>
<div id="dWarn" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Info</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span12">
							<span id="modalMessage"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<button class="btn closemodal" type="button">Tutup</button>
			</div>
		</div>
	</div>
</div>
<div id="dTroubleshootInfo" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="trInfoModalLabel">Info</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span12">
							<span id="trInfoMessage"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<button class="btn closemodal" type="button">Tutup</button>
			</div>
		</div>
	</div>
</div>
<div id="dAddTroubleshoot" class="modal hide fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
				<h4 id="addTroubleshootTitle">Penambahan Tiket</h4>
			</div>
			<div class="modal-body">
				<div class="row-fluid">
					<div class="span4">
						<div class="block-fluid without-head">
							<div class="row-form clearfix">
								<div class="span4">Jenis</div>
								<div class="span8">
									Backbone/BTS/Pelanggan
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span4">Nama</div>
								<div class="span8">
									Momon
								</div>
							</div>
							<div class="row-form clearfix" id="client_site_div">
								<div class="span4">Alamat</div>
								<div class="span8">
									Jl Pelan-pelan
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span4">Telp</div>
								<div class="span8">
									031-234483989
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span6">Butuh Surat Ijin</div>
								<div class="span12">
									Ya/Tidak
								</div>
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="block-fluid without-head">
							<div class="row-form clearfix">
								<div class="span12">Start Request</div>
								<div class="span4">
									<input type="text" id="trs" name="ticketstart" class="inp_troubleshoot datetimepickers dttime  datepicker texttohuman" />
								</div>
								<div class="span3">
									<?php echo form_dropdown('hour', $hours, '', 'id="trsh" class="dttime" parent="trs"'); ?>
								</div>
								<div class="span3">
									<?php echo form_dropdown('minute', $minutes, '', 'id="trsm" class="dttime" grandparent="trs"'); ?>
								</div>
								<div class="span1"><a id="clearawalrequest" class="icon-repeat cleardatetime" title="clear request time"></a></div>
							</div>
							<div class="row-form clearfix">
								<div class="span12">End Request</div>
								<div class="span4">
									<input type="text" id="tre" name="ticketend" class="inp_troubleshoot datetimepickers dttime datepicker texttohuman" />
								</div>
								<div class="span3">
									<?php echo form_dropdown('hour', $hours, '', 'id="treh" class="dttime" parent="tre"'); ?>
								</div>
								<div class="span3">
									<?php echo form_dropdown('minute', $minutes, '', 'id="trem" class="dttime" grandparent="tre"'); ?>
								</div>
								<div class="span1"><a id="clearakhirrequest" class="icon-repeat cleardatetime" title="clear request time"></a></div>
							</div>
							<div class="row-form clearfix">
								<div class="span12">Start Downtime</div>
								<div class="span4"><input type="text" id="tts" name="downtimestart" class="datetimepickers dttime inp_troubleshoot datepicker texttohuman"></div>
								<div class="span3">
									<?php echo form_dropdown('hour', $hours, '', 'id="ttsh" class="dttime" parent="tts"'); ?>
								</div>
								<div class="span3">
									<?php echo form_dropdown('minute', $minutes, '', 'id="ttsm" class="dttime" grandparent="tts"'); ?>
								</div>
								<div class="span1"><a id="clearawaldowntime" class="icon-repeat cleardatetime" title="clear downtime"></a></div>
							</div>
							<div class="row-form clearfix">
								<div class="span12">End Downtime</div>
								<div class="span4"><input type="text" id="tte" name="downtimeend" class="datetimepickers dttime inp_troubleshoot datepicker texttohuman"></div>
								<div class="span3">
									<?php echo form_dropdown('hour', $hours, '', 'id="tteh" class="dttime" parent="tte"'); ?>
								</div>
								<div class="span3">
									<?php echo form_dropdown('minute', $minutes, '', 'id="ttem" class="dttime" grandparent="tte"'); ?>
								</div>
								<div class="span1"><a id="clearakhirdowntime" class="icon-repeat cleardatetime" title="clear downtime"></a></div>
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="block-fluid without-head">
							<div class="row-form clearfix">
								<div class="span4">Keterangan</div>
								<div class="span8"><textarea type="textarea" name="content" id="content" class="inp_ticket"></textarea></div>
							</div>
							<div class="row-form clearfix">
								<div class="span4">Solusi</div>
								<div class="span8">
									<?php echo form_textarea('solusi', '', 'id="troubleshootsolusi" class="solusi"'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn" id="btnsaveticket">Simpan</button>
			</div>
		</div>
	</div>
</div>
