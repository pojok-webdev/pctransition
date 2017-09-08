<?php
class Usage_period extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_combo_data($first_row=""){
		$ci = & get_instance();
		$sql = "select id,name from usage_periods ";
		$sql.= "order by createdate asc ";
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
		$sql = "select * from usage_periods ";
		$sql.= "where name='".$name."' ";
		$que = $ci->db->query($sql);
		$res = $que->result();
		return $res[0]->id;
	}
}
