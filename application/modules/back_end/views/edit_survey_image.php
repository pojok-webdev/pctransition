<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js'></script>
		<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js'></script>
		<script type='text/javascript' src='<?php echo base_url();?>js/jquery.tag.min.js'></script>
		<link media="screen" rel="stylesheet" href="<?php echo base_url();?>css/jquery.tag.css" type="text/css" />
		<link media="screen" rel="stylesheet" href="../css/jquery-ui.custom.css" type="text/css" />
	</head>
	<body>
		<h1>jTag plugin Basic demo</h1>
		<a href="../index.html">Back to demo list</a>
		<div>
			<p>Click on the picture to start tagging</p>
			<pre>$("#img").tag()</pre>
			<img src="<?php echo $img;?>" id="img1" />
		</div>
		
		<script>
			$(document).ready(function(){
				$("#img1").tag();
			});
			
		</script>
	</body>
</html>
