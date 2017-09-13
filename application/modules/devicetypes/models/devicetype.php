<?php
class Devicetype extends CI_Model{
	var $has_many = array('device');
	function __construct(){
		parent::__construct();
	}
	function add($params){
		$keys = array();
		$vals = array();
		$sql = "";
		foreach($params as $key => $val ){
			array_push($keys,$key);
			array_push($vals,$val);
		}
		$keystring = "('" . implode("','",$keys) . "')";
		$valstring = "('" . implode("','",$vals) . "')";
		$sql = "insert into devicetypes ";
		$sql.= " " . $keystring . " " ;
		$sql.= " values " ;
		$sql.= " " . $valstring . " " ;
		$que = $this->ci->db->query($sql);
		return $this->ci->db->insert_id();
	}
	function get_combo_data($first_data="Pilihlah",$active='1',$ids=null){
		$ci = & get_instance();
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$sql = "select * from devicetypes ";
		$sql.= "where active='".$active."' ";
		if($ids!=null){
			$sql.= "and id in (".$ids.") ";
		}
		$sql.= "order by name asc ";
		$que = $ci->db->query($sql);
		$res = $que->result();
		foreach ($res as $client){
			$out[$client->id] = $client->name;
		}
		return $out;
	}
	function populate($active='1'){
		$sql = "select * from devicetypes ";
		if(!empty($active)){
			$sql.= "where active='".$active."' ";
		}
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res;
	}
}
