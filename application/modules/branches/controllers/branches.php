<?php
class Branches extends CI_Controller{
	var $setting;
	var $mpath;
	function __construct(){
		parent::__construct();
		$this->setting = Common::get_web_settings();
		$this->mpath = base_url() . 'index.php/branches/';
		$this->lang->load('padi',$this->setting['language']);
	}
	
	function show_branches(){
		$branch = new Branch();
		Common::show_object($branch, 'branch','branches');
	}
	
	function entry_branch(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array('view_data'=>'entry_branch');
		switch($uri['type']){
			case 'add':
				$data['id'] = '';
				$data['name'] = '';
				$data['description'] = '';
				$data['type'] = 'add';
				$data['active'] = TRUE;
				break;
			case 'edit':
				$branch = new Branch();
				$branch->where('id',$uri['id'])->get();
				$data['id'] = $branch->id;
				$data['name'] = $branch->name;
				$data['description'] = $branch->description;
				$data['type'] = 'edit';
				$data['active'] = ($branch->active=='1')?TRUE:FALSE;
				break;
		}
		$this->load->view('common/backendindex',$data);
	}
	
	function entry_branch_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['save_x'])){
			$active = (isset($params['active']))?'1':'0';
			$branch = new Branch();
			switch ($params['type']){
				case 'add':
					$this->access_log->insert_log('Entry property type (' . $params['name'] . ')');
					$branch->name = $params['name'];
					$branch->description = $params['description'];
					$branch->active = $params['active'];
					$branch->user_name = $this->session->userdata['username'];
					$branch->save();
					break;
				case 'edit':
					$branch->where('id',$params['id'])->update(array('name'=>$params['name'],'description'=>$params['description'],'active'=>$params['active']));
					break;
			}
			
		}
		redirect($this->mpath . 'show_branches/page');
	}
	
	function branch_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['btn_cari'])){
			$branch_data = array('branch_src'=>$params['cari']);
			$this->session->set_userdata($branch_data);
			redirect($this->mpath . 'show_branch/page');
		}
		if(isset($params['remove_x'])){
			if(isset($params['id'])){
				$data['view_data'] = 'confirmation';
				$items = implode(',',$params['id']);
				$data['action'] = $this->mpath . 'branch_execute';
				$data['query'] = 'delete from branches where id in (' . $items . ')'; 
				$data['message'] = 'Apakah akan menghapus item no ' . $items . ' ?';
				$this->load->view('common/backendindex',$data);
			}
		}
	}
	
	function branch_execute(){
		$this->execute_action('branches', $this->mpath . 'show_branches/page');
	}
	
}
