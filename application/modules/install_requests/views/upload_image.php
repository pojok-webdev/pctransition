<link rel='stylesheet' href='<?php echo base_url();?>css/jquery.fancybox-1.3.4.css' />
<script type='text/javascript' src='<?php echo base_url();?>js/jquery.fancybox-1.3.4.js'></script>
<script type='text/javascript'>
imagename = function(par){
	alert(par);
	$('#image_name').val(par);
}
$(document).ready(function(){
	$('.fancy').fancybox();
	$('a#inline').fancybox();
	$('a.inline').fancybox();
});
</script>
<?php echo form_open(base_url() . 'index.php/install_requests/handler');?>
<table>
<tr>
<td>Keterangan</td><td>:</td><td><input type='text' name='image_description' /></td>
</tr>
<tr>
<td>Foto</td><td>:</td><td><input type='text' name='image_name' id='image_name' /></td>
</tr>
</table>
<?php echo form_submit('btn_save_foto','Save');?>
<?php echo form_close();?>
<?php
echo form_open_multipart(base_url() . 'index.php/install_requests/handler');
echo form_hidden('install_id',$install_id);
echo form_hidden('id',$install_id);
echo form_input(array('name'=>'userfile','type'=>'file'));
echo form_submit(array('name'=>'btn_save_foto','value'=>'upload'));
echo form_close();

echo anchor(base_url() . 'index.php/install_requests/ts_entry_install_request/type/edit/id/' . $install_id ,'Kembali ke request instalasi') . '<br />';

$c = 0;
foreach ($images as $file){
	echo '<a class="inline" href="#' . $c . '" ><img src=' . base_url() . 'media/installs/' . $file . ' /></a>';
	echo '<div style="display:none">';
	echo '<div id="' . $c . '">';
	echo '<img src=' . base_url() . 'media/installs/' . $file . '  /><br />';
//	echo anchor(base_url() . 'index.php/install_requests/use_image/install_id/' . $install_id . '/image/' . $file,'Pakai');
//http://localhost/workspace/db_teknis/index.php/install_requests/entry_image/type/add/install_id/1	
	echo anchor(base_url() . 'index.php/install_requests/entry_image/type/edit/install_id/' . $install_id . '/id/' . $id . '/name/' . $file ,'Pakai');
	echo anchor('#','Hapus');
	echo '</div>';
	echo '</div>';
	$c++;
}
?>
<br />
<div style="display:none">
<div id="data">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
</div></div>
