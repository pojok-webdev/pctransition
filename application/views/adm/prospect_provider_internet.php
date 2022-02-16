<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type="text/javascript" src="<?php echo base_url()?>js/aquarius/prospect_subscription_confirmation.js"></script>
<body>
    <?php $this->load->view('adm/header');?>
	<?php $this->load->view('adm/menu',$path);?>    
        
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Penambahan Prospect</a> <span class="divider">></span></li>                
                <li class="active">Forms stuff</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>                        
            
        </div>
        
        <div class="workplace">
            
            <div class="row-fluid">
                
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Data Calon Klien</h1>
   						<ul class="buttons">
							<li><span class="isw-right" id="btnnextdata"></span></li>
						</ul>
                    </div>
                    <div class="block-fluid">                        
                        
                        <div class="row-form clearfix">                            
                            <div class="span3">Apakah sudah menggunakan Internet ?</div>
                            <div class="span9">
                                <p>                                                      
                                    <button class="btn btn-large" type="button" id="answer_yes">Ya</button>
                                    <button class="btn btn-large btn-warning" type="button" id="answer_no">Tidak</button>
                                </p>
                            </div>                            
                        </div>                          

                        
                    </div>
                </div>
                
            </div>
            
            <div class="dr"><span></span></div>
            
        
        </div>
        
    </div>   
    
</body>
</html>
