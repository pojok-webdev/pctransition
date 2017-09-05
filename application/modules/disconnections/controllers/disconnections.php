<?php
class Disconnections extends CI_Controller{
	var $ionuser;
	function __construct(){
		parent::__construct();
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
			$this->data['user'] = User::get_user_by_id($this->ionuser->id);
		}
	}
	function add(){
		$this->data['obj'] = Client::get_obj_by_id($this->uri->segment(3));
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['officers']=User::get_user_by_group('TS');
		$this->data['menuFeed'] = 'disconnection';
		if($this->session->userdata["role"]=='Sales'){
			$this->load->view('Sales/disconnections/add',$this->data);
		}
		if($this->session->userdata["role"]=='TS'){
			$this->load->view('TS/disconnections/add',$this->data);
		}
		if($this->session->userdata["role"]=='Accounting'){
			$this->load->view('Accounting/disconnections/add',$this->data);
		}
	}
	function check_login(){
		if(!$this->ion_auth->logged_in()){
			redirect(base_url() . 'index.php/adm/login');
		}
	}
	function device_withdrawal(){
		$params = $this->input->post();
		$sql = "select device_id,modul from withdrawals ";
		$sql.= "where device_id='".$params["device_id"]."' and modul='".$params["modul"]."' and device='".$params["device"]."'";
		$que = $this->db->query($sql);
		if($que->num_rows()==0){
			$obj = new Withdrawal();
			foreach($params as $key=>$val){
				$obj->$key = $val;
			}
			$obj->save();
			echo "item just withdrawed ! " . $this->db->insert_id();
		}else{
			echo "item already withdrawed !";
		}
	}	
	function entryreport(){
		$this->check_login();
		$obj = Disconnection::get_obj_by_id($this->uri->segment(3));
		switch($obj->disconnectiontype){
			case "0":
			$dtype = "Reaktifasi";
			break;
			case "1":
			$dtype = "Isolir";
			break;
			case "2":
			$dtype = "Temporer";
			break;
			case "3":
			$dtype = "Permanen";
			break;
			default:
			$dtype = "--";
			break;
		}
		
		$data = array(
			"obj"=>$obj,
			"menuFeed"=>"Disconnection",
			"antennas"=>Disconnection::get_antennas_by_id($this->uri->segment(3)),
			"apwifis"=>Disconnection::get_apwifi_by_id($this->uri->segment(3)),
			"devices"=>Disconnection::get_devices_by_id($this->uri->segment(3)),
			"pccards"=>Disconnection::get_pccards_by_id($this->uri->segment(3)),
			"pics"=>Disconnection::get_pics_by_id($this->uri->segment(3)),
			"routers"=>Disconnection::get_routers_by_id($this->uri->segment(3)),
			"switches"=>Disconnection::get_switches_by_id($this->uri->segment(3)),
			"wireless_radios"=>Disconnection::get_wireless_radios_by_id($this->uri->segment(3)),
			"dtype"=>$dtype
		);
		$this->load->view("TS/disconnections/report",$data);
	}
	function index(){
		$this->check_login();
		$status = $this->uri->segment(3);
		$this->data['menuFeed']='disconnection';
		$this->data['objs'] = Disconnection::populate($status);
		$this->data['hours'] = common::gethours();
		$this->data['minutes'] = common::getminutes();
		switch($this->session->userdata["role"]){
		case 'Sales':
			$this->load->view('Sales/disconnections/disconnections',$this->data);
			break;
		case 'TS':
			$this->load->view('TS/disconnections/disconnections',$this->data);
			break;
		case 'Accounting':
			$this->load->view('Accounting/disconnections/disconnections',$this->data);
			break;
		case 'Umum dan Warehouse':
			$this->load->view('Warehouse/disconnections/disconnections',$this->data);
		break;
		}
	}
	function edit(){
		$this->check_login();
		$this->data['obj'] = Disconnection::get_obj_by_id($this->uri->segment(3));
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['officers']=User::get_user_by_group('TS');
		$this->data['menuFeed']='disconnection';
		switch($this->session->userdata["role"]){
		case 'Sales':
			$this->load->view('Sales/disconnections/edit',$this->data);
			break;
		case 'TS':
			redirect("/disconnections/entryreport/".$this->uri->segment(3));
//			$this->load->view('TS/disconnections/edit',$this->data);
		break;
		case 'Accounting':
			$this->load->view('Accounting/disconnections/edit',$this->data);
		break;
		case'Umum dan Warehouse':
			$this->load->view('Warehouse/disconnections/edit',$this->data);
			break;
		}
	}
	function view(){
		$this->check_login();
		$this->data['obj'] = Disconnection::get_obj_by_id($this->uri->segment(3));
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['officers']=User::get_user_by_group('TS');
		$this->data['menuFeed']='disconnection';
		switch($this->session->userdata["role"]){
		case 'Sales':
			$this->load->view('Sales/disconnections/edit',$this->data);
			break;
		case 'TS':
			$this->load->view('TS/disconnections/view',$this->data);
			break;
		case 'Accounting':
			$this->load->view('Accounting/disconnections/edit',$this->data);
		break;
		case 'Umum dan Warehouse':
			$this->load->view('Warehouse/disconnections/edit',$this->data);
			break;
		}
	}
	function detail(){
		$this->check_login();
		$this->data['obj'] = Disconnection::get_obj_by_id($this->uri->segment(3));
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['officers']=User::get_user_by_group('TS');
		switch($this->session->userdata["role"]){
		case 'Sales':
			$this->load->view('Sales/disconnections/detail',$this->data);
		break;
		case 'TS':
			$this->load->view('TS/disconnections/detail',$this->data);
		break;
		case 'Accounting':
			$this->load->view('Accounting/disconnections/detail',$this->data);
		break;
		case 'Umum dan Warehouse':
			$this->load->view('Warehouse/disconnections/detail',$this->data);
			break;
		}
	}
	function detail_temporer(){
		$this->check_login();
		$this->data['obj'] = Disconnection::get_obj_by_id($this->uri->segment(3));
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['officers']=User::get_user_by_group('TS');
		if($this->session->userdata["role"]==='Sales'){
			$this->load->view('Sales/disconnections/detail_temporer',$this->data);
		}
	}
	function filter(){
		$this->check_login();
		$this->data['menuFeed']='disconnection';
		$this->data['hours'] = common::gethours();
		$this->data['minutes'] = common::getminutes();
		switch($this->uri->segment(3)){
			case "executed":
				$this->data['objs'] = Disconnection::populate('1');
				break;
			case "notexecuted":
				$this->data['objs'] = Disconnection::populate('0');
				break;
		}
		switch($this->session->userdata["role"]){
			case 'Sales':
				$this->load->view('Sales/disconnections/disconnections',$this->data);
				break;
			case 'TS':
				$this->load->view('TS/disconnections/disconnections',$this->data);
				break;
			case 'Accounting':
				$this->load->view('Accounting/disconnections/disconnections',$this->data);
				break;
			case 'Umum dan Warehouse':
				$this->load->view('Warehouse/disconnections/disconnections',$this->data);
			break;
		}
	}
	function reactivation(){
		$this->check_login();
		$this->data['obj'] = Disconnection::get_obj_by_id($this->uri->segment(3));
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['officers']=User::get_user_by_group('TS');
		$this->data['menuFeed']='disconnection';
		if($this->session->userdata["role"]==='Sales'){
			$this->load->view('Sales/disconnections/reactivation',$this->data);
		}
	}
	function permanent(){
		$this->check_login();
		$this->data['obj'] = Disconnection::get_obj_by_id($this->uri->segment(3));
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['officers']=User::get_user_by_group('TS');
		$this->data['menuFeed'] = 'disconnection';
		if($this->session->userdata["role"]==='Sales'){
			$this->load->view('Sales/disconnections/permanent',$this->data);
		}
	}
	function getData(){
		$id = $this->uri->segment(3);
		$obj = new Disconnection();
		$obj->where('id',$id)->get();
		echo '{"executed":' . $obj->executed . '}';
	}
	function getmaxdate(){
		$params = $this->input->post();
		$obj = new Disconnection();
		$obj->query("select (finishdate+interval 1 day)begin,(startdate+interval 3 month-interval 1 day)next3month from disconnections where id=" . $params['id']);
		echo '{"maxdate":"'.$obj->next3month.'","mindate":"'.$obj->begin.'"}';
	}
	function officeradd(){
		$params = $this->input->post();
		$obj = new Disconnection_operator();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function officerremove(){
		$params = $this->input->post();
		$obj = new Disconnection_operator();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
	}
	function reminder(){
		$objs = new Disconnection();
		$objs->get();
		foreach($objs as $obj){
			if($obj->disconnectiontype=='3'){
				$content = "Reminder penarikan perangkat";
				$content.= "<table>";
				$content.= "<tr><td>Nama Pelanggan</td><td>:</td><td>".$obj->client_site->client->name."</td></tr>";
				$content.= "<tr><td>Alamat Pelanggan</td><td>:</td><td>".$obj->client_site->address."</td></tr>";
				$content.= "</table>";
				$this->insertlog($obj->id,'puji@padi.net.id','[PadiApp] Reminder penarikan perangkat',$content);
			}
			if($obj->disconnectiontype=='2'){
				$mdatetime = Common::longsql_to_datepart($obj->reactivationdate);
				if(strtotime($mdatetime["year"] . "/" . $mdatetime["month"] . "/" . $mdatetime["day"])>time() ){
					$content = "Reminder Masa diskoneksi temporer hendak berakhir";
					$content.= "<table>";
					$content.= "<tr><td>Nama Pelanggan</td><td>:</td><td>".$obj->client_site->client->name."</td></tr>";
					$content.= "<tr><td>Alamat Pelanggan</td><td>:</td><td>".$obj->client_site->address."</td></tr>";
					$content.= "</table>";
					$this->insertlog($obj->id,'puji@padi.net.id','[PadiApp] Reminder Masa Diskoneksi Temporer hendak berakhir',$content);
				}
			}
		}
	}
	function test(){
		$today = getdate();
		echo "mday " . $today["mday"] . "\n";
		echo "month " . $today["month"] . "\n";
		echo "year " . $today["year"] . "\n";
		echo "weekday " . $today["weekday"] . "\n";
		echo "hours " . $today["hours"] . "\n";
		echo "minutes " . $today["minutes"] . "\n";
		echo "seconds " . $today["seconds"] . "\n";
		echo "wday " . $today["wday"] . "\n";
		echo "getdate()" . $today . "\n";
		echo "\n";
		echo "date('j')" . date("j") . "\n";
		echo "date('j/m/Y')" . date("j/m/Y") . "\n";
		echo "now()" . now() . "\n";
		echo "time()" . time() . "\n";
		echo "comparison with strtotime()" . strtotime("2014/11/14") . " && " . time() . "\n";
	}
	function toggledevstatus(){
		$params = $this->input->post();
		$sql = "update withdrawals set status=case status when '1' then '0' else '1' end ";
		$sql.= "where id='".$params["id"]."'";
		$que = $this->db->query($sql);
		echo $sql;
	}
	function insertlog($disconnection_id,$recipient,$subject,$content){
		$today = getdate();
		$objlog = new Disconnectionlog();
		$objlog->query("select * from disconnectionlogs a left outer join disconnections b on b.id=a.disconnection_id where disconnection_id='".$disconnection_id."' and datelog='".date('d/m/Y')."' and withdrawaldate is null");
		if($objlog->result_count()==0){
			$this->common->send_mail($recipient,$subject . '-' . $disconnection_id . '-' . date('d/m/Y'),$content,array("ketut@padi.net.id","reinhard@padi.net.id"));
			$log = new Disconnectionlog();
			$log->disconnection_id = $disconnection_id;
			$log->datelog = date('d/m/Y');
			$log->hourlog = $today['hours'];
			$log->save();
		}
	}
	function save(){
		$params = $this->input->post();
		$obj = new Disconnection();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		App_log::create_log($obj->check_last_query());
		echo $this->db->insert_id();
	}
	function sendemail(){
		$params = $this->input->post();
		$content = "Pemberitahuan tentang perubahan jenis Pemutusan pada" . $params['clientName'] . " \n";
		$content.= "Jenis Perubahan : " . $params['disconnectionType'];
		$this->common->send_mail('puji@padi.net.id','[PadiApp] Notifikasi Perubahan Status Diskoneksi '.$params['clientName'],$content,array("ketut@padi.net.id","reinhard@padi.net.id"));
	}
	function update(){
		$params = $this->input->post();
		$obj = new Disconnection();
		$obj->where('id',$params['id'])->update($params);
		App_log::create_log($obj->check_last_query());
		echo $obj->check_last_query();
	}
	function feedData(){
		$objs = Disconnection::populate();
		$rows = array();
		foreach($objs as $obj){
			$vals = array();
			switch($obj->status){
				case "0":
				$status = "Dalam Progress ";
				break;
				default:
				$status = "Sudah dilaksanakan";
				break;
			}
			switch($obj->disconnectiontype){
				case "1":
				$type = "Isolir";
				break;
				case "2":
				$type = "Temporer";
				break;
				case "3":
				$type = "Permanen";
				break;
				default:
				$type = "Aktifasi Kembali";
				break;
			}
			array_push($vals,'"status":"'.$status.'"');
			array_push($vals,'"disconnectiontype":"'.$type.'"');
			array_push($vals,'"finishdate":"'.common::sql_to_human_datetime($obj->finishdate).'"');
			array_push($vals,'"reactivationdate":"'.common::sql_to_human_datetime($obj->reactivationdate).'"');
			$val = '{"'.$obj->id.'":{' . implode(",",$vals) . '}}';
			array_push($rows,$val);
		}
		echo '['.implode(",",$rows).']';
	}
}
