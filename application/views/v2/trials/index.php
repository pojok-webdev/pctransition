<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("v2/commons/head");?>
    <?php $this->load->view("v2/commons/jquery");?>
    <?php $this->load->view("v2/commons/plugins");?>
</head>
<body>
    <div class="header">
        <a class="logo" href="/">
            <img src="img/aquarius/logo.png" alt="PadiApp" title="PadiApp - Trials"/>
        </a>
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
                <li><a href="/trials">Trial</a> <span class="divider">></span></li>
                <li class="active">Index</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <?php $this->load->view("v2/trials/dialogs");?>
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1><?php echo $tablelabel;?></h1>
                        <?php if($this->session->userdata("role")==="Sales"){?>
                        <ul class="buttons tipl" title="Tekan untuk penambahan trial">
                            <li><a class="isw-plus"></a>
                                <ul class="dd-list">
                                    <li><a href="/ptrials/add"><span class="isw-plus"></span> Baru</a></li>
                                    <li><a href="/ptrials/upgrade"><span class="isw-up_circle"></span> Lama (Upgrade)</a></li>
                                </ul>
                            </li>
                        </ul>
                        <?php }?>
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
                                    <th width="25%">Approval</th>
                                    <th width="25%">Status</th>
                                    <th>Durasi</th>
                                    <th width="25%">Createdate</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($objs as $obj){?>
                                <tr trid="<?php echo $obj->id;?>">
                                    <?php
                                    $ext = ($obj->extendapprove=='1')?"(disetujui)":"(tidak disetujui)";
                                    $startexecdate = "";$start_execdate = "";$endexecdate = "";
                                    if(!is_null($obj->startexecdate)){
                                        $startexecdate = "<div class='execdate'>" . $obj->startexecdate . " (Eksekusi)" . "</div>";
                                        $start_execdate = $obj->startexecdate;
                                    }
                                    if(!is_null($obj->endexecdate)){
                                        $endexecdate = "<div class='isstopped'>stopped:</div>";
                                        $endexecdate.= "<div>" . $obj->endexecdate . "" . "</div>";
                                    }
                                    ?>
                                    <td class="tdname"><?php echo $obj->name;?></td>
                                    <td class="tdam"><?php echo $obj->am;?></td>
                                    <td><?php echo $obj->typename;?></td>
                                    <td><?php echo $obj->startdate . ' (Pengajuan)' . $startexecdate ;?></td>
                                    <td class="tdend"><?php echo $obj->enddate . ' (Pengajuan)' . $endexecdate;?></td>
                                    <td><?php echo $obj->product;?></td>
                                    <td class="tdapproved"><?php echo $obj->approved;?></td>
                                    <td class="tdstatus"><?php echo $obj->status;?><label class="warninglabel"></></td>
                                    <td class="durasi" execdate="<?php echo $start_execdate;?>"></td>
                                    <td><?php echo $obj->createdate;?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Action 
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a class="liclientname"><?php echo substr($obj->name,0,50);?></a></li>
                                                <li class="divider"></li>
                                                <li><a href="/ptrials/edit/<?php echo $obj->id;?>">Edit</a></li>
                                                <li><a href="/ptrials/followup/<?php echo $obj->id;?>">Follow Up</a></li>
                                                <li class="divider"></li>
                                                <?php if($this->session->userdata("username")==="ketut"){?>
                                                    <li><a class="liapprove" >Approve</a></li>
                                                    <li class="divider"></li>
                                                <?php }else{?>
                                                    <li><a class="liotp" >Approve</a></li>
                                                    <li class="divider"></li>
                                                <?php }?>
                                                <?php if($this->session->userdata("role")==="TS"){?>
                                                    <?php if(($obj->approved==='approved')||($obj->approved==='tidak perlu approval')){?>
                                                        <?php if(strtoupper($obj->status)==='ON TRIAL'){?>
                                                            <li><a class="listop" >Stop Trial</a></li>
                                                            <li class="divider"></li>
                                                        <?php }else{?>
                                                            <li><a class="listart" >Start Trial</a></li>
                                                            <li class="divider"></li>
                                                        <?php }?>
                                                    <?php }?>
                                                <?php }?>
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