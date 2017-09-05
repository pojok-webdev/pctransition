<?php
class Surveypackages extends CI_Controller{
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
	function getjsonbyid(){
		$params = $this->input->post();
		$objs = new Surveypackage();
		$objs->where('id',$params["id"])->get();
		$arr = array();
		foreach($this->db->list_fields("surveypackages") as $field){
			array_push($arr,'"'.$field.'":"'.$objs->$field.'"');
		}
		echo '{'.implode(",",$arr).'}';
	}
	function index(){
		$this->check_login();
		$data = array(
			'menuFeed'=>'surveypackage',
			'objs'=>Surveypackage::populate(),
			'materialtypes'=>Materialtype::get_combo_data()
		);
		$this->load->view('Warehouse/surveypackages',$data);
	}
	function save(){
		$params = $this->input->post();
		$obj = new Surveypackage();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function update(){
		$params = $this->input->post();
		$obj = new Surveypackage();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}
}
