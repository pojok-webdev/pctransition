<?php
class Maintenance_operators extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Maintenance_operator();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
	function save(){
		$params = $this->input->post();
		$obj = new Maintenance_operator();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
}
