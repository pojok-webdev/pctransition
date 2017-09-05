<script type='text/javascript' src='<?php echo base_url();?>js/jquery.qtip-1.0.0-rc3.min.js'></script>
<script type='text/javascript'>
$(document).ready(function(){
	$('#test').qtip({'content':'test'});
	
});
</script>

<?php
echo $calendar->show_calendar($url['year'] . '/' . $url['month']);
