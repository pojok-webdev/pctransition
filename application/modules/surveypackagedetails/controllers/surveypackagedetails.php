<?php
class Surveypackagedetails extends CI_Controller{
	var $ionuser;
	function __construct(){
		parent::__construct();
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
			$this->data['user'] = User::get_user_by_id($this->ionuser->id);
		}
	}
	function check_login(){
		if(!$this->ion_auth->logged_in()){
			redirect(base_url() . 'index.php/adm/login');
		}
	}
	function index(){
		$this->check_login();
		$surveypackage_id = $this->uri->segment(3); 
		$data = array(
			'menuFeed'=>'master',
			'objs'=>Surveypackagedetail::populate($surveypackage_id),
			'materialtypes'=>Devicetype::get_combo_data()
		);
		$this->load->view('Warehouse/surveypackagedetails',$data);		
	}
	function devices(){
		$this->check_login();
		$device_id = $this->uri->segment(3);
		$arr = array();
		foreach(Device::get_combo_data($device_id) as $key=>$val){
			array_push($arr, '"' . $key . '":"' . $val . '"');
		}
		$out = implode(',',$arr);
		$out = '{' . $out . '}';
		echo $out;		
	}
	function jsonbyid(){
		$id = $this->uri->segment(3);
		$obj = new Surveypackagedetail();
		$obj->where('id',$id)->get();		
		echo '{"surveypackage_id":"'.$obj->surveypackage_id.'","device_id":"'.$obj->device_id.'","devicetype_id":"'.$obj->device->devicetype_id.'","amount":"'.$obj->amount.'"}';
	}
	function jsonbypackageid(){
		$id = $this->uri->segment(3);
		$objs = new Surveypackagedetail();
		$objs->where('surveypackage_id',$id)->get();		
		$arr = array();
		foreach($objs as $obj){
			array_push($arr, '{"surveypackage_id":"'.$obj->surveypackage_id.'","device_id":"'.$obj->device_id.'","device_name":"'.$obj->device->name.'","devicetype_id":"'.$obj->device->devicetype_id.'","type":"'.$obj->device->devicetype->name.'","amount":"'.$obj->amount.'"}');
		}
		echo '['.implode(",",$arr).']';
	}
	function save(){
		$params = $this->input->post();
		$obj = new Surveypackagedetail();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function update(){
		$params = $this->input->post();
		$obj = new Surveypackagedetail();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}
}
