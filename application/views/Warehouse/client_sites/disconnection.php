<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>

    <!-- start of Notifikasi modal -->
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Data telah tersimpan.</p>
        </div>
    </div>
	<!-- end of notifikasi modal -->
   
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiNET Application" title="PadiNET Application"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
<?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">Pelanggan</a> <span class="divider">></span></li>
                <li class="active">Edit Prospect</li>
            </ul>
            
        </div>
        
        <div class="workplace" user_id='<?php echo $obj->id;?>'>
        <input id="clientid" type="hidden" value="<?php echo $this->uri->segment(3);?>" />
        <input id="createuser" type="hidden" value="<?php echo $this->ionuser->username;?>" name="createuser" class="inp_disconnection" />
        <input id="disconnection_id" type="hidden" value="<?php echo $this->uri->segment(3);?>" />
        <input type='hidden' id='disconnectiontype' value='<?php echo $obj->disconnection->disconnectiontype;?>' />
            
		<div class="row-fluid"><div class="span12"><div class="head clearfix">
			<div class="left">
				<h1> <?php echo $obj->client->name;?></h1>
			</div>
			<div class="right">
				<ul class="buttons">
					<li><span class="isw-save" id="btnsave" title="simpan"></span></li>
				</ul>
            </div>                        

		</div>
		</div>
		</div>

            <div class="row-fluid">

                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Edit Pelanggan</h1>
                    </div>

                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span4">Jenis Pemutusan:</div>
                            <div class="span8">
								<?php echo form_dropdown('disconnectiontype',array('0'=>'Pilihlah','1'=>'Isolir','2'=>'Temporer','3'=>'Permanen'),'0','id="disconnectiontype" class="inp_disconnection" type="selectid"');?>
                            </div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span4">Alasan Pemutusan:</div>
                            <div class="span8">
								<textarea id="reason" name="reason" class="inp_disconnection" type="textarea"></textarea>
                            </div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span4">Jangka waktu pemutusan:</div>
                            <div class="span8">
								<?php echo form_dropdown('period',array('1'=>'1 Bulan','2'=>'2 Bulan','3'=>'3 Bulan'),'1','id="period" name="period" class="inp_disconnection" type="selectid"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span4">Hingga tanggal:</div>
                            <div class="span4">
								<?php echo form_input('finishdate','','id="finishdate"  class="inp_disconnection datepicker" type="text"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('hour',$hours,'0','id="day"  parent="finishdate" class="dttime"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('minute',$minutes,'0','id="minute"  grandparent="finishdate" class="dttime"');?>
							</div>
                        </div>
                        

                    </div>
                </div>
                
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Keterangan</h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix" id="executiondatediv">
							<div class="span4">Tgl Penarikan Perangkat</div>
                            <div class="span4">
								<?php echo form_input('executiondate','','id="executiondate"  class="inp_disconnection datepicker" type="text"');?>
							</div>
                            <div class="span2 executiondate">
								<?php echo form_dropdown('executionhour',$hours,'0','id="executionday"  parent="executiondate" class="dttime"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('executionminute',$minutes,'0','id="executionminute"  grandparent="executiondate" class="dttime"');?>
							</div>
							
                        </div>

                        <div class="row-form clearfix" id="makepermanentdiv">
							<button class="btn makePermanent">Jadikan Permanen</button>
							
                        </div>

                        <div class="row-form clearfix" id="disconnectionfeediv">
                            <div class="span4">Biaya:</div>
                            <div class="span8">
								<?php echo form_input('fee','','class="inp_disconnection"');?>
                            </div>
                        </div>
                        
                    </div>
                </div>                
                
			</div>
			<div class="row-fluid">

                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-cloud"></div>
                        <h1>Operator</h1>
                        <ul class="buttons">        
                            <li class="toggle active"><a href="#"></a></li>
                        </ul>                                                 
                    </div>
                
                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Operator</h4>
                        </div>
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip btn_addoperator" title="Tambah Operator"><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn_addapwifi">Penambahan Operator</button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table ap_wifi" id="ap_wifi">
                            <thead>
                                <tr>
                                    <th width="30%">Nama</th>
                                    <th width="30%">Lokasi</th>
                                    <th width="10%"><span class="icon-th-large"></span></th>                                
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($obj->disconnection->disconnection_operator as $operator){?>
                                <tr>
                                    <td><?php echo $operator->username;?></td>
                                    <td><?php echo $operator->username;?></td>
                                    <td>
										<a><span class="icon-trash row_remove remove_operator pointer" operator_id="<?php echo $operator->id; ?>" ></span></a>
										<a><span class="icon-edit update_operator pointer" id="<?php echo $operator->id; ?>" ></span></a>
									</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>                            
                            <div class="right">
								Total : <span id='total_wifi'><?php echo $obj->disconnection->disconnection_operator->count();?></span>
                            </div>                        
                        </div>                    

                    </div>


                
                </div>


            </div>
            
        </div>
    </div>   
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/disconnection.js'></script>
</body>
</html>
