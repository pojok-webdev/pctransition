<?php
class App_log extends CI_Model{
	var $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
	function create_log($description){
		$sql = "insert into app_logs ";
		$sql.= " (user,description,ipaddr) " ;
		$sql.= " values " ;
		$sql.= " (";
		$sql.= "'".$this->ci->session->userdata("username")."',";
		$sql.= "'".$description."',";
		$sql.= "'".$_SERVER["REMOTE_ADDR"]."'";
		$sql.= ") " ;
		$this->ci->db->query($sql);
		return $this->ci->db->insert_id();
	}	
	function get_lastvisit($username){
		$ci = & get_instance();
		$sql = "select * from app_logs ";
		$sql.= "where user='".$username."' ";
		$sql.= "order by createdate desc ";
		$sql.= "limit 1,1 ";
		$que = $ci->db->query($sql);
		$res = $que->result();
		return $res[0]->createdate;
	}
}
