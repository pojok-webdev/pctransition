<?php
class Clientservices extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function get(){
		$params = $this->input->post();
		$obj = new Clientservice();
		$obj->where('id',$params['id'])->get();
		echo '{"id":"'.$obj->id.'","name":"'.$obj->name.'"}';
	}
	function save(){
		$params = $this->input->post();
		$obj = new Clientservice();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function update(){
		$params = $this->input->post();
		$obj = new Clientservice();
		$obj->where('id',$params['id'])->update($params);
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Clientservice();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
	}
}
