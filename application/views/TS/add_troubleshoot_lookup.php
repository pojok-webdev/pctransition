<?php 
$data = array(
'csspath' => $csspath,
'jspath' => $jspath,
'imagepath' => $imagepath,
);
?><!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/surveys.js'></script>
<body>
    
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo $imagepath;?>logo.png" alt="PadiNET App" title="PadiNET App"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
    <?php $this->load->view('adm/menu',$data);?>
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">DB_Teknis</a> <span class="divider">></span></li>                
                <li>Troubleshoot <span class="divider">></span></li>
                <li class="active">Look up</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        

        <div class="workplace">
            <!-- to use -->
            <div class="row-fluid">
                
                <div class="span12">                    

                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Pilih Pelanggan</h1>                               
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tTroubleshoot">
                            <thead>
                                <tr>
                                    <th width="25%">Name</th>
                                    <th width="25%">PIC</th>
                                    <th width="45%">E-mail/Phone</th>
                                    <th width="5%"><span class='icon-edit'></span></th>                                    
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <tr myid='<?php echo $obj->id;?>'>
                                    <td><?php echo $obj->client->name;?></td>
                                    <td><?php echo $obj->client->address;?></td>
                                    <td><?php echo $obj->client->phone_area . ' - ' . $obj->client->phone;?></td>
                                    <td>
										<div class="btn-group">
											<button class="btn btnchoose" type="button" >Pilih</button>
										</div>                                

                                    </td>                                    
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
    <script src='<?php echo base_url();?>js/aquarius/add_troubleshoot_lookup.js'></script>
</body>
</html>
