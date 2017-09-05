<div id="dEditTrial" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Edit Trial</h3>
	</div>
	<div class="modal-body">
		<div class='row-fluid'>
			<div class="span12">
				<div class="without-head">
					<div class="row-form clearfix">
						<div class="span4">Pelanggan:</div>
						<div class="span12">
							<span id="clientedit"></span>
							<input type="hidden" id="clientid" name="client_site_id"/>
							<input type="hidden" id="id" name="id" class="inp_trial"/>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span4">Start Date:</div>
						<div class="span4">
							<input type='text' class='datepicker inp_trial' name='startdate' id='startdate' />
						</div>
						<div class='span2'>
							<?php echo form_dropdown('startHour',$hours,0,'id="startHour" class="dttime" parent="startdate"');?>
						</div>
						<div class='span2'>
							<?php echo form_dropdown('startMinute',$minutes,0,'id="startMinute" class="dttime" grandparent="startdate"');?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span4">End Date:</div>
						<div class="span4">
							<input type='text' class='datepicker inp_trial' name='enddate' id='enddate' />
						</div>
						<div class='span2'>
							<?php echo form_dropdown('endHour',$hours,0,'id="endHour" class="dttime" parent="enddate"');?>
						</div>
						<div class='span2'>
							<?php echo form_dropdown('endMinute',$minutes,0,'id="endMinute" class="dttime" grandparent="enddate"');?>
						</div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Produk:</div>
						<div class="span9">
							<?php echo form_dropdown("product",$products,"0","id='product' class='inp_trial' type='select'");?>
						</div>
					</div>
					<div class="row-form clearfix" id="updown">
						<div class="span3">Value:</div>
						<div class="span5">
							<?php echo form_input("integer_part0","0","id='integer_part0' class='spinner' style='width:40px'");?>
							<?php echo form_input("integer_part1","0","id='integer_part1' class='spinner' style='width:40px'");?>
							<?php echo form_input("integer_part2","0","id='integer_part2' class='spinner' style='width:40px'");?>
							<?php echo form_input("integer_part3","0","id='integer_part3' class='spinner' style='width:40px'");?>
						</div>
						<div class="span3">
							<?php echo form_input("fraction_part0","0","id='fraction_part0' class='spinner' style='width:40px'");?>
							<?php echo form_input("fraction_part1","0","id='fraction_part1' class='spinner' style='width:40px'");?>
						</div>
						<div class="span1">Mbps</div>
					</div>
					<div class="row-form clearfix" id="dropdownsmartvalue">
						<div class="span4">Value:</div>
						<div class="span8">
							<?php echo form_dropdown("smartvalue",array("Pilihlah","Upto 512 Kbps","Upto 768 Kbps","Upto 1 Mbps","Upto 2 Mbps","Upto 3 Mbps","Upto 4 Mbps"),0,"id=smartvalue");?>
						</div>
					</div>
					<div class="row-form clearfix" id="dropdownbusiness">
						<div class="span4">Value:</div>
						<div class="span8">
							<?php echo form_dropdown("business",array("Pilihlah","Upto 2 Mbps","Upto 4 Mbps","Upto 6 Mbps","Upto 8 Mbps"),0,"id=business");;?>
						</div>
					</div>
					<!--<div class="head clearfix">
						<div class="isw-grid"></div>
						<h1>PIC</h1>
						<ul class="buttons">
							<li id="btnAddPIC">
								<a><span class="isw-plus" id="btnAddPIC"></span> </a>
							</li>
						</ul>
					</div>
					<div class="block-fluid table-sorting clearfix">
					<table class="table" id="editclientpictbl">
						<thead>
							<tr><th width="90">Nama</th><th width="10">Aksi</th></tr>
						</thead>
						<tbody>
						</tbody>
					</table>
					</div>-->
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnSave">Simpan</button>
	</div>
</div>
<div id="dConfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Konfirmasi</h3>
	</div>
	<div class="modal-body">
		<div class='row-fluid'>
			<div class="span12">
				<div class="without-head">
					Data telah tersimpan
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
	</div>
</div>
<div id="dAddPIC" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myPICModalLabel">Penambahan PIC</h3>
	</div>
	<div class="modal-body">
		<div class='row-fluid'>
			<div class="span12">
				<div class="without-head">
						<div class="span4">Nama:</div>
						<div class="span8">
							<input type='text' class='addpic' name='addpic' id='addpic' />
						</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnSavePIC">Simpan</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
	</div>
</div>
