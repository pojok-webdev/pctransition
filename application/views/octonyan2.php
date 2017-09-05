<!DOCTYPE html>
<html>
<head>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <meta charset="utf-8">
  <title>JS Bin</title>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
  <script>
$(window).load(function(){    
      function getBase64Image(img) {
        var canvas = document.createElement("canvas");
        canvas.width = img.width;
        canvas.height = img.height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);
        var dataURL = canvas.toDataURL("image/jpeg");
        return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
    }

  var myImg = document.getElementById('pic');
  var imgData = getBase64Image(myImg);
  var doc = new jsPDF();
  doc.setFontSize(40);
  doc.text(35, 25, "Test Image");
  doc.addImage(imgData, 'JPEG', 15, 40, 180, 160);
  doc.output('datauri');
//  doc.save("sample.pdf");
  });

  
  </script>
</head>
<body>
  <img src="http://www.freeimages.com/img/certified_images/crt_SteveFE.jpg" id="pic" width="200px" height="200px" />
</body>
</html>
