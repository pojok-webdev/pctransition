<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/teknis.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/autocomplete/styles.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/aquarius/upstream.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/padilibs/autocomplete/cosmetics.css"/>
	<?php $this->load->view('adm/head'); ?>
    <script type="text/javascript" src="<?php echo base_url();?>js/autocomplete/jquery.autocomplete.js"></script>    
    <script type="text/javascript" src="<?php echo base_url();?>js/padilibs/padi.autocomplete.js"></script>    
	<script type='text/javascript' src='<?php echo base_url();?>js/jquery.wysiwyg.js'></script>
	<body>
		<?php $this->load->view("TS/tickets/ticketmodals");?>
		<?php $this->load->view("TS/tickets/addTicket");?>
		<?php $this->load->view("modals")?>
		<?php $this->load->view("TS/tickets/upstream")?>
		<div class="header">
			<a class="logo" href="index.html"><img src="<?php echo base_url(); ?>img/aquarius/logo.png" alt="Padinet" title="Padinet"/></a>
			<ul class="header_menu">
				<li class="list_icon"><a href="#">&nbsp;</a></li>
			</ul>
		</div>
		<?php $this->load->view('adm/menu', $path); ?>
		<div class="content">
			<div class="breadLine">
				<ul class="breadcrumb">
					<li><a href="#">App</a> <span class="divider">></span></li>
					<li><a href="#">Tickets</a> <span class="divider">></span></li>
					<li class="active">List</li>
				</ul>
				<?php $this->load->view('adm/buttons'); ?>
			</div>
			<div class="workplace">
				<input type='hidden' name='createuser' value='<?php echo $this->ionuser->username; ?>' id='createuser' class="inp_ticket inp_ticket2"/>
				<input type='hidden' name='user_id' value='<?php echo $this->ionuser->id; ?>' id='user_id' class="inp_ticket inp_ticket2"/>
				<div class="row-fluid">
					<div class="span12">
						<div class="head clearfix">
							<div class="isw-grid"></div>
							<h1>Tickets</h1>
							<ul class="buttons">
								<!--<li><span class="isw-documents" id="btnrekap" title="Rekap"></span></li>
								<li>
									<a href="#" class="isw-settings"></a>
									<ul class="dd-list">
										<li><a href="<?php echo base_url(); ?>index.php/tickets/index/open"><span class="isw-time"></span> Open Ticket</a></li>
										<li><a href="<?php echo base_url(); ?>index.php/tickets/index/closed"><span class="isw-ok"></span> Closed Ticket</a></li>
										<li><a href="<?php echo base_url(); ?>index.php/tickets/index/all"><span class="isw-list"></span> All Ticket</a></li>
									</ul>
								</li>
								<li><span class="isw-zoom" id="btnsearch"></span></li>-->
								<li><span class="isw-question-mark btnhelp" id="btnhelp" title="Help"></span></li>
								<li><span class="isw-clean btnCleanFilter" id="btnCleanFilter" title="Bersihkan filter table"></span></li>
								<li><span class="isw-up" id="btnaddupstream" title="BUAT TICKET UPSTREAM"></span></li>
								<li><span class="isw-plus" id="btnaddticket" title="BUAT TICKET PELANGGAN"></span></li>
							</ul>
							<!-- start exp -->
							<div id="bcExp" class="popup">
								<div class="head clearfix">
									<div class="arrow"></div>
									<span class="isw-question-mark"></span>
									<span class="name">Keterangan</span>
								</div>
								<div class="body-fluid users">
									<div class="item">
										Baris dg Text berwarna <span class='textred'>merah</span> adalah ticket yang memiliki troubleshoot<br />
										Baris dg Background <span class='textpink'>hijau</span> adalah ticket yang masih open<br />
										Baris dg Background <span class='ticketMassal'>Coklat</span> adalah ticket gangguan massal<br />
									</div>
								</div>
								<div class="footer">
									<button class="btn btn-danger btnhelp" type="button">Tutup</button>
								</div>
							</div>               							
							<!-- end exp -->
						</div>
						<div class="block-fluid table-sorting clearfix">
							<table cellpadding="0" cellspacing="0" width="100%" class="table tickettable" id='tbl_ticket'>
								<thead>
									<tr>
										<th width="5">Kode</th>
										<th width="15%">Nama</th>
										<th width="10%">Layanan</th>
										<th width="5%">Status</th>
										<th width="25%">Durasi</th>
										<th width="10%">Tgl Request</th>
										<th width="5%">Pelapor</th>
										<th width="5%">Telp Pelapor</th>
										<th width="5%">TS</th>
										<th width="5%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($objs as $obj) { ?>
										<?php
/*										$arr = array();
											foreach($obj->client_site->clientservice as $service){
												array_push($arr,$service->name);
											}
											$srv = implode(",",$arr);*/
											$srv = getservices($obj->id);
										?>
										<?php //$ticketclass = ($obj->hastroubleshoot($obj->id)>0)?'textred':'textblack'?>
										<?php $ticketclass = (is_null($obj->hastroubleshoot))?'textblack':'textred'?>
										<?php
											if($obj->parentid!==null){
												$ticketclass.=" ticketMassal";
											}
											if($obj->requesttype!=="pelanggan"){
												$ticketclass.=" ticketMassal";
											}
										?>
										<?php //$ticketaccom = ($obj->alltroubleshootaccomplished($obj->id)>0)?'blmberes':'beres'?>
										<?php $ticketaccom = (is_null($obj->trid))?'beres':'blmberes'?>
										<?php $status = ($obj->status == "0") ? 'ticketOpen' : 'ticketClosed'; ?>
										<tr thisid='<?php echo $obj->id; ?>' class="<?php echo $ticketclass . ' ' .$status;?>" ticketstart="<?php echo $obj->ticketstart;?>" ticketend="<?php echo $obj->ticket_end;?>">
											<td class="kdticket updatable" fieldName="kdticket"><?php echo $obj->kdticket; ?></td>
											<td class='clientname pointer'><?php echo $obj->clientname; ?></td>
											<td><span><?php echo $srv; ?></span></td>
											
											<td class="updatable" fieldName="status"><?php echo ($obj->status == "0") ? "Open" : "Closed"; ?></td>
											<td class="updatable" fieldName="duration">
												<?php echo $obj->ticketstart;?>
											</td>
											<td><?php echo Common::longsql_to_human_date($obj->create_date); ?></td>
											<td><?php echo $obj->reporter; ?></td>
											<td><?php echo $obj->reporterphone; ?></td>
											<td><?php echo $obj->createuser; ?></td>
											<td class="tbl_action editticket" requestid="<?php echo $obj->id; ?>">
												<div class="btn-group">
													<?php if ($obj->status == '0') { 
														$dsbld = '';
													}else{
														$dsbld = 'disabled="disabled"';
													}?>
													<button <?php echo $dsbld;?> data-toggle="dropdown" class="btn dropdown-toggle ticketaction">Action <span class="caret"></span></button>
													<?php if ($obj->status == '0') { ?>
													<ul class="dropdown-menu pull-right">
														<?php
															if($obj->requesttype!=="pelanggan"){
																echo "<li class='editUpstream pointer'><a>Edit Upstream</a></li>";
															}
														?>
														<li class='btntroubleshoot pointer'><a>Troubleshoot</a></li>
														<li class='btnfollowup pointer'><a>Follow Up Ticket</a></li>
														<!--<li class='btnstartdowntime pointer'><a>Start Downtime</a></li>-->
														<!--<li class='btnenddowntime pointer'><a>End Downtime</a></li>-->
														<!--<li class='btnviewtroubleshoot pointer'><a>Lihat Troubleshoot</a></li>-->
													</ul>
													<?php } ?>
												</div>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="dr"><span></span></div>
			</div>
		</div>
		<script type='text/javascript' src='<?php echo base_url(); ?>js/aquarius/TS/tickets/tickets.js'></script>
		<script type='text/javascript' src='<?php echo base_url(); ?>js/aquarius/TS/tickets/upstream.js'></script>
	</body>
</html>
