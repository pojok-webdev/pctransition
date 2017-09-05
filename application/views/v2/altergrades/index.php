<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("v2/commons/head");?>
    <?php $this->load->view("v2/commons/jquery");?>
    <?php $this->load->view("v2/commons/plugins");?>
</head>
<body>
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiApp" title="PadiApp - Perubahan Layanan"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="/">PadiApp</a>
                <span class="divider">></span></li>     
                <li><a href="/altergrades">Perubahan Layanan</a> <span class="divider">></span></li>
                <li class="active">Index</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1><?php echo $tablelabel;?></h1>
                        <ul class="buttons tipl" title="Tekan untuk perubahan layanan">
                            <li><a class="isw-plus"></a>
                                <ul class="dd-list">
                                    <li><a href="/paltergrades/add"><span class="isw-plus"></span> Baru</a></li>
                                    <li><a href="/paltergrades/upgrade"><span class="isw-up_circle"></span> Lama (Upgrade)</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="ttrials">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th width="25%">AM</th>
                                    <th width="25%">Produk</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($objs as $obj){?>
                                <tr>
                                    <td><?php echo $obj->name;?></td>
                                    <td><?php echo $obj->am;?></td>
                                    <td><?php echo $obj->product;?></td>                  
                                    <td>
                                        <div class="btn-group">                                        
                                            <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Action 
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="/paltergrades/edit/<?php echo $obj->id;?>">Edit</a></li>
                                                <li class="divider"></li>
                                                <li><a class="btnremovetrial">Hapus</a></li>
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
            <div class="dr"><span></span></div>
        </div>
    </div>
    <script type="text/javascript" src="/js/v2/trials/index.js"></script>
</body>
</html>
