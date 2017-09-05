<?php
class Install_router extends DataMapper{
	var $has_one = array('install_site');
	function __construct(){
		parent::__construct();
	}
	function get_routers($install_id){
		$routers = new Install_router();
		$routers->where('install_request_id',$install_id)->get();
		return $routers;
	}
}
