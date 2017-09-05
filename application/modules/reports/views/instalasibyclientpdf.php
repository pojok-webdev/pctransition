<!doctype>
<html>
<head>
	<title>jsPDF</title>
	<style type="text/css">
		* { padding: 0; margin: 0; }
		body {
			padding: 30px;
			font-family: Arial, Helvetica, sans-serif;
		}
		h1 {
			margin-bottom: 1em;
			border-bottom: 1px solid #ccc;
		}
		
		h2 {
			margin-bottom: 1em;
			border-bottom: 1px solid #ccc;
		}
		
		pre {
			border: 1px dotted #ccc;
			background: #f7f7f7;
			padding: 10px;
			margin-bottom: 1em;
		}
        
        h1 {
            margin-bottom: 0.7em;
        }
        
        h2 {
            margin-top: 1em;
        }
	</style>
<!--	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/base64.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/sprintf.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.js"></script>-->
	
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.14.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.debug.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.min.js"></script>
	
</head>

<body>

<h1>CETAK PDF</h1>

<a href="javascript:cetak({subject:'Laporan Instalasi'})">Cetak</a>

<script type="text/javascript">
	var vcontent = {
		"Nama Perangkat":": Mikrotik RB411L + Grid 27 dbm",
		"Mac Board":": D4:CA:6D:9D:A8:84"
		};


cetak =function(options){
	var settings = $.extend({
		subject	:'Cetak PDF',
		content : vcontent,
		fontSize:9,
		h2:12,
		url:'http://teknis/index.php/reports/reportjson',
	},options);
	var doc = new jsPDF();
	//doc
	doc.text(20,20, settings.subject);
	$.ajax({
		url:settings.url,
		type:'post',
		dataType:'json',
		async:false,
	}).done(function(data){
		y = 30;
		$.each(data,function(a,b){
			doc.setFontStyle('bold');
			doc.setFontSize(settings.h2);
			doc.text(20,y,a);
			y+=5;
			$.each(b,function(c,d){
				doc.setFontStyle('normal');
				doc.setFontSize(settings.fontSize);
				doc.setFontType('normal');
				if(d['type']=='text'){
					doc.text(20,y,d['field']);
					doc.text(60,y,d['content']);
				y+=5;
				}
				if(d['type']=='image'){
					var img = new Image();
					img.src = d['content'];
					if(d['col']=='left'){
						x=20;
						doc.addImage(img, 'JPEG', x, y, 50, 50, c);
					}
					if(d['col']=='right'){
						x=120;
						doc.addImage(img, 'JPEG', x, y, 50, 50, c);
						y+=50;
					}
					
					//y+=50;
				}
			});
		});
	}).fail(function(){
		alert('x');
	});
	
//	var img = new Image();
//	img.src = 'http://teknis/reports/images/william-foto2.bmp';
//	doc.addImage(img, 'JPEG', 20, y, 50, 50, 'monkey');
	doc.output('datauri');	
	
}


</script>


</body>
</html>
