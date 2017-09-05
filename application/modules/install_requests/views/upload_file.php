<link rel='stylesheet' href='<?php echo base_url();?>css/jquery.fancybox-1.3.4.css' />
<script type='text/javascript' src='<?php echo base_url();?>js/jquery.fancybox-1.3.4.js'></script>
<?php
echo form_open_multipart(base_url() . 'index.php/install_requests/handler');
?>
<table>
<tr>
<td>Keterangan</td><td>:</td><td><input type='text' name='file_description' /></td>
</tr>
</table>
<?php 
echo form_hidden('install_id',$install_id);
echo form_hidden('id',$install_id);
echo form_hidden('ftype',$ftype);
echo form_input(array('name'=>'test','value'=>'satudua'));
echo form_input(array('name'=>'userfile','type'=>'file'));
echo form_submit(array('name'=>'btn_save_file','value'=>'upload'));
echo form_close();
echo anchor(base_url() . 'index.php/install_requests/ts_entry_install_request/type/edit/id/' . $install_id ,'Kembali ke request instalasi') . '<br />';
?>