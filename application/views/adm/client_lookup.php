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
        <a class="logo" href="index.html"><img src="<?php echo $imagepath;?>logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
    <?php $this->load->view('adm/menu',$data);?>
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Db Teknis</a> <span class="divider">></span></li>                
                <li>Adm <span class="divider">></span></li>
                <li class="active">Pilih Pelanggan</li>
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
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkall"/></th>
                                    <th width="25%">Name</th>
                                    <th width="25%">PIC</th>
                                    <th width="45%">E-mail/Phone</th>
                                    <th width="5%"><span class='icon-edit'></span></th>                                    
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><?php echo $obj->client->name;?></td>
                                    <td><?php echo $obj->client->address;?></td>
                                    <td><?php echo $obj->client->phone_area . ' - ' . $obj->client->phone;?></td>
                                    <td><a href='<?php echo base_url();?>index.php/<?php echo $return_page . $obj->client->id;?>' class='icon-wrench' title='Install'></a></td>                                    
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
