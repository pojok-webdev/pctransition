<?php
class Trialofficers extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function add(){
		$params = $this->input->post();
		$obj = new Trialofficer();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function getcommaseparatedbytrial(){
		$objs = new Trialofficer();
		$objs->where('trial_id',$this->uri->segment(3))->get();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr,$obj->username);
		}
		echo implode(",",$arr);
	}
	function getbytrial(){
		$objs = new Trialofficer();
		$objs->where('trial_id',$this->uri->segment(3))->get();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr,'{"name":"' . $obj->username . '"}');
		}
		echo '['.implode(",",$arr).']';
	}
	function remove($username,$trial_id){
		$params = $this->input->post();
		$obj = new Trialofficer();
		$obj->where("trial_id",$trial_id)->where("username",$username)->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
}
