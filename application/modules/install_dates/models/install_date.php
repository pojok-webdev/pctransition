<?php
class Install_date extends DataMapper{
	function _construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Install_date();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return mysql_insert_id();
	}
}
