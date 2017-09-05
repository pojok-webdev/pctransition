<?php
class Device extends DataMapper{
	var $has_one = array('devicetype');
	var $has_many = array('survey_device','surveypackagedetail');
	function __construct(){
		parent::__construct();
	}
	function add($params){
		$obj = new Device();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return mysql_insert_id();
	}
	function edit($params){
		$obj = new Device();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
	}
	function populate(){
		$obj = new Device();
		$obj->where('active','1')->get();
		return $obj;
	}
	function get_combo_data($devicetype = null){
		$objs = new Device();
		if($devicetype!=null){
			$objs->where('active','1')->where_in('devicetype_id',$devicetype)->order_by('name','asc')->get();
		}else{
			$objs->where('active','1')->order_by('name','asc')->get();
		}
		$out = array();
		foreach($objs as $obj){
			$out[$obj->id] = $obj->name;
		}
		return $out;
	}
	function remove($id){
		$obj = new Device();
		$obj->where('id',$id)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
	function get_combo_data_device($deviceid,$first_data=''){
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$devices = new Device();
		$devices->where('active','1')->where('devicetype_id',$deviceid)->get();
		foreach ($devices as $device){
			$out[$device->id] = $device->name;
		}
		return $out;
	}
}
