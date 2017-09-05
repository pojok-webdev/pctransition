<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
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
                <li><a href="#">Trial</a> <span class="divider">></span></li>
                <li class="active">Follow Up</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace" username = "<?php echo $this->session->userdata['username'];?>">
			<div class="block-fluid without-head">
				<div class="toolbar clearfix">
					<div class="left">
						<span><?php echo $status;?></span>
						<input type="hidden" id="id" value="<?php echo $id;?>" />
						<input type="hidden" id="client_site_id" value="<?php echo $obj->client_site_id;?>" />
						<input type="hidden" id="enddate" value="<?php echo $obj->enddate;?>" />
					</div>
					<div class="right">
						<div class="btn-group">
							<button class="btn" id="btnSimpan">Simpan </button>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Nama Pelanggan</div>
							<div class="span9">
								<?php echo $obj->name;?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Alamat</div>
							<div class="span9">
								<?php echo $obj->address . ' ' . $obj->address;?>
							</div>
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Tindakan</div>
							<div class="span9">
                                <div class="btn-group" data-toggle="buttons-radio" id="btnChoice">
                                    <button type="button" class="btn btn-danger" id="btnCancelTrial">Cancel</button>
                                    <button type="button" class="btn btn-warning" id="btnExtendTrial">Extend</button>
                                    <button type="button" class="btn" id="btnJoinTrial">Join</button>
                                </div>
							</div>
						</div>
						<div class="row-form clearfix" id="extendtrialdate">
							<div class="span3">Extend Trial Hingga</div>
							<div class="span9">
                                <input type="text" class="datepicker" id="extendend"/>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="toolbar clearfix">
							<div class="left">
								<div class="btn-group">
								</div>
							</div>
							<div class="right">
								<div class="btn-group">
								</div>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Layanan</div>
							<div class="span9"><?php foreach($services as $srv){echo $srv;}?></div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Start</div>
							<div class="span9"><?php echo $this->common->longsql_to_human_date($obj->startdate);?></div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">End</div>
							<div class="span9"><?php echo $this->common->longsql_to_human_date($obj->enddate);?></div>
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>
	<script type='text/javascript' src='<?php echo base_url();?>js/padilibs/padi.sendmail.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/padilibs/padi.dateTimes.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Sales/trials/fu.js'></script>
</body>
</html>
