<div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Konfirmasi</h3>
	</div>
	<div class="modal-body">
		<p><span id="modalMessage">Data telah tersimpan.</span></p>
	</div>
</div>
<div id="dPackage" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Pemilihan Paket</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<table class="table">
							<thead><tr><th>Nama</th><th>Keterangan</th></tr></thead>
							<tbody>
								<?php foreach($surveypackages as $package){?>
								<tr class="choosePackage pointer" thisid="<?php echo $package->id;?>"><td><?php echo $package->name;?></td><td><?php echo $package->description;?></td></tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>
<div id="dAddOperator" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Penambahan Petugas Survey</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block gallery clearfix">
					<div class="block thumbas clearfix">
					<?php foreach(User::get_user_by_group('TS') as $user){?>
					<div class="thumbnail petugasSurvey pointer" username="<?php echo $user->username;?>" surveyor_email="<?php echo $user->email;?>">
						<div class="imageholder">
							<img src="<?php echo $user->pic;?>" width="50" height="50" />
						</div>
						<div class="caption">
							<?php echo $user->username;?>
						</div>
					</div>
					<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="dAddMaterial" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Penambahan Material</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Jenis</div>
						<div class="span9">
							<?php echo form_dropdown('material_type',$material_type,0,'id="material_type"');?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Keterangan </div>
						<div class="span9">
						<?php echo form_dropdown('material_name',array(),0,'id="material_name"');?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Jumlah</div>
						<div class="span9"><input type="text" name="material_amount" id="material_amount" value=""/></div>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" type="button" id='savesurveymaterial'>Simpan</button>
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="dAddResume" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Penambahan Resume</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Resume</div>
						<div class="span9">
							<textarea id="resume" name="name" style="height: 300px;" type="textarea" class="myeditor inp_resume"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<button class="btn closemodal" type="button" id='savesurveyresume'>Simpan</button>
			<button class="btn closemodal" type="button" id='updatesurveyresume'>Update</button>
			<button class="btn closemodal" type="button">Tutup</button>
		</div>
	</div>
</div>
<div id="dAddDevice" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myDeviceLabel">Penambahan Peralatan</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Jenis</div>
						<div class="span9">
							<?php echo form_dropdown('device_type',$device_type,0,'id="device_type"');?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Nama</div>
						<div class="span9">
							<?php echo form_dropdown('device_id',array(),0,'id="device_name" class="inp_devices" type="selectid"');?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Jumlah</div>
						<div class="span9"><input type="text" name="amount" id="device_amount" value="" class="inp_devices"/></div>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Keterangan</div>
						<div class="span9"><textarea type="textarea" name="description" id="device_description" class="myeditor inp_devices" ></textarea></div>
					</div>
					<div class="footer">
						<button class="btn closemodal" type="button" id='savesurveydevice'>Simpan</button>
						<button class="btn closemodal" type="button" id='updatesurveydevice'>Update</button>
						<button class="btn closemodal" type="button">Tutup</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="dAddSurveyImage" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalImageLabel">Penambahan Gambar Survey</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">File</div>
						<div class="span9">
							<img id="output" width=200 height=200>
							<input type="file" id="addImage" onchange="uploadImage1(event)"/>
						</div>
						<div class="span1" id="status"></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Ket.</div>
						<div class="span9"><textarea type="text" name="file_description" id="file_description" ></textarea></div>
					</div>
					<div class="footer">
						<button class="btn closemodal" type="button" id='savesurveyimage'>Simpan</button>
						<button class="btn closemodal" type="button">Tutup</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="dAddSiteDistance" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Penambahan Jarak Site</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Nama Site</div>
						<div class="span9">
							<?php echo form_dropdown('site',$sites,0,'id="site_id"');?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Jarak</div>
						<div class="span9"><input type="text" name="site_distance" id="site_distance" value=""/></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">LOS/NLOS</div>
						<div class="span9">
							<select id="los" name="los">
								<option value="1">LOS</option>
								<option value="0">NLOS</option>
								<option value="2">nLOS</option>
							</select>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Penghalang</div>
						<div class="span9"><input type="text" name="obstacle" id="obstacle" value=""/></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Keterangan</div>
						<div class="span9"><textarea type="text" name="site_description" id="site_description" ></textarea></div>
					</div>
					<div class="footer">
						<button class="btn closemodal" type="button" id='saveSiteDistance'>Simpan</button>
						<button class="btn closemodal" type="button">Tutup</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="dAddBTSDistance" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Penambahan Jarak BTS</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Nama BTS</div>
						<div class="span9">
							<?php echo form_dropdown('btstower_id',$btstowers,0,'id="bts_id" class="inp_bts" type="selectid"');?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Jarak</div>
						<div class="span9"><input type="text" name="distance" id="bts_distance" class="inp_bts" value=""/></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">LOS/NLOS</div>
						<div class="span4">
							<select id="losnlosselect" name="los" type="selectid" class="inp_bts" >
								<option value="0">NLOS</option>
								<option value="1" selected="selected">LOS</option>
								<option value="2">nLOS</option>
							</select>
						</div>
						<div class="span1 losap" id="aplabel">AP</div>
						<div class="span4 losap" id="apoption">
							<?php echo form_dropdown("ap",$aps,0,'id="apselect" class="inp_bts" type="select"');?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Penghalang</div>
						<div class="span9"><input type="text" name="obstacle" id="obstacle" class="inp_bts" value=""/></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Keterangan</div>
						<div class="span9"><textarea type="textarea" name="description" id="bts_description" class="inp_bts" ></textarea></div>
					</div>
					<div class="footer">
						<button class="btn closemodal savebtsdistance" type="button" id='savebtsdistance' btsdistance_id='' >Simpan</button>
						<button class="btn closemodal savebtsdistance" type="button" id='updatebtsdistance' btsdistance_id='' >Update</button>
						<button class="btn closemodal" type="button">Tutup</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="dModalsurvey" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Konfirmasi</h3>
	</div>
	<div class="modal-body">
		<p>Data telah tersimpan.</p>
	</div>
</div>
	<div id="dAddPic" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="addPicLabel">Penambahan PIC</h3>
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
							<button class="btn closemodal" type="button" id='savePicSite'>Simpan</button>
							<button class="btn closemodal" type="button" id='updatePicSite'>Update</button>
							<button class="btn closemodal" type="button">Tutup</button>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>
<div id="dConfirm" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3>Konfirmasi</h3>
	</div>
	<div class="modal-body">
		<p>Apakah benar akan menghapus PIC ?.</p>
		<div class="footer">
			<button class="btn closemodal" type="button" id='hapusPicSite'>Ya</button>
			<button class="btn closemodal" type="button">Batalkan</button>
		</div>
	</div>
</div>

<div id="dAddBeritaAcara" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Penambahan Berita Acara</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Gambar</div>
						<div class="span6">
							<img id="baoutput" width=200 height=200>
							<input type="file" id="addBAImage" name="addBAImage" onchange="baloadImage(event)"/>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Nama</div>
						<div class="span9">
						<input type='text' name='nameba' id='nameba'>
						</div>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Deskripsi</div>
						<div class="span9"><input type="text" name="descriptionba" id="descriptionba" value=""/></div>
					</div>
					<div class="footer">
						<button class="btn closemodal" type="button" id='saveba'>Simpan</button>
						<button class="btn closemodal" type="button" id='updateba'>Update</button>
						<button class="btn closemodal" type="button">Tutup</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="dConfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Konfirmasi</h3>
	</div>
	<div class="modal-body">
		<p>Akan menghapus, anda yakin ?</p>
	</div>
	<div class="modal-footer">
		<button class="btn btn-warning closemodal" type="button" id='yesButton'>Hapus</button>
		<button class="btn closemodal" type="button">Tutup</button>
	</div>
</div>
