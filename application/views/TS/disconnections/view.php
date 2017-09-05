<!DOCTYPE html>
<html lang="en">
	<style type='text/css'>
		.userpic{
			float:left;
			width:60px;
			height:50px;
		}
		.pic{
			width:40px;
			padding-left:auto;
			padding-right:auto;
		}
	</style>
<?php $this->load->view('adm/head');?>
<body>
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p id="modalMessage">Data telah tersimpan.</p>
        </div>
    </div>
    <div id="dAddOperator" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan Petugas</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<?php foreach($officers as $office){?>
							<div class="userpic" officer_name="<?php echo $office->username;?>" officer_id="<?php echo $office->id;?>">
								<a class="pic" title="<?php echo $office->username;?>" >
								<img src="<?php echo base_url();?>media/users/<?php echo strtolower($office->username);?>.jpg" class="img-polaroid" width=20px/>
								</a><br />
							<?php echo $office->username;?>
							</div>
			            <?php }?>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>

        </div>
    </div>
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiNET Application" title="PadiNET Application"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
<?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="/">PadiApp</a> <span class="divider">></span></li>
                <li><a href="/disconnections">Disconnection</a> <span class="divider">></span></li>
                <li class="active">Edit</li>
            </ul>
        </div>
        <div class="workplace" user_id='<?php echo $obj->id;?>'>
        <input id="disconnection_id" type="hidden" value="<?php echo $this->uri->segment(3);?>" />
        <input id="client_site_id" type="hidden" class="inp_disconnection" name="client_site_id" value="<?php echo $obj->client_site_id;?>" />
        <input id="createuser" type="hidden" value="<?php echo $this->ionuser->username;?>" name="createuser" class="inp_disconnection" />
        <input type='hidden' id='disconnectiontype' value='<?php echo $obj->disconnectiontype;?>' />
        <?php
			switch($obj->disconnectiontype){
				case "0":
				$dtype = "Reaktifasi";
				break;
				case "1":
				$dtype = "Isolir";
				break;
				case "2":
				$dtype = "Temporer";
				break;
				case "3":
				$dtype = "Permanen";
				break;
				default:
				$dtype = "";
				break;
			}
        ?>
		<div class="row-fluid"><div class="span12"><div class="head clearfix">
			<div class="left">
				<h1><?php echo $dtype;?></h1>
			</div>
			<div class="right">
				<ul class="buttons">
					<li><span class="isw-save" id="disconnectionbtnsave" title="simpan"></span></li>
				</ul>
            </div>
		</div>
		</div>
		</div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>View Pelanggan <?php echo $obj->client->name;?></h1>
                    </div>
                    <div class="block-fluid">
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<?php echo $obj->client->name;?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Alamat</div>
							<div class="span9">
								<?php echo $obj->client->address;?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Kota</div>
							<div class="span9">
								<?php echo $obj->client->city;?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">PIC</div>
							<div class="span9">
								<?php echo $obj->client->pic->name;?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Telp</div>
							<div class="span9">
								<?php echo $obj->client->pic->phone_area . ' ' . $obj->client->pic->phone;?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Email</div>
							<div class="span9">
								<?php echo $obj->client->pic->email;?>
							</div>
						</div>

                    </div>
                </div>
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Detail</h1>
                    </div>
                    <div class="block-fluid">
						<div class="row-form clearfix">
							<div class="span3">Jenis Bisnis</div>
							<div class="span9">
								<?php echo $obj->client->business_field;?>
							</div>
						</div>
                    </div>
                </div>
			</div>
        </div>
    </div>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/disconnections/edit.js'></script>
</body>
</html>
