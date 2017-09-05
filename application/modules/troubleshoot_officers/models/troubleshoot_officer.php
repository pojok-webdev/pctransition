<?php
class Troubleshoot_officer extends DataMapper{
	var $has_one = array('troubleshoot_request');
	function __construct(){
		parent::__construct();
	}
}
