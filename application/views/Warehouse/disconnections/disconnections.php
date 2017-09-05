<?php 
$data = array(
'csspath' => $csspath,
'jspath' => $jspath,
'imagepath' => $imagepath,
);
?><!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
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
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>                
                <li class="active">Disconnection</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        
        <div class="workplace">
            <!-- to use -->
            <div class="row-fluid">
                
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Disconnection</h1>
                        
                        <ul class="buttons">
                            <li>
                                <a href="#"><span class="isw-settings"></span> </a>
                                <ul class="dd-list">
                                    <li id="reactivation"><a href="#"><span class="isw-right"></span> Reaktivasi</a></li>
                                    <li id="temporer"><a href="#"><span class="isw-right"></span> Temporer</a></li>
                                    <li id="isolir"><a href="#"><span class="isw-right"></span> Isolir</a></li>
                                    <li id="permanent"><a href="#"><span class="isw-right"></span> Permanen</a></li>
                                    <li id="all"><a href="#"><span class="isw-right"></span> Semua</a></li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tClient">
                            <thead>
                                <tr>
                                    <th width='20%'>Nama</th>
                                    <th width='16%'>Jenis Pemutusan</th>
                                    <th width="20%">Alamat</th>
                                    <th width="20%">PIC</th>
                                    <th width="20%">Hingga</th>
                                    <th width="4%">Aksi</th>                                    
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
								<?php switch($obj->disconnectiontype){
									case '0':
									$dt='Reaktifasi';
									break;
									case '1':
									$dt='Isolir';
									break;
									case '2':
									$dt='Temporer';
									break;
									case '3':
									$dt='Permanen';
									break;
									
								}?>
                                <tr myid='<?php echo $obj->id;?>'>
                                    <td><?php echo $obj->client_site->client->name;?></td>
                                    <td><?php echo $dt;?></td>
                                    <td><?php echo $obj->client_site->client->address;?></td>
                                    <td><?php echo $obj->createuser;?></td>
                                    <td><?php echo $obj->finishdate;?></td>
                                    <td>
										<div class="btn-group">
											<button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span></button>
											<ul class="dropdown-menu pull-right">
												<li class="btneditdisconnection" resume="1"><a class="pointer">Edit</a></li>
											</ul>
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
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Warehouse/disconnections.js'></script>    
</body>
</html>
