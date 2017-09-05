<?php
class Install_sites extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function add_officer(){
		$params = $this->input->post();
		echo Install_installer::add($params['officer_name'],$params['site_id']);
	}
	function delete_officer(){
		$params = $this->input->post();
		echo Install_installer::remove($params['officer_name'],$params['site_id']);
	}
	function add_pccard(){
		$params = $this->input->post();
		echo Install_pccard::add($params);
	}
	function delete_pccard(){
		$params = $this->input->post();
		echo Install_pccard::remove($params);
	}
	function add_antenna(){
		$params = $this->input->post();
		echo Install_antenna::add($params);
	}
	function delete_antenna(){
		$params = $this->input->post();
		echo Install_antenna::remove($params);
	}
	function save(){
		$params = $this->input->post();
		$obj = new Install_site();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	function update(){ 
		$params = $this->input->post();
		echo Install_site::update_site($params);
	}
}
