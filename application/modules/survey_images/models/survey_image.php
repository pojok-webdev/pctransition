<?php
class Survey_image extends DataMapper{
	var $has_one = array('survey_site');
	function __construct(){
		parent::__construct();
	}	
	function get_image_by_site($site_id){
		$image = new  Survey_image();
		$image->where('survey_site_id',$site_id)->get();
		return $image;
	}
	function add($params){
		$obj = new Survey_image();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return mysql_insert_id();
	}
	function remove($id){
		$obj = new Survey_image();
		$obj->where('id',$id)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
}
