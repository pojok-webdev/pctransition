<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/TS/installs/installs.js"></script>
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
                <li><a href="/tickets">PadiApp</a> <span class="divider">></span></li>
                <li><a href="/install_requests/index/all">Install</a> <span class="divider">></span></li>
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
						<?php if(Common::member_of($this->ionuser->id,'Sales')){?>
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
									<th width="15%">Tgl Request</th>
									<th width="15%">AM</th>
                                    <th width="20%">Alamat</th>
                                    <th width="15%">Tgl Eksekusi</th>
                                    <th width="15%">PIC</th>
                                    <th width="15%">Cabang</th>
                                    <th width="5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <?php $status = ($obj->status==='2')?' <span class="textred">(dibatalkan)</span>':'';?>
                                <?php $disabled = ($obj->status==='2')?'disabled="disabled"':'';?>
                                
                                <tr install_id='<?php echo $obj->install_request_id;?>'>
                                    <td><?php echo $obj->name . $status;;?></td>
                                    <td><span class="tohuman"><?php echo $obj->create_date;?></span></td>
                                    <td><?php echo $obj->username;?></td>
                                    <td><?php echo $obj->address . ' - ' . $obj->city;?></td>
                                    <td>
										<span class="tohumandate"><?php echo $obj->install_date;?></span>
										<span class="tohumanhourminute"><?php echo $obj->install_date;?></span>
                                    </td>
                                    <td><?php echo $obj->pic_name . '(' . $obj->pic_phone_area . ') ' . $obj->pic_phone;?></td>
                                    <td><?php echo $obj->branch;?></td>
                                    <td>
										<div class="btn-group">
											<button data-toggle="dropdown" class="btn dropdown-toggle"  <?php echo $disabled;?>>Action <span class="caret"></span></button>
											<ul class="dropdown-menu pull-right">
												<li class='btn_edit pointer'><a>Edit</a></li>
												<li class="divider"></li>
												<li class='btnReport pointer'><a>Report</a></li>
												<li class='btnReport2 pointer'><a>Report (New PDF version)</a></li>
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
