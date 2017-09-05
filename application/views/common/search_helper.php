	<link rel="stylesheet" href="<?php echo base_url();?>css/jq-1.9.0/jquery-ui-1.9.0.custom.min.css" />
	<script src="<?php echo base_url();?>js/jquery-1.8.2.min.js"></script>
	<script src="<?php echo base_url();?>js/jquery-ui-1.9.0.custom.min.js"></script>        
	<script type='text/javascript'>
        
        $(document).ready(function(){
            $.getJSON('<?php echo base_url();?>index.php/front_end/availablecities',
                    {},
                    function(data){
                        $( "#city" ).autocomplete({
                            source: data.cities
                        });
            });
                
            $.getJSON('<?php echo base_url();?>index.php/front_end/availableaddresses',
                    {},
                    function(data){
                        $( "#address" ).autocomplete({
                            source: data.addresses
                        });
            });
        });
        </script>
