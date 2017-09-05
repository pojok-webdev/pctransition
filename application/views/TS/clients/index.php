<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div id="dSiteChoose" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Pilih Site</h3>
        </div>
        <div class="modal-body">
            <table id="tsite" class="table">
				<thead>
					<tr><td>Alamat</td><td>PIC</td><td>Telp</td></tr>
				</thead>
				<tbody>
				</tbody>
            </table>
        </div>
    </div>
    <div id="dAddAlias" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myAliasModalLabel">Penambahan Alias</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid withoutt-head">
						<div class="row-form clearfix">
							<div class="span4">Alias</div>
							<div class="span8"><input type="text"  id="alias"></div>
						</div>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" id="btnSaveAlias" type="button">Simpan</button>
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>
        </div>
    </div>
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
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tClient">
                            <thead>
                                <tr>
									<th width="30%">Name</th>
									<th width="25%">Alias</th>
									<th width="15%">AM</th>
									<th width="25%">Alamat</th>
									<th width="5%"><span class='icon-pencil'></span></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <tr rowid='<?php echo $obj->id;?>'>
                                    <td><?php echo $obj->name;?></td>
                                    <td class='alias'><?php echo $obj->alias;?></td>
                                    <td><?php echo $obj->usrname;?></td>
                                    <td><?php echo $obj->address;?></td>
                                    <td>
										<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-small dropdown-toggle">Aksi <span class="caret"></span></button>
										<ul class="dropdown-menu pull-right">
											<li class="btnviewdetail"><a>Lihat Detail</a></li>
											<li class="btnviewsite"><a>Lihat Site</a></li>
											<li class="btnAddAlias"><a>Penambahan Alias</a></li>
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
</body>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/tsclient.js'></script>
</html>
