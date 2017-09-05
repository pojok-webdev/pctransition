<?php
class Survey_resume extends DataMapper{
	var $has_one = array('survey_site');
	function __construct(){
		parent::__construct();
	}
}
