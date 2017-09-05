<?php
class Application extends CI_Model{
	public $ci;
	function __construct(){
		parent::__construct();
		$this->ci =  & get_instance();
	}
	function get_combo_data(){
		$sql = "select id,name from applications ";
		$que = $this->ci->db->query($sql);
		foreach($que->result() as $res){
			$out[$res->id] =$res->name;
		}
		return $out;
	}	
	function populate(){
		$sql = "select id,name from applications ";
		$que = $this->ci->db->query($sql);
		return $que->result();
	}	
}
