<?php
class Devices extends CI_Controller{
	var $setting;
	var $mpath;
	var $preference;
	function __construct(){
		parent::__construct();
		$this->setting = Common::get_web_settings();
		$this->mpath = base_url() . 'index.php/devices/';
		$this->preference = Common::get_preferences();
		$this->lang->load('padi',$this->setting['language']);
	}
	function show_devices(){
		$obj = new Device();
		Common::show_object($obj, 'devices','devices');
	}
	function entry_device(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array('view_data'=>'entry_device');
		switch($uri['type']){
			case 'add':
				$data['id'] = '';
				$data['name'] = '';
				$data['satuan'] = '';
				$data['type'] = 'add';
				$data['active'] = TRUE;
				break;
			case 'edit':
				$device = new Device();
				$device->where('id',$uri['id'])->get();
				$data['id'] = $device->id;
				$data['name'] = $device->name;
				$data['satuan'] = $device->address;
				$data['type'] = 'edit';
				$data['active'] = ($client->active=='1')?TRUE:FALSE;
				break;
		}
		$this->load->view('common/backendindex',$data);
	}
	function entry_device_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['save_x'])){
			$active = (isset($params['active']))?'1':'0';
			$device = new Device();
			switch ($params['type']){
				case 'add':
					$this->access_log->insert_log('Entry device (' . $params['name'] . ')');
					$client->name = $params['name'];
					$client->satuan = $params['satuan'];
					$client->active = $params['active'];
					$client->user_name = $this->session->userdata['username'];
					$client->save();
					break;
				case 'edit':
					$device->where('id',$params['id'])->update(array(
					'name'=>$params['name'],'satuan'=>$params['satuan'],
					'active'=>$params['active']
					));
					break;
			}

		}
		redirect($this->mpath . 'show_clients/page');
	}
	function device_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['btn_dvc'])){
			$device_data = array('device_src'=>$params['cari']);
			$this->session->set_userdata($device_data);
			redirect($this->mpath . 'show_device/page');
		}
		if(isset($params['remove_x'])){
			if(isset($params['id'])){
				$data['view_data'] = 'confirmation';
				$items = implode(',',$params['id']);
				$data['action'] = $this->mpath . 'device_execute';
				$data['query'] = 'delete from devices where id in (' . $items . ')';
				$data['message'] = 'Apakah akan menghapus item no ' . $items . ' ?';
				$this->load->view('common/backendindex',$data);
			}
		}
	}
	function device_execute(){
		$this->execute_action('devices', $this->mpath . 'show_devices/page');
	}
	function getdevice(){
		$devicetype = $this->uri->segment(3);
		$arr = array();
		foreach(Device::get_combo_data($devicetype) as $key=>$val){
			array_push($arr, '"' . $key . '":"' . $val . '"');
		}
		$out = implode(',',$arr);
		$out = '{' . $out . '}';
		echo $out;
	}
	function getJSONbyId(){
		$id = $this->uri->segment(3);
		$arr = array();
		$objs = new Device();
		$objs->where('devicetype_id',$id)->get();
		foreach(Device::get_combo_data_device($id) as $key=>$val){
			array_push($arr, '"' . $key . '":"' . $val . '"');
		}
		$out = implode(',',$arr);
		$out = '{' . $out . '}';
		echo $out;
//		echo '{"name":"Test"}';
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Device();
		$obj->where("id",$params["id"])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
	function save(){
		$params = $this->input->post();
		$obj = new Device();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
}
