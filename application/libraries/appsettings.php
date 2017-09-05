<?php 
class Appsettings {
	function __construct(){
		
	}
	function getdata(){
		$path = array(
			'csspath' => base_url() . 'css/aquarius/',
			'jspath' => base_url() . 'js/aquarius/',
			'imagepath' => base_url() . 'img/aquarius/',
		);
		return array(
			'csspath' => base_url() . 'css/aquarius/',
			'jspath' => base_url() . 'js/aquarius/',
			'imagepath' => base_url() . 'img/aquarius/',
			'path'=>$path,
		);
	}
	function getuser(){
			if($this->ion_auth->logged_in()){
			$ionuser = $this->ion_auth->user()->row();
			return User::get_user_by_id($ionuser->id);
		}
	}
}
?>
