<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/padilibs/autocomplete/cosmetics.css" />
    <?php $this->load->view("v2/commons/head");?>
    <script type="text/javascript" src="/js/padilibs/padi.autocomplete.js"></script>
    <script type="text/javascript" src="/js/jqueryui.1.10.4/jquery.ui.autocomplete.js"></script>
    <script type="text/javascript" src="/js/jqueryui.1.10.4/jquery.ui.datepicker.js"></script>
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
                <li><a href="/pmaintenanceschedules/index">Jadwal Maintenance</a> <span class="divider">></span></li>
                <li class="active">Index</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1><?php echo $formlabel;?></h1>
                        <ul class="buttons">
                            <li><a id="btnsavebts" class="isw-save"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span3">BTS:</div>
                            <div class="span6"><input type="text" id="txtbts" /></div>
                            <div class="span3"><input type="hidden" id="txtidbts" /></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Periode:</div>
                            <div class="span9">
                                <?php echo form_dropdown("periods",$periods,0,"id='periode_type'");?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Deskripsi:</div>
                            <div class="span9">
                                <textarea id="txtdescription"></textarea>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Tanggal Maintenance:</div>
                            <div class="span5">
                                <input type="text" id="maintenance_date" class="dtpicker" value="<?php echo $mdatetime;?>" />
                            </div>
                            <div class="span2">
                                <?php echo form_dropdown("maintenance_hour",$maintenance_hour,$mhour,'id="maintenance_hour"');?>
                            </div>
                            <div class="span2">
                                <?php echo form_dropdown("maintenance_minute",$maintenance_minute,$mminute,'id="maintenance_minute"');?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Berbayar:</div>
                            <div class="span9">
                                <select id="ispayable">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>            
            <div class="dr"><span></span></div>
        </div>
    </div>   
    <script type="text/javascript" src="/js/v2/maintenanceschedules/addbts.js"></script>
</body>
</html>
