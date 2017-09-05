<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" href="<?php echo base_url();?>css/jqui.1.10.4.css">
<?php $this->load->view('adm/head');?>
<body>
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo $imagepath;?>logo.png" alt="PadiNET App" title="PadiNET App"/></a>
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
                <li class="active">List</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
			<input type='hidden' name='username' value='<?php echo $this->ionuser->username;?>' />
			<?php $this->load->view('Sales/trials/modals');?>
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Trial</h1>
                        <ul class="buttons">
                            <li id="btnAddTrial">
                                <a><span class="isw-plus"></span> </a>
                            </li>
                            <li>
                                <a href="#"><span class="isw-settings"></span> </a>
                                <ul class="dd-list">
                                    <li><a href="#"><span class="isw-right"></span> Pelanggan belum aktif</a></li>
                                    <li><a href="#"><span class="isw-right"></span> Pelanggan aktif</a></li>
                                    <li><a href="#"><span class="isw-right"></span> Mantan Pelanggan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tTrial">
                            <thead>
                                <tr>
                                    <th width='34%'>Nama</th>
                                    <th width="12%">AM</th>
                                    <th width="15%">Start Date</th>
                                    <th width="15%">End Date</th>
                                    <th width="10%">Produk</th>
                                    <th width="10%">Status</th>
                                    <th width="4%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <tr myid='<?php echo $obj->id;?>'>
                                <?php
									$arr = array();
									foreach(getofficers($obj->id) as $officer){
										array_push($arr,$officer->username);
									}
                                    if($obj->dtdiff>0){
                                        $disabled = 'disabled="disabled"';                                        
                                    }else{
                                        $disabled = ' ';
                                    }
									$officer = implode(",",$arr);
                                ?>
                                    <td><?php echo $obj->clientname;?></td>
                                    <td><?php echo $obj->am;?></td>
                                    <td class="updatable" fieldName="startdate">
										<?php echo $obj->startdate;?>
										<?php echo $obj->startexecdate;?>
                                    </td>
                                    <td class="updatable" fieldName="enddate">
										<?php echo $obj->enddate;?>
										<?php echo $obj->endexecdate;?>
                                    </td>
                                    <td class="trialproduct"><?php echo $obj->prd . ' ' . $obj->dtdiff;?></td>
                                    <td class="trialstatus"><?php echo $obj->status;?></td>
                                    <td>
										<div class="btn-group">
											<button data-toggle="dropdown" class="btn btn-small dropdown-toggle"  <?php echo $this->common->grantElement($obj->userid,"decessor") . $disabled;?> >Aksi <span class="caret"></span></button>
											<ul class="dropdown-menu pull-right">
												<li class="btnedittrial" resume="1"><a href="#">Edit</a></li>
                                                <li class="btnfutrial" resume="1"><a href="#">Follow Up</a></li>
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
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Sales/trials/trials.js'></script>
</body>
</html>
