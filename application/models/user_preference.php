<?php
class User_preference extends CI_Model{
	var $obj;
	var $preference;
	function __construct(){
		parent::__construct();
		$this->obj = & get_instance();
		$this->obj->load->model('preference');
		$this->common->check_login();
		$this->preference = new Preference();
		$this->preference->where('id',$this->obj->session->userdata['id'])->get();
	}
	function get_application_name(){
		return $this->preference->application_name;	
	}
}