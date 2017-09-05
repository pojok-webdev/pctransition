<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/teknis.css"/>
	<?php $this->load->view('adm/head'); ?>
	<body>
		<?php $this->load->view('TS/tickets/rekapticketmodals'); ?>
		<div class="header">
			<a class="logo" href="index.html"><img src="<?php echo base_url(); ?>img/aquarius/logo.png" alt="Padinet" title="Padinet"/></a>
			<ul class="header_menu">
				<li class="list_icon"><a href="#">&nbsp;</a></li>
			</ul>
		</div>
		<?php $this->load->view('adm/menu'); ?>
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
				<input type='hidden' name='createuser' value='<?php echo $this->ionuser->username; ?>' id='createuser' class="inp_ticket"/>
				<input type='hidden' name='user_id' value='<?php echo $this->ionuser->id; ?>' id='user_id' class="inp_ticket"/>
				<input type='hidden' name='curr_requesttype' id='curr_requesttype' class="inp_ticket"/>
				<input type='hidden' name='curr_client_id' id='curr_client_id' class="inp_ticket"/>
				<div class="row-fluid">
					<div class="span12">
						<div class="head clearfix">
							<div class="isw-grid"></div>
							<h1>Rekap Ticket ( <span id="rekapClientName"></span> )</h1>
							<ul class="buttons">
								<li><span class="isw-print" id="btnprint"></span></li>
								<li><span class="isw-zoom" id="btnsearch"></span></li>
							</ul>
						</div>
						<div class="block-fluid table-sorting clearfix">
							<table cellpadding="0" cellspacing="0" width="100%" class="table tickettablex" id='tbl_ticket'>
								<thead>
									<tr>
										<th width="5%">Kd Ticket</th>
										<th width="20%">Problem</th>
										<th width="15%">Solusi</th>
										<th width="5%">Status</th>
										<th width="50%">Durasi</th>
										<th width="5%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($objs as $obj) { ?>
										<tr thisid='<?php echo $obj->id; ?>'>
											<td class="updatable" fieldName="kdticket"><?php echo $obj->kdticket; ?></td>
											<td class='clientname pointer'><?php echo $obj->content; ?></td>
											<td><span><?php echo $obj->description; ?></span></td>
											<td ><?php echo ($obj->status==="0")?"Open":"Closed"; ?></td>
											<td ></td>
											<td class="tbl_action editticket" requestid="<?php echo $obj->id; ?>">
												<div class="btn-group">
													<button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>
													<ul class="dropdown-menu pull-right">
														<li class='print pointer'><a>Print</a></li>
														<li class="divider"></li>
														<li class='saveasPDF pointer'><a>Save as PDF</a></li>
													</ul>
												</div>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					<span id='total_router'></span>
				</div>
				<div class="dr"><span></span></div>
			</div>
		</div>
		<script type='text/javascript' src='<?php echo base_url(); ?>js/aquarius/TS/tickets/rekaptickets.js'></script>
	</body>
</html>
