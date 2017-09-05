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
                <li><a href="/paltergrades/index">Perubahan Layanan</a> <span class="divider">></span></li>
                <li class="active">Penambahan</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <input type="hidden" id="myid" value="<?php echo $obj->id;?>" />
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1><?php echo $formlabel;?></h1>
                        <ul class="buttons">
                            <?php if($has_authority){?>
                            <li class="tipb" title="Untuk masa trial lebih dari 3 hari, diperlukan approval dari manager">
                                <a id="btnapprove" class="isw-thumb_up tipb" title="Untuk masa trial lebih dari 3 hari, diperlukan approval dari manager"></a>
                            </li>
                            <?php }?>
                            <li>
                                <a id="btnsave" class="isw-ok" title="simpan upgrade"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span3">Nama Pelanggan:</div>
                            <div class="span6"><input type="text" id="txtclient"  title="Nama pelanggan autocomplete dengan minimal 2 huruf pertama" placeholder="Nama Pelanggan" class="tipb" value="<?php echo $obj->name;?>"/></div>
                            <div class="span3"><input type="text" id="client_site_id" value="<?php echo $obj->client_site_id;?>" style="display:none"/></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Produk:</div>
                            <div class="span9">
                                <?php echo form_dropdown("product",$products,$obj->product,"id='product'");?>
                            </div>
                        </div>
                        <div class="row-form clearfix" id="dsmartvalue">
                            <div class="span3">Value Smart Value:</div>
                            <div class="span2">
                                <?php echo form_dropdown("smartvalue",$smartvalue,$obj->integer_part,"id='smartvalue'");?>

                            </div>
                        </div>
                        <div class="row-form clearfix" id="dbusiness">
                            <div class="span3">Value Business:</div>
                            <div class="span2">
                                <?php echo form_dropdown("business",$business,$obj->integer_part,"id='business'");?>
                            </div>
                        </div>
                        <div class="row-form clearfix" id="denterprise">
                            <div class="span3">Value Entrprise:</div>
                            <div class="span2">Up (Mbps):</div>
                            <div class="span1">
                                <input type="text" id="integer_part_enterprise_up" value="<?php echo $obj->integer_part;?>" class="tipb" title="angka depan koma (Up Speed dalam Mbps)">
                            </div>
                            <div class="span1">
                                <input type="text" id="fraction_part_enterprise_up" value="<?php echo $obj->fraction_part;?>" class="tipb" title="angka belakang koma (Up Speed dalam Mbps)">
                            </div>
                            <div class="span2 align-right">Down (Mbps):</div>
                            <div class="span1">
                                <input type="text" id="integer_part_enterprise_down" value="<?php echo $obj->integer_part_down;?>" class="tipb" title="angka depan koma (Down Speed dalam Mbps)">
                            </div>
                            <div class="span1">
                                <input type="text" id="fraction_part_enterprise_down" value="<?php echo $obj->fraction_part_down;?>" class="tipb" title="angka belakang koma (Down Speed dalam Mbps)">
                            </div>

                        </div>
                        <div class="row-form clearfix" id="diix">
                            <div class="span3">Value IIX:</div>
                            <div class="span2">Up (Mbps):</div>
                            <div class="span1">
                                <input type="text" id="integer_part_iix_up" value="<?php echo $obj->integer_part;?>" class="tipb" title="angka depan koma (Up Speed dalam Mbps)">
                            </div>
                            <div class="span1">
                                <input type="text" id="fraction_part_iix_up" value="<?php echo $obj->fraction_part;?>" class="tipb" title="angka belakang koma (Up Speed dalam Mbps)">
                            </div>
                            <div class="span2 align-right">Down (Mbps):</div>
                            <div class="span1">
                                <input type="text" id="integer_part_iix_down" value="<?php echo $obj->integer_part_down;?>" class="tipb" title="angka depan koma (Down Speed dalam Mbps)">
                            </div>
                            <div class="span1">
                                <input type="text" id="fraction_part_iix_down" value="<?php echo $obj->fraction_part_down;?>" class="tipb" title="angka belakang koma (Down Speed dalam Mbps)">
                            </div>
                        </div>
                        <div class="row-form clearfix" id="dlocalloop">
                            <div class="span3">Value Local Loop:</div>
                            <div class="span2">
                                <input type="text" id="integer_part" value="0" class="tipb" title="angka depan koma (Speed dalam Mbps, simetris)">
                            </div>
                            <div class="span2">
                                <input type="text" id="fraction_part" value="0" class="tipb" title="angka belakang koma (Speed dalam Mbps, simetris)">
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Start:</div>
                            <div class="span3"><input type="text" id="startdate" class="dtpicker" value="<?php echo date("d/m/Y");?>"/></div>
                            <div class="span3">
                                <?php echo form_dropdown("starthour",$hours,0,"id='starthour'");?>
                            </div>
                            <div class="span3">
                                    <?php echo form_dropdown("startminute",$minutes,0,"id='startminute'");?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">End:</div>
                            <div class="span3"><input type="text" id="enddate" class="dtpicker" value="<?php echo  date("d/m/Y",mktime(0, 0, 0, date("m"),   date("d")+3,   date("Y")))?>" _val="<?php echo  date("d/m/Y",mktime(0, 0, 0, date("m"),   date("d")+3,   date("Y")))?>"/></div>
                            <div class="span3">
                                    <?php echo form_dropdown("endhour",$hours,0,"id='endhour'");?>
                            </div>
                            <div class="span3">
                                    <?php echo form_dropdown("endminute",$minutes,0,"id='endminute'");?>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>            
            <div class="dr"><span></span></div>
        </div>
    </div>   
    <script type="text/javascript" src="/js/v2/altergrades/edit.js"></script>
</body>
</html>
