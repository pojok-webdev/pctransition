<?php
class Maintenances extends CI_Controller{
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
	function edit(){
		$id = $this->uri->segment(3);
		$obj = new Maintenance();
		$obj->where('id',$id)->get();
		$this->data['obj'] = $obj;
		$this->load->view('TS/maintenances/edit',$data);
	}
	function index(){
		$this->check_login();
		$this->data['objs']=Maintenance::populate();
		$this->data['hours']=Common::gethours();
		$this->data['minutes']=Common::getminutes();
		$this->data['menuFeed'] = 'maintenance';
		if (isset($this->session->userdata["role"])) {
			switch ($this->session->userdata["role"]) {
				case 'EOS':
					$this->load->model("maintenances/maintenanceschedule");
					$this->data['schedules'] = $this->maintenanceschedule->getschedules();
					$this->load->view('EOS/maintenance_schedules/maintenances',$this->data);
					break;
				case 'TS':
					$this->load->view('TS/maintenance_schedules/maintenances',$this->data);
					break;
				default:
					break;
			}
		} else {
			redirect(base_url() . "adm/chooseRole");
		}
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
	function maintenance_edit(){
		$this->check_login();
		$this->data['obj']=Maintenance_request::get_obj_by_id($this->uri->segment(3));
		$this->data['clients']=Client::get_combo_data();
		$this->data['maintenance_type'] = array('backbone'=>'Backbone','datacenter'=>'Data Center','bts'=>'BTS','pelanggan'=>'Pelanggan');
		//$this->data['periods']=array('one time'=>'one time','monthly'=>'monthly','bimonthly'=>'bimonthly','quarter'=>'quarter','semester'=>'semester','weekly'=>'weekly','daily'=>'daily');
		$this->data['periods']=array('1'=>'one time','2'=>'Yearly','3'=>'monthly','4'=>'bimonthly','5'=>'quarter','6'=>'semester','7'=>'weekly','8'=>'daily');
		$this->data['required_time1'] = '';
		$this->data['required_time2'] = '';
		$this->data['sender']='maintenance_edit';
		$this->data['menuFeed']='maintenancereport';
		if (isset($this->session->userdata["role"])) {
			switch ($this->session->userdata["role"]) {
				case 'EOS':
					$this->load->view('EOS/maintenances/maintenance_edit',$this->data);
					break;
				case 'TS':
					$this->load->view('TS/maintenances/maintenance_edit',$this->data);
					break;
				default:
					break;
			}
		} else {
			redirect(base_url() . "adm/chooseRole");
		}

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
		$this->data['hours']=Common::gethours();
		$this->data['minutes']=Common::getminutes();
		$this->data['menuFeed']='maintenancereport';
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
	function save(){
		$params = $this->input->post();
		echo Maintenance::add($params);
	}
	function update(){
		$params = $this->input->post();
		echo Maintenance::edit($params);
	}
	function schedules(){
		$this->load->view('maintenances/schedules');
	}
	function schedule_add(){
		$this->data['obj'] = Maintenance::get_obj_by_id(0);
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['menuFeed'] = 'maintenance';
		$this->data['periode_type'] = array(
			'1'=>'One time',
			'2'=>'Yearly',
			'3'=>'Monthly',
			'4'=>'Bi-monthly',
			'5'=>'Quarter',
			'6'=>'Semester',
			'7'=>'Daily',
			'8'=>'Weekly',
			);
		$this->data['reminder'] = array(
			'1'=>'H-1',
			'2'=>'H-2',
			'3'=>'H-3',
			'4'=>'H-4',
			'5'=>'H-5',
			'6'=>'H-6',
			'7'=>'H-7'
			);
		$this->load->view('TS/maintenance_schedules/add',$this->data);
	}
	function schedule_edit(){
		$id = $this->uri->segment(3);
		$this->data['obj'] = Maintenance::get_obj_by_id($id);
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['maintenance_types'] = array(
		'backbone'=>'Backbone',
		'datacenter'=>'Data Center',
		'bts'=>'BTS',
		'pelanggan'=>'Pelanggan');
		$this->data['menuFeed'] = 'maintenance';
		$this->data['periode_type'] = array(
			'1'=>'One time',
			'2'=>'Yearly',
			'3'=>'Monthly',
			'4'=>'Bi-monthly',
			'5'=>'Quarter',
			'6'=>'Semester',
			'7'=>'Daily',
			'8'=>'Weekly',
			);
		$this->data['reminder'] = array(
			'1'=>'H-1',
			'2'=>'H-2',
			'3'=>'H-3',
			'4'=>'H-4',
			'5'=>'H-5',
			'6'=>'H-6',
			'7'=>'H-7'
			);
		if (isset($this->session->userdata["role"])) {
			switch ($this->session->userdata["role"]) {
				case 'EOS':
					$this->load->view('EOS/maintenance_schedules/edit',$this->data);
					break;
				case 'TS':
					$this->load->view('TS/maintenance_schedules/edit',$this->data);
					break;
				default:
					break;
			}
		} else {
			redirect(base_url() . "adm/chooseRole");
		}

	}
	function reminder(){
		$objs = new Maintenance();
		$objs->get();
		foreach($objs as $obj){
			$mdatetime = Common::longsql_to_datepart($obj->mdatetime);
			$phpdate = new DateTime($mdatetime['month'].'/'.$mdatetime['day'].'/'.$mdatetime['year']);
			echo "PHP DATE : " . date_format($phpdate,'Y-m-d H:i:s') . ", ";
			switch($obj->reminder){
				case '1':
					$interval = 'P1D';
				break;
				case '2':
					$interval = 'P2D';
				break;
				case '3':
					$interval = 'P3D';
				break;
				case '4':
					$interval = 'P4D';
				break;
				case '5':
					$interval = 'P5D';
				break;
				case '6':
					$interval = 'P6D';
				break;
				case '7':
					$interval = 'P7D';
				break;
			}
			echo "reminder:". $obj->reminder . "(".$interval."), mtype:" . $obj->maintenance_type . "\n";
			$phpdate->sub(new DateInterval($interval));
			$mdatetime = Common::longsql_to_datepart(date_format($phpdate,'Y-m-d H:i:s'));
			switch($obj->maintenance_type){
				case "pelanggan":
					$content = "Dear TS, \r\n\r Pemberitahuan akan adanya Maintenance Pelanggan sebagai berikut:\r\n\r";
					$content.= "<table>";
					$content.="<tr><th>Pelanggan</th><td>:</td><td>".$obj->client_site->client->name."</td></tr>";
					$content.="<tr><th>Alamat Cabang</th><td>:</td><td>".$obj->client_site->address."</td></tr>";
					$content.="<tr><th>Tanggal</th><td>:</td><td>".$obj->mdatetime."</td></tr>";
					$content.= "</table>";
				break;
				default:
					$other = Maintenance::getmaintenancename($obj->maintenance_type,$obj->nameofmtype);
					$content = "Dear TS, \r\n\r Pemberitahuan akan adanya Maintenance sebagai berikut:\r\n\r";
					$content.= "<table>";
					$content.="<tr><th>Jenis Maintenance</th><td>:</td><td>".$obj->maintenance_type."</td></tr>";
					$content.="<tr><th>Nama</th><td>:</td><td>".$other->name."</td></tr>";
					$content.="<tr><th>Tanggal</th><td>:</td><td>".$obj->mdatetime."</td></tr>";
					$content.= "</table>";
				break;
			}
			switch ($obj->period_type){
				case '1':
					echo "PERIODTYPE 1 : " . date('j/m/Y') . "  :  " . $mdatetime["day"]."/".$mdatetime["month"]."/".$mdatetime["year"] . "\n";
					if (date('j/m/Y')==$mdatetime["day"]."/".$mdatetime["month"]."/".$mdatetime["year"]){
						echo "One time confirmed \n";
						$this->insertlog($obj->id,'puji@padi.net.id','[PadiApp] One time maintetnance',$content);
					}
				break;
				case '2'://yearly
				echo "YEARLY \n";
					if (date('j/m')==$mdatetime["day"]."/".$mdatetime["month"]){
						echo "Yearly confirmed \n";
						$this->insertlog($obj->id,'puji@padi.net.id','[PadiApp] Yearly maintenance',$content);
					}
				break;
				case '3'://monthly
				echo "monthLY \n";
					if (date('j')==$mdatetime["day"]){
						echo "Monthly confirmed \n";
						$this->insertlog($obj->id,'puji@padi.net.id','[PadiApp] Monthly maintenance',$content);
					}
				break;
				case '4'://bimonthly
				echo "bimonthLY \n";
					if((date('m') - $mdatetime["month"])%2==0){
						if (date('j')==$mdatetime["day"]){
							echo "BiMonthly confirmed \n";
							$this->insertlog($obj->id,'puji@padi.net.id','[PadiApp] BiMonthly maintenance',$content);
						}
					}
				break;
				case '5'://quarter
				echo "quarter \n";
					if((date('m') - $mdatetime["month"])%4==0){
						if (date('j')==$mdatetime["day"]){
							echo "Quarter Monthly confirmed \n";
							$this->insertlog($obj->id,'puji@padi.net.id','[PadiApp] Quarter Monthly maintenance',$content);
						}
					}
				break;
				case '6'://semester
				echo "semester \n";
					if((date('m') - $mdatetime["month"])%6==0){
						if (date('j')==$mdatetime["day"]){
							echo "Semester confirmed \n";
							$this->insertlog($obj->id,'puji@padi.net.id','[PadiApp] Semester maintenance',$content);
						}
					}
				break;
			}
		}
	}
	function insertlog($maintenanceid,$recipient,$subject,$content){
		$objlog = new Maintenancelog();
		$objlog->where('maintenance_id',$maintenanceid)->where('datelog',date('d/m/Y'))->get();
		if($objlog->result_count()==0){
			$this->common->send_mail($recipient,$subject . '-' . $maintenanceid . '-' . date('d/m/Y'),$content);
			$this->createRequest($maintenanceid);
			$log = new Maintenancelog();
			$log->maintenance_id = $maintenanceid;
			$log->datelog = date('d/m/Y');
			$log->save();
		}
	}
	function createRequest($maintenance_id){
		$mt = new Maintenance();
		$mt->where('id',$maintenance_id)->get();
		$mdatetime = Common::longsql_to_datepart($mt->mdatetime);
		$obj = new Maintenance_request();
		$obj->maintenance_type = $mt->maintenance_type;
		switch($mt->maintenance_type){
			case 'pelanggan':
			$obj->client_site_id = $mt->client_site_id;
			break;
		}
		$obj->maintenance_date = date('Y') . '-' . $mdatetime['month'] . '-' . date('j');
		$obj->nameofmtype = $mt->nameofmtype;
		$obj->description = $mt->description;
		$obj->is_payable = $mt->ispayable;
		$obj->period = $mt->period_type;
		$obj->save();
	}

	function test(){
		$other = Maintenance::getmaintenancename("backbone",1);
		echo $other->name;
	}

}
