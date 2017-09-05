<html>
	<head>
		<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
		<link rel="stylesheet" href="<?php echo base_url();?>asset/report/bootstrap-3.3.6.min.css">
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
		<script src="<?php echo base_url();?>asset/report/jquery-1.12.0.min.js"></script>
		<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>		-->
		<script src="<?php echo base_url();?>asset/report/bootstrap-3.3.6.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/padilibs/padi.url.js"></script>	
		<title>Laporan Shift TS <?php echo $date;?> </title>
	</head>
	<body>
		<div class="container">
		<div class="jumbotron">
		<h3>Laporan Harian TS , <?php echo $date;?> </h3>
		<h5>
				<?php
				foreach($arrbranch as $br){
					$ischecked = false;
					$checked = "";
					for($c=0;$c<strlen($userbranches);$c++){
						if(substr($this->uri->segment(6),$c,1)===$br){
							$ischecked = true;
						}
					}
					if($ischecked){
						$checked = "checked='checked'";
					}
					echo '<label class="checkbox-inline suspect-branches"><input type="checkbox" value="'.$br.'" '. $checked .' >';
					echo getbranch($br) . " ";
					echo '</label>';
				}	

				?>		

				<button class="btn btn-success" id="btnfilter">Filter</button>			
			<a href="<?php echo base_url()?>rpt" class="btn btn-success">Home</a>
			<a href="<?php echo base_url()?>rpt/excelshiftreport/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php echo $this->uri->segment(5);?>/<?php echo $this->uri->segment(6);?>" class="btn btn-success">Download Excel</a>
		</h5>
		</div>
		<div class="row">
<table id="rpt" class="table">
	<tbody>
		<?php $c=0;?>
		<?php foreach($tickets as $ticket){?>
			<?php $c++;?>
		<tr>
			<th rowspan=6 valign="top"><?php echo $c;?>.</th>
			<td>
				Pelanggan
			</td>
			<td>
				:
			</td>
			<td>
				<?php echo $ticket->clientname;;?>
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
				Pukul
			</td>
			<td>
				:
			</td>
			<td>
				<?php echo $ticket->ticketstart;?>
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
				$("#btnfilter").click(function(){
					branch ='';
					$.each($(".suspect-branches :checked"),function(){
						branch+=$(this).val();
					})					
					window.location.href = "<?php echo base_url()?>rpt/shiftreport/"+urlsegment(3)+"/"+urlsegment(4)+"/"+urlsegment(5)+"/"+branch;
					
				})
			}(jQuery))
		</script>

	</body>
</html>
