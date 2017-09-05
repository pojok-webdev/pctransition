<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
	<page_header>
		<table style="width: 100%; border: solid 1px black;">
			<tr>
				<td style="text-align: left;	width: 33%">PadiNET</td>
				<td style="text-align: center;	width: 34%">Laporan Hasil Maintenance</td>
				<td style="text-align: right;	width: 33%"><?php echo date('d/m/Y'); ?></td>
			</tr>
		</table>
	</page_header>
	<page_footer>
		<table style="width: 100%; border: solid 1px black;">
			<tr>
				<td style="text-align: left;	width: 50%">Laporan Hasil Maintenance</td>
				<td style="text-align: right;	width: 50%">Halaman [[page_cu]]/[[page_nb]]</td>
			</tr>
		</table>
	</page_footer>
	<span style="font-size: 20px; font-weight: bold">Laporan Maintenance <?php echo $obj->name;?></span><br>
	<table>
		<tr><td></td><td><b>Tanggal</b></td><td>: <?php echo $obj->maintenancedate;?></td></tr>
		<tr><td></td><td><b>Pelaksana</b></td><td>: <?php echo $obj->eos?></td></tr>
		<tr><td></td><td colspan=2><b>Data Pelanggan</b></td></tr>
		<tr><td></td><td>Nama</td><td>: <?php echo $obj->name;?></td></tr>
		<tr><td></td><td>Alamat</td><td>: <?php echo $obj->address;?></td></tr>
		<tr><td></td><td>Contact person</td><td>: <?php echo $obj->reporter;?></td></tr>
		<tr><td></td><td>Layanan</td><td>: <?php echo $obj->services;?></td></tr>

		<tr><td></td><td colspan=2><b>Topologi</b></td></tr>
		<?php foreach($topologies as $ii){?>
			<tr><td></td><td colspan=2><b><?php echo $ii->name?></b></td></tr>
			<tr><td></td><td colspan=2><img src="<?php echo $ii->image;?>" width="600" height="400" alt="image"></td></tr>
			<tr><td></td><td colspan=2><?php echo $ii->description?></td></tr>
			<tr><td></td><td colspan=2>&nbsp;</td></tr>
			<tr><td></td><td colspan=2>&nbsp;</td></tr> 
		<?php }?>

		<tr><td></td><td colspan=2><b>Dokumen</b></td></tr>
		<?php foreach($documents as $ii){?>
			<tr><td></td><td colspan=2><b><?php echo $ii->name?></b></td></tr>
			<tr><td></td><td colspan=2><img src="<?php echo $ii->image;?>" width="600" height="400" alt="image"></td></tr>
			<tr><td></td><td colspan=2><?php echo $ii->description?></td></tr>
			<tr><td></td><td colspan=2>&nbsp;</td></tr>
			<tr><td></td><td colspan=2>&nbsp;</td></tr> 
		<?php }?>

		<tr><td>6. </td><td colspan=2><b>Resume</b></td></tr>
		<tr><td></td><td colspan=2><b><?php echo $obj->resume;?></b></td></tr>
		<tr><td></td><td>Status Request Pelanggan</td><td>: <?php echo $obj->clientrequeststatus;?></td></tr>
	</table>
	<br />
	<br />
	<br />
	<table>
		<tr><td>Demikianlah laporan instalasi di  <?php echo $obj->name;?></td></tr>
		<tr><td>Terimakasih</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Pelaksana</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td><?php echo $obj->eos;?></td></tr>
	</table>
</page>
