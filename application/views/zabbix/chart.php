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
						<?php						
							foreach($graphs as $items){
								echo "<a href='".base_url()."rpt/chart2/$items'>".$items . "</a>,";
							}
						?>
						<a href="<?php echo base_url();?>rpt/chart2/436">436</a>
						<a href="<?php echo base_url();?>rpt/chart2/387">387</a>
                    </div>
                    <div class="block-fluid">


						<!--<image src="http://202.6.233.15/zabbix/chart2.php?graphid=436"></image>-->
						<image src="http://202.6.233.15/zabbix/chart2.php?graphid=<?php echo $graphid;?>"></image>
							

                    </div>
                </div>

            </div>


        </div>

    </div>
    <script type="text/javascript">
    </script>
</body>
</html>
