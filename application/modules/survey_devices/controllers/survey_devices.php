<?php
class Survey_devices extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function jsonbyid(){
		$id = $this->uri->segment(3);
		$obj = new Survey_device();
		$obj->where("id",$id)->get();
		$arr = array();
		foreach($this->db->list_fields("survey_devices") as $field){
			array_push($arr,'"'.$field.'":"'.$obj->$field.'"');
		}
		array_push($arr,'"devicetype_id":"'.$obj->device->devicetype_id.'"');
		echo '{'.implode(',',$arr).'}';
	}
	function save(){
		$params = $this->input->post();
		$obj = new Survey_device();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Survey_device();
		$obj->where("id",$params["id"])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
	function update(){
		$params = $this->input->post();
		$obj = new Survey_device();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}
}
