<h1>Entry Wireless Radio</h1>
<div class="content_isi">
<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/install_wireless_radios/add_handler">
<?php 
	echo form_hidden('install_request_id',$install_request_id);
	echo form_hidden('id',$id);
	echo form_hidden('type',$type);
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
	<legend>Entry Install Request</legend>
	<h2><?php echo $this->lang->line('data_from_sales');?></h2>
	<table width="100%" cellspacing="2" cellpadding="2" border="0">
	<tbody>

		<tr>
		<td width="23%"><?php echo $this->lang->line('type');?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('radio_type',$radio_type);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'Macboard';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('macboard',$macboard);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'IP Radio';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('ip_radio',$ip_radio);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'AP id';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('ap_id',$ap_id);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'IP AP';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('ip_ap',$ip_ap);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'ESSID';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('essid',$essid);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'Freqwency';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('freqwency',$freqwency);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'Polarization';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('polarization',$polarization);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'Signal';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('signal',$signal);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'Quality';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('quality',$quality);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'Throughput UDP';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('throughput_udp',$throughput_udp);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'Throughput TCP';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('throughput_tcp',$throughput_tcp);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'User';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('user',$user);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'Password';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('password',$password);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'PC Card Type';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('pc_card_type',$pc_card_type);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'PC Card Mac Address';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('pc_card_mac_address',$pc_card_mac_address);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'Antenna type';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('antenna_type',$antenna_type);?>
		</td>
		</tr>
		<tr>
		<td width="23%"><?php echo 'Antenna location';?></td>
		<td width="1%">:</td>
		<td width="76%">
		<?php echo form_input('antenna_address',$antenna_address);?>
		</td>
		</tr>
	</tbody>
	</table>
	</fieldset>
	</div>
	</form>
	</div>
	<div id="footer"><?php echo $this->setting['footer_text'];?></div>            
