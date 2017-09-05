(function($){
	$('#btnHome').click(function(){
		window.location.href = thisdomain+'surveys';
	});
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
	demoFromHTML2 = function(options){
		var settings = $.extend({
			source:"x",
			filename:"padiNET2"
		},options);
		console.log("demo 2x");
//		var doc = new jsPDF(orientation, unit, format, compress);
		var doc = new jsPDF('p', 'pt', 'letter');
		doc.setPage();
		doc.text(140,140,"Hello");
		doc.text(140,180,"Hellowww");
		console.log("demo 2");
//		doc.save();
		doc.output('datauri');
	}
	$('#downloadPDF').click(function(){
		demoFromHTML({
			source:$('#fromHTMLtestdiv')[0],
			filename:$("#rpttype").html()+'-'+$("#customername").html()+'-'+$("#surveydate").html()+'.pdf',
		});
	});
}(jQuery));
