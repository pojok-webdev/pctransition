<html>
	<head>
		<link rel='stylesheet' href='<?php echo base_url();?>css/reports/report.css' />
		<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.8.2.min.js'></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.14.custom.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.debug.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.min.js"></script>
	</head>
	<body>
		<div id="ticketperpelanggan">
		<h2>Rekap Ticket <span id="clientname"><?php echo $objs->clientname . ' ('.$objs->requesttype.')';?></span></h2>
		<table class='report'>
			<thead>
				<tr><th>Kode Ticket</th><th>Tanggal Ticket</th><th>Permasalahan</th><th>Solusi</th></tr>
			</thead>
			<tbody>
				<?php foreach($objs as $obj){?>
				<tr>
					<td><?php echo $obj->kdticket;?></td>
					<td><?php echo $obj->create_date;?></td>
					<td><?php echo $obj->cause;?></td>
					<td><?php echo $obj->solution;?></td></tr>
				<?php }?>
			</tbody>
		</table>
		</div>
	<div id="btnHome">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ke Menu Utama</div>
	<div class="downloadPDF" id="downloadPDF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Download PDF</div>
	<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/ticketperpelanggan.js"></script>
	</body>
</html>
