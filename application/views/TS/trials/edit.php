<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<body>
    <div class="header" id="myheader" user_id="<?php echo $this->ionuser->id;?>" username="<?php echo $this->session->userdata['username'];?>">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET Internal App" title="PadiApp -  PT PadiNET Surabaya"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
	<?php $this->load->view('adm/menu',$path);?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Trial</a> <span class="divider">></span></li>
                <li class="active">View</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace">
			<input type='hidden' name='createuser' value='<?php echo $this->ionuser->username;?>' class='inp_trial' />
			<div class="block-fluid without-head">
				<div class="toolbar clearfix">
					<div class="right">
						Data Trial
					</div>
				</div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Data Pelanggan</h4>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Jenis Trial</div>
                            <div class="span9">
								<?php echo ($obj->trialtype==='1')?'Baru (Instalasi)':'Upgrade';?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo $obj->client_site->client->name;?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Layanan yang dikehendaki</div>
                            <div class="span9">
								<?php echo $obj->service;?>
							</div>
                        </div>
                    </div>
                </div>
                <div class="span6 clearfix">
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Tanggal</h4>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Start Date</div>
                            <div class="span9">
								<?php echo $obj->startdate;?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">End Date</div>
                            <div class="span9">
								<?php echo $obj->enddate;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/trials/add.js'></script>
</body>
</html>
