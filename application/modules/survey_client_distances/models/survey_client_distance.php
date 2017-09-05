<?php
class Survey_client_distance extends DataMapper{
	var $has_one = array('client','survey_site');
	function __construct(){
		parent::__construct();
	}
	
	
	function get_distance($survey_site_id){
		$client = new Survey_client_distance();
		$client->where('site_id',$survey_site_id)->get();
		return $client;
	}
	
	function survey_client_add($params){
		$obj = new Survey_client_distance();
		$obj->survey_site_id = $params['survey_site_id'];
		$obj->distance = $params['distance'];
		$obj->client_id = $params['client_id'];
		$obj->save();
		return mysql_insert_id();
	}
	
	function remove_client($id){
		$obj = new Survey_client_distance();
		$obj->where('id',$id)->get();
		$obj->delete();
	}
}
