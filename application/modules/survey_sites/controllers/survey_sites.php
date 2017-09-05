<?php
class Survey_sites extends CI_Controller{
	var $setting;
	var $preference;
	var $user_info;
	var $alertcount;
	var $mpath;
	function __construct(){
		parent::__construct();
		Common::get_preferences();
		$this->setting = Common::get_web_settings();
		$this->lang->load('padi',$this->setting['language']);
		$this->mpath = base_url() . 'index.php/survey_sites/';
//		$this->load->model('Db_pelanggan_clients/db_pelanggan_client');
	}
	function addsurveysite(){
		echo 'x';
//		$params['survey_request_id'] =9;
		//$params = $this->input->post();
		//echo Survey_site::add($params);
	}
	function add_ts_client_site(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$site_id =(isset($uri['id']))?$uri['id']:'';
		$data = array(
		'view_data'=>'add_ts_client_site',
		'uri'=>$uri,'survey_bts_distances'=>Survey_bts_distance::get_bts($uri['id']),
		'survey_client_distance'=>Survey_client_distance::get_distance($uri['id']),
		'site_id'=>$site_id,
		'survey_materials'=>Survey_material::get_material_by_site($uri['id']),
		'survey_devices'=>Survey_device::get_device_by_site($uri['id']),
		'add_material_enabled'=>(Survey_material::material_is_exist($site_id))?'disabled="disabled"':'',
		'add_device_enabled'=>(Survey_device::device_is_exist($site_id))?'disabled="disabled"':'',
		);
		switch ($uri['type']){
			case 'edit':
				$site = new Survey_site();
				$site->where('id',$uri['id'])->get();
				$data['address'] = $site->address;
				$data['city'] = $site->city;
				$data['phone_area'] = $site->phone_area;
				$data['phone'] = $site->phone;
				$data['pic'] = $site->pic;
				$data['pic_position'] = $site->pic_position;
				$data['location_e_degree'] = $site->location_e_degree;
				$data['location_e_minute'] = $site->location_e_minute;
				$data['location_e_second'] = $site->location_e_second;
				$data['location_s_degree'] = $site->location_s_degree;
				$data['location_s_minute'] = $site->location_s_minute;
				$data['location_s_second'] = $site->location_s_second;
				$data['elevation_ground'] = $site->elevation_ground;
				$data['elevation_rooftop'] = $site->elevation_rooftop;
				$data['bearing'] = $site->bearing;
				$data['leg_dist'] = $site->leg_dist;
				$data['leg_course'] = $site->leg_course;
//				$data['textresume'] = $site->longresume;
				$data['amsl'] = $site->amsl;
				$data['agl'] = $site->agl;
				$data['images'] = Survey_image::get_image_by_site($uri['id']);
				break;
		}
		$this->load->view('common/backendindex',$data);
	}
	function add_ts_client_site_handler(){
		$params = $this->input->post();
		$site = new Survey_site();
		$site->where('id',$params['site_id'])->update(array(
		'location_e_degree'=>$params['location_e_degree'],
		'location_e_minute'=>$params['location_e_minute'],
		'location_e_second'=>$params['location_e_second'],
		'location_s_degree'=>$params['location_s_degree'],
		'location_s_minute'=>$params['location_s_minute'],
		'location_s_second'=>$params['location_s_second'],
		'elevation_ground'=>$params['elevation_ground'],
		'elevation_rooftop'=>$params['elevation_rooftop'],
		'bearing'=>$params['bearing'],
		'leg_dist'=>$params['leg_dist'],
		'leg_course'=>$params['leg_course'],
		'amsl'=>$params['amsl'],
		'agl'=>$params['agl'],
//		'longresume'=>$params['textresume'],
		));
		$site->check_last_query();
		if(isset($params['save'])){
			redirect(base_url() . 'index.php/survey_requests/entry_ts_survey_request/type/edit/id/' . $params['survey_id']);
		}
		if(isset($params['add_bts'])){
			redirect(base_url() . 'index.php/back_end/add_bts/type/add/site_id/' . $params['site_id'] . '/survey_id/' . $params['survey_id']);
		}
		if(isset($params['remove_bts'])){
			if(isset($params['distance'])){
				Survey_bts_distance::remove_by_id($params['distance']);
			}
			redirect($this->mpath . 'add_ts_client_site/type/edit/survey_id/' . $params['survey_id'] . '/id/' . $params['site_id']);
		}

		if(isset($params['add_pelanggan'])){
			redirect(base_url() . 'index.php/back_end/add_survey_client/type/add/site_id/' . $params['site_id'] . '/survey_id/' . $params['survey_id']);
		}

		if(isset($params['remove_pelanggan'])){
			$distance = implode(',', $params['distance']);
			$query = 'delete from survey_client_distances where id in (' . $distance . ')';
			$result = $this->db->query($query);
			redirect($this->mpath . 'add_ts_client_site/type/edit/survey_id/' . $params['survey_id'] . '/id/' . $params['site_id']);
		}

		if(isset($params['add_foto'])){
			redirect($this->mpath . 'add_foto/survey_id/' . $params['survey_id'] . '/id/' . $params['site_id']);
		}
		if(isset($params['add_material'])){
			redirect(base_url() . 'index.php/back_end/add_survey_material/type/add/survey_id/' . $params['survey_id'] . '/site_id/' . $params['site_id']);
		}
		if(isset($params['add_device'])){
			redirect(base_url() . 'index.php/back_end/add_survey_device/type/add/survey_id/' . $params['survey_id'] . '/site_id/' . $params['site_id']);
		}
		if(isset($params['remove_foto'])){
			$img_str = implode('","',$params['image']);
			$query = 'delete from survey_images where name in ("' . $img_str . '")';
			$rst = $this->db->query($query);
			foreach ($params['image'] as $img){
				copy('./media/surveys_used/' . $img, './media/surveys/' . $img);
				unlink('./media/surveys_used/' . $img);
			}
			redirect($this->mpath . 'add_ts_client_site/type/edit/survey_id/' . $params['survey_id'] . '/id/' . $params['site_id']);
		}
	}
	function add_foto(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array(
		'view_data'=>'add_foto',
//		'files'=>get_dir_file_info('./media',true),
		'files'=>get_filenames('./media/surveys'),
		'survey_id'=>$uri['survey_id'],'id'=>$uri['id']
		);
		$this->load->view('common/backendindex',$data);
	}
	function add_foto_handler(){
		$params = $this->input->post();
		$upload_config['upload_path']	=	'./media/surveys';
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
			$img['source_image'] = './media/surveys/' . $upload_data['orig_name'];
			$img['width'] =300;
			$img['height'] =300;
			$img['maintain_ratio'] = FALSE;
			$this->load->library('image_lib',$img);
			$this->image_lib->resize();
			redirect($this->mpath . 'add_foto/survey_id/' . $params['survey_id'] . '/id/' . $params['id']);
		}
	}
	function bapreview(){
		$id = $this->uri->segment(3);
		$sql = "select id,name,description,img,survey_site_id from survey_bas where id = " . $id;
		$query = $this->db->query($sql);
		$result = $query->result();
		$this->data['menuFeed']='survey';
		$this->data['obj']=$result[0];
		$this->load->view('TS/surveys/gallery',$this->data);
	}
	function getJSON(){
		$id = $this->uri->segment(3);
		$obj = Survey_site::get_obj_by_id($id);
		echo '{"address":"'.$obj->address.'","city":"'.$obj->city.'","pic":"'.$obj->pic.'","pic_position":"'.$obj->pic_position.'","phone_area":"'.$obj->phone_area.'","phone":"'.$obj->phone.'","pic_email":"'.$obj->pic_email.'","description":"'.$obj->description.'"}';
	}
	function remove_foto(){
		$uri = $this->uri->uri_to_assoc();
		unlink('./media/surveys/' . $uri['name']);
		redirect(base_url() . 'index.php/back_end/add_foto/survey_id/' . $uri['survey_id'] . '/id/' . $uri['id']);
	}
	function save(){
		$params = $this->input->post();
		$obj = new Survey_site();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function use_foto(){
		$uri = $this->uri->uri_to_assoc();
		$image = new Survey_image();
		$image->survey_site_id = $uri['id'];
		$image->name = $uri['name'];
		$image->path = './media/surveys/' . $uri['name'];
		$image->user_name = $this->session->userdata['username'];
		$image->save();
		copy('./media/surveys/' . $uri['name'], './media/surveys_used/' . $uri['name']);
		unlink('./media/surveys/' . $uri['name']);
		redirect($this->mpath . 'add_foto/survey_id/' . $uri['survey_id'] . '/id/' . $uri['id']);
	}
	function update(){
		$params = $this->input->post();
		//$message = "Anda mendapakan Email ini kerena terdapat permintaan Survey Pelanggan dari Sales T0T";
		//$this->common->send_mail('puji@padi.net.id','[Internal App] Permintaan Survey (testing mail)',$message);
		//echo Survey_site::site_update($params);
		$obj = new Survey_site();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}
}
