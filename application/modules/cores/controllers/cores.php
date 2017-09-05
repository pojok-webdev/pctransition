<?php
class Cores extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('padi');
	}
	function index(){
		$objs = new Core();
		$objs->get();
		$data['btses'] = Btstower::get_combo_data();
		$data['branches'] = Branch::get_combo_data();
		$data["objs"] = $objs;
		$data["menuFeed"] = "cores";
		padi_checklogin();
		$this->load->view("adm/cores",$data);
	}
	function save(){
		$params = $this->input->post();
		$obj = new Core();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function update(){
		$params = $this->input->post();
		$obj = new Core();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}
	function remove(){
		$id = $this->uri->segment(3);
		$obj = new Core();
		$obj->where("id",$id)->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
	function get(){
		$id = $this->uri->segment(3);
		$obj = new Core();
		$obj->where("id",$id)->get();
		$arr = array();
		foreach($this->db->list_fields('cores') as $field){
			array_push($arr,'"'.$field.'"' . ':' . '"'.$obj->$field.'"');
		}
		echo "{".implode(",",$arr)."}";
	}
	function gets(){
		$objs = new Core();
		$objs->get();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr, '"' . $obj->id . '":"' . $obj->name . '"');
		}
		echo "{".implode(",",$arr)."}";
	}}
