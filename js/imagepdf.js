// Because of security restrictions, getImageFromUrl will
// not load images from other domains.  Chrome has added
// security restrictions that prevent it from loading images
// when running local files.  Run with: chromium --allow-file-access-from-files --allow-file-access
// to temporarily get around this issue.
(function($){
	alert('xxx');
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

// Since images are loaded asyncronously, we must wait to create
// the pdf until we actually have the image.
// If we already had the jpeg image binary data loaded into
// a string, we create the pdf without delay.
	var createPDF = function(imgData) {
		var doc = new jsPDF();

		// This is a modified addImage example which requires jsPDF 1.0+
		// You can check the former one at examples/js/basic.js

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
		doc.output('datauri');
	}

	getImageFromUrl('thinking-monkey.jpg', createPDF);
}(jQuery));
