<?php
class Install_ap_wifis extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function index(){
	}

	function getjsonapwifi(){
		$id = $this->uri->segment(3);
		$obj = new Install_ap_wifi();
		$obj->where('id',$id)->get();
		echo '{"install_site_id":"'.$obj->install_site_id.'","tipe":"'.$obj->tipe.'","macboard":"'.$obj->macboard.'","ip_address":"'.$obj->ip_address.'","essid":"'.$obj->essid.'","security_key":"'.$obj->security_key.'","user":"'.$obj->user.'","password":"'.$obj->password.'","location":"'.$obj->location.'","owner":"'.$obj->owner.'","user_name":"'.$obj->user_name.'"}';
	}

	function update(){
		$params = $this->input->post();
		echo Install_ap_wifi::edit($params);
	}
	
	function remove(){
		$params = $this->input->post();
		echo Install_ap_wifi::remove_aw($params['id']);
	}
}
