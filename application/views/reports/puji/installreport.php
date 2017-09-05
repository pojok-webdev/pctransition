<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
	<page_header>
		<table style="width: 100%; border: solid 1px black;">
			<tr>
				<td style="text-align: left;	width: 33%">PadiNET</td>
				<td style="text-align: center;	width: 34%">Laporan Hasil Instalasi</td>
				<td style="text-align: right;	width: 33%"><?php echo date('d/m/Y'); ?></td>
			</tr>
		</table>
	</page_header>
	<page_footer>
		<table style="width: 100%; border: solid 1px black;">
			<tr>
				<td style="text-align: left;	width: 50%">Laporan Hasil Instalasi</td>
				<td style="text-align: right;	width: 50%">Halaman [[page_cu]]/[[page_nb]]</td>
			</tr>
		</table>
	</page_footer>
	<span style="font-size: 20px; font-weight: bold">Laporan Instalasi <?php echo $obj->name;?></span><br>
	<table>
		<tr><td>1. </td><td><b>Tanggal</b></td><td>: <?php echo $obj->ins_date;?></td></tr>
		<tr><td>2. </td><td><b>Pelaksana</b></td><td>: <?php echo $obj->xcutor?></td></tr>
		<tr><td>3. </td><td colspan=2><b>Data Pelanggan</b></td></tr>
		<tr><td></td><td>Nama</td><td>: <?php echo $obj->name;?></td></tr>
		<tr><td></td><td>Alamat</td><td>: <?php echo $obj->address;?></td></tr>
		<tr><td></td><td>Contact person</td><td>: <?php echo $obj->pic;?></td></tr>
		<tr><td></td><td>Layanan</td><td>: <?php echo $obj->srv;?></td></tr>
		<tr><td>4. </td><td colspan=2><b>Data Perangkat</b></td></tr>
		<tr><td></td><td colspan=2>Radio Wireless</td></tr>
		<tr><td></td><td>Nama Perangkat</td><td>: <?php echo $obj->iwtipe;?></td></tr>
		<tr><td></td><td>MacBoard</td><td>: <?php echo $obj->iwmacboard;?></td></tr>
		<tr><td></td><td>IP AP BTS</td><td>: <?php echo $obj->iwip_ap;?></td></tr>
		<tr><td></td><td>ESS ID</td><td>: <?php echo $obj->iwessid;?></td></tr>
		<tr><td></td><td>IP Ethernet</td><td>: <?php echo $obj->iwip_ethernet;?></td></tr>
		<tr><td></td><td>Frekwensi</td><td>: <?php echo $obj->iwfreqwency;?></td></tr>
		<tr><td></td><td>Polarisasi</td><td>: <?php echo $obj->iwpolarization;?></td></tr>
		<tr><td></td><td>Signal</td><td>: <?php echo $obj->iwsignal;?></td></tr>
		<tr><td></td><td>Quality CCQ</td><td>: <?php echo $obj->iwquality;?></td></tr>
		<tr><td></td><td>Throughput UDP</td><td>: <?php echo $obj->iwthroughput_udp;?></td></tr>
		<tr><td></td><td>Throughput TCP</td><td>: <?php echo $obj->iwthroughput_tcp;?></td></tr>
		<tr><td></td><td>User Radio</td><td>: <?php echo $obj->iwuser;?></td></tr>
		<tr><td></td><td>Password Radio</td><td>: <?php echo $obj->iwpassword;?></td></tr>
		<tr><td>5. </td><td colspan=2><b>Dokumentasi</b></td></tr>
		<?php foreach($install_images as $ii){?>
			<tr><td></td><td colspan=2><b><?php echo $ii->title?></b></td></tr>
			<tr><td></td><td colspan=2><img src="<?php echo $ii->img;?>" width="600" height="400" alt="image"></td></tr>
			<tr><td></td><td colspan=2><?php echo $ii->description?></td></tr>
			<tr><td></td><td colspan=2>&nbsp;</td></tr>
			<tr><td></td><td colspan=2>&nbsp;</td></tr> 
		<?php }?>
		<tr><td>6. </td><td colspan=2><b>Resume</b></td></tr>
		<tr><td></td><td colspan=2><b><?php echo $obj->resume;?></b></td></tr>
		<tr><td></td><td>Status Instalasi</td><td>: <?php echo $obj->installstatus;?></td></tr>
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
		<tr><td><?php echo $obj->xcutor?></td></tr>
	</table>
</page>
