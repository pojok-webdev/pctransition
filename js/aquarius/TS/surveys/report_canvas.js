(function($){
	$('#btnHome').click(function(){
		window.location.href = thisdomain+'surveys';
	});
	$('#downloadPDF').click(function(){
	       html2canvas(document.body, {
		  onrendered: function(canvas) {
		      //document.body.appendChild(canvas);
		      var pdf = new jsPDF('p', 'pt', 'letter');
			pdf.addImage(canvas, 'JPEG', 5, 10, null, null);
			pdf.save('Laporan Survey : '+$("#customername").html()+'-'+$("#surveydate").html()+'.pdf');
		  }
	        });
	});
}(jQuery));
