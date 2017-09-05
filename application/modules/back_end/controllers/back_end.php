<?php 
class Back_end extends CI_Controller{
	var $setting;
	var $preference;
	var $user_info;
	var $alertcount;
	function __construct(){
		parent::__construct();
		$this->load->model(array(
			'back_end/navigators',
			'preference',
			'Provinces/province',
		));
		$this->get_preferences();
		$this->setting = $this->get_web_settings();
		if($this->auth->is_logged_in()){
		$this->alertcount = Common::check_messages();
		}
		$this->lang->load('padi',$this->setting['language']);
	}
	
	function get_preferences(){
		if($this->auth->is_logged_in()){
			$this->preference = User::get_user_preferences($this->session->userdata['id']);
		}
	}
		
	public function check_authentication(){
		if(!$this->auth->is_logged_in()){
			redirect(base_url() . 'index.php/back_end/login');
		}
		$user = new User();
		$user->where('id',$this->session->userdata['id'])->get();
		$user_info['username'] = $user->username;
		$user_info['group'] = $user->group->name;
		$this->user_info = $user_info;
	}

	function check_is_member($group){
		if($this->user_info['group']!=$group){
			switch ($this->user_info['group']){
				case 'Administrators':
					redirect(base_url() . 'index.php/back_end/show_clients/page');
					break;
				case 'Sales':
					redirect(base_url() . 'index.php/back_end/show_survey_requests/page');
					break;
				case 'TS':
					redirect(base_url() . 'index.php/back_end/show_ts_survey_requests/page');
					break;
			}
		}    
	}
		
	function show_object($class,$view_data,$pagination,$column='name'){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$page_conf = $this->common->get_simple_pagination_conf($pagination);
		$obj = $class;
		
		$total = $obj->count();
		$segment = ($uri['page']=='')?0:$uri['page'];
		$obj->order_by($column,'asc')->get($page_conf['per_page'],$segment);
		$page_conf['total_rows'] = $total;
		$per_page = $page_conf['per_page'];
		$this->pagination->initialize($page_conf);
		$data = array(
			'view_data'=>$view_data,'segment'=>$segment,
			'objs'=>$obj,'total'=>$total,
			'page'=>($segment/$per_page)+1,
			'page_count'=>ceil($total/$per_page),'uri'=>$uri
		);
		$this->load->view('common/backendindex',$data);
		
	}
	

	function execute_action($table_name,$redirect_link){
		$this->check_authentication();
		$params = $this->input->post();
		if(isset($params['yes'])){
			$this->access_log->insert_log('Delete ' . $table_name . ' (' . $params['query'] . ')');
			$execute = $this->db->query($params['query']);
		}
		redirect($redirect_link);
	}
	
	
	function index(){
		$this->check_authentication();
		$this->check_messages();
		echo get_cookie();
		$last_user = $this->user->get_last_update();
		$data = array(
			'view_data'=>'home',
			'alertcount'=>Common::check_messages(),
			'last_login'=>date('l, F jS Y',strtotime(Access_log::get_last_login_by_username($this->session->userdata['username']))),
		);
		$this->load->view('common/backendindex',$data);
	}
	
	function get_web_settings(){
		$out = array();
		$web_settings = new Web_setting();
		$web_settings->get();
		$out['theme'] = $web_settings->theme;
		$out['language'] = $web_settings->language;
		$out['footer_text'] = $web_settings->footer_text;
		return $out;
	}
	
	function login(){
		$data['alert'] = '';
		$this->load->view('back_end/login',$data);
	}
		
	function logout(){
		$this->access_log->insert_log('Back end Logout');
		$this->auth->log_out('back_end/login');
	}
	
	function login_handler(){
		$params = $this->input->post();
		if($this->auth->log_in($params['name'],$params['password'])){
			$this->access_log->insert_log('Back end Login');
			redirect(base_url() . 'index.php/back_end/');
//			redirect(base_url() . 'index.php/back_end/show_calendar/page');
		}
		else{
			redirect(base_url() . 'index.php/back_end/login');
		}
	}
		

	function add_client_site(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array('view_data'=>'add_client_site','uri'=>$uri);
		$this->load->view('common/backendindex',$data);
	}
	
	function add_client_site_handler(){
		$params = $this->input->post();
		$client_site = new Survey_site();
		$client_site->client_id = $params['id'];
		$client_site->survey_request_id=$params['id'];
		$client_site->address = $params['address'];
		$client_site->city = $params['city'];
		$client_site->phone_area = $params['phone_area'];
		$client_site->phone = $params['phone'];
		$client_site->pic = $params['pic'];
		$client_site->pic_position = $params['pic_position'];
		$client_site->save();
		redirect(base_url() . 'index.php/survey_requests/entry_survey_request/id/' . $params['id'] . '/type/edit');
	}
	

	function delete_client_site(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$client_site = new Survey_site();
		$client_site->where('id',$uri['id'])->get();
		$client_site->delete();
		redirect(base_url() . 'index.php/back_end/entry_survey_request/type/edit/id/' . $uri['request']);
	}
	
	function survey_request_detail(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array(
		'view_data'=>'survey_request_detail',
		'client_sites'=>Client_site::get_client_sites_by_survey_request($uri['id']),
		'survey_request'=>Survey_request::get_survey_request_by_id($uri['id']),
		);
		$this->load->view('common/backendindex',$data);
	}
	
	
	
	function install_date_revision(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array('view_data'=>'install_date_revision','install_id'=>$uri['id']);
		$this->load->view('common/backendindex',$data);
	}
	
	function send_internal_message(){
		$params = $this->input->post();
		if(isset($params['save_x'])){
			$this->check_authentication();
			$params = $this->input->post();
			$message = new Internal_message();
			$message->message_type = $params['message_type'];
			$message->obj_id = $params['install_id'];
			$message->recipient = $params['recipient'];
			$message->recipient_group = 3;
			$message->content = $params['content'];
			$message->proposed_date1 = $params['proposed_date1'];
			$message->proposed_date2 = $params['proposed_date2'];
			$message->user_name = $this->session->userdata['username'];
			$message->save();
			redirect(base_url() . 'index.php/back_end/');
		}
		if(isset($params['cancel_x'])){
			redirect(base_url() . 'index.php/back_end/ts_entry_install_request/type/edit/id/' . $params['install_id']);
		}
	}
	
	function check_messages(){
		$message = new Internal_message();
		$message->where('recipient',$this->session->userdata['id'])->where('hasread','0')->get();
		$this->alertcount = $message->result_count();
	}
	
	function show_messages(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$type = (isset($uri['type']))?$uri['type']:'';
		$messages = new Internal_message();
		switch ($type){
			case 'install':
				$messages->where('recipient',$this->session->userdata['id'])->where('hasread','0')->get();
				break;
		}
		echo $this->check_messages();
		$data = array('view_data'=>'show_messages','messages'=>$messages,'alertcount'=>$this->alertcount);
		$this->load->view('common/backendindex',$data);		
	}
	
	function entry_surveyor(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array(
		'type'=>'add','id'=>$uri['id'],
		'users'=>User::get_combo_data_by_group('TS'),
		'surveyor'=>1,
		'view_data'=>'entry_surveyor'
		);
		$this->load->view('common/backendindex',$data);
	}
	
	function entry_surveyor_handler(){
		$params = $this->input->post();
		$survey_request = new Survey_surveyor();
		$survey_request->survey_id = $params['id'];
		$survey_request->username = $this->session->userdata['username'];
		$survey_request->name = User::get_name_by_id($params['surveyor']);
		$survey_request->save();
		redirect(base_url() . 'index.php/back_end/entry_ts_survey_request/type/edit/id/' . $params['id']);
	}

	function remove_survey_surveyor(){
		$uri = $this->uri->uri_to_assoc();
		$surveyor = new Survey_surveyor();
		$surveyor->where('id',$uri['surveyor_id'])->get();
		$surveyor->delete();
		redirect(base_url() . 'index.php/back_end/entry_ts_survey_request/type/edit/id/' . $uri['id']);
	}

	function show_report_of_survey(){
		$this->check_authentication();
		include './asset/MPDF54/mpdf.php';
		$uri = $this->uri->uri_to_assoc();
		$obj = new Survey_request();
		$obj->where('id',$uri['id'])->get();
		$data = array(
		'view_data'=>'report_of_survey',
		'client'=>$obj->client->name,
		'business_field'=>$obj->client->business_field,
		'client_sites'=>$obj->survey_site,
		'survey_date'=>$this->common->sql_to_human_datetime($obj->survey_date),
		'surveyors'=>Survey_request::get_surveyor_report($uri['id']),
		'sites'=>Survey_request::get_survey_site_report($uri['id']),
		);
		$this->load->view('common/backendindex',$data);	
	}
	
	function choose_report_recipient(){
		
	}
	
	function show_report_of_survey2(){
		$this->check_authentication();
		include './asset/MPDF54/mpdf.php';
		$uri = $this->uri->uri_to_assoc();
		$obj = new Survey_request();
		$obj->where('id',$uri['id'])->get();
		$data = array(
		'view_data'=>'report_of_survey2',
		'client'=>$obj->client->name,
		'business_field'=>$obj->client->business_field,
		'client_sites'=>$obj->survey_site,
		'survey_date'=>$this->common->sql_to_human_datetime($obj->survey_date),
		'surveyors'=>Survey_request::get_surveyor_report($uri['id']),
		'sites'=>Survey_request::get_survey_site_report($uri['id']),
		);
		$this->load->view('common/backendindex',$data);	
		redirect(base_url() . 'index.php/back_end/confirmation/type/survey_report_mail_sent');
	}
	
	function confirmation(){
		$uri = $this->uri->uri_to_assoc();
		if(isset($uri['type'])){
			
			switch ($uri['type']){
				case 'survey_report_mail_sent':
					$data['type'] = 'survey_report_mail_sent';
					$data['view_data'] = 'systemconfirmation';
					$this->load->view('common/backendindex',$data);
					break;
			}
		}
	}
	
//	function add_ts_client_site(){
//		$this->check_authentication();
//		$uri = $this->uri->uri_to_assoc();
//		$data = array(
//		'view_data'=>'add_ts_client_site',
//		'uri'=>$uri,'survey_bts_distances'=>Survey_bts_distance::get_bts($uri['id']),
//		'survey_client_distance'=>Survey_client_distance::get_distance($uri['id']),
//		'site_id'=>(isset($uri['id']))?$uri['id']:'',
//		'survey_materials'=>Survey_material::get_material_by_site($uri['id']),
//		'survey_devices'=>Survey_device::get_device_by_site($uri['id']),
//		);
//		switch ($uri['type']){
//			case 'edit':
//				$site = new Survey_site();
//				$site->where('id',$uri['id'])->get();
//				$data['address'] = $site->address;
//				$data['city'] = $site->city;
//				$data['phone_area'] = $site->phone_area;
//				$data['phone'] = $site->phone;
//				$data['pic'] = $site->pic;
//				$data['pic_position'] = $site->pic_position;
//				$data['location_e_degree'] = $site->location_e_degree;
//				$data['location_e_minute'] = $site->location_e_minute;
//				$data['location_e_second'] = $site->location_e_second;
//				$data['location_s_degree'] = $site->location_s_degree;
//				$data['location_s_minute'] = $site->location_s_minute;
//				$data['location_s_second'] = $site->location_s_second;
//				$data['elevation_ground'] = $site->elevation_ground;
//				$data['elevation_rooftop'] = $site->elevation_rooftop;
//				$data['bearing'] = $site->bearing;
//				$data['leg_dist'] = $site->leg_dist;
//				$data['leg_course'] = $site->leg_course;
////				$data['textresume'] = $site->longresume;
//				$data['amsl'] = $site->amsl;
//				$data['agl'] = $site->agl;
//				$data['images'] = Survey_image::get_image_by_site($uri['id']);
//				break;
//		}
//		$this->load->view('common/backendindex',$data);
//	}
//	
//	function add_ts_client_site_handler(){
//		$params = $this->input->post();
//		$site = new Survey_site();
//		$site->where('id',$params['survey_id'])->update(array(
//		'location_e_degree'=>$params['location_e_degree'],
//		'location_e_minute'=>$params['location_e_minute'],
//		'location_e_second'=>$params['location_e_second'],
//		'location_s_degree'=>$params['location_s_degree'],
//		'location_s_minute'=>$params['location_s_minute'],
//		'location_s_second'=>$params['location_s_second'],
//		'elevation_ground'=>$params['elevation_ground'],
//		'elevation_rooftop'=>$params['elevation_rooftop'],
//		'bearing'=>$params['bearing'],
//		'leg_dist'=>$params['leg_dist'],
//		'leg_course'=>$params['leg_course'],
//		'amsl'=>$params['amsl'],
//		'agl'=>$params['agl'],
////		'longresume'=>$params['textresume'],
//		));
//		if(isset($params['save'])){
//			redirect(base_url() . 'index.php/survey_requests/entry_ts_survey_request/type/edit/id/' . $params['survey_id']);
//		}
//		if(isset($params['add_bts'])){
//			redirect(base_url() . 'index.php/back_end/add_bts/type/add/site_id/' . $params['site_id'] . '/survey_id/' . $params['survey_id']);
//		}
//		if(isset($params['remove_bts'])){
//			if(isset($params['distance'])){
//				Survey_bts_distance::remove_by_id($params['distance']);
//			}
//			redirect(base_url() . 'index.php/back_end/add_ts_client_site/type/edit/survey_id/' . $params['survey_id'] . '/id/' . $params['site_id']);
//		}
//		
//		if(isset($params['add_pelanggan'])){
//			redirect(base_url() . 'index.php/back_end/add_survey_client/type/add/site_id/' . $params['site_id'] . '/survey_id/' . $params['survey_id']);
//		}
//		
//		if(isset($params['remove_pelanggan'])){
//			$distance = implode(',', $params['distance']);
//			$query = 'delete from survey_client_distances where id in (' . $distance . ')';
//			$result = $this->db->query($query);
//			redirect(base_url() . 'index.php/back_end/add_ts_client_site/type/edit/survey_id/' . $params['survey_id'] . '/id/' . $params['site_id']);
//		}
//		
//		if(isset($params['add_foto'])){
//			redirect(base_url() . 'index.php/back_end/add_foto/survey_id/' . $params['survey_id'] . '/id/' . $params['site_id']);
//		}
//		if(isset($params['add_material'])){
//			redirect(base_url() . 'index.php/back_end/add_survey_material/type/add/survey_id/' . $params['survey_id'] . '/site_id/' . $params['site_id']);
//		}
//		if(isset($params['add_device'])){
//			redirect(base_url() . 'index.php/back_end/add_survey_device/type/add/survey_id/' . $params['survey_id'] . '/site_id/' . $params['site_id']);
//		}
//		if(isset($params['remove_foto'])){
//			$img_str = implode('","',$params['image']);
//			$query = 'delete from survey_images where name in ("' . $img_str . '")';
//			$rst = $this->db->query($query);
//			foreach ($params['image'] as $img){
//				copy('./media/surveys_used/' . $img, './media/surveys/' . $img);
//				unlink('./media/surveys_used/' . $img);
//			}
//			redirect(base_url() . 'index.php/back_end/add_ts_client_site/type/edit/survey_id/' . $params['survey_id'] . '/id/' . $params['site_id']);
//		}
//	}
//	
	function add_survey_client(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array(
		'view_data'=>'add_survey_client',
		'survey_id'=>$uri['survey_id'],'site_id'=>$uri['site_id'],
		'clients'=>Client::get_combo_data(),
		);
		switch ($uri['type']){
			case 'add':
				$data['client'] = 1;
				$data['distance'] = '';
				break;
			case 'edit':
				$data['client'] = 1;
				$data['distance'] = '';
				break;
		}
		$this->load->view('common/backendindex',$data);
	}
	
	function add_survey_client_handler(){
		$params = $this->input->post();
		$client = new Survey_client_distance();
		$client->site_id = $params['site_id'];
		$client->client_id = $params['client'];
		$client->distance = $params['distance'];
		$client->user_name = $this->session->userdata['username'];
		$client->save();
		redirect(base_url() . 'index.php/back_end/add_ts_client_site/type/edit/survey_id/' . $params['survey_id'] . '/id/' . $params['site_id']);
	}
	
//	function add_foto(){
//		$this->check_authentication();
//		$uri = $this->uri->uri_to_assoc();
//		$data = array(
//		'view_data'=>'add_foto',
////		'files'=>get_dir_file_info('./media',true),
//		'files'=>get_filenames('./media/surveys'),
//		'survey_id'=>$uri['survey_id'],'id'=>$uri['id']
//		);
//		$this->load->view('common/backendindex',$data);
//	}
//	
//	
//	function add_foto_handler(){
//		$params = $this->input->post();
//		$upload_config['upload_path']	=	'./media/surveys';
//		$upload_config['allowed_types']	=	'jpg|jpeg|gif|png';
//		$upload_config['max_size']		=	'1024';
//		$upload_config['max_width']		=	'1024';
//		$upload_config['max_height']	=	'768';
//		$this->load->library('upload',$upload_config);
//		if(!$this->upload->do_upload())
//		{
//			echo 'error';
//		}
//		else 
//		{
//			$upload_data = $this->upload->data();
//			$img['image_library'] = 'gd2';
//			$img['source_image'] = './media/surveys/' . $upload_data['orig_name'];
//			$img['width'] =300;
//			$img['height'] =300;
//			$img['maintain_ratio'] = FALSE;
//			$this->load->library('image_lib',$img);
//			$this->image_lib->resize();
//			redirect(base_url() . 'index.php/back_end/add_foto/survey_id/' . $params['survey_id'] . '/id/' . $params['id']);
//		}
//		
//	}
//	
//	function remove_foto(){
//		$uri = $this->uri->uri_to_assoc();
//		unlink('./media/surveys/' . $uri['name']);
//		redirect(base_url() . 'index.php/back_end/add_foto/survey_id/' . $uri['survey_id'] . '/id/' . $uri['id']);
//	}
//	
//	function use_foto(){
//		$uri = $this->uri->uri_to_assoc();
//		$image = new Survey_image();
//		$image->survey_site_id = $uri['id'];
//		$image->name = $uri['name'];
//		$image->path = './media/surveys/' . $uri['name'];
//		$image->user_name = $this->session->userdata['username'];
//		$image->save();
//		copy('./media/surveys/' . $uri['name'], './media/surveys_used/' . $uri['name']);
//		unlink('./media/surveys/' . $uri['name']);
//		redirect(base_url() . 'index.php/back_end/add_foto/survey_id/' . $uri['survey_id'] . '/id/' . $uri['id']);
//		
//	}
//		
	function add_survey_material(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array(
		'pipe'=>TRUE,
		'view_data'=>'add_survey_material','survey_id'=>$uri['survey_id'],
		'btses'=>Pbtstower::get_combo_data(),
		'bts'=>0,
		'type'=>$uri['type'],'site_id'=>$uri['site_id'],'survey_id'=>$uri['survey_id'],
		'los'=>TRUE,'aps'=>Ap::get_name_combo_data(),'ap'=>0,
		);
		switch ($uri['type']){
			case 'add':
				$data['pipe_length'] = '';
				$data['cable_length'] = '';
				$data['pangkon_amount'] = '';
				$data['besi_siku_amount'] = '';
				$data['klem_amount'] = '';
				$data['sling_amount'] = '';
				$data['ground_rod_amount'] = '';
				$data['kabel_nya_amount'] = '';
				$data['spitter_amount'] = '';
				$data['cable_duct_amount'] = '';
				$data['pipa_klip_sal_amount'] = '';
				
				break;
			case 'edit':
				$material = Survey_material::get_material_array_by_site($uri['site_id']);
				$data['pipe_length'] = $material['Pipa'];
				$data['cable_length'] = $material['Kabel'];
				$data['pangkon_amount'] = $material['Pangkon'];
				$data['besi_siku_amount'] = $material['Besi siku'];
				$data['klem_amount'] = $material['Klem'];
				$data['sling_amount'] = $material['Sling'];
				$data['ground_rod_amount'] = $material['Ground Rod'];
				$data['kabel_nya_amount'] = $material['Kable NYA'];
				$data['spitter_amount'] = $material['Spitter'];
				$data['cable_duct_amount'] = $material['Cable duct'];
				$data['pipa_klip_sal_amount'] = $material['Pipa klip sal'];
				break;
		}
		$this->load->view('common/backendindex',$data);
		
	}

	function add_survey_material_handler(){
		$material = new Survey_material();
		$params = $this->input->post();
		switch ($params['type']){
			case 'add':
				if(isset($params[pipe])){
					if($params[pipe]=='Triangle tower'){
						
						$material = new Survey_material();
						$material->survey_site_id = $params['site_id'];
						$material->name = 'Triangle tower';
						$material->amount = $params['pipe_length'];
						$material->save();
					}
					else{
						$material = new Survey_material();
						$material->survey_site_id = $params['site_id'];
						$material->name = 'Pipa';
						$material->amount = $params['pipe_length'];
						$material->save();
					}
				}
				
				
				$material = new Survey_material();
				$material->survey_site_id = $params['site_id'];
				$material->name = 'Kabel';
				$material->amount = $params['cable_length'];
				$material->save();
				
				$material = new Survey_material();
				$material->survey_site_id = $params['site_id'];
				$material->name = 'Pangkon';
				$material->amount = $params['pangkon_amount'];
				$material->save();
				
				$material = new Survey_material();
				$material->survey_site_id = $params['site_id'];
				$material->name = 'Besi siku';
				$material->amount = $params['besi_siku_amount'];
				$material->save();

				$material = new Survey_material();
				$material->survey_site_id = $params['site_id'];
				$material->name = 'Klem';
				$material->amount = $params['klem_amount'];
				$material->save();

				$material = new Survey_material();
				$material->survey_site_id = $params['site_id'];
				$material->name = 'Sling';
				$material->amount = $params['sling_amount'];
				$material->save();
				
				$material = new Survey_material();
				$material->survey_site_id = $params['site_id'];
				$material->name = 'Ground Rod';
				$material->amount = $params['ground_rod_amount'];
				$material->save();
				
				$material = new Survey_material();
				$material->survey_site_id = $params['site_id'];
				$material->name = 'Kable NYA';
				$material->amount = $params['kabel_nya_amount'];
				$material->save();
				
				$material = new Survey_material();
				$material->survey_site_id = $params['site_id'];
				$material->name = 'Spitter';
				$material->amount = $params['spitter_amount'];
				$material->save();
				
				$material = new Survey_material();
				$material->survey_site_id = $params['site_id'];
				$material->name = 'Cable duct';
				$material->amount = $params['cable_duct_amount'];
				$material->save();
				
				$material = new Survey_material();
				$material->survey_site_id = $params['site_id'];
				$material->name = 'Pipa klip sal';
				$material->amount = $params['pipa_clip_sal_amount'];
				$material->save();
				
				break;
			case 'edit':
				$material->where('survey_site_id',$params['site_id'])->where('name','Pipa')->update(
				array(
				'amount'=>$params['pipe_length']
				));

				
				$material = new Survey_material();
				$material->where('survey_site_id',$params['site_id'])->where('name','Kabel')->update(
				array(
				'amount'=>$params['cable_length']
				));
				
				$material = new Survey_material();
				$material->where('survey_site_id',$params['site_id'])->where('name','Pangkon')->update(
				array(
				'amount'=>$params['pangkon_amount']
				));
				
				$material = new Survey_material();
				$material->where('survey_site_id',$params['site_id'])->where('name','Besi siku')->update(
				array(
				'amount'=>$params['besi_siku_amount']
				));
				

				$material = new Survey_material();
				$material->where('survey_site_id',$params['site_id'])->where('name','Klem')->update(
				array(
				'amount'=>$params['klem_amount']
				));
				

				$material = new Survey_material();
				$material->where('survey_site_id',$params['site_id'])->where('name','Sling')->update(
				array(
				'amount'=>$params['sling_amount']
				));
				
				
				$material = new Survey_material();
				$material->where('survey_site_id',$params['site_id'])->where('name','Ground Rod')->update(
				array(
				'amount'=>$params['ground_rod_amount']
				));
				
				$material = new Survey_material();
				$material->where('survey_site_id',$params['site_id'])->where('name','Kable NYA')->update(
				array(
				'amount'=>$params['kabel_nya_amount']
				));
				
				$material = new Survey_material();
				$material->where('survey_site_id',$params['site_id'])->where('name','Spitter')->update(
				array(
				'amount'=>$params['spitter_amount']
				));
				
				$material = new Survey_material();
				$material->where('survey_site_id',$params['site_id'])->where('name','Cable duct')->update(
				array(
				'amount'=>$params['cable_duct_amount']
				));
				
				$material = new Survey_material();
				$material->where('survey_site_id',$params['site_id'])->where('name','Pipa klip sal')->update(
				array(
				'amount'=>$params['pipa_clip_sal_amount']
				));
				echo $material->check_last_query();
				
				break;
		}
		redirect('survey_sites/add_ts_client_site/type/edit/survey_id/' . $params['survey_id'] . '/id/' . $params['site_id']);
	}

	function add_survey_device(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array('view_data'=>'add_survey_device','site_id'=>$uri['site_id'],'survey_id'=>$uri['survey_id']);
		switch ($uri['type']){
			case 'add':
				$data['type'] = 'add';
				$data['antenna_status'] = 'dipinjamkan';
				$data['antenna_amount'] = '';
				$data['radio_status'] = 'dipinjamkan';
				$data['radio_amount'] = '';
				$data['pccard_status'] = 'dipinjamkan';
				$data['pccard_amount'] = '';
				$data['pigtail_status'] = 'dipinjamkan';
				$data['pigtail_amount'] = '';
				$data['jumper_status'] = 'dipinjamkan';
				$data['jumper_amount'] = '';
				$data['outdoorbox_status'] = 'dipinjamkan';
				$data['outdoorbox_amount'] = '';
				$data['adaptor_status'] = 'dipinjamkan';
				$data['adaptor_amount'] = '';
				$data['poe_status'] = 'dipinjamkan';
				$data['poe_amount'] = '';
				$data['surgeprotector_status'] = 'dipinjamkan';
				$data['surgeprotector_amount'] = '';
				$data['router_status'] = 'dipinjamkan';
				$data['router_amount'] = '';
				$data['bwmanagement_status'] = 'dipinjamkan';
				$data['bwmanagement_amount'] = '';
				$data['switch_status'] = 'dipinjamkan';
				$data['switch_amount'] = '';
				$data['ups_status'] = 'dipinjamkan';
				$data['ups_amount'] = '';
				$data['stavolt_status'] = 'dipinjamkan';
				$data['stavolt_amount'] = '';
				$data['apwifiindoors_status'] = 'dipinjamkan';
				$data['apwifiindoors_amount'] = '';
				break;
			case 'edit':
				$data['type'] = 'edit';
				$data['antenna_status'] = $device['antenna_status'];
				$data['antenna_amount'] = $device['antenna_amount'];
				$data['radio_status'] = $device['radio_status'];
				$data['radio_amount'] = $device['radio_amount'];
				$data['pccard_status'] = $device['pccard_status'];
				$data['pccard_amount'] = $device['pccard_amount'];
				$data['pigtail_status'] = $device['pigtail_status'];
				$data['pigtail_amount'] = $device['pigtail_amount'];
				$data['jumper_status'] = $device['jumper_status'];
				$data['jumper_amount'] = $device['jumper_amount'];
				$data['outdoorbox_status'] = $device['outdoorbox_status'];
				$data['outdoorbox_amount'] = $device['outdoorbox_amount'];
				$data['adaptor_status'] = $device['adaptor_status'];
				$data['adaptor_amount'] = $device['adaptor_amount'];
				$data['poe_status'] = $device['poe_status'];
				$data['poe_amount'] = $device['poe_amount'];
				$data['surgeprotector_status'] = $device['surgeprotector_status'];
				$data['surgeprotector_amount'] = $device['surgeprotector_amount'];
				$data['router_status'] = $device['router_status'];
				$data['router_amount'] = $device['router_amount'];
				$data['bwmanagement_status'] = $device['bwmanagement_status'];
				$data['bwmanagement_amount'] = $device['bwmanagement_amount'];
				$data['switch_status'] = $device['switch_status'];
				$data['switch_amount'] = $device['switch_amount'];
				$data['ups_status'] = $device['ups_status'];
				$data['ups_amount'] = $device['ups_amount'];
				$data['stavolt_status'] = $device['stavolt_status'];
				$data['stavolt_amount'] = $device['stavolt_amount'];
				$data['apwifiindoors_status'] = $device['apwifiindoors_status'];
				$data['apwifiindoors_amount'] = $device['apwifiindoors_amount'];
				break;
		}
		$this->load->view('common/backendindex',$data);
	}

	function add_survey_device_handler(){
		$params = $this->input->post();
		switch ($params['type']){
			case 'add':
				$device = new Survey_device();
				$device->name = 'Antenna';
				$device->survey_site_id = $params['site_id'];
				$device->status = $params['antenna_status'];
				$device->amount = $params['antenna_amount'];
				$device->save();
				$device = new Survey_device();
				$device->name = 'Radio';
				$device->survey_site_id = $params['site_id'];
				$device->status = $params['radio_status'];
				$device->amount = $params['radio_amount'];
				$device->save();
				$device = new Survey_device();
				$device->name = 'PC Card';
				$device->survey_site_id = $params['site_id'];
				$device->status = $params['pccard_status'];
				$device->amount = $params['pccard_amount'];
				$device->save();
				$device = new Survey_device();
				$device->name = 'Pig tail';
				$device->survey_site_id = $params['site_id'];
				$device->status = $params['pigtail_status'];
				$device->amount = $params['pigtail_amount'];
				$device->save();
				$device = new Survey_device();
				$device->name = 'Jumper';
				$device->survey_site_id = $params['site_id'];
				$device->status = $params['jumper_status'];
				$device->amount = $params['jumper_amount'];
				$device->save();
				$device = new Survey_device();
				$device->name = 'Outdoor box';
				$device->survey_site_id = $params['site_id'];
				$device->status = $params['outdoorbox_status'];
				$device->amount = $params['outdoorbox_amount'];
				$device->save();
				$device = new Survey_device();
				$device->name = 'Adaptor';
				$device->survey_site_id = $params['site_id'];
				$device->status = $params['adaptor_status'];
				$device->amount = $params['adaptor_amount'];
				$device->save();
				$device = new Survey_device();
				$device->name = 'PoE';
				$device->survey_site_id = $params['site_id'];
				$device->status = $params['poe_status'];
				$device->amount = $params['poe_amount'];
				$device->save();
				$device = new Survey_device();				
				$device->name = 'Surge Protector';
				$device->survey_site_id = $params['site_id'];
				$device->status = $params['surgeprotector_status'];
				$device->amount = $params['surgeprotector_amount'];
				$device->save();
				$device = new Survey_device();				
				$device->name = 'Router';
				$device->survey_site_id = $params['site_id'];
				$device->status = $params['router_status'];
				$device->amount = $params['router_amount'];
				$device->save();
				$device = new Survey_device();				
				$device->name = 'BW Management';
				$device->survey_site_id = $params['site_id'];
				$device->status = $params['bwmanagement_status'];
				$device->amount = $params['bwmanagement_amount'];
				$device->save();
				$device = new Survey_device();				
				$device->name = 'Switch';
				$device->survey_site_id = $params['site_id'];
				$device->status = $params['switch_status'];
				$device->amount = $params['switch_amount'];
				$device->save();
				$device = new Survey_device();				
				$device->name = 'UPS';
				$device->survey_site_id = $params['site_id'];
				$device->status = $params['ups_status'];
				$device->amount = $params['ups_amount'];
				$device->save();
				$device = new Survey_device();				
				$device->name = 'Stavolt';
				$device->survey_site_id = $params['site_id'];
				$device->status = $params['stavolt_status'];
				$device->amount = $params['stavolt_amount'];
				$device->save();
				$device = new Survey_device();				
				$device->name = 'AP Wifi Indoors';
				$device->survey_site_id = $params['site_id'];
				$device->status = $params['apwifiindoors_status'];
				$device->amount = $params['apwifiindoors_amount'];
				$device->save();
		}
		redirect(base_url() . 'index.php/back_end/add_ts_client_site/type/edit/survey_id/' . $params['survey_id'] . '/id/' . $params['site_id']);
	}
	
	function add_bts(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array(
		'view_data'=>'add_bts','survey_id'=>$uri['survey_id'],
		'btses'=>Pbtstower::get_combo_data(),
		'bts'=>0,
		'type'=>$uri['type'],'site_id'=>$uri['site_id'],
		'los'=>TRUE,'aps'=>Ap::get_name_combo_data(),'ap'=>0,
		);
		$this->load->view('common/backendindex',$data);
	}
	
	function add_bts_handler(){
		$params = $this->input->post();
		if(isset($params['save_x'])){
		$bts = new Survey_bts_distance();
		$bts->survey_site_id = $params['site_id'];
		$bts->btstower_id = $params['bts'];
		$bts->distance = $params['distance'];
		$bts->los = $params['losnlos'];
		$bts->ap = $params['ap'];
		$bts->user_name = $this->session->userdata['username'];
		$bts->save();
		}
		redirect(base_url() . 'index.php/back_end/add_ts_client_site/type/edit/survey_id/' . $params['survey_id'] . '/id/' . $params['site_id']);
	}
	
	function get_aps(){
		$aps = Ap::get_name_by_bts($_GET['bts_id']);
		$arr = array();
		foreach ($aps as $x=>$y){
			array_push($arr, '"' . $x . '":"' . $y . '"');
		}
		
		echo '{' . implode($arr,",") . '}';
	}
/****/	
	
	function survey_report(){
		$survey = new Survey_request();
		$survey->where('id',22)->get();
		$sites = new Survey_site();
		$sites->where('survey_id',$survey->id)->get();
		$surveyor = new Survey_surveyor();
		$surveyor->where('survey_id',$survey->id)->get();
		$data = array(
		'client'=>$survey->client->name,
		'business_type'=>$survey->client->business_field,
		'sites'=>$sites,'survey_date'=>$survey->survey_date,
		'surveyors'=>Survey_surveyor::get_names_by_survey_id($survey->id),
		);
		$this->load->view('survey_report',$data);
	}
	
	
	
	
	
	
	
	function show_surveys(){
		$this->check_authentication();
		$obj = new Survey();
		$this->show_object($obj, 'surveys','surveys','survey_date');
	}
	
	function entry_survey(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array('view_data'=>'entry_survey');
		switch($uri['type']){
			case 'add':
				$day=(isset($uri['day']))?$uri['day']:'1';
				$month = (isset($uri['month']))?$uri['month']:'1';
				$year = (isset($uri['year']))?$uri['year']:date('y',now());
				$data['id'] = '';
				$data['survey_requests'] = Survey_request::get_client_combo_data();//Client::get_combo_data();
				$data['survey_request'] = 0;
				$data['survey_date'] = $day . '/' . $month . '/' . $year;
				$data['type'] = 'add';
				$data['surveyors'] = User::get_user_by_group('ts');
				$data['gps_datas'] = array();
				$data['bts_distances'] = array();
				$data['neighbour_distances'] = array();
				$data['materials'] = array();
				$data['devices'] = array();
				$data['problem'] = '';
				$data['conclusion'] = '';
				$data['sites'] = array();
				break;
			case 'edit':
				$obj = new Survey();
				$obj->where('id',$uri['id'])->get();
				$survey_date = $obj->survey_date;
				$date_part = Common::longsql_to_datepart($survey_date);
				$data['id'] = $obj->id;
				$data['survey_requests'] = Survey_request::get_client_combo_data(); //Client::get_combo_data();
				$data['survey_request'] = $obj->survey_request_id;
				$data['survey_date'] = $date_part['day'] . '/' . $date_part['month'] . '/' . $date_part['year'] ;
				$data['survey_date'].= ' ' . $date_part['hour'] . ':' . $date_part['minute'] . ':' . $date_part['second'] ;
				$data['type'] = 'edit';
				$data['surveyors'] = User::get_user_by_group('surveyor');
				$data['gps_datas'] = Survey_gps_data::get_gps_data($uri['id']);
				$data['bts_distances'] = array();
				$data['devices'] = array();
				$data['neighbour_distances'] = array();
				$data['materials'] = array();
				$data['problem'] = $obj->problems;
				$data['conclusion'] = $obj->conclusion;
				$data['sites'] = Survey_site::get_survey_sites($uri['id']);
				break;
		}
		$this->load->view('common/backendindex',$data);
	}
	
	function entry_survey_handler(){
		$this->check_authentication();
		$params = $this->input->post();
		if(isset($params['cancel_x'])){
			redirect(base_url() . 'index.php/back_end/show_surveys/page');
		}
		$survey_date = $params['survey_date'];// . ' ' . $params['hour'] . ':' . $params['minute'] . ':' . '00';
		$date_part = Common::longhuman_to_datepart($survey_date);
		$active = (isset($params['active']))?'1':'0';
		$covering_letter = (isset($params['covering_letter']))?'1':'0';
		$survey = new Survey();
		switch ($params['type']){
			case 'add':
				$this->access_log->insert_log('Entry survey type (' . $params['clients'] . ')');
				$survey->survey_id = $params['survey_id'];
				$survey->survey_date = $this->common->longhuman_to_sql_date($survey_date);
				$survey->survey_request_id = $params['survey_request'];
//				$survey->surat_ijin = $params['surat_ijin'];
				$survey->problems = $params['problem'];
				$survey->conclusion = $params['conclusion'];
				$survey->user_name = $this->session->userdata['username'];
				$survey->save();
				$id = mysql_insert_id();
				break;
			case 'edit':
				$survey->where('id',$params['id'])->update(array(
				'survey_date'=>$this->common->longhuman_to_sql_date($survey_date),
				'survey_request_id'=>$params['survey_request'],
//				'surat_ijin'=>$params['surat_ijin'],
				'problems'=>$params['problem'],
				'conclusion'=>$params['conclusion'],
				));
				$id=$params['id'];
				break;
		}

		if(isset($params['save_x'])){
				redirect(base_url() . 'index.php/back_end/show_surveys/page');
		}
		if(isset($params['add_site'])){
			redirect(base_url() . 'index.php/back_end/add_site/type/add/survey_id/' . $id . '/page');
		}
		
	}
	
//	function add_site(){
//		$this->check_authentication();
//		$uri = $this->uri->uri_to_assoc();
//		$data = array(
//		'view_data'=>'add_site',
//		'type'=>$uri['type'],
//		'id'=>(isset($uri['id']))?$uri['id']:'',
//		'survey_id'=>$uri['survey_id'],
//		);
//		switch ($uri['type']){
//			case 'edit':
//				$survey_site = new Survey_site();
//				$survey_site->where('id',$uri['id'])->get();
//				$data['address'] = $survey_site->address;
//				$data['bearing'] = $survey_site->bearing;
//				$data['leg_course'] = $survey_site->leg_course;
//				$data['leg_dist'] = $survey_site->leg_dist;
//				$data['amsl'] = $survey_site->amsl;
//				$data['agl'] = $survey_site->agl;
//				$data['elevation_rooftop'] = $survey_site->elevation_rooftop;
//				$data['elevation_ground'] = $survey_site->elevation_ground;
//				$data['location_e_degree'] = $survey_site->location_e_degree;
//				$data['location_e_minute'] = $survey_site->location_e_minute;
//				$data['location_e_second'] = $survey_site->location_e_second;
//				$data['location_s_degree'] = $survey_site->location_s_degree;
//				$data['location_s_minute'] = $survey_site->location_s_minute;
//				$data['location_s_second'] = $survey_site->location_s_second;
//				
//				break;
//			case 'add':
//				$data['address'] = '';
//				$data['bearing'] = '';
//				$data['leg_course'] = '';
//				$data['leg_dist'] = '';
//				$data['amsl'] = '';
//				$data['agl'] = '';
//				$data['elevation_rooftop'] = '';
//				$data['elevation_ground'] = '';
//				$data['location_e_degree'] = '';
//				$data['location_e_minute'] = '';
//				$data['location_e_second'] = '';
//				$data['location_s_degree'] = '';
//				$data['location_s_minute'] = '';
//				$data['location_s_second'] = '';
//				break;
//		}
//		$data['surveyors'] = User::get_user_by_group('surveyor');
//		$data['gps_datas'] = array();
//		$data['bts_distances'] = array();
//		$data['neighbour_distances'] = array();
//		$data['devices'] = array();
//		$data['materials'] = array();
//		$data['survey_date'] = '2012-10-20 12:23:22';
//		$data['distance'] = '';		
////		$data['gps_datas'] = Survey_gps_data::get_gps_data($uri['id']);
//		$this->load->view('index.php',$data);
//	}
//	
//	function add_site_handler(){
//		$this->check_authentication();
//		$params = $this->input->post();
//		echo 'Type ' . $params['type'];
//		$survey_site = new Survey_site();
//		switch ($params['type']){
//			case 'add':
//				$survey_site->survey_id = $params['survey_id'];
//				$survey_site->address = $params['address'];
//				$survey_site->location_s_degree = $params['location_s_degree'];
//				$survey_site->location_s_minute = $params['location_s_minute'];
//				$survey_site->location_s_second = $params['location_s_second'];
//				
//				$survey_site->location_e_degree = $params['location_e_degree'];
//				$survey_site->location_e_minute = $params['location_e_minute'];
//				$survey_site->location_e_second = $params['location_e_second'];
//				$survey_site->elevation_rooftop = $params['elevation_rooftop'];
//				$survey_site->elevation_ground = $params['elevation_ground'];
//				$survey_site->bearing = $params['bearing'];
//				$survey_site->leg_course = $params['leg_course'];
//				$survey_site->leg_dist = $params['leg_dist'];
//				$survey_site->amsl = $params['amsl'];
//				$survey_site->agl = $params['agl'];
//				$survey_site->save();
//				
//				break;
//			case 'edit':
//				$survey_site->where('id',$params['id'])->update(array(
//				'address'=>$params['address'],
//				'location_e_degree'=>$params['location_e_degree'],
//				'location_e_minute'=>$params['location_e_minute'],
//				'location_e_second'=>$params['location_e_second'],
//				'location_s_degree'=>$params['location_s_degree'],
//				'location_s_minute'=>$params['location_s_minute'],
//				'location_s_second'=>$params['location_s_second'],
//				'elevation_rooftop'=>$params['elevation_rooftop'],
//				'elevation_ground'=>$params['elevation_ground'],
//				'bearing'=>$params['bearing'],
//				'leg_course'=>$params['leg_course'],
//				'leg_dist'=>$params['leg_dist'],
//				'amsl'=>$params['amsl'],
//				'agl'=>$params['agl'],
//				)
//				);
//				break;
//		}
////		echo $survey_site->check_last_query();
//		redirect(base_url() . 'index.php/back_end/entry_survey/type/edit/id/' . $params['survey_id']);
//	}
	
	function entry_survey_gps_data(){
		$this->check_authentication();
		$data = array(
		'view_data'=>'entry_survey_gps_data',
		'address'=>'',
		'location'=>'','elevation'=>'','bearing'=>'','leg_course'=>'','leg_dist'=>'','amsl'=>'',
		'agl'=>'','type'=>'add','id'=>''
		);
		$this->load->view('index.php',$data);
	}
	
	function entry_survey_gps_data_handler(){
		$this->check_authentication();
		redirect(base_url() . 'index.php/back_end/entry_survey/type/add');
	}
	
	function entry_survey_bts_distance(){
		$this->check_authentication();
		$data = array(
		'view_data'=>'entry_survey_bts_distance',
		'type'=>'add','id'=>0,
		'btses'=>Bts::get_combo_data(),'bts'=>0,
		'distance'=>'','los'=>'','nlos'=>'','ap'=>'',
		);
		$this->load->view('index.php',$data);
	}
	
	function entry_survey_bts_distance_handler(){
		$this->check_authentication();
		redirect(base_url() . 'index.php/back_end/entry_survey/type/add');
	}
	
	function entry_survey_neighbour_distance(){
		$this->check_authentication();
		$data = array('view_data'=>'entry_survey_neighbour_distance');
		$this->load->view('index.php',$data);
	}
	
	function entry_survey_neighbour_distance_handler(){
		$this->check_authentication();
		redirect(base_url() . 'index.php/back_end/entry_survey/type/add/');
	}
	
	function entry_survey_device(){
		$this->check_authentication();
		$data = array('view_data'=>'entry_survey_device');
		$this->load->view('index.php',$data);
	}
	
	function entry_survey_device_handler(){
		redirect(base_url() . 'index.php/back_end/entry_survey/type/add/');
	}
	
	function entry_survey_material(){
		$data = array('view_data'=>'entry_survey_material');
		$this->load->view('index.php',$data);
	}
	
	function entry_survey_material_handler(){
		redirect(base_url() . 'index.php/back_end/entry_survey/type/add/');
	}
	
	function survey_detail(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array(
		'view_data'=>'survey_request_detail',
		'client_sites'=>Client_site::get_client_sites_by_survey_request($uri['id']),
		'survey_request'=>Survey_request::get_survey_request_by_id($uri['id']),
		);
		$this->load->view('common/backendindex',$data);
	}
	
	function survey_handler(){
		$this->check_authentication();
		$params = $this->input->post();
		if(isset($params['btn_cari'])){
			$client_data = array('survey_src'=>$params['cari']);
			$this->session->set_userdata($survey_data);
			redirect(base_url() . 'index.php/back_end/show_surveys/page');
		}
		if(isset($params['remove_x'])){
			if(isset($params['id'])){
				$data['view_data'] = 'confirmation';
				$items = implode(',',$params['id']);
				$data['action'] = base_url() . 'index.php/back_end/survey_execute';
				$data['query'] = 'delete from surveys where id in (' . $items . ')';
				$data['message'] = 'Apakah akan menghapus item no ' . $items . ' ?';
				$this->load->view('common/backendindex',$data);
			}
		}
	}
	
	function survey_execute(){
		$this->execute_action('surveys', base_url() . 'index.php/back_end/show_surveys/page');
	}
	
	
	function show_about(){
		$this->check_authentication();
		$about = new About();
		$about->get();
		$data = array(
			'subject'=>$about->subject,
			'content'=>$about->content,
			'view_data'=>'about'
		);
		$this->load->view('common/backendindex',$data);
	}
	
	function about_handler(){
		$this->check_authentication();
		$params = $this->input->post();
		if(isset($params['save_x'])){
			$this->access_log->insert_log('Edit about us');
			$about = new About();
			$about->update(array(
				'subject'=>$params['subject'],
				'content'=>$params['front_page']));
		}
		redirect(base_url() . 'index.php/back_end/show_about');
	}
	
	
	function show_user_management(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$users = new User();
//		$this->show_object($users, 'user_management', 'users');
		$page_conf = $this->common->get_simple_pagination_conf('users');
		$total = $users->count(); 	
		$users->get($page_conf['per_page'],$uri['page']);
		$page_conf['total_rows'] = $total;
		$this->pagination->initialize($page_conf);
		
		$data = array(
			'view_data'=>'user_management','users'=>$users,'total'=>$total
		);
		$this->load->view('common/backendindex',$data);
	}
	
	function entry_user(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array(
			'view_data'=>'entry_user','groups' => Group::get_groups(),'alert'=>''
		);
		switch($uri['type']){
			case 'add':
				$data['id'] = '';
				$data['name'] = '';
				$data['email'] = '';
				$data['password'] = '';
				$data['group'] = '1';
				$data['type'] = 'add';
				$data['aktif'] = TRUE;
				break;
			case 'edit':
				$user = new User();
				$user->where('id',$uri['id'])->get();
				$data['id'] = $user->id;
				$data['name'] = $user->username;
				$data['group'] = $user->group_id;
				$data['email'] = $user->email;
				$data['password'] = $user->password;
				$data['type'] = 'edit';
				$data['aktif'] = ($user->status=='1')?TRUE:FALSE;
				$data['members'] = $user->user;
				break;
		}
		$this->load->view('common/backendindex',$data);
	}
	
	function entry_user_handler(){
		$this->check_authentication();
		$params = $this->input->post();
		if(isset($params['save_x'])){
			$aktif = (isset($params['aktif']))?'1':'0';
			$user = new User();
			switch ($params['type']){
				case 'add':
					$this->auth->create_custom_user($params['username'],$params['password'],$params['email'],$params['group']);
					$this->access_log->insert_log('Create user ' . $params['username'] . '(' . $params['email'] . ')');
					redirect(base_url() . 'index.php/back_end/show_user_management/page');
					break;
				case 'edit':
					$user->where('id',$params['id'])->update(array(
						'username'=>$params['username'],
						'email'=>$params['email'],
						'group_id'=>$params['group'],
						'status'=>$params['aktif']));
					$this->access_log->insert_log('Edit User ' . $params['username'] . '(' . $params['email'] . ')');
					if($params['password']!=''){
						$user = new User();
						$user->where('id',$params['id'])->get();
						if($params['password']==$params['password2']){
							$this->auth->change_password_user($params['password'],$params['id'],$user->salt);
							$this->access_log->insert_log('Change password ' . $params['username'] . '(' . $params['email'] . ')');
							redirect(base_url() . 'index.php/back_end/show_user_management/page');
						}
						else 
						{
							$groups = new Group();
							$groups->get();
							$data = array(
							'view_data'=>'entry_user','groups'=>$groups->get_groups(),'alert'=>'Password not match',
							'type'=>'edit','id'=>$user->id,'name'=>$user->username,'email'=>$user->email,'group'=>$user->group,
							'aktif'=>($user->status=='1')?TRUE:FALSE
							);
							$this->access_log->insert_log('Error change password ' . $params['username'] . '(' . $params['email'] . ')');
							$this->load->view('common/backendindex',$data);
						}
					}
					else 
					{
						redirect(base_url() . 'index.php/back_end/show_user_management/page');
					}
					break;
			}
		}
		if(isset($params['hapus_member'])){
			$user = new User();
			$user->where('id',$params['id'])->get();
			foreach ($params['member_id'] as $member_id){
				echo $member_id;
				$member = new User();
				$member->where('id',$member_id)->get();
				$user->delete_user($member);
				echo $member->username;
			}
			redirect(base_url() . 'index.php/back_end/entry_user/type/edit/id/' . $params['id']);
		}

		if(isset($params['advanced_preference'])){
			redirect(base_url() . 'index.php/back_end/advanced_user_preferences/id/' . $params['id']);	
		}
		
		if(isset($params['cancel_x'])){
			redirect(base_url() . 'index.php/back_end/show_user_management/page');
		}
	}
	
	function advanced_user_preferences(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$modules = new Module();
		$modules->get();
		$data = array(
		'view_data'=>'advanced_user_preferences',
		'modules'=>$modules,'user_id'=>$uri['id'],
		'user_preferences' => User::get_user_preferences($uri['id']),
		);
		$this->load->view('common/backendindex',$data);
	}
	
	function advanced_user_preference_handler(){
		$params = $this->input->post();
		$modules = new Module();
		$modules->get();
		foreach ($modules as $module){
			if(isset($params['c'][$module->id])){
				User::set_preference($params['user_id'],$module->id,'c','1');
			}else{
				User::set_preference($params['user_id'],$module->id,'c','0');
			}
			if(isset($params['r'][$module->id])){
				User::set_preference($params['user_id'],$module->id,'r','1');
			}else{
				User::set_preference($params['user_id'],$module->id,'r','0');
			}
			if(isset($params['u'][$module->id])){
				User::set_preference($params['user_id'],$module->id,'u','1');
			}else{
				User::set_preference($params['user_id'],$module->id,'u','0');
			}
			if(isset($params['d'][$module->id])){
				User::set_preference($params['user_id'],$module->id,'d','1');
			}else{
				User::set_preference($params['user_id'],$module->id,'d','0');
			}
		}
		$this->access_log->insert_log('Change user preference (' . $params['username'] . ')');
		redirect(base_url() . 'index.php/back_end/entry_user/type/edit/id/' . $params['user_id']);
	}
	
	function user_handler(){
		$this->check_authentication();
		$params = $this->input->post();
		if(isset($params['btn_cari'])){
			$user_data = array('usr_src'=>$params['cari']);
			$this->session->set_userdata($user_data);
			redirect(base_url() . 'index.php/back_end/show_user_management/page');
		}
		if(isset($params['remove_x'])){
			if(isset($params['id'])){
				$data['view_data'] = 'confirmation';
				$items = implode(',',$params['id']);
				$data['action'] = base_url() . 'index.php/back_end/user_execute';
				$data['query'] = 'delete from users where id in (' . $items . ')'; 
				$data['message'] = 'Apakah akan menghapus item no ' . $items . ' ?';
				$this->load->view('common/backendindex',$data);
			}
		}
	}
	
	function user_execute(){
		$this->check_authentication();
		$params = $this->input->post();
		if(isset($params['yes'])){
			$this->access_log->insert_log('Delete users (' . $params['query'] . ')');
			$execute = $this->db->query($params['query']);
		}
		redirect(base_url() . 'index.php/back_end/show_user_management/page');
	}
	
	function add_member(){
		$uri = $this->uri->uri_to_assoc();
		$members = new User();
		$members->where_related('spv','id',$uri['spv'])->get();
		
		$user = new User();
		$member_not = array($uri['spv']);
		foreach($members as $member){
			array_push($member_not,$member->id);
		}
		$user->where_not_in('id',$member_not)->get();
		$data = array('view_data'=>'add_member','objs'=>$user,'uri'=>$uri);
		$this->load->view('common/backendindex',$data);
	}
	
	function add_member_handler(){
		$uri = $this->uri->uri_to_assoc();
		$params = $this->input->post();
		if(isset($params['use'])){
			$spv = new User();
			$spv->where('id',$params['id'])->get();
			echo $spv->username . '<br />';
			foreach ($params['user_id'] as $user_id){
				$user = new User();
				$user->where('id',$user_id)->get();
				$spv->save($user);
			}
		}
		redirect(base_url() . 'index.php/back_end/entry_user/type/edit/id/' . $params['id']);
	}
	
		
	function show_calendar(){
		$this->check_authentication();
		$this->check_messages();
		$uri = $this->uri->uri_to_assoc();
		$year = (isset($uri['year']))?$uri['year']:date('Y',now());
		$month = (isset($uri['month']))?$uri['month']:date('m',now());
		$calendar = new Calendar();
		$survey_days = Survey_request::get_survey_requests_by_monthyear($month,$year);
		foreach ($survey_days as $day){
			$calendar->set_day_color($day->survey_day, 'red');
			$calendar->set_date_color($day->survey_day, 'gold');
		}
		$cal = $calendar->show_calendar($year . '/' . $month);
		$data = array(
		'view_data'=>'calendar',
		'alert'=>'','calendar'=>$cal,'alertcount'=>$this->alertcount,
		'months'=>Common::get_months_array(),'month'=>$month,
		'years'=>Common::get_years_array(),'year'=>$year,
		);
		$this->load->view('common/backendindex',$data);
		
	}
	
	function calendar_filter_handler(){
		$params = $this->input->post();
		redirect(base_url() . 'index.php/back_end/show_calendar/month/' . $params['month'] . '/year/' . $params['year']);
	}
	
	function show_days(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array(
		'view_data'=>'day','uri'=>$uri,
		'day'=>$uri['day'],
		'month'=>Calendar::get_month_name($uri['month']),'year'=>$uri['year'],
		'survey_requests'=>Survey_request::get_survey_requests_by_monthyeardate($uri['year'],$uri['month'],$uri['day']),
		);
		$this->load->view('common/backendindex',$data);
	}
	
	
	
		
	
	function show_uploads(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		if(isset($uri['random_string'])){
			$property = new Property();
			$prp = $property->get_by_random_string($uri['random_string']);
			$identifier = 'id';
			$identifier_value = $prp[0]['id'];
		}
		if(isset($uri['id'])){
			$identifier = 'id';
			$identifier_value = $uri['id'];
		}
		$filenames = get_filenames('./media/uploads');
		$data = array(
			'filenames'=>$filenames,
			'identifier'=>$identifier,
			'identifier_value'=>$identifier_value
		);
		$this->load->view('show_uploads',$data);
	}
	
	function show_images(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$filenames = get_filenames('./media/images');
		$data = array(
			'filenames'=>$filenames,
		);
		$this->load->view('show_images',$data);
	}
	
	function edit_survey_image(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		
		$config['image_library'] = 'gd2';
		$config['source_image'] = './media/surveys_used/' . $uri['img'];
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
//		$config['new_image'] = './media/surveys_used/copy.jpg';
		$config['wm_text'] = 'puji@padi.net.id';
		$config['type'] = 'text';
		$config['width'] = 75;
		$config['height'] = 50;
		
		$this->load->library('image_lib',$config);
		$this->image_lib->watermark();
				
		$data = array('img'=>base_url() . 'media/surveys_used/' . $uri['img'],
		'view_data'=>'edit_survey_image');
		$this->load->view('common/backendindex',$data);
	}
	
	function upload(){
		$this->check_authentication();
		$config['upload_path']	= './media/uploads/';
		$config['allowed_types']= 'jpg|jpeg|png|gif|bmp';
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload()){
			echo $this->upload->display_errors();
			echo 'error upload';
		}
		else{
			$upload_data = $this->upload->data();
			$this->access_log->insert_log('Upload image' . $upload_data['file_name']);
			redirect(base_url() . 'index.php/back_end/show_uploads/' . $params['identifier'] . '/' . $params['identifier_value']);
		}
	}
	
	function upload_image(){
		$this->check_authentication();
		$config['upload_path']	= './media/images/';
		$config['allowed_types']= 'jpg|jpeg|png|gif|bmp';
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload()){
			echo $this->upload->display_errors();
			echo 'error upload';
		}
		else{
			$upload_data = $this->upload->data();
			$this->access_log->insert_log('Upload image ' . $upload_data['file_name']);
			redirect(base_url() . 'index.php/back_end/show_images/');
		}
	}
	
	
	function web_setting(){
		$this->check_authentication();
			$uri = $this->uri->uri_to_assoc();
			$web_setting = new Web_setting();
			$web_setting->get();
			$image = $web_setting->logo;
			$header_image = $web_setting->header_image;
			if(isset($uri['image'])){
				switch ($uri['field']){
					case 'logo':
						$image = $uri['image'];
						break;
					case 'header_image':
						$header_image = $uri['image'];
						break;
				}
			}
			$data = array(
				'view_data'=>'web_setting',
				'website_name'=>$web_setting->website_name,
				'website_title'=>$web_setting->website_title,
				'footer_text'=>$web_setting->footer_text,
				'meta_keyword'=>$web_setting->meta_keyword,
				'meta_description'=>$web_setting->meta_description,
				'master_email'=>$web_setting->master_email,
				'maintenance_mode'=>($web_setting->maintenance_mode=='1')?TRUE:FALSE,
				'property_auto_moderation'=>($web_setting->property_auto_moderation=='1')?TRUE:FALSE,
				'news_auto_moderation'=>($web_setting->news_auto_moderation=='1')?TRUE:FALSE,
				'advertise_auto_moderation'=>($web_setting->advertise_auto_moderation=='1')?TRUE:FALSE,
				'advertise_max_char'=>$web_setting->advertise_max_char,
				'theme'=>$web_setting->theme,'themes'=>$this->web_setting->get_themes(),
				'language'=>$web_setting->language,
				'languages'=>$this->web_setting->get_languages(),
				'image'=>$image,
				'fb_url'=>$web_setting->fb_url,'tw_url'=>$web_setting->tw_url,
				'header_types'=>array('0'=>'color','1'=>'image'),
				'header_color'=>$web_setting->header_color,
				'header_image'=>$header_image,
				'header_type'=>$web_setting->header_type,
			);
			$this->load->view('common/backendindex',$data);
	}
	
	function web_setting_handler(){
		$this->check_authentication();
		$params = $this->input->post();
		if(isset($params['save_x'])){
			$this->access_log->insert_log('Edit web setting ');
			$web_setting = new Web_setting();
			$web_setting->update(array(
				'website_name'=>$params['website_name'],
				'website_title'=>$params['website_title'],
				'footer_text'=>$params['footer_text'],
				'meta_keyword'=>$params['meta_keyword'],
				'meta_description'=>$params['meta_description'],
				'master_email'=>$params['master_email'],
				'maintenance_mode'=>$params['maintenance_mode'],
				'property_auto_moderation'=>$params['property_auto_moderation'],
				'news_auto_moderation'=>$params['news_auto_moderation'],
				'advertise_auto_moderation'=>$params['advertise_auto_moderation'],
				'advertise_max_char'=>$params['advertise_max_char'],
				'theme'=>$params['theme'],'language'=>$params['language'],'logo'=>$params['logo'],
				'footer_text'=>$params['footer_text'],
				'fb_url'=>$params['fb_url'],'tw_url'=>$params['tw_url'],
				'header_type'=>$params['header_type'],'header_image'=>$params['header_image'],
				'header_color'=>$params['header_color']
			));
		}
		if(isset($params['gambar'])){
			redirect(base_url() . 'index.php/back_end/show_media/field/logo');
		}
		if(isset($params['header'])){
			redirect(base_url() . 'index.php/back_end/show_media/field/header_image');
		}
		redirect(base_url() . 'index.php/back_end/web_setting');
	}
	
	function show_media(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		
		$filenames = get_filenames('./media/images');
		
		$data = array(
			'filenames'=>$filenames,'view_data'=>'show_media','field'=>$uri['field']
		);
		$this->load->view('common/backendindex',$data);
	}
	
	function media_handler(){
		$this->check_authentication();
		$params = $this->input->post();
		$uri = $this->uri->uri_to_assoc();
		$config['upload_path']	= './media/images';
		$config['allowed_types']= 'jpg|jpeg|png|gif|bmp';
		$this->load->library('upload',$config);
		if(isset($params['upload'])){
			if(!$this->upload->do_upload()){
				echo $this->upload->display_errors();
				echo 'error upload';
			}
			else{
				$upload_data = $this->upload->data();
				$this->access_log->insert_log('Upload image ' . $upload_data['file_name']);
				
				redirect(base_url() . 'index.php/back_end/show_media/field/' . $uri['field']);
			}
		}
		if(isset($uri['type'])){
			switch ($uri['type']){
				case 'use':
					$this->access_log->insert_log('Associate image ' . $uri['image']);
					redirect(base_url() . 'index.php/back_end/web_setting/image/' . $uri['image'] . '/field/' . $uri['field']);
					break;
				case 'remove':
					$this->access_log->insert_log('Delete image ' . $uri['image']);
					unlink('./media/images/' . $uri['image']);
					redirect(base_url() . 'index.php/back_end/show_media/field/' . $uri['field']);
					break;
			}
		}
	}
	
	function get_pdf_file(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$filenames = get_filenames('./media/magazines/pdf/');
		
		$data = array(
			'identifier'=>$uri['identifier'],'identifier_value'=>$uri['identifier_value'],
			'filenames'=>$filenames,'view_data'=>'show_pdf_file'
		);
		$this->load->view('common/backendindex',$data);
	}
	
	function get_cover_file(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$filenames = get_filenames('./media/magazines/cover/');
		
		$data = array(
			'identifier'=>$uri['identifier'],'identifier_value'=>$uri['identifier_value'],
			'filenames'=>$filenames,'view_data'=>'show_cover_file'
		);
		$this->load->view('common/backendindex',$data);
	}
	
	function upload_cover_file(){
		$this->check_authentication();
		$params = $this->input->post();
		$config['upload_path']	= './media/magazines/cover/';
		$config['allowed_types']= 'jpg|jpeg|png|gif|bmp';
		$this->load->library('upload',$config);
		if(isset($params['upload'])){
			if(!$this->upload->do_upload()){
				echo $this->upload->display_errors();
				echo 'error upload';
			}
			else{
				$upload_data = $this->upload->data();
				$this->access_log->insert_log('Upload cover file ' . $upload_data['file_name']);
				redirect(base_url() . 'index.php/back_end/get_cover_file/identifier/' . $params['identifier'] . '/identifier_value/' . $params['identifier_value'] );
			}
		}
		else{
			redirect(base_url() . 'index.php/back_end/entry_magazine/type/edit/identifier/' . $params['identifier'] . '/identifier_value/' .  $params['identifier_value'] . '/page/0/image/' . $params['ori_image']);	
		}
	}

	function upload_pdf_file(){
		$this->check_authentication();
		$params = $this->input->post();
		$config['upload_path']	= './media/magazines/pdf/';
		$config['allowed_types']= 'application/pdf|pdf|jpg|jpeg|png|gif|bmp';
		$this->load->library('upload',$config);
		if(isset($params['upload'])){
			if(!$this->upload->do_upload()){
				echo $this->upload->display_errors();
				echo 'error upload';
			}
			else{
				$upload_data = $this->upload->data();
				$this->access_log->insert_log('Upload pdf file ' . $upload_data['file_name']);
				redirect(base_url() . 'index.php/back_end/get_pdf_file/identifier/' . $params['identifier'] . '/identifier_value/' . $params['identifier_value']);
			}
		}
		else{
			redirect(base_url() . 'index.php/back_end/entry_magazine/type/edit/identifier/' . $params['identifier'] . '/identifier_value/' .  $params['identifier_value'] . '/page/0/image/' . $params['ori_image']);	
		}
	}

	
	function show_help(){
		$this->check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$type = (isset($uri['type']))?$uri['type']:'show_help';
		$data = array('view_data'=>'show_help','type'=>$type);
		$this->load->view('common/backendindex',$data);
	}

	function show_todo(){
		$this->check_authentication();
		$data = array('view_data'=>'show_todo');
		$this->load->view('common/backendindex',$data);
	}
	
	function broken_link(){
		$data = array('view_data'=>'broken_link');
		$this->load->view('common/backendindex',$data);
	}
	
	function forgot_password(){
		$this->load->view('forgot_password');
	}
	
	function handler(){
		$params = $this->input->post();
		switch ($params['post_sender']){
			case 'forgot_password':
				$password = 'password';
				$this->auth->change_password_user_by_email($password,$params['email']);
				
				$content = 'Dengan hormat, <br />';
				$content.= 'Menindaklanjuti permintaan anda untuk mereset password pada aplikasi DB_Teknis, <br />';
				$content.= 'maka kami telah melakukan reset password anda menjadi "password"';
				$content.= 'Anda dapat mengganti kembali password anda dengan mengedit pada menu Web Setting <br /><br /><br />';
				$content.= 'Administrator';
				$this->common->send_mail($params['email'],'Your Password has been reset',$content);
				redirect(base_url() . 'index.php/back_end/login');
				break;
		}
	}
}
