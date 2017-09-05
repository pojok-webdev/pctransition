<html>
	<head>
		<script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/links.js"></script>
	</head>
	<body>
		<canvas id="mycanvas" width=500 height=200></canvas>
		<br />
		<img id="saveimg" />
		<br />
		<button id="btnCircle">Circle</button>
		<button id="btnArrow">Arrow</button>
		<button id="btnArrowLengthUp">Arrow+</button>
		<button id="btnClear">Clear</button>
		<button id="btnLoadImage">Load Image</button>
		<button id="btnSave">Save</button>
		<button id="btnDownload">Download</button>
		<script>
			(function($){
				getMousePos = function(canvas,evt){
					var rect = canvas.getBoundingClientRect();
					return {
						x:evt.clientX-rect.left,
						y:evt.clientY-rect.top
					};
				};
				var canvas = document.getElementById("mycanvas")
				,context = canvas.getContext('2d'),mycursor="arrow",editPosX=0,editPosY=0;
				canvas.addEventListener('mouseup',function(evt){
					var mousepos = getMousePos(canvas,evt);
					if(mycursor==="circle"){
						context.beginPath();
						context.arc(mousepos.x,mousepos.y,70,0,2*Math.PI,false);
						//context.fillStyle='green';
						//context.fill();
						context.lineWidth=10;
						context.strokeStyle='#003300';
						context.stroke();
					}
					if(mycursor==="arrow"){
						context.beginPath();
						context.moveTo(mousepos.x,mousepos.y);
						editPosX=mousepos.x;
						editPosY=mousepos.y;
						console.log("editposy 1:"+editPosY);
						context.lineTo(mousepos.x-50,mousepos.y-20);
						context.lineTo(mousepos.x-50,mousepos.y+20);
						console.log("editposy 2:"+editPosY);
						context.fill();
						console.log("editposy 3:"+editPosY);
					}
				});
				$("#btnClear").click(function(){
					context.clearRect(0,0,canvas.width,canvas.height);
				});
				$("#btnSave").click(function(){
					var dataUrl = canvas.toDataURL();
					$.ajax({
						url:thisdomain+"adm/canvasupload2",
						data:{imgBase64:dataUrl},
						type:"post"
        					});
				});
				$("#btnArrow").click(function(){
					mycursor = "arrow";
				});
				$("#btnCircle").click(function(){
					mycursor = "circle";
				});
				$("#btnDownload").click(function(){
					var dataUrl = canvas.toDataURL();
					var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");  
					window.location.href=image; 
				});
				$("#btnLoadImage").click(function(){
					var imageObj = new Image();
					imageObj.onload = function(){
						context.drawImage(imageObj,0,0);
					}
					imageObj.src = "https://teknis/media/puji.png";
				});
				$("#btnArrowLengthUp").click(function(){
					context.beginPath();
					context.moveTo(editPosX,editPosY);
					context.lineTo(editPosX-150,editPosY);
					context.stroke();
				});
			}(jQuery))
		</script>
	</body>
</html>
