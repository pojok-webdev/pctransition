<?php
class Group_preference extends DataMapper{
	var $has_one = array('group');
	function __construct(){
		parent::__construct();
	}
	function get_preferences($group_id){
		$groups = new Group();
		$groups->where('id',$group_id)->get();
//		$groups->group_preference;
		$out = array();
		foreach ($groups->group_preference as $preference){
			array_push($out,$preference);
		}
		return $out;
	}
}