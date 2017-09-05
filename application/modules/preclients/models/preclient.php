<?php
class Preclient extends DataMapper{
	var $has_many = array('prepic');
	function __construct(){
		parent::__construct();
	}
	
	function populate(){
		$obj = new Preclient();
		$obj->get();
		return $obj;
	}

	function get_obj_by_id($id){
		$obj = new Preclient();
		$obj->where('id',$id)->get($id);
		return $obj;
	}
}
