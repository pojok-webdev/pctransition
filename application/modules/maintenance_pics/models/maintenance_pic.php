<?php
class Maintenance_pic extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function populate($maintenance_id){
		$obj = new Maintenance_pic();
		$obj->where('maintenance_id',$maintenance_id)->get();
		return $obj;
	}
}
