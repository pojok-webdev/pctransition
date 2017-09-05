<!DOCTYPE html>
<html lang="en">
	<style type='text/css'>
		.userpic{
			float:left;
			width:60px;
			height:50px;
		}
		.pic{
			width:40px;
			padding-left:auto;
			padding-right:auto;
		}
	</style>
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
        <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
<?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">Pelanggan</a> <span class="divider">></span></li>
                <li><a href="#">Disconnection</a> <span class="divider">></span></li>
                <li class="active">Edit</li>
            </ul>
        </div>
        <div class="workplace" >
        <input id="createuser" type="hidden" value="<?php echo $this->ionuser->username;?>" name="createuser" class="inp_disconnection" />
        <input id="client_id" type="hidden" value="<?php echo $this->uri->segment(3);?>" name="client_id" class="inp_disconnection" />
		<div class="row-fluid"><div class="span12"><div class="head clearfix">
			<div class="block-fluid without-head">
				<div class="toolbar clearfix">
					<div class="left">
					</div>
					<div class="right">
						<div class="btn-group">
							<button class="btn btn-small btn-warning tip disconnection_save"><span class="icon-ok icon-white"></span></button>
							<button class="btn btn-small disconnection_save" type="button">Simpan</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Detail Pemutusan</h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span4">Jenis Pemutusan:</div>
                            <div class="span8">
								<?php echo form_dropdown('disconnectiontype',array('2'=>'Temporer','3'=>'Permanen'),'1','id="disconnectiontype"  class="inp_disconnection" type="selectid"');?>
							</div>
                        </div>
                        <div class="row-form clearfix" id="startdatecontainer">
                            <div class="span4">Mulai tanggal:</div>
                            <div class="span4">
								<?php echo form_input('startdate','','id="startdate"  class="datepicker mandatory inp_disconnection" type="text"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('hour',$hours,'0','parent="startdate" class="dttime"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('minute',$minutes,'0','grandparent="startdate" class="dttime"');?>
							</div>
                        </div>
                        <div class="row-form clearfix" id="finishdatecontainer">
                            <div class="span4">Hingga tanggal:</div>
                            <div class="span4">
								<?php echo form_input('finishdate','','id="finishdate"  class="datepicker mandatory inp_disconnection" type="text"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('hour',$hours,'0','id="day"  parent="finishdate" class="dttime"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('minute',$minutes,'0','id="minute"  grandparent="finishdate" class="dttime"');?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span4">Alasan Pemutusan:</div>
                            <div class="span8">
								<textarea id="reason" name="reason" class="inp_disconnection" type="textarea"></textarea>
                            </div>
                        </div>
                        <div class="row-form clearfix" id="jangkawaktu">
                            <div class="span4">Jangka waktu pemutusan:</div>
                            <div class="span8">
								<?php echo form_dropdown('period',array('1'=>'1 Bulan','2'=>'2 Bulan','3'=>'3 Bulan'),'1','id="period" name="period" class="inp_disconnection" type="selectid"');?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span4">Tanggal Pemutusan:</div>
                            <div class="span4">
								<?php echo form_input('executiondate','','id="executiondate"  class="inp_disconnection datepicker mandatory" type="text"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('hour',$hours,'0','id="day"  parent="executiondate" class="dttime"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('minute',$minutes,'0','id="minute"  grandparent="executiondate" class="dttime"');?>
							</div>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Detail Cabang Pelanggan</h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span3">Nama:</div>
                            <div class="span9">
                            <?php echo $obj->name;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Alamat:</div>
                            <div class="span9">
                            <?php echo $obj->address;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Kota:</div>
                            <div class="span9">
                            <?php echo $obj->city;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Jenis Bisnis:</div>
                            <div class="span9">
                            <?php echo $obj->business_field;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">PIC:</div>
                            <div class="span9">
                            <?php echo $obj->pic->name;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Jabatan PIC:</div>
                            <div class="span9">
                            <?php echo $obj->pic->position;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Phone:</div>
                            <div class="span9">
                            <?php echo $obj->pic->phone_area . ' ' . $obj->pic->telp_hp;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Email PIC:</div>
                            <div class="span9">
                            <?php echo $obj->pic->email;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">AM:</div>
                            <div class="span9">
                            <?php echo $obj->user->username;?>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
        </div>
    </div>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Sales/disconnection_add.js'></script>
</body>
</html>
