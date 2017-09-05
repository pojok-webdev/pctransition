<?php echo form_open(base_url() . 'index.php/install_requests/handler');?>
<?php echo form_hidden('install_id',$install_id);?>
<table>
<tr>
<td>Nama</td><td><?php echo form_dropdown('installer',$installers, $installer);?></td>
</tr>
</table>
<?php echo form_submit('btn_save_installer','Add');?>
<?php echo form_submit('btn_close','Close');?>
<?php echo form_close();?>