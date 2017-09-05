<?php
$data = array(
'csspath' => $csspath,
'jspath' => $jspath,
'imagepath' => $imagepath,
);
?><!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo $imagepath;?>logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu',$data);?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="<?php echo base_url();?>index.php/clients">Pelanggan</a> <span class="divider">></span></li>
				<li><a href="#">Cabang Pelanggan</a> <span class="divider">></span></li>
                <li class="active">List Perangkat</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Antenna <?php echo $clientname;?></h1>
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
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tAntenna">
                            <thead>
                                <tr>
                                    <th width='20%'>Nama</th>
                                    <th width='16%'>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs->site_antenna as $obj){?>
                                <tr myid='<?php echo $obj->id;?>'>
                                    <td><?php echo $obj->name;?></td>
                                    <td><?php echo $obj->location;?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
			<div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>AP Wifi <?php echo $clientname;?></h1>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tAntenna">
                            <thead>
                                <tr>
                                    <th width='20%'>Tipe</th>
                                    <th width='16%'>Macboard</th>
                                    <th width='20%'>IP Address</th>
                                    <th width='16%'>ESSID</th>
                                    <th width='20%'>Security Key</th>
                                    <th width='16%'>User</th>
                                    <th width='20%'>Password</th>
                                    <th width='16%'>Lokasi</th>
                                    <th width='20%'>Owner</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs->site_apwifi as $obj){?>
                                <tr myid='<?php echo $obj->id;?>'>
                                    <td><?php echo $obj->tipe;?></td>
                                    <td><?php echo $obj->macboard;?></td>
                                    <td><?php echo $obj->ipaddress;?></td>
                                    <td><?php echo $obj->essid;?></td>
                                    <td><?php echo $obj->security_key;?></td>
                                    <td><?php echo $obj->user;?></td>
                                    <td><?php echo $obj->password;?></td>
                                    <td><?php echo $obj->location;?></td>
                                    <td><?php echo $obj->owner;?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="dr"><span></span></div>
			<div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>PC Card <?php echo $clientname;?></h1>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tAntenna">
                            <thead>
                                <tr>
                                    <th width='20%'>Nama</th>
                                    <th width='16%'>Macaddress</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs->site_pccard as $obj){?>
                                <tr myid='<?php echo $obj->id;?>'>
                                    <td><?php echo $obj->name;?></td>
                                    <td><?php echo $obj->macaddress;?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="dr"><span></span></div>
			<div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Router <?php echo $clientname;?></h1>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tAntenna">
                            <thead>
                                <tr>
                                    <th width='20%'>Tipe</th>
                                    <th width='16%'>Macboard</th>
                                    <th width='20%'>IP Public</th>
                                    <th width='16%'>IP Private</th>
                                    <th width='20%'>User</th>
                                    <th width='16%'>Password</th>
                                    <th width='20%'>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs->site_router as $obj){?>
                                <tr myid='<?php echo $obj->id;?>'>
                                    <td><?php echo $obj->tipe;?></td>
                                    <td><?php echo $obj->macboard;?></td>
                                    <td><?php echo $obj->ip_public;?></td>
                                    <td><?php echo $obj->ip_private;?></td>
                                    <td><?php echo $obj->user;?></td>
                                    <td><?php echo $obj->password;?></td>
                                    <td><?php echo $obj->location;?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="dr"><span></span></div>
			<div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Switch <?php echo $clientname;?></h1>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tAntenna">
                            <thead>
                                <tr>
                                    <th width='20%'>Nama</th>
                                    <th width='16%'>Macboard</th>
                                    <th width='20%'>No Serial</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs->site_switch as $obj){?>
                                <tr myid='<?php echo $obj->id;?>'>
                                    <td><?php echo $obj->name;?></td>
                                    <td><?php echo $obj->mac;?></td>
                                    <td><?php echo $obj->serialno;?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>        
        
            <div class="dr"><span></span></div>
			<div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Wireless Radio <?php echo $clientname;?></h1>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tAntenna">
                            <thead>
                                <tr>
                                    <th width='20%'>Tipe</th>
                                    <th width='16%'>Macboard</th>
                                    <th width='20%'>IP Radio</th>
                                    <th width='20%'>IP AP</th>
                                    <th width='16%'>IP Ethernet</th>
                                    <th width='20%'>ESSID</th>
                                    <th width='20%'>Freq</th>
                                    <th width='16%'>Polarization</th>
                                    <th width='20%'>Signal</th>
                                    <th width='20%'>Quality</th>
                                    <th width='16%'>Thruput UDP</th>
                                    <th width='20%'>Thruput TCP</th>
                                    <th width='16%'>User</th>
                                    <th width='20%'>Password</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs->site_wireless_radio as $obj){?>
                                <tr myid='<?php echo $obj->id;?>'>
                                    <td><?php echo $obj->tipe;?></td>
                                    <td><?php echo $obj->macboard;?></td>
                                    <td><?php echo $obj->ip_radio;?></td>
                                    <td><?php echo $obj->ip_ap;?></td>
                                    <td><?php echo $obj->ip_ethernet;?></td>
                                    <td><?php echo $obj->essid;?></td>
                                    <td><?php echo $obj->freqwency;?></td>
                                    <td><?php echo $obj->polarization;?></td>
                                    <td><?php echo $obj->signal;?></td>
                                    <td><?php echo $obj->quality;?></td>
                                    <td><?php echo $obj->throughput_udp;?></td>
                                    <td><?php echo $obj->throughput_tcp;?></td>
                                    <td><?php echo $obj->user;?></td>
                                    <td><?php echo $obj->password;?></td>

                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>        
        
        
        </div>
    </div>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Warehouse/view_devices.js'></script>
</body>
</html>
