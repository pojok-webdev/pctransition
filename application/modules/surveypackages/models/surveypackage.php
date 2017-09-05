<?php
class Surveypackage extends DataMapper{
	var $has_many = array("surveypackagedetail");
	function __construct(){
		parent::__construct();
	}
	function populate(){
		$objs = new Surveypackage();
		return $objs->get();
	}
}
