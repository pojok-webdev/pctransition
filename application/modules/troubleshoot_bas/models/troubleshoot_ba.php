<?php
class Troubleshoot_ba extends DataMapper{
	var $has_one = array('troubleshoot_request');
	function __construct(){
		parent::__construct();
	}
	function add($params){
		$obj = new Troubleshoot_ba();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return mysql_insert_id();
	}
	
	function remove($id){
		$obj = new Troubleshoot_ba();
		$obj->where('id',$id)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
	
}
