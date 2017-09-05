<?php
class Moduls extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('moduls/modul','user_preference','menus'));
	}
	function index(){
		$this->common->check_login();
		$moduls = new Modul();
		$header_data = array(
			'param_title'=>$this->user_preference->get_application_name(),
			'param_header'=>$this->user_preference->get_application_name(),
			'param_sub_header'=>'Modules'
		);
		$data = array('modules'=>$moduls->get_moduls(),'menus'=>$this->menus->get_menus());
		$footer_data = array('param_menu'=>$this->menus->get_bottom_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('moduls/index',$data);
		$this->load->view('common/footer',$footer_data);
	}
}