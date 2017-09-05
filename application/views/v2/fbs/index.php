<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("v2/commons/head");?>
    <?php $this->load->view("v2/commons/jquery");?>
    <?php $this->load->view("v2/commons/plugins");?>
</head>
<body>
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiApp" title="PadiApp - Maintenance"/></a>
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
                <li><a href="/subscribeforms">FBs</a> <span class="divider">></span></li>
                <li class="active">Detail FB</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1><?php echo $tablelabel;?></h1>
                        <ul class="buttons">
                            <li><a class="isw-plus"></a>
                                <ul class="dd-list">
                                    <li><a href="/pfbses/add/<?php echo $clientid;?>"><span class="isw-documents"></span> Buat FB Baru</a></li>
                                    <li><a href="/pmaintenances/add"><span class="isw-documents"></span> Tampilkan FB valid</a></li>
                                    <li><a href="/pmaintenances/add"><span class="isw-documents"></span> Tampilkan FB Expired</a></li>
                                    <li><a href="/pmaintenances/add"><span class="isw-documents"></span> Tampilkan semua</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tFbs">
                            <thead>
                                <tr>
                                    <th width="25%">Nama</th>
                                    <th width="25%">No FB</th>
                                    <th width="25%">Tipe Bisnis</th>
                                    <th width="25%">Alamat</th>
                                    <th width="25%">SIUP/NPWP</th>
                                    <th width="25%">Layanan</th>
                                    <th width="25%">AM</th>
                                    <th width="25%">Period</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($objs as $obj){?>
                                <tr>
                                    <td><?php echo $obj->name;?></td>
                                    <td class="nofb"><?php echo $obj->ccc;?></td>
                                    <td><?php echo $obj->businesstype;?></td>
                                    <td><?php echo $obj->address;?></td>
                                    <td><?php echo $obj->siup . " " . $obj->npwp;?></td>                                    
                                    <td><?php echo $obj->services;?></td>
                                    <td><?php echo humanize($obj->username);?></td>
                                    <td><?php echo $obj->period1 . "" . $obj->period2;?></td>
                                    <td class="status"><?php echo humanize($obj->fbstatus);?></td>
                                    <td>
                                        <div class="btn-group">                                        
                                            <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">
                                            Action 
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="pointer btnsetvalidfb">Set Valid</a></li>
                                                <li><a class="pointer btnsetignorefb">Set Ignore</a></li>
                                                <li class="divider"></li>
                                                <li><a class="pointer btncancelfb">Set Cancel</a></li>
                                                <li class="divider"></li>
                                                <li><a class="pointer" href="/pfbses/showreport/<?php echo $obj->ccc;?>">Lihat FB</a></li>
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
    <script type="text/javascript" src="/js/v2/fbs/index.js"></script>
</body>
</html>
