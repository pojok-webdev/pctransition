<?php
class Site_pics extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Site_Pic();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
	function save(){
		$params = $this->input->post();
		$obj = new Site_pic();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function getbyid(){
		$params = $this->input->post();
		$obj = new Site_pic();
		$obj->where('id',$params['id'])->get();
		echo '{"id":"'.$obj->id.'","client_id":"'.$obj->client_id.'","name":"'.$obj->name.'","phone_area":"'.$obj->phone_area.'","telp_hp":"'.$obj->telp_hp.'","position":"'.$obj->position.'","hp":"'.$obj->hp.'","hp2":"'.$obj->hp2.'","email":"'.$obj->email.'","address":"'.$obj->address.'","ktp":"'.$obj->ktp.'"}';
	}
	function update(){
		$params = $this->input->post();
		$obj = new Site_pic();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}}
