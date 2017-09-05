<?php
class Survey_device extends DataMapper{
	var $has_one = array('survey_site','device');
	function __construct(){
		parent::__construct();
	}
	
	function get_device_by_site($site_id){
		$devices = new Survey_device();
		$devices->where('survey_site_id',$site_id)->get();
		$out = array();
		foreach ($devices as $device){
			$out[$device->name] = $device->amount;
		}
		return $out;
		
	}

	
	function device_is_exist($survey_id){
		$device = new Survey_device();
		$device->where('survey_site_id',$survey_id)->get();
		return $device->result_count();
	}

	
	function add($params){
		$obj = new Survey_device();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
		//return mysql_insert_id();
	}
}
