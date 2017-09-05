<?php
class Survey_requests extends CI_Controller {
	var $setting;
	var $preference;
	var $user_info;
	var $alertcount;
	var $ionuser;
	var $mpath;
	var $data;
	function __construct() {
		parent::__construct();
		Common::get_preferences();
		$this->setting = Common::get_web_settings();
		$this->lang->load('padi', $this->setting['language']);
		$this->mpath = base_url() . 'index.php/survey_requests/';
		if ($this->ion_auth->logged_in()) {
			$this->ionuser = $this->ion_auth->user()->row();
			$this->data['user'] = User::get_user_by_id($this->ionuser->id);
		}
		$this->load->helper("user");
		$this->load->helper("branches");
	}
	function add() {
		$this->check_login();
		$id = $this->uri->segment(3);
		$obj = Client::get_obj_by_id($id);
		$pics = new Pic();
		$pics->where("client_id",$obj->id)->get();
		$sitepics = new Site_pic();
		$sitepics->where("client_id",$obj->id)->get();
		
		$this->data['obj'] = $obj;
		$this->data['pics'] = $pics;
		$this->data['sitepics'] = $sitepics;
		$this->data['positions'] = Position::get_combo_data();
		$this->data['clients'] = Client::get_combo_data();
		$this->data['services'] = Service::get_combo_data();
		$this->data['sender'] = 'survey_add';
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['branches'] = Branch::get_combo_data();
		$this->data['userbranches'] = getuserbranches();
		$this->data['menuFeed'] = 'survey';
		$this->load->view('Sales/surveys/add', $this->data);
	}
	function check_login() {
		if (!$this->ion_auth->logged_in()) {
			$sessdata = array("pending_url"=>base_url()."survey_requests/add");
			$this->session->set_userdata($sessdata);
			redirect(base_url() . 'index.php/adm/login');
		}
	}
	function show_survey_requests() {
		Common::check_authentication();
		$obj = new Survey_request();
		Common::show_object($obj, 'survey_requests', 'survey_requests', 'client_id');
	}
	function entry_survey_request() {
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array(
			'view_data' => 'entry_survey_request',
			'services' => Service::get_combo_data(),
//		'clients'=>Db_pelanggan_client::get_combo_data(),
			'clients' => Client::get_combo_data(),
		);
		switch ($uri['type']) {
			case 'add':
				$day = (isset($uri['day'])) ? $uri['day'] : date('d', now());
				$month = (isset($uri['month'])) ? $uri['month'] : date('m', now());
				$year = (isset($uri['year'])) ? $uri['year'] : date('Y', now());
				$data['id'] = '';
				$data['service'] = '';
				$data['client'] = 0;
				$data['survey_date'] = $day . '/' . $month . '/' . $year;
				$data['hour'] = 8;
				$data['minute'] = 0;
				$data['type'] = 'add';
				$data['pic_name'] = '';
				$data['pic_position'] = '';
				$data['pic_phone'] = '';
				$data['sites'] = array();
				$data['active'] = TRUE;
				break;
			case 'edit':

				$obj = new Survey_request();
				$obj->where('id', $uri['id'])->get();
				$survey_date = $obj->survey_date;
				$date_part = Common::longsql_to_datepart($survey_date);
				$data['id'] = $obj->id;
				$data['service'] = $obj->service_id;
				$data['client'] = $obj->client_id;
				$data['survey_date'] = $date_part['day'] . '/' . $date_part['month'] . '/' . $date_part['year'];
				$data['hour'] = $date_part['hour'];
				$data['minute'] = $date_part['minute'];
				$data['type'] = 'edit';
				$data['pic_name'] = $obj->pic_name;
				$data['pic_position'] = $obj->pic_position;
				$data['pic_phone'] = $obj->pic_phone;
				$data['sites'] = Survey_site::get_survey_sites($uri['id']);
				$data['active'] = ($obj->active == '1') ? TRUE : FALSE;
				break;
		}
		$this->load->view('common/backendindex', $data);
	}
	function entry_survey_request_handler() {
		Common::check_authentication();
		$params = $this->input->post();
		if (isset($params['cancel_x'])) {
			redirect($this->mpath . 'show_survey_requests/page');
		}
		$survey_date = $params['survey_date'] . ' ' . $params['hour'] . ':' . $params['minute'] . ':' . '00';
		$date_part = Common::longhuman_to_datepart($survey_date);
		$covering_letter = (isset($params['covering_letter'])) ? '1' : '0';
		$object = array(
			'client_id' => $params['clients'],
			'service_id' => $params['service'],
			'survey_date' => $this->common->longhuman_to_sql_date($survey_date),
			'pic_name' => $params['pic_name'],
			'pic_position' => $params['pic_position'],
			'pic_phone' => $params['pic_phone'],
			'covering_letter' => $params['covering_letter'],
			'user_name' => $this->session->userdata['username']
		);
		$internalmsg = array(
			'message_type' => 'survey_request',
			'obj_id' => $params['id'],
			'recipient' => 0,
			'recipient_group' => 4,
			'content' => 'survey request',
			'proposed_date1' => null,
			'proposed_date2' => null,
			'followuplink' => 'survey_requests/entry_ts_survey_request'
		);
		switch ($params['type']) {
			case 'add':
				$this->access_log->insert_log('Entry survey_request type (' . $params['clients'] . ')');
				$survey_id = Survey_request::request_save($object);
				$internalmsg['obj_id'] = $survey_id;
				Common::send_internal_message($internalmsg);
				break;
			case 'edit':
				$this->access_log->insert_log('Update survey_request type (' . $params['clients'] . ')');
				$object['id'] = $params['id'];
				Survey_request::request_update($object);
				$survey_id = $params['id'];
				Common::send_internal_message($internalmsg);
				break;
		}
		if (isset($params['save_x'])) {
			//Db_pelanggan_client::export($params['clients']);
			redirect($this->mpath . 'show_survey_requests/page');
		}
		if (isset($params['add_client_site'])) {
			redirect(base_url() . 'index.php/back_end/add_client_site/survey_id/' . $survey_id . '/year/' . $date_part['year'] . '/month/' . $date_part['month'] . '/day/' . $date_part['day']);
		}
	}
	function survey_request_handler() {
		Common::check_authentication();
		$params = $this->input->post();
		if (isset($params['btn_cari'])) {
			$client_data = array('survey_request_src' => $params['cari']);
			$this->session->set_userdata($survey_request_data);
			redirect($this->mpath . 'show_survey_requests/page');
		}
		if (isset($params['remove_x'])) {
			if (isset($params['id'])) {
				$data['view_data'] = 'confirmation';
				$items = implode(',', $params['id']);
				$data['action'] = $this->mpath . 'survey_request_execute';
				$data['query'] = 'delete from survey_requests where id in (' . $items . ')';
				echo $data['query'];
				$data['message'] = 'Apakah akan menghapus item no ' . $items . ' ?';
				$this->load->view('common/backendindex', $data);
			}
		}
	}
	function survey_request_execute() {
		$params = $this->input->post();
		if (isset($params['yes'])) {
			$this->db->query($params['query']);
		}
		redirect($this->mpath . 'show_survey_requests/page');
	}
	function show_ts_survey_requests() {
		Common::check_authentication();
//		$this->check_is_member('TS');
		$obj = new Survey_request();
		Common::show_object($obj, 'ts_survey_requests', 'survey_requests', 'client_id');
	}
	function entry_ts_survey_request() {
		Common::check_authentication();
//		$this->check_is_member('TS');
		$uri = $this->uri->uri_to_assoc();
		$data = array(
			'view_data' => 'entry_ts_survey_request',
			'surveyors' => Survey_request::get_surveyors($uri['id']), 'resume0' => 1, 'resume1' => 0, 'resume2' => 0,
		);
		$obj = new Survey_request();
		$obj->where('id', $uri['id'])->get();
		switch ($obj->resume) {
			case '0':
				$data['resume0'] = 1;
				$data['resume1'] = 0;
				$data['resume2'] = 0;
				break;
			case '1':
				$data['resume0'] = 0;
				$data['resume1'] = 1;
				$data['resume2'] = 0;
				break;
			case '2':
				$data['resume0'] = 0;
				$data['resume1'] = 0;
				$data['resume2'] = 1;
				break;
		}
		$survey_date = $obj->survey_date;
		$date_part = Common::longsql_to_datepart($survey_date);
		$data['id'] = $obj->id;
		$data['client'] = $obj->client->name;
		$data['service'] = $obj->service->name;
		$data['survey_date'] = $date_part['day'] . '/' . $date_part['month'] . '/' . $date_part['year'] . ' ' . $date_part['hour'] . ':' . $date_part['minute'] . ':' . $date_part['second'];
		$data['sql_survey_date'] = $survey_date;
		$data['type'] = 'edit';
		$data['pic_name'] = $obj->pic_name;
		$data['pic_position'] = $obj->pic_position;
		$data['pic_phone'] = $obj->pic_phone;
		$data['sites'] = Survey_site::get_survey_sites($uri['id']);
		$data['textresume'] = $obj->longresume;
		$data['covering_letter'] = ($obj->covering_letter == '1') ? 'Perlu pengantar' : 'Tidak perlu pengantar';
		$this->load->view('common/backendindex', $data);
	}

	function entry_ts_survey_request_handler() {
		Common::check_authentication();
		$params = $this->input->post();
		$survey_date = $params['sql_survey_date'];
		$date_part = Common::longsql_to_datepart($survey_date);
		if (isset($params['report_x'])) {
			redirect($this->mpath . 'preview_report/id/' . $params['id']);
		}
		if (isset($params['mreport_x'])) {
			redirect($this->mpath . 'choose_recipients/id/' . $params['id'] . '/page');
		}
		if (isset($params['cancel_x'])) {
			redirect($this->mpath . 'show_ts_survey_requests/page');
		}
		if (isset($params['save_x'])) {
			$covering_letter = (isset($params['covering_letter'])) ? '1' : '0';
			$survey_request = new Survey_request();
			switch ($params['type']) {
				case 'add':
					$this->access_log->insert_log('Entry survey_request type (' . $params['clients'] . ')');
					$survey_request->resume = $params['resume'];
					$survey_request->user_name = $this->session->userdata['username'];
					$survey_request->save();
					break;
				case 'edit':
					$this->access_log->insert_log('Edit survey_request type (' . $params['clients'] . ')');
					$survey_request->where('id', $params['id'])->update(array(
						'resume' => $params['resume'], 'longresume' => $params['textresume'],
					));
					break;
			}
			redirect($this->mpath . 'entry_ts_survey_request/type/edit/id/' . $params['id']);
		}

		if (isset($params['revisi_tanggal_x'])) {
			redirect($this->mpath . 'survey_date_revision/id/' . $params['id']);
		}

		if (isset($params['add_surveyor'])) {
			redirect($this->mpath . 'entry_surveyor/id/' . $params['id']);
		}
	}

	function entry_surveyor() {
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array(
			'type' => 'add', 'id' => $uri['id'],
			'users' => User::get_combo_data_by_group('TS'),
			'surveyor' => 1,
			'view_data' => 'entry_surveyor'
		);
		$this->load->view('common/backendindex', $data);
	}

	function entry_surveyor_handler() {
		$params = $this->input->post();
		$survey_request = new Survey_surveyor();
		$survey_request->name = User::get_name_by_id($params['surveyor']);
		$survey_request->survey_request_id = $params['id'];
		$survey_request->user_name = $this->session->userdata['username'];
		$survey_request->save();
		redirect($this->mpath . 'entry_ts_survey_request/type/edit/id/' . $params['id']);
	}

	function preview_report() {
		Common::check_authentication();
		include './asset/MPDF54/mpdf.php';
		$uri = $this->uri->uri_to_assoc();
		$obj = new Survey_request();
		$obj->where('id', $uri['id'])->get();
		$data = array(
			'view_data' => 'report_of_survey2',
			'client' => $obj->client->name,
			'business_field' => $obj->client->business_field,
			'textresume' => $obj->longresume,
			'client_sites' => $obj->survey_site,
			'survey_date' => Common::sql_to_human_datetime($obj->survey_date),
			'surveyors' => Survey_request::get_surveyor_report($uri['id']),
			'sites' => Survey_request::get_survey_site_report($uri['id']),
		);
		$this->load->view('common/backendindex', $data);
	}

	function survey_date_revision() {
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array('view_data' => 'survey_date_revision', 'survey_id' => $uri['id'],
			'revision_hour1' => '', 'revision_minute1' => '', 'revision_hour2' => '', 'revision_minute2' => '',
		);
		$this->load->view('common/backendindex', $data);
	}

	function survey_date_revision_handler() {
		$params = $this->input->post();
		if (isset($params['save_x'])) {
			Common::check_authentication();
			$params = $this->input->post();
			$internalmsg = array(
				'message_type' => 'survey_request',
				'obj_id' => $params['survey_id'],
				'recipient' => 0,
				'recipient_group' => 3,
				'content' => $params['content'],
//				'content'		=>'revisi survey request',
				'proposed_date1' => Common::human_to_sql_date($params['proposed_date1']),
				'proposed_date2' => Common::human_to_sql_date($params['proposed_date2']),
				'followuplink' => 'survey_requests/entry_survey_request'
			);
			Common::send_internal_message($internalmsg);
			redirect($this->mpath . 'show_ts_survey_requests/page');
		}
		if (isset($params['cancel_x'])) {
			redirect($this->mpath . 'entry_ts_survey_request/type/edit/id/' . $params['survey_id']);
		}
	}

	function choose_recipients() {
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array('view_data' => 'choose_survey_report_recipients',
			'survey_id' => $uri['id'], 'users' => User::get_users());
		$this->load->view('common/backendindex', $data);
	}

	function send_mail() {
		$params = $this->input->post();
		$recipients = '';
		foreach ($params['recipient'] as $recipient) {
			$recipients .= User::get_email_by_id($recipient) . ',';
		}
		$recipients = substr($recipients, 0, strlen($recipients) - 1);
		Common::check_authentication();
		include './asset/MPDF54/mpdf.php';
		$uri = $this->uri->uri_to_assoc();
		$obj = new Survey_request();
		$obj->where('id', $params['survey_id'])->get();
		$data = array(
			'survey_id' => $params['survey_id'],
			'recipients' => $recipients,
			'view_data' => 'pdfmail',
			'textresume' => $obj->longresume,
			'client' => $obj->client->name,
			'business_field' => $obj->client->business_field,
			'client_sites' => $obj->survey_site,
			'survey_date' => Common::sql_to_human_datetime($obj->survey_date),
			'surveyors' => Survey_request::get_surveyor_report($uri['id']),
			'sites' => Survey_request::get_survey_site_report($uri['id']),
		);
		$this->load->view('common/backendindex', $data);
	}
	function update(){
		$params = $this->input->post();
		$obj = new Survey_request();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}
}
