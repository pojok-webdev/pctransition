<?php
class Obj extends CI_Controller{
	var $settings;
	function __construct(){
		parent::__construct();
	} 
	
	function entry_obj(){
	
	}
	
	function show_obj(){
		
	}
	
	function obj_handler(){
		
	}
	
	function get_web_settings(){
		$out = array();
		$web_settings = new Web_setting();
		$web_settings->get();
		$out['theme'] = $web_settings->theme;
		$out['language'] = $web_settings->language;
		$out['footer_text'] = $web_settings->footer_text;
		return $out;
	}
	
	public function check_authentication(){
		if(!$this->auth->is_logged_in()){
			redirect(base_url() . 'index.php/back_end/login');
		}
		$user = new User();
		$user->where('id',$this->session->userdata['id'])->get();
		$user_info['username'] = $user->username;
		$user_info['group'] = $user->group->name;
		$this->user_info = $user_info;
	}

	
}