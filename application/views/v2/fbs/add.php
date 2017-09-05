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
                <li><a href="/pfbses/index">FB</a> <span class="divider">></span></li>
                <li class="active">Add</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
            <div class="span12">
                <input type="hidden" id="client_id" value="<?php echo '';?>" />
                <div class="head clearfix">
                    <div class="isw-users"></div>
                    <h1><?php echo $formlabel . " (" .$clientname . ")";?></h1>
                    <ul class="buttons">
                        <li><a id="btnsaveclient" class="isw-ok"></a>
                        </li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="block-fluid without-head">
                            <div class="row-form clearfix">
                                <div class="span3">No FB:</div>
                                <div class="span6"><label><?php echo "";?></label></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Periode:</div>
                                <div class="span9">
                                    <?php echo form_dropdown("periodetype",array(),0);?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Deskripsi:</div>
                                <div class="span9">
                                    <textarea id="txtdescription"><?php echo "";?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="block-fluid without-head">
                            <div class="row-form clearfix">
                                <div class="span3">Tanggal Maintenance:</div>
                                <div class="span5">
                                    <input type="text" id="maintenance_date" class="dtpicker" value="<?php echo "";?>" />
                                </div>
                                <div class="span2">
                                    <?php echo form_dropdown("maintenance_hour",array(),0,'id="maintenance_hour"');?>
                                </div>
                                <div class="span2">
                                    <?php echo form_dropdown("maintenance_minute",array(),0,'id="maintenance_minute"');?>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Berbayar:</div>
                                <div class="span9">
                                    <?php echo form_dropdown("ispayable",array(),0);?>
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
                                        <?php foreach(array() as $off){?>
                                        <tr myid="<?php echo $off->id;?>">
                                            <td><?php echo "";?></td>
                                            <td><?php echo "";?></td>
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
                                        <tr><th>Nama</th><th>Tanggal</th><th>Aksi</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach(array() as $com){?>
                                        <tr myid="<?php echo $com->id;?>">
                                            <td><?php echo $com->name;?></td>
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
                                    <textarea id="txtdistribution"><?php echo "";?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="dr"><span></span></div>
        </div>
    </div>
    <script type="text/javascript" src="/js/v2/maintenances/edit.js"></script>
</body>
</html>
