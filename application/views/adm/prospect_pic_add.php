<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/prospect_pic_add.js"></script>
<body>
    <?php $this->load->view('adm/header');?>
	<?php $this->load->view('adm/menu',$path);?>    
        
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
                        <div class="isw-user"></div>
                        <h1>Form Penambahan PIC</h1>
   						<ul class="buttons">
							<li><span class="isw-right" id="insertpic"></span></li>
						</ul>
                    </div>
                    <div class="block-fluid">                        
                        
                        <div class="row-form clearfix">
                            <div class="span5">Nama:</div>
                            <div class="span7">
								<input type="text" id="name">
                            </div>
                        </div>                                            

                        <div class="row-form clearfix">
                            <div class="span5">Posisi:</div>
                            <div class="span7">
								<?php echo form_dropdown("picposition",$positions,"","id='picposition'");?>
                            </div>
                        </div>                         
                        
                        <div class="row-form clearfix">
                            <div class="span5">Email:</div>
                            <div class="span7">
								<input type="text" id="email">
                            </div>
                        </div>           
                        
                        <div class="row-form clearfix">
                            <div class="span5">HP:</div>
                            <div class="span7">
								<input type="text" id="handphone">
                            </div>
                        </div> 
                        
                    </div>
                </div>

                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-users"></div>
                        <h1>Daftar PIC</h1>
   						<ul class="buttons">
							<li><span class="isw-right" id="btnnextdata"></span></li>
						</ul>
                    </div>
                    <div class="block-fluid">                        
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tblpics">
                            <thead>
                                <tr>                                    
                                    <th width="25%">Name</th>
                                    <th width="25%">Posisi</th>
                                    <th width="25%">E-mail</th>
                                    <th width="25%">Phone</th>                                    
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($pics as $pic){?>
                                <tr>                                    
                                    <th width="25%"><?php echo $pic->name;?></th>
                                    <th width="25%"><?php echo $pic->position;?></th>
                                    <th width="25%"><?php echo $pic->email;?></th>
                                    <th width="25%"><?php echo $pic->hp;?></th>                      
                                </tr>
                                <?php }?>
							</tbody>
						</thead>
                    </div>
                </div>                
                
            </div>

        
        </div>
        
    </div>   
    
</body>
</html>
