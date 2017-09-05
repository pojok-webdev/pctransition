<?php
class Install_request extends DataMapper{
	var $has_one = array('client_site','service','install_installer','user','survey_request');
	var $has_many = array('install_site');
	function add($params){
		$obj = new Install_request();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return mysql_insert_id();
	}

	function __construct(){
		parent::__construct();
	}

	function close_install_date($params){
		$obj = new Install_request();
		$obj->where('id',$params['install_request_id'])->update(array('fix_install_date'=>$params['fix_install_date'],'user_close'=>$params['sender']));
		return $obj->check_last_query();
	}

	function edit($params){
		$obj = new Install_request();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
	}
	function get_obj_by_id($id){
		$obj = new Install_request();
		$obj->where('id',$id)->get();
		//echo $obj->check_last_query();
		return $obj;
	}

	function get_request($id){
		$request = new Install_request();
		$request->where('id',$id)->get();
		return $request;
	}

	function get_notification($status){
		$obj = new Install_request();
		$obj->where('status',$status)->get();
//		echo $obj->check_last_query();
		return $obj->result_count();
	}

	function get_installers($request_id){
		$installers = new Install_installer();
		$installers->where('install_request_id',$request_id)->get();
		return $installers;
	}

	function populate(){
		$obj = new Install_request();
		$obj->get();
		return $obj;
	}

	function request_save($object){
		$request = new Install_request();
		$request->survey_request_id = $object['survey_request_id'];
		$request->client_id = $object['client_id'];
		$request->service_id = $object['service_id'];
		$request->pic_name = $object['pic_name'];
		$request->pic_position = $object['pic_position'];
		$request->pic_phone = $object['pic_phone'];
		$request->install_date = $object['install_date'];
		$request->trial_permanent = $object['trial_permanent'];
		$request->trial_periode1 = $object['trial_periode1'];
		$request->trial_periode2 = $object['trial_periode2'];
		$request->permit = $object['permit'];
		$request->user_name = $this->session->userdata['username'];
		$request->save();
		return mysql_insert_id();
	}

	function request_update($object){
		$request = new Install_request();
		$request->where('id',$object['id'])->update(array(
			'survey_request_id'=>$object['survey_id'],
			'client_id'=>$object['client'],
			'service_id'=>$object['service'],
			'pic_name'=>$object['pic_name'],
			'pic_position'=>$object['pic_position'],
			'pic_phone'=>$object['pic_phone'],
			'install_date'=>Common::human_to_sql_date($object['install_date']) . ' ' . $object['hour'] . ':' . $object['minute'],
			'trial_permanent'=>$object['trial_permanent'],
			'trial_periode1'=>$object['trial_periode1'],
			'trial_periode2'=>$object['trial_periode2'],
			'permit'=>$object['permit']
		));
	}

	function save_router($params){
		$router = new Install_router();
		$router->install_request_id = $params['install_id'];
		$router->tipe = $params['router_type'];
		$router->macboard = $params['router_macboard'];
		$router->ip_public = $params['router_ip_public'];
		$router->ip_private = $params['router_ip_private'];
		$router->user = $params['router_user'];
		$router->password = $params['router_password'];
		$router->location = $params['router_location'];
		$router->save();
	}

	function remove_routers($params){
		$ids = implode(',', $params['router']);
		$query = 'delete from install_routers where id in (' . $ids . ')';
		$result = $this->db->query($query);
	}

	function save_ap_wifi($params){
		$ap = new Install_ap_wifi();
		$ap->install_request_id = $params['install_id'];
		$ap->tipe = $params['ap_wifi_type'];
		$ap->macboard = $params['ap_wifi_macboard'];
		$ap->ip_address = $params['ap_wifi_ip_address'];
		$ap->essid = $params['ap_wifi_essid'];
		$ap->security_key = $params['ap_wifi_security_key'];
		$ap->user = $params['ap_wifi_user'];
		$ap->password = $params['ap_wifi_password'];
		$ap->location = $params['ap_wifi_location'];
		$ap->user_name = $this->session->userdata['username'];
		$ap->save();
	}

	function remove_ap_wifi($params){
		$ids = implode(',', $params['wifi']);
		$query = 'delete from install_ap_wifis where id in (' . $ids . ')';
		$result = $this->db->query($query);
	}

	function get_ap_wifis($install_id){
		$ap = new Install_ap_wifi();
		$ap->where('install_request_id',$install_id)->get();
		return $ap;
	}

	function get_images(){
		return array();
	}

	function remove_foto($params){
		$query = 'delete from install_images where id in (' . $params . ') ';
		$this->db->query($query);
	}

	function update_install($params){
		$mrtg = (isset($params['mrtg']))?'1':'0';
		$whatsup = (isset($params['whatsup']))?'1':'0';
		$shapper = (isset($params['shapper']))?'1':'0';
		$query = 'update install_requests set ';
		$query.= 'create_mrtg="' . $mrtg . '",';
		$query.= 'create_whatsup="' . $whatsup . '",';
		$query.= 'create_shapper="' . $shapper . '" ';
		$query.= 'where id="' . $params['id'] . '"';
		$this->db->query($query);
	}

	function updatestatus($params){
		$obj = new Install_request();
		$obj->where('id',$params['id'])->update('status',$params['status']);
		return $obj->check_last_query();
	}


}
