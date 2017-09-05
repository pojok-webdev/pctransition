<?php
//$this->load->view('adm/head');
?>
    <link media="screen" href="<?php echo base_url();?>css/msg/jquery.msg.css" rel="stylesheet" type="text/css">
    <script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.5.1.min.js'></script>


    <script type="text/javascript" src="<?php echo base_url();?>js/msg/jquery.center.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/msg/jquery.msg.js"></script>

<script type='text/javascript'>
$(document).ready(function(){
	$.msg({content:'test'});
	
});
</script>
