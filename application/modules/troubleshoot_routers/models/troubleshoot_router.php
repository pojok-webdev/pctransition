<?php
class Troubleshoot_router extends DataMapper{
	var $has_one = array('troubleshoot_request');
	function __construct(){
		parent::__construct();
	}
	
	function insert($params){
		$obj = new Troubleshoot_router();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	
	function populate($request_id,$ioflag='1'){
		$obj = new Troubleshoot_router();
		$obj->where('troubleshoot_request_id',$request_id)->where('ioflag',$ioflag)->get();
		return $obj;
	}
}
