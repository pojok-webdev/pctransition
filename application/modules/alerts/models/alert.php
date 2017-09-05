<?php
class Alert extends CI_Model{
	public $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
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
		$sql = "insert into alerts ";
		$sql.= " " . $keystring . " " ;
		$sql.= " values " ;
		$sql.= " " . $valstring . " " ;
		return $this->ci->db->insert_id();
	}
	function populate($user){
		$sql = "select id,url,name,description,targetuser,status,createdate from alerts ";
		$sql.= "where status='1' and targetuser='".$user."' ";
		$que = $this->ci->query($sql);
		return $que->result();
	}
	function deactivealert($params){
		$sql = "update alerts set status='0' ";
		$sql.= "where id='".$params["id"]."'";
		$this->ci->query($sql);
		return 'ok';
	}
}
