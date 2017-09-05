<?php
class Survey_gps_data extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function get_gps_data($survey_id){
		$gps_data = new Survey_gps_data();
		$gps_data->where('survey_id',$survey_id)->get();
		return $gps_data;
	}
}