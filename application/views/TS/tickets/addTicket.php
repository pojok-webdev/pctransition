<div id="dAddTicket" class="modal hide fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
				<h4 id="modaltitle">Penambahan Tiket</h4>
			</div>
			<div class="modal-body">
				<div class="row-fluid">
					<div class="span6">
						<div class="block-fluid without-head">
							<div class="row-form clearfix" style="display:none">
								<div class="span4">Jenis</div>
								<div class="span8">
									<select name="requesttype" id="request_type" type="select" class="inp_ticket2">
										<option value="pelanggan">pelanggan</option>
										<!--<option value="backbone">backbone</option>
										<option value="datacenter">datacenter</option>
										<option value="bts">bts</option>-->
									</select>
								</div>
							</div>
							<div class="row-form clearfix optionholder" id='dpelanggan'>
								<div class="span4">Nama:</div>
								<div style="position: relative; height: 80px;" class="span8">
									<input type="text" name="country" id="autocomplete-pelanggan" />
									<input type='hidden' id='client_id' />
									<!--<label type="text" name="country" id="autocomplete-pelanggan-x"></label>-->
								</div>
								<div id="selction-client"></div>
							</div>
							<div class="row-form clearfix optionholder" id='dsites'>
								<div class="span4">Site:</div>
								<div style="position: relative; height: 80px;" class="span8">
									<select id='csites'></select>
								</div>
								<div id="selction-client"></div>
								<label type="text" name="country" id="autocomplete-pelanggan-x"></label>
							</div>
							<div class="row-form clearfix optionholder" id='dbts'>
								<p>BTS:</p>
								<div style="position: relative; height: 80px;">
									<input type="text" name="bts" id="autocomplete-bts" style="position: absolute; z-index: 2; background: transparent;"/>
									<input type="text" name="bts" id="autocomplete-bts-x" disabled="disabled" style="color: #CCC; position: absolute; background: transparent; z-index: 1;"/>
								</div>
								<div id="selction-bts"></div>
							</div>
							<div class="row-form clearfix optionholder" id='ddatacenter'>
								<p>Data Center:</p>
								<div style="position: relative; height: 80px;">
									<input type="text" name="datacenter" id="autocomplete-datacenter" style="position: absolute; z-index: 2; background: transparent;"/>
									<input type="text" name="datacenter" id="autocomplete-datacenter-x" disabled="disabled" style="color: #CCC; position: absolute; background: transparent; z-index: 1;"/>
								</div>
								<div id="selction-datacenter"></div>
							</div>
							<div class="row-form clearfix optionholder" id='dbackbone'>
								<p>Backbone:</p>
								<div style="position: relative; height: 80px;">
									<input type="text" name="backbone" id="autocomplete-backbone" style="position: absolute; z-index: 2; background: transparent;"/>
									<input type="text" name="backbone" id="autocomplete-backbone-x" disabled="disabled" style="color: #CCC; position: absolute; background: transparent; z-index: 1;"/>
								</div>
								<div id="selction-backbone"></div>
							</div>

						</div>
					</div>
					<div class="span6">
						<div class="block-fluid without-head">
							<div class="row-form clearfix" id="client_site_textbox_div">
								<div class="span4">Keluhan</div>
								<div class="span8">
									<select id="complain" name="complaint" class="inp_ticket2" type="select">
										<option>Pilihlah</option>
										<option>Internet Tidak Bisa</option>
										<option>Internet Lambat</option>
										<option>Internet Putus Sambung</option>
										<option>Indikator POE Down</option>
										<option>Device Pelanggan</option>
										<option>Tidak Bisa Akses Web Tertentu</option>
										<option>Request Tertentu</option>
										<option>ADSL</option>
										<option>Hosting</option>
										<option>VOIP</option>
										<option>Lain-lain</option>
									</select>
									<!--<input type="text" id="complaint" name="complaint" class="inp_ticket2" >-->
								</div>
							</div>
<!--							<div class="row-form clearfix" id="client_site_textbox_div">
								<div class="span4">Lokasi</div>
								<div class="span8">
									<input type="text" id="location" name="location" class="inp_ticket2" >
								</div>
							</div>-->
							<div class="row-form clearfix">
								<div class="span4">Pelapor</div>
								<div class="span8"><input type="text" id="reporter" name="reporter" class="inp_ticket2" /></div>
							</div>
							<div class="row-form clearfix">
								<div class="span4">Telp</div>
								<div class="span8"><input type="text" id="reporterphone" name="reporterphone" class="inp_ticket2" /></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button"  class="btn" id="btn_saveticket">Simpan</button>
			</div>
		</div>
	</div>
</div>
    <script>
			'use strict';
			var bts = [{"value":"trinity","data":1},{"value":"Neo","data":2},{"value":"Architect","data":3}],
			datacenters = [{"value":"IDC Cyber LT 1","data":1},{"value":"IDC 3D","data":2},{"value":"APJII Cyber","data":3}],
			backbones = [{"value":"XL","data":1},{"value":"Indosat","data":2},{"value":"Icon++","data":3}],
			pelanggan = [{"value":"Djamoe Iboe","data":1},{"value":"Djamoe Ayah","data":2},{"value":"Resto Nine","data":3}];
			$.ajax({
				url:thisdomain+'tickets/listtest',
				dataType:'json',
				success:function(clnts){
					pelanggan = clnts.out;
					console.log('out',clnts.out);

					$('#autocomplete-pelanggan').autocomplete({
						lookup: clnts.out,
						onSelect: function(suggestion) {
							$('#client_id').val(suggestion.data);
							$.ajax({
								url:thisdomain+'clients/get_sites',
								type:'post',
								data:{id:suggestion.data},
								dataType:'json',
								success:function(sites){
									$('#csites').empty();
									$.each(sites,function(x,y){
										$('#csites').append('<option value='+x+'>'+y.alamat+'</option>');
										$.ajax({
											url:thisdomain+'clients/get_services',
											type:'post',
											data:{id:x},
											dataType:'json',
											success:function(services){
												var myservices = '';
												$.each(services,function(x,y){
													myservices += y.name+' Tgl Aktivasi '+sql2idformatnotime(y.activation_date)+"<br />" ;
													console.log('myservices',myservices);
													//$('#autocomplete-pelanggan-x').html(y.name+' Tgl Aktivasi '+sql2idformat(y.activation_date));
												$('#autocomplete-pelanggan-x').html(myservices);
												});
												
											},
											error:function(err){
												alert(err);
											}
										});
									});
								},
								error:function(err){
									console.log('err',err);
								}
							});
						},
						onHint: function (hint) {
							console.log('hint',hint);
							$('#autocomplete-pelanggan-x').val(hint);
						},
						onInvalidateSelection: function() {
							//$('#selction-client').html('You selected: none');
						}
					});
				}
			});
			$.ajax({
				url:thisdomain+'tickets/list_backbones',
				dataType:'json',
				success:function(clnts){
					pelanggan = clnts.out;
					console.log('out',clnts.out);

					$('#autocomplete-backbone').autocomplete({
						lookup: clnts.out,
						onSelect: function(suggestion) {
							$('#client_id').val(suggestion.data);
							console.log('suggestion',suggestion);
							//$('#selction-backbone').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
						},
						onHint: function (hint) {
							console.log('hint',hint);
							//$('#autocomplete-backbone-x').val(hint);
						},
						onInvalidateSelection: function() {
							//$('#selction-backbone').html('You selected: none');
						}
					});
				}
			});
			$.ajax({
				url:thisdomain+'tickets/list_datacenters',
				dataType:'json',
				success:function(clnts){
					pelanggan = clnts.out;
					console.log('out',clnts.out);

					$('#autocomplete-datacenter').autocomplete({
						lookup: clnts.out,
						onSelect: function(suggestion) {
							$('#client_id').val(suggestion.data);
							console.log('suggestion',suggestion);
							//$('#selction-datacenter').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
						},
						onHint: function (hint) {
							console.log('hint',hint);
							//$('#autocomplete-datacenter-x').val(hint);
						},
						onInvalidateSelection: function() {
							//$('#selction-datacenter').html('You selected: none');
						}
					});
				}
			});
			$.ajax({
				url:thisdomain+'tickets/list_bts',
				dataType:'json',
				success:function(clnts){
					pelanggan = clnts.out;
					console.log('out',clnts.out);

					$('#autocomplete-bts').autocomplete({
						lookup: clnts.out,
						onSelect: function(suggestion) {
							$('#client_id').val(suggestion.data);
							console.log('suggestion',suggestion);
							//$('#selction-bts').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
						},
						onHint: function (hint) {
							console.log('hint',hint);
							//$('#autocomplete-bts-x').val(hint);
						},
						onInvalidateSelection: function() {
							//$('#selction-bts').html('You selected: none');
						}
					});
				}
			});
			function setopt(){
				$('.optionholder').hide();
				switch($('#request_type').find('option:selected').text()){
					case 'backbone':
					$('#dbackbone').show();
					break;
					case 'datacenter':
					$('#ddatacenter').show();
					break;
					case 'bts':
					$('#dbts').show();
					break;
					case 'pelanggan':
					$('#dpelanggan').show();
					$('#dsites').show();
					break;
				}
			}
			setopt();
			$('#request_type').change(function(){
				setopt();
			});
			$('#btn_saveticket').click(function(){
				if($("#complain option:selected").text()==="Pilihlah"){
					alert("Keluhan harus diisi");
				}else{
				$(".inp_ticket2").makekeyvalparam();
				var optreq = $('#request_type').find('option:selected').text(),clientname='';
				switch($('#request_type').find('option:selected').text()){
					case 'backbone':
					clientname = $('#autocomplete-backbone').val();
					break;
					case 'datacenter':
					//$('#ddatacenter').show();
					break;
					case 'bts':
					//$('#dbts').show();
					break;
					case 'pelanggan':
					//$('#dpelanggan').show();
					//$('#dsites').show();
					break;
				}
				$.ajax({
					url: thisdomain + 'tickets/save',
					data: JSON.parse('{' + $(".inp_ticket2").attr("keyval") + ',"client_id":"'+$('#client_id').val()+'","client_site_id":"'+$('#csites').val()+'","clientname":"' + $("#autocomplete-"+optreq).val() + '","downtimestart":"0000-00-00 00:00:00","downtimeend":"0000-00-00 00:00:00"}'),
					type: 'post',
					async: false
				}).fail(function () {
					console.log('Tidak dapat menyimpan data, silakan hubungi Developer');
				}).done(function (data) {
					$.ajax({
						url: thisdomain + 'tickets/get_obj_by_id/' + data,
						type: 'get',
						async: false,
						dataType: 'json',
					}).done(function (newticket) {
						var subject = '[[PadiApp]] Notifikasi Ticket Baru',
						mailpurpose = 'Ticket Baru dibuat',
						clientname = $("#autocomplete-pelanggan").val(),
						url = thisdomain+'tickets',
						bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
						bodytext += '<html xmlns="http://www.w3.org/1999/xhtml">';
						bodytext += '<head>';
						bodytext += '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
						bodytext += '</head>';
						bodytext += '<body yahoo bgcolor="red">';
						bodytext += '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
						bodytext += '<tr>';
						bodytext += '<td>';
						bodytext += '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
						bodytext += '<thead bgcolor="#FFFF00">';
						bodytext += '<tr>';
						bodytext += '<td>';
						bodytext += '<img src="'+thisdomain+'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
						bodytext += '</td>';
						bodytext += '</tr>';
						bodytext += '</thead>';

						bodytext += '<tbody bgcolor="#FFFF66" link="white">';

						bodytext += '<tr bgcolor="#FFFF00" color="white">';
						bodytext += '<td>';
						bodytext += '<font color="black">';
						bodytext += 'Sebuah ticket baru dibuat atas nama <span style="font-family: arial,times, serif; font-size:14pt; font-style:bold"><u>'+ clientname + '</u></span>';
						bodytext += '</font>';
						bodytext += '</td>';
						bodytext += '</tr>';

						bodytext += '<tr bgcolor="#FFFF00" color="white">';
						bodytext += '<td>';
						bodytext += '<font color="black">';
						bodytext += '<u></u>';
						bodytext += '</font>';
						bodytext += '</td>';
						bodytext += '</tr>';

						bodytext += '<tr bgcolor="#FFFF00" color="white">';
						bodytext += '<td >';
						bodytext += '<font color="black">';
						bodytext += 'Aplikasi dapat diakses melalui tautan <u><a href='+ url + '/filter/'+data+'>ini</a></u>';
						bodytext += '</font>';
						bodytext += '</td>';
						bodytext += '</tr>';

						bodytext += '<tr bgcolor="#FFFF00" color="white">';
						bodytext += '<td >';
						bodytext += '<font color="black">';
						bodytext += 'TS : '+ $('#createuser').val() + '';
						bodytext += '</font>';
						bodytext += '</td>';
						bodytext += '</tr>';



						bodytext += '</tbody>';
						bodytext += '<tfoot>';

						bodytext += '<tr bgcolor="#CCFFFF">';
						bodytext += '<td align="center">';
						bodytext += '<p style="font-family: arial,times, serif; font-size:11pt; font-style:italic">By PadiApp 2015</p>';
						bodytext += '</td>';
						bodytext += '</tr>';

						bodytext += '</tfoot>';
						bodytext += '</table>';
						bodytext += '</td>';
						bodytext += '</tr>';
						bodytext += '</table>';
						bodytext += '</html>';
						sendmail('puji@padi.net.id',"Pemberitahuan ticket baru",bodytext,'puji@padi.net.id');

			//			sendmail(recipient,subject,bodycontent,copycarbon);
						updateRecordRow();
						$('#dAddTicket').modal('hide');
					});
					console.log('query',data);
				});
				}
			});
    </script>
