<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/teknis.css"/>
	<?php $this->load->view('adm/head');?>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.timeagopuji.js"></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/radu.js'></script>
	<body>
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
	<!-- end of Pencarian -->

	<div class="modal hide fade" id="expmodal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" 
					   data-dismiss="modal" aria-hidden="true">
						  &times;
					</button>
					<h4 id="modaltitle">Penambahan Request</h4>
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
										<select name="clientname" id="clientname" class="inp_ticket" type='select'>
										<option></option>
										</select>
									</div>
								</div>
						<!-- tampilkan jika ada lebih dari 1-->
						<div class="row-form clearfix">
							<div class="span4">Lokasi</div>
							<div class="span8">
								<input id="location" type='text' name="location" class="inp_ticket" />
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span4">Pelapor</div>
							<div class="span8"><input type="text" id="name" name="reporter" class="inp_ticket" /></div>
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
									<div class="span8"><textarea name="content" id="content" class="inp_ticket"></textarea></div>
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
					<button type="button" class="btn btn-primary btnclose">Tutup</button>
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
                <li><a href="#">DB_Teknis</a> <span class="divider">></span></li>                
                <li><a href="#">Survey</a> <span class="divider">></span></li>                
                <li class="active">Daftar_Permintaan</li>
            </ul>
        </div>
        <div class="workplace">
            <!-- to use -->
            <div class="row-fluid">
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Tickets</h1>
						<ul class="buttons">
							<li><span class="isw-zoom" id="btnsearch"></span></li>
						</ul>
						</div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table tickettable" id='tbl_ticket'>
                            <thead>
                                <tr>
                                    <th width="35%">Nama</th>
                                    <th width="15%">Ticket Start</th>
                                    <th width="15%">Ticket End</th>
                                    <th width="15%">Durasi</th>
                                    <th width="15%">Penyebab</th>
                                    <th width="5%">Aksi</th>                                    
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
								<?php
									$today = date("Y-m-d H:i:s");
									if($obj->ticketstart!='0000-00-00 00:00:00'){
										$downtimeend = ($obj->ticketend!='0000-00-00 00:00:00')?$obj->ticketend:$today;
										//$downtimestart = Common::longsqldt_to_human_date($obj->downtimestart);
										$downtimestart = $obj->ticketstart;
									}else
									{
										$downtimestart = "";
										$downtimeend = "";
									}
									$diff = Common::differenceInTimes($downtimestart,$downtimeend);
								?>
                                <tr thisid='<?php echo $obj->id;?>'>
                                    <td><?php echo $obj->clientname;?></td>
                                    <td><span class="tohuman downtimestart"><?php echo $downtimestart;?></span></td>
                                    <td><span class="tohuman downtimeend"><?php echo $downtimeend;?></span></td>
                                    <td class="tbl_duration"><span class="vartime" title="<?php echo $downtimestart?>"><?php 
                                    //echo $diff->d . ' Hari ' . $diff->h . ' Jam ' . $diff->i . ' menit '; 
                                    if($downtimestart==""){
										echo "";
									}else{
										echo Common::humanizetime($diff);
									}
                                    ?></span>
                                    </td>
                                    <td><?php echo $obj->cause;?></td>
                                    <td class="tbl_action editticket" requestid="<?php echo $obj->id;?>">
										<div class="btn-group">
											<button class="btn btneditticket" type="button" >Edit</button>
											<button class="btn btnremoveticket" type="button" >Hapus</button>
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
            <!-- to use -->   
            <div class="dr"><span></span></div>            
        </div>        
    </div>   
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/ticketnew.js'></script>
</body>
</html>
