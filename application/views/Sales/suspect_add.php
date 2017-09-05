<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type="text/javascript" src="<?php echo base_url()?>js/aquarius/suspect_add.js"></script>
<body>
    <?php $this->load->view('adm/header');?>
	<?php $this->load->view('adm/menu',$path);?>    
        
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>            
                <li><a href="#">Suspect</a> <span class="divider">></span></li>       
                <li class="active">Add</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>                        
            
        </div>
        
        <div class="workplace" user_id='<?php echo $this->ion_auth->get_user_id();?>'>
            <input type="hidden" name="user_id" class="inp_suspect" value="<?php echo $this->ion_auth->get_user_id();?>">
            <input type="hidden" name="sale_id" class="inp_suspect" value="<?php echo $this->ion_auth->get_user_id();?>">
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
                            <div class="span3">Cabang PadiNET:</div>
                            <div class="span9">
								<?php echo form_dropdown('branch_id',$branches,User::get_branchs_by_id($this->ionuser->id),'id="branch_id" class="inp_suspect" type="selectid"');?>
							</div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Nama:</div>
                            <div class="span9"><input type="text" placeholder="Nama Calon Klien, contoh: Wismilak, PT" id="name" name="name" class="inp_suspect"/></div>
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
                            <div class="span9"><input type="text" placeholder="Alamat Calon Klien" id="address" name="address" class="inp_suspect"/></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Kota:</div>
                            <div class="span9"><input type="text" placeholder="Kota Calon Klien, contoh: Surabaya" id="city" name="city" class="inp_suspect"/></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Telp:</div>
                            <div class="span2"><input type="text" placeholder="Kd Area, contoh: 031" id="phone_area" name="phone_area" class="inp_suspect"></div>
                            <div class="span7"><input type="text" placeholder="Telp Calon Klien" id="phone" name="phone" class="inp_suspect"/></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Fax:</div>
                            <div class="span2"><input type="text" placeholder="Kd Area, contoh: 031" id="fax_area" name="fax_area" class="inp_suspect"></div>
                            <div class="span7"><input type="text" placeholder="Fax Calon Klien" id="fax" name="fax" class="inp_suspect"/></div>
                        </div> 
                        
                    </div>
                </div>
                
            </div>
            
            <div class="dr"><span></span></div>
            
        
        </div>
        
    </div>   
    
</body>
</html>
