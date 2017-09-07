<?php
class Business_field extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_fields(){
		$ci = & get_instance();
		$sql = "select id,name from business_fields ";
		$sql.= "where active = '1' ";
		$sql.= "order by name asc ";
		$que = $ci->db->query($sql);
		return $que->result();
	}
	function get_fields_total(){
		$ci = & get_instance();
		$sql = "select count(id) total from business_fields ";
		$que = $ci->db->query($sql);
		$res = $que->result();
		return $res->total;
	}
	function get_combo_data($first_row = ''){
		$ci = & get_instance();
		$sql = "select id,name from business_fields ";
		$sql.= "where active = '1' ";
		$sql.= "order by createdate asc ";
		$que = $ci->db->query($sql);
		if($first_row!=''){
			$out[0] = $first_row;
		}
		foreach($que->result() as $res){
			$out[$res->name] = $res->name;
		}
		return $out;
	}
}
