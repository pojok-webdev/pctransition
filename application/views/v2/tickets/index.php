<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("v2/commons/head");?>
    <?php $this->load->view("v2/commons/jquery");?>
    <?php $this->load->view("v2/commons/plugins");?>
    <link rel="stylesheet" type="text/css" href="/css/teknis.css"/>
</head>
<body>
<script>var currenturl = <?=$currenturl?></script>
    <?php $this->load->view("v2/tickets/dialogs");?>
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiApp" title="PadiApp - Tiket"/></a>
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
                <li><a href="/maintenances">Ticket</a> <span class="divider">></span></li>
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
                        <ul class="buttons">
                            <li><a class="isw-settings" id="settings"></a>
                                <ul class="dd-list">
                                    <li><a id="setrowamount"><span class="isw-list"></span> Baris Per Halaman</a></li>
                                    <li><a id="setsearch"><span class="isw-zoom"></span> Pencarian</a></li>
                                </ul>
                            </li>
                            <li><a class="isw-plus"></a>
                                <ul class="dd-list">
                                    <li><a href="/pmaintenances/add"><span class="isw-users"></span> Pelanggan</a></li>
                                    <li><a href="/pmaintenances/add"><span class="isw-cloud"></span> Backbone</a></li>
                                    <li><a href="/pmaintenances/add"><span class="isw-documents"></span> Datacenter</a></li>
                                    <li><a href="/pmaintenances/add"><span class="isw-delete"></span> BTS</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="ttickets">
                            <thead>
                                <tr>
                                    <th width="5%">Kd Ticket</th>
                                    <th width="15%">Nama</th>
                                    <th width="10%">Layanan</th>
                                    <th width="5%">Status</th>
                                    <th >Durasi</th>
                                    <th width="10%">Tgl Request</th>
                                    <th width="10%">AM</th>
                                    <th width="10%">Telp AM</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($objs as $obj){?>
                                <?php $cstatus = ($obj->status=="Open")?"ticketOpen":"";?>
                                <?php $ctroubleshootcount = ($obj->troubleshootcount>0)?"redsup":"";?>
                                
                                <tr class="<?php echo $cstatus . " " .$ctroubleshootcount;?>">
                                    <td class="trowgreen"><?php echo $obj->kdticket;?></td>
                                    <td class="clientname"><smaller><?php echo $obj->clientname;?></smaller></td>
                                    <td><?php echo $obj->service;?></td>
                                    <td class="status"><?php echo $obj->status;?></td>
                                    <td class="duration"><small><?php echo $obj->clientname;?></small></td>                                    
                                    <td class="ticketstart"><?php echo $obj->ticketstart;?></td>
                                    <td class="ticketend"><?php echo $obj->ticketend;?></td>
                                    <td><?php echo humanize($obj->reporter)+" "+$obj->reporterphone;?></td>
                                    <td>
                                        <div class="btn-group">                                        
                                            <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Action <span class="caret"></span></button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="/ptickets/troubleshoot/<?php echo $obj->id;?>">Troubleshoot</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="/ptickets/followup/<?php echo $obj->id;?>" class="btnfollowup">
                                                        Followup Ticket
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>  
                                    </td>                                    
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <div class="dataTables_info">Ticketv2<?php echo $amount;?></div>
                        <div class="dataTables_paginate paging_two_buttons">
                            <a class="paginate_enabled_previous" href="/ptickets/index/page/1/rownum/<?php echo $rownum;?>">Pertama</a>
                            <span>
                                
                                <?php if($currentpage>0&&$currentpage<=2){?>
                                    <?php for($c=1;$c<=5;$c++){?>
                                        <?php $btn = ($currentpage==$c)?"paginate_active":"paginate_button";?>
                                        <a class="<?php echo $btn;?>" href="/ptickets/index/page/<?php echo $c;?>/rownum/<?php echo $rownum;?>">
                                            <?php echo $c;?>
                                        </a>
                                    <?php }?>
                                <?php }?>
                                <?php if($currentpage>2&&$currentpage<($pageamount-2)){?>
                                    <?php for($c=$currentpage-2;$c<=$currentpage+2;$c++){?>
                                        <?php $btn = ($currentpage==$c)?"paginate_active":"paginate_button";?>
                                        <a class="<?php echo $btn;?>" href="/ptickets/index/page/<?php echo $c;?>/rownum/<?php echo $rownum;?>">
                                            <?php echo $c;?>
                                        </a>
                                    <?php }?>
                                <?php }?>
                                <?php if($currentpage>=($pageamount-2)){?>
                                    <?php for($c=$pageamount-5;$c<=$pageamount;$c++){?>
                                        <?php $btn = ($currentpage==$c)?"paginate_active":"paginate_button";?>
                                        <a class="<?php echo $btn;?>" href="/ptickets/index/page/<?php echo $c;?>/rownum/<?php echo $rownum;?>">
                                            <?php echo $c;?>
                                        </a>
                                    <?php }?>
                                <?php }?>
                                
                            </span>
                            <a class="paginate_enabled_next" href="/ptickets/index/page/<?php echo $pageamount;?>/rownum/<?php echo $rownum;?>">Terakhir</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dr"><span></span></div>
        </div>
    </div>
    <script type="text/javascript" src="/js/v2/tickets/index.js"></script>
</body>
</html>
