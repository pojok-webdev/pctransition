<?php
class Survey_bts_distance extends DataMapper{
	var $has_one = array('btstower','survey_site');
	function __construct(){
		parent::__construct();
	}
	
	function edit($params){
		$obj = new Survey_bts_distance();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
	}
	
	function get_bts($survey_site_id){
		$bts = new Survey_bts_distance();
		$bts->where('survey_site_id',$survey_site_id)->get();
//		echo $bts->check_last_query();
		return $bts;
	}
	
	function remove_by_id($ids){
		$id_array = implode(',',$ids);
		$query = 'delete from survey_bts_distances where id in (' . $id_array . ')';
		$result = $this->db->query($query);
	}
	
	function survey_bts_add($params){
		$obj = new Survey_bts_distance();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
}
