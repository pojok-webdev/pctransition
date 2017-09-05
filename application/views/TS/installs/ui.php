<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view("adm/head");?>
	<script type="text/javascript" src="<?php echo base_url();?>js/jscolor.js"></script>
	<body>
		<div class="header">
			<a class="logo" href="index.html"><img src="img/logo.png" alt="PadiAPP" title="Edit Gambar"/></a>
			<ul class="header_menu">
				<li class="list_icon"><a href="#">&nbsp;</a></li>
			</ul>
		</div>
		<?php $this->load->view("adm/menu")?>
		<div class="content">
			<div class="breadLine">
				<ul class="breadcrumb">
					<li><a href="#">PadiApp</a> <span class="divider">></span></li>
					<li class="active">Edit Gambar</li>
				</ul>
			</div>
			<div class="workplace">
				<input type="hidden" value=<?php echo $this->uri->segment(3);?> id="imagename" name="imagename"/>
				<div class="row-fluid">
					<div class="span12">
						<div class="head clearfix">
							<div class="isw-picture"></div>
							<h1>Picture</h1>
							<ul class="buttons">
								<li class="s_loader isw-circle" id="btnCircle" title="Circle"></li>
								<li class="s_loader isw-right" id="btnArrow" title="Panah"></li>
								<li class="s_loader isw-minus" id="btnLine" title="Garis"></li>
								<li class="s_loader isw-edit" id="btnText" title="Text"></li>
								<li><input id="picker_" class="color"></li>
								<li class="s_loader isw-save" id="btnSave" title="Simpan"></li>
								<li class="s_loader isw-cancel" id="btnClear" title="Bersihkan"></li>
							</ul>
						</div>
						<div class="block-fluid tabs">
							<canvas id="mycanvas" width=600 height=600></canvas>
						</div>
					</div>
				</div>
				<div class="dr"><span></span></div>
			</div>
		</div>
		<script type="text/javascript">
		(function($){
			getMousePos = function(canvas,evt){
				var rect = canvas.getBoundingClientRect();
				return {
					x:evt.clientX-rect.left,
					y:evt.clientY-rect.top
				};
			};			
			loadImage = function(){
				imageObj.onload = function(){
					context.drawImage(imageObj,0,0);
				}
				//imageObj.src = "https://database.padinet.com/media/installs/"+$("#imagename").val();
				imageObj.src = "https://teknis/media/installs/"+$("#imagename").val();
			}
			var imageObj = new Image(),
			canvas = document.getElementById("mycanvas"),
			context = canvas.getContext('2d'),
			mycursor="arrow",
			mycolor="#000000",
			curPosX=0,
			curPosY=0;
			canvas.addEventListener('mousedown',function(evt){
				var mousepos = getMousePos(canvas,evt);
				console.log($(".color").val());
				switch(mycursor){
					case "line":
						context.beginPath();
						context.moveTo(mousepos.x,mousepos.y);
					break;
					case "circle":
						context.beginPath();
						curPosX = mousepos.x;
						curPosY = mousepos.y;
					break;
					case "lineWithArrow":
						context.beginPath();
						curPosX=mousepos.x;
						curPosY=mousepos.y;
						context.moveTo(mousepos.x,mousepos.y);
					break;
				}
			});
			canvas.addEventListener('mouseup',function(evt){
				var mousepos = getMousePos(canvas,evt);
				switch(mycursor){
					case "circle":
						context.beginPath();
						xx = Math.pow((mousepos.x - curPosX),2);
						yy = Math.pow((mousepos.y - curPosY),2);
						radius = Math.sqrt(xx+yy);
						context.arc(curPosX,curPosY,radius,0,2*Math.PI,false);
						context.lineWidth=4;
						context.strokeStyle='#'+$(".color").val();
						context.stroke();
						break;
					case"arrow":
						context.beginPath();
						context.moveTo(mousepos.x,mousepos.y);
						context.lineTo(mousepos.x-50,mousepos.y-20);
						context.lineTo(mousepos.x-50,mousepos.y+20);
						context.fillStyle='#'+$(".color").val();
						context.fill();
						break;
					case "line":
						context.lineTo(mousepos.x,mousepos.y);
						context.strokeStyle='#'+$(".color").val();
						context.lineWidth = 4;
						context.stroke();
						break;
					case "lineWithArrow":
						context.lineTo(mousepos.x,mousepos.y);
						context.strokeStyle='#'+$(".color").val();
						context.lineWidth = 4;
						context.stroke();
						context.beginPath();
						context.moveTo(curPosX,curPosY);
					break;
				}
			});
			$("#btnClear").click(function(){
				context.clearRect(0,0,canvas.width,canvas.height);
				loadImage();
			});
			$("#btnSave").click(function(){
				var dataUrl = canvas.toDataURL(),
				arrfilename=$("#imagename").val().split(".");
				$.ajax({
					url:thisdomain+"adm/canvasinstallupload2",
					data:{imgBase64:dataUrl,filename:arrfilename[0],fileextension:arrfilename[1]},
					type:"post"
				}).done(function(data){
					console.log("Returned value "+data);
				});
			});
			$("#btnArrow").click(function(){
				mycursor = "arrow";
			});
			$("#btnLine").click(function(){
				mycursor = "line";
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
				imageObj.src = "https://teknis/media/installs/"+$("#imagename").val();
				//imageObj.src = "https://database.padinet.com/media/installs/"+$("#imagename").val();
			});
			loadImage();
		}(jQuery));
		</script>
	</body>
</html>
