<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('adm/head'); ?>
	<script type='text/javascript' src='<?php echo base_url(); ?>js/aquarius/TS/surveys/surveys.js'></script>
	<style type="text/css">
		.pmenu{
			left: -180px;
		}
		.pcontent{
			margin-left: 40px;
		}
	</style>
	<body>
		<?php $this->load->view('adm/header'); ?>
		<?php $this->load->view('adm/menu'); ?>
		<div class="content">
			<div class="breadLine">
				<ul class="breadcrumb">
					<li><a href="#">PadiApp</a> <span class="divider">></span></li>
					<li><a href="#">Survey</a> <span class="divider">></span></li>
					<li class="active">List</li>
				</ul>
				<?php $this->load->view('adm/buttons'); ?>
			</div>
			<div class="workplace">
				<div class="row-fluid">
					<div class="span12">
						<div class="head clearfix">
							<div class="isw-grid"></div>
							<h1>Surveys</h1>
							<?php if (Common::member_of($this->ionuser->id, 'Sales')) { ?>
								<ul class="buttons">
									<li><span class="isw-plus" id="permintaansurvey"></span></li>
								</ul>
							<?php } ?>
						</div>
						<div class="block-fluid table-sorting clearfix">
							<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSurveys">
								<thead>
									<tr>
										<th width="10%">Nama</th>
										<th width="10%">AM</th>
										<th width="10%">Tgl Request</th>
										<th width="25%">Alamat</th>
										<th width="10%">Tgl Eksekusi</th>
										<th width="10%">Petugas</th>
										<th width="10%">Peruntukan</th>
										<th width="10%">Cabang</th>
										<th width="10%">Hasil Survey</th>
										<th width="5%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($objs as $obj) { ?>
										<tr myid="<?php echo $obj->id; ?>">
											<?php
											switch ($obj->resume) {
												case '0':
													$status = 'Belum ada kesimpulan';
													break;
												case '1':
													$status = 'Bisa';
													break;
												case '2':
													$status = 'Bisa dengan catatan';
													break;
												case '3':
													$status = 'Tidak bisa';
													break;
												default:
													$status = '';
													break;
											}
											switch ($obj->direction) {
												case '0':
													$direction = 'Pelanggan baru';
													break;
												case '1':
													$direction = 'Site baru';
													break;
												case '3':
													$direction = 'Relokasi';
													break;
												default:
													$direction = '';
													break;
											}
											?>
											<td><?php echo $obj->clientname; ?></td>
											<td><span class=""><?php echo $obj->username; ?></span></td>
											<td><span class="tohuman"><?php echo $obj->screate_date; ?></span></td>
											<td><?php echo $obj->address; ?></td>
											<td class="updatable" fieldName="finishdate">
												<span class="tohumandate"><?php echo $obj->execution_date; ?></span>
												<span class="tohumanhourminute"><?php echo $obj->execution_date; ?></span>
											</td>
											<td><?php echo Survey_surveyor::get_names_by_survey_id($obj->survey_request_id); ?></td>
											<td><?php echo $direction; ?></td>
											<td class="updatable" fieldName="branch"><?php echo $obj->branch; ?></td>
											<td class="updatable" fieldName="status"><?php echo $status; ?></td>
											<td>
												<div class="btn-group">
													<button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>
													<ul class="dropdown-menu pull-right">
														<li class='btn_edit pointer'  survey_id='<?php echo $obj->survey_request_id; ?>' ><a>Edit</a></li>
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
