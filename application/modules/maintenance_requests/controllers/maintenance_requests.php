<?php
class Maintenance_requests extends CI_Controller{
	var $data,$ionuser;
	function __construct(){
		parent::__construct();
		$path = array('csspath'=>base_url() . 'css/aquarius','jspath'=>base_url() . 'js/aquarius','imagepath'=>base_url() . 'img/aquarius');
		$this->data = array(
			'csspath' => base_url() . 'css/aquarius/',
			'jspath' => base_url() . 'js/aquarius/',
			'imagepath' => base_url() . 'img/aquarius/',
			'path'=>$path,
		);
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
			$this->data['user'] = User::get_user_by_id($this->ionuser->id);
		}
	}
	function assign(){
		$this->check_login();
		$obj = Maintenance_request::get_obj_by_id($this->uri->segment(3));
		$this->data['obj']= $obj;
		$this->data['clients']=Client::get_combo_data();
		$this->data['maintenance_type'] = array('backbone'=>'Backbone','datacenter'=>'Data Center','bts'=>'BTS','pelanggan'=>'Pelanggan');
		$this->data['periods']=array('one time'=>'one time','monthly'=>'monthly','bimonthly'=>'bimonthly','quarter'=>'quarter','semester'=>'semester','weekly'=>'weekly','daily'=>'daily');
		$this->data['required_time1'] = '';
		$this->data['required_time2'] = '';
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['sender']='maintenance_edit';
		$this->data['menuFeed']='maintenancereport';
		if($obj->maintenance_type=='pelanggan'){
			$this->data['tomaintain'] = $obj->client_site;
			$this->load->view('TS/maintenances/assignpelanggan',$this->data);
		}else{
			$this->data['tomaintain'] = Maintenance::getmaintenancename($obj->maintenance_type,$obj->nameofmtype);
			$this->load->view('TS/maintenances/assign',$this->data);
		}
	}
	function index(){
		$this->check_login();
		$this->data['menuFeed']='maintenancereport';
		$this->data['objs']=Maintenance_request::populate();
		$this->data['hours']=Common::gethours();
		$this->data['minutes']=Common::getminutes();
		$this->load->view('TS/maintenances/maintenances',$this->data);
	}
	function addmaintenance(){
		$params = $this->input->post();
		$this->common->send_mail('pw.prayitno@gmail.com','test','test doang');
		echo Maintenance_request::add($params);
	}
	function addmaintenanceuploadform(){
		$params = $this->input->post();
		echo Maintenance_image::add($params);
	}
	function check_login(){
		if(!$this->ion_auth->logged_in()){
			redirect(base_url() . 'index.php/adm/login');
		}
	}
	function get_period($period_id){
		switch($period_id){
			case '1':
			$out = 'One time';
			break;
			case '2':
			$out = 'Yearly';
			break;
			case '3':
			$out = 'Monthly';
			break;
			case '4':
			$out = 'Bimonthly';
			break;
			case '5':
			$out = 'Quarter';
			break;
			case '6':
			$out = 'Semester';
			break;
			case '7':
			$out = 'Daily';
			break;
			case '8':
			$out = 'Weekly';
			break;
		}
		return $out;
	}
	function maintenance(){
		$this->check_login();
		$this->data['objs']=Maintenance_request::populate();
		$this->load->view('adm/maintenances',$this->data);
	}
	function maintenance_edit(){
		$this->check_login();
		$this->data['obj']=Maintenance_request::get_obj_by_id($this->uri->segment(3));
		$this->data['clients']=Client::get_combo_data();
		$this->data['maintenance_type'] = array('backbone'=>'Backbone','datacenter'=>'Data Center','bts'=>'BTS','pelanggan'=>'Pelanggan');
		$this->data['periods']=array('one time'=>'one time','monthly'=>'monthly','bimonthly'=>'bimonthly','quarter'=>'quarter','semester'=>'semester','weekly'=>'weekly','daily'=>'daily');
		$this->data['required_time1'] = '';
		$this->data['required_time2'] = '';
		$this->data['sender']='maintenance_edit';
		$this->data['menuFeed']='maintenancereport';
		$this->load->view('TS/maintenances/maintenance_edit',$this->data);
	}
	function maintenance_addoperator(){
		$params = $this->input->post();
		echo Maintenance_request::add_operator($params);
	}
	function maintenance_removeofficer(){
		$params = $this->input->post();
		echo Maintenance_operator::remove_operator($params);
	}
	function maintenance_afteract(){
		$this->check_login();
		$this->data['obj']=Maintenance_request::get_obj_by_id($this->uri->segment(3));
		$this->data['clients']=Client::get_combo_data();
		$this->data['sender']='maintenance_edit';
		$this->load->view('adm/maintenance_afteract',$this->data);
	}
	function maintenance_add(){
		$this->check_login();
		$this->data['obj']=Client::get_obj_by_id($this->uri->segment(3));
		$this->data['clients']=Client::get_combo_data();
		$this->data['sender']='maintenance_add';
		$this->load->view('adm/maintenance_add',$this->data);
	}
	function maintenance_add2(){
		$this->check_login();
		$this->data['obj']=Client::get_obj_by_id($this->uri->segment(3));
		$this->data['clients']=Client::get_combo_data();
		$this->data['maintenance_type'] = array('backbone'=>'Backbone','datacenter'=>'Data Center','bts'=>'BTS','pelanggan'=>'Pelanggan');
		$this->data['periods']=array(
			'one time'=>'one time',
			'monthly'=>'monthly',
			'bimonthly'=>'bimonthly',
			'quarter'=>'quarter',
			'semester'=>'semester',
			'weekly'=>'weekly',
			'daily'=>'daily'
			);
		$this->data['sender']='maintenance_add2';
		$this->load->view('adm/maintenance_add2',$this->data);
	}
	function maintenance_removeoperator(){
		$params = $this->input->post();
		echo Maintenance_request::remove_operator($params);
	}
	function report(){
		$this->check_login();
		$obj = Maintenance_request::get_obj_by_id($this->uri->segment(3));
		$this->data['obj']= $obj;
		$this->data['clients']=Client::get_combo_data();
		$this->data['maintenance_type'] = array('backbone'=>'Backbone','datacenter'=>'Data Center','bts'=>'BTS','pelanggan'=>'Pelanggan');
		$this->data['periods']=array('one time'=>'one time','monthly'=>'monthly','bimonthly'=>'bimonthly','quarter'=>'quarter','semester'=>'semester','weekly'=>'weekly','daily'=>'daily');
		$this->data['period']=$this->get_period($obj->period);
		$rt1 = Common::longsql_to_datepart($obj->required_time1);
		$rt2 = Common::longsql_to_datepart($obj->required_time2);
		$this->data['required_time1'] = $rt1["day"]."/".$rt1["month"]."/".$rt1["year"];
		$this->data['required_time2'] = $rt2["day"]."/".$rt2["month"]."/".$rt2["year"];
		$this->data['hour1'] = $rt1["hour"];
		$this->data['minute1'] = $rt1["minute"];
		$this->data['hour2'] = $rt2["hour"];
		$this->data['minute2'] = $rt2["minute"];
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['sender']='maintenance_edit';
		$this->data['menuFeed']='maintenancereport';
		if($obj->maintenance_type=='pelanggan'){
			$this->data['tomaintain'] = $obj->client_site;
		}else{
			$this->data['tomaintain'] = Maintenance::getmaintenancename($obj->maintenance_type,$obj->nameofmtype);
		}
		$this->load->view('TS/maintenances/report',$this->data);
	}
	function update(){
		$params = $this->input->post();
		$obj = new Maintenance_request();
		$obj->where('id',$params['id'])->update($params);
		echo $obj->check_last_query();
	}
	function imageadd(){
		$params = $this->input->post();
		rename('./media/tmp/' . $params['path'],'./media/maintenances/' . $params['path']);
		$obj = new Maintenance_image();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
}
