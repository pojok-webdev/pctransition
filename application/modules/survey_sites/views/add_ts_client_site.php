<link rel='stylesheet' href='<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/css/jquery.fancybox-1.3.4.css' />
<script type='text/javascript' src='<?php echo base_url();?>js/jquery.fancybox-1.3.4.js'></script>
<script type='text/javascript'>
$(document).ready(function(){
	$('.fancy').fancybox();
});
</script>
<form action='<?php echo base_url();?>index.php/survey_sites/add_ts_client_site_handler' method='post'>
<h1>Site Klien</h1>
<input type='hidden' name='survey_id' value=<?php echo $uri['survey_id'];?>>
<input type='hidden' name='site_id' value=<?php echo $site_id;?>>
<table>
<tr>
<td><?php echo $this->lang->line('address');?></td><td>:</td><td><input type='text' name='address' value='<?php echo $address;?>' /></td>
<td><?php echo $this->lang->line('city');?></td><td>:</td><td><input type='text' name='city' value='<?php echo $city;?>' /></td>
</tr><tr>
<td><?php echo $this->lang->line('phone_area');?></td><td>:</td><td><input type='text' name='phone_area' value='<?php echo $phone_area;?>' /></td>
<td><?php echo $this->lang->line('phone');?></td><td>:</td><td><input type='text' name='phone' value='<?php echo $phone;?>' /></td>
</tr><tr>
<td><?php echo $this->lang->line('pic');?></td><td>:</td><td><input type='text' name='pic' value='<?php echo $pic;?>' /></td>
<td>
<?php echo $this->lang->line('position');?></td><td>:</td><td><input type='text' name='pic_position' value='<?php echo $pic_position;?>' />
</td>
</tr>
<tr>
<td>
<?php echo $this->lang->line('location');?> E</td><td>:</td><td>
<input type='text' class='text_short' name='location_e_degree' value='<?php echo $location_e_degree;?>' />
<input type='text' class='text_short' name='location_e_minute' value='<?php echo $location_e_minute;?>' />
<input type='text' class='text_short' name='location_e_second' value='<?php echo $location_e_second;?>' />
</td>
<td>
<?php echo $this->lang->line('location');?> S</td><td>:</td><td>
<input type='text' class='text_short' name='location_s_degree' value='<?php echo $location_s_degree;?>' />
<input type='text' class='text_short' name='location_s_minute' value='<?php echo $location_s_minute;?>' />
<input type='text' class='text_short' name='location_s_second' value='<?php echo $location_s_second;?>' />
</td>
</tr>

<tr>
<td>
<?php echo $this->lang->line('elevation');?> Ground</td><td>:</td><td>
<input type='text' name='elevation_ground' value='<?php echo $elevation_ground;?>' />
</td>
<td>
<?php echo $this->lang->line('elevation');?> Rooftop</td><td>:</td><td>
<input type='text' name='elevation_rooftop' value='<?php echo $elevation_rooftop;?>' />
</td>
</tr>

<tr>
<td>
<?php echo $this->lang->line('bearing');?></td><td>:</td><td>
<input type='text' name='bearing' value='<?php echo $bearing;?>' />
</td>
<td></td>
</tr>

<tr>
<td>
<?php echo $this->lang->line('leg_course');?></td><td>:</td><td>
<input type='text' name='leg_course' value='<?php echo $leg_course;?>' />
</td>
<td>
<?php echo $this->lang->line('leg_dist');?></td><td>:</td><td>
<input type='text' name='leg_dist' value='<?php echo $leg_dist;?>' />
</td>
</tr>


<tr>
<td>
<?php echo $this->lang->line('amsl');?></td><td>:</td><td>
<input type='text' name='amsl' value='<?php echo $amsl;?>' />
</td>
<td>
<?php echo $this->lang->line('agl');?></td><td>:</td><td>
<input type='text' name='agl' value='<?php echo $agl;?>' />
</td>
</tr>

</table>
<input type='submit' name='save' value='<?php echo $this->lang->line('save');?>' />
<a href='<?php echo base_url()?>index.php/survey_requests/entry_ts_survey_request/type/edit/id/<?php echo $uri['survey_id'];?>'>Batal</a>
<h1>Jarak dengan BTS</h1>
<input type='submit' name='add_bts' value='Add BTS' />
<input type='submit' name='remove_bts' value='Remove BTS' />
<table class='padi_table'>
	<thead><tr><th width='3px'></th><th>BTS</th><th>Jarak</th><th>LOS/NLOS</th><th>AP</th></tr></thead>
	<tbody>
	<?php 
	foreach ($survey_bts_distances as $bts){?>
	<tr>
	<td><input type='checkbox' name='distance[]' value='<?php echo $bts->id;?>' /></td>
	<td><?php echo $bts->btstower->name;?></td>
	<td><?php echo $bts->distance;?></td>
	<td><?php echo ($bts->los=='1')?'LOS':'NLOS';?></td>
	<td><?php echo $bts->ap;?></td>
	</tr>
	<?php }?>
	</tbody>
</table>


<h1>Jarak antar Pelanggan</h1>
<input type='submit' name='add_pelanggan' value='Add Pelanggan' />
<input type='submit' name='remove_pelanggan' value='Remove Pelanggan' />
<table class='padi_table'>
	<thead><tr><th width='3px'></th><th>Client</th><th>Jarak</th></tr></thead>
	<tbody>
	<?php 
	foreach ($survey_client_distance as $bts){?>
	<tr>
	<td><input type='checkbox' name='distance[]' value='<?php echo $bts->id;?>' /></td>
	<td><?php echo $bts->client->name;?></td>
	<td><?php echo $bts->distance;?></td>
	</tr>
	<?php }?>
	</tbody>
</table>


<h1>Foto</h1>
<input type='submit' name='add_foto' value='Add Foto' />
<input type='submit' name='remove_foto' value='Remove Foto' />
<table>
<?php foreach ($images as $image){?>
<tr>
<td><input type='checkbox' name='image[]' value='<?php echo $image->name;?>'></td>
<td><?php echo $image->name;?></td>
<td><a class='fancy' href='<?php echo base_url();?>media/surveys_used/<?php echo $image->name;?>'>Preview</a></td>
<td><a href='<?php echo base_url();?>index.php/back_end/edit_survey_image/img/<?php echo $image->name;?>'>Edit</a></td>
</tr>
<?php }?>
</table>


<h1>Material</h1>
<input type='submit' name='add_material' value='Add Material' <?php echo $add_material_enabled;?> />
<a href='<?php echo base_url();?>index.php/back_end/add_survey_material/type/edit/site_id/<?php echo $site_id;?>/survey_id/<?php echo $uri['survey_id'];?>'>Edit</a>
<table class='padi_table'>
	<thead><tr><th width='3px'></th><th>Nama</th><th>Jumlah</th></tr></thead>
	<tbody>
	<?php foreach ($survey_materials as $material){?>
	<tr>
	<td><input type='checkbox' name='distance[]' value='<?php echo $material->id;?>' /></td>
	<td><?php echo $material->name;?></td>
	<td><?php echo $material->amount;?></td>
	</tr>
	<?php }?>
	</tbody>
</table>


<h1>Perangkat</h1>
<input type='submit' name='add_device' value='Add Device' <?php echo $add_device_enabled;?> />
<a href='<?php echo base_url();?>index.php/back_end/add_survey_material/type/edit/site_id/<?php echo $site_id;?>/survey_id/<?php echo $uri['survey_id'];?>'>Edit</a>
<table class='padi_table'>
	<thead><tr><th width='3px'></th><th>Nama</th><th>Jumlah</th></tr></thead>
	<tbody>
	<?php foreach ($survey_devices as $key=>$val){?>
	<tr>
	<td></td>
	<td><?php echo $key;?></td>
	<td><?php echo $val;?></td>
	</tr>
	<?php }?>
	</tbody>
</table>


</form>