<?php
class Materialtypes extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function getJson(){
		$params = $this->input->post();
		$obj = new Materialtype();
		$obj->where("id",$params["id"])->get();
		echo '{"name":"'.$obj->name.'","description":"'.$obj->description.'"}';
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Materialtype();
		$obj->where("id",$params["id"])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
	function update(){
		$params = $this->input->post();
		$obj = new Materialtype();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}
}
