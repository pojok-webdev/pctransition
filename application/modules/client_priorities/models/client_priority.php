<?php
class Client_priority extends CI_Model{
	var $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
	function client_exist($client_id){
		$sql = "select count(id) total from client_priorities ";
		$sql.= "where client_id='".$client_id."'";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		if($res[0]->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function add($params){
		$keys = array();
		$vals = array();
		$sql = "";
		foreach($params as $key => $val ){
			array_push($keys,$key);
			array_push($vals,$val);
		}
		$keystring = "('" . implode("','",$keys) . "')";
		$valstring = "('" . implode("','",$vals) . "')";
		$sql = "insert into client_priorities ";
		$sql.= " " . $keystring . " " ;
		$sql.= " values " ;
		$sql.= " " . $valstring . " " ;
		$que = $this->ci->db->query($sql);
		return $this->ci->db->insert_id();
	}	
	function drop($params){
		$sql = "delete from client_priorities ";
		$sql.= "where client_id='".$params["client_id"]."'";
		$que = $this->ci->db->query($sql);
	}
}
