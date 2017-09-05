<html>
	<head>
		<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>css/aquarius/reports/padiReport.css' />
		<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.8.2.min.js'></script>
	</head>
	<body>
		<h1>Laporan History Ticket Per Pelanggan</h1>
		<h2>Pelanggan:<?php echo $objs->ticket->clientname;?></h2>
		<table width=100%>
			<thead>
				<tr>
					<th>PIC Name</th>
					<th>Position</th>
					<th>Hasil</th>
					<th>TS</th>
					<th>Keterangan</th>
					<th>Tgl Log</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan=5>Total</td><td>5</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach($objs as $obj){?>
				<?php 
					switch($obj->result){
						case '0':
							$result = "Progress";
						break;
						case '1':
							$result = "OK";
						break;
						case '3':
							$result = "Tidak dapat dihubungi";
						break;
					}
				?>
				<tr>
					<td><?php echo $obj->picname;?></td>
					<td><?php echo $obj->position;?></td>
					<td><?php echo $result;?></td>
					<td><?php echo $obj->username;?></td>
					<td><?php echo $obj->description;?></td>
					<td><?php echo $obj->createdate;?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
		<div id="btnHome">Ke Menu Utama</div>
		<div id="btnCetak">Cetak</div>
	</body>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/report.js'></script>
</html>
