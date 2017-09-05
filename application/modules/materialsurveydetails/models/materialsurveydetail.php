<?php
class Materialsurveydetail extends DataMapper{
	var $has_one = array("materialsurvey");
	function __construct(){
		parent::__construct();
	}
}
