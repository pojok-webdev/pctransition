<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/prospects.js"></script>
<body>
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiApp" title="Padinet App - Prospect"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Prospects</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Prospects <?php echo $title;?></h1>
						<ul class="buttons">
							<li>
                                <a href="#" class="isw-settings"></a>
                                <ul class="dd-list">
                                    <li><a href="<?php echo base_url();?>index.php/prospects/index/open"><span class="isw-time"></span> Belum diajukan Survey</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/prospects/index/closed"><span class="isw-ok"></span> Sudah diajukan Survey</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/prospects/index/all"><span class="isw-list"></span> All Prospect</a></li>
                                </ul>
							</li>
						</ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tProspect">
                            <thead>
                                <tr>
                                    <th width="20%">Nama</th>
									<th width="30%">AM</th>
                                    <th width="20%">Tipe bisnis</th>
                                    <th width="30%">Alamat</th>
                                    <th width="20%">PIC</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
								//ini_set("memory_limit","256");
								?>
								<?php 
									foreach($objs as $obj){?>
								<?php
									$arr = array();
									//foreach($obj->pic as $pic){
									foreach(getpics($obj->id) as $pic){
										array_push($arr,$pic->name." ".$pic->hp);
									}
									$pics = implode(",",$arr);
								?>
								<tr myid="<?php echo $obj->id;?>">
									<td><?php echo $obj->name;?></td>
									<td><?php echo $obj->username;?></td>
									<td><?php echo $obj->business_field;?></td>
									<td><?php echo $obj->address . ' - ' . $obj->city;?></td>
									<td><?php echo $pics;?></td>
									<td >
										<div class="btn-group">
											<button data-toggle="dropdown" class="btn btn-small dropdown-toggle" <?php echo $this->common->grantElement($obj->userid,"decessor")?>>Aksi <span class="caret"></span>
											</button>
											<ul class="dropdown-menu pull-right">
												<li class="btn_edit pointer"><a>Edit</a></li>
												<li class="btn_survey pointer"><a>Ajukan Survey</a></li>
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
