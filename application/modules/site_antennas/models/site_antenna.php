<?php
class Site_antenna extends DataMapper{
	var $has_one = array("client_site");
	function __construct(){
		parent::__construct();
	}
}
