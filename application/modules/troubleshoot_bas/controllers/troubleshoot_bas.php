<?php
class Troubleshoot_bas extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function add(){
		$params = $this->input->post();
		$obj = new Troubleshoot_ba();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function remove(){
		$params = $this->input->post();
		echo Troubleshoot_ba::remove($params['id']);
	}	
	function update(){
		$params = $this->input->post();
		$obj = new Troubleshoot_ba();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}}
