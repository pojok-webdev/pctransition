<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('adm/head'); ?>
	<script type="text/javascript" src="/js/aquarius/suspects/suspects.js"></script>
	<body>
		<div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Konfirmasi</h3>
			</div>
			<div class="modal-body">
				<p id="modalMessage">Data Suspect telah dipindahkan ke Prospect.</p>
			</div>
		</div>
		<div id="dFollowup" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Data Follow up</h3>
			</div>
			<div class="modal-body">
				<p>
					<table id='tFollowup' class='table'>
						<thead>
						<tr><th>Tgl Followup</th><th>Description</th></tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</p>
			</div>
		</div>
		
		<div class="header">
			<a class="logo" href="index.html"><img src="<?php echo base_url(); ?>img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/></a>
			<ul class="header_menu">
				<li class="list_icon"><a href="#">&nbsp;</a></li>
			</ul>
		</div>
		<?php $this->load->view('adm/menu'); ?>
		<div class="content">
			<div class="breadLine">
				<ul class="breadcrumb">
					<li><a href="#">PadiApp</a> <span class="divider">></span></li>
					<li><a href="#">Suspects</a> <span class="divider">></span></li>
					<li class="active">List</li>
				</ul>
				<?php $this->load->view('adm/buttons'); ?>
			</div>
			<div class="workplace">
				<div class="row-fluid">
					<div class="span12">
						<div class="head clearfix">
							<div class="isw-grid"></div>
							<h1>Leads</h1>
							<ul class="buttons">
								<li><span class="isw-plus" id="btnaddsuspect"></span></li>
							</ul>
						</div>
						<div class="block-fluid table-sorting clearfix">
							<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSuspect">
								<thead>
									<tr>
										<th width="20%">Nama</th>
										<th width="10%">AM</th>
										<th width="10%">Tipe bisnis</th>
										<th width="20%">Alamat</th>
										<th width="20%">PIC</th>
										<th width="10%">Tgl Entri</th>
										<th width="10%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($objs as $obj) { ?>
										<?php
										if(!$this->isComplete($obj->client_id)){
											echo "<tr style='color:red' myid='".$obj->client_id."'>";
											$desc = " (belum lengkap)";
										}else{
											echo "<tr myid='".$obj->client_id."'>";
											$desc = "";
										}
										?>
											<td class="sname"><?php echo $obj->name . $desc; ?></td>
											<td><?php echo $obj->sales; ?></td>
											<td><?php echo $obj->business_field; ?></td>
											<td><?php echo $obj->address . ' - ' . $obj->city; ?></td>
											<td><?php echo getsuspectpicbyidcommaseparated($obj->id); ?></td>
											<td><?php echo $obj->createdate; ?></td>
											<td>
												<div class="btn-group">
													<button data-toggle="dropdown" class="btn btn-small dropdown-toggle"  <?php echo $this->common->grantElement($obj->sale_id, "decessor") ?> >Aksi <span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right">
														<li class="btneditsuspect"><a href="#">Edit</a></li>
														<?php if(Suspects::isComplete($obj->client_id)){?>
														<li class="btnmovetoprospect"><a href="#">Jadikan Prospect</a></li>
														<?php }?>
														<li class="divider survey_save"></li>
														<li class="btnremovesuspect"><a href="#">Hapus</a></li>
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
