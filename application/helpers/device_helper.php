<?php
function getcombodata($keyval=true,$devicetype = null){
	$objs = new Device();
	if($devicetype!=null){
		$objs->where('active','1')->where_in('devicetype_id',$devicetype)->order_by('name','asc')->get();
	}else{
		$objs->where('active','1')->order_by('name','asc')->get();
	}
	$out = array();
	if($keyval){
		foreach($objs as $obj){
			$out[$obj->id] = $obj->name;
		}
	}else{
		foreach($objs as $obj){
			$out[$obj->name] = $obj->name;
		}			
	}
	return $out;
}
function getvalcombodata($devicetype = null){
	$objs = new Device();
	if($devicetype!=null){
		$objs->where('active','1')->where_in('devicetype_id',$devicetype)->order_by('name','asc')->get();
	}else{
		$objs->where('active','1')->order_by('name','asc')->get();
	}
	$out = array();
	foreach($objs as $obj){
		$out[$obj->devicetype->name . ' (' .$obj->name . ')'] = $obj->devicetype->name . ' (' .$obj->name . ')';
	}				
	return $out;
}
