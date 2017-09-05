<?php
class Main extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function index(){
		echo "PadiNET";
		if(isset($this->session->userdata["role"])){
			switch($this->session->userdata["role"]){
				case "Administrator":
				redirect(base_url() . 'users');
				break;
				case "Sales":
				redirect(base_url() . 'clients');
				break;
				case "TS":
				redirect(base_url() . 'tickets');
				break;
				case "Accounting":
				redirect(base_url() . 'disconnections');
				break;
				case "CRO":
				redirect(base_url() . 'tickets');
				break;
			}
		}else{
			redirect(base_url() . "adm/chooseRole");
		}
	}
}
