<?php
class Problem extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_combo_data($first_row=""){
		$ci = & get_instance();
		$sql = "select id,name from problems ";
		$sql.= "order by create_date asc ";
		$que = $ci->db->query($sql);
		if($first_row!=''){
			$out[0] = $first_row;
		}
		foreach($que->result() as $res){
			$out[$res->id] = $res->name;
		}
		return $out;
	}	
	function getIndex($name){
		$ci = & get_instance();
		$sql = "select * from problems ";
		$sql.= "where name='".$name."' ";
		$que = $ci->db->query($sql);
		$res = $que->result();
		return $res[0]->id;
	}
	function populate(){
		$ci = & get_instance();
		$sql = "select * from problems ";
		$que = $ci->db->query($sql);
		$res = $que->result();
		return $res;
	}
	
}
