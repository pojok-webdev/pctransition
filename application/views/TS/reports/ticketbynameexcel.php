<html>
	<head>
		<?php
		header("Content-Type: application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment;filename=Laporan-Ticket.xls");
		header("Cache-Control: private",false);
		?>
	</head>
	<body>
			<table id="rpt" class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Tgl</th>
						<th>Pelapor</th>
						<th>Komplain</th>
						<th>Waktu Komplain</th>
						<th>Downtime</th>
						<th>Action</th>
						<th>Kesimpulan</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php $c=0;?>
					<?php foreach($tickets as $ticket){?>
						<?php $c++;?>
					<tr>
						<th valign="top"><?php echo $c;?>.</th>
						<td><?php echo $ticket->ticketdatestart;?></td>
						<td>
							<?php echo $ticket->reporter;?>
						</td>
						<td>
							<?php echo $ticket->complaint;?>
						</td>
						<td>
							<?php echo $ticket->tickettimestart;?>
						</td>
						<td>
							<?php echo $ticket->downtimeday . " hari " .$ticket->downtimetime . " menit";?>
						</td>
						<td>
							<?php echo $ticket->description;?>
						</td>
						<td>
							<?php echo $ticket->confirmationresult;?>
						</td>
						<td>
							<?php echo $ticket->textstatus;?>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		
	</body>
</html>
