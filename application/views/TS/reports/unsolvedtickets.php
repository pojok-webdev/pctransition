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
			.dropdown-submenu {
				position: relative;
			}
			.pointer{
				cursor:pointer;
			}
			.pointer:hover{
				color:red;
			}
			.dropdown-submenu .dropdown-menu {
				top: 0;
				left: 100%;
				margin-top: -1px;
			}
		</style>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
		<script src="<?php echo base_url();?>asset/report/jquery-1.12.0.min.js"></script>
		<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>		-->
		<script src="<?php echo base_url();?>asset/report/bootstrap-3.3.6.min.js"></script>
		<!--<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>-->
		<script src="<?php echo base_url();?>asset/jqueryui.1.12.0.js"></script>
		<script src="<?php echo base_url();?>js/padilibs/padi.dateTimes.js"></script>
		<script src="<?php echo base_url();?>js/aquarius/links.js"></script>
		<title>Laporan Tiket yang belum terselesaikan </title>
	</head>
	<body>
		<div class="container">
		<div class="jumbotron">
		<h3>Laporan Tiket Yang Belum Terselesaikan</h3>
		<h5>
			<a class="rptanchor btn btn-success" href="<?php echo base_url()?>rpt">Home</a>
		</h5>
			<div class="row-fluid">
				<div class="well col-sm-12">
					<div class="col-sm-3">
						<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Lama Tiket
						<span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
						  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="optage" value="1">&le;3 hari</a></li>
						  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="optage" value="2">3 &lt; x &le; 7</a></li>
						  <!--<li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="optage" value="3">5 &lt; x &le; 7</a></li>-->
						  <li role="presentation" class="divider"></li>
						  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="optage" value="4">&gt; 7</a></li>
						</ul>
						<span id="txtage"><?php echo $timerange;?></span>
					</div>
					<div class="col-sm-3">
						<input type="text" class="datepicker" id="startdate" value="<?php echo $uridate1?>" />
						-
						<input type="text" class="datepicker" id="enddate" value="<?php echo $uridate2?>" />
					</div>				<!--</div>-->

				<?php
				$sbychecked = '';$jktchecked = '';$mlgchecked = '';$blichecked = '';
				for($x=0;$x<strlen($this->uri->segment(5));$x++){
					switch(substr($this->uri->segment(5),$x,1)){
						case '1':
						$sbychecked = "checked='checked'";
						break;
						case '3':
						$mlgchecked = "checked='checked'";
						break;
						case '2':
						$jktchecked = "checked='checked'";
						break;
						case '4':
						$blichecked = "checked='checked'";
						break;
					}
				}
				?>
				<!--<div class="well col-sm-6">-->
				<div class="col-sm-3">
				<label class="checkbox-inline suspect-branches"><input type="checkbox" value="1" <?php echo $sbychecked;?>>Surabaya</label>
				<label class="checkbox-inline suspect-branches"><input type="checkbox" value="2" <?php echo $jktchecked;?>>Jakarta</label>
				<label class="checkbox-inline suspect-branches"><input type="checkbox" value="4" <?php echo $blichecked;?>>Bali</label>
				<label class="checkbox-inline suspect-branches"><input type="checkbox" value="3" <?php echo $mlgchecked;?>>Malang</label>
				</div>
				<div class="col-sm-3"><button class="btn btn-success" id="btnfilter">Filter</button></div>
				</div>
				<br />
			</div>

			<br />
		</div>
		<div class="row">
			<table id="rpt" class="table">
				<thead>
					<tr>
						<th>No</th>
						<th onClick='orderlink("ticketstart","1")' class="pointer">Ticket Start</th>
						<th onClick='orderlink("ticketend","1")' class="pointer">Ticket End</th>
						<th onClick='orderlink("clientname","1")' class="pointer">Pelanggan</th>
						<th onClick='orderlink("brn","1")' class="pointer">Cabang</th>
						<th onClick='orderlink("duration3","1")' class="pointer">Durasi</th>
						<th onClick='orderlink("cause","1")' class="pointer">Penyebab</th>
					</tr>
				</thead>
				<tbody>
					<?php $c=0;?>
					<?php foreach($suspects as $suspect){?>
						<?php $c++;?>
					<tr>
						<th valign="top"><?php echo $c;?>.</th>
						<td><?php echo $suspect->ticketstart;?></td>
						<td><?php echo $suspect->ticketend;?></td>
						<td>
							<?php echo $suspect->clientname;?>
						</td>
						<td>
							<?php echo $suspect->brn;?>
						</td>
						<td>
							<?php echo $suspect->duration3;?>
						</td>
						<td>
							<?php echo $suspect->cause;?>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
		</div>
		<script type="text/javascript" src="<?php echo base_url();?>js/padilibs/padi.url.js"></script>
		<script type="text/javascript">
			(function($){
				$(".datepicker").datepicker({dateFormat:'d/m/yy'});
			orderlink = function(orderby,branch){
				branch ='0';
				$.each($(".suspect-branches :checked"),function(){
					branch+=$(this).val();
				})
				$("#startdate").getdate();
				$("#enddate").getdate();
				order = urlsegment(4);
				range = urlsegment(6);
				rorder = (order=='desc')?'asc':'desc';
				console.log('rorder',rorder);
				window.location.href = baseurl+"rpt/unsolvedreport/"+orderby+"/"+rorder+"/"+branch+"/"+range+"/"+$("#startdate").attr("datetime")+"/"+$("#enddate").attr("datetime");
			}
			$("#btnfilter").click(function(){
				orderlink(urlsegment(3),'');
			});
				$(".optage").click(function(){
					$("#startdate").getdate();
					$("#enddate").getdate();
					console.log($("#dt1").val());
					branch ='';
					$.each($(".suspect-branches :checked"),function(){
						branch+=$(this).val();
					})
					order = urlsegment(4);
					console.log("urlsegment ",urlsegment(3));
					window.location.href = baseurl+"rpt/unsolvedreport/"+urlsegment(3)+"/"+order+"/"+branch+"/"+$(this).attr("value")+"/"+$("#startdate").attr("datetime")+"/"+$("#enddate").attr("datetime");
				});

				$("#dateasc").click(function(){
					console.log("pengurutan berdasarkan tanggal asc");
				});
				$("#datedesc").click(function(){
					console.log("pengurutan berdasarkan tanggal desc");
				});
				$("#hunterasc").click(function(){
					console.log("pengurutan berdasarkan hunter asc");
				});
				$("#hunterdesc").click(function(){
					console.log("pengurutan berdasarkan hunter desc");
				});

				$(".optage").click(function(){
					$("#txtage").html($(this).html());
				});
			}(jQuery))
		</script>

	</body>
</html>
