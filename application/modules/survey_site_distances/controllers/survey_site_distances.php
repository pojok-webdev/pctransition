<?php
class Survey_site_distances extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function remove(){
		$params = $this->input->post();
		$obj = new Survey_site_distance();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
}
