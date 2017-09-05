<?php
class Survey_surveyor extends DataMapper{
	var $has_one = array('survey_request');
	function __construct(){
		parent::__construct();
	}
	
	function get_names_by_survey_id($survey_id){
		$surveyors = new Survey_surveyor();
		$surveyors->where('survey_request_id',$survey_id)->get();
		$out = '';
		foreach ($surveyors as $surveyor){
			$out .= $surveyor->name . ' - ';
		}
		return substr($out, 0,strlen($out)-2);
	}
	
	function add($params){
		$obj = new Survey_surveyor();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
		//return mysql_insert_id();
	}
	
	function edit($params){
		$obj = new Survey_surveyor();
		$obj->where('id',$params['id'])->update($params);
//		return $obj->check_last_query();
		return $params['id'];
	}
	
	function remove($params){
		$obj = new Survey_surveyor();
		$obj->where('id',$params)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
}
