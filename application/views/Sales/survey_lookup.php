<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Sales/suspect_lookup.js'></script>
<body>
	<div class="header">
		<a class="logo" href="index.html"><img src="<?php echo $imagepath;?>logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
		<ul class="header_menu">
			<li class="list_icon"><a href="#">&nbsp;</a></li>
		</ul>
	</div>
	<?php $this->load->view('adm/menu');?>
	<div class="content">
		<div class="breadLine">
			<ul class="breadcrumb">
				<li><a href="#">PadiApp</a> <span class="divider">></span></li>
				<li><a href="#">Survey</a> <span class="divider">></span></li>
				<li class="active">Lookup</li>
			</ul>
			<?php $this->load->view('adm/buttons');?>
		</div>
		<div class="workplace">
			<div class="row-fluid">
				<div class="span12">
					<div class="head clearfix">
						<div class="isw-grid"></div>
						<h1>Pilih Calon Pelanggan</h1>
					</div>
					<div class="block-fluid table-sorting clearfix">
						<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tblsurveyLookup">
							<thead>
								<tr>
									<th width="25%">Nama</th>
									<th width="25%">Alamat</th>
									<th width="25%">Telp</th>
									<th width="25%">Jenis Bisnis</th>
									<th width="20%">AM</th>
									<th width="5%">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($objs as $obj){?>
								<tr>
									<td><?php echo $obj->name;?></td>
									<td><?php echo $obj->address;?></td>
									<td><?php echo $obj->phone_area . ' - ' . $obj->phone;?></td>
									<td><?php echo $obj->business_field;?></td>
									<td><?php echo $obj->user->username;?></td>
									<td>
										<div class="btn-group">
											<button class="btn btn_survey" type="button" id='btn_survey' client_id='<?php echo $obj->id;?>'  <?php echo $this->common->grantElement($obj->user->id,"decessor")?> >Ajukan Survey</button>
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
</body>
</html>
