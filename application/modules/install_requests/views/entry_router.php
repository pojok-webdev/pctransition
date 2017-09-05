<?php echo form_open(base_url() . 'index.php/install_requests/handler')?>
<?php echo form_hidden('install_id',$install_id);?>
<table>
<tr>
<td>Tipe</td><td>:</td><td><input type='text' name='router_type' /></td>
</tr>
<tr>
<td>Macboard</td><td>:</td><td><input type='text' name='router_macboard' /></td>
</tr>
<tr>
<td>IP Public</td><td>:</td><td><input type='text' name ='router_ip_public' /></td>
</tr>
<tr>
<td>IP Private</td><td>:</td><td><input type='text' name = 'router_ip_private' /></td>
</tr>
<tr>
<td>User Router</td><td>:</td><td><input type='text' name = 'router_user' /></td>
</tr>
<tr>
<td>Password Router</td><td>:</td><td><input type='text' name = 'router_password' /></td>
</tr>
<tr>
<td>Lokasi Router</td><td>:</td><td><input type='text' name='router_location' /></td>
</tr>
</table>
<?php echo form_submit('btn_router_save','Save');?>
<?php echo form_submit('btn_router_close','Close');?>
<?php echo form_close();?>