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

			.dropdown-submenu .dropdown-menu {
				top: 0;
				left: 100%;
				margin-top: -1px;
			}
			.pointer{
				cursor:pointer;
			}
			.pointer:hover{
				color:red;
				cursor:pointer;
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
		<title>Laporan Downtime </title>
	</head>
	<body>
		<div class="container">
		<div class="jumbotron">
		<h3>Laporan Downtime</h3>
		<h5>
			<a class="rptanchor btn btn-success" href="<?php echo base_url()?>rpt">Home</a>
		</h5>
			<div class="radio">
				Dari bulan 
				<input type="text" class="datepicker monthselector" id="dt1" value="<?php echo $this->common->sql_to_human_date($dt1);?>"> 
					<span class="monthselector">Sampai bulan</span> 
				<input type="text" class="datepicker monthselector" id="dt2" value="<?php echo $this->common->sql_to_human_date($dt2);?>" >
				<?php
				$sbychecked = '';$jktchecked = '';$mlgchecked = '';$blichecked = '';
				for($x=0;$x<strlen($this->uri->segment(7));$x++){
					switch(substr($this->uri->segment(7),$x,1)){
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
				<label class="checkbox-inline suspect-branches"><input type="checkbox" value="1" <?php echo $sbychecked;?>>Surabaya</label>
				<label class="checkbox-inline suspect-branches"><input type="checkbox" value="2" <?php echo $jktchecked;?>>Jakarta</label>
				<label class="checkbox-inline suspect-branches"><input type="checkbox" value="4" <?php echo $blichecked;?>>Bali</label>
				<label class="checkbox-inline suspect-branches"><input type="checkbox" value="3" <?php echo $mlgchecked;?>>Malang</label>
				<br />
			</div>		

			<br />
			<button class="btn btn-success" id="btnfilter">Filter</button>
		</div>
		<div class="row">
			<table id="rpt" class="table">
				<thead>
					<tr>
						<th>No</th>
						<th onClick='orderlink("name","1")' class='pointer'>Nama Pelanggan</th>
						<th onClick='orderlink("address","1")' class='pointer'>Awal Downtime</th>
						<th onClick='orderlink("hunter","1")' class='pointer'>Akhir Downtime</th>
						<th onClick='orderlink("brn","1")' class='pointer'>Total</th>
					</tr>
				</thead>
				<tbody>
					<?php $c=0;?>
					<?php foreach($suspects as $suspect){?>
						<?php $c++;?>
					<tr>
						<th valign="top"><?php echo $c;?>.</th>
						<td>
							<?php echo $suspect->clientname;?>
						</td>
						<td>
							<?php echo $suspect->downtimestart;?>
						</td>
						<td>
							<?php echo $suspect->downtimeend;?>
						</td>
						<td>
							<?php echo $suspect->downtimetotal;?> hari
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
			orderlink = function(orderby,branch){
				branch ='';
				$.each($(".suspect-branches :checked"),function(){
					branch+=$(this).val();
				})
				$("#dt1").getdate();
				$("#dt2").getdate();
				order = urlsegment(4);
				rorder = (order=='desc')?'asc':'desc';
				console.log('rorder',rorder);
				window.location.href = baseurl+"rpt/suspectreport/"+orderby+"/"+rorder+"/"+$("#dt1").attr("datetime")+"/"+$("#dt2").attr("datetime")+"/"+branch;
			}

				$(".datepicker").datepicker({dateFormat:'dd/mm/yy'});
				$("#btnfilter").click(function(){
					$("#dt1").getdate();
					$("#dt2").getdate();
					console.log($("#dt1").val());
					branch ='';
					$.each($(".suspect-branches :checked"),function(){
						branch+=$(this).val();
					})
					order = urlsegment(4);
					console.log("urlsegment ",urlsegment(3));
					window.location.href = baseurl+"rpt/downtimereport/"+urlsegment(3)+"/"+order+"/"+$("#dt1").attr("datetime")+"/"+$("#dt2").attr("datetime")+"/"+branch;
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


			}(jQuery))
		</script>

	</body>
</html>
