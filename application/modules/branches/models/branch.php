<?php
class Branch extends CI_Model{
	/*var $has_many = array(
	'user',
	'branch_preference',
	'client_site',
	'backbone','survey_site');
	*/
	public $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
	function get_branches(){
		$sql = "select id,name from branches ";
		$que = $this->ci->db->query($sql);
		$out = array();
		foreach($que->result() as $res){
			$out[$res->id] = $res->name;
		}
		return $out;
	}
	function get_user_branches($id){
		$sql = "select c.id,c.name from users a ";
		$sql.= "left outer join branches_users b on b.user_id=a.id ";
		$sql.= "left outer join branches c on c.id=b.branch_id ";
		$sql.= "where a.id='".$id."'";
		$que = $this->ci->db->query($sql);
		$out = array();
		foreach($que->result() as $res){
			$out[$res->id] = $out->name;
		}
		return $out;
	}
	function get_combo_data(){
		$sql = "select id,name from branches ";
		$que = $this->ci->db->query($sql);
		$out = array();
		foreach($que->result() as $res){
			$out[$res->id] = $res->name;
		}
		return $out;
	}
	function populate(){
		$sql = "select id,name from branches ";
		$que = $this->ci->db->query($sql);
		return $que->result();
	}
}
