<html>
	<thead>
		<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>-->
		<script type="text/javascript" src="https://database.padinet.com/js/jquery-1.5.1.min.js"></script>
		<?php
		header('Access-Control-Allow-Origin: *');
		?>
	</head>
	</thead>
	<body>
	<body>
		TEST TELEGEGRM
		<script>
			(function($){
				console.log("Hey Dude");
				$.ajax({
					url:"https://api.telegram.org/bot201184174:AAH2Fy_3wS8A5KGi2cn468dtFCMJjhOqISQ/sendMessage",
					data:{"chat_id":"@Padi","text":"boooohoooo"},
					headers: {
						'Access-Control-Allow-Origin':'*'
					},
					crossDomain:true,
					type:'post',
					dataType:'jsonp'
				});
			}(jQuery))
		</script>
	</body>

	</body>
</html>
