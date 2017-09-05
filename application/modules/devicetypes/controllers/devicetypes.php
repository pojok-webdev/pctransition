<?php
class Devicetypes extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function get_by_id(){
		$params = $this->input->post();
		$obj = new Devicetype();
		$obj->where('id',$params['id'])->get();
		echo '{"id":"'.$obj->id.'","name":"'.$obj->name.'","description":"'.$obj->description.'"}';
	}
	function update(){
		$params = $this->input->post();
		$obj = new Devicetype();
		$obj->where('id',$params['id'])->update($params);
		echo $obj->check_last_query();
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Devicetype();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
	function save(){
		$params = $this->input->post();
		$obj = new Devicetype();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
}
