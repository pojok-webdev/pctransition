<html>
	<head>
		<?php
		header("Content-Type: application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment;filename=Laporan-Bulanan-TS-".month_nth($month)."-".$year.".xls");
		header("Cache-Control: private",false);
		?>
	</head>
	<body>
		<table>
			<thead>
				<tr><th colspan=<?php echo $day_in_month;?>>Laporan TS Bulan <?php echo month_nth($month);?> <?php echo $year?></th></tr><tr><th>Tanggal</th><?php for($x=1;$x<=$day_in_month;$x++){?><th width=5><?php echo $x;?></th><?php }?></tr>
			</thead>
			<tbody>
				<tr>
					<th class="actname">Survey</th>
					<?php for($x=1;$x<=$day_in_month;$x++){?>
					<?php echo isset($survey[$x])?'<td>'.$survey[$x].'</td>':"<td class='zeroval'>0</tdtd>";?>
					<?php }?>
					<?php switch($day_in_month){
						case 28:
							echo "<th>=SUM(B3:AC3)</th>";
						break;
						case 29:
							echo "<th>=SUM(B3:AD3)</th>";
						break;
						case 30:
							echo "<th>=SUM(B3:AE3)</th>";
						break;
						case 31:
							echo "<th>=SUM(B3:AF3)</th>";
						break;
					}?>
				</tr>
				<tr>
					<th class="actname">Instalasi</th>
					<?php for($x=1;$x<=$day_in_month;$x++){?>
					<?php echo isset($install[$x])?'<td>'.$install[$x].'</td>':"<td class='zeroval'>0</tdtd>";?>
					<?php }?>
					<?php switch($day_in_month){
						case 28:
							echo "<th>=SUM(B4:AC4)</th>";
						break;
						case 29:
							echo "<th>=SUM(B4:AD4)</th>";
						break;
						case 30:
							echo "<th>=SUM(B4:AE4)</th>";
						break;
						case 31:
							echo "<th>=SUM(B4:AF4)</th>";
						break;
					}?>
				</tr>
				<tr>
					<th class="actname">Troubleshoot</th>
					<?php for($x=1;$x<=$day_in_month;$x++){?>
					<?php echo isset($troubleshoot[$x])?'<td>'.$troubleshoot[$x].'</td>':"<td class='zeroval'>0</tdtd>";?>
					<?php }?>
					<?php switch($day_in_month){
						case 28:
							echo "<th>=SUM(B5:AC5)</th>";
						break;
						case 29:
							echo "<th>=SUM(B5:AD5)</th>";
						break;
						case 30:
							echo "<th>=SUM(B5:AE5)</th>";
						break;
						case 31:
							echo "<th>=SUM(B5:AF5)</th>";
						break;
					}?>
				</tr>

				<tr>
					<th>Total</th>
					<th colspan="<?php echo $day_in_month;?>">&nbsp;</th>
					<?php switch($day_in_month){
						case 28:
							echo "<th>=SUM(AD3:AD5)</th>";
						break;
						case 29:
							echo "<th>=SUM(AE3:AE5)</th>";
						break;
						case 30:
							echo "<th>=SUM(AF3:AF5)</th>";
						break;
						case 31:
							echo "<th>=SUM(AG3:AG5)</th>";
						break;
					}?>
				</tr>

			<tr><th>Survey</th></tr>
			<?php foreach($survey as $x=>$y){
				$tmp = array();
				echo "<tr><td>".$x."</td><td>";
				foreach(surveyclientperday("$year-$month-$x",$arrbranchselected) as $client){
					array_push($tmp,$client["name"]);
				}
				$str = implode(", ",$tmp);
				echo $str."</td></tr>";
			}?>
			</div>
			<tr><th>Instalasi</th></tr>
			<?php foreach($install as $x=>$y){
				$tmp = array();
				echo "<tr><td>".$x."</td><td>";
				foreach(installclientperday("$year-$month-$x",$arrbranchselected) as $client){
					array_push($tmp,$client["name"]);
				}
				$str = implode(", ",$tmp);
				echo $str."</td></tr>";
			}?>
			</div>
			<tr><th>Troubleshoot</th></tr>
			<?php foreach($troubleshoot as $x=>$y){
				$tmp = array();
				echo "<tr><td>".$x."</td><td>";
				foreach(troubleshootclientperday("$year-$month-$x",$arrbranchselected) as $client){
					array_push($tmp,$client["name"]);
				}
				$str = implode(", ",$tmp);
				echo $str."</td></tr>";

			}?>

			</tbody>
		</table>
	</body>
</html>
