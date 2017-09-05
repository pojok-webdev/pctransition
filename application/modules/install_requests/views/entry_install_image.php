<?php echo form_open(base_url() . 'index.php/install_requests/handler');?>
<?php echo form_hidden('install_id',$install_id);?>
<?php echo form_hidden('type',$type);?>
<?php echo form_hidden('id',$id);?>
<?php echo form_hidden('image_name',$name);?>
<table>
<tr>
<td>Description</td><td>:</td><td><?php echo form_input('image_description',$description,'id="image_description"');?></td>
</tr>
<tr>
<td>Name</td><td>:</td>
<td>
<?php echo form_input('name',$name,'id="image_name" disabled="true"');?>
<?php echo form_submit('btn_install_image_upload','Browse');?>
</td>
</tr>
</table>
<?php echo form_submit('btn_install_image_save','Save');?>
<?php echo form_submit('btn_install_image_close','Close');?>
<?php echo form_close();?>