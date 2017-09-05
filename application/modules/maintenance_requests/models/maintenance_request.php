<?php
class Maintenance_request extends DataMapper{
	var $has_one = array('client_site');
	var $has_many = array('user','maintenance_image','maintenance_operator');
	function __construct(){
		parent::__construct();
	}

	function add($params){
		$obj = new Maintenance_request();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return mysql_insert_id();
	}

	function add_operator($params){
		$user = new User();
		$user->get_by_id($params['user_id']);
		$maintenance = new Maintenance_request();
		$maintenance->get_by_id($params['maintenance_request_id']);
		$maintenance->save($user);
		return $maintenance->check_last_query();
	}

	function get_notification($status){
		$obj = new Maintenance_request();
		$obj->where('status',$status)->get();
		return $obj->result_count();
	}

	function get_obj_by_id($id){
		$obj = new Maintenance_request();
		$obj->where('id',$id)->get();
		return $obj;
	}

	function populate(){
		$obj = new Maintenance_request();
		$obj->get();
		return $obj;
	}

	function remove_operator($params){
		$maintenance = new Maintenance_request();
		$maintenance->where('id',$params['maintenance_request_id'])->get();
		$operator = new User();
		$operator->get_by_id($params['user_id']);
		$maintenance->delete($operator);
		return $maintenance->check_last_query();
	}

	function updatestatus($params){
		$obj = new Maintenance_request();
		$obj->where('id',$params['id'])->update('status',$params['status']);
		return $obj->check_last_query();
	}
}
