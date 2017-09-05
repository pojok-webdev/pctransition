<?php 
class Survey_site_distance extends DataMapper{
	var $has_one = array("survey_site");
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Survey_site_distance();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
}
