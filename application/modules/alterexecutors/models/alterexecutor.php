<?php
class Alterexecutor extends CI_Model{
//	var $has_one = array('altergrade');
	public $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
	function get_names_by_altergrade_id($altergrade_id){
		$sql = "select name from alterexecutors ";
		$sql.= "where altergrade_id = '" . $altergrade_id . "'";
		$que = $this->ci->db->query($sql);
		foreach($que->result() as $res){
			array_push($arr,$res->name);
		}
		return implode(",",$arr);
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
		$sql = "insert into alterexecutors ";
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
		$sql = "update alterexecutors set ".$str." ";
		$sql.= "where id='".$params["id"]."'";
		$this->ci->query($sql);
		return 'ok';
	}
	function remove($params){
		$sql = "delete from alterexecutors ";
		$sql.= "where id='".$params["id"]."'";
		$this->ci->query($sql);
		return $sql;
	}
}
