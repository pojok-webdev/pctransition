<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/teknis.css"/>
<?php $this->load->view('adm/head');?>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.timeagopuji.js"></script>
<body>
    <div id="dFollowUp" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Follow Up</h3>
        </div>
        <div class="modal-body">
			<div class='row-fluid'>
				<div class="span12">
					<div class="without-head">
                        <div class="row-form clearfix">
                            <div class="span4">Tanggal:</div>
                            <div class="span4">
								<input type='text' class='datepicker' name='followUpDate' id='followUpDate' />
							</div>
							<div class='span2'>
								<?php echo form_dropdown('followUpHour',$hours,1,'id="followUpHour" class="dttime"');?>
							</div>
							<div class='span2'>
								<?php echo form_dropdown('followUpMinute',$minutes,1,'id="followUpMinute" class="dttime"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span4">Nama/Jabatan (PIC):</div>
                            <div class="span3">
								<input type='text' name='followUpPIC' id='followUpPIC' class='shorttext' />
							</div>
							<div class="span3">
								<input type='text' name='picPosition' id='picPosition' class='shorttext' />
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span4">Action:</div>
                            <div class="span6">
								<textarea id="fuDescription" name="fuDescription"></textarea>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span4">Status:</div>
                            <div class="span6">
                                <div class="btn-group" data-toggle="buttons-radio">
                                    <button type="button" class="btn btnDeviceRemove" value="1" id="btnOK">OK</button>
                                    <button type="button" class="btn btnDeviceRemove" value="0" id="btnNotOK">Progress</button>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
        </div>
        <div class="modal-footer">
			<button type="button" class="btn btnHistory" value="2" id="btnHistory">History</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCloseTicket">Tutup Tiket</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true" id="btnProgress">Progress</button>
        </div>
    </div>
    <div id="dFollowUpHistory" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myHistoryModalLabel">Histori Follow Up</h3>
        </div>
        <div class="modal-body">
			<div class='row-fluid'>
				<div class="span12">
                    <div class="block-fluid row-fluid without-head">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table images display" id="tblHistory">
                            <thead>
                                <tr>
                                    <th width="60">Tanggal</th>
                                    <th>PIC</th>
                                    <th>Jabatan</th>
                                    <th>Status</th>
                                    <th>Petugas</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
				</div>
			</div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCloseTicketx">Tutup</button>
        </div>
    </div>
    <div id="dSearch" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="isw-zoom" ></span>
            <h3 id="myModalLabel" >&nbsp; Pencarian</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
                <div class="span12">
					<div class="block-fluid withoutt-head">
						<div class="row-form clearfix">
							<div class="span1"><input type="checkbox"  id="cbnama" checked="checked"/></div>
							<div class="span4">Nama</div>
							<div class="span7"><input type="text"  id="searchname"></div>
						</div>
						<div class="row-form clearfix">
							<div class="span1"><input type="checkbox" id="cbrentangwaktu" /></div>
							<div class="span4">Rentang waktu</div>
							<div class="span3"><input type="text" class="datetimepickers"  id="searchtime1"></div>
								<div class="span2">
									<?php echo form_dropdown('filterhour1',$hours,'','id="filterhour1" class="dttime"');?>
								</div>
								<div class="span2">
									<?php echo form_dropdown('filterminute1',$minutes,'','id="filterminute1" class="dttime"');?>
								</div>
						</div>
						<div class="row-form clearfix">
							<div class="span5">s/d</div>
							<div class="span3"><input type="text" class="datetimepickers"  id="searchtime2"></div>
							<div class="span2">
								<?php echo form_dropdown('filterhour2',$hours,'','id="filterhour2" class="dttime"');?>
							</div>
							<div class="span2">
								<?php echo form_dropdown('filterminute2',$minutes,'','id="filterminute2" class="dttime"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span1"><input type="checkbox"  id="cbdurasi"/></div>
							<div class="span4">Durasi</div>
							<div class="span7">
								<select  id="searchduration">
									<option>&lt; 30 menit</option>
									<option>30 menit - &lt; 1 jam</option>
									<option>1 jam - &lt; 2 jam</option>
									<option>2 jam - &lt; 4 jam</option>
									<option>4 jam - &lt; 24 jam</option>
									<option>&gt; 24 jam</option>
								</select>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span1"><input type="checkbox"  id="cbcause"/></div>
							<div class="span4">Penyebab</div>
							<div class="span7">
								<?php echo form_dropdown('searchcause',$ticketcauses,0,'id="searchcause" class="cause"');?>
							</div>
						</div>
					</div>
                </div>
			</div>
        </div>
        <div class="modal-footer">
			<button type="button" data-dismiss="modal" class="btn">Tutup</button>
			<button type="button" class="btn btn-primary" id="search">Cari</button>
		</div>
    </div>
    <div id="dInfo" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Info</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<span id="info_name"></span>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">PIC</div>
							<div class="span9">
								<span id="info_pic_name"></span>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Phone</div>
							<div class="span9">
								<span id="info_pic_phone"></span>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Email</div>
							<div class="span9">
								<span id="info_pic_email"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>
        </div>
    </div>
    <div class="modal hide fade" id="dAddTicket" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
					<h4 id="modaltitle">Penambahan Tiket</h4>
				</div>
				<div class="modal-body">
					<div class="row-fluid">
						<div class="span4">
							<div class="block-fluid without-head">
								<div class="row-form clearfix">
									<div class="span4">Jenis</div>
									<div class="span8">
										<select name="requesttype" id="requesttype" type="select" class="inp_ticket">
											<option value="backbone">backbone</option>
											<option value="datacenter">datacenter</option>
											<option value="bts">bts</option>
											<option value="pelanggan">pelanggan</option>
										</select>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span4">Nama</div>
									<div class="span8">
										<select name="client_id" id="client_id" class="inp_ticket" type='selectid'>
										<option></option>
										</select>
									</div>
								</div>
						<div class="row-form clearfix" id="client_site_div">
							<div class="span4">Lokasi</div>
							<div class="span8">
								<select id="client_site_id" type='selectid' name="client_site_id" class="" >
									<option></option>
								</select>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span4">Pelapor</div>
							<div class="span8"><input type="text" id="reporter" name="reporter" class="inp_ticket" /></div>
						</div>
						<div class="row-form clearfix">
							<div class="span6">Penyebab</div>
							<div class="span12">
							<?php echo form_dropdown('cause',$ticketcauses,0,'id="cause" class="inp_ticket" type="select"');?>
							</div>
						</div>
							</div>
						</div>
						<div class="span4">
							<div class="block-fluid without-head">
								<div class="row-form clearfix">
									<div class="span12">Mulai Tiket</div>
									<div class="span4">
										<input type="text" id="rs" name="ticketstart" class="inp_ticket datetimepickers dttime  datepicker texttohuman" />
									</div>
									<div class="span3">
										<?php echo form_dropdown('hour',$hours,'','id="rsh" class="dttime" parent="rs"');?>
									</div>
									<div class="span3">
										<?php echo form_dropdown('minute',$minutes,'','id="rsm" class="dttime" grandparent="rs"');?>
									</div>
									<div class="span1"><a id="clearawalrequest" class="icon-repeat cleardatetime" title="clear request time"></a></div>
								</div>
								<div class="row-form clearfix">
									<div class="span12">Akhir Tiket</div>
									<div class="span4">
										<input type="text" id="re" name="ticketend" class="inp_ticket datetimepickers dttime datepicker texttohuman" />
									</div>
									<div class="span3">
										<?php echo form_dropdown('hour',$hours,'','id="reh" class="dttime" parent="re"');?>
									</div>
									<div class="span3">
										<?php echo form_dropdown('minute',$minutes,'','id="rem" class="dttime" grandparent="re"');?>
									</div>
									<div class="span1"><a id="clearakhirrequest" class="icon-repeat cleardatetime" title="clear request time"></a></div>
								</div>
								<div class="row-form clearfix">
									<div class="span12">Mulai Downtime</div>
									<div class="span4"><input type="text" id="ts" name="downtimestart" class="datetimepickers dttime inp_ticket datepicker texttohuman"></div>
									<div class="span3">
										<?php echo form_dropdown('hour',$hours,'','id="tsh" class="dttime" parent="ts"');?>
									</div>
									<div class="span3">
										<?php echo form_dropdown('minute',$minutes,'','id="tsm" class="dttime" grandparent="ts"');?>
									</div>
									<div class="span1"><a id="clearawaldowntime" class="icon-repeat cleardatetime" title="clear downtime"></a></div>
								</div>
								<div class="row-form clearfix">
									<div class="span12">Akhir Downtime</div>
									<div class="span4"><input type="text" id="te" name="downtimeend" class="datetimepickers dttime inp_ticket datepicker texttohuman"></div>
									<div class="span3">
										<?php echo form_dropdown('hour',$hours,'','id="teh" class="dttime" parent="te"');?>
									</div>
									<div class="span3">
										<?php echo form_dropdown('minute',$minutes,'','id="tem" class="dttime" grandparent="te"');?>
									</div>
									<div class="span1"><a id="clearakhirdowntime" class="icon-repeat cleardatetime" title="clear downtime"></a></div>
								</div>
							</div>
						</div>
						<div class="span4">
							<div class="block-fluid without-head">
								<div class="row-form clearfix">
									<div class="span4">Keluhan</div>
									<div class="span8"><textarea type="textarea" name="content" id="content" class="inp_ticket"></textarea></div>
								</div>
								<div class="row-form clearfix">
									<div class="span4">Solusi</div>
									<div class="span8">
									<?php echo form_textarea('solusi','','id="solusi" class="solusi"');?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn" id="btnsaveticket">Simpan</button>
					<button type="button" data-dismiss="modal" class="btn" id="btnupdateticket" myid="">Update</button>
					<button type="button" data-dismiss="modal" class="btn" id="btntroubleshoot" myid="">Troubleshoot</button>
					<button type="button" class="btn btn-primary btnclose" id="btnclose">Close Ticket</button>
				</div>
			</div>
		</div>
	</div>
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo $imagepath;?>logo.png" alt="Padinet" title="Padinet"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu',$path);?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">App</a> <span class="divider">></span></li>
                <li><a href="#">Tickets</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
			<input type='hidden' name='createuser' value='<?php echo $this->ionuser->username;?>' id='createuser' class="inp_ticket"/>
			<input type='hidden' name='user_id' value='<?php echo $this->ionuser->id;?>' id='user_id' class="inp_ticket"/>
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Tickets</h1>
						<ul class="buttons">
							<li>
                                <a href="#" class="isw-settings"></a>
                                <ul class="dd-list">
                                    <li><a href="<?php echo base_url();?>index.php/tickets/index/open"><span class="isw-time"></span> Open Ticket</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/tickets/index/closed"><span class="isw-ok"></span> Closed Ticket</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/tickets/index/all"><span class="isw-list"></span> All Ticket</a></li>
                                </ul>
							</li>
							<li><span class="isw-zoom" id="btnsearch"></span></li>
							<li><span class="isw-plus" id="btnaddticket"></span></li>
						</ul>
					</div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table tickettable" id='tbl_ticket'>
                            <thead>
                                <tr>
									<th width="5">Kode</th>
                                    <th width="20%">Nama</th>
                                    <th width="15%">Ticket Start</th>
                                    <th width="15%">Ticket End</th>
                                    <th width="5%">Status</th>
                                    <th width="20%">Durasi</th>
                                    <th width="15%">Penyebab</th>
                                    <th width="5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
								<?php
									$today = date("Y-m-d H:i:s");
									if($obj->ticketstart!='0000-00-00 00:00:00'){
										$ticketend = ($obj->ticketend!='0000-00-00 00:00:00')?$obj->ticketend:"-";
										$ticketstart = $obj->ticketstart;
										$durationclass="updatable";
									}else
									{
										$downtimestart = "";
										$downtimeend = "";
										$durationclass="";
									}
//									$diff = Common::differenceInTimes($downtimestart,$downtimeend);
								?>
                                <tr thisid='<?php echo $obj->id;?>'>
									<td class="updatable" fieldName="kdticket"><?php echo $obj->kdticket;?></td>
                                    <td class='clientname pointer'><?php echo $obj->clientname;?></td>
                                    <td><span class="tohuman downtimestart"><?php echo $ticketstart;?></span></td>
                                    <td class="updatable" fieldName="ticketend"><?php echo $ticketend;?></td>
                                    <td class="updatable" fieldName="status"><?php echo ($obj->status=="0")?"Open":"Closed";?></td>
                                    <td class="tbl_duration <?php echo $durationclass?>" fieldName="duration"></td>
                                    <td><?php echo $obj->cause;?></td>
                                    <td class="tbl_action editticket" requestid="<?php echo $obj->id;?>">
										<div class="btn-group">
                                        <button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-left">
                                            <li class='btnviewticket pointer'><a>View</a></li>
                                            <li class='btntroubleshoot pointer'><a>Troubleshoot</a></li>
                                            <?php if ($obj->status=='0'){?>
                                            <li class='btnfollowup pointer'><a>Follow Up Ticket</a></li>
                                            <?php }?>
                                            <li class="divider"></li>
                                            <li class='btnremoveticket pointer'><a>Hapus</a></li>
                                        </ul>
										</div>
									</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <span id='total_router'></span>
            </div>
            <div class="dr"><span></span></div>
        </div>
    </div>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/tickets.js'></script>
</body>
</html>
