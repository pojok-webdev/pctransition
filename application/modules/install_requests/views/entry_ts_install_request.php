<link rel='stylesheet' href='<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/css/jquery.fancybox-1.3.4.css' />
<script type='text/javascript' src='<?php echo base_url();?>js/jquery.fancybox-1.3.4.js'></script>
<script type='text/javascript'>
$(document).ready(function(){
	$('.fancy').fancybox();
});
</script>

<h1>Entry Install request</h1>
<div class="content_isi">
<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/install_requests/handler">
<?php 
	echo form_hidden('type',$type);
	echo form_hidden('id',$id);
	echo form_hidden('install_id',$id);
	echo form_hidden('active','1');
	echo form_hidden('pic_name',$pic_name);
	echo form_hidden('pic_position',$pic_position);
	echo form_hidden('pic_phone',$pic_phone);
	echo form_hidden('clients',$client);
	echo form_hidden('followuplink','install_requests/entry_install_request');
?>
<div class="toolbar">
	<label>
	<input type="image" style="float: left; background: none;" src="<?php echo base_url()?>themes/<?php echo $this->setting['theme'];?>/images/save.png" value="save" name="btn_save">
	<br>
	<span style="clear:both; display:block;">Simpan</span>
	</label>
	<label>
	<input type="image" style="float: left; background: none;" src="<?php echo base_url()?>themes/<?php echo $this->setting['theme'];?>/images/cancel.png" value="cancel" name="btn_cancel">
	<br>
	<span style="clear:both; display:block;">Batal</span>
	</label>
	<label>
	<input class='heydingssmall2' type="submit" style="float: left; background: none;"  value="c" name="btn_revisi_tanggal_x" />
	<br>
	<span style="clear:both; display:block;">Rev.Tgl</span>
	</label>
	</div>
	<div id="form">
	<fieldset style="margin-top:50px">
	<legend>Entry Install Request</legend>
	<h2><?php echo $this->lang->line('data_from_sales');?></h2>
	<table width="100%" cellspacing="2" cellpadding="2" border="0">
	<tbody>
	<tr>
	<td width="23%"><?php echo $this->lang->line('name');?></td>
	<td width="1%">:</td>
	<td width="76%">
	<?php echo $client;?>
	</td>
	</tr>
	<tr>
	<td width="23%"><?php echo $this->lang->line('service');?></td>
	<td width="1%">:</td>
	<td width="76%">
	<?php echo $service;?>
	</td>
	</tr>
	<tr>
	<td width="23%">Installation date</td>
	<td width="1%">:</td>
	<td width="76%">
	<?php echo form_hidden('install_date',$install_date);?>
	<?php echo $install_date . ' ' . $hour . ':' . $minute;?>
	</td>
	</tr>
	<tr>
	<td width="23%">PIC name</td>
	<td width="1%">:</td>
	<td width="76%">
	<?php echo $pic_name;?>
	</td>
	</tr>
	<tr>
	<td width="23%">PIC position</td>
	<td width="1%">:</td>
	<td width="76%">
	<?php echo $pic_position;?>
	</td>
	</tr>
	<tr>
	<td width="23%">PIC phone</td>
	<td width="1%">:</td>
	<td width="76%">
	<?php echo $pic_phone;?>
	</td>
	</tr>
	<tr>
	<td>Surat Ijin</td>
	<td>:</td>
	<td>
	<?php echo $permit;?>
	</td>
	</tr>
	<tr>
	<td>Permanen atau trial ?</td>
	<td>:</td>
	<td>
	<?php echo ($permanen_trial=='0')?'Trial':'Permanent';?>
	</td>
	</tr>

	<tr>
	<td>Periode trial</td>
	<td>:</td>
	<td>
	<?php echo $trial_periode;?>
	</td>
	</tr>
	</tbody>
	</table>
	<h2>Pelaksanaan Instalasi</h2>
	<?php echo form_submit('btn_add_installer','Add Installer');?>
	<?php echo form_submit('btn_remove_installer','Remove Installer');?>
	<table class='table_detail'>
	<thead>
	<tr><th></th><th>Nama</th></tr>
	</thead>
	<tbody>
	<?php foreach ($tses as $ts){?>
	<tr>
	<td><?php echo form_checkbox('installer[]',$ts->id);?></td>
	<td><?php echo $ts->name;?></td>
	</tr>
	<?php }?>
	</tbody>
	</table>
	
	<?php if($permit!='-'){?>
	<table class='table_detail'>
	<thead>
	<tr>
	<th></th><th>Surat Ijin</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td>Surat Ijin sudah ada ?</td>
	<td>:</td>
	<td>
	<?php echo form_radio('surat_ijin1','');?>
	Ya
	<?php echo form_radio('surat_ijin2','');?>
	Tidak
	</td>
	</tr>
	<?php }?>
	</tbody>
	</table>
	<h2>Data Perangkat</h2>
	<h3><?php echo $this->lang->line('wireless_radio');?></h3>
	<input type='submit' name='btn_add_wireless_radio' value='Add' />
	<input type='submit' name='btn_remove_wireless_radio' value='Remove' />
	<table class='table_detail'>
	<thead>
	<tr>
	<th></th>
	<th>Tipe</th>
	<th>Macboard</th>
	<th>IP Radio</th>
	<th>IP AP</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($wireless_radios as $radio){?>
	<tr>
	<td><?php echo form_checkbox('radio[]',$radio->id);?></td>
	<td><?php echo $radio->tipe;?></td>
	<td><?php echo $radio->macboard;?></td>
	<td><?php echo $radio->ip_radio;?></td>
	<td><?php echo $radio->ip_ap;?></td>
	</tr>
	<?php }?>
	</tbody>
	</table>


	<h3><?php echo $this->lang->line('router');?></h3>
	<input type='submit' name='btn_add_router' value='Add' />
	<input type='submit' name='btn_remove_router' value='Remove' />
	<table class='table_detail'>
	<thead>
	<tr>
	<th></th>
	<th>Tipe</th>
	<th>Macboard</th>
	<th>IP Public</th>
	<th>IP Private</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($routers as $router){?>
	<tr>
	<td><?php echo form_checkbox('router[]',$router->id);?></td>
	<td><?php echo $router->tipe;?></td>
	<td><?php echo $router->macboard;?></td>
	<td><?php echo $router->ip_public;?></td>
	<td><?php echo $router->ip_private;?></td>
	</tr>
	<?php }?>
	</tbody>
	</table>

	<h3><?php echo $this->lang->line('access_point_wifi');?></h3>
	<input type='submit' name='btn_add_ap_wifi' value='Add' />
	<input type='submit' name='btn_remove_ap_wifi' value='Remove' />
	<table class='table_detail'>
	<thead>
	<tr>
	<th></th>
	<th>Tipe</th>
	<th>Macboard</th>
	<th>IP Address</th>
	<th>ESSID</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($ap_wifis as $ap){?>
	<tr>
	<td><?php echo form_checkbox('wifi[]',$ap->id);?></td>
	<td><?php echo $ap->tipe;?></td>
	<td><?php echo $ap->macboard;?></td>
	<td><?php echo $ap->ip_address;?></td>
	<td><?php echo $ap->essid;?></td>
	</tr>
	<?php }?>
	</tbody>
	</table>
	
	
	<h3>Foto</h3>
	<input type='submit' name='btn_add_foto' value='Add' />
	<input type='submit' name='btn_remove_foto' value='Remove' />
	<table class='table_detail'>
	<thead>
	<tr>
	<th></th>
	<th>Foto</th>
	<th>Keterangan</th>
	<th>Tindakan</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($images as $image){?>
	<tr>
	<td><?php echo form_checkbox('image[]',$image->id);?></td>
	<td><a class='fancy' href='<?php echo base_url();?>media/installs/<?php echo $image->name;?>'><?php echo $image->name;?></a></td>
	<td><?php echo $image->description;?></td>
	<td><?php echo anchor(base_url() . 'install_requests/entry_image/type/edit/install_id/' . $id . '/id/' . $image->id,'Edit');?></td>
	</tr>
	<?php }?>
	</tbody>
	</table>
	<h2>Monitor Tool</h2>
	<table class='install_monitor_tool'>
	<tr>
	<td>Create MRTG</td><td>:</td><td><?php echo form_checkbox('mrtg','1',$mrtg);?></td>
	</tr>
	<tr>
	<td>Create Whatsup</td><td>:</td><td><?php echo form_checkbox('whatsup','1',$whatsup);?></td>
	</tr>
	<tr>
	<td>Create Shapper</td><td>:</td><td><?php echo form_checkbox('shapper','1',$shapper);?></td>
	</tr>
	</table>

	<h2>Berita acara</h2>
	<table class='install_berita_acara'>
	<tr><td>Berita acara aktivasi 
	<?php foreach ($ba_aktivasi as $ba){?>
	<?php echo anchor(base_url() . 'media/installs/' . $ba->name,$ba->name) . '&nbsp' ;?>
	<?php }?>
	<?php echo form_submit('btn_upload_ba_aktivasi','Upload');?></td></tr>
	<tr><td>Berita acara instalasi 
	<?php foreach ($ba_instalasi as $ba){?>
	<?php echo anchor(base_url() . 'media/installs/' . $ba->name,$ba->name) . '&nbsp' ;?>
	<?php }?>
	
	<?php echo form_submit('btn_upload_ba_instalasi','Upload');?></td></tr>
	<tr><td>Serah terima barang 
	<?php foreach ($serah_terima as $ba){?>
	<?php echo anchor(base_url() . 'media/installs/' . $ba->name,$ba->name) . '&nbsp' ;?>
	<?php }?>
	<?php echo form_submit('btn_upload_serah_terima_brg','Upload');?></td></tr>
	<tr><td>Form kepuasan pelanggan 
	<?php foreach ($form_kepuasan as $ba){?>
	<?php echo anchor(base_url() . 'media/installs/' . $ba->name,$ba->name) . '&nbsp' ;?>
	<?php }?>
	<?php echo form_submit('btn_upload_form_kepuasan_plg','Upload');?></td></tr> 
	</table>
	</fieldset>
	</div>
	</form>
	</div>
	<div id="footer"><?php echo $this->setting['footer_text'];?></div>            
