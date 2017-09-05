    <div id="addClientDialog" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="addClientModalLabel">Backdoor Penambahan Pelanggan</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Cabang</div>
							<div class="span9">
								<?php echo form_dropdown("branch_id",$branches,0,'id="branch_id" type="selectid" class="inp_client"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='name' id='clientname' placeholder="Nama Pelanggan" class="inp_client" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Kategori</div>
							<div class="span9">
								<input type="text" name="category_id" id="category_id" value="" placeholder="Kategori" class="inp_client" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Business Field</div>
							<div class="span9">
								<input type="text" name="business_field" id="business_field" value="" placeholder="Business Field" class="inp_client"/>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Alamat Penagihan</div>
							<div class="span9">
								<input type="text" name="billaddress" id="billaddress" value="" placeholder="Alamat Penagihan" class="inp_client"/>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Alamat</div>
							<div class="span9">
								<input type="text" name="address" id="address" value="" placeholder="Alamat" class="inp_client"/>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Kota</div>
							<div class="span9">
								<input type="text" name="city" id="city" value="" placeholder="Kota" class="inp_client"/>
							</div>
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Telp</div>
							<div class="span3">
								<input type="text" name="phone_area" id="phone_area" value="" placeholder="031" class="inp_client"/>
							</div>
							<div class="span6">
								<input type="text" name="phone" id="phone" value="" placeholder="889887" class="inp_client"/>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Fax</div>
							<div class="span3">
								<input type="text" name="fax_area" id="fax_area" value="" placeholder="031" class="inp_client"/>
							</div>
							<div class="span6">
								<input type="text" name="fax" id="fax" value="" placeholder="889887" class="inp_client"/>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Tanggal Aktivasi</div>
							<div class="span9">
								<input type="text" name="activedate" id="activedate"  class="inp_client datepicker"/>
							</div>
							<div>
								<input type="hidden" value="00" name="maktivasi1" id="maktivasi1" class="dttime" parent="activedate"/>
								<input type="hidden" value="00" name="haktivasi1" id="haktivasi1" class="dttime" grandparent="activedate"/>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Tanggal Mulai</div>
							<div class="span9">
								<input type="text" name="period1" id="period1" class="inp_client datepicker"/>
							</div>
							<div>
								<input type="hidden" value="00" name="mperiod1" id="mperiod1" class="dttime" parent="period1"/>
								<input type="hidden" value="00" name="hperiod1" id="hperiod1" class="dttime" grandparent="period1"/>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Tanggal Berakhir</div>
							<div class="span9">
								<input type="text" name="period2" id="period2" class="inp_client datepicker"/>
							</div>
							<div>
								<input type="hidden" value="00" name="mperiod2" id="mperiod2" class="dttime" parent="period2"/>
								<input type="hidden" value="00" name="hperiod2" id="hperiod2" class="dttime" grandparent="period2"/>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Sales</div>
							<div class="span9">
								<?php echo form_dropdown("sale_id",$sales,"1",'class="inp_client" type="selectid" id="sale_id"');?>
							</div>
						</div>
						
					</div>
				</div>
			</div>
				<div class="footer">
					<button class="btn closemodal" type="button" id='btnsaveclient'>Simpan</button>
					<button class="btn closemodal" type="button" id='btnupdateclient'>Simpan</button>
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
        </div>
    </div>
    <div id="editAllPICDialog" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="addPICModalLabel">Edit PIC</h3>
        </div>
        <div class="modal-body">
			<div class="row-fluid">
				<div class="span4">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Posisi</div>
							<div class="span9">
								<b>PEMOHON</b>
								<input type="hidden" value="PEMOHON" id="pic_edit_position" name="prole" class="inp_pic1" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='name' id='name1' placeholder="Nama PIC" class="inp_pic1 clearinit" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Phone/mail</div>
							<div class="span4">
								<input type="text" name="telp_hp" id="telp_hp1" value="" placeholder="No Telepon/HP" class="inp_pic1 clearinit" />
							</div>
							<div class="span4">
								<input type="text" name="email" id="email1" value="" placeholder="No Telepon/HP" class="inp_pic1 clearinit" />
							</div>
						</div>
					</div>
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Posisi</div>
							<div class="span9">
								<b>PENANGGUNG JAWAB</b>
								<input type="hidden" value="PENANGGUNG JAWAB" id="pic_edit_position" name="prole" class="inp_pic2" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='name' id='name2' placeholder="Nama PIC" class="inp_pic2 clearinit" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Phone/mail</div>
							<div class="span4">
								<input type="text" name="telp_hp" id="telp_hp2" value="" placeholder="No Telepon/HP" class="inp_pic2 clearinit" />
							</div>
							<div class="span4">
								<input type="text" name="email" id="email2" value="" placeholder="No Telepon/HP" class="inp_pic2 clearinit" />
							</div>
						</div>
					</div>
					</div>
					<div class="span4">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Posisi</div>
							<div class="span9">
								<b>ADMINISTRASI</b>
								<input type="hidden" value="ADMINISTRASI" id="pic_edit_position" name="prole" class="inp_pic3" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='name' id='name3' placeholder="Nama PIC" class="inp_pic3 clearinit" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Phone/mail</div>
							<div class="span4">
								<input type="text" name="telp_hp" id="telp_hp3" value="" placeholder="No Telepon/HP" class="inp_pic3 clearinit" />
							</div>
							<div class="span4">
								<input type="text" name="email" id="email3" value="" placeholder="No Telepon/HP" class="inp_pic3 clearinit" />
							</div>
						</div>
					</div>
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Posisi</div>
							<div class="span9">
								<b>TEKNIS DAN INSTALASI</b>
								<input type="hidden" value="TEKNIS & INSTALASI" id="pic_edit_position" name="prole" class="inp_pic4" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='name' id='name4' placeholder="Nama PIC" class="inp_pic4 clearinit" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Phone/mail</div>
							<div class="span4">
								<input type="text" name="telp_hp" id="telp_hp4" value="" placeholder="No Telepon/HP" class="inp_pic4 clearinit" />
							</div>
							<div class="span4">
								<input type="text" name="email" id="email4" value="" placeholder="No Telepon/HP" class="inp_pic4 clearinit" />
							</div>
						</div>
					</div>
					</div>
					<div class="span4">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Posisi</div>
							<div class="span9">
								<b>PENAGIHAN</b>
								<input type="hidden" value="PENAGIHAN" id="pic_edit_position" name="prole" class="inp_pic5" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='name' id='name5' placeholder="Nama PIC" class="inp_pic5 clearinit" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Phone/mail</div>
							<div class="span4">
								<input type="text" name="telp_hp" id="telp_hp5" value="" placeholder="No Telepon/HP" class="inp_pic5 clearinit" />
							</div>
							<div class="span4">
								<input type="text" name="email" id="email5" value="" placeholder="No Telepon/HP" class="inp_pic5 clearinit" />
							</div>
						</div>
					</div>
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Posisi</div>
							<div class="span9">
								<b>SUPPORT</b>
								<input type="hidden" value="SUPPORT" id="pic_edit_position" name="prole" class="inp_pic6" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Nama</div>
							<div class="span9">
								<input type='text' name='name' id='name6' placeholder="Nama PIC" class="inp_pic6 clearinit" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span3">Phone/mail</div>
							<div class="span4">
								<input type="text" name="telp_hp" id="telp_hp6" value="" placeholder="No Telepon/HP" class="inp_pic6 clearinit" />
							</div>
							<div class="span4">
								<input type="text" name="email" id="email6" value="" placeholder="No Telepon/HP" class="inp_pic6 clearinit" />
							</div>
						</div>
					</div>
				</div>
				<div class="footer">
					<button class="btn closemodal" type="button" id='btnsaveallpic'>Simpan</button>
					<button class="btn closemodal" type="button">Tutup</button>
				</div>
			</div>
        </div>
    </div>
