<?php
class Prospects extends CI_Controller{
	var $data;
	var $ionuser;
	function __construct(){
		parent::__construct();
		$this->data = array(
			'objs'=>Client::populate('1','0')
		);
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
			$this->data['user'] = User::get_user_by_id($this->ionuser->id);
			$this->load->helper('user');
			$this->load->helper('client');
			$this->load->helper('prospect');
		}
	}
	function add_prospect(){
		$data = array(
			'businesstypes'=>Business_field::get_combo_data(),
			'objs'=>Client::populate(),
		);
		$this->load->view('adm/prospect_add',$data);
	}
	function check_login(){
		if(!$this->ion_auth->logged_in()){
			redirect(base_url() . 'index.php/adm/login');
		}
	}
	function edit(){
		$this->check_login();
		$id=$this->uri->segment(3);
		$this->data['obj'] = Client::get_obj_by_id($id);
		$this->data['speeds'] = Speed::get_combo_data(" ");
		$this->data['operators'] = Operator::get_combo_data(" ");
		$this->data['problems'] = Problem::get_combo_data(" ");
		$this->data['durations'] = Duration::get_combo_data(" ");
		$this->data['usage_periods'] = Usage_period::get_combo_data(" ");
		$this->data['internet_users'] = Internet_user::get_combo_data(" ");
		$this->data['internet_fees'] = Internet_fee::get_combo_data(" ");
		$this->data['medias'] = Media::get_combo_data(" ");
		$this->data['services'] = Service::get_combo_data(" ");
		$this->data['positions'] = Position::get_combo_data();
		$this->data['sales'] = getsalescombodata();
		$this->data['menuFeed'] = 'prospect';
		$this->data['followups'] = getfollowups($id);
		$this->data['totalfollowups'] = gettotalfollowups($id);
		$this->load->view('Sales/prospects/edit',$this->data);
	}
	function update(){
		$params = $this->input->post();
		echo Client::edit($params);
	}
	function edit_client(){
		$params = $this->input->post();
		echo Client::edit($params);
	}
	function add_client(){
		$params = $this->input->post();
		echo Client::add($params);
	}
	function index(){
		$this->check_login();
		$arr = array();
		$users = getsubordinates($this->ionuser->id,$arr);
		$params = $this->uri->segment(3);
		switch($params){
			case 'open':
				$objs = Client::populateClientSurvey('open',$users);
				$title = " (Open)";
			break;
			case 'closed':
				$objs = Client::populateClientSurvey('closed');
				$title = " (Closed)";
			break;
			case 'all':
				$objs = Client::populateClientSurvey('all',$users);
				$title = "Semua";
			break;
			default:
				$objs = Client::populateClientSurvey('all',$users);
				$title = "Semua";
			break;
		}
		$data = array(
			'objs'=>$objs,
			'title'=>$title,
			'menuFeed'=>'prospect'
		);
		$this->load->view('Sales/prospects/prospects',$data);
	}
	function add_pic(){
		$id = $this->uri->segment(3);
		$data = array(
			'businesstypes'=>Business_field::get_combo_data(),
			'objs'=>Client::populate(),
			'path'=>$path,
			'pics'=>Pic::get_by_client_id($id),
			'positions'=>Position::get_combo_data()
		);
		$this->load->view('adm/prospect_pic_add',$data);
	}
	function pic_add_x(){
		$params = $this->input->post();
		echo Pic::add($params);
	}
	function provider_yg_digunakan(){
		$data = array(
			'applications'=>Application::get_combo_data(),
			'businesstypes'=>Business_field::get_combo_data(),
			'durations'=>Duration::get_combo_data(),
			'internet_fees'=>Internet_fee::get_combo_data(),
			'internet_users'=>Internet_user::get_combo_data(),
			'medias'=>Media::get_combo_data(),
			'objs'=>Client::populate(),
			'operators'=>Operator::get_combo_data(),
			'problems'=>Problem::get_combo_data(),
			'positions'=>Position::get_combo_data(),
			'speeds'=>Speed::get_combo_data(),
			'usage_periods'=>Usage_period::get_combo_data()
		);
		$this->load->view('adm/prospect_provider_yg_digunakan',$data);
	}
	function subscription_confirmation(){
		$data = array(
			'businesstypes'=>Business_field::get_combo_data(),
			'objs'=>Client::populate(),
			'positions'=>Position::get_combo_data()
		);
		$this->load->view('adm/prospect_subscription_confirmation',$data);
	}
	function internet_need_confirmation(){
		$data = array(
			'businesstypes'=>Business_field::get_combo_data(),
			'objs'=>Client::populate(),
			'positions'=>Position::get_combo_data()
		);
		$this->load->view('adm/prospect_internet_need_confirmation',$data);
	}
	function provider_internet(){
		$data = array(
			'businesstypes'=>Business_field::get_combo_data(),
			'objs'=>Client::populate(),
			'positions'=>Position::get_combo_data()
		);
		$this->load->view('adm/prospect_provider_internet',$data);
	}
	function save_client_priority(){
		$params = $this->input->post();
		Client_priority::add($params);
	}
	function drop_client_priority(){
		$params = $this->input->post();
		Client_priority::drop($params);
	}
	function ttg_padinet(){
		$data = array(
			'budgets'=>Budget::get_combo_data(),
			'businesstypes'=>Business_field::get_combo_data(),
			'objs'=>Client::populate(),
			'positions'=>Position::get_combo_data(),
			'services'=>Service::get_combo_data()
		);
		$this->load->view('adm/prospect_ttg_padinet',$data);
	}
	function check_client_exist(){
		$params = $this->input->post();
		if(Client_priority::client_exist($params['id'])){
			echo 'exist';
		}else{
			echo 'not exist';
		}
	}
	function propose_survey(){
		$params = $this->input->post();
		echo Survey_request::add($params);
	}
}
