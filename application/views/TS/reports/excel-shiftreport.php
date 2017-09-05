<html>
	<head>
		<?php
		header("Content-Type: application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment;filename=Laporan-Bulanan-TS-".$datenospace.".xls");
		header("Cache-Control: private",false);
		?>
	</head>
	<body>
<table>
	<tbody>
		<tr><th>Laporan Shift <?php echo $date;?></th></tr>
		<?php $c=0;?>
		<?php foreach($tickets as $ticket){?>
			<?php $c++;?>
		<tr>
			<th rowspan=6 valign="top"><?php echo $c;?>.</th>
			<td>Pelanggan</td>
			<td>:</td>
			<td><?php echo $ticket->clientname;?></td>
		</tr>
		<tr>
			<td>Person</td>
			<td>:</td>
			<td><?php echo $ticket->reporter;?></td>
		</tr>
		<tr>
			<td>Pukul</td>
			<td>:</td>
			<td><?php echo $ticket->ticketstart;?></td>
		</tr>
		<tr>
			<td>Keluhan</td>
			<td>:</td>
			<td><?php echo $ticket->complaint;?></td>
		</tr>
		
		<tr>
			<td>Solusi</td>
			<td>:</td>
			<td>
				<?php foreach(getticketsolution($ticket->id) as $solution){?>
				<?php echo $solution->description;?>
				<?php }?>
			</td>
		</tr>
		<tr>
			<td>Status</td>
			<td>:</td>
			<td><?php echo ($ticket->status==="1")?"Selesai":"Belum Selesai";?></td>
		</tr>
		<?php }?>
	</tbody>
</table>
	</body>
</html>
