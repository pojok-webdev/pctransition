<?php
class Site_router extends DataMapper{
	var $has_one = array('client_site');
	var $has_many = array();
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Site_router();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	
	function edit($params){
		$obj = new Site_router();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
	}
	
	function get_obj_by_id($id){
		$obj = new Site_router();
		$obj->get_obj_by_id($id);
		return $obj;
	}
	
	function remove($id){
		$obj = new Site_router();
		$obj->where('id',$id)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
	
	function populate(){
		$obj = new Site_router();
		$obj->get();
		return $obj;
	}
}
