<!DOCTYPE html>
<html lang="en">
<link rel='stylesheet' href='<?php echo base_url();?>css/aquarius/stylesheets.css' />
<link rel='stylesheet' href='<?php echo base_url();?>css/aquarius/reportstylesheet.css' />
<link rel='stylesheet' href='<?php echo base_url();?>css/padi.autocomplete.css' />
<link rel='stylesheet' href='<?php echo base_url();?>css/padi.report.css' />

<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.8.2.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/inventories/radu.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/plugins/bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/plugins/dataTables/jquery.dataTables.min.js'></script>
<script src="<?php echo base_url();?>js/padi.autocomplete.js" type="text/javascript" charset="utf-8"></script>

<body>
    
    <div id="dFilter" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <h3 id="myModalLabel"> Filter</h3>
        </div>
        <div class="modal-body">
            <p>Pilih Pelanggan</p>
            <div class='padiContainer'>
				<input type='text' id='padiText' />
				<button type="button" class="btn btn-medium tip simpan" id="descri"><span class="icon-chevron-right"></span></button>
			</div>
			<div id='clientlist'></div>
            <p>
				<div class="button-group">
					<button type="button" class="btn btn-small btn-warning tip reportPreview btnCloser"><span class="icon-ok"></span> Tampilkan</button>
					<button type="button" class="btn btn-small btn-warning tip btnCloser" id="cancel_install_save"><span class="icon-remove"></span> Tutup</button>
				</div>
			</p>
            
        </div>
    </div>

    <div id="dDeviceType" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <h3 id="myModalLabel"> Filter</h3>
        </div>
        <div class="modal-body">
            <p>Pilih Perangkat</p>
            <div class='padiContainer'>
				<input type='text' id='padiTextDevice' />
				<button type="button" class="btn btn-medium tip simpan" id="descriDevice"><span class="icon-chevron-right"></span></button>
			</div>
			<div id='devicelist'></div>
            <p>
				<div class="button-group">
					<button type="button" class="btn btn-small btn-warning tip reportPreview btnCloser"><span class="icon-ok"></span> Tampilkan</button>
					<button type="button" class="btn btn-small btn-warning tip btnCloser" id="cancel_install_save"><span class="icon-remove"></span> Tutup</button>
				</div>
			</p>
            
        </div>
    </div>

    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo $imagepath;?>logo.png" alt="PadiNET App" title="PadiNET App"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
    <div class="content">
        <div class="breadLine">
			<ul class="buttons">
                <li>
                    <a href="#" class="filterPelanggan"><span class="icon-search"></span><span class="text">Filter</span></a>                    
                </li>                
                <!--<li>
                    <a href="#" class="filterDevice"><span class="icon-search"></span><span class="text">Jenis Perangkat</span></a>
                </li>-->
            </ul>

        </div>
        <div class="workplace">
            <div class="row-fluid">

                <div class="span16">
                    <div class="head clearfix">
                        <div class="isw-text_document"></div>
                        <h1>Laporan Inventory</h1>
                        <ul class="buttons">
                            <li><a href="#" class="isw-up" id="backToInventories"></a></li>
                        </ul>

                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tReport">
                            <thead>
                                <tr>
                                    <th width="25%">Name</th>
                                    <th width="15%">No. Seri</th>
                                    <th width="10%">Part Number</th>
                                    <th width="10%">Keadaan</th>
                                    <th width="10%">Lokasi</th>
                                    <th width="20%">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
								<?php switch($obj->milikpadinet){
									case 0:
										$owner='Pelanggan';
									break;
									case 1:
										$owner='PadiNET';
									break;
								}?>
								<?php switch($obj->cond){
									case 1:
										$status='Baik';
									break;
									case 2:
										$status='Rusak';
									break;
									case 3:
										$status='Hilang';
									break;
								}?>
                                <tr myid='<?php echo $obj->id;?>'>
                                    <td><?php echo $obj->name;?></td>
                                    <td><?php echo $obj->serialno;?></td>
                                    <td><?php echo $obj->partnumber;?></td>
                                    <td><?php echo $status;?></td>
                                    <td><?php echo $obj->position;?></td>
                                    <td><?php echo $obj->description;?></td>
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
    <script src='<?php echo base_url();?>js/inventories/report.js'></script>
</body>
</html>
