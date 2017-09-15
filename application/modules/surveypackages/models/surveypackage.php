<?php
class Surveypackage extends CI_Model{
	var $has_many = array("surveypackagedetail");
	function __construct(){
		parent::__construct();
	}
	function populate(){
		$ci = & get_instance();
		$sql = "select * from surveypackages ";
		$que = $ci->db->query($sql);
		return $que->result();
	}
}
