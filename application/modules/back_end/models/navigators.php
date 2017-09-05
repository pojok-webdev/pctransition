<?php
class Navigators extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_bottom_menus(){
		$menus = anchor('back_end/logout','Log Out','class="button"');
		return $menus;
	}
}