<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/padilibs/autocomplete/cosmetics.css" />
    <?php $this->load->view("v2/commons/head");?>
    <script type="text/javascript" src="/js/padilibs/padi.autocomplete.js"></script>
    <script type="text/javascript" src="/js/jqueryui.1.10.4/jquery.ui.autocomplete.js"></script>
</head>
<body>
    <div class="header">
        <a class="logo" href="index.html">
            <img src="/img/aquarius/logo.png" alt="padiApp" title="padiApp"/>
        </a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="/">Home</a> <span class="divider">></span></li>
                <li><a href="/ptrials/index">Trial</a> <span class="divider">></span></li>
                <li class="active">Follow up</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <input id="trialsid" value="<?php echo $obj->id;?>" type="hidden" />
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1><?php echo $formlabel;?></h1>
                        <ul class="buttons">
                            <li>
                                <a id="btnsave" class="isw-ok"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span3">Pelanggan:</div>
                            <div class="span6">
                                <?php echo $obj->name;?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Produk:</div>
                            <div class="span9">
                                <?php echo $obj->product;?>
                            </div>
                        </div>
                        <div class="row-form clearfix" id="dbusiness">
                            <div class="span3">Tindakan:</div>
                            <div class="span2">
                                <?php echo form_dropdown("trialtype",$trialtype,$obj->rawstatus,"id=action");?>
                            </div>
                        </div>
                        <div class="row-form clearfix" id="divextend">
                            <div class="span3">Extend Hingga:</div>
                            <div class="span3"><input type="text" id="startdate" class="dtpicker" value="<?php echo $obj->startdate;?>"/></div>
                            <div class="span3">
                                <?php echo form_dropdown("starthour",$hours,$obj->starthour,"id='starthour'");?>
                            </div>
                            <div class="span3">
                                    <?php echo form_dropdown("startminute",$minutes,$obj->startminute,"id='startminute'");?>
                            </div>
                        </div>
                        <div class="row-form clearfix" id="divextendreason">
                            <div class="span3">Alasan Extend:</div>
                            <div class="span3">
                                <?php echo form_dropdown("extendreason",$extendreasons,$reason,"id='extendreason'");?>
                            </div>
                            <div class="span3"><input type="text" id="otherreason" value="Alasan lain"/></div>
                        </div>
                        <div class="row-form clearfix" id="divncancel">
                            <div class="span3">Alasan Cancel:</div>
                            <div class="span3">
                                <?php echo form_dropdown("ncancelreason",$ncancelreason,$reason,"id='ncancelreason'");?>
                            </div>
                            <div class="span3"><input type="text" id="otherncancelreason" value="<?php echo $obj->reason;?>"/></div>
                        </div>
                        <div class="row-form clearfix" id="divxcancel">
                            <div class="span3">Alasan Cancel:</div>
                            <div class="span6">
                                <?php echo form_dropdown("xcancelreason",$xcancelreason,0,"id='xcancelreason'");?>
                            </div>
                            <div class="span3"><input type="text" id="otherxcancelreason" value="Alasan lain"/></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dr"><span></span></div>
        </div>
    </div>
    <script type="text/javascript" src="/js/v2/trials/followup.js"></script>
</body>
</html>
