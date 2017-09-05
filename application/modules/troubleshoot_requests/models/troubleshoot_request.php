<?php
class Troubleshoot_request extends DataMapper{
	var $has_one = array('client_site','service','ticket');
	var $has_many = array(
		'troubleshootsite',
		'troubleshoot_router',
		'troubleshoot_apwifi',
		'troubleshoot_implementer',
		'troubleshoot_material',
		'troubleshoot_pccard',
		'troubleshoot_device',
		'troubleshoot_switch',
		'troubleshoot_officer',
		'troubleshoot_image',
		'troubleshoot_ba',
		);
	function __construct(){
		parent::__construct();
	}
	function add($params){
		$obj = new Troubleshoot_request();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	function edit($params){
		$obj = new Troubleshoot_request();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query(); 
	}	

	function populate(){
		$obj = new Troubleshoot_request();
		$obj->get();
		return $obj;
	}
	function getclients(){
		$ci = & get_instance();
		$sql = "select a.id,a.ticket_id,b.kdticket,b.clientname from troubleshoot_requests a ";
		$sql.= "left outer join tickets b on b.id=a.ticket_id ";
		$que = $ci->db->query($sql);
		return $que->result();
	}
	function gethumandate($dt){
		if(date("Y",strtotime($this->$dt))<2000){
			return "-";
		}
		return date ("d/m/Y",strtotime($this->$dt));
	}
}
