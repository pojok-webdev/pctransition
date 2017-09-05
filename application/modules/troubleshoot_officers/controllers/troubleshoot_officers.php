<?php
class Troubleshoot_officers extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('padi');
	}
	function removesession(){
		$this->session->unset_userdata('officers');
	}
	function save(){
		$params = $this->input->post();
		$obj = new Troubleshoot_officer();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function savetosession(){
		$params = $this->input->post();
		$officers = $this->session->userdata('officers');
		if(!$officers){
			$officers = array();
		}else{
			$officers = $this->session->userdata('officers');
		}
		array_push($officers,array('id'=>$params['id'],'name'=>$params['name'],));
		$this->session->set_userdata(array('officers'=>$officers));
	}
	function savetodatabase(){
		$params = $this->input->post();
		$officers = $this->session->userdata('officers');
		foreach($officers as $officer){
			$obj = new Troubleshoot_officer();
			$obj->name = $officer['name'];
			$obj->troubleshoot_request_id = $params['troubleshoot_id'];
			$obj->save();
		}
		$this->session->unset_userdata('officers');
	}
	function index(){
		$obj = new Troubleshoot_officer();
		$obj->get();
	}
	function get(){
		$officers = $this->session->userdata('officers');
		$officer_arr = json_encode($officers);
		echo '{"officers":'.$officer_arr.'}';
	}
	function remove(){
		$params = $this->input->post();
		$officers = $this->session->userdata('officers');
		$toremove = array('id'=>$params['name'],'name'=>$params['name']);
		$index = array_search($toremove,$officers);
		array_splice($officers,$index,1);
		echo $index;
		$this->session->set_userdata(array('officers'=>$officers));
	}
	function rmv(){
		$params = $this->input->post();
		$obj = new Troubleshoot_officer();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
	}
}
