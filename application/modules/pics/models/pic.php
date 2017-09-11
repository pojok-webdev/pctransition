<?php
class Pic extends CI_Model{
	var $has_one = array('client');
	function __construct(){
		parent::__construct();
	}
	function add($params){
		$ci = & get_instance();
		foreach($params as $key=>$val){
			array_push($keys,$key);
			array_push($vals,$val);
		}
		$sql = "insert into pics ";
		$sql.= "(".implode(",",$keys).") ";
		$sql.= "values ";
		$sql.= "('".implode("','",$vals)."') ";
		$que = $ci->db->query($sql);
		return $ci->db->insert_id();
	}		
	function get_by_client_id($client_id){
		$sql = "select * from pics ";
		$sql.= "where client_id=".$client_id." ";
		$ci = & get_instance();
		$que = $ci->db->query($sql);
		return $que->result();
	}
	function getpic($role){
		if($this->client_id){
			$sql = 'select name from pics where client_id='.$this->client_id.' and prole="'.$role.'"';
			$query = $this->db->query($sql);
			$obj = $query->result();
			if ($query->num_rows() > 0){
				return $obj[0]->name;
			}
			return '';
		}
		return '';
	}
	function getmail($role){
		if($this->client_id){
			$sql = 'select email from pics where client_id='.$this->client_id.' and prole="'.$role.'"';
			$query = $this->db->query($sql);
			$obj = $query->result();
			if ($query->num_rows() > 0){
				return $obj[0]->email;
			}
			return '';
		}
		return '';
	}
	function getphone($role){
		if($this->client_id){
			$sql = 'select telp_hp from pics where client_id='.$this->client_id.' and prole="'.$role.'"';
			$query = $this->db->query($sql);
			$obj = $query->result();
			if ($query->num_rows() > 0){
				return $obj[0]->telp_hp;
			}
			return '';
		}
		return '';
	}
	function save($params){
		$keys = array();$vals = array();
		foreach($params as $key=>$val){
			array_push($keys,$key);
			array_push($vals,$val);
		}
		$ci = & get_instance();
		$sql = "insert into pics (".implode(",",$keys).") ";
		$sql.= "values ('".implode("','",$vals)."') ";
		$que = $ci->db->query($sql);
		return $ci->db->insert_id();
	}
	function remove($params){
		$ci = & get_instance();
		$sql = "delete from pics where id=".$params["id"];
		$ci->db->query($sql);
		echo $sql;
	}
}
