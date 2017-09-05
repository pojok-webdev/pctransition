<?php
function getdatacenters(){
	$obj = new Datacenter();
	$obj->get();
	return $obj;
}
