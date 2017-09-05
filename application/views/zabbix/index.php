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
                <li><a href="#">Simple Admin</a> <span class="divider">></span></li>
                <li class="active">Forms stuff</li>
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

                        <div class="row-form clearfix" id="request">
							<form>
								<div class="span3">Request:</div>
								<div class="span2">
										<select class="method1" name="method1" onChange="changeMethod2(this.value)"></select>
								</div>
								<div class="span2">
										<select class="method2" name="method2" onChange="changeParameters(this.form.method1.value, this.form.method2.value)"></select>
								</div>
								<div class="span2">
										<a href="javascript:toggleParameters()">Parameters</a>
										<p class="parameters"></p>
										
								</div>

								<div class="span1">
									<button class="btn" type="button"  onClick="doRequest(this.form)">Send</button>
								</div>
							</form>
                        </div>
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
