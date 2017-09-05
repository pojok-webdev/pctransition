<?php
class Install_switches extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function save(){
		$params = $this->input->post();
		$obj = new Install_switch();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Install_switch();
		$obj->where("id",$params["id"])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
}
