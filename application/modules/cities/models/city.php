<?php
class City extends CI_Model{
	var $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
	function get_cities(){
		$sql = "select id,name from cities ";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		$out = array();
		foreach($que->result() as $res){
			$out[$res->name] = $res->name;
		}
		return $out;
	}
	function get_json_cities(){
		$sql = "select id,name from cities ";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		$myarray = array();
		foreach ($$que->result() as $city){
			array_push($myarray, $city->name);
		}
		$commasparated = '"' . implode('","',$myarray) . '"';
		$out = '{"cities":[' . $commasparated . ']}';
		return $out;
	}
	function get_combo_data(){
		$sql = "select id,name from cities ";
		$sql.= "where active='1' ";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		$out = array();
		foreach ($que->result() as $city){
			$out[$city->id] = $city->name;
		}
		return $out;
	}
}