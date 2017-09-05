<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    
    <?php $this->load->view('adm/header');?>    
    <?php $this->load->view('adm/menu');?>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/troubleshoot.js'></script>
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Maintenance -- Database Teknis</a> <span class="divider">></span></li>                
                <li class="active">Tables</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        
        <div class="workplace">
            <!-- to use -->
            <div class="row-fluid">

                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Troubleshoot</h1>
                        <ul class="buttons">
                            <li><a href="#" class="isw-plus" id="permintaantroubleshoot"></a></li>                                                        
                        </ul>                        
                        
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
                            <thead>
                                <tr>
                                    <th width="25%">Name</th>
                                    <th width="25%">Type</th>
                                    <th width="20%">Alamat</th>
                                    <th width="25%">E-mail/Phone</th>
                                    <th width="5%"><span class='icon-th'></span></th>                                    
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
								<?php switch($obj->troubleshoottype){
									//case datacenter:
									//
								}?>
                                <tr>
                                    <td><?php echo $obj->clientname;?></td>
                                    <td><?php echo $obj->requesttype;?></td>
                                    <td><?php echo $obj->address;?></td>
                                    <td><?php echo $obj->reporter . ',  ' . $obj->reporterphone;?></td>
                                    <td class="text-center"><a href='<?php echo base_url();?>troubleshoots/report/<?php echo $obj->id;?>' class='icon-file'></a></td>                                 
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
