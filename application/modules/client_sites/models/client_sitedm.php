<?php
class Client_site extends DataMapper{
	var $has_one = array('survey_request','install_site','client','maintenance','branch','install_request','ticket');
	var $has_many = array(
		'fb',
		'fbpic',
		'altergrade',
		'branch',
		'clientservice',
		'maintenance_request',
		'site_antenna',
		'site_router',
		'site_device',
		'site_apwifi',
		'site_wireless_radio',
		'site_pccard',
		'site_pic',
		'troubleshoot_request',
		'site_switch',
		'trial',
		'clientsitesale',
		'survey_site'
	);
	function __construct(){
		parent::__construct();
	}

	function add($params){
		$obj = new Client_site();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	function get_client_sites($client_id){
		$objs = new Client_site();
		$objs->where('active','1')->where('client_id',$client_id)->order_by('create_date','asc')->get();
		return $objs;
	}
	function get_client_sites_by_survey_request($request_id){
		$objs = new Client_site();
		$objs->where('active','1')->where('survey_request_id',$request_id)->order_by('create_date','asc')->get();
		return $objs;
	}
	function get_client_sites_total($client_id){
		$objs = new Client_site();
		$objs->where('active','1')->where('client_id',$client_id)->get();
		return $objs->result_count();
	}
	function get_combo_data($client_id=null,$first_data=''){
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$objs = new Client_site();
		if(is_null($client_id)){
			$objs->where('active','1')->get();
		}else{
			$objs->where('client_id',$client_id)->where('active','1')->get();
		}
		foreach ($objs as $client){
			$out[$client->id] = $client->client->name . ' - ' . $client->address;
		}
		return $out;
	}
	function has_modified($id){
		$obj = new Client_site();
		$obj->where('id',$id)->get();
		if($obj->modified=='0'){
			return false;
		}
		return true;
	}
	function populate($client_id=null){
		if($client_id!=null){
			$obj = new Client_site();
			$obj->where('client_id',$client_id)->where_related_client('active','1')->get();
		}else{
			$obj = new Client_site();
			$obj->where_related_client('active','1')->get();
		}
		return $obj;
	}
	function populatebyid($id=null){
		if($id!=null){
			$obj = new Client_site();
			$obj->where('id',$id)->get();
		}else{
			$obj = new Client_site();
			$obj->get();
		}
		return $obj;
	}
	function get_obj_by_id($id){
		$obj = new Client_site();
		$obj->where('id',$id)->get();
		return $obj;
	}
	function get_combo_data_address($first_data=''){
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$clients = new Client_site();
		$clients->where('active','1')->get();
		foreach ($clients as $client){
			$out[$client->id] = $client->client->name . ', ' . $client->address;
		}
		return $out;
	}
}
