<h1>FIELD REPORT</h1>
<table>
<tr>
<td>LOKASI</td><td>:</td><td>SURABAYA</td>
</tr>
<tr>
<td>JENIS</td><td>:</td><td>SURVEY PTP/WLL</td>
</tr>
<tr>
<td>Nama Calon Customer</td><td>:</td><td><?php echo $client; ?></td>
</tr>
<tr>
<td>Tipe Bisnis</td><td>:</td><td><?php echo $business_type; ?></td>
</tr>

<?php $c = 1;foreach ($sites as $site){?>
<tr>
<td>Alamat <?php echo $c;?></td><td>:</td><td><?php echo $site->address; ?></td>
</tr>

<?php $c++;}?>

<tr>
<td>Tanggal Pelaksanaan</td><td>:</td><td><?php echo $survey_date; ?></td>
</tr>


<tr>
<td>Surveyor</td><td>:</td><td><?php echo $surveyors; ?></td>
</tr>


</table>
<h2>A. Data Teknis</h2>
<table>
<tr>
<?php $c = 1;foreach ($sites as $site){?>
<td>
	<table>
	<tr>
	<td colspan=3><?php echo $site->address;?></td>
	</tr>
	<tr>
	<td>Location E</td><td>:</td><td><?php echo $site->location_e_degree . '<sup>0</sup>' . $site->location_e_minute . '<sup>"</sup>' . $site->location_e_second; ?><sup>'</sup></td>
	</tr><tr>
	<td>Location S</td><td>:</td><td><?php echo $site->location_s_degree . '<sup>0</sup>' . $site->location_s_minute . '<sup>"</sup>' . $site->location_s_second; ?><sup>'</sup></td>
	</tr>

	<tr>
	<td>Elevation </td><td>:</td><td><?php echo $site->amsl;?> (AMSL)</td>
	</tr><tr>
	<td>Location S</td><td>:</td><td><?php echo $site->agl; ?> (AGL)</td>
	</tr>

	</table>
</td>

<?php if($c%2==0){?>
</tr><tr>
<?php }?>
<?php $c++;}?>
</tr>
</table>

<h2>B. Foto Lokasi</h2>
<?php $c = 1;foreach ($sites as $site){?>
<h3><?php echo $site->address;?></h3>
<?php foreach (Survey_image::get_image_by_site($site->id) as $image){?>
<img src='<?php echo base_url();?>media/surveys_used/<?php echo $image->name;?>' />
<?php }?>
<?php $c++;}?>
