<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url()?>css/reports/rpt.css" />
		<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
		<link rel="stylesheet" href="<?php echo base_url();?>asset/report/bootstrap-3.3.6.min.css">
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
		<script src="<?php echo base_url();?>asset/report/jquery-1.12.0.min.js"></script>
		<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>		-->
		<script src="<?php echo base_url();?>asset/report/bootstrap-3.3.6.min.js"></script>	
		<script type="text/javascript" src="<?php echo base_url();?>js/padilibs/padi.url.js"></script>	
		<title>Laporan Farmer Bulan <?php echo month_nth($month) . " " . $year;?> </title>
	</head>
	<body>
		<div class="container">
		<div class="jumbotron">
		<h3>Laporan Farmer Bulan <?php echo month_nth($month)." ".$year;?> </h3>
				<?php
				foreach($arrbranch as $br){
					$ischecked = false;
					$checked = "";
					for($c=0;$c<strlen($userbranches);$c++){
						if(substr($this->uri->segment(5),$c,1)===$br){
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
				<br />
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

				<button class="btn btn-success" id="btnfilter">Filter</button>
				
		<h5>
			<a href="<?php echo base_url()?>rpt" class="btn btn-success">Home</a>
			
			<a href="<?php echo base_url()?>rpt/excelhunter/<?php echo $month;?>/<?php echo $year;?>/<?php echo $branchselected;?>/<?php echo $amsstr;?>" class="btn btn-success">Download Excel</a>
		</h5>
		</div>
		<div class="row">
		<table id="rpt">
		<thead>
		<tr>
		<th>Nama</th>
		<?php for($x=1;$x<=$day_in_month;$x++){?>
		<th><?php echo $x;?></th>
		<?php }?>
		<th>Total</th>
		</tr>
		</thead>
		<tbody>
		<tr>
		<th class="actname">Suspect</th>
		<?php $suspecttotal = 0;?>
		<?php for($x=1;$x<=$day_in_month;$x++){?>
		<?php echo isset($suspect[$x])?'<td class="survey '.$x.'" dt="'.$x.'">'.$suspect[$x].'</td>':"<td class='zeroval'>0</tdtd>";?>
		<?php $suspecttotal = isset($suspect[$x])?intval($suspect[$x])+$suspecttotal:$suspecttotal;?>
		<?php }?>
		<?php echo "<td>$suspecttotal</td>";?>
		</tr>
		<tr>
		<th class="actname">Prospect</th>
		<?php $prospecttotal = 0;?>
		<?php for($x=1;$x<=$day_in_month;$x++){?>
		<?php echo isset($prospect[$x])?'<td class="survey '.$x.'" dt="'.$x.'">'.$prospect[$x].'</td>':"<td class='zeroval'>0</tdtd>";?>
		<?php $prospecttotal = isset($prospect[$x])?intval($prospect[$x])+$prospecttotal:$prospecttotal;?>
		<?php }?>
		<?php echo "<td>$prospecttotal</td>";?>
		</tr>
		<tr>
		<th class="actname">Survey</th>
		<?php $stotal = 0;?>
		<?php for($x=1;$x<=$day_in_month;$x++){?>
		<?php echo isset($survey[$x])?'<td class="survey '.$x.'" dt="'.$x.'">'.$survey[$x].'</td>':"<td class='zeroval'>0</tdtd>";?>
		<?php $stotal = isset($survey[$x])?intval($survey[$x])+$stotal:$stotal;?>
		<?php }?>
		<?php echo "<td>$stotal</td>";?>
		</tr>
		<tr>
		<th class="actname">Instalasi</th>
		<?php $itotal = 0;?>
		<?php for($x=1;$x<=$day_in_month;$x++){?>
		<?php echo isset($install[$x])?'<td class="installation '.$x.'" dt="'.$x.'">'.$install[$x].'</td>':"<td class='zeroval'>0</tdtd>";?>
		<?php $itotal = isset($install[$x])?intval($install[$x])+$itotal:$itotal;?>
		<?php }?>
		<?php echo "<td>$itotal</td>";?>
		</tr>
		<tr>
		<th class="actname">Troubleshoot</th>
		<?php $ttotal = 0;?>
		<?php for($x=1;$x<=$day_in_month;$x++){?>
		<?php echo isset($troubleshoot[$x])?'<td class="troubleshoot '.$x.'" dt="'.$x.'">'.$troubleshoot[$x].'</td>':"<td class='zeroval'>0</tdtd>";?>
		<?php $ttotal = isset($troubleshoot[$x])?intval($troubleshoot[$x])+$ttotal:$ttotal;?>
		<?php }?>
		<?php echo "<td>$ttotal</td>";?>
		</tr>
		<tr>
			<th>Total</th>
			<th colspan=<?php echo $day_in_month;?>>&nbsp;</th>
			<td><?php echo $suspecttotal+$prospecttotal+$stotal+$itotal+$ttotal;?></td>
		</tr>
		</tbody>
		</table>



		</div>
		<div class="row">
		<div class="col-sm-3">
		<h3>Suspect</h3>
		<?php foreach($suspect as $x=>$y){
		echo "<p class='surveydetail ".$x."'>".$x."<ul>";
		foreach(suspectclientperday("$year-$month-$x",$arrbranchselected) as $client){
		echo "<li class='surveydetail ".$x."'>".$client["name"]."</li>";
		}
		echo "</ul>";
		echo "</p>";
		}?>
		</div>

		<div class="col-sm-3">
		<h3>Prospect</h3>
		<?php foreach($prospect as $x=>$y){
		echo "<p class='surveydetail ".$x."'>".$x."<ul>";
		foreach(prospectclientperday("$year-$month-$x",$arrbranchselected) as $client){
		echo "<li class='surveydetail ".$x."'>".$client["name"]."</li>";
		}
		echo "</ul>";
		echo "</p>";
		}?>
		</div>

			
		<div class="col-sm-2">
		<h3>Survey</h3>
		<?php foreach($survey as $x=>$y){
		echo "<p class='surveydetail ".$x."'>".$x."<ul>";
		foreach(surveyclientperday("$year-$month-$x",$arrbranchselected) as $client){
		echo "<li class='surveydetail ".$x."'><a href='".base_url()."surveys/showreport/".$client["survey_id"]."'>".$client["name"]."</a></li>";
		}
		echo "</ul>";
		echo "</p>";
		}?>
		</div>
		<div class="col-sm-2">
		<h3>Instalasi</h3>
		<?php foreach($install as $x=>$y){
		echo "<p class='installdetail ".$x."'>".$x."<ul>";
		foreach(installclientperday("$year-$month-$x",$arrbranchselected) as $client){
		echo "<li class='installdetail ".$x."'><a href='".base_url()."install_requests/showreport2/".$client["install_id"]."'>".$client["name"]."</a></li>";
		}
		echo "</ul>";
		echo "</p>";
		}?>
		</div>
		<div class="col-sm-2">
		<h3>Troubleshoot</h3>
		<?php foreach($troubleshoot as $x=>$y){
		echo "<p class='troubleshootdetail ".$x."'>".$x."<ul>";
		foreach(troubleshootclientperday("$year-$month-$x",$arrbranchselected) as $client){
		echo "<li class='troubleshootdetail ".$x."'><a href='".base_url()."troubleshoots/report/".$client["troubleshoot_id"]."'>".$client["name"]."</a></li>";
		}
		echo "</ul>";
		echo "</p>";
		}?>
		</div>
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
					amarr = [];
					$.each($(".amchecked:checked"),function(){
						amarr.push($(this).val());
					});
					window.location.href = "<?php echo base_url()?>rpt/farmer/"+urlsegment(3)+"/"+urlsegment(4)+"/"+branch+"/"+amarr.join("-");
				})
			}(jQuery))
		</script>

	</body>
</html>
