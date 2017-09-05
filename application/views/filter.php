<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Pelanggan harus dipilih.</p>
        </div>
    </div>
    
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
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Laporan</a> <span class="divider">></span></li>
                <li class="active">Filter</li>
            </ul>
            
        </div>
        
        <div class="workplace" user_id='<?php echo $obj->id;?>'>

            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
						<h1>Filter Laporan</h1>
						<ul class="buttons">
							<li><span class="isw-print btnprint" id="btnprint" title="Print"></span></li>
						</ul>
                    </div>
				</div>
			</div>
            
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Jenis Laporan</h1>
                    </div>
                    <div class="block-fluid">                        
                        <div class="row-form clearfix">
                            <div class="span3">Jenis Laporan:</div>
                            <div class="span9"><?php echo form_dropdown('reporttype',$reports,1,'id="reporttype" class="inp_client" type="selectid"');?></div>
                        </div>

                        <div class="row-form clearfix tickettype">
                            <div class="span3">Jenis Ticket:</div>
                            <div class="span9">
								<?php echo form_dropdown('tickettype',$tickettypes,1,'class="inp_client" id="tickettype" type="selectid"');?>
							</div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3 client_label">Pelanggan:</div>
                            <div class="span9">
								<?php echo form_dropdown('client_id',$clients,1,'class="inp_client" id="client_id" type="selectid"');?>
							</div>
                        </div>
                        

                    </div>
                </div>

                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Aksi</h1>
                    </div>
                    <div class="block-fluid">                        
                        <div class="row-form clearfix">                            
                            <div class="span3">Default</div>
                            <div class="span9">
                                <p>
                                    <button class="btn btnprint" type="button">Cetak Laporan</button>
                                </p>
                            </div>                            
                        </div>              

                        
                    </div>
                </div>                
                
            </div>
            
        
        </div>
        
    </div>   
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/filter.js'></script>
</body>
</html>
