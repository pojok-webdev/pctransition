<?php
class Troubleshoot_material extends DataMapper{
	var $has_one = array('troubleshoot_request');
	function __construct(){
		parent::__construct();
	}
	
	function insert($params){
		$obj = new Troubleshoot_material();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
}
