<?php class Ticket_followup extends DataMapper{
	var $has_one = array('ticket');
	function __construct(){
		parent::__construct();
	}
	
	function populate($id){
		$obj = new Ticket_followup();
		$obj->where('ticket_id',$id)->get();
		return $obj;
	}
}
