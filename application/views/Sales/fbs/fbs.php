<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('adm/head');?>
	<body>
	<?php $this->load->view('adm/header');?>
	<?php $this->load->view('adm/menu');?>
	<?php $this->load->view('Sales/fbs/dialogs');?>
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
						<h1>Form Berlangganan</h1>
						<ul class="buttons">
						<li><span class="isw-plus" id="btnaddfb"></span></li>
						</ul>
					</div>
					<div class="block-fluid table-sorting clearfix">
						<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tFbs">
							<thead>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="dr"><span></span></div>
		</div>
	</div>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Sales/fbs/fbs.js'></script>
</body>
</html>
