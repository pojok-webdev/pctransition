<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/prospect_ttg_padinet.js"></script>
 <style>
#sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
#sortable li span { position: absolute; margin-left: -1.3em; }
</style>
<body>
    <?php $this->load->view('adm/header');?>
	<?php $this->load->view('adm/menu',$path);?>    
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
        
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Penambahan PIC</a> <span class="divider">></span></li>                
                <li class="active">Forms stuff</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>                        
            
        </div>
        
        <div class="workplace">
            
            
            <div class="row-fluid">
                
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-pin"></div>
                        <h1>Tentang PadiNET</h1>
                    </div>
                    <div class="block-fluid">                        
                        
                        <div class="row-form clearfix">
                            <div class="span5">Tahu PadiNET ?:</div>
                            <div class="span7">
								<?php echo form_dropdown('known_us',array('1'=>'Ya','0'=>'Tidak'),'','id="known_us"');?>
                            </div>
                        </div>                                            

                        <div class="row-form clearfix">
                            <div class="span5">Tertarik menggunakan layanan PadiNET ?:</div>
                            <div class="span7">
								<?php echo form_dropdown("interested",array('1'=>'Ya','0'=>'Tidak'),"","id='interested'");?>
                            </div>
                        </div>                         
                        
                        <div class="row-form clearfix">
                            <div class="span5">Layanan yg mana ?:</div>
                            <div class="span7">
								<?php echo form_dropdown("service_interested_to",$services,"","id='service_interested_to'");?>
                            </div>
                        </div>           
                        

                    </div>
                </div>

                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-calendar"></div>
                        <h1>Prioritas dan Penjadwalan</h1>
   						<ul class="buttons">
							<li><span class="isw-right" id="btnnextdata"></span></li>
						</ul>
                    </div>
                    <div class="block-fluid">

                        <div class="row-form clearfix">
                            <div class="span5">Urutan Prioritas:</div>
                            <div class="span7">
								<ul id="sortable">
								<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Kualitas Link</li>
								<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Harga</li>
								<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Support Teknis</li>
								</ul>
                            </div>
                        </div> 


                        <div class="row-form clearfix">
                            <div class="span5">Budget:</div>
                            <div class="span7">
								<?php echo form_dropdown("budgets",$budgets,"","id='budgets'");?>
                            </div>
                        </div>                                            

                        <div class="row-form clearfix">
                            <div class="span5">Target Implementasi:</div>
                            <div class="span7">
								<input type="text" id="implementation_target" class="datepicker">
                            </div>
                        </div>                         
                        
                        <div class="row-form clearfix">
                            <div class="span5">Kapan bisa dihubungi lagi ?:</div>
                            <div class="span7">
								<input type="text" id="next_follow_up" class="datepicker">
                            </div>
                        </div>           
                        


                    </div>
                </div>                
                
            </div>

        
        </div>
        
    </div>   
    
</body>
</html>
