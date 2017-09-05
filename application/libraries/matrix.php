<?php
class Matrix {
	function makerow($array,$n,$index){
		
		$lastitem = count($array);
		$habis = false;
		echo '<div class="container container-sixteen">';
		echo '<div class="sixteen columns">';
		for($c=0;$c<$n;$c++){
			if($c+$index==$lastitem){
				$habis = true;
				break;
			}
			echo '<div class="six columns">' . $array[$c+$index]['name'] . '</div>';
		}
		echo '<br />';
		for($c=0;$c<$n;$c++){
			if($c+$index==$lastitem){
				$habis = true;
			break;
			}
			echo '<div class="six columns">' .  $array[$c+$index]['address'] . '</div>';
		}
		echo '<br />';
		echo '</div>';
		echo '</div>';
		if(!$habis){
			Matrix::makerow($array,$n,$c+$index);
		}
	}
}