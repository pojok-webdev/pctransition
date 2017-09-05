<?php
class Troubleshootdevice extends DataMapper{
	var $has_one = array('troubleshootsite','device');
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Troubleshootdevice();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return mysql_insert_id();
	}
}
