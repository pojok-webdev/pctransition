<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
	<?php $this->load->view('Sales/Clients/clientsmodal');?>
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET App" title="PadiNET App"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Pelanggan</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
	<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Pelanggan</h1>
                        <ul class="buttons">
                            <li>
                                <a href="#"><span class="isw-settings"></span> </a>
                                <ul class="dd-list">
                                    <li class="clientStatus" id="nonactiveclient" status="calon"><a><span class="isw-right"></span> Pelanggan belum aktif</a></li>
                                    <li class="clientStatus" id="activeclient" status="aktif"><a><span class="isw-right"></span> Pelanggan aktif</a></li>
                                    <li class="clientStatus" id="exclient" status="mantan"><a><span class="isw-right"></span> Mantan Pelanggan</a></li>
                                    <li class="clientStatus" id="all" status="all"><a><span class="isw-right"></span> Semua</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tClient">
                            <thead>
                                <tr>
                                    <th width='19%'>Nama</th>
                                    <th width='19%'>AM</th>
                                    <th width="19%">Alamat</th>
                                    <th width="19%">PIC</th>
                                    <th width="19%">E-mail/Phone</th>
                                    <th width="5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($objs as $obj){?>
                                <tr myid='<?php echo $obj->id;?>'>
                                    <td><?php echo $obj->name;?></td>
                                    <td><?php echo $obj->usrname;?></td>
                                    <td><?php echo $obj->address;?></td>
                                    <td><?php //echo $obj->pic->getpic('PEMOHON');?></td>
                                    <td><?php echo $obj->phone_area . '  ' . $obj->phone;?></td>
                                    <td>
                                    <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-small dropdown-toggle"   >Aksi <span class="caret"></span></button>
                                            <ul class="dropdown-menu pull-right">
                                                    <li class="btnviewsites" ><a>Lihat Cabang</a></li>
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
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Sales/clients.js'></script>
</body>
</html>
