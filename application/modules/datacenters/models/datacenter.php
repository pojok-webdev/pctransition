<?php
class Datacenter extends CI_Model{
	var $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
	function getbyid($id){
		$sql = "select * from datacenters ";
		$sql.= "where id='".$id."'";
		$que = $this->ci->db->query($sql);
		return $que->result()[0];
	}	
	function get_combo_data($first_data=''){
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$sql = "select a.id,b.name,b.address from datacenters a ";
		$sql.= "where active='1' ";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		$out = array();
		foreach ($que->result() as $res){
			$out[$res->id] = $res->name;
		}
		return $out;
	}
}
