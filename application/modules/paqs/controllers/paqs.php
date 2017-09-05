<?php
class Paqs extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function add(){
		$data = array("menuFeed"=>"paqs");
		$this->load->view("adm/paqs/add",$data);
	}
	function edit(){
		$obj = new Paq();
		$obj->where("id",$this->uri->segment(3))->get();
		$data = array(
		"menuFeed"=>"paqs",
		"obj"=>$obj
		);
		$this->load->view("adm/paqs/edit",$data);
	}
	function index(){
		$objs = new Paq();
		$objs->get();
		$data = array(
		"menuFeed"=>"paqs",
		"objs"=>$objs
		);
		$this->load->view("adm/paqs/index",$data);
	}
	function explanation(){
		$objs = new Paq();
		$objs->where("id",$this->uri->segment(3))->get();
		$data = array(
		"menuFeed"=>"paqs",
		"objs"=>$objs
		);
		$this->load->view("adm/paqs/explanation",$data);
	}
	function save(){
		$params = $this->input->post();
		$obj = new Paq();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function update(){
		$params = $this->input->post();
		$obj = new Paq();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}
}
