<?php
class Web_setting extends DataMapper{
	function __construct(){
		parent::__construct();
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
}