<?php
class Materialsurvey extends DataMapper{
	var $has_many = array("materialsurveydetail");
	function __construct(){
		parent::__construct();
	}
}
