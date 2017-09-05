<html>
	<head>
		<title>Image Loader</title>
		<meta content="">
		<style></style>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
	</head>
	<body>
		<div ng-app="myApp" ng-controller="myController">
			<ul ng-repeat="img in images">
				<li>{{img.id}}{{img.path}}</li>
			</ul>
		</div>
	</body>
	<script>
		var app = angular.module("myApp",[]);
		app.controller("myController",function($scope,$http){
			$http.get("http://plgdevel/adm/showImages")
			.success(function(resp){
				console.log(resp.out);
				$scope.images = resp.out;
				for(var i=0;i<resp.out.length;i++){
					convertImage(resp.out[i].id,resp.out[i].path,function(imageId,imageResult){
						console.log(imageResult)
						$http.get("http://plgdevel/adm/saveBlob/"+imageId+"/"+imageResult)
						.success(function(data){
							console.log("Sukses simpan blob",data)
						})
						.catch(function(err){
							console.log("error",err)
						});
					});
				}
			});
		});
		convertImage = function(imageId,imageToConvert,callback){
			var img = new Image();
			img.src = "http://plgdevel/media/surveys/"+imageToConvert;
			var canvas = document.createElement("canvas");
			var ctx = canvas.getContext("2d");
			ctx.clearRect(0,0,canvas.width,canvas.height);
			ctx.drawImage(img,0,0);
			callback(imageId,canvas.toDataURL("image/jpg"));
		}
	</script>
</html>
