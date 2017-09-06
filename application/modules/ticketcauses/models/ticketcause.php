<?php
class Ticketcause extends CI_Model{
	var $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
	function get_combo_data($firstrow = ''){
		$out = array();
		if($firstrow!=''){
			$out[0] = $firstrow;
		}
		$sql = "select id,name from ticketcauses ";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		$out = array();
		foreach ($que->result() as $res){
			$out[$res->id] = $res->name;
		}
		return $out;
	}
	function get_combo_data2($firstrow = ''){
		$out = array();
		if($firstrow!=''){
			$out[0] = $firstrow;
		}
		$sql = "select id,name from ticketcauses ";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		$out = array();
		foreach ($que->result() as $res){
			$out[$res->name] = $res->name;
		}
		return $out;
	}
}
