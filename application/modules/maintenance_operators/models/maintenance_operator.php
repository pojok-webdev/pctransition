<?php
class Maintenance_operator extends DataMapper{
	var $has_one = array('maintenance_request');
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Maintenance_operator();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
		//return mysql_insert_id();
	}

	function remove_operator($params){
		$obj = new Maintenance_operator();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
	}
}
