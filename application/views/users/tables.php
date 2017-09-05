<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("adm/head");?>
</head>
<body>
    <?php $this->load->view("adm/header");?>
    <?php $this->load->view("adm/menu");?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">Users</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
            <?php echo $this->load->view("adm/buttons");?>
        </div>
        <div class="workplace">
        <?php $this->load->view("users/modals");?>
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1><?php echo $tablename;?></h1>
                        <ul class="buttons">
                            <li>
                                <a href="#" class="isw-settings"></a>
                                <ul class="dd-list">
                                    <li><a href="/pusers/index/ts"><span class="isw-right"></span> TS</a></li>
                                    <li><a href="/pusers/index/sales"><span class="isw-right"></span> Sales</a></li>
                                    <li><a href="/pusers/index/eos"><span class="isw-right"></span> EOS</a></li>
                                </ul>
                            </li>
                        </ul>                        
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="t<?php echo $tablename;?>">
                            <thead>
                                <tr>
                                    <?php $c=0;?>
                                    <?php foreach($objs["fields"] as $field){?>
                                    <th width="<?php echo $sWidths[$c];?>"><?php echo $field;?></th>
                                    <?php $c++;?>
                                    <?php }?>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($objs["result"] as $obj){?>
                                <tr myid="<?php echo $obj->id;?>">
                                    <?php foreach($objs["fields"] as $field){?>
                                    <td class="<?php echo $field;?>"><?php echo $obj->$field;?></td>
                                    <?php }?>
                                    <td>
                                        <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn dropdown-toggle">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-left">
                                            <li class='btn_edit pointer'><a>Edit</a></li>
                                            <li class="divider"></li>
                                            <li class='btn_remove pointer'><a>Hapus</a></li>
                                            <li class="divider"></li>
                                            <li class='btn_member pointer'><a>Anggota</a></li>
                                            <li class='btn_role pointer'><a>Role</a></li>
                                            <li class='btn_area pointer'><a>Area</a></li>
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
        </div>
    </div>
</body>
<script type="text/javascript" src="/js/v2/<?php echo $tablename;?>/index.js"></script>
</html>
