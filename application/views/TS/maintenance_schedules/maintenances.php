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
        <a class="logo" href="index.html"><img src="<?php echo $imagepath;?>logo.png" alt="PadiNEt App" title="PadiNEt App"/></a>
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
                <li><a href="#">Maintenance</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Jadwal Maintenance Rutin</h1>
                        <ul class="buttons">
							<li><span class="isw-plus" id="createschedule" title="Buat Jadwal"></span></li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tMaintenance">
                            <thead>
                                <tr>
									<th width="20%">Tgl Maintenance</th>
									<th width="20%">AM/TS</th>
                                    <th width="20%">Nama</th>
                                    <th width="25%">Period</th>
                                    <th width="25%">Type</th>
                                    <th width="25%">Berbayar ?</th>
                                    <th width="5%"><span class='icon-edit'></span></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <tr>
								<?php
									$maintenancename='internal';
									switch($obj->maintenance_type){
										case 'backbone':
										$maintenancename='Backbone';
										$am = '';
										break;
										case 'bts':
										$maintenancename='BTS';
										$am = '';
										break;
										case 'pelanggan':
										$am = $obj->client_site->client->user->username;
										//$maintenancename=$obj->nameofmtype;
										$maintenancename=$obj->client_site->client->name;
										break;
										case 'datacenter':
										$am = '';
										$maintenancename='datacenter';
										break;
									}
									switch($obj->period_type){
										case '1':
										$mt = 'One time';
										break;
										case '2':
										$mt = 'Yearly';
										break;
										case '3':
										$mt = 'Monthly';
										break;
										case '4':
										$mt = 'Bi-monthly';
										break;
										case '5':
										$mt = 'Quarter';
										break;
										case '6':
										$mt = 'Semester';
										break;
										case '7':
										$mt = 'Daily';
										break;
										case '8':
										$mt = 'Weekly';
										break;
										default:
										$mt = '-';
										break;
									}
								?>
									<td><span class="tohuman"><?php echo $obj->mdatetime;?></span></td>
									<td><?php echo $obj->createuser;?></td>
                                    <td><?php echo $maintenancename;?></td>
                                    <td><?php echo $mt;?></td>
                                    <td><?php echo ($obj->maintenance_type=='pelanggan')?$obj->maintenance_type:'Internal';?></td>
                                    <td><?php echo ($obj->ispayable=='1')?'Ya':'Tidak';?></td>
                                    <td class="tbl_action editticket" requestid="<?php echo $obj->id;?>">
										<div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-small dropdown-toggle"  <?php echo $this->common->grantElement($obj->user_id,"owner")?> >Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">
                                            <li class='btnupdate pointer'><a href='<?php echo base_url();?>index.php/maintenances/schedule_edit/<?php echo $obj->id;?>'>Edit</a></li>
                                            <li class="divider"></li>
                                            <li class='btnremove pointer'><a>Hapus</a></li>
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
</body>
</html>
