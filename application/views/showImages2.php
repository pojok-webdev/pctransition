<ul id="myul">
<?php
foreach($survey_images as $image){
	echo "<li myid=".$image->id.">".$image->path."</li>";
	$im = file_get_contents("http://teknis/media/surveys/".$image->path);
	$imdata = base64_encode($im);
	//echo $imdata;
	echo '<img src="data:image/jpeg;base64,'.$imdata.'">';
} 
?>
</ul>
