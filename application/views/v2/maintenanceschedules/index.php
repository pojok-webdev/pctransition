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
                <li><a href="/maintenances">Jadwal Maintenance</a> <span class="divider">></span></li>
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
                        <?php if($this->session->userdata["role"]==="EOS"){?>
                        <ul class="buttons">
                            <li><a class="isw-plus"></a>
                                <ul class="dd-list">
                                    <li>
                                        <a href="/pmaintenanceschedules/addclient"><span class="isw-users"></span> Pelanggan
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/pmaintenanceschedules/addbackbone"><span class="isw-cloud"></span> Backbone
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/pmaintenanceschedules/adddatacenter"><span class="isw-documents"></span> Datacenter
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/pmaintenanceschedules/addbts"><span class="isw-archive"></span> BTS
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <?php }?>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tmaintenances">
                            <thead>
                                <tr>
                                    <th width="25%">Nama</th>
                                    <th width="25%">Tgl Jadwal</th>
                                    <th width="25%">Tipe</th>
                                    <th width="25%">Alamat</th>
                                    <th width="25%">Period</th>
                                    <th width="25%">AM</th>
                                    <th width="25%">Cabang</th>
                                    <th width="25%">Createdate</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($objs as $obj){?>
                                <tr myid="<?php echo $obj->id;?>">
                                    <td><?php echo $obj->name;?></td>
                                    <td><?php echo $obj->mdatetime;?></td>
                                    <td><?php echo $obj->maintenance_type;?></td>
                                    <td><?php echo $obj->address;?></td>
                                    <td><?php echo $obj->period;?></td>
                                    <td><?php echo humanize($obj->am);?></td>
                                    <td><?php echo $obj->branch;?></td>
                                    <td><?php echo $obj->createdate;?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">
                                                Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="/pmaintenanceschedules/edit/<?php echo $obj->id;?>">Edit</a></li>
                                                <li class="divider"></li>
                                                <li><a class="btnremovemaintenance">Hapus</a></li>
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
    <script type="text/javascript" src="/js/v2/maintenanceschedules/index.js"></script>
</body>
</html>
