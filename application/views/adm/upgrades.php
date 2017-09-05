<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/installs.js"></script>
<body>
    
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo $imagepath;?>logo.png" alt="PadiNET App" title="PadiNET App"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
    <?php $this->load->view('adm/menu',$path);?>
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">DB_Teknis</a> <span class="divider">></span></li>
                <li><a href="#">Instalasi</a> <span class="divider">></span></li>
                <li class="active">Daftar</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        
        
		<div class="workplace">
            <!-- to use -->
            <div class="row-fluid">
                
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Installs</h1>
						<?php if(Adm::member_of('sales')){?>
                        <ul class="buttons">
							<li><span class="isw-plus" id="permintaanmainstalasi"></span></li>
                        </ul>
                        <?php } ?>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tInstall">
                            <thead>
                                <tr>
									<th width="15%">Tgl Request</th>
									<th width="15%">Tgl Instalasi</th>
									<th width="15%">Jam Instalasi</th>
									<th width="15%">Nama</th>
                                    <th width="35%%">Alamat</th>
                                    <th width="25%">Tgl Eksekusi</th>
                                    <th width="25%">Jam Eksekusi</th>
                                    <th width="15%">PIC</th>
                                    <th width="50%"><span class="icon-th-large"></span></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <tr>
                                    <td><span class="tohuman"><?php echo $obj->install_request->create_date;?></span></td>
                                    <td><span class="tohumandate"><?php echo $obj->install_request->install_date;?></span></td>
                                    <td><span class="tohumanhourminute"><?php echo $obj->install_request->fix_install_date;?></span></td>
                                    <td><?php echo $obj->install_request->client->name;?></td>
                                    <td><?php echo $obj->install_request->client->address . ' - ' . $obj->install_request->client->city;?></td>
                                    <td><span class="tohumandate"><?php echo $obj->execution_date;?></span></td>
                                    <td><span class="tohumanhourminute"><?php echo $obj->execution_date;?></span></td>
                                    <td><?php echo $obj->pic_name . '(' . $obj->pic_phone_area . ') ' . $obj->pic_phone;?></td>
                                    <td><a href='<?php echo base_url();?>index.php/adm/install_edit/<?php echo $obj->install_request->id;?>' title="Detil Instalasi"><span class="icon-pencil"></span></a></td>
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
