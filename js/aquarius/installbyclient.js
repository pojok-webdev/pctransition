
(function($){
	console.log(thisdomain);
cetak = function(options){
	var settings = $.extend({
		subject	:'Cetak PDF',
		fontSize:9,
		h2:12,
		url:thisdomain+'reports/reportjson',
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
				}
			});
		});
	}).fail(function(){
		alert('Silakan hubungi developer');
	});

	//doc.output('datauri');
	doc.save("Laporan Instalasi");
}
	$('#downloadPDF').click(function(){
		cetak({subject:'Laporan Instalasi'});
	});
	$("#btnHome").click(function(){
		window.location.href = thisdomain+"install_requests";
	});
}(jQuery));
