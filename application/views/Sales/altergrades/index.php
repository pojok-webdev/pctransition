<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/radu.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/altergrades.js'></script>
<link rel='stylesheet' href='<?php echo base_url();?>css/aquarius/altergrades.css' />
    <body>
    <?php $this->load->view('adm/header');?>
    <?php $this->load->view('adm/menu',$path);?>
	<div class="modal hide fade" id="dAddAltergrade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
		  <div class="modal-content">
			 <div class="modal-header">
				<button type="button" class="close"
				   data-dismiss="modal" aria-hidden="true">
					  &times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
				   Penambahan Request Upgrade/Downgrade
				</h4>
			 </div>
			 <div class="modal-body">
				<div class="row-fluid">
					<div class="span6">
						<div class="block-fluid withoutt-head">
							<div class="row-form clearfix">
								<div class="span4">Jenis</div>
								<div class="span8">
									<select name="altertype" id="requesttype" class="inp_request">
										<option value="backbone">Upgrade</option>
										<option value="datacenter">Downgrade</option>
									</select>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span4">Nama</div>
								<div class="span8">
									<input type='text' id='clientname' name='client_site_id' class='typeahead inp_request'>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span4">Layanan</div>
								<div class="span8">
									<select name="serviceafter" id="service" class="inp_request" type='select'>
										<option></option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="block-fluid without-head">
							<div class="row-form clearfix">
								<div class="span4">Tgl Request</div>
								<div class="span8"><input type="text" id="requeststart" name="request_date" class="datepicker inp_request" /></div>
							</div>
							<div class="row-form clearfix">
								<div class="span4">Tgl Aktifasi</div>
								<div class="span8"><input type="text" id="activationdate" name="activation_date" class="datepicker inp_request" /></div>
							</div>
							<div class="row-form clearfix">
								<div class="span4">Tgl Trial</div>
								<div class="span8"><input type="text" id="trialdate" name="trialtime" class="datepicker inp_request" /></div>
							</div>
						</div>
					</div>
				</div>
			 </div>
			 <div class="modal-footer">
				<div class="btn-group">
					<button class="btn btn-warning dropdown-toggle" id="btnsave">Simpan</button>
				</div>
			 </div>
		  </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<div class="modal hide fade" id="dConfirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
		  <div class="modal-content">
			 <div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">
				   Konfirmasi Penghapusan
				</h4>
			 </div>
			 <div class="modal-body">
				<div class="row-fluid">
					<div class="span12">
						<div class="block-fluid withoutt-head">
						Yakin akan menghapus ?
						</div>
					</div>
				</div>
			 </div>
			 <div class="modal-footer">
				<div class="btn-group">
					<button class="btn btn-danger" id="btn_remove">Ya</button>
					<button class="btn btn-default" id="btn_close">Tidak</button>
				</div>
			 </div>
		  </div>
		</div>
	</div>
	<div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Perubahan Layanan</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Perubahan Layanan</h1>
						<ul class="buttons">
						<li><span class="isw-plus" id="addaltergrade"></span></li>
						</ul>
					</div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tAltergrades">
                            <thead>
                                <tr>
									<th width="20%">Tgl Request</th>
									<th width="20%">AM</th>
									<th width="20%">Tgl Penggantian</th>
                                    <th width="20%">Nama</th>
                                    <th width="25%">Alamat</th>
                                    <th width="25%">Tgl Eksekusi</th>
                                    <th width="25%">Jam Eksekusi</th>
                                    <th width="25%">Petugas</th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <tr status='<?php echo $obj->status;?>' obj_id='<?php echo $obj->id;?>'>
									<td><span class="tohuman"><?php echo $obj->createdate;?></span></td>
									<td><span class="tohuman"><?php echo $obj->client_site->client->user->username;?></span></td>
									<td><span class="tohuman"><?php echo $obj->altertime;?></span></td>
                                    <td><?php echo $obj->client_site->client->name;?></td>
                                    <td><?php echo $obj->client_site->client->address;?></td>
                                    <td><span class="tohumandate"><?php echo $obj->executiontime;?></span></td>
                                    <td><span class="tohumanhourminute"><?php echo $obj->executiontime;?></span></td>
                                    <td><?php echo Alterexecutor::get_names_by_altergrade_id($obj->id);?></td>
                                    <td>
										<div class="btn-group">
											<button class="btn btn_edit" type="button" obj_id='<?php echo $obj->id;?>'  <?php echo $this->common->grantElement($obj->client_site->client->user->id,"owner")?> >Edit</button>
											<button class="btn btn-danger btn_remove" type="button"  <?php echo $this->common->grantElement($obj->client_site->client->user->id,"owner")?> >Hapus</button>
										</div>
										<div class="btn-group">
											<button data-toggle="dropdown" class="btn btn-small dropdown-toggle"  <?php echo $this->common->grantElement($obj->client_site->client->user->id,"owner")?> >Aksi <span class="caret"></span></button>
											<ul class="dropdown-menu pull-right">
												<li class="btn_edit"><a href="#">Edit</a></li>
												<li class="divider survey_save"></li>
												<li class="btn_remove"><a href="#">Hapus</a></li>
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
            <!-- to use -->
            <div class="dr"><span></span></div>

        </div>

    </div>

</body>
</html>
