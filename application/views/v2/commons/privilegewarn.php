<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("v2/commons/head");?>
    <?php $this->load->view("v2/commons/jquery");?>
    <?php $this->load->view("v2/commons/plugins");?>
</head>
<body>
    <div class="header">
        <a class="logo" href="#"><img src="img/logo.png" alt="Privilege Warning" title="Privilege Warning"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">Survey</a> <span class="divider">></span></li>
                <li class="active">Privilege Warning</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace"> 
            <div class="row-fluid">    
                <div class="span12">
                    <div class="page-header">
                    <h1>Privilege Warning <small></small></h1>
                    </div>
                </div>
            </div>
            <div class="row-fluid">    
                <div class="span12">
                    <div class="block hero-unit">
                        <h1>PadiApp</h1>
                        <p>Anda tidak memiliki wewenang untuk melihat halaman ini. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</body>
</html>
