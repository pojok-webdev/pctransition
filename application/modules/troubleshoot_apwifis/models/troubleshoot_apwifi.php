<?php
class Troubleshoot_apwifi extends DataMapper{
	var $has_one = array('troubleshoot_request');
	function __construct(){
		parent::__construct();
	}
	function insert($params){
		$obj = new Troubleshoot_apwifi();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
}
