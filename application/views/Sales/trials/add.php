<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" href="<?php echo base_url();?>css/jqui.1.10.4.css">
<?php $this->load->view('adm/head')?>
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

    <div id="dWarning" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Tanggal Survey harus diisi.</p>
        </div>
    </div>

			<div id="dAddPIC" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myPICModalLabel">Penambahan PIC</h3>
				</div>
				<div class="modal-body">
					<div class='row-fluid'>
						<div class="span12">
							<div class="without-head">
									<div class="span4">Nama:</div>
									<div class="span8">
										<input type='text' class='addpic' name='addpic' id='addpic' />
									</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnSavePIC">Simpan</button>
					<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
				</div>
			</div>

    <div class="header" id="myheader" user_id="<?php echo $this->ionuser->id;?>" username="<?php echo $this->session->userdata['username'];?>">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET Internal App" title="DB Teknis -  PT PadiNET Surabaya"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
	<?php $this->load->view('adm/menu',$path);?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Trial</a> <span class="divider">></span></li>
                <li class="active">Add</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" id="workplace">
			<input type='hidden' name='createuser' value='<?php echo $this->ionuser->username;?>' class='inp_trial' />
			<input type='hidden' name='prevtrial' id="prevtrial" value='<?php echo "prevtrial : " . $prevtrial;?>' class='inp_trial' />
			<div class="block-fluid without-head">
				<div class="toolbar clearfix">
					<div class="left">
						<div class="span6">Penambahan Trial</div>
					</div>
					<div class="right">
						<div class="btn-group">
							<button class='btn btn-small btn-warning tip' title='Simpan' id='trial_save'  value='<?php echo $obj->id;?>'><span class="icon-ok icon-white"></span> Simpan</button>
						</div>
					</div>
				</div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Data Pelanggan</h4>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Jenis Trial</div>
                            <div class="span9">
								<?php echo form_dropdown('trialtype',array("2"=>"Pilihlah","1"=>"Baru (Instalasi)","0"=>"Lama (Upgrade)"),1,'id="trialtype" type="selectid" class="inp_trial"');?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<select name="client_site_id" id="client_site_id" type="selectid" class="inp_trial">
								<?php foreach($client_sites as $x=>$y){
									echo '<option value="'.$x.'">'.$y.'</option>';
								}?>
								</select>
								<?php //echo form_dropdown('client_site_id',$client_sites,1,'id="client_site_id" type="selectid" class="inp_trial"');?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Produk</div>
                            <div class="span9">
								<?php
								//echo form_input('service','','placeholder="Layanan yang dikehendaki" class="inp_trial" type="text"');
								echo form_dropdown("product",array("Pilihlah","Enterprise","IIX","LocalLoop","Business","SmartValue"),0,"id=product");
								?>
							</div>
                        </div>
                        <div class="row-form clearfix" id="smartvalue">
                            <div class="span3">Value</div>
                            <div class="span9">
								<?php
								echo form_dropdown("smartvalue",array("Pilihlah","Upto 512 Kbps","Upto 768 Kbps","Upto 1 Mbps","Upto 2 Mbps","Upto 3 Mbps","Upto 4 Mbps"),0,"id=smartvalue");
								?>
							</div>
                        </div>
                        <div class="row-form clearfix" id="business">
                            <div class="span3">Value</div>
                            <div class="span9">
								<?php
								echo form_dropdown("business",array("Pilihlah","Upto 2 Mbps","Upto 4 Mbps","Upto 6 Mbps","Upto 8 Mbps"),0,"id=business");
								?>
							</div>
                        </div>
                        <div class="row-form clearfix" id="enterprise">
                            <div class="span3">Value</div>
                            <div class="span6">
								<?php
								echo form_input("ipenterprise0","","id=ipenterprise0 class='spinner pspinner' style='width:50px'");
								echo form_input("ipenterprise1","","id=ipenterprise1 class='spinner pspinner' style='width:50px'");
								echo form_input("ipenterprise2","","id=ipenterprise2 class='spinner pspinner' style='width:50px'");
								echo form_input("ipenterprise3","","id=ipenterprise3 class='spinner pspinner' style='width:50px'");
								?>
							</div>
                            <div class="span3">
								<?php
								echo form_input("apenterprise0","","id=apenterprise0 class='spinner pspinner' style='width:50px'");
								echo form_input("apenterprise1","","id=apenterprise1 class='spinner pspinner' style='width:50px'") . "Mbps";
								?>
							</div>
                        </div>
                        <div class="row-form clearfix" id="iix">
                            <div class="span3">Value</div>
                            <div class="span6">
								<?php
								echo form_input("ipiix0","","id=ipiix0 class='spinner pspinner' style='width:50px'");
								echo form_input("ipiix1","","id=ipiix1 class='spinner pspinner' style='width:50px'");
								echo form_input("ipiix2","","id=ipiix2 class='spinner pspinner' style='width:50px'");
								echo form_input("ipiix3","","id=ipiix3 class='spinner pspinner' style='width:50px'");
								?>
							</div>
                            <div class="span3">
								<?php
								echo form_input("apiix0","","id=apiix0 class='spinner pspinner' style='width:50px'");
								echo form_input("ipiix1","","id=apiix1 class='spinner pspinner' style='width:50px'") . " Mbps";
								?>
							</div>
                        </div>
                        <div class="row-form clearfix" id="localloop">
                            <div class="span3">Value</div>
                            <div class="span6">
								<?php
								echo form_input("iplocalloop0","","id=iplocalloop0 class='spinner pspinner' style='width:50px'");
								echo form_input("iplocalloop1","","id=iplocalloop1 class='spinner pspinner' style='width:50px'");
								echo form_input("iplocalloop2","","id=iplocalloop2 class='spinner pspinner' style='width:50px'");
								echo form_input("iplocalloop3","","id=iplocalloop3 class='spinner pspinner' style='width:50px'");
								?>
							</div>
                            <div class="span3">
								<?php
								echo form_input("aplocalloop0","","id=aplocalloop0 class='spinner pspinner' style='width:50px'");
								echo form_input("aplocalloop1","","id=aplocalloop1 class='spinner pspinner' style='width:50px'")."Mbps";
								?>
							</div>
                        </div>
                    </div>
                </div>
                <div class="span6 clearfix">
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Tanggal</h4>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Start Date</div>
                            <div class="span5"><input type="text" name="startdate" id="startdate" class="datepicker inp_trial" type="datepicker" /></div>
                            <div class="span2"><?php echo form_dropdown('starthour',$hours,0,'parent="startdate" class="dttime"');?></div>
                            <div class="span2"><?php echo form_dropdown('startminute',$minutes,0,'grandparent="startdate" class="dttime"');?></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">End Date</div>
                            <div class="span5"><input type="text" name="enddate" id="enddate" class="datepicker inp_trial" type="datepicker" /></div>
                            <div class="span2"><?php echo form_dropdown('endhour',$hours,0,'parent="enddate" class="dttime"');?></div>
                            <div class="span2"><?php echo form_dropdown('endminute',$minutes,0,'grandparent="enddate" class="dttime"');?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Sales/trials/add.js'></script>

</body>
</html>
