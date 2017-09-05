<table>
<tr><td colspan=3>Field Report</td></tr>
<tr><td>Lokasi</td><td>:</td><td>SURABAYA</td></tr>
<tr><td>Jenis</td><td>:</td><td>SURVEY PTP/WLL</td></tr>
</table>

<table>
<tr><td>Nama Customer</td><td>:</td><td>XXX</td></tr>
<tr><td>Tipe Bisnis</td><td>:</td><td>XXX</td></tr>
<tr><td>Alamat</td><td>:</td><td>XXX</td></tr>
<tr><td>Tanggal pelaksanaan</td><td>:</td><td><?php echo $request->install_request;?></td></tr>

<tr><td>Pelaksana</td><td>:</td><td>
<?php foreach ($installers as $installer){?>
<?php echo $installer->name . '&nbsp';?>
<?php }?>
</td></tr>

</table>