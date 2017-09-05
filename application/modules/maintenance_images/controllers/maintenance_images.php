<?php
class Maintenance_images extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function delete(){
		$params = $this->input->post();
		$obj = new Maintenance_image();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		echo $this->db->insert_id();
	}
}
