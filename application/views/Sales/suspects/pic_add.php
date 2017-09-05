<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/suspects/pic_add.js"></script>
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
    <div id="dAddPic" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Penambahan PIC</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
                        <div class="row-form clearfix">
                            <div class="span5">Nama:</div>
                            <div class="span7">
		<input type="text" name="name" id="pic_name" class="inp_pic">
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Posisi:</div>
                            <div class="span7">
		<?php echo form_dropdown("position",$positions,"","id='pic_position' type='select' class='inp_pic'");?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Email:</div>
                            <div class="span7">
		<input type="text" id="pic_email"  name="email" class="inp_pic">
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">HP:</div>
                            <div class="span7">
		<input type="text" id="pic_hp" name="hp" class="inp_pic">
                            </div>
                        </div>
                                <div class="footer">
							<button class="btn closemodal" type="button" id='savePic'>Simpan</button>
							<button class="btn closemodal" type="button">Tutup</button>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
    <?php $this->load->view('adm/header');?>
	<?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
				<li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Suspect</a> <span class="divider">></span></li>
                <li class="active">Penambahan PIC</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <input type='hidden' name="client_id" class="inp_pic" id='clientid' value='<?php echo $this->uri->segment(3);?>'>
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-users"></div>
                        <h1>Daftar PIC</h1>
   		<ul class="buttons">
                                                    <li><span class="isw-left" id="btnprevdata"></span></li>
                                                    <li><span class="isw-plus" id="btnaddsuspect"></span></li>
                                                    <li><span class="isw-right" id="btnnextdata"></span></li>
						</ul>
                    </div>
                    <div class="block-fluid">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tblpics">
                            <thead>
                                <tr>
                                    <th width="25%">Name</th>
                                    <th width="25%">Posisi</th>
                                    <th width="25%">E-mail</th>
                                    <th width="25%">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($pics as $pic){?>
                                <tr>
                                    <th width="25%"><?php echo $pic->name;?></th>
                                    <th width="25%"><?php echo $pic->position;?></th>
                                    <th width="25%"><?php echo $pic->email;?></th>
                                    <th width="25%"><?php echo $pic->hp;?></th>
                                </tr>
                                <?php }?>
							</tbody>
						</thead>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
