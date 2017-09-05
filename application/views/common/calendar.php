<script type='text/javascript'>
follow_up = function(monthyeardate){
	dt=monthyeardate.split('/');
	dtparam='day/'+dt[2]+'/month/'+dt[1]+'/year/'+dt[0];
	window.location = '<?php echo base_url();?>index.php/back_end/show_days/'+dtparam;
}
</script>
