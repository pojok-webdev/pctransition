<?php
class Install_switch extends DataMapper{
	var $has_one = array("install_site");
	function __construct(){
		parent::__construct();
	}
}
