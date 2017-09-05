<?php
class User extends DataMapper{
	var $has_one = array('preference');
	function __construct(){
		parent::__construct();
	}
}