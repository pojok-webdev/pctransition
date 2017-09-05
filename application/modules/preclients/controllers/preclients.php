<?php
class Preclients extends CI_Controller{
	var $data;
	var $ionuser;
	function __construct(){
		parent::__construct();
		$path = array('csspath'=>base_url() . 'css/aquarius','jspath'=>base_url() . 'js/aquearius','imagepath'=>base_url() . 'img/aquarius');
		$this->data = array(
			'csspath' => base_url() . 'css/aquarius/',
			'jspath' => base_url() . 'js/aquarius/',
			'imagepath' => base_url() . 'img/aquarius/',
			'path'=>$path,
		);
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
			$this->data['user'] = User::get_user_by_id($this->ionuser->id);
			$this->load->helper('user');
		}
	}

	function check_login(){
		if(!$this->ion_auth->logged_in()){
			redirect(base_url() . 'index.php/adm/login');
		}
	}

	function lookup(){
		$this->check_login();
		$arr = array();
		$users = getsubordinates($this->ionuser->id,$arr);
		switch($this->uri->segment(3)){
			case 'add-install-lookup':
				$this->data['objs'] = Client::populate('9','0',$users);
				$this->data['return_page']='adm/install_add/';
			break;
			default:
				$this->data['objs'] = Client::populate(array('1','9'),'0',$users);
			break;
		}
		$this->data['menuFeed'] = 'survey';
		$this->load->view('Sales/survey_lookup',$this->data);
	}
}
