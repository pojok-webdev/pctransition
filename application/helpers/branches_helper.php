<?php
function getbrancharray(){
	$objs = new Branch();
	$objs->get();
	$out = array();
	foreach($objs as $obj){
		$out[$obj->id] = $obj->name;
	}
	return $out;
}
function getbranch($id){
	$obj = new Branch();
	$obj->where("id",$id)->get();
	//echo $obj->check_last_query();
	return $obj->name;
}
