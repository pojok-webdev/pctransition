<?php
class Pic extends DataMapper{
	var $has_one = array('client');
		function __construct(){
			parent::__construct();
		}
		function add($params){
			$obj = new Pic();
			foreach($params as $key=>$val){
				$obj->$key = $val;
			}
			$obj->save();
			return $this->db->insert_id();
		}		
		function get_by_client_id($client_id){
			$obj = new Pic();
			$obj->where('client_id',$client_id)->get();
			return $obj;
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
}
