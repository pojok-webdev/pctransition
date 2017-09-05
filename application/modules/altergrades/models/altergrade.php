<?php
class Altergrade extends CI_Model{
//	var $has_one = array('client_site');
//	var $has_many = array('alterexecutor');
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
		$sql = "insert into altergrades ";
		$sql.= " " . $keystring . " " ;
		$sql.= " values " ;
		$sql.= " " . $valstring . " " ;
		return $this->ci->db->insert_id();
	}
	function edit($params){
		$arr = array();
		foreach($params as $key=>$val){
			array_push($arr,"'".$key."'='".$val."'");
		}
		$str = implode(",",$arr);
		$sql = "update altergrades set ".$str." ";
		$sql.= "where id='".$params["id"]."'";
		$this->ci->query($sql);
		return 'ok';
	}
	function get_obj_by_id($id){
		$sql = "select * from altergrades ";
		$sql.= "where id='".$params["id"]."'";
		$que = $this->ci->db->query($sql);
		return $que->result()[0];
	}
	function populate(){
		$sql = "select * from altergrades ";
		$sql.= "where active='1'";
		$que = $this->ci->db->query($sql);
		return $que->result();
	}
	function remove($params){
		$sql = "delete from altergrades ";
		$sql.= "where id='".$params["id"]."'";
		$this->ci->query($sql);
	}
}
