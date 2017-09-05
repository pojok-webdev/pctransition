<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="/css/maintenancereports/index.css">
<link rel="stylesheet" href="/asset/fancybox3/jquery.fancybox.min.css" />
<?php $this->load->view('adm/head');?>
<script type="text/javascript" src="/asset/fancybox3/jquery.fancybox.min.js"></script>
<script type='text/javascript' src='/js/aquarius/plugins/fancybox/jquery.fancybox.pack.js'></script>
<body>
	<?php $this->load->view('adm/header');?>
    <?php $this->load->view('adm/menu');?>
    <?php $this->load->view('EOS/maintenancereport/modal2');?>
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
                        <h1>Laporan Maintenance</h1>
                        <ul class="buttons" style="display:none">
							<li><span class="isw-plus" id="createreport" title="Buat Laporan"></span></li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tMaintenance">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tgl Maintenance</th>
                                    <th width="20%">Name</th>
                                    <th>Topologi</th>
									<th width="20%">Problems</th>
                                    <th width="25%">PIC</th>
                                    <th width="5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <?php if($obj->status==='0'){
                                    $color='orange';
                                }else{
                                    $color='white';
                                }?>
                                <tr class='<?php echo $color;?>' myid="<?php echo $obj->id;?>">
                                    <td><?php echo $obj->sqldate;?></td>
                                    <td><?php echo $obj->maintenancedate;?></td>
                                    <td class="name"><span class="tohuman"><?php echo $obj->name;?></span></td>
                                    <td class="tplogi" >
                                        <?php if(is_null($obj->topologi)){?>
                                            <img src="/asset/images/belumadagambar.png" width=35>
                                        <?php 
                                        }else{
                                        ?>
                                            <img src="<?php echo $obj->topologi?>" width=35>
                                        <?php }?>
                                    </td>
									<td class="problems"><span class="tohuman"><?php echo $obj->description;?></span></td>
                                    <td><?php echo $obj->reporter;?></td>
                                    <td class="tbl_action editticket" requestid="<?php echo $obj->id;?>">
										<div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-small dropdown-toggle" >Action 
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li class='btnupdate pointer'>
                                                <a href='/maintenancereports/edit/<?php echo $obj->id;?>'>Edit</a>
                                            </li>
                                            <li>
                                                <a href="/maintenancereports/viewreport/<?php echo $obj->id;?>">View Report</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li class='btnremove pointer'><a>Hapus</a></li>
                                            <li class="eosactivity" style="display:none"><?php echo $obj->eosactivity?></li>
                                            <li class="services" style="display:none"><?php echo $obj->services?></li>
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
    <script type='text/javascript' src='/js/aquarius/EOS/maintenancereport/maintenancereport.js'></script>
</body>
</html>
