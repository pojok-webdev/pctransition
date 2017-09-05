<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/dashboard.js'></script>
<body>
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET App" title="PadiNET App"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">Db_Teknis</a> <span class="divider">></span></li>
                <li><a href="#">Adm</a> <span class="divider">></span></li>
                <li class="active">Dashboard</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="row-form clearfix">
			<?php if(Adm::member_of('sales')){?>
			<button class="btn btn-small" type="button" id="permintaansurvey">Permintaan Survey</button>
            <button class="btn btn-small" type="button" id="permintaaninstalasi">Permintaan Instalasi</button>
            <?php } ?>
			<button class="btn btn-small" type="button" id="permintaanmaintenance">Permintaan Maintenance</button>
        </div>
        <div class="workplace">
            <div class="row-fluid">
				<div class='block-fluid clearfix'>
					<div class='head clearfix'>
						<span class="isw-cloud"></span>
						<span class="name">Filter Tanggal</span>
					</div>
					<div class="row-form clearfix" data-cookie="widget_1">
						<div class='span4 offset3'>
						<input type='text' id='dtdashboard1' class='datepicker'>
						<input type='text' id='dtdashboard2' class='datepicker'>
						<button class='btn btn' id='showdashboard'>Tampilkan</button>
						</div>
					</div>
				</div>
            </div>
			<div class='clearfix'></div>
			<div id='mydashboard'></div>
		</div>
    </div>
</body>
</html>
