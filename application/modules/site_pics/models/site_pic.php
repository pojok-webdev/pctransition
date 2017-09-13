<?php
class Site_pic extends CI_Model{
	var $id;
	var $ci;
	var $has_one = array('client_site');
	function __construct($id = null){
		parent::__construct();
		$this->id = $id;
		$this->ci = & get_instance();
	}
}
