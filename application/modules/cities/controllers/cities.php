<?php
class Cities extends CI_Controller{
	var $setting;
	var $mpath;
	
	function __construct(){
		parent::__construct();
		$this->setting = Common::get_web_settings();
		$this->mpath = base_url() . 'index.php/cities/';
	}
	
	
	function show_city(){
		$cities = new City();
		Common::show_object($cities, 'city_management', 'cities');
	}
	
	function city_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['btn_cari'])){
			$city_data = array('city_src'=>$params['cari']);
			$this->session->set_userdata($city_data);
			redirect($this->mpath . 'show_city/page');
		}
		if(isset($params['remove_x'])){
			if(isset($params['id'])){
				$data['view_data'] = 'confirmation';
				$items = implode(',',$params['id']);
				$data['action'] = $this->mpath . 'city_execute';
				$data['query'] = 'delete from cities where id in (' . $items . ')'; 
				$data['message'] = 'Apakah akan menghapus item no ' . $items . ' ?';
				$this->load->view('common/backendindex',$data);
			}
		}
	}
	
	function city_execute(){
		$this->execute_action('cities', $this->mpath . 'show_city/page');
	}
				
	function entry_city(){
		Common::check_authentication();
			$uri = $this->uri->uri_to_assoc();
			$data = array('view_data'=>'entry_city');
			switch($uri['type']){
				case 'add':
					$data['id'] = '';
					$data['name'] = '';
					$data['description'] = '';
					$data['type'] = 'add';
					$data['active'] = TRUE;
					break;
				case 'edit':
					$city = new City();
					$city->where('id',$uri['id'])->get();
					$data['id'] = $city->id;
					$data['name'] = $city->name;
					$data['description'] = $city->description;
					$data['type'] = 'edit';
					$data['active'] = ($city->active=='1')?TRUE:FALSE;
					break;
			}
			
			$this->load->view('common/backendindex',$data);		
	}
	
	function entry_city_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['save_x'])){
			$aktif = (isset($params['aktif']))?'1':'0';
			$status = new City();
			switch ($params['type']){
				case 'add':
					$this->access_log->insert_log('Add city (' . $params['name'] . ')');
					$status->name = $params['name'];
					$status->description = $params['description'];
					$status->active = $params['active'];
					$status->save();
					break;
				case 'edit':
					$this->access_log->insert_log('Edit city (' . $params['name'] . ')');
					$status->where('id',$params['id'])->update(array('name'=>$params['name'],'description'=>$params['description'],'active'=>$params['active']));
					break;
			}
		}
		redirect($this->mpath . 'show_city/page');
	}
	
	
	
}