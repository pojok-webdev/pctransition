<?php
class Altergrade extends DataMapper{
	var $has_one = array('client_site');
	var $has_many = array('alterexecutor');
	function __construct(){
		parent::__construct();
	}

	function add($params){
		$obj = new Altergrade();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}

	function edit($params){
		$obj = new Altergrade();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
	}

	function get_obj_by_id($id){
		$obj = new Altergrade();
		$obj->where('id',$id)->get();
		return $obj;
	}

	function populate(){
		$obj = new Altergrade();
		$obj->where('active','1')->get();
		return $obj;
	}

	function remove($params){
		$obj = new Altergrade();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
	}
}
