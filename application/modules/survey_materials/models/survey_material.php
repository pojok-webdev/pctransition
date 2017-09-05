<?php
class Survey_material extends DataMapper{
	var $has_one = array('survey_site');
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Survey_material();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	
	function get_material_by_site($site_id){
		$materials = new Survey_material();
		$materials->where('survey_site_id',$site_id)->get();
		return $materials;
	}

	function get_material_array_by_site($site_id){
		$materials = new Survey_material();
		$materials->where('survey_site_id',$site_id)->get();
		$out = array();
		foreach ($materials as $material){
			$out[$material->name] = $material->amount;
		}
		return $out;
	}
	
	function material_is_exist($survey_id){
		$material = new Survey_material();
		$material->where('survey_site_id',$survey_id)->get();
		return $material->result_count();
	}
}
