<?php
class Maintenance_image extends DataMapper{
	var $has_one = array('maintenance_request');
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Maintenance_image();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return mysql_insert_id();
	}
	
	function remove($params){
		$obj = new Maintenance_image();
		$obj->get_by_id($params['id']);
		$obj->delete();
		return $obj->check_last_query();
	}
}
