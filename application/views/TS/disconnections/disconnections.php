<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p id="modalMessage">Data telah tersimpan.</p>
        </div>
    </div>
    <div class="header">
        <a class="logo" href="index.html">
        <img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET App" title="PadiNET App"/>
        </a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="/">PadiApp</a> <span class="divider">></span></li>
                <li><a href="/disconnections">Disconnection</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Disconnection</h1>
                        <ul class="buttons">
                            <li>
                                <a href="#"><span class="isw-settings"></span> </a>
                                <ul class="dd-list">
                                    <li><a href="/disconnections"><span class="isw-right"></span> Semua</a></li>
                                    <li>
                                        <a href="/disconnections/filter/notexecuted"><span class="isw-right"></span> Belum diputus</a>
                                    </li>
                                    <li>
                                        <a href="/disconnections/filter/executed"><span class="isw-right"></span> Sudah diputus</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tDisconnection">
                            <thead>
                                <tr>
                                    <th width='20%'>Nama</th>
                                    <th width='16%'>AM</th>
                                    <th width="15%">Alamat</th>
                                    <th width="10%">PIC</th>
                                    <th width="10%">Jenis</th>
                                    <th width="10%">Status</th>
                                    <th width="15%">Hingga</th>
                                    <th width="4%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
								<?php
								switch($obj->disconnectiontype){
									case "0":
									$type = "Reaktivasi";
									break;
									case "1":
									$type = "Isolir";
									break;
									case "2":
									$type = "Temporer";
									break;
									case "3":
									$type = "Permanen";
									break;
								}
								switch($obj->status){
									case '0':
									$status="Pengajuan" ;
									$action="Disconnect";
									break;
									case '1':
									$status="Sudah dilaksanakan" ;
									break;
									case '2':
									$action="Reactivate";
									$status="Pengajuan Reaktivasi" ;
									break;
									case '3':
									$status="Telah direaktivasi" ;
									break;
								}
								?>
                                <tr myid='<?php echo $obj->id;?>' clientid='<?php echo $obj->client_id;?>'>
                                    <td><?php echo $obj->client->name;?></td>
                                    <td><?php echo $obj->client->user->username;?></td>
                                    <td><?php echo $obj->client->address;?></td>
                                    <td><?php echo $obj->client->pic->name;?></td>
                                    <td class="updatable" fieldName="disconnectiontype"><?php echo $type;?></td>
                                    <td class="status updatable" fieldName="status"><?php echo $status;?></td>
                                    <td class="dttmcheck updatable"><?php echo $obj->finishdate;?></td>
                                    <td>
										<div class="btn-group">
											<button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi 
                                            <span class="caret">
                                            </span>
                                            </button>
											<ul class="dropdown-menu pull-right">
												<li class="btnviewdisconnection" resume="1"><a class="pointer">View</a></li>
												<?php if($obj->status=='0'){?>
													<li class="btndisconnect"><a class="pointer">Dilaksanakan</a></li>
												<?php }?>
                                                <li class="btnentrydisconnection" resume="1"><a class="pointer">Entri Report</a></li>
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
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/disconnections.js'></script>
</body>
</html>
