<?php
class Budget extends CI_Model{
	var $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
	function get_combo_data(){
		$sql = "select id,name from budgets ";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		if($first_row!=''){
			$out[0] = $first_row;
		}
		foreach($que->result() as $res){
			$out[$res->name] = $res->name;
		}
		return $out;
	}	
	function getId($name){
		$sql = "select id,name from business_fields ";
		$sql.= "where name = '".$name."' ";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res[0]->id;
	}
}
