<?php
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
	function get_web_settings(){
		$out = array();
		$web_settings = new Web_setting();
		$web_settings->get();
		$out['theme'] = "";//$web_settings->theme;
		$out['language'] = "indonesia";//$web_settings->language;
		$out['footer_text'] = "";//$web_settings->footer_text;
		return $out;
    }
	function getMenuStatus($menuFeed,$opened){
		foreach($opened as $openMenu){
			if($openMenu == $menuFeed){
				return "active";
			}
		}
		return "";
	}
