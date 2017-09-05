(function($){
	toRad = function(degree){
		return degree * Math.PI / 180;
	}
	sinResult = function(degree){
		return Math.sin(toRad(degree));
	}
	cosResult = function(degree){
		return Math.cos(toRad(degree));
	}
	makeline = function(x1,y1,radius,angle){
		x2 = radius*cosResult(angle)+x1;
		y2 = radius*sinResult(angle)+y1;
		context.moveTo(x1,y1);
		context.lineTo(x2,y2);
		context.stroke();
		return {
			outx:x2,outy:y2
		}
	}
	makecurve = function(startX,startY,mousepos,ocolor){
		context.beginPath();
		var width = mousepos.x - startX, height = mousepos.y - startY;
		context.moveTo(startX,startY);
		context.quadraticCurveTo(startX,startY+height,startX+width,startY+height);
		context.strokeStyle = ocolor;
		context.stroke();
		return {
			outx:mousepos.x,outy:mousepos.y
		}
	}
	makecountercurve = function(startX,startY,mousepos,ocolor){
		context.beginPath();
		var width = mousepos.x - startX, height = mousepos.y - startY;
		context.moveTo(startX,startY);
		context.quadraticCurveTo(startX+width,startY,startX+width,startY+height);
		context.strokeStyle = ocolor;
		context.stroke();
		return {
			outx:mousepos.x,outy:mousepos.y
		}
	}
	makecurvewitharrow = function(startX,startY,mousepos,ocolor){
		endpoint = makecurve(startX,startY,mousepos,ocolor);
		radius = getRadius(startX,startY,endpoint.outx,endpoint.outy);
		angle = getDegree(startX,startY,endpoint.outx,endpoint.outy);
		if(endpoint.outx-40>startX){
			line2 = makeline(endpoint.outx,endpoint.outy,20,180+20);
			line2 = makeline(endpoint.outx,endpoint.outy,20,180-20);
		}
		if(endpoint.outx+40<startX){
			line2 = makeline(endpoint.outx,endpoint.outy,20,-20);
			line2 = makeline(endpoint.outx,endpoint.outy,20,+20);
		}
	}
	makecountercurvewitharrow = function(startX,startY,mousepos,ocolor){
		endpoint = makecountercurve(startX,startY,mousepos,ocolor);
		radius = getRadius(startX,startY,endpoint.outx,endpoint.outy);
		angle = getDegree(startX,startY,endpoint.outx,endpoint.outy);
		if(endpoint.outy-40>startY){
			line = makeline(endpoint.outx,endpoint.outy,20,250);
			line2 = makeline(endpoint.outx,endpoint.outy,20,290);
		}
		if(endpoint.outy+40<startY){
			line2 = makeline(endpoint.outx,endpoint.outy,20,+70);
			line2 = makeline(endpoint.outx,endpoint.outy,20,+110);
		}
	}
	makeroundedcorner = function(startX,startY,endX,endY,ocolor){
		context.beginPath();
		var width = endX - startX, height = endY - startY;
		context.moveTo(startX,startY);
		context.quadraticCurveTo(startX,startY+height,startX+width,startY+height);
		context.strokeStyle = ocolor;
		context.stroke();
		return {
			outx:endX,outy:endY
		}
	}
	makelinewitharrow = function(x1,y1,radius,angle,arrowangle){
		line1 = makeline(x1,y1,radius,angle);
		line2 = makeline(line1.outx,line1.outy,20,180+angle-arrowangle);
		line3 = makeline(line1.outx,line1.outy,20,180+angle+arrowangle);
	}
	getMousePos = function(canvas,evt){
		var rect = canvas.getBoundingClientRect();
		return {
			x:evt.clientX-rect.left,
			y:evt.clientY-rect.top
		};
	};
	clearRect = function(){
		context.clearRect(0,0,canvas.width,canvas.height);
		loadImage();
	}
	drawCircle = function(mousepos,ocolor){
		context.beginPath();
		xx = Math.pow((mousepos.x - startX),2);
		yy = Math.pow((mousepos.y - startY),2);
		radius = Math.sqrt(xx+yy);
		context.arc(startX, startY, radius,0,2*Math.PI,false);
		context.lineWidth=4;
		context.strokeStyle = ocolor;
		context.stroke();
	}
	drawLine = function(startX,startY,mousepos,ocolor,linewidth){
		context.setLineDash([]);
		context.beginPath();
		context.moveTo(startX,startY);
		context.lineTo(mousepos.x,mousepos.y);
		context.strokeStyle=ocolor;
		context.lineWidth = linewidth;
		context.stroke();
	}
	drawFreeLine = function(mousepos,ocolor){
		context.lineTo(mousepos.x,mousepos.y);
		context.strokeStyle=ocolor;
		context.lineWidth = 4;
		context.stroke();
	}
	drawRectangle = function(mousepos,ocolor){
		context.beginPath();
		context.rect(startX,startY,mousepos.x - startX,mousepos.y - startY);
		context.lineWidth = 4;
		context.strokeStyle = ocolor;
		context.stroke();
	}
	drawObject = function(mousepos,ocolor,src,width,height){
		context.beginPath();
		startX = mousepos.x;
		startY = mousepos.y;
		context.moveTo(mousepos.x+width,mousepos.y+height);
		var stamp = new Image();
		stamp.src = src;
		context.strokeStyle = ocolor;
		context.drawImage(stamp,startX,startY,width,height);
	}
	drawStamp = function(mousepos,ocolor,stamp){
		context.beginPath();
		startX = mousepos.x-200;
		startY = mousepos.y-200;
		context.moveTo(startX,startY);
		img = new Image();
		img.src = stamp;
		context.strokeStyle = ocolor;
		context.drawImage(img,startX,startY,600,340);
	}
	drawText = function(startX,startY,mousepos,ocolor){
		var fsize = 16;
		fsize *= scale;
		console.log('scale',scale);
		context.putImageData(imageData, 0, 0);
		context.save();
		th = mousepos.x - startX;
		tv = mousepos.y - startY;
		radian = Math.atan2(tv , th);
		context.translate(startX,startY);
		context.rotate(radian);
		context.font = fsize+"px "+fonttype;
		console.log('context.font',context.font);
		context.fillStyle = ocolor;
		context.textAlign = "left";
		context.fillText($("#textToWrite").val(),0,0);
		context.restore();
	}
	getRadius = function(startX,startY,endX,endY){
		th = endX - startX;
		tv = endY - startY;
		out = Math.sqrt(Math.pow(th,2)+Math.pow(tv,2));
		return out;
	}
	getDegree = function(startX,startY,endX,endY){
		radian = Math.atan2(endY-startY,endX-startX);
		out = radian * (180 / Math.PI);
		return out;
	}
	drawArrow = function(startx,starty,endx,endy,arrowangle,ocolor){
		context.strokeStyle=ocolor;
		angle = getDegree(startx,starty,endx,endy);
		radius = getRadius(startx,starty,endx,endy);
		line1 = makeline(startx,starty,radius,angle);
		line2 = makeline(line1.outx,line1.outy,20,180+angle-arrowangle);
		line3 = makeline(line1.outx,line1.outy,20,180+angle+arrowangle);
	}
	drawRoundedRectangle = function(mousepos,ocolor){
		context.beginPath();
		margin =20;
		angle = getDegree(startX,startY,mousepos.x,mousepos.y);
		console.log('main color',ocolor);
		context.fillStyle = ocolor;
		if (angle>0 && angle <=90){
			makeroundedcorner(mousepos.x,mousepos.y-margin,mousepos.x-margin,mousepos.y,ocolor);
			makeroundedcorner(startX,startY+margin,startX+margin,startY,ocolor);
			makeroundedcorner(startX,mousepos.y-margin,startX+margin,mousepos.y,ocolor);
			makeroundedcorner(mousepos.x,startY+margin,mousepos.x-margin,startY,ocolor);
			context.moveTo(startX,startY+margin);
			context.lineTo(startX,mousepos.y-margin);
			context.stroke();
			context.moveTo(startX+margin,startY);
			context.lineTo(mousepos.x-margin,startY);
			context.stroke();
			context.moveTo(startX+margin,mousepos.y);
			context.lineTo(mousepos.x-margin,mousepos.y);
			context.stroke();
			context.moveTo(mousepos.x,startY+margin);
			context.lineTo(mousepos.x,mousepos.y-margin);
			context.stroke();
			console.log('1st color',ocolor);
		}
		if (angle<0 && angle >-90){
			makeroundedcorner(startX,startY-margin,startX+margin,startY,ocolor);
			makeroundedcorner(startX,mousepos.y+margin,startX+margin,mousepos.y,ocolor);
			makeroundedcorner(mousepos.x,startY-margin,mousepos.x-margin,startY,ocolor);
			makeroundedcorner(mousepos.x,mousepos.y+margin,mousepos.x-margin,mousepos.y,ocolor);
			context.moveTo(startX,startY-margin);
			context.lineTo(startX,mousepos.y+margin);
			context.stroke();
			context.moveTo(startX+margin,startY);
			context.lineTo(mousepos.x-margin,startY);
			context.stroke();
			context.moveTo(startX+margin,mousepos.y);
			context.lineTo(mousepos.x-margin,mousepos.y);
			context.stroke();
			context.moveTo(mousepos.x,startY-margin);
			context.lineTo(mousepos.x,mousepos.y+margin);
			context.stroke();
			console.log('2nd color',ocolor);
		}
		if (angle>-180 && angle <-90){
			makeroundedcorner(startX+margin,startY-margin,startX,startY,ocolor);
			makeroundedcorner(startX+margin,mousepos.y+margin,startX,mousepos.y,ocolor);//ok
			makeroundedcorner(mousepos.x,startY-margin,mousepos.x+margin,startY,ocolor);//ok
			makeroundedcorner(mousepos.x,mousepos.y+margin,mousepos.x+margin,mousepos.y,ocolor);//ok
			context.moveTo(startX+margin,startY-margin);
			context.lineTo(startX+margin,mousepos.y+margin);
			context.stroke();
			context.moveTo(startX,startY);
			context.lineTo(mousepos.x+margin,startY);
			context.stroke();
			context.moveTo(startX,mousepos.y);
			context.lineTo(mousepos.x+margin,mousepos.y);
			context.stroke();
			context.moveTo(mousepos.x,startY-margin);
			context.lineTo(mousepos.x,mousepos.y+margin);
			context.stroke();
			console.log('3rd color',ocolor);
		}
		if (angle>90 && angle <180){
			makeroundedcorner(startX,startY+margin,startX-margin,startY,ocolor);
			makeroundedcorner(startX,mousepos.y-margin,startX-margin,mousepos.y,ocolor);
			makeroundedcorner(mousepos.x,startY+margin,mousepos.x+margin,startY,ocolor);
			makeroundedcorner(mousepos.x,mousepos.y-margin,mousepos.x+margin,mousepos.y,ocolor);
			context.moveTo(startX,startY+margin);
			context.lineTo(startX,mousepos.y-margin);
			context.stroke();
			context.moveTo(startX-margin,startY);
			context.lineTo(mousepos.x+margin,startY);
			context.stroke();
			context.moveTo(startX-margin,mousepos.y);
			context.lineTo(mousepos.x+margin,mousepos.y);
			context.stroke();
			context.moveTo(mousepos.x,startY+margin);
			context.lineTo(mousepos.x,mousepos.y-margin);
			context.stroke();
			console.log('4th color',ocolor);
		}
	}
	makepath = function(startX,startY,mousepos,ocolor){
		context.beginPath();
		context.moveTo(startX,startY);
		context.lineTo(mousepos.x,mousepos.y);
		context.strokeStyle=ocolor;
		context.setLineDash([5,15]);
		context.stroke();
	}
	download = function(link,canvas,filename){
		link.href = canvas.toDataURL();
		link.download = filename;
	}
	loadImage = function(){
		imageObj.onload = function(){
			context.drawImage(imageObj,0,0);
		}
	//	imageObj.src = ";
	}
	var imageObj = new Image(),
		canvas = document.getElementById("mycanvas"),
		context = canvas.getContext('2d'),
		mycursor="arrow",
		mycolor="#000000",
		buttonPushed = false,
		curPosX= 0,
		curPosY= 0,
		startX = 0,
		startY = 0,
		size = 'small',
		scale = 1,
		width = 40, height = 70,
		fonttype = 'opensans',
		imageData = context.getImageData(0, 0, context.canvas.width, context.canvas.height);
		loadImages = function(){
			var imageObj = new Image();
			imageObj.onload = function(){
				context.drawImage(imageObj,0,0);
			}
			imageObj.src = $('#img').val();
		}
		loadImages();

	canvas.addEventListener('mousedown',function(evt){
		var mousepos = getMousePos(canvas,evt),ocolor = '#'+$('.color').val();
		buttonPushed = true;
		imageData = context.getImageData(0, 0, context.canvas.width, context.canvas.height);
		context.beginPath();
		startX = mousepos.x;
		startY = mousepos.y;
		switch(mycursor){
			case "line":
				context.moveTo(mousepos.x,mousepos.y);
			break;
			case "curve":
				context.moveTo(mousepos.x,mousepos.y);
			break;
			case "countercurve":
				context.moveTo(mousepos.x,mousepos.y);
			break;
			case "curveWithArrow":
				context.moveTo(mousepos.x,mousepos.y);
			break;
			case "counterCurveWithArrow":
				context.moveTo(mousepos.x,mousepos.y);
			break;
			case "arrow":
				context.moveTo(mousepos.x,mousepos.y);
			break;
			case "text":
				context.moveTo(mousepos.x,mousepos.y);
			break;
			case "freedrag":
				context.moveTo(mousepos.x,mousepos.y);
			break;
			case "circle":
				context.moveTo(mousepos.x,mousepos.y);
			break;
			case "roundedrectangle":
				context.moveTo(mousepos.x,mousepos.y);
			break;
			case "rectangle":
				context.moveTo(mousepos.x,mousepos.y);
			break;
			case "tower1":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/RadioTower.png',40*scale,70*scale);
			break;
			case "tower2":
				drawObject(mousepos,thisdomain+'img/stamps/antenna.png',40*scale,70*scale);
			break;
			case "palm1":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/palm1.png',40*scale,70*scale);
				break;
			case "palm2":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/palm.png',40*scale,70*scale);
				break;
			case "forest":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/forest.png',40*scale,70*scale);
				break;
			case "sharkright":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/whitehiungakakright.png',80*scale,110*scale);
				break;
			case "sharkleft":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/whitehiungakak.png',80*scale,110*scale);
				break;
			case "smilingLaptop":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/smilingLaptop.png',100*scale,100*scale);
				break;
			case "stampApproved":
				drawStamp(mousepos,ocolor,completed);
				break;		
			case "whitesedan":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/whitesedan.png',100*scale,100*scale);
				break;
			case "whitesedanr":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/whitesedanr.png',100*scale,100*scale);
				break;
		}
	});
	canvas.addEventListener('mousemove',function(evt){
		var mousepos = getMousePos(canvas,evt),ocolor = '#'+$(".color").val();
		if(buttonPushed){
			clearRect();
			context.putImageData(imageData, 0, 0);
			switch(mycursor){
				case "circle":
					context.setLineDash([]);
					context.lineWidth = 4;
					drawCircle(mousepos,'grey');
				break;
				case "curve":
					makecurve(startX,startY,mousepos);
				break;
				case "countercurve":
					makecountercurve(startX,startY,mousepos);
				break;
				case "curveWithArrow":
					makecurvewitharrow(startX,startY,mousepos);
				break;
				case "counterCurveWithArrow":
					makecountercurvewitharrow(startX,startY,mousepos);
				break;
				case "rectangle":
					drawRectangle(mousepos,'grey');
				break;
				case "roundedrectangle":
					drawRoundedRectangle(mousepos,'grey');
				break;
				case 'freedrag':
					drawFreeLine(mousepos,'grey');
				break;
				case 'line':
					drawLine(startX,startY,mousepos,'grey',4);
				break;
				case 'arrow':
					context.setLineDash([5,15]);
					drawLine(startX,startY,mousepos,'grey',4);
				break;
				case 'text':
					makepath(startX,startY,mousepos,'grey');
				break;
				case 'tower1':
					drawObject(mousepos,ocolor,thisdomain+'img/stamps/RadioTower.png',40*scale,70*scale);
				break;
				case 'tower2':
					drawObject(mousepos,ocolor,thisdomain+'img/stamps/antenna.png',40*scale,70*scale);
				break;
				case "sharkright":
					drawObject(mousepos,ocolor,thisdomain+'img/stamps/whitehiungakakright.png',80*scale,110*scale);
					break;
				case "sharkleft":
					drawObject(mousepos,ocolor,thisdomain+'img/stamps/whitehiungakak.png',80*scale,110*scale);
					break;
				case "palm1":
					drawObject(mousepos,ocolor,thisdomain+'img/stamps/palm1.png',40*scale,70*scale);
					break;
				case "palm2":
					drawObject(mousepos,ocolor,thisdomain+'img/stamps/palm.png',40*scale,70*scale);
					break;
				case "forest":
					drawObject(mousepos,ocolor,thisdomain+'img/stamps/forest.png',40*scale,70*scale);
					break;
				case "smilingLaptop":
					drawObject(mousepos,ocolor,thisdomain+'img/stamps/smilingLaptop.png',100*scale,100*scale);
					break;
				case "whitesedan":
					drawObject(mousepos,ocolor,thisdomain+'img/stamps/whitesedan.png',100*scale,100*scale);
					break;
				case "whitesedanr":
					drawObject(mousepos,ocolor,thisdomain+'img/stamps/whitesedanr.png',100*scale,100*scale);
					break;
			}
		}
	});
	canvas.addEventListener('mouseup',function(evt){
		var mousepos = getMousePos(canvas,evt),ocolor = '#'+$(".color").val();
		context.lineWidth = 4;
		buttonPushed = false;
		context.setLineDash([]);
		switch(mycursor){
			case "freedrag":
				drawFreeLine(mousepos,ocolor);
				break;
			case "circle":
				drawCircle(mousepos,ocolor);
				break;
			case "curve":
				c = makecurve(startX,startY,mousepos,ocolor);
				break;
			case "countercurve":
				c = makecountercurve(startX,startY,mousepos,ocolor);
				break;
			case "curveWithArrow":
				c = makecurvewitharrow(startX,startY,mousepos,ocolor);
				break;
			case "counterCurveWithArrow":
				c = makecountercurvewitharrow(startX,startY,mousepos,ocolor);
				break;
			case "rectangle":
				drawRectangle(mousepos,ocolor);
				break;
			case "roundedrectangle":
				drawRoundedRectangle(mousepos,ocolor);
				break;
			case "arrow":
				drawArrow(startX,startY,mousepos.x,mousepos.y,20,ocolor);
				break;
			case "line":
				drawLine(startX,startY,mousepos,ocolor,4);
				break;
			case "text":
				drawText(startX,startY,mousepos,ocolor);
				break;
			case "tower1":
			console.log('scale',scale);
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/RadioTower.png',40*scale,70*scale);
				break;
			case "tower2":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/antenna.png',40*scale,70*scale);
				break;
			case "palm1":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/palm1.png',40*scale,70*scale);
				break;
			case "palm2":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/palm.png',40*scale,70*scale);
				break;
			case "forest":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/forest.png',40*scale,70*scale);
				break;
			case "stampApproved":
				drawStamp(mousepos,ocolor,completed);
				break;
			case "sharkright":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/whitehiungakakright.png',80*scale,110*scale);
				break;
			case "sharkleft":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/whitehiungakak.png',80*scale,110*scale);
				break;
			case "smilingLaptop":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/smilingLaptop.png',100*scale,100*scale);
				break;
			case "whitesedan":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/whitesedan.png',100*scale,100*scale);
				break;
			case "whitesedanr":
				drawObject(mousepos,ocolor,thisdomain+'img/stamps/whitesedanr.png',100*scale,100*scale);
				break;
		}
	});
	$("#btnClear").click(function(){
		context.clearRect(0,0,canvas.width,canvas.height);
		loadImage();
	});
	$("#btnUndo").click(function(){
		clearRect();
		context.putImageData(imageData, 0, 0);
		$(this).attr('disabled',true)
	});

	$("#btnArrow").click(function(){
		mycursor = "arrow";
	});
	$("#btnLine").click(function(){
		mycursor = "line";
	});
	$("#btnCurve").click(function(){
		mycursor = "curve";
	});
	$("#btnCounterCurve").click(function(){
		mycursor = "countercurve";
	});
	$("#btnCurveWithArrow").click(function(){
		mycursor = "curveWithArrow";
	});
	$("#btnCounterCurveWithArrow").click(function(){
		mycursor = "counterCurveWithArrow";
	});
	$("#btnCircle").click(function(){
		mycursor = "circle";
	});
	$("#btnRectangle").click(function(){
		mycursor = "rectangle";
	});
	$("#btnRoundedRectangle").click(function(){
		mycursor = "roundedrectangle";
	});
	$("#btnFreeDrag").click(function(){
		mycursor = "freedrag";
	});
	$("#btnTower1").click(function(){
		mycursor = "tower1";
	});
	$("#btnTower2").click(function(){
		mycursor = "tower2";
	});
	$("#btnPalm1").click(function(){
		mycursor = "palm1";
	});
	$("#btnPalm2").click(function(){
		mycursor = "palm2";
	});
	$("#btnForest").click(function(){
		mycursor = "forest";
	});
	$("#btnSharkRight").click(function(){
		mycursor = "sharkright";
	});
	$("#btnSharkLeft").click(function(){
		mycursor = "sharkleft";
	});
	$("#btnSmilingLaptop").click(function(){
		mycursor = "smilingLaptop";
	});
	$("#whitesedan").click(function(){
		mycursor = "whitesedan";
	});
	$("#whitesedanr").click(function(){
		mycursor = "whitesedanr";
	});
	$("#btnStampApproved").click(function(){
		mycursor = "stampApproved";
	});
	$("#btnText").click(function(){
		$('#dText').modal();
		mycursor = "text";
	});
	$("#btnSave").click(function(){
		$.ajax({
			url:thisdomain+$('#saveurl').val(),
			data:{id:$('#id').val(),img:canvas.toDataURL()},
			type:'post'
		}).done(function(data){
			console.log('Sukses save image');
		}).fail(function(){
			console.log('Error save image');
		});
	});	
	$('#saveText').click(function(){
		$('#dText').modal('hide');
	});
	$("#btnDownload").click(function(){
		console.log('Download button clicked');
		//download(this,canvas,$('#picName').val());
		download(this,canvas,'padiNET.png');
/*		var dataUrl = canvas.toDataURL();
		var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
		window.location.href=image;*/
	});
	$("#btnLoadImage").click(function(){
		var imageObj = new Image();
		imageObj.onload = function(){
			context.drawImage(imageObj,0,0);
		}
		imageObj.src = $('#img').val();
	});
	$('.stampsize').click(function(){
		console.log('stampsize',$(this).attr('value'));
		switch($(this).attr('value')){
			case 'small':
				scale = 1;
				break;
			case 'medium':
				scale = 2;
				break;
			case 'big':
				scale = 3;
				break;
		}
	});
	$('.fonttype').click(function(){
		console.log('fonttype',$(this).attr('value'));
		switch($(this).attr('value')){
			case 'amaranth':
				fonttype = 'amaranth';
				console.log(fonttype,fonttype);
				break;
			case 'opensans':
				fonttype = 'opensans';
				console.log(fonttype,fonttype);
				break;
		}
	});
}(jQuery));
