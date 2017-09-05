<!DOCTYPE html>
<html lang="en">
	<style type="text/css">
		.shorttext{
			width: 20px;
		}
		.widemodal{
			width: 800px; 
		}
		#myModal {
			width: 900px !important;
			margin-left: -450px;
			/*margin: 0 0 0 -350px !important;*/
		}
		#dEditTicket{
			z-index: 2000;
			}
	</style>
<?php $this->load->view('adm/head');?>
<script type='text/javascript' src='<?php echo base_url();?>js/jschr/bootstrap-modal.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/jschr/bootstrap-modalmanager.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/tickets.js'></script>
<body>
    

	<!-- start of Edit ticket -->
    <div id="dEditTicket" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Edit Ticket</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
                <div class="span12">
					<div class="row-form clearfix">
						<div class="span6">Start Down</div>
						<div class="span6"><input type="text" id="ticketstart" class="datetimepickers"></div>
					</div>
					<div class="row-form clearfix">
						<div class="span6">End Down</div>
						<div class="span6"><input type="text" id="ticketend" class="datetimepickers"></div>
					</div>
					<div class="row-form clearfix">
						<div class="span6">Durasi</div>
						<div class="span6"><label id="timetotal" ></label></div>
					</div>
                </div>
			</div>
        </div>
        <div class="modal-footer">
			<button type="button" data-dismiss="modal" class="btn">Tutup</button>
			<button type="button" class="btn btn-primary">Simpan</button>
		</div>
    </div>      

	
	<!-- end of Edit ticket -->
	
	
	
	<!-- Modal -->
	<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
		  <div class="modal-content">
			 <div class="modal-header">
				<button type="button" class="close" 
				   data-dismiss="modal" aria-hidden="true">
					  &times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
				   Penambahan Request
				</h4>
			 </div>
			 <div class="modal-body">
				<div class="row-fluid">
					<div class="span6">
						<div class="block-fluid withoutt-head">


							<div class="row-form clearfix">
								<div class="span4">Jenis</div>
								<div class="span8">
									<select name="requesttype" id="requesttype">
										<option value="backbone">Backbone</option>
										<option value="datacenter">Data Center</option>
										<option value="bts">BTS</option>
										<option value="pelanggan">Pelanggan</option>
									</select>
								</div>
							</div>

							<div class="row-form clearfix">
								<div class="span4">Nama</div>
								<div class="span8">
									<select name="clientname" id="clientname">
									<option></option>
									</select>
								</div>
							</div>

							<div class="row-form clearfix">
								<div class="span4">Layanan</div>
								<div class="span8">
								
									<select name="service" id="service">
										<option></option>
									</select>

								</div>
							</div>

							<div class="row-form clearfix">
								<div class="span4">Lokasi</div>
								<div class="span8">
									<select id="location" name="location">
										<option></option>
									</select>
								</div>
							</div>

							<div class="row-form clearfix">
								<div class="span4">Nama</div>
								<div class="span8"><input type="text" id="name" name=="name" /></div>
							</div>

							<div class="row-form clearfix">
								<div class="span6">Penyebab</div>
								<div class="span12">
								<?php echo form_dropdown('cause',$ticketcauses,0,'id="cause" class="cause"');?>
								</div>
							</div>

						</div>
						
					</div>

					<div class="span6">
						<div class="block-fluid without-head">
							<div class="row-form clearfix">
								<div class="span4">Mulai Request</div>
								<div class="span8"><input type="text" id="requeststart" name="requeststart" class="datetimepickers" /></div>
							</div>

							<div class="row-form clearfix">
								<div class="span4">Keluhan/Request</div>
								<div class="span8"><textarea name="content" id="content"></textarea></div>
							</div>

							<div class="row-form clearfix">
								
								<div class="span4"><button type="button" class="btn btn-primary" id="btn-ticket">Edit Ticket</button></div>
								<div class="span8"><label id="resumeticket"></label></div>
							</div>
							<div class="row-form clearfix">
								<div class="span4">Solusi</div>
								<div class="span8">
								<?php echo form_textarea('solusi','','id="solusi" class="cause"');?>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			 </div>
			 <div class="modal-footer">
				<!-- button dropdown start -->
				<div class="btn-group">
					<button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Tutup dan simpan <span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="#" id="request_selesai">Request Selesai</a></li>
						<li><a href="#" id="request_belum_selesai">Request Belum selesai</a></li>
					</ul>
				</div>          
				<!-- button dropdown end -->                                   
			 </div>
		  </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

		
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
			<?php $this->load->view('adm/buttons');?>
        </div>
        

        <div class="workplace">
            <!-- to use -->
            <div class="row-fluid">
                
                <div class="span12">                    

                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Tickets</h1>
						<ul class="buttons">
						<li><span class="isw-plus" id="addticket"></span></li>
						</ul>
					</div>
			
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table tickettable" id="tSortable">
                            <thead>
                                <tr>
                                    <th width="35%">Nama</th>
                                    <th width="20%">Start</th>
                                    <th width="20%">End</th>
                                    <th width="20%">Durasi</th>
                                    <th width="5%">Aksi</th>                                    
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
								<?php
								$today = date("Y-m-d H:i:s");
								if($obj->ticketstart<>null){
								$diff = ($obj->requestend!=null)?Common::differenceInTimes($obj->ticketstart,$obj->requestend):Common::differenceInTimes($obj->tickestart,$today);	
								}else{
									$diff = ($obj->requestend!=null)?Common::differenceInTimes($obj->ticketstart,$obj->requestend):Common::differenceInTimes($obj->tickestart,$today);	
								}
								?>
                                <tr>
                                    <td><?php echo $obj->clientname;?></td>
                                    <td><?php echo $obj->requeststart;?></td>
                                    <td><?php echo $obj->requestend;?></td>
                                    <td class="tbl_duration"><?php 
                                    echo $diff->d . ' Hari ' . $diff->h . ' Jam ' . $diff->i . ' menit '; 
                                    ?></td>
                                    <td class="tbl_action editticket"><a class='icon-pencil'></a></td>                                    
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
