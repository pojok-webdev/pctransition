<html>
<h1>Field Report</h1>
<table>
<tr>
<th>LOKASI</th><th>:</th><th>SURABAYA</th>
</tr><tr>
<th>JENIS</th><th>:</th><th>SURVEY PTP/WLL</th>
</tr>
</table>

<table>
<tr>
<td>Nama Calon Customer</td><td>:</td><td><?php echo $client;?></td>
</tr>
<tr>
<td>Tipe Bisnis</td><td>:</td><td><?php echo $business_field;?></td>
</tr>
<?php 
$c = 1;
foreach ($client_sites as $site){
?>
<tr>
<td>Alamat <?php echo $c;?></td><td>:</td><td><?php echo $site->address;?></td>
</tr>
<?php 
$c++;
}
?>
<tr>
<td>Tgl Pelaksanaan</td><td>:</td><td><?php echo $survey_date;?></td>
</tr>
<tr>
<td>Pelaksana</td><td>:</td><td><?php echo $surveyors;?></td>
</tr>
</table>
<h1>A. Data Teknis</h1>
<table class='report_site_tables'>
<tbody>
<?php foreach ($sites as $site){?>
<tr><th colspan=3><?php echo $site[0]->address;?></th><th colspan=3><?php echo (isset($site[1]))?$site[1]->address:'';?></th></tr>

<tr>
<td>Location</td><td>:</td><td><?php echo $site[0]->location_s_degree . $site[0]->location_s_minute . $site[0]->location_s_second;?></td>
<?php echo (isset($site[1]))?'<td>Location</td><td>:</td><td>' . $site[1]->location_s_degree . $site[1]->location_s_minute . $site[1]->location_s_second . '</td>':'<td colspan=3></td>';?>
</tr>
<tr>
<td></td><td></td><td><?php echo $site[0]->location_e_degree . $site[0]->location_e_minute . $site[0]->location_e_second;?></td>
<td></td><td></td><td><?php echo (isset($site[1]))?$site[1]->location_s_degree . $site[1]->location_s_minute . $site[1]->location_s_second:'' ;?></td>
</tr>
<tr>
<td>Elevation</td><td>:</td><td><?php echo $site[0]->elevation_rooftop;?></td>
<?php echo (isset($site[1]))?'<td>Elevation</td><td>:</td><td>' . $site[1]->elevation_rooftop . '</td>':'<td colspan=3></td>'?>
</tr>
<tr>
<td></td><td></td><td><?php echo $site[0]->elevation_ground;?></td>
<?php echo (isset($site[1]))?'<td></td><td>:</td><td>' . $site[1]->elevation_ground . '</td>':'<td colspan=3></td>'?>
</tr>
<?php }?>

</tbody>
</table>

<h1>B. Foto Lokasi</h1>

<table class='report_image_tables'>
<tbody>
<?php foreach ($client_sites as $site){?>
<tr><th colspan=2><?php echo $site->address;?></th></tr>
<?php foreach (Survey_site::get_images($site->id) as $image){?>
<tr><td><img src='<?php echo base_url();?>media/surveys_used/<?php echo $image[0]->name;?>' /></td>
<td><?php echo (isset($image[1]))?'<img src=' . base_url() . 'media/surveys_used/' . $image[1]->name . ' />':'';?></td></tr>
<?php }?>
<?php }?>

</tbody>
</table>

<h1>C. Data Jarak</h1>
<h2>1. Link PTP</h2>

<table class='report_distance_tables'>
<thead>
<tr><th>Lokasi</th><th>BTS</th><th>Jarak</th><th>Keterangan</th></tr>
</thead>
<tbody>
<?php foreach ($client_sites as $site){?>
<?php foreach (Survey_site::get_client_distance($site->id) as $distance){?>
<tr>
<td><label class='addr'><?php echo $site->address;?></label></td>
<td><?php echo $distance->client->name;?></td>
<td><?php echo $distance->distance;?></td>
<td></td>
</tr>
<?php }?>
<?php }?>

</tbody>
</table>


<h2>2. Link ke BTS</h2>

<table class='report_distance_tables'>
<thead>
<tr><th>Lokasi</th><th>BTS</th><th>Jarak</th><th>Keterangan</th></tr>
</thead>
<tbody>
<?php foreach ($client_sites as $site){?>
<?php foreach (Survey_site::get_distance_report($site->id) as $distance){?>
<tr>
<td><label class='addr'><?php echo $site->address;?></label></td>
<td><?php echo $distance->btstower->name;?></td>
<td><?php echo $distance->distance;?></td>
<td><?php echo ($distance->los=='1')?'LOS':'NLOS';?></td>
<td></td>
</tr>
<?php }?>
<?php }?>

</tbody>
</table>

<h1>D. Kebutuhan Instalasi</h1>
<h2>1. Material</h2>
<?php foreach ($client_sites as $site){?>
<strong><?php echo $site->address;?></strong>
<table class='report_distance_tables'>
<thead>
<tr><th>No</th><th>Nama</th><th>Banyak/Satuan</th></tr>
</thead>
<tbody>
<?php 
//foreach ($client_sites as $site){
?>
<?php 
$c = 1;
foreach (Survey_site::get_material_report($site->id) as $material){
?>
<tr>
<td><?php echo $c;?></td>
<td><?php echo $material->name;?></td>
<td><?php echo $material->amount;?></td>
<td></td>
</tr>
<?php 
$c++;
}
?>
<?php 
//}
?>
<?php }?>
</tbody>
</table>

<h2>2. Perangkat</h2>

<?php foreach ($client_sites as $site){?>

<table class='report_distance_tables'>
<thead>
<tr><th colspan=3><strong><?php echo $site->address;?></strong></th></tr>
<tr><th>No</th><th>Nama</th><th>Status</th><th>Banyak/Satuan</th></tr>
</thead>
<tbody>
<?php 
//foreach ($client_sites as $site){
?>
<?php 
$c = 1;
foreach (Survey_site::get_device_report($site->id) as $device){
?>
<tr>
<td><?php echo $c;?></td>
<td><?php echo $device->name;?></td>
<td><?php echo ($device->status=='1')?'Dipinjamkan':'Diberikan';?></td>
<td><?php echo $device->amount;?></td>
<td></td>
</tr>
<?php 
$c++;
}
?>
<?php 
//}
?>
<?php }?>
</tbody>
</table>

<h1>E. Resume</h1>
</html>