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
		<title>Laporan Berdasarkan Pelanggan </title>
	</head>
	<body>

		<div class="container">
		<div class="jumbotron">
		<h3>Laporan Prospect</h3>
		<h5>
			<a class="rptanchor btn btn-success" href="<?php echo base_url()?>rpt">Home</a>
		</h5>
			<div class="radio">
				Dari bulan 
				<input type="text" class="datepicker monthselector" id="dt1" value="<?php echo $this->common->sql_to_human_date($dt1);?>"> 
					<span class="monthselector">Sampai bulan</span> 
				<input type="text" class="datepicker monthselector" id="dt2" value="<?php echo $this->common->sql_to_human_date($dt2);?>" >
				<?php foreach($userbranches as $branch){?>
					<label class="checkbox-inline"><input type="checkbox" value="<?php echo $branch;?>" class="prospect-branches" <?php echo branchischecked($branch,$this->uri->segment(7)) ;?>><?php echo getbranch($branch)?></label>
				<?php }?>
				<br />
			</div>		

			<br />
			<span id="amsby">
				<?php 
				//foreach(getambybranch($branches,$dt1,$dt2) as $am){
				foreach($users as $am){
					if(in_array($am,$ams)){
						$amchecked = 'checked="checked"';
					}else{
						$amchecked = '';
					}
					echo '<label class="checkbox-inline"><input type="checkbox" class="amchecked" '.$amchecked.' value="'.$am.'">'.humanize(getusernamebyid($am)).'</label>';
				}?>
			</span>
			<button class="btn btn-success" id="btnfilter">Filter</button>
		</div>
		<div class="row">
			<table id="rpt" class="table">
				<thead>
					<tr>
						<th>No</th>
						<th onClick='orderlink("create_date","1")' class='pointer'>Tgl Entri</th>
						<th onClick='orderlink("name","1")' class='pointer'>Calon Pelanggan</th>
						<th onClick='orderlink("address","1")' class='pointer'>Alamat</th>
						<th onClick='orderlink("hunter","1")' class='pointer'>AM</th>
						<th onClick='orderlink("brn","1")' class='pointer'>Cabang</th>
					</tr>
				</thead>
				<tbody>
					<?php $c=0;?>
					<?php foreach($suspects as $suspect){?>
						<?php $c++;?>
					<tr>
						<th valign="top"><?php echo $c;?>.</th>
						<td><?php echo $suspect->create_date;?></td>
						<td>
							<?php echo $suspect->name;?>
						</td>
						<td>
							<?php echo $suspect->address;?>
						</td>
						<td>
							<?php echo $suspect->hunter;?>
						</td>
						<td>
							<?php echo $suspect->brn;?>
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
			doFilterAM = function(){
				console.log("AMLIST DO FILTER CLICKED");
				$.each($(".amlist :checked"),function(){
					console.log("AM",$(this).val());
				})
			};

				
			orderlink = function(orderby,branch){
				branch ='';
				$.each($(".suspect-branches:checked"),function(){
					branch+=$(this).val();
				})
					am = "";
					amarr = [];
					$.each($(".amchecked:checked"),function(){
						amarr.push($(this).val());
					});
				console.log("Branch",branch);
				$("#dt1").getdate();
				$("#dt2").getdate();
				order = urlsegment(4);
				rorder = (order=='desc')?'asc':'desc';
				console.log('rorder',rorder);
				window.location.href = baseurl+"rpt/prospectreport/"+orderby+"/"+rorder+"/"+$("#dt1").attr("datetime")+"/"+$("#dt2").attr("datetime")+"/"+branch+"/"+amarr.join("-");
			}

				$(".datepicker").datepicker({dateFormat:'dd/mm/yy'});
				$("#btnfilter").click(function(){
					$("#dt1").getdate();
					$("#dt2").getdate();
					console.log($("#dt1").val());
					branch ='';
					allchecked = false;
					$.each($(".prospect-branches:checked"),function(){
						branch+=$(this).val();
						allchecked = true;
					})
					am = "";
					amarr = [];
					$.each($(".amchecked:checked"),function(){
						amarr.push($(this).val());
					});
					console.log("Branch",branch,"AM",amarr.join("-"));
					order = urlsegment(4);
					console.log("urlsegment ",urlsegment(3));
					if(allchecked){
						window.location.href = baseurl+"rpt/prospectreport/"+urlsegment(3)+"/"+order+"/"+$("#dt1").attr("datetime")+"/"+$("#dt2").attr("datetime")+"/"+branch+"/"+amarr.join("-");
					}else{
						alert("Cabang Tidak boleh kosong");
					}

					
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
