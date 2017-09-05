<h1>Entry Install request</h1>
<div class="content_isi">
<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/install_requests/entry_install_request_handler">
<?php 
	echo form_hidden('type',$type);
	echo form_hidden('id',$id);
	echo form_hidden('survey_id',$survey_id);
	echo form_hidden('followuplink','install_requests/entry_ts_install_request');
?>
<div class="toolbar">
<label>
<input type="image" style="float: left; background: none;" src="<?php echo base_url()?>themes/<?php echo $this->setting['theme'];?>/images/save.png" value="save" name="save">
<br>
<span style="clear:both; display:block;">Simpan</span>
</label>
<label>
<input type="image" style="float: left; background: none;" src="<?php echo base_url()?>themes/<?php echo $this->setting['theme'];?>/images/cancel.png" value="cancel" name="cancel">
<br>
<span style="clear:both; display:block;">Batal</span>
</label>
</div>
<div id="form">
<fieldset style="margin-top:50px">
<table width="100%" cellspacing="2" cellpadding="2" border="0">
<tbody>
<tr>
<td width="23%"><?php echo $this->lang->line('name');?></td>
<td width="1%">:</td>
<td width="76%">
<?php echo form_dropdown('client',$clients, $client);?>
</td>
</tr>
<tr>
<td width="23%"><?php echo $this->lang->line('service');?></td>
<td width="1%">:</td>
<td width="76%">
<?php echo form_dropdown('service',$services, $service);?>
</td>
</tr>
<tr>
<td width="23%">Install date</td>
<td width="1%">:</td>
<td width="76%">
<input id="install_date" type="text" value="<?php echo $install_date;?>"  name="install_date" class="text_medium dtpicker">
<?php echo form_dropdown('hour',Common::get_hours_array(), $hour);?>
<?php echo form_dropdown('minute',Common::get_minutes_array(), $minute);?>
<?php echo $ts_date . '</label>';?>
</td>
</tr>
<tr>
<td width="23%">PIC name</td>
<td width="1%">:</td>
<td width="76%">
<input id="pic_name" type="text" value="<?php echo $pic_name;?>"  name="pic_name" class="text_long">
</td>
</tr>
<tr>
<td width="23%">PIC position</td>
<td width="1%">:</td>
<td width="76%">
<input id="pic_position" type="text" value="<?php echo $pic_position;?>"  name="pic_position" class="text_long">
</td>
</tr>
<tr>
<td width="23%">PIC phone</td>
<td width="1%">:</td>
<td width="76%">
<input id="pic_phone" type="text" value="<?php echo $pic_phone;?>"  name="pic_phone" class="text_long">
</td>
</tr>
<tr>
<td width="23%">Trial/Permanent</td>
<td width="1%">:</td>
<td width="76%">
<?php echo form_radio('trial_permanent','1',$trial_permanent);?>
Trial
<?php echo form_radio('trial_permanent','0',!$trial_permanent);?>
Permanent
</td>
</tr>
<tr>
<td width="23%">Periode Trial</td>
<td width="1%">:</td>
<td width="76%">
<input id="trial_periode1" type="text" value="<?php echo $trial_periode1;?>"  name="trial_periode1" class="text_medium dtpicker">
<input id="trial_periode2" type="text" value="<?php echo $trial_periode2;?>"  name="trial_periode2" class="text_medium dtpicker">
</td>
</tr>
<tr>
<td>Surat Ijin</td>
<td>:</td>
<td>
<?php echo form_radio('permit','1',$permit);?>
Ya
<?php echo form_radio('permit','0',!$permit);?>
Tidak
</td>
</tr>
</tbody>
</table>

<?php //echo anchor(base_url() . 'index.php/back_end/add_client_site/client/' . $client,'Add');
echo form_submit('add_client_site','Add Client Site');
?>
<table class='padi_table'>
<thead>
<tr><th>Address</th><th>Telp</th><th>PIC</th><th>Action</th></tr>
</thead>
<tbody>
<?php foreach ($sites as $site){?>
<tr>
<td><?php echo $site->address;?></td>
<td><?php echo $site->phone_area . ' - ' . $site->phone;?></td>
<td><?php echo $site->pic . ' - (' . $site->pic_position . ')';?></td>
<td><?php echo anchor(base_url() . 'index.php/back_end/delete_client_site/id/' . $site->id . '/request/' . $id,'Delete');?></td>
</tr>
<?php }?>
</tbody>
</table>
</fieldset>
</div>

</form>
</div>
<div id="footer"><?php echo $this->setting['footer_text'];?></div>            