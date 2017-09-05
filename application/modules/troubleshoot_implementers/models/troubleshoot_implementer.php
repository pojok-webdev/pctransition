<?php
class Troubleshoot_implementer extends DataMapper{
	var $has_one = array('troubleshoot_request','user');
	function __construct(){
		parent::__construct();
	}
	
	function insert($params){
		$obj = new Troubleshoot_implementer();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	
	function remove($id){
		$obj = new Troubleshoot_implementer();
		$obj->where('id',$id)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
}
