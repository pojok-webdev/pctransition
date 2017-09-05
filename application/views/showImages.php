<ul id="myul">
<?php
foreach($survey_images as $image){
	echo "<li myid=".$image->id.">".$image->path."</li>";
} 
?>
</ul>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
	var MAX_HEIGHT = 100;
	convertImage = (imageToConvert,callback)=>{
			//console.log($(this).text());
			var img = new Image();
			img.src = "http://teknis/media/surveys/"+imageToConvert;
			var canvas = document.createElement("canvas");
			var ctx = canvas.getContext("2d");
			ctx.drawImage(img,0,0);
			//console.log(canvas.toDataURL("image/jpeg"));
			callback(canvas.toDataURL("image/jpeg"));
	}
	convertResizeImage = (imageToConvert,callback)=>{
        var canvas = document.createElement("canvas");
        var img = new Image();
        img.src = "http://teknis/media/surveys/"+imageToConvert;
		if(img.height > MAX_HEIGHT){
			img.width*=MAX_HEIGHT / img.height;
			img.height = MAX_HEIGHT;
		}
        var ctx = canvas.getContext("2d");
        ctx.clearRect(0,0,canvas.width,canvas.height);
        canvas.width = img.width;
        canvas.height = img.height;
        ctx.drawImage(img, 0, 0, img.width, img.height);
        callback(canvas.toDataURL("image/jpeg"));	
	}
	function render(src){
		var image = new Image();
		image.onload = function(){
			var canvas = document.getElementById("myCanvas");
			if(image.height > MAX_HEIGHT) {
				image.width *= MAX_HEIGHT / image.height;
				image.height = MAX_HEIGHT;
			}
			var ctx = canvas.getContext("2d");
			ctx.clearRect(0, 0, canvas.width, canvas.height);
			canvas.width = image.width;
			canvas.height = image.height;
			ctx.drawImage(image, 0, 0, image.width, image.height);
		};
		image.src = src;
}
	
	(function($){
		console.log("donell");
		$("#myul li").each(function(){
			var _this = $(this).attr("myid");
			convertImage($(this).text(),function(result){
				$.ajax({
					url:"http://teknis/survey_images/update",
					data:{id:_this,img:result},
					type:"post"
				}).done(function(data){
					console.log("sukese",data);
				}).fail(function(){
					console.log("failed");
				});
					
			});
		});
	}(jQuery))
	resizeImage = (url)=>{
        var canvas = document.createElement("canvas");
        var maxwidthallowed = 200;
        var maxheight = 0;
        canvas.width = 200;
        var img = new Image();
        img.src = url;
        maxheight = img.height * maxwidthallowed / img.width;
        canvas.height = maxheight;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, maxwidthallowed, maxheight);
        return canvas.toDataURL("image/jpeg");		
	}
</script>
