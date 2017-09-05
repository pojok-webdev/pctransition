<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type="text/javascript" src="<?php echo base_url()?>js/aquarius/prospect_add.js"></script>
<body>
    <?php $this->load->view('adm/header');?>
	<?php $this->load->view('adm/menu',$path);?>    
        
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>    
                <li><a href="#">Prospect</a> <span class="divider">></span></li>            
                <li class="active">Add</li>
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
                            <div class="span3">Nama:</div>
                            <div class="span9"><input type="text" placeholder="Nama Calon Klien" id="name" /></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Jenis Bisnis:</div>
                            <div class="span4">
                            <?php echo form_dropdown("businesstype",$businesstypes,"","id='businesstype'");?>
                            </div>
                            <div class="span4"><input type="text" placeholder="Nama Bisnis" id="otherbusinesstype" /></div>
                        </div>                         

                        <div class="row-form clearfix">
                            <div class="span3">Alamat:</div>
                            <div class="span9"><input type="text" placeholder="Alamat Calon Klien" id="address"/></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Kota:</div>
                            <div class="span9"><input type="text" placeholder="Kota Calon Klien" id="city"/></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Telp:</div>
                            <div class="span2"><input type="text" id="phone_area"></div>
                            <div class="span6"><input type="text" placeholder="Telp Calon Klien" id="phone"/></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Fax:</div>
                            <div class="span2"><input type="text" id="fax_area"></div>
                            <div class="span6"><input type="text" placeholder="Fax Calon Klien" id="fax"/></div>
                        </div> 
                        
                    </div>
                </div>
                
            </div>
            
            <div class="dr"><span></span></div>
            
        
        </div>
        
    </div>   
    
</body>
</html>
