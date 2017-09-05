<?php
class Install_bas extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function add(){
		$params = $this->input->post();
		$obj = new Install_ba();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function update(){
		$params = $this->input->post();
		$obj = new Install_ba();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}
	function remove(){
		$params = $this->input->post();
		echo Install_ba::remove($params['id']);
	}	
}
