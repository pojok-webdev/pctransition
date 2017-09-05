<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/padilibs/autocomplete/cosmetics.css"/>
<script type="text/javascript" src="<?php echo base_url();?>js/autocomplete/jquery.autocomplete.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/padilibs/padi.autocomplete.js"></script>  
<body>
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo $imagepath;?>logo.png" alt="PadiNET App" title="PadiNET App"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Perubahan Layanan</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
    <?php $this->load->view('Sales/altergrades/modals');?>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Perubahan Layanan</h1>
                        <ul class="buttons">
                            <li>
                                <a href="#"><span class="isw-plus" id="addaltergrade"></span> </a>
                                <!--<ul class="dd-list">
                                    <li class="agStatus" id="implemented" status="calon"><a><span class="isw-right"></span> Sudah dilaksanakan</a></li>
                                    <li class="agStatus" id="notimplemented" status="aktif"><a><span class="isw-right"></span> Belum dilaksanakan</a></li>
                                    <li class="clientStatus" id="all" status="all"><a><span class="isw-right"></span> Semua</a></li>
                                </ul>-->
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tAltergrades">
                            <thead>
                                <tr>
                                    <th width='19%'>Nama</th>
                                    <th width='19%'>AM</th>
                                    <th width="19%">Alamat</th>
                                    <th width="19%">PIC</th>
                                    <th width="19%">E-mail/Phone</th>
                                    <th width="5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <tr myid='<?php echo $obj->id;?>'>
                                    <td><?php echo $obj->client_site->client->name;?></td>
                                    <td><?php echo $obj->client_site->client->user->username;?></td>
                                    <td><?php echo $obj->client_site->address;?></td>
                                    <td><?php echo $obj->client_site->pic_name;?></td>
                                    <td><?php echo $obj->client_site->pic_phone_area . ' ' . $obj->client_site->pic_phone;?></td>
                                    <td>
										<div class="btn-group">
											<button data-toggle="dropdown" class="btn btn-small dropdown-toggle"  <?php echo $this->common->grantElement($obj->client_site->client->user->id,"decessor")?> >Aksi <span class="caret"></span></button>
											<ul class="dropdown-menu pull-right">
												<li class="btn_edit"><a href="#">Edit</a></li>
											</ul>
										</div>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="dr"><span></span></div>
        </div>
    </div>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/altergrades.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/padilibs/padi.autocomplete.js'></script>
<script>
	/*'use strict';
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
	*/
	

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
			////setopt();
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
</body>
</html>
