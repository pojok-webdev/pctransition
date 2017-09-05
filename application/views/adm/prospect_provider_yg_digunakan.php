<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/prospect_provider_yg_digunakan.js"></script>
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
                        <div class="isw-empty_document"></div>
                        <h1>Data Provider Existing</h1>
                    </div>
                    <div class="block-fluid">                        
                        
                        <div class="row-form clearfix">
                            <div class="span5">Media:</div>
                            <div class="span7">
								<?php echo form_dropdown('media',$medias,'','id="media"');?>
                            </div>
                        </div>                                            

                        <div class="row-form clearfix">
                            <div class="span5">Kecepatan:</div>
                            <div class="span7">
								<?php echo form_dropdown("speed",$speeds,"","id='speed'");?>
                            </div>
                        </div>                         
                        
                        <div class="row-form clearfix">
                            <div class="span5">Durasi Penggunaan Per Hari:</div>
                            <div class="span7">
								<?php echo form_dropdown("duration",$durations,"","id='duration'");?>
                            </div>
                        </div>           
                        
                        <div class="row-form clearfix">
                            <div class="span5">Periode Penggunaan:</div>
                            <div class="span7">
								<?php echo form_dropdown("usage_period",$usage_periods,"","id='usage_period'");?>
                            </div>
                        </div> 
                        
                        <div class="row-form clearfix">
                            <div class="span5">Jumlah PC Pengguna Internet:</div>
                            <div class="span7">
								<?php echo form_dropdown("internet_user",$internet_users,"","id='internet_user'");?>
                            </div>
                        </div> 

                    </div>
                </div>

                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-empty_document"></div>
                        <h1>Data Provider Existing</h1>
   						<ul class="buttons">
							<li><span class="isw-right" id="btnnextdata"></span></li>
						</ul>
                    </div>
                    <div class="block-fluid">

                        <div class="row-form clearfix">
                            <div class="span5">Aplikasi yg Digunakan:</div>
                            <div class="span7">
								<?php echo form_dropdown('application',$applications,'','id="application" multiple="multiple"');?>

                            </div>
                        </div> 


                        <div class="row-form clearfix">
                            <div class="span5">Aplikasi Lainnya:</div>
                            <div class="span7">
								<input type="text" id="media">
                            </div>
                        </div>                                            

                        <div class="row-form clearfix">
                            <div class="span5">Biaya Internet:</div>
                            <div class="span7">
								<?php echo form_dropdown("internet_fee",$internet_fees,"","id='internet_fee'");?>
                            </div>
                        </div>                         
                        
                        <div class="row-form clearfix">
                            <div class="span5">ISP/Operator yang digunakan:</div>
                            <div class="span7">
								<?php echo form_dropdown("operator",$operators,"","id='operator'");?>
                            </div>
                        </div>           
                        
                        <div class="row-form clearfix">
                            <div class="span5">Tanggal Kontrak Berakhir:</div>
                            <div class="span7">
								<input type="text" id="end_date" class="datepicker">
                            </div>
                        </div> 
                        
                        <div class="row-form clearfix">
                            <div class="span5">Problem yg pernah dialami:</div>
                            <div class="span7">
								<?php echo form_dropdown("problem",$problems,"","id='problem'");?>
                            </div>
                        </div> 


                    </div>
                </div>                
                
            </div>

        
        </div>
        
    </div>   
    
</body>
</html>
