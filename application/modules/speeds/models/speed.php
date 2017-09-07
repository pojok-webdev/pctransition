<?php
class Speed extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_combo_data($firstdata=""){
		$ci = & get_instance();
		$sql = "select * from speeds ";
		$que = $ci->db->query($sql);
		$out = array();
		if(!is_null($firstdata)){
			$out[0] = $firstdata;
		}
		foreach($que->result() as $obj){
			$out[$obj->id] = $obj->name;
		}
		return $out;
	}		
	function getIndex($name){
		$ci = & get_instance();
		$sql = "select id from speeds ";
		$sql.= "where name='".$name."' ";
		$que = $ci->db->query($sql);
		$res = $que->result();
		return $res[0]->id;
	}
}
