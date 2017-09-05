<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("v2/commons/head");?>
    <?php $this->load->view("v2/commons/jquery");?>
    <?php $this->load->view("v2/commons/plugins");?>
</head>
<body>
    <div class="header">
        <a class="logo" href="index.html"><img src="img/aquarius/logo.png" alt="PadiApp" title="PadiApp - Biodata"/></a>
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
                <li><a href="/trials">Pelanggan</a> <span class="divider">></span></li>
                <li class="active">Biodata</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1><?php echo $tablelabel;?></h1>
                        <ul class="buttons tipl" title="Tekan untuk penambahan trial">
                            <li><a class="isw-plus"></a>
                                <ul class="dd-list">
                                    <li><a href="/ptrials/add"><span class="isw-plus"></span> Baru</a></li>
                                    <li><a href="/ptrials/upgrade"><span class="isw-up_circle"></span> Lama (Upgrade)</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="ttrials">
                            <thead>
                                <tr>
                                    <th width="25%">Nama</th>
                                    <th width="25%">AM</th>
                                    <th>Tipe</th>
                                    <th width="25%">Start</th>
                                    <th width="25%">End</th>
                                    <th width="25%">Produk</th>
                                    <th width="25%">Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($objs as $obj){?>
                                <tr>
                                    <?php
                                    $ext = ($obj->extendapprove=='1')?"(disetujui)":"(tidak disetujui)";
                                    ?>
                                    <td><?php echo $obj->name . " ".$ext ;?></td>
                                    <td><?php echo $obj->am;?></td>
                                    <td><?php echo $obj->typename;?></td>
                                    <td><?php echo $obj->startdate;?></td>
                                    <td><?php echo $obj->enddate;?></td>
                                    <td><?php echo $obj->product;?></td>                                    
                                    <td class="mytip">
                                        <span title="<?php echo $obj->stdesc;?>" class="tip"><?php echo $obj->status;?></span>
                                    </td>
                                    <td>
                                        <div class="btn-group">                                        
                                            <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Action 
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="/ptrials/edit/<?php echo $obj->id;?>">Edit</a></li>
                                                <li><a href="/ptrials/followup/<?php echo $obj->id;?>">Follow Up</a></li>
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
