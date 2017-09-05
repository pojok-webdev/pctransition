<?php
$data = array(
'csspath' => $csspath,
'jspath' => $jspath,
'imagepath' => $imagepath,
);
?><!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo $imagepath;?>logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu',$path);?>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/maintenances.js'></script>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Maintenance Report</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Maintenance</h1>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tMaintenance">
                            <thead>
                                <tr>
									<th width="20%">Tgl Maintenance</th>
                                    <th width="20%">Nama</th>
                                    <th width="20%">Alamat</th>
                                    <th width="15%">Type</th>
                                    <th width="10%">E-mail/Phone</th>
                                    <th width="10%"><span class='icon-edit'></span></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($schedules as $obj){?>
								<?php //switch($obj->maintenance_type){
									//case datacenter:
									//
								}?>
                                <tr myid="<?php echo $obj->id;?>">
								<?php
/*									$maintenancename='internal';
									switch($obj->maintenance_type){
										case 'backbone':
										$maintenancename='internal';
										break;
										case 'bts':
										$maintenancename='internal';
										break;
										case 'pelanggan':
										$maintenancename=$obj->client_site->client->name;
										//$maintenancename = '';
										break;
										case 'datacenter':
										$maintenancename='internal';
										break;
									}*/
								?>
									<td><span class="tohuman"><?php echo $obj->maintenance_date;?></span></td>
                                    <td><?php echo $obj->nm;?></td>
                                    <td><?php echo $obj->nm;?></td>
                                    <td><?php echo $obj->maintenance_type;?></td>
                                    <td><?php echo $obj->nm . ',  ' . $obj->nm;?></td>
                                    <td>
										<div class="btn-group">
											<button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span>
											</button>
											<ul class="dropdown-menu pull-right">
												<li class="btnView"><a href="<?php echo base_url();?>index.php/maintenances/maintenance_edit/<?php echo $obj->id;?>">View</a></li>
												<li class="divider survey_save"></li>
												<li class="btnAssign"  <?php echo $this->common->grantElement($obj->client_site->client->user->id,"group")?> ><a href="#">Penugasan</a></li>
												<li class="btnReport"><a href="#">Buat Laporan</a></li>
											</ul>
										</div>
                                    </td>
                                </tr>
                                <?php //}?>
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
