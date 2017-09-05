<?php
class Helps extends CI_Controller{
	var $setting;
	var $preference;
	var $user_info;
	var $alertcount;
	function __construct(){
		parent::__construct();
		$this->preference = Common::get_preferences();
		$this->setting = Common::get_web_settings();			
		$this->lang->load('padi',$this->setting['language']);
		if($this->auth->is_logged_in()){
			$this->alertcount = Common::check_messages();
		}
			
	}

	function index(){
            /*
		$this->user_info = Common::check_authentication();
		$this->preference = Common::get_preferences();
		$this->setting = Common::get_web_settings();			
		$uri = $this->uri->uri_to_assoc();
		$type = (isset($uri['type']))?$uri['type']:'show_help';
		$data = array('view_data'=>'show_help','type'=>$type);
		//$this->load->view('back_end/index',$data);
                        
*/
            $this->load->view('show_help');
	}
        
        
        
        
	
	function show_help(){
		Common::check_authentication();
		$this->preference = Common::get_preferences();
		$this->setting = Common::get_web_settings();			
		$uri = $this->uri->uri_to_assoc();
		$type = (isset($uri['type']))?$uri['type']:'show_help';
		$data = array('view_data'=>'show_help','type'=>$type);
		//$this->load->view('common/backendindex',$data);
                $this->load->view('show_help',$data);
	}
}