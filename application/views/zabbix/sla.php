<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("adm/head");?>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>asset/jqzabbix/jquery-2.1.1.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>asset/jqzabbix/jqzabbix.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>asset/jqzabbix/padi.js"></script>
<body>

		<?php $this->load->view('adm/header'); ?>
		<?php $this->load->view('adm/menu'); ?>
    <div class="content">


        <div class="breadLine">

            <ul class="breadcrumb">
                <li><a href="#">Laporan</a> <span class="divider">></span></li>
                <li class="active">SLA</li>
            </ul>
		<?php $this->load->view('adm/buttons'); ?>
        </div>

        <div class="workplace">

            <div class="row-fluid">

                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Filter</h1>
                    </div>
                    <div class="block-fluid">


			<table class="table">
				<thead><tr><th>From</th><th>To</th><th>SLA</th><th>OK Time</th><th>ProblemTime</th><th>DownTime</th></tr></thead>
				<tbody>
				<?php
				foreach($graphs as $graph=>$graphval){
					echo "<tr><th colspan=6>$services[$graph]</th></tr>";
					foreach($graphval as $key=>$val){
						if($key==="sla"){
							$slacount = count($val);
							for($i=0;$i<$slacount;$i++){
								echo "<td>".$val[$i]->from . "</td>" ;
								echo "<td>". $val[$i]->to . "</td>" ;
								echo "<td>". $val[$i]->sla . "</td>" ;
								echo "<td>". $val[$i]->okTime . "</td>" ;
								echo "<td>". $val[$i]->problemTime . "</td>" ;
								echo "<td>". $val[$i]->downtimeTime . "</td>";
							}
						}
					}
				}		

				?>
			</tbody>
			</table>

                        <div class="row-form clearfix" id="result">
							
							
                        </div>

                    </div>
                </div>

            </div>


        </div>

    </div>
    <script type="text/javascript">
    </script>
</body>
</html>
