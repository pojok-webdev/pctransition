<?php
class Group_preferences extends CI_Controller{
	var $mpath;
	var $setting;
	function __construct(){
		parent::__construct();
		$this->setting = Common::get_web_settings();
		$this->mpath = base_url() . 'index.php/group_preferences/';
		$this->lang->load('padi',$this->setting['language']);
	}
	
	function show_group_preferences(){
		$obj = new Group_preference();
		Common::show_object($obj, 'group_preference','group_preference');
	}
	
	function entry_group_preference(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array('view_data'=>'entry_group');
		switch($uri['type']){
			case 'add':
				$data['id'] = '';
				$data['name'] = '';
				$data['description'] = '';
				$data['type'] = 'add';
				$data['active'] = TRUE;
				break;
			case 'edit':
				$obj = new Group_preference();
				$obj->where('id',$uri['id'])->get();
				$data['id'] = $obj->id;
				$data['name'] = $obj->name;
				$data['description'] = $obj->description;
				$data['type'] = 'edit';
				$data['active'] = ($obj->active=='1')?TRUE:FALSE;
				break;
		}
		$this->load->view('common/backendindex',$data);
	}
	
	function entry_group_preference_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['save_x'])){
			$active = (isset($params['active']))?'1':'0';
			$obj = new Group_preference();
			switch ($params['type']){
				case 'add':
					$this->access_log->insert_log('Entry property type (' . $params['name'] . ')');
					$obj->name = $params['name'];
					$obj->description = $params['description'];
					$obj->active = $params['active'];
					$obj->user_name = $this->session->userdata['username'];
					$obj->save();
					break;
				case 'edit':
					$obj->where('id',$params['id'])->update(array('name'=>$params['name'],'description'=>$params['description'],'active'=>$params['active']));
					break;
			}
			
		}
		redirect($this->mpath . 'show_group_preferences/page');
	}
	
	function group_preferences_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['btn_cari'])){
			$obj_data = array('group_src'=>$params['cari']);
			$this->session->set_userdata($obj_data);
			redirect($this->mpath . 'show_group_preferences/page');
		}
		if(isset($params['remove_x'])){
			if(isset($params['id'])){
				$data['view_data'] = 'confirmation';
				$items = implode(',',$params['id']);
				$data['action'] = $this->mpath . 'group_preference_execute';
				$data['query'] = 'delete from groups where id in (' . $items . ')'; 
				$data['message'] = 'Apakah akan menghapus item no ' . $items . ' ?';
				$this->load->view('common/backendindex',$data);
			}
		}
	}
	
	function group_preference_execute(){
		$this->execute_action('group_preferences', $this->mpath . 'show_group_preferences/page');
	}
	
}