<?php
class Material extends DataMapper{
	var $has_one = array('materialtype');
	var $has_many = array();
	
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Material();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return mysql_insert_id();
	}
	
	function populate(){
		$obj = new Material();
		$obj->where('active','1')->order_by('name','asc')->get();
		return $obj;
	}
	/*
	function get_combo_data(){
		$objs = new Material();
		$objs->where('active','1')->get();
		$out = array();
		foreach($objs as $obj){
			$out[$obj->id] = $obj->name;
		}
		return $out;
	}
	*/
	function get_combo_data($devicetype = null){
		$objs = new Material();
		if($devicetype!=null){
			$objs->where('active','1')->where('materialtype_id',$devicetype)->order_by('name','asc')->get();
		}else{
			$objs->where('active','1')->order_by('name','asc')->get();
		}
		$out = array();
		foreach($objs as $obj){
			$out[$obj->id] = $obj->name;
		}
		return $out;
	}
	
	function get_name_by_parent($parent){
		$objs = new Material();
		$objs->where('materialtype_id',$parent)->get()->order_by('name','asc');
		$out = array();
		foreach ($objs as $obj){
			$out[$obj->name] = $obj->name;
		}
		return $out;
	}
	

	function remove($id){
		$obj = new Material();
		$obj->where('id',$id)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
}
