<html>
	<head>
		<title>TELEGRAM</title>
		<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				console.log("TEST TELEGRAM WEBHOOK");
				$.ajax({
					url:'https://api.telegram.org/bot201184174:AAH2Fy_3wS8A5KGi2cn468dtFCMJjhOqISQ/setWebhook',
					data:{url:'telegram.puji.angin.com'},
					type:'post',
					dataType:'json'
				})
				.done(function(res){
					console.log("RES",res);
				})
				.fail(function(err){
					console.log("ERR",err);
				});				
			});
		</script>
		
	</head>
	<body>
	</body>
</html>
