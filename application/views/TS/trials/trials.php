<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div id="dAddOperator" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Petugas Survey</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
                <div class="span12">
                    <div class="block gallery clearfix">
                        <div class="block thumbas clearfix">
                        <?php foreach(User::get_user_by_group('TS') as $user){?>
                        <div class="thumbnail petugasTrial pointer" username="<?php echo $user->username;?>">
                            <div class="imageholder">
								<img src="<?php echo base_url();?>media/users/<?php echo strtolower($user->username);?>.jpg" width="50" height="50" />
                            </div>
                            <div class="caption">
                                <?php echo $user->username;?>
                            </div>
                        </div>
                        <?php }?>
                        </div>
                    </div>
                </div>
			</div>
        </div>
    </div>
    <div id="dEditTrial" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="editTrialModalLabel">Edit Trial</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
                <div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Mulai</div>
						<div class="span9">
							<input type="text" id="trialstart" class="datepicker"><button class="btn btn-small btnresetstart">Reset</button>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Selesai</div>
						<div class="span9">
						<input type="text" id="trialend" class="datepicker"><button class="btn btn-small btnresetend">Reset</button>
						</div>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" type="button" id='savetrial'>Simpan</button>
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
                </div>
			</div>
        </div>
    </div>
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
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Trial</h1>
                        <ul class="buttons">
                            <li>
                                <a href="#"><span class="isw-settings"></span> </a>
                                <ul class="dd-list">
                                    <li><a href="#"><span class="isw-right"></span> Belum dilaksanakan</a></li>
                                    <li><a href="#"><span class="isw-right"></span> Sudah dilaksanakan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tTrial">
                            <thead>
                                <tr>
                                    <th width='15%'>Nama</th>
                                    <th width="15%">AM</th>
                                    <th width="15%">Alamat</th>
                                    <th width="15%">Tgl Mulai</th>
                                    <th width="15%">Tgl Berakhir</th>
                                    <!--<th width="15%">PIC</th>-->
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <tr myid='<?php echo $obj->id;?>'>
                                <?php
									/*
									$arr = array();
									foreach($obj->trialofficer as $officer){
										array_push($arr,$officer->username);
									}*/
									$arr = array();
									$officer = implode(",",$arr);
									
                                ?>
                                    <td><?php echo $obj->clientname;?></td>
                                    <td><?php echo $obj->am;?></td>
                                    <td><?php echo $obj->siteaddress;?></td>
                                    <td class="updatable startdate" fieldName="startdate">
										<?php echo common::sql_to_human_datetime($obj->startdate);?>
										<?php if(!is_null($obj->startexecdate)){
											echo common::sql_to_human_datetime($obj->startexecdate);
										}?>
                                    </td>
                                    <td class="updatable enddate" fieldName="enddate">
										<?php echo common::sql_to_human_datetime($obj->enddate);?>
										<?php if(!is_null($obj->endexecdate)){
											echo common::sql_to_human_datetime($obj->endexecdate);
										}?>
                                    </td>
                                    <!--<td class="officers"><?php //echo $officer;?></td>-->
                                    <td>
										<div class="btn-group">
											<button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span></button>
											<ul class="dropdown-menu pull-right">
												<li class="btnstart" ><a>Mulai Trial</a></li>
												<li class="btnend" ><a>Akhiri Trial</a></li>
												<li class="divider"></li>
												<!--<li class="btnassignofficer" resume="0"><a href="#">Assign Petugas</a></li>-->
												<!--<li class="btnedit"><a href="#">Edit</a></li>-->
<!--												<li class="divider survey_save"></li>
												<li class="btnend" resume="3"><a href="#">Berakhir</a></li>-->
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
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/trials/trials.js'></script>
</body>
</html>
