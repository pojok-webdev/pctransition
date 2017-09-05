<?php
class Maintenanceoperator extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Maintenanceoperator();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
//		return mysql_insert_id();
		return $this->db->insert_id();
	}
}
