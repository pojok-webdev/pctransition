<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div class="header">
        <a class="logo" href="index.html">
            <img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET App" title="PadiNET App"/>
        </a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="/">App</a> <span class="divider">></span></li>
				<li><a href="/subscribeforms">Form Berlangganan</a> <span class="divider">></span></li>
                <li class="active">Index</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Form Berlangganan</h1>
                        <ul class="buttons">
                            <li><a href="#" class="isw-plus" id="permintaantroubleshoot"></a></li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSubscription">
                            <thead>
                                <tr>
                                    <th width="25%">Name</th>
                                    <th width="25%">AM</th>
                                    <th width="20%">Alamat</th>
                                    <th>Jumlah FB</th>
                                    <th width="5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
								<?php $completetext = ($obj->fbcomplete==='1')?"(complete)":""?>
                                <tr trid='<?php echo $obj->id;?>'>
                                    <td><?php echo $obj->name.' '.$completetext;?></td>
                                    <td><?php echo $obj->sales;?></td>
                                    <td><?php echo $obj->address;?></td>
                                    <td><?php echo $obj->fbcount;?></td>
                                    <td>
										<div class="btn-group">
											<button data-toggle="dropdown" class="btn dropdown-toggle">
                                                Action 
                                                <span class="caret"></span>
                                            </button>
											<ul class="dropdown-menu pull-right">
                                                <li class='btn_edit pointer'><a href="/pfbses/index/<?php echo $obj->id;?>">Lihat FB</a></li>
												<li class='btn_edit pointer' style="display:none"><a>Buat FB</a></li>
												<li class="divider"></li>
                                                <li class='btn_print pointer'><a>Cetak FB</a></li>
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
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/subscriptionforms/index.js'></script>
</body>
</html>
