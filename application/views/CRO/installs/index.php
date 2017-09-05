<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('adm/head');?>
	<body>
		<div class="header">
			<a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/></a>
			<ul class="header_menu">
				<li class="list_icon"><a href="#">&nbsp;</a></li>
			</ul>
		</div>
		<?php $this->load->view('adm/menu');?>
		<div class="content">
		<div class="breadLine">
		<ul class="breadcrumb">
			<li><a href="#">PadiApp</a> <span class="divider">></span></li>
			<li><a href="#">Install</a> <span class="divider">></span></li>
			<li class="active">List</li>
		</ul>
		<?php $this->load->view('adm/buttons');?>
		</div>
		<div class="workplace">
		<div class="row-fluid">
		<div class="span12">
		<div class="head clearfix">
		<div class="isw-grid"></div>
		<h1>Installs <?php echo $install_status;?></h1>
		<?php if($this->session->userdata["role"]==="Sales"){?>
		<ul class="buttons">
			<li><span class="isw-plus" id="permintaanmainstalasi"></span></li>
		</ul>
		<?php } ?>
		<ul class="buttons">
			<li>
			<a href="#" class="isw-settings"></a>
			<ul class="dd-list">
				<li>
				<a href="<?php echo base_url();?>index.php/install_requests/index/0"><span class="isw-time"></span> Belum dilaksanakan</a>
				</li>
				<li>
				<a href="<?php echo base_url();?>index.php/install_requests/index/1"><span class="isw-ok"></span> Sudah dilaksanakan</a>
				</li>
				<li>
				<a href="<?php echo base_url();?>index.php/install_requests/index/all"><span class="isw-list"></span> Semua</a>
				</li>
			</ul>
			</li>
		</ul>
		</div>
		<div class="block-fluid table-sorting clearfix">
		<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tInstall">
		<thead>
		<tr>
			<th width="15%">Nama</th>
			<th width="15%">AM</th>
			<th width="15%">Tgl Request</th>
			<th width="20%%">Alamat</th>
			<th width="15%">Tgl Eksekusi</th>
			<th width="15%">PIC</th>
			<th width="5%"><span class="icon-th-large"></span></th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($objs as $obj){?>
			<tr install_id='<?php echo $obj->install_request->id;?>'>
				<td><?php echo $obj->client_site->client->name;?></td>
				<td><?php echo $obj->client_site->client->user->username;?></td>
				<td><span class="tohuman"><?php echo $obj->install_request->create_date;?></span></td>
				<td><?php echo $obj->client_site->address . ' - ' . $obj->client_site->client->city;?></td>
				<td class="updatable" fieldName="execdate">
				<span class="tohumandate"><?php echo $obj->install_date;?></span>
				<span class="tohumanhourminute"><?php echo $obj->install_date;?></span>
				</td>
				<td><?php echo $obj->pic_name . '(' . $obj->pic_phone_area . ') ' . $obj->pic_phone;?></td>
				<td>
				<div class="btn-group">
				<button data-toggle="dropdown" class="btn dropdown-toggle"  <?php echo $this->common->grantElement($obj->client_site->client->user->id,"decessor")?> >Action <span class="caret"></span></button>
				<ul class="dropdown-menu pull-left">
					<li class='btn_edit pointer'><a>Edit</a></li>
					<li class="divider"></li>
					<li class='btnReport pointer'><a>Report</a></li>
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
		<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/Sales/installs/installs.js"></script>
	</body>
</html>
