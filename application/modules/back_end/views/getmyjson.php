<script type='text/javascript' src='<?php echo base_url()?>js/jquery-1.5.1.min.js'></script>
<script type='text/javascript'>
$(document).ready(function(){
	alert('dd');
	$.getJSON('<?php echo base_url();?>index.php/back_end/json',function(data){
		$.each(data,function(x,y){
			alert(x);
		});
	});
});
</script>
test my json