<?php
class Ticket_followups extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function add(){
		$params = $this->input->post();
		$obj = new Ticket_followup();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
}
