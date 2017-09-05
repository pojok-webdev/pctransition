<?php echo form_open(base_url() . 'index.php/install_requests/handler')?>
<?php echo form_hidden('install_id',$install_id);?>
<table>
<tr>
<td>Tipe</td><td>:</td><td><input type='text' name='ap_wifi_type' /></td>
</tr>
<tr>
<td>Macboard</td><td>:</td><td><input type='text' name='ap_wifi_macboard' /></td>
</tr>
<tr>
<td>IP Public</td><td>:</td><td><input type='text' name ='ap_wifi_ip_address' /></td>
</tr>
<tr>
<td>IP Private</td><td>:</td><td><input type='text' name = 'ap_wifi_essid' /></td>
</tr>
<tr>
<td>Security Key</td><td>:</td><td><input type='text' name='ap_wifi_security_key' /></td>
</tr>
<tr>
<td>User Router</td><td>:</td><td><input type='text' name = 'ap_wifi_user' /></td>
</tr>
<tr>
<td>Password Router</td><td>:</td><td><input type='text' name = 'ap_wifi_password' /></td>
</tr>
<tr>
<td>Lokasi Router</td><td>:</td><td><input type='text' name='ap_wifi_location' /></td>
</tr>
</table>
<?php echo form_submit('btn_ap_wifi_save','Save');?>
<?php echo form_submit('btn_ap_wifi_close','Close');?>
<?php echo form_close();?>