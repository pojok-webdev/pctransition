<?php
class Web_setting extends CI_Model{
	var $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
	function get_themes(){
		$flnm = get_dir_file_info('./themes',TRUE);
		$out = array();
		foreach ($flnm as $f=>$v){
			$out[$f] = $f;
		}
		return $out;
	}
	
	function get_languages(){
		$flnm = get_dir_file_info('./application/language',TRUE);
		$out = array();
		foreach ($flnm as $f=>$v){
			$out[$f] = $f;
		}
		return $out;
	}
	function get(){
		$sql = "select * from web_settings ";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res;
	}
}