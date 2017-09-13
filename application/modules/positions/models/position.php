<?php
class Position extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_combo_data($first_row="Pilihlah"){
		$ci = & get_instance();
		$sql = "select id,name from positions ";
		$sql.= "order by createdate asc ";
		$que = $ci->db->query($sql);
		if($first_row!=''){
			$out[0] = $first_row;
		}
		foreach($que->result() as $res){
			$out[$res->id] = $res->name;
		}
		return $out;
	}
}
