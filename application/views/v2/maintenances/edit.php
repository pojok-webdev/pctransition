<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/padilibs/autocomplete/cosmetics.css" />
    <?php $this->load->view("v2/commons/head");?>
    <script type="text/javascript" src="/js/padilibs/padi.autocomplete.js"></script>
    <script type="text/javascript" src="/js/padilibs/padi.dateTimes.js"></script>
    <script type="text/javascript" src="/js/aquarius/radu.js"></script>
    <script type="text/javascript" src="/js/jqueryui.1.10.4/jquery.ui.autocomplete.js"></script>
    <script type="text/javascript" src="/js/jqueryui.1.10.4/jquery.ui.datepicker.js"></script>
    <style>
        #tOfficer tbody tr:hover{
            background:gold;
        }
        #tOfficer tr{
            cursor:pointer;
        }
    </style>
</head>
<body>
    <?php $this->load->view("v2/maintenances/dialogs");?>
    <div class="header">
        <a class="logo" href="index.html"><img src="/img/aquarius/logo.png" alt="padiApp" title="padiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="/">Home</a> <span class="divider">></span></li>
                <li><a href="/pmaintenances/index">Maintenance</a> <span class="divider">></span></li>
                <li class="active">Index</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
            <div class="span12">
                <input type="hidden" id="maintenance_id" value="<?php echo $obj->id;?>" />
                <div class="head clearfix">
                    <div class="isw-users"></div>
                    <h1><?php echo $formlabel . " (" .$obj->maintenance_type . ")";?></h1>
                    <ul class="buttons">
                        <li><a id="btnsaveclient" class="isw-ok"></a>
                        </li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="block-fluid without-head">
                            <div class="row-form clearfix">
                                <div class="span3">Pelanggan:</div>
                                <div class="span6"><label><?php echo $obj->name;?></label></div>
                                <div class="span3"><input type="hidden" id="client_site_id"  value="<?php echo $obj->id;?>"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Periode:</div>
                                <div class="span9">
                                    <?php echo form_dropdown("periodetype",$periods,$obj->period_type);?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Deskripsi:</div>
                                <div class="span9">
                                    <textarea id="txtdescription"><?php echo $obj->description;?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="block-fluid without-head">
                            <div class="row-form clearfix">
                                <div class="span3">Tanggal Maintenance:</div>
                                <div class="span5">
                                    <input type="text" id="maintenance_date" class="dtpicker" value="<?php echo $obj->mdatetime;?>" />
                                </div>
                                <div class="span2">
                                    <?php echo form_dropdown("maintenance_hour",$maintenance_hour,$obj->mhour,'id="maintenance_hour"');?>
                                </div>
                                <div class="span2">
                                    <?php echo form_dropdown("maintenance_minute",$maintenance_minute,$obj->mminute,'id="maintenance_minute"');?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Berbayar:</div>
                                <div class="span9">
                                    <?php echo form_dropdown("ispayable",$ispayable,$obj->ispayable);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="block-fluid without-head">
                            <div class="row-form clearfix">
                                <div class="toolbar nopadding-toolbar clearfix">
                                    <h4>Petugas</h4>
                                </div>
                                <div class="toolbar clearfix paditablehead">
                                    <div class="left">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-small btn-danger tip btn_addofficer" title="Tambah Petugas">
                                                <span class="icon-plus icon-white"></span>
                                            </button>
                                            <button type="button" class="btn btn-small tip btn_addofficer">Penambahan Petugas</button>
                                        </div>
                                    </div>
                                </div>
                                <table class="table" id="tFormOfficer">
                                    <thead>
                                        <tr><th>Nama</th><th>Tanggal</th><th>Aksi</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($officeraddeds as $off){?>
                                        <tr myid="<?php echo $off->id;?>">
                                            <td><?php echo $off->name;?></td>
                                            <td><?php echo $off->createdate;?></td>
                                            <td><span class="icon-trash btnremoveofficer"></span></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="block-fluid without-head">
                            <div class="row-form clearfix">
                                <div class="toolbar nopadding-toolbar clearfix">
                                    <h4>Kompetitor</h4>
                                </div>
                                <div class="toolbar clearfix paditablehead">
                                    <div class="left">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-small btn-danger tip btn_addcompetitor" title="Tambah Kompetitor">
                                                <span class="icon-plus icon-white"></span>
                                            </button>
                                            <button type="button" class="btn btn-small tip btn_addcompetitor">
                                                Penambahan Kompetitor
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <table class="table" id="tFormKompetitor">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Layanan</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($maintenancecompetitors as $com){?>
                                        <tr myid="<?php echo $com->id;?>">
                                            <td><?php echo $com->name;?></td>
                                            <td><?php echo $com->service;?></td>
                                            <td><?php echo $com->description;?></td>
                                            <td><?php echo $com->create_date;?></td>
                                            <td><span class="icon-trash btnremovekompetitor"></span></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="block-fluid without-head">
                            <div class="row-form clearfix">
                                <div class="toolbar nopadding-toolbar clearfix">
                                    <h4>Pembagian Layanan <span id="helppembagianlayanan" title="Pembagian Layanan masing-masing Provider (fungsi dan kapasitas) ">?</span></h4>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Deskripsi:</div>
                                <div class="span9">
                                    <textarea id="txtdistribution"><?php echo $obj->distribution;?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="block-fluid without-head">
                            <div class="row-form clearfix">
                                <div class="toolbar nopadding-toolbar clearfix">
                                    <h4>Upload Dokumen</h4>
                                </div>
                                <div class="toolbar clearfix paditablehead">
                                    <div class="left">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-small btn-danger tip btn_adddocument" title="Tambah Dokumen">
                                                <span class="icon-plus icon-white"></span>
                                            </button>
                                            <button type="button" class="btn btn-small tip btn_adddocument">
                                                Penambahan Dokumen
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <table class="table" id="tDocument">
                                    <thead>
                                        <tr><th>Gbr</th><th>Nama</th><th>Keterangan</th><th>Aksi</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($maintenancedocuments as $com){?>
                                        <tr myid="<?php echo $com->id;?>">
                                            <td><img class="documentimage" width="50"  src="<?php echo $com->image;?>"></td>
                                            <td><?php echo $com->name;?></td>
                                            <td><?php echo $com->description;?></td>
                                            <td><span class="icon-trash btnremovekompetitor"></span></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="dr"><span></span></div>
        </div>
    </div>
    <script type="text/javascript" src="/js/padilibs/padi.imagelib.js"></script>
    <script type="text/javascript" src="/js/v2/maintenances/edit.js"></script>
</body>
</html>
