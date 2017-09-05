<?php
function saveusersession(){
	$ci = & get_instance();
	$_SESSION['path'] = $ci->uri->segment(3);
}
function getusersession(){
	return $_SESSION['path'];
}
