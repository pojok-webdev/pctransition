<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<?php 
$data = array(
'csspath' => $csspath,
'jspath' => $jspath,
'imagepath' => $imagepath,
);
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/maintenance_add.js'></script>
	
<body>

    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Data telah tersimpan.</p>
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

    
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>

	<?php $this->load->view('adm/menu',$path);?>
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">App</a> <span class="divider">></span></li>
                <li><a href="#">Maintenance</a> <span class="divider">></span></li>
                <li class="active">Add</li>
            </ul>
			<!-- start of buttons -->
            <?php $this->load->view('adm/buttons');?>
            <!-- end of buttons -->
        </div>
        <div class="workplace" username="<?php echo $this->session->userdata['username'];?>" id="workplace">


            <div class="row-fluid">                
                <div class="span12">
                    <div class="block-fluid without-head">
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                </div>                                
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-small btn-warning tip" title="Quick save" id='maintenance_add_save' ><span class="icon-ok icon-white"></span></button>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
            
            <div class="row-fluid">                
                <div class="span6">
                    <div class="block-fluid without-head">
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                </div>                                
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                </div>
                            </div>
                        </div>
                        <!-- tempat form -->


                        <div class="row-form clearfix">
                            <div class="span3">Jenis</div>
                            <div class="span9">
								<select name='maintenance_type' id='maintenance_type'>
									<option value='backbone'>Backbone</option>
									<option value='datacenter'>Data Center</option>
									<option value='bts'>BTS</option>
									<option value='pelanggan'>Pelanggan</option>
								</select>
                            </div>
                        </div>


                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo form_dropdown('nameofmtype',array(),1,'id="nameofmtype"');?>
							</div>
                        </div>

                        
                        <div class="row-form clearfix">
                            <div class="span3">Tgl Maintenance</div>
                            <div class="span9"><input type="text" name="maintenance_date" value="<?php echo (!is_null($obj->maintenance_date))?Common::longsql_to_human_date($obj->maintenance_date):'';?>" class="datepicker" id='maintenance_date' /></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Ada durasi downtime</div>
                            <div class="span9">
                            <?php echo form_dropdown('downtime_exist',array('0'=>'Tidak','1'=>'Ya'),'1','id="downtime_exist" class="maintenances"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix" id="downtimedetil">
                            <div class="span3">Awal Estimasi downtime</div>
                            <div class="span3">
								<input type="text" id="rs" name="ticketstart" class="inp_ticket datetimepickers dttime  datepicker texttohuman" />
							</div>
							<div class="span3">
                            <?php echo form_dropdown('hour',$hours,'0','id="hour" class="maintenances"');?>
							</div>
							<div class="span3">                            
                            <?php echo form_dropdown('minute',$minutes,'0','id="minute" class="maintenances"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix" id="downtimedetil">
                            <div class="span3">Akhir Estimasi downtime</div>
                            <div class="span3">
								<input type="text" id="rs" name="ticketstart" class="inp_ticket datetimepickers dttime  datepicker texttohuman" />
							</div>
							<div class="span3">
                            <?php echo form_dropdown('hour',$hours,'0','id="hour" class="maintenances"');?>
							</div>
							<div class="span3">                            
                            <?php echo form_dropdown('minute',$minutes,'0','id="minute" class="maintenances"');?>
                            </div>
                        </div>

                        <div class="row-form clearfix" id="downtimedetil">
                            <div class="span3">Awal Real downtime</div>
                            <div class="span3">
								<input type="text" id="rs" name="ticketstart" class="inp_ticket datetimepickers dttime  datepicker texttohuman" />
							</div>
							<div class="span3">
                            <?php echo form_dropdown('hour',$hours,'0','id="hour" class="maintenances"');?>
							</div>
							<div class="span3">                            
                            <?php echo form_dropdown('minute',$minutes,'0','id="minute" class="maintenances"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix" id="downtimedetil">
                            <div class="span3">Akhir Real downtime</div>
                            <div class="span3">
								<input type="text" id="rs" name="ticketstart" class="inp_ticket datetimepickers dttime  datepicker texttohuman" />
							</div>
							<div class="span3">
                            <?php echo form_dropdown('hour',$hours,'0','id="hour" class="maintenances"');?>
							</div>
							<div class="span3">                            
                            <?php echo form_dropdown('minute',$minutes,'0','id="minute" class="maintenances"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Berbayar ?</div>
                            <div class="span9">
                            <?php echo form_dropdown('is_payable',array('0'=>'Tidak','1'=>'Ya'),'1','id="is_payable" class="maintenances"');?>
                            </div>
                        </div>

                        
						<!-- end of tempat form -->
                    </div>                    
                </div>
                <div class="span6">
                    <div class="block-fluid without-head">
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                </div>                                
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                </div>
                            </div>
                        </div>
                        <!-- tempat form -->


                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9"><textarea name="description" id="description"><?php echo $obj->description?></textarea></div>
                        </div>

                        
						<!-- end of tempat form -->
                    </div>                    
                </div>

            </div>            
            
            <div class="row-fluid">
                <div class="span6">


                </div>
                
                <div class="span6">

                <!-- begin of kolom kanan -->
                <!-- end of kolom kanan -->
                </div>

<!-- batas bawah -->                
            </div>            
            
            
            
        </div>
        <!-- </form> -->
    </div>   
    
</body>
</html>
