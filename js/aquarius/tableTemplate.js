(function($){
	demoFromHTML = function (options) {
		var settings = $.extend({
			source:'a',
			filename:'padiNET',
			},options);
		var pdf = new jsPDF('p', 'pt', 'letter')


		// we support special element handlers. Register them with jQuery-style 
		// ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
		// There is no support for any other type of selectors 
		// (class, of compound) at this time.
		, specialElementHandlers = {
			// element with id of "bypass" - jQuery style selector
			'#bypassme': function(element, renderer){
				// true = "handled elsewhere, bypass text extraction"
				return true
			}
		}

		margins = {
		  top: 80,
		  bottom: 60,
		  left: 40,
		  width: 522
		};
		// all coords and widths are in jsPDF instance's declared units
		// 'inches' in this case
		pdf.fromHTML(
			settings.source // HTML string or DOM elem ref.
			, margins.left // x coord
			, margins.top // y coord
			, {
				'width': margins.width // max width of content on PDF
				, 'elementHandlers': specialElementHandlers
			},
			function (dispose) {
			  // dispose: object with X, Y of the last line add to the PDF 
			  //          this allow the insertion of new lines after html
			  pdf.save(settings.filename);
			},
			margins
		)
	}


	$('#downloadPDF').click(function(){
		demoFromHTML({
			source:$('#mybody')[0],
			filename:'Rekap Ticket '+$('#clientname').html()+'.pdf',
		});
	});
	$('#btnHome').click(function(){
		window.location.href = 'http://db_teknis/index.php/reports';
	});
}(jQuery));
