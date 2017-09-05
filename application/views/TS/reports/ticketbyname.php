<html>
	<head>
		<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
		<link rel="stylesheet" href="<?php echo base_url();?>asset/report/bootstrap-3.3.6.min.css">
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
		<script src="<?php echo base_url();?>asset/report/jquery-1.12.0.min.js"></script>
		<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>		-->
		<script src="<?php echo base_url();?>asset/report/bootstrap-3.3.6.min.js"></script>		
		<title>Laporan Berdasarkan Pelanggan </title>
	</head>
	<body>
		<div class="container">
		<div class="jumbotron">
		<h3>Laporan Berdasarkan Pelanggan <?php echo $clientname;?></h3>
		<h5>
			<a href="<?php echo base_url()?>rpt">Home</a>
			<!--<a href="<?php echo base_url()?>rpt/excelshiftreport/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php echo $this->uri->segment(5);?>">Download Excel</a>-->
			<a href="<?php echo base_url()?>rpt/ticketbyname/asc/<?php echo $this->uri->segment(4);?>">asc</a>
			<a href="<?php echo base_url()?>rpt/ticketbyname/desc/<?php echo $this->uri->segment(4);?>">desc</a>
		</h5>
		Dari bulan <input type="text" class="datepicker" > Sampai bulan <input type="text" class="datepicker" > Semua
		</div>
		<div class="row">
			<table id="rpt" class="table">
				<tbody>
					<?php $c=0;?>
					<?php foreach($tickets as $ticket){?>
						<?php $c++;?>
					<tr>
						<th rowspan=5 valign="top"><?php echo $c;?>.</th>
						<td>
							Tanggal
						</td>
						<td>
							:
						</td>
						<td>
							<?php echo $ticket->ticketdatestart . " " .$ticket->tickettimestart;?>
						</td>
					</tr>
					<tr>
						<td>
							Person
						</td>
						<td>
							:
						</td>
						<td>
							<?php echo $ticket->reporter;?>
						</td>
					</tr>
					<tr>
						<td>
							Keluhan
						</td>
						<td>
							:
						</td>
						<td>
							<?php echo $ticket->complaint;?>
						</td>
					</tr>
					
					<tr>
						<td>
							Solusi
						</td>
						<td>
							:
						</td>
						<td>
							<?php foreach(getticketsolution($ticket->id) as $solution){?>
							<?php echo $solution->description;?>
							<?php }?>
						</td>
					</tr>
					<tr>
						<td>
							Status
						</td>
						<td>
							:
						</td>
						<td>
							<?php echo ($ticket->status==="1")?"Selesai":"Belum Selesai";?>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
		</div>
		<script type="text/javascript">
			(function($){
				$(".survey").mouseover(function(){
					var dt = $(this).attr("dt");
					$(".surveydetail."+dt).css("color","red");
					console.log($(this).attr("dt"));
				});
				$(".survey").mouseout(function(){
					var dt = $(this).attr("dt");
					$(".surveydetail."+dt).css("color","black");
					console.log($(this).attr("dt"));
				});
				$(".installation").mouseover(function(){
					var dt = $(this).attr("dt");
					$(".installdetail."+dt).css("color","red");
					console.log($(this).attr("dt"));
				});
				$(".installation").mouseout(function(){
					var dt = $(this).attr("dt");
					$(".installdetail."+dt).css("color","black");
					console.log($(this).attr("dt"));
				});
				$(".troubleshoot").mouseover(function(){
					var dt = $(this).attr("dt");
					$(".troubleshootdetail."+dt).css("color","red");
					console.log($(this).attr("dt"));
				});
				$(".troubleshoot").mouseout(function(){
					var dt = $(this).attr("dt");
					$(".troubleshootdetail."+dt).css("color","black");
					console.log($(this).attr("dt"));
				});
			}(jQuery))
		</script>

	</body>
</html>
