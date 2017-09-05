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
                <li>Install<span class="divider">></span></li>
                <li class="active">Look up</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Pilih Pelanggan</h1>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tInstall">
                            <thead>
                                <tr>
                                    <th width="25%">Name</th>
                                    <th width="20%">AM</th>
                                    <th width="25%">Alamat</th>
                                    <th width="25%">E-mail/Phone</th>
                                    <th width="25%">Hasil Survey</th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
								<?php
								switch($obj->resume){
									case '0':
									$resume = 'Belum ada kesimpulan';
									break;
									case '1':
									$resume = 'Bisa dilaksanakan';
									break;
									case '2':
									$resume = 'Bisa dilaksanakan dg syarat';
									break;
									case '3':
									$resume = 'Tidak bisa dilaksanakan';
									break;
								}
								?>
                                <tr>
                                    <td><?php echo $obj->name;?></td>
                                    <td><?php echo $obj->client_site->client->user->username;?></td>
                                    <td><?php echo $obj->address;?></td>
                                    <td><?php echo $obj->client_site->client->phone_area . ' - ' . $obj->client_site->client->phone;?></td>
                                    <td><?php echo $resume;?></td>
                                    <td>
										<div class="btn-group">
											<button class="btn doinstall" type="button" id='btn_install' survey_id='<?php echo $obj->id;?>'  <?php echo $this->common->grantElement($obj->userid,"decessor")?> >Install</button>
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
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Sales/installs/add_install_lookup.js'></script>
</body>
</html>
