<?php
class Surveypackagedetail extends DataMapper{
	var $has_one = array("surveypackage","device");
	function __construct(){
		parent::__construct();
	}
	function populate($surveypackage_id){
		$obj = new Surveypackagedetail();
		$obj->where('surveypackage_id',$surveypackage_id)->get();
		return $obj;
	}
}
