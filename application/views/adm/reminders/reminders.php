<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
	<div id="dAddReminder" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Penambahan Reminder</h3>
		</div>
		<div class="modal-body">
			<div class='row-fluid'>
				<div class="span6">
					<div class="without-head">
						<div class="row-form clearfix">
							<div class="span4">Period:</div>
							<div class="span12">
								<span id="clientedit"></span>
								<?php echo form_dropdown('period',$periods,0,'id="period" class="inp_reminder" type="selectid"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span4" id="perioddetaillabel">Detail Period:</div>
							<div class="span12">
								<span id="clientedit"></span>
								<?php echo form_dropdown('perioddetail',array(),0,'id="perioddetail" class="inp_reminder" type="selectid"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span4">Recipient:</div>
							<div class="span12">
								<span></span>
								<input type="text" id="recipient" name="recipient" class="inp_reminder"/>
							</div>
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="without-head">
						<div class="row-form clearfix">
							<div class="span4">Subject:</div>
							<div class="span12">
								<span></span>
								<input type="text" id="subject" name="subject" class="inp_reminder"/>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span4">Content:</div>
							<div class="span12">
								<span></span>
								<textarea id="remindercontent" name="content" class="inp_reminder" type="textarea"></textarea>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span2">Expired:</div>
							<div class="span4">
								<input type='text' class='datepicker inp_reminder' name='expiredate' id='expiredate' />
							</div>
							<div class='span3'>
								<?php echo form_dropdown('expireHour',$hours,0,'id="expireHour" class="dttime" parent="expiredate"');?>
							</div>
							<div class='span3'>
								<?php echo form_dropdown('expireMinute',$minutes,0,'id="expireMinute" class="dttime" grandparent="expiredate"');?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnAddReminderUpdate">Update</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnAddReminderSave">Simpan</button>
		</div>
	</div>
	<div id="dConfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Konfirmasi</h3>
		</div>
		<div class="modal-body">
			<div class='row-fluid'>
				<div class="span12">
					<div class="without-head">
						Data telah tersimpan
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
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
                <li><a href="#">PadiNET APP</a> <span class="divider">></span></li>
                <li class="active">Pelanggan</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
			<input type='hidden' name='username' value='<?php echo $this->ionuser->username;?>' />
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Reminder</h1>
                        <ul class="buttons">
                            <li id="btnAddReminder">
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
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tReminder">
                            <thead>
                                <tr>
                                    <th width='24%'>Period</th>
                                    <th width="24%">Recipient</th>
                                    <th width="24%">Subject</th>
                                    <th width="24%">Status</th>
                                    <th width="4%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
								<?php
									switch($obj->period){
										case '1':
										$period = 'Hourly, menit ke :' . $obj->perioddetail ;
										break;
										case '2':
										$period = 'Daily, jam ke :' . $obj->perioddetail;
										break;
										case '3':
										$period = 'Weekly';
										switch($obj->perioddetail){
											case '1':
											$period .= ' (Minggu)';
											break;
											case '2':
											$period .= ' (Senin)';
											break;
											case '3':
											$period .= ' (Selasa)';
											break;
											case '4':
											$period .= ' (Rabu)';
											break;
											case '5':
											$period .= ' (Kamis)';
											break;
											case '6':
											$period .= ' (Jumat)';
											break;
											case '7':
											$period .= ' (Sabtu)';
											break;
										}
										break;
										case '4':
										$period = 'Monthly, Bulan ke : '  . $obj->perioddetail;
										break;
										case '5':
										$period = 'Yearly, ';
										break;
									}
								?>
                                <tr myid='<?php echo $obj->id;?>'>
                                    <td class="tperiod"><?php echo $period;?></td>
                                    <td class="trecipient"><?php echo $obj->recipient;?></td>
                                    <td class="tsubject"><?php echo $obj->subject;?></td>
                                    <td class="active"><?php echo ($obj->active=="1")?"Aktif":"Non Aktif"; ?></td>
                                    <td>
										<div class="btn-group">
											<button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span></button>
											<ul class="dropdown-menu pull-right">
												<li class="btneditreminder"><a href="#">Edit</a></li>
												<li class="btntogglereminder pointer"><a><?php echo ($obj->active=="1")?"Jadikan Non Aktif":"Jadikan Aktif"?></a></li>
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
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/adm/reminders.js'></script>
</body>
</html>
