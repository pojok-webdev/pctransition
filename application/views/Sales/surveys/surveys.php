<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type='text/javascript' src='/js/aquarius/Sales/surveys/surveys.js'></script>
	<body>
	<?php $this->load->view('adm/header');?>
	<?php $this->load->view('adm/menu');?>
	<div class="content">
		<div class="breadLine">
			<ul class="breadcrumb">
				<li><a href="#">PadiApp</a> <span class="divider">></span></li>
				<li><a href="#">Survey</a> <span class="divider">></span></li>
				<li class="active">List</li>
			</ul>
			<?php $this->load->view('adm/buttons');?>
		</div>
		<div class="workplace">
			<div class="row-fluid">
				<div class="span12">
					<div class="head clearfix">
						<div class="isw-grid"></div>
						<h1>Surveys</h1>
						<?php if($common->member_of($this->ionuser->id,'Sales')){?>
						<ul class="buttons">
						<li><span class="isw-plus" id="permintaansurvey"></span></li>
						</ul>
						<?php }?>
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
									<th width="10%">Hasil Survey</th>
									<th width="5%">Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($objs as $obj){?>
								<tr class="rSurvey" myid="<?php echo $obj->id;?>" survey_id='<?php echo $obj->survey_request->id;?>'>
									<?php
											switch($obj->eresume){
													case '0':
													$status = 'Belum ada kesimpulan';
													break;
													case '1':
													$status = 'Dapat dilaksanakan';
													break;
													case '2':
													$status = 'Dapat dilaksanakan dengan catatan';
													break;
													case '3':
													$status = 'Tidak dapat dilaksanakan';
													break;
													default:
													$status = 'Belum ada kesimpulan';
													break;
											}
											switch($obj->direction){
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
													$direction = 'WWWW';
													break;
											}
									?>
									<td><?php echo $obj->clientname;?></td>
									<td><span class=""><?php echo $obj->username;?></span></td>
									<td><span class="tohuman"><?php echo $obj->screate_date;?></span></td>
									<td><?php echo $obj->address;?></td>
									<td class="updatable" fieldName="finishdate">
									<span class="tohumandate"><?php echo $obj->execution_date;?></span>
									<span class="tohumanhourminute"><?php echo $obj->execution_date;?></span>
									</td>
									<td><?php echo $obj->surveyors;?></td>
									<td><?php echo $direction;?></td>
									<td class="updatable" fieldName="status"><?php echo $status;?></td>
									<td>
										<div class="btn-group">
											<button data-toggle="dropdown" class="btn dropdown-toggle" <?php echo $this->common->grantElement($obj->userid,"decessor")?> >Action <span class="caret"></span></button>
											<ul class="dropdown-menu pull-right">
												<li class='btn_edit pointer'  survey_id='<?php echo $obj->survey_request_id;?>' ><a>Edit</a></li>
												<li class="divider"></li>
												<li class='btn_report pointer'><a>Report</a></li>
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
	-->
</body>
</html>
