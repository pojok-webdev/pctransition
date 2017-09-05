<?php
class Troublesite extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Troublesite();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return mysql_insert_id();
	}
} 
