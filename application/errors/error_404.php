<html>
<head>
<title>404 Page Not Found</title>
<style type="text/css">

body {
background-color:	#fff;
margin:				40px;
font-family:		Lucida Grande, Verdana, Sans-serif;
font-size:			12px;
color:				#000;
}

#content  {
border:				#999 1px solid;
background-color:	#fff;
padding:			20px 20px 12px 20px;
}

h1 {
font-weight:		normal;
font-size:			14px;
color:				#990000;
margin:				0 0 4px 0;
}
</style>
</head>
<body>
<?php $base_url = 'http://localhost/workspace/db_teknis/index.php/';?>

	<div id="content">
		<h1><?php echo $heading; ?></h1>
		Halaman yang anda cari tidak ada ... <br />
		<a href='<?php echo $base_url;?>back_end'>Home</a>
		<?php echo $message; ?>
	</div>
</body>
</html>