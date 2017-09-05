(function($){
	$('#btnHome').click(function(){
		window.location.href = thisdomain+'surveys';
	});
	$("#downloadPDF").click(function(){
		var pdf = new jsPDF('p', 'pt', 'a4');
		var options = {
		         pagesplit: true
		    };

		pdf.addHTML($(document.body), options, function()
		{
		    pdf.save("test.pdf");
		});
	});
	$("#downloadPDFx").click(function () {
		      html2canvas(document.body, {
		      onrendered: function (canvas) {
		      var imageData = canvas.toDataURL("image/jpeg");
		      var image = new Image();
		      image = Canvas2Image.convertToJPEG(canvas);
		      //var vheight = 1095;
		      var vheight = 500;
		      var doc = new jsPDF();
		      doc.addImage(imageData, 'JPEG', 12, 10);
		      var croppingYPosition = vheight;
		      count = (image.height) / vheight;
		      for (var i =1; i < count; i++) {
			    doc.addPage();
			    var sourceX = 0;
			    var sourceY = croppingYPosition;
			    var sourceWidth = image.width;
			    var sourceHeight = vheight;
			    var destWidth = sourceWidth;
			    var destHeight = sourceHeight;
			    var destX = 0;
			    var destY = 0;
			    var canvas1 = document.createElement('canvas');
			    canvas1.setAttribute('height', destHeight);
			    canvas1.setAttribute('width', destWidth);                         
			    var ctx = canvas1.getContext("2d");
			    ctx.drawImage(image, sourceX, 
					     sourceY,
					     sourceWidth,
					     sourceHeight, 
					     destX, 
					     destY, 
					     destWidth, 
					     destHeight);
			    var image2 = new Image();
			    image2 = Canvas2Image.convertToJPEG(canvas1);
			    image2Data = image2.src;
			    doc.addImage(image2Data, 'JPEG', 12, 10);
			    croppingYPosition += destHeight;              
			}                  
		      var d = new Date().toISOString().slice(0, 19).replace(/-/g, "");
		      filename = 'report_' + d + '.pdf';
		      doc.save(filename);
		  }
	        });
	    });	
}(jQuery));
