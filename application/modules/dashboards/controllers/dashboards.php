<?php
class Dashboards extends CI_Controller{
	var $data = array();
	var $ionuser;
	function __construct(){
		parent::__construct();
	}
	function index(){
		$path = array(
		'csspath'=>base_url() . 'css/aquarius',
		'jspath'=>base_url() . 'js/aquearius',
		'imagepath'=>base_url() . 'img/aquarius');
		$this->data = array(
			'csspath' => base_url() . 'css/aquarius/',
			'jspath' => base_url() . 'js/aquarius/',
			'imagepath' => base_url() . 'img/aquarius/',
			'path'=>$path,
			'menuFeed'=>'dashboard',
		);
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
			$this->data['user'] = User::get_user_by_id($this->ionuser->id);
		}
		$this->load->view('adm/dashboards',$this->data);
	}
	function settings(){
                                echo "This is settings";
	}
}
