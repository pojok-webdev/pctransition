<!doctype>
<html>
<head>
	<title>jsPDF</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.8.17.custom.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.14.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.debug.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.min.js"></script>
	<!--<script type="text/javascript" src="js/basic.js"></script>-->

	<script>
		var getImageFromUrl = function(url, callback) {
			var img = new Image();

			img.onError = function() {
				alert('Cannot load image: "'+url+'"');
			};
			img.onload = function() {
				callback(img);
			};
			img.src = url;
		}
		var createPDF = function(imgData) {
			var doc = new jsPDF();

			// This is a modified addImage example which requires jsPDF 1.0+
			// You can check the former one at <em>examples/js/basic.js</em>

			doc.addImage(imgData, 'JPEG', 10, 10, 50, 50, 'monkey'); // Cache the image using the alias 'monkey'
			doc.addImage('monkey', 70, 10, 100, 120); // use the cached 'monkey' image, JPEG is optional regardless
			// As you can guess, using the cached image reduces the generated PDF size by 50%!

			// Rotate Image - new feature as of 2014-09-20
			doc.addImage({
				imageData : imgData,
				angle     : -20,
				x         : 10,
				y         : 78,
				w         : 45,
				h         : 58
			});

			// Output as Data URI
			//doc.output('datauri');
			doc.save('instalasi.pdf');
		}
		$(document).ready(function(){
			$("#btn").click(function(){
				getImageFromUrl('http://teknis/reports/images/william-foto2.bmp', createPDF);
			});			
		});
	</script>
</head>

<body>
	<button id="btn">Download PDF</button>
</body>
</html>
