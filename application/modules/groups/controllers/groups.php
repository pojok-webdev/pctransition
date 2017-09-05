<?php
class Groups extends CI_Controller{
	var $setting;
	var $mpath;
	function __construct(){
		parent::__construct();
		$this->setting = Common::get_web_settings();
		$this->mpath = base_url() . 'index.php/groups/';
		$this->lang->load('padi',$this->setting['language']);
	}
	
	function show_groups(){
		$group = new Group();
		Common::show_object($group, 'group','groups');
	}
	
	function entry_group(){
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
				$group = new Group();
				$group->where('id',$uri['id'])->get();
				$data['id'] = $group->id;
				$data['name'] = $group->name;
				$data['description'] = $group->description;
				$data['type'] = 'edit';
				$data['active'] = ($group->active=='1')?TRUE:FALSE;
				break;
		}
		$this->load->view('common/backendindex',$data);
	}
	
	function entry_group_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['save_x'])){
			$active = (isset($params['active']))?'1':'0';
			$group = new Group();
			switch ($params['type']){
				case 'add':
					$this->access_log->insert_log('Entry property type (' . $params['name'] . ')');
					$group->name = $params['name'];
					$group->description = $params['description'];
					$group->active = $params['active'];
					$group->user_name = $this->session->userdata['username'];
					$group->save();
					break;
				case 'edit':
					$group->where('id',$params['id'])->update(array('name'=>$params['name'],'description'=>$params['description'],'active'=>$params['active']));
					break;
			}
			
		}
		redirect($this->mpath . 'show_groups/page');
	}
	
	function group_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['btn_cari'])){
			$group_data = array('group_src'=>$params['cari']);
			$this->session->set_userdata($group_data);
			redirect($this->mpath . 'show_group/page');
		}
		if(isset($params['remove_x'])){
			if(isset($params['id'])){
				$data['view_data'] = 'confirmation';
				$items = implode(',',$params['id']);
				$data['action'] = $this->mpath . 'group_execute';
				$data['query'] = 'delete from groups where id in (' . $items . ')'; 
				$data['message'] = 'Apakah akan menghapus item no ' . $items . ' ?';
				$this->load->view('common/backendindex',$data);
			}
		}
	}
	
	function group_execute(){
		$this->execute_action('groups', $this->mpath . 'show_groups/page');
	}
	
}