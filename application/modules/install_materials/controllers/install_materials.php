<?php
class Install_materials extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function delete(){
		$params = $this->input->post();
		$obj = new Install_material();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
	function add(){
		$params = $this->input->post();
		echo Install_material::add($params);
	}

}
