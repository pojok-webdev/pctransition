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
                <li><a href="/ptrials/index">Trial</a> <span class="divider">></span></li>
                <li class="active">Approval</li>
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
                            <!--<li>
                                <a id="btnextendapprove" class="isw-ok"></a>
                            </li>
                            <li>
                                <a id="btnrangeapprove" class="isw-ok"></a>
                            </li>-->
                            <li>
                            <a id="<?php echo $btntoshow;?>" class="isw-ok"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span3">Pelanggan:</div>
                            <div class="span9">
                                <label><?php echo $obj->name;?></label>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">AM:</div>
                            <div class="span9">
                                <label><?php echo $obj->am;?></label>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Approval:</div>
                            <div class="span9">
                                <?php $approvalarray=array("1"=>"approve","0"=>"tidak");?>
                                <?php echo form_dropdown("approvalcombo",$approvalarray,"approve","id='approvalcombo'");?>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>            
            <div class="dr"><span></span></div>
        </div>
    </div>   
    <script type="text/javascript" src="/js/v2/trials/approval.js"></script>
</body>
</html>
