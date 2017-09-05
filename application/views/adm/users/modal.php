<div id="dAddUser" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myAddOtherFeeModalLabel">Penambahan User</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Nama</div>
						<div class="span9">
							<span><input type="text" id="username" class='inp_user' name="username" /></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Group</div>
						<div class="span9">
							<span>
								<?php
								echo form_dropdown('groups',$groups,1,'name="group_id" id="group_id" type="selectid" class="inp_user"');
								?>
							</span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Branch</div>
						<div class="span9">
							<span>
								<?php
								echo form_dropdown('branches',$branches,1,'name="branch_id" id="branch_id" type="selectid" class="inp_user"');
								?>
							</span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Phone</div>
						<div class="span9">
							<span><input type="text" id="phone" class='inp_user' name="phone"/></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Email</div>
						<div class="span9">
							<span><input type="text" id="email" class='inp_user' name="email"/></span>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Password</div>
						<div class="span9">
							<span><input type="text" id="password" class='inp_user' name="password"/></span>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<button type="button" data-dismiss="modal closemodal" class="btn">Tutup</button>
				<button type="button" class="btn btn-primary closemodal" id="userupdate">Update</button>
				<button type="button" class="btn btn-primary closemodal" id="usersave">Simpan</button>
			</div>
		</div>
	</div>
</div>
<div id="dSetPicture" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalImageLabel">Ubah Gambar</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">File</div>							
						<div class="span9">
							<img id="output" width=200 height=200>
							
						</div>
						<div class="span1" id="status"></div>
					</div>
					<div class="row-form clearfix">
						<input type="file" id="addPICImage" onchange="uploadImage(event)"/>
					</div>
				</div>
			</div>
			<div class="footer">
				<button class="btn closemodal" type="button" id='savepicimage'>Simpan</button>
				<button class="btn closemodal" type="button">Tutup</button>
			</div>
		</div>
	</div>
</div>
<div id="dSetPassword" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalPasswordLabel">Ganti Password</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3">Password</div>							
						<div class="span9">
							<input type="password" id="cpassword" name="cpassword">
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Konfirmasi Password</div>							
						<div class="span9">
							<input type="password" id="konfirmasipassword" name="konfirmasipassword">
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<button class="btn closemodal" type="button" id='btnsavepassword'>Simpan</button>
				<button class="btn closemodal" type="button">Tutup</button>
			</div>
		</div>
	</div>
</div>
