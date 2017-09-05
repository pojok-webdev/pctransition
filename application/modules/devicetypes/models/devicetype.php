<?php
class Devicetype extends DataMapper{
	var $has_many = array('device');
	function __construct(){
		parent::__construct();
	}
	function add($params){
		$obj = new Devicetype();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	function get_combo_data($active='1',$ids=null){
		$out = array();
		$objs = new Devicetype();
		if(!empty($active)){
			if($ids==null){
				$objs->where('active',$active)->get();
			}else{
				$objs->where('active',$active)->where_in('id',$ids)->get();
			}
		}else{
			$objs->get();
		}
		foreach($objs as $obj){
			$out[$obj->id] = $obj->name;
		}
		return $out;
	}
	function populate($active='1'){
		$obj = new Devicetype();
		if(!empty($active)){
			$obj->where('active',$active)->get();
		}else{
			$obj->get();
		}
		return $obj;
	}
}
