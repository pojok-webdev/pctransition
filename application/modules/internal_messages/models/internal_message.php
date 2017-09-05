<?php
class Internal_message extends DataMapper{
	function __construct(){
		parent::__construct();
	}

	function get_date($id){
		$message = new Internal_message();
		$message->where('id',$id)->get();
		return $message->proposed_date1 . ' - ' . $message->proposed_date2;
	}
	
	function get_client_name($obj_id,$obj_type){
		switch ($obj_type){
		case 'survey_request':
			$table = 'survey_requests';
			break;
		case 'install_request':
			$table = 'install_requests';
			break;
		}
		$query = 'select b.name from ' . $table . ' a ';
		$query.= ' left outer join clients b on b.id=a.client_id';
		$query.= ' where a.id=' . $obj_id;
		$result = $this->db->query($query);
		$row = $result->result();
		return $row[0]->name;
	}
	
	function set_array_has_read($ids,$has_read='0'){
		$query = 'update internal_messages set hasread="' . $has_read . '" ';
		$query.= ' where id in (' . $ids . ')';
		echo $query;
		$result = $this->db->query($query);
	}
	
	function get_messages($has_read = '0'){
		$messages = new Internal_message();
		$messages->where('recipient',$this->session->userdata['id'])->or_where('recipient_group',User::get_group_id($this->session->userdata['id']))->where('hasread',$has_read)->get();
//		echo $messages->check_last_query();
		return $messages;
	}
}
