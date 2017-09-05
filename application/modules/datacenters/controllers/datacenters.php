<?php
class Datacenters extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('datacenter');
	}
	function check_login(){
		if (!$this->ion_auth->logged_in()){
			redirect(base_url() . 'adm/login');
		}
	}
	function get(){
		$arr = array();
		foreach(Datacenter::get_combo_data() as $key=>$val){
			array_push($arr, '"' . $key . '":"' . $val . '"');
		}
		$out = implode(',',$arr);
		$out = '{' . $out . '}';
		echo $out;
	}
	function getJSON(){
		$id = $this->uri->segment(3);
		$datacenter = Datacenter::getbyid($id);
		echo '{"branch_id":"'.$datacenter->branch_id.'","name":"'.$datacenter->name.'","location":"'.$datacenter->location.'","description":"'.$datacenter->description.'"}';
	}	
	function index(){
		$this->check_login();
		$this->data['objs'] = getdatacenters();
		$this->data['branches'] = Branch::get_combo_data();
		$this->data['menuFeed'] = 'datacenter';
		$this->load->view('adm/datacenters', $this->data);
	}
	function save(){
		$params = $this->input->post();
		$obj = new Datacenter();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Datacenter();
		$obj->where("id",$params["id"])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
	function update(){
		$params = $this->input->post();
		$obj = new Datacenter();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}
}
