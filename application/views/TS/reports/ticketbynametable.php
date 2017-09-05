<html>
	<head>
		<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
		<link rel="stylesheet" href="<?php echo base_url();?>asset/report/bootstrap-3.3.6.min.css">
		<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">-->
		<link rel="stylesheet" href="<?php echo base_url();?>asset/jqueryui.1.12.0.css">
		<style>
			.rptanchor:hover{
				color: red;
			}
			.monthselector:hover{
				cursor:pointer;
			}
			.strsemua:hover{
				cursor:pointer;
			}
		</style>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
		<script src="<?php echo base_url();?>asset/report/jquery-1.12.0.min.js"></script>
		<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>		-->
		<script src="<?php echo base_url();?>asset/report/bootstrap-3.3.6.min.js"></script>
		<!--<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>-->
		<script src="<?php echo base_url();?>asset/jqueryui.1.12.0.js"></script>
		<script src="<?php echo base_url();?>js/aquarius/links.js"></script>
		<title>Laporan Berdasarkan Pelanggan </title>
	</head>
	<body>
		<div class="container">
		<div class="jumbotron">
		<h3>Laporan Ticket Berdasarkan Pelanggan <?php echo $clientname;?></h3>
		<h5>
			<a class="rptanchor btn btn-success" href="<?php echo base_url()?>rpt">Home</a>
			<a class="rptanchor btn btn-success" href="<?php echo base_url()?>rpt/ticketbyname/<?php echo $order?>/<?php echo $this->uri->segment(4)."/".$extendsegment;?>"><?php echo $ordertext;?></a>
			<a class="rptanchor btn btn-success" href="<?php echo base_url()?>rpt/ticketbynameexcel/<?php echo $order?>/<?php echo $this->uri->segment(4)."/".$extendsegment;?>">Download Excel</a>
		</h5>
			<div class="radio">
				<input type="radio" name="datefilter" class="filterradio" id="filter1" <?php echo $monthchecked;?>><span class="monthselector">&nbsp;Dari bulan </span>
				<input type="text" class="datepicker monthselector" id="dt1" value="<?php echo $dt1;?>"> <span class="monthselector">Sampai bulan</span> <input type="text" class="datepicker monthselector" id="dt2" value="<?php echo $dt2;?>" ><br />
				<input type="radio" name="datefilter" class="filterradio" id="filter2" <?php echo $allchecked;?>><span class="strsemua">&nbsp;Semua</span><br />
			</div>
			<button class="btn btn-success" id="btnfilter">Filter</button>
		</div>
		<div class="row">
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
		</div>
		</div>
		<script type="text/javascript">
			(function($){
			convertdate = function(pdate){
				day = pdate.substring(0,2);
				mnt = pdate.substring(3,5);
				yea = pdate.substring(6);
				return day + '-' + getstrmonth(mnt) + '-' + yea;
			}
			getstrmonth = function(pmonth){
				switch(pmonth){
					case '01':
						out = 'jan';
						break;
					case '02':
						out = 'feb';
						break;
					case '03':
						out = 'mar';
						break;
					case '04':
						out = 'apr';
						break;
					case '05':
						out = 'may';
						break;
					case '06':
						out = 'jun';
						break;
					case '07':
						out = 'jul';
						break;
					case '08':
						out = 'aug';
						break;
					case '09':
						out = 'sep';
						break;
					case '10':
						out = 'oct';
						break;
					case '11':
						out = 'nov';
						break;
					case '12':
						out = 'dec';
						break;
				}
				return out;
			}
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
				$(".datepicker").datepicker({dateFormat:'dd/mm/yy'});
				$("#btnfilter").click(function(){
					 //alert($(".filterradio:checked").val());
					 //alert(convertdate($("#dt1").val()));
					 //alert(convertdate($("#dt2").val()));
					if($("#filter1").is(":checked")){
						unsuccess = false;
						if(($("#dt1").val().length===0)){
							unsuccess = true;
//							window.location.href = baseurl+'rpt/ticketbyname/<?php echo $order;?>/<?php echo $client_id;?>/'+convertdate($("#dt1").val())+'/'+convertdate($("#dt2").val());							
						}
						if(($("#dt2").val().length===0)){
							unsuccess = true;
						}
						if(unsuccess){
							alert("tanggal filter harus diisi");
						}else{
							window.location.href = baseurl+'rpt/ticketbyname/<?php echo $order;?>/<?php echo $client_id;?>/'+convertdate($("#dt1").val())+'/'+convertdate($("#dt2").val());							
						}
											};
					if($("#filter2").is(":checked")){
						 //alert("filter 2 checked");
						 window.location.href = baseurl+'rpt/ticketbyname/<?php echo $order;?>/<?php echo $client_id;?>';
					};
				});
				$(".strsemua").click(function(){
					$("#filter2").prop("checked",true);
				});
				$(".monthselector").click(function(){
					$("#filter1").prop("checked",true);
				});
			}(jQuery))
		</script>

	</body>
</html>
