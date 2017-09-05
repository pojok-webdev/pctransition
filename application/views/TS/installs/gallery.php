<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('adm/head');?>
<body>
    
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
	<?php $this->load->view('adm/menu');?>        
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Simple Admin</a> <span class="divider">></span></li>                
                <li class="active">Gallery</li>
            </ul>
        </div>
        
        <div class="workplace">                        
            
            
            <div class="row-fluid">

                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-picture"></div>
                        <h1>Highly customizable</h1>
                    </div>
                    <div class="block thumbs clearfix">                                    

                        <div class="thumbnail">
                            <a class="fancybox" rel="group" href="img/example_full.jpg">
								<img src="<?php echo $obj->img;?>" class="img-polaroid"/></a>
                            <div class="caption">
                                <h3><?php echo $obj->name;?></h3>
                                <p><?php echo $obj->description;?></p>
                                <p><a class="btn btn-warning" href="<?php echo base_url();?>install_requests/install_edit/<?php echo $obj->install_site_id;?>">Kembali</a></p>
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
