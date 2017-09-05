<?php
class Clientsitesale extends CI_Model{
	//var $has_one = array("client_site");
	var $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
} 
