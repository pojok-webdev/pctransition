<?php
class Navigators extends CI_Model{
	var $obj;
	function __construct(){
		parent::__construct();
		$this->obj = & get_instance();
	}
	function get_menus(){
		return anchor('back_office/logout','Log Out','class="button"');
	}
	function get_navigators(){
		return '<div class="navigators">' . anchor('hosting_packages/add','Add','class="button"') . '</div>';
	}
}