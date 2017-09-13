<?php
class Group extends CI_Model{
	var $has_many = array('user','group_preference');
	var $ci;
	var $id;
	function __construct($id = NULL){
		parent::__construct();
		$this->ci = & get_instance();
		$this->id = $id;
	}
	function get_groups(){
		$sql = "select * from groups ";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		$out = array();
		foreach ($res as $group){
			$out[$group->id] = $group->name;
		}
		return $out;
	}
	function get_group_name($id){
		$sql = "select * from groups ";
		$sql.= "where id=".$this->id;
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res[0]->name;
	}
	function populate(){
		$sql = "select * from groups ";
		$sql.= "where id=".$this->id;
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res;
	}
}
