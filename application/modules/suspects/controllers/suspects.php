<?php
class Suspects extends CI_Controller {
	var $data;
	var $ionuser;
	function __construct() {
		parent::__construct();
		if ($this->ion_auth->logged_in()) {
			$this->ionuser = $this->ion_auth->user()->row();
			//$this->data['user'] = User::get_user_by_id($this->ionuser->id);
			$this->load->helper('user');
			$this->load->helper('suspect');
			$this->load->helper('prospect');
		}
	}
	function save_app() {
		$params = $this->input->post();
		$obj = new Client_application();
		foreach ($params as $key => $val) {
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function add_client() {
		$params = $this->input->post();
		echo Client::add($params);
	}
	function add_pic() {
		$this->check_login();
		$id = $this->uri->segment(3);
		$data = array(
			'businesstypes' => Business_field::get_combo_data(),
			'objs' => Client::populate(),
			'pics' => Pic::get_by_client_id($id),
			'positions' => Position::get_combo_data(),
			'menuFeed' => 'suspect'
		);
		$this->load->view('Sales/suspects/pic_add', $data);
	}
	function add_suspect() {
		$this->check_login();
		$user = new User($this->ionuser->id);
		if ($this->uri->total_segments() == 3) {
			$objs = Client::get_obj_by_id($this->uri->segment(3));
			$branch = $objs->branch_id;
			$status = 'edit';
			$client_id = $this->uri->segment(3);
		} else {
			$objs = new Client();//Client::populate();
			$branch = $user->get_branches_by_id($this->ionuser->id);
			$status = 'new';
			$client_id = "";
		}
		$applog = new App_log();
		$data = array(
			'branches' => $user->get_user_branches(),
			'branch' => $branch,
			'branch_id' => $user->get_default_branch(),
			'client_id' => $client_id,
			'status' => $status,
			'businesstypes' => get_business_field_combo_data(),
			'objs' => $objs,
			'menuFeed' => 'suspect',
			'lastvisit' => $applog->get_lastvisit($this->session->userdata['username']),
		);
		$this->load->view('Sales/suspects/add', $data);
	}
	function check_complete($client_id){
		$sql = "select * from clients where id=".$client_id;
		$query = $this->db->query($sql);
		$result = $query->result();
	}
	function check_login() {
		if (!$this->ion_auth->logged_in()) {
			redirect(base_url() . 'index.php/adm/login');
		}
	}
	function edit_client() {
		$params = $this->input->post();
		echo Client::edit($params);
	}
	function edit() {
		$this->check_login();
		$id = $this->uri->segment(3);
		$data = array(
			'applications' => Application::get_combo_data(),
			'budgets' => Budget::get_combo_data(),
			'businesstypes' => Business_field::get_combo_data(),
			'durations' => Duration::get_combo_data(),
			'hours' => Common::gethours(),
			'minutes' => Common::getminutes(),
			'internet_fees' => Internet_fee::get_combo_data(),
			'internet_users' => Internet_user::get_combo_data(),
			'medias' => Media::get_combo_data(),
			//'obj' => Client::get_obj_by_id($id),
			//'pics'=>getsuspectpicbyid($id),
			'pics'=>getsuspectpicbyclientid($id),
			'obj'=>getsuspectbyclientid($id),
			'operators' => Operator::get_combo_data(),
			'problems' => Problem::get_combo_data(),
			'positions' => Position::get_combo_data(),
			'speeds' => Speed::get_combo_data(),
			'usage_periods' => Usage_period::get_combo_data(),
			'menuFeed' => 'suspect'
		);
		$data['followups'] = getfollowups($id);
		$data['totalfollowups'] = gettotalfollowups($id);
		$data['services'] = Service::get_combo_data();
		$this->load->view('Sales/suspects/edit', $data);
	}
	function getApps() {
		$id = $this->uri->segment(3);
		$objs = new Client_application();
		$objs->where('client_id', $id)->get();
		$arr = array();
		foreach ($objs as $obj) {
			array_push($arr, '"' . $obj->id . '":"' . $obj->name . '"');
		}
		echo '{' . implode(",", $arr) . '}';
	}
	function getFields() {
		$id = $this->uri->segment(3);
		$objs = new Client();
		$objs->where('id', $id)->get();
		$arr = array();
		$lists = $this->db->list_fields('clients');
		foreach ($lists as $list) {
			array_push($arr, '"' . $list . '":"' . $objs->$list . '"');
		}
		echo '{' . implode(",", $arr) . '}';
	}
	function getpics(){
		$params = $this->input->post();
		$sql = "select id,name,prole,phone_area,telp_hp,hp,position,email ";
		$sql.= "from pics where id=".$params["id"];
		$que = $this->db->query($sql);
		$res = $que->result();
		$obj = $res[0];
		echo '{"name":"'.$obj->name.'","telp_hp":"'.$obj->telp_hp.'","prole":"'.$obj->prole.'","hp":"'.$obj->hp.'","position":"'.$obj->position.'","email":"'.$obj->email.'"}';
	}
	function updatepic(){
		$params = $this->input->post();
		$sql = "update pics set name='".$params["name"]."'";
		$sql.= ",telp_hp='".$params["telp_hp"]."',";
		$sql.= "hp='".$params["hp"]."',";
		$sql.= "email='".$params["email"]."'";
		$sql.= ",position='".$params["position"]."'";
		$sql.= " where id='".$params["id"]."'";
		$ci = & get_instance();
		$que = $ci->db->query($sql);
		echo $sql;
	}
	function get_provider_parameter() {
		$path = array('csspath' => base_url() . 'css/aquarius', 'jspath' => base_url() . 'js/aquarius', 'imagepath' => base_url() . 'img/aquarius');
		return array(
			'applications' => Application::get_combo_data(),
			'businesstypes' => Business_field::get_combo_data(),
			'csspath' => base_url() . 'css/aquarius/',
			'durations' => Duration::get_combo_data(),
			'imagepath' => base_url() . 'img/aquarius/',
			'internet_fees' => Internet_fee::get_combo_data(),
			'internet_users' => Internet_user::get_combo_data(),
			'jspath' => base_url() . 'js/aquarius/',
			'medias' => Media::get_combo_data(),
			'objs' => Client::populate(),
			'operators' => Operator::get_combo_data(),
			'path' => $path,
			'problems' => Problem::get_combo_data(),
			'positions' => Position::get_combo_data(),
			'budgets' => Budget::get_combo_data(),
			'internet_fees' => Internet_fee::get_combo_data(),
			'internet_users' => Internet_user::get_combo_data(),
			'speeds' => Speed::get_combo_data(),
			'usage_periods' => Usage_period::get_combo_data()
		);
	}
	function index() {
		$this->check_login();
		$arr = array();
		$users = getsubordinates($this->ionuser->id,$arr);
		$this->data['objs'] = getsuspects();
		$this->data['menuFeed'] = 'suspect';
		$applog = new App_log();
		$this->data["lastvisit"] = $applog->get_lastvisit($this->session->userdata['username']);
		$this->load->view('Sales/suspects/suspects', $this->data);
	}
	function pic_add_x() {
		$params = $this->input->post();
		echo Pic::add($params);
	}
	function provider_yg_digunakan() {
		$this->check_login();
		$data = array(
			'applications' => Application::get_combo_data(),
			'businesstypes' => Business_field::get_combo_data(),
			'durations' => Duration::get_combo_data(),
			'internet_fees' => Internet_fee::get_combo_data(),
			'internet_users' => Internet_user::get_combo_data(),
			'medias' => Media::get_combo_data(),
			'objs' => Client::get_obj_by_id($this->uri->segment(3)),
			'operators' => Operator::get_combo_data(),
			'problems' => Problem::get_combo_data(),
			'positions' => Position::get_combo_data(),
			'speeds' => Speed::get_combo_data(),
			'usage_periods' => Usage_period::get_combo_data(),
			'menuFeed' => 'suspect'
		);
		$this->load->view('Sales/suspects/provider_yg_digunakan', $data);
	}
	function subscription_confirmation() {
		$data = array(
			'businesstypes' => Business_field::get_combo_data(),
			'objs' => Client::populate(),
			'positions' => Position::get_combo_data(),
			'menuFeed' => 'suspect',
			'client_id' => $this->uri->segment(3),
		);
		$this->load->view('Sales/suspects/subscription_confirmation', $data);
	}
	function internet_need_confirmation() {
		$this->check_login();
		$data = array(
			'businesstypes' => Business_field::get_combo_data(),
			'objs' => Client::populate(),
			'positions' => Position::get_combo_data(),
			'menuFeed' => 'suspect',
			'client_id' => $this->uri->segment(3)
		);
		$this->load->view('Sales/suspects/internet_need_confirmation', $data);
	}
	function save_client_priority() {
		$params = $this->input->post();
		Client_priority::add($params);
	}
	function drop_client_priority() {
		$params = $this->input->post();
		Client_priority::drop($params);
	}
	function ttg_padinet() {
		$this->check_login();
		$data = array(
			'budgets' => Budget::get_combo_data(),
			'businesstypes' => Business_field::get_combo_data(),
			'hours' => Common::gethours(),
			'minutes' => Common::getminutes(),
			'objs' => Client::populate(),
			'positions' => Position::get_combo_data(),
			'services' => Service::get_combo_data(true,"Pilihlah"),
			'id' => $this->uri->segment(3),
			'menuFeed' => 'suspect'
		);
		$this->load->view('Sales/suspects/ttg_padinet', $data);
	}
	function updatebyclientid() {
		$params = $this->input->post();
//		echo Client::edit($params);
		$sql = "update suspects ";
		$sql.= "set ";
		$sql.= " ";
		$arr = array();
		foreach ($params as $key=>$val){
			if($key<>'id'){
				array_push($arr,$key."='".$val."'");				
			}
		}
		$sql.= implode(",",$arr);
		$sql.= "where client_id=".$params["client_id"];
		$this->db->query($sql);
		echo $sql;
	}
	function update() {
		$params = $this->input->post();
//		echo Client::edit($params);
		$sql = "update suspects ";
		$sql.= "set ";
		$sql.= " ";
		$arr = array();
		foreach ($params as $key=>$val){
			if($key<>'id'){
				array_push($arr,$key."='".$val."'");				
			}
		}
		$sql.= implode(",",$arr);
		$sql.= "where id=".$params["id"];
		$this->db->query($sql);
		echo $sql;
	}
	function check_client_exist() {
		$params = $this->input->post();
		if (Client_priority::client_exist($params['id'])) {
			echo 'exist';
		} else {

			echo 'not exist';
		}
	}
	function isComplete($id){
		$obj = new Client();
		$obj->where('id',$id)->get();
		foreach($this->db->list_fields("clients") as $field){
			if($obj->has_internet_connection=="1"){
				if(($field<>'branches')&&($field<>'billaddress')&&($field<>'tanggal_kontrak')&&($field<>'activedate')&&($field<>'period1')&&($field<>'period2')&&($field<>'category_id')&&($field<>'npwp')&&($field<>'siup')&&($field<>'kode_pelanggan')&&($field<>'random_identifier')&&($field<>'ratio')&&($field<>'followed_up')&&($field<>'prospect')&&($field<>'service_id')&&($field<>'reason2not_interested')&&($field<>'phone_area')&&($field<>'alias')&&($field<>'fax')&&($field<>'fax_area')&&($field<>'known_from')&&($field<>'prospectdate')){
					if ((trim($obj->$field)==="" ||$obj->$field ===null)){
						//return true;
						return false;
					}
				}
			}else{
				if(($field<>'branches')&&($field<>'billaddress')&&($field<>'tanggal_kontrak')&&($field<>'activedate')&&($field<>'period1')&&($field<>'period2')&&($field<>'category_id')&&($field<>'npwp')&&($field<>'siup')&&($field<>'kode_pelanggan')&&($field<>'random_identifier')&&($field<>'ratio')&&($field<>'followed_up')&&($field<>'prospect')&&($field<>'service_id')&&($field<>'reason2not_interested')&&($field<>'media')&&($field<>'speed')&&($field<>'ratio')&&($field<>'duration')&&($field<>'usage_period')&&($field<>'user_amount')&&($field<>'fee')&&($field<>'operator')&&($field<>'end_of_contract')&&($field<>'problems')&&($field<>'phone_area')&&($field<>'alias')&&($field<>'fax')&&($field<>'fax_area')&&($field<>'known_from')&&($field<>'prospectdate')){
					if ((trim($obj->$field)==="" ||$obj->$field ===null)){
						//return true;
						return false;
					}
				}				
			}
		}
		return true;	
	}
	function collect_incomplete(){
		$arr = array();
		$id = $this->uri->segment(3);
		foreach($this->db->list_fields("clients") as $field){
			array_push($arr,$field);
		}
		$columns = implode(",",$arr);
		$sql = "select " . $columns . " from clients where id=" . $id ;
		$query = $this->db->query($sql);
		$resul = $query->result();
		if($query->num_rows()==0){
			echo "data tidak ada <br />";
		}else{
			$arrout = array();
			foreach($this->db->list_fields("clients") as $field){
				if($resul[0]->$field === ''||$resul[0]->$field===null){
					array_push($arrout,$field);
				}
			}
			echo implode(",",$arrout);
		}
	}
	function set_prospect() {
		$params = $this->input->post();
		$params['status'] = '1';
		echo Client::edit($params);
	}
	function unset_prospect() {
		$params = $this->input->post();
		$params['status'] = '0';
		echo Client::edit($params);
	}
	function getDescription(){
		$id = $this->uri->segment(3);
		$sql = "select id,followupdate,description from clientfollowups where client_id = " . $id . " ";
		$sql.= "order by followupdate desc ";
		$dta = $this->db->query($sql);
		$result = $dta->result();
		$arr = array();
		foreach ($result as $res){
			array_push($arr,'{"followupdate":"'.$res->followupdate.'","description":"'.$res->description.'"}');
		}
		echo '{"out":['.implode(",",$arr) . ']}';
	}
}
