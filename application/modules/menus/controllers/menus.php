<?php
class Menus extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function index(){
		$menus = new Menu();
		$sub_menus = new Menu();
		$data = array('menus'=>$menus,'submenus'=>$sub_menus);
		$this->load->view('index',$data);
	}
}