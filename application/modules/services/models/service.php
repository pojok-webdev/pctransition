<?php
class Service extends CI_Model{
	var $has_many = array('survey_request','install_request','troubleshoot_request','client');
	function __construct(){
		parent::__construct();
	}
	function get_combo_data($iskeyvalpaired=true,$first_row=''){
		$ci = & get_instance();
		$sql = "select id,name from services ";
		$sql.= "order by createdate asc ";
		$que = $ci->db->query($sql);
		if($first_row!=''){
			$out[0] = $first_row;
		}
		foreach($que->result() as $res){
			if($iskeyvalpaired){
				$out[$res->id] = $res->name;
			}else{
				$out[$res->name] = $res->name;
			}
		}
		return $out;
	}
}
