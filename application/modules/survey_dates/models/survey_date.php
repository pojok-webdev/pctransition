<?php
class Survey_date extends DataMapper{
	var $has_one = array('survey_requests');
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Survey_date();
		foreach($params as $key => $val ){
			$obj->$key = $val;
		}
		$obj->save();
		return mysql_insert_id();
	}
}
