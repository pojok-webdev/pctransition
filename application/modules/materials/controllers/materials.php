<?php
class Materials extends CI_Controller{
	var $setting;
	var $mpath;
	var $preference;
	function __construct(){
		parent::__construct();
		$this->setting = Common::get_web_settings();
		$this->mpath = base_url() . 'index.php/materials/';
		$this->preference = Common::get_preferences();
		$this->lang->load('padi',$this->setting['language']);
	}
	function show_materials(){
		$obj = new Material();
		Common::show_object($obj, 'materials','materials');
	}
	function entry_material(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array('view_data'=>'entry_material');
		switch($uri['type']){
			case 'add':
				$data['id'] = '';
				$data['name'] = '';
				$data['satuan'] = '';
				$data['type'] = 'add';
				$data['active'] = TRUE;
				break;
			case 'edit':
				$material = new Material();
				$material->where('id',$uri['id'])->get();
				$data['id'] = $material->id;
				$data['name'] = $material->name;
				$data['satuan'] = $material->address;
				$data['type'] = 'edit';
				$data['active'] = ($client->active=='1')?TRUE:FALSE;
				break;
		}
		$this->load->view('common/backendindex',$data);
	}
	function entry_material_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['save_x'])){
			$active = (isset($params['active']))?'1':'0';
			$material = new Material();
			switch ($params['type']){
				case 'add':
					$this->access_log->insert_log('Entry material (' . $params['name'] . ')');
					$client->name = $params['name'];
					$client->satuan = $params['satuan'];
					$client->active = $params['active'];
					$client->user_name = $this->session->userdata['username'];
					$client->save();
					break;
				case 'edit':
					$material->where('id',$params['id'])->update(array(
					'name'=>$params['name'],'satuan'=>$params['satuan'],
					'active'=>$params['active']
					));
					break;
			}
		}
		redirect($this->mpath . 'show_clients/page');
	}
	function material_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['btn_dvc'])){
			$material_data = array('material_src'=>$params['cari']);
			$this->session->set_userdata($material_data);
			redirect($this->mpath . 'show_material/page');
		}
		if(isset($params['remove_x'])){
			if(isset($params['id'])){
				$data['view_data'] = 'confirmation';
				$items = implode(',',$params['id']);
				$data['action'] = $this->mpath . 'material_execute';
				$data['query'] = 'delete from materials where id in (' . $items . ')';
				$data['message'] = 'Apakah akan menghapus item no ' . $items . ' ?';
				$this->load->view('common/backendindex',$data);
			}
		}
	}
	function material_execute(){
		$this->execute_action('materials', $this->mpath . 'show_materials/page');
	}
	function getJson(){
		$params = $this->input->post();
		$obj = new Material();
		$obj->where("id",$params["id"])->get();
		echo '{"materialtype":"'.$obj->materialtype->name.'","name":"'.$obj->name.'","satuan":"'.$obj->satuan.'","description":"'.$obj->description.'"}';
	}
	function getmaterial(){
		$materialtype = $this->uri->segment(3);
		$arr = array();
		foreach(Material::get_combo_data($materialtype) as $key=>$val){
			array_push($arr, '"' . $key . '":"' . $val . '"');
		}
		$out = implode(',',$arr);
		$out = '{' . $out . '}';
		echo $out;
	}
	function get_name_by_parent(){
		$parent = $this->uri->segment(3);
		$arr = array();
		foreach(Material::get_name_by_parent($parent) as $key=>$val){
			array_push($arr,'"' . $key . '":"' . $val . '"');
		}
		$out = implode(',',$arr);
		$out = '{' . $out . '}';
		echo $out;
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Material();
		$obj->where("id",$params["id"])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
	function update(){
		$params = $this->input->post();
		$obj = new Material();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}
}
