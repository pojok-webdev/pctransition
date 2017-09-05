<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('adm/head'); ?>
	<script type='text/javascript' src='<?php echo base_url(); ?>js/aquarius/TS/tickets/statistics.js'></script>
	<body>
		<?php $this->load->view('adm/header'); ?>
		<?php $this->load->view('adm/menu'); ?>
		<div class="content">
			<div class="breadLine">
				<ul class="breadcrumb">
					<li><a href="#">PadiApp</a> <span class="divider">></span></li>
					<li><a href="#">Tickets</a> <span class="divider">></span></li>
					<li class="active">Statistics</li>
				</ul>
				<?php $this->load->view('adm/buttons'); ?>
			</div>
			<div class="workplace">
				<div class="row-fluid">
					<div class="span12">
						<div class="head clearfix">
							<div class="isw-grid"></div>
							<h1>Statistic</h1>
								<ul class="buttons">
									<li><span class="isw-plus" id="permintaansurvey"></span></li>
								</ul>
						</div>
						<div class="block-fluid table-sorting clearfix">
							<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSurveys">
								<thead>
									<tr>
										<th width="80%">Nama</th>
										<th width="15%">Total</th>
										<th width="5%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($objs as $obj) { ?>
										<tr myid="<?php echo $obj->id; ?>">
											<td><?php echo $obj->clientname; ?></td>
											<td><span class=""><?php echo $obj->total; ?></span></td>
											<td>
												<div class="btn-group">
													<button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>
													<ul class="dropdown-menu pull-right">
														<li class='btn_detail pointer'><a>Detail</a></li>
														<li class="divider"></li>
														<li class='btn_report pointer'><a>Report</a></li>
													</ul>
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
	</body>
</html>
