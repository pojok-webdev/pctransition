<?php
class Install_image extends DataMapper{
	var $has_one = array('install_site');
	function __construct(){
		parent::__construct();
	}

	function add_image($params){
		$obj = new Install_image();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}

	function get_by_id($id){
		$image = new Install_image();
		$image->where('id',$id)->get();
		return $image;
	}
	
	function remove_image($id){
		$obj = new Install_image();
		$obj->where('id',$id)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
	
	function get_images(){
		$images = new Install_image();
		$images->get();
		return $images;
	}

	function save_foto($params){
		$upload_config['upload_path']	=	'./media/installs';
		$upload_config['allowed_types']	=	'jpg|jpeg|gif|png';
		$upload_config['max_size']		=	'1024';
		$upload_config['max_width']		=	'1024';
		$upload_config['max_height']	=	'768';
		$this->load->library('upload',$upload_config);
		if(!$this->upload->do_upload())
		{
			echo 'error';
		}
		else 
		{
			$upload_data = $this->upload->data();
			$img['image_library'] = 'gd2';
			$img['source_image'] = './media/installs/' . $upload_data['orig_name'];
			$img['width'] =300;
			$img['height'] =300;
			$img['maintain_ratio'] = FALSE;
			$this->load->library('image_lib',$img);
			$this->image_lib->resize();
			redirect(base_url() . 'index.php/install_requests/entry_image/type/add/install_id/' . $params['install_id']);
		}
		
	}
	
	function save_image($params){
		$image = new Install_image();
		$image->name = $params['image_name'];
		$image->description = $params['image_description'];
		echo $image->check_last_query();
		$image->save();
	}
	
	function insert_image($install_id,$name){
		$image = new Install_image();
		$image->install_request_id = $install_id;
		$image->name = $name;
		$image->user_name = $this->session->userdata['username'];
		$image->save();
	}

	function update_image($params){
		$image = new Install_image();
		$image->where('id',$params['id'])->update(array(
			'name'=>$params['image_name'],
			'description'=>$params['image_description']
		));
	}
}
