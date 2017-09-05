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
            <p>Tanggal  harus diisi.</p>
        </div>
    </div>      

    <div id="dAddRouter" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Router</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span6">
					<div class="block-fluid without-head">

						<div class="row-form clearfix">
							<div class="span3">Pemilik</div>
							<div class="span9">
								<?php echo form_dropdown("pemilik_router",array("1"=>"PadiNET","0"=>"Pelanggan"),0,'id="pemilik_router" class="routerx"');?>
							</div>
						</div>
					
						<div class="row-form clearfix" id="router_pelanggan">
							<div class="span3">Tipe</div>
							<div class="span9">
								<?php echo form_input("tipe","",'id="tipe_router_pelanggan" class="routerx"');?>
							</div>
						</div>

						<div class="row-form clearfix" id="router_padinet">
							<div class="span3">Tipe</div>
							<div class="span9">
								<?php echo form_dropdown("tipe",$routers,0,'id="tipe_router" class="router"');?>
							</div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">MacBoard</div>
							<div class="span9"><input type="text" name="macboard" id="macboard_router" class="router" value=""/></div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">IP Public</div>
							<div class="span9"><input type="text" name="ip_public" id="ip_public_router" class="router" value=""/></div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">IP Private</div>
							<div class="span9"><input type="text" name="ip_private" id="ip_private_router" class="router" value=""/></div>
						</div>
			
					</div>
				</div>
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">User</div>
							<div class="span9"><input type="text" name="user" id="user_router" class="router" value=""/></div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Password</div>
							<div class="span9"><input type="text" name="password" id="password_router" class="router" value=""/></div>
						</div>

						<div class="row-form clearfix">
							<div class="span3">Location</div>
							<div class="span9"><input type="text" name="location" id="location_router" class="router" value=""/></div>
						</div>								
						<div class="footer">
							<button class="btn closemodal saverouter" type="button" id='saverouter'>Simpan</button>
							<button class="btn closemodal updaterouter" type="button" id='updaterouter'>Update</button>
							<button class="btn closemodal" type="button">Tutup</button>
						</div>
				
					</div>
				</div>
			</div>
			
        </div>
    </div>      
    
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET App" title="PadiNET App"/></a>
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
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" username="<?php echo $this->session->userdata['username'];?>" id="workplace">
            <div class="row-fluid">                
                <div class="span12">
                    <div class="block-fluid without-head">
                        <div class="toolbar clearfix">
                            <div class="left">
								ID Ticket : <span id='ticketid'><?php echo $ticketid;?></span>
                                <div class="btn-group">
									
                                </div>                                
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-small tip" title="Simpan" id='troubleshoot_save' ><span class="icon-ok icon-white"></span> Simpan</button>
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
								<select name='maintenance_type' id='maintenance_type' class="troubleshoot" type="select">
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
								<?php echo form_dropdown('nameofmtype',array(),1,'id="nameofmtype" class="troubleshoot" type="select"');?>
							</div>
                        </div>

                        
                        <div class="row-form clearfix">
                            <div class="span3">Tgl Troubleshoot</div>
                            <div class="span3"><input type="text" name="troubleshoot_date" value="<?php echo (!is_null($obj->troubleshoot_date))?Common::longsql_to_human_date($obj->troubleshoot_date):'';?>" class="datepicker troubleshoot" id='troubleshoot_date' /></div>
							<div class="span3">
                            <?php echo form_dropdown('hour',$hours,'0','id="hour" parent="troubleshoot_date" class="dttime"');?>
							</div>
							<div class="span3">                            
                            <?php echo form_dropdown('minute',$minutes,'0','id="minute" grandparent="troubleshoot_date" class="dttime"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Butuh Surat Ijin</div>
                            <div class="span9">
                            <?php echo form_dropdown('surat_ijin',array('0'=>'Tidak','1'=>'Ya'),'1','id="surat_ijin" class="troubleshoot" type="selectid"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix" id="downtimedetil">
                            <div class="span3">Rentang Waktu</div>
                            <div class="span3">
								<input type="text" id="request_date1" name="request_date1" class="datetimepickers dttime  datepicker texttohuman troubleshoot" />
							</div>
							<div class="span2">
                            <?php echo form_dropdown('hour',$hours,'0','id="hour" parent="request_date1" class="dttime"');?>
							</div>
							<div class="span2">                            
                            <?php echo form_dropdown('minute',$minutes,'0','id="minute" grandparent="request_date1" class="dttime"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix" id="downtimedetil">
                            <div class="span3">s/d</div>
                            <div class="span3">
								<input type="text" id="request_date2" name="request_date2" class="datetimepickers dttime  datepicker texttohuman troubleshoot" />
							</div>
							<div class="span2">
                            <?php echo form_dropdown('hour',$hours,'0','id="hour" parent="request_date2" class="dttime"');?>
							</div>
							<div class="span2">                            
                            <?php echo form_dropdown('minute',$minutes,'0','id="minute" grandparent="request_date2" class="dttime"');?>
                            </div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Berbayar ?</div>
                            <div class="span9">
                            <?php echo form_dropdown('is_payable',array('0'=>'Tidak','1'=>'Ya'),'1','id="is_payable" class="troubleshoot" type="selectid"');?>
                            </div>
                        </div>

                    </div>                    
                </div>
                <div class="span6">
                    <div class="block-fluid row-fluid without-head">
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

                        <div class="row-form clearfix">
                            <div class="span3">Lokasi</div>
                            <div class="span9">
								<?php echo $obj->location;?>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9">
								<textarea name="description" id="description" class="troubleshoot textarea"><?php echo $obj->description?></textarea>
							</div>
                        </div>

                    </div>                    
                </div>

            </div>            
            
    
            
<!-- tambahan -->
            <div class="row-fluid">
                <div class="span6">
                    <div class="block-fluid row-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Router</h4>
                        </div>                         
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" id="btnAddRouter" title="Hide"><span class="icon-plus-sign icon-white"></span> Penambahan Router</button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images" id="tblRouter">
                            <thead>
                                <tr>
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Image</th>
                                    <th>Name</th>
                                    <th width="60">Size</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>                                              
                            </tbody>
                        </table>                    


                    </div>
                    <div class="block-fluid row-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Material</h4>
                        </div>                         
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-plus-sign icon-white"></span> Penambahan Material</button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images">
                            <thead>
                                <tr>
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Image</th>
                                    <th>Name</th>
                                    <th width="60">Size</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>                                              
                            </tbody>
                        </table>                    

                    </div>                                        
                    <div class="block-fluid row-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>PC Card</h4>
                        </div>                         
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-plus-sign icon-white"></span> Penambahan PC Card</button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images">
                            <thead>
                                <tr>
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Image</th>
                                    <th>Name</th>
                                    <th width="60">Size</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>                                              
                            </tbody>
                        </table>                    

                    </div>                                        
                </div>
                
                <div class="span6">
                    <div class="block-fluid row-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>AP</h4>
                        </div>                         
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-plus-sign icon-white"></span> Penambahan AP</button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images">
                            <thead>
                                <tr>
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Image</th>
                                    <th>Name</th>
                                    <th width="60">Size</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>                                              
                            </tbody>
                        </table>                    

                    </div>
                    <div class="block-fluid row-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Antenna</h4>
                        </div>                         
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-plus-sign icon-white"></span> Penambahan Antenna</button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images">
                            <thead>
                                <tr>
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Image</th>
                                    <th>Name</th>
                                    <th width="60">Size</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>                                              
                            </tbody>
                        </table>                    

                    </div>                                        
                    <div class="block-fluid row-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Gambar</h4>
                        </div>                         
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-warning tip" title="Hide"><span class="icon-plus-sign icon-white"></span> Penambahan Gambar</button>
                                </div>                                
                            </div>                        
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="table images">
                            <thead>
                                <tr>
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Image</th>
                                    <th>Name</th>
                                    <th width="60">Size</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>                                              
                            </tbody>
                        </table>                    

                    </div>                                        
                </div>
                
            </div>            
<!-- end of tambahan-->
        </div>
        <!-- </form> -->
    </div>   
    <script src='<?php echo base_url();?>js/aquarius/troubleshoot_add.js'></script>
</body>
</html>
