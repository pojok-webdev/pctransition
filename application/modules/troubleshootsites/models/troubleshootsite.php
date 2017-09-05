<?php
class Troubleshootsite extends Datamapper{
var $has_one = array("troubleshoot_request");
var $has_many = array("troubleshootdevice");
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Troubleshootsite();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
		//return mysql_insert_id();
	}
	
	function get_obj_by_id($id){
		$obj = new Troubleshootsite();
		return $obj->get_by_id($id);
	}
	
	function remove($id){
		$obj = new Troubleshootsite();
		$obj->where('id',$id)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
}
