<?php
class Troubleshoots extends CI_Controller{
	var $data,$ionuser;
	function __construct(){
		parent::__construct();
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
			$this->data['user'] = User::get_user_by_id($this->ionuser->id);
		}
		$this->load->helper('ticket');
		$this->load->helper('device');
		$this->load->helper('user');
		$this->load->helper('troubleshoot');
	}
	function bapreview(){
		$id = $this->uri->segment(3);
		$sql = "select id,name,description,troubleshoot_request_id,img from troubleshoot_bas where id = " . $id;
		$query = $this->db->query($sql);
		$result = $query->result();
		$this->data['menuFeed']='troubleshoot';
		$this->data['obj']=$result[0];
		$this->load->view('TS/troubleshoots/gallery',$this->data);
	}
	function check_login(){
		if(!$this->ion_auth->logged_in()){
			redirect(base_url() . 'index.php/adm/login');
		}
	}
	function drop_implementer(){
		$params = $this->input->post();
		echo Troubleshoot_implementer::remove($params['id']);
	}
	function device_withdrawal(){
		$params = $this->input->post();
		$obj = new Withdrawal();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo "withdrawed ! " . $this->db->insert_id();
	}
	function edit(){
		$this->check_login();
		$troubleshootid = $this->uri->segment(3);
		$obj = new Troubleshoot_request();
		$obj->where('id',$troubleshootid)->get();
		$this->data['menuFeed'] = 'troubleshoot';
		$this->data['obj']=$obj;
		$this->data['clients']=Client::get_combo_data();
		$this->data['sender']='troubleshoot_add';
		$this->data['services'] = Service::get_combo_data();
		$this->data['routers'] = array();
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();

		if($this->session->userdata["role"]==='TS'){
			$this->load->view('TS/troubleshoots/edit',$this->data);
			//$this->load->view('TS/troubleshoots/entry_report',$this->data);
		}else{
			redirect(base_url());
		}
	}
	function entry_report(){
		$this->check_login();
		$this->load->helper('sites');
		
		$this->data['obj']=get_obj_by_id($this->uri->segment(3));
		$this->data['bas']=get_ba_by_id($this->uri->segment(3));
		$this->data['images']=get_images_by_id($this->uri->segment(3));
		$this->data['officers']=get_officer_by_id($this->uri->segment(3));
		$this->data['tmaterials']=get_materials_by_id($this->uri->segment(3));
		
				//get_images_by_idget_materials_by_id
		/*switch(){
			
		}*/
		$this->data['services'] = Service::get_combo_data();
		$this->data['hours'] = Common::gethours();
		$this->data['aps']=PAP::get_combo_data();
		//$this->data['antennas']=Device::get_combo_data(8);
		$this->data['antennas']=getvalcombodata(array(8,20,4,7,3,6,5));
		$this->data['btstowers']=Pbtstower::get_combo_data();
		$this->data['clients']=Client::get_combo_data();
		$this->data['devices']=Device::get_combo_data();
		$this->data['materials']=Material::get_combo_data();
		$this->data['materialtypes']=Materialtype::get_combo_data();
		//$this->data['pccards']=Device::get_combo_data(2);
		$this->data['pccards']=getvalcombodata(array(2));
		//$this->data['boards']=Device::get_combo_data(1);
		$this->data['boards']=getvalcombodata(array(1));
		//$this->data['routers']=Device::get_combo_data(14);
		$this->data['routers']=getvalcombodata(array(14));
		//$this->data['switches']=Device::get_combo_data(15);
		$this->data['switches']=getvalcombodata(array(15));
		//$this->data['routersboards']=Device::get_combo_data(array(1,14));
		$this->data['routersboards']=getvalcombodata(array(1,14));
		//$this->data['apwifis']=Device::get_combo_data(13);
		$this->data['apwifis']=getvalcombodata(array(13));
		$this->data['materials'] = Materialtype::get_combo_data();
		$this->data['minutes'] = Common::getminutes();
		$this->data['ports'] = sitehlp_getports(24);
		$this->data['menuFeed'] = 'troubleshoot';
		if($this->session->userdata["role"]==='TS'){
			$this->load->view('TS/troubleshoots/entry_report',$this->data);
		}else{
			redirect(base_url());
		}
	}
	function view_report(){
		$this->check_login();
		$this->load->helper('sites');
		
		$this->data['obj']=Troubleshoot_request::get_obj_by_id($this->uri->segment(3));
		/*switch(){
			
		}*/
		$this->data['services'] = Service::get_combo_data();
		$this->data['hours'] = Common::gethours();
		$this->data['aps']=PAP::get_combo_data();
		$this->data['antennas']=Device::get_combo_data(8);
		$this->data['btstowers']=Pbtstower::get_combo_data();
		$this->data['clients']=Client::get_combo_data();
		$this->data['devices']=Device::get_combo_data();
		$this->data['materials']=Material::get_combo_data();
		$this->data['materialtypes']=Materialtype::get_combo_data();
		$this->data['pccards']=Device::get_combo_data(2);
		$this->data['boards']=Device::get_combo_data(1);
		$this->data['routers']=Device::get_combo_data(14);
		$this->data['switches']=Device::get_combo_data(15);
		$this->data['routersboards']=Device::get_combo_data(array(1,14));
		$this->data['apwifis']=Device::get_combo_data(13);
		$this->data['materials'] = Materialtype::get_combo_data();
		$this->data['minutes'] = Common::getminutes();
		$this->data['ports'] = sitehlp_getports(24);
		$this->data['menuFeed'] = 'troubleshoot';
		if($this->session->userdata["role"]==='TS'){
			$this->load->view('TS/troubleshoots/view_report',$this->data);
		}else{
			redirect(base_url());
		}
	}
	function report(){
		$id = $this->uri->segment(3);
		$objs = new Troubleshoot_request();
		$objs->where('id',$id)->get();
		$officers = array();
		foreach($objs->troubleshoot_officer as $officer){
			array_push($officers,$officer->name);
		}
		$officerstr = implode(',',$officers);
		$stt = "PROGRESS";
		//echo 'Status '.$objs->status;
		switch($objs->status){
			case "0":
			$stt = "PROGRESS";
			break;
			case "1":
			$stt = "SOLVED";
			break;
			case "2":
			$stt = "MONITORING";
			break;
			default:
			$stt = "PROGRESS";
			break;
		}
		$data = array(
			'objs'=>$objs,
			'complaint'=>$objs->complaint,
			'officers'=>$officerstr,
			'status'=>$stt,
			'troubleshootid'=>$this->uri->segment(3)
		);
		$this->load->view('TS/troubleshoots/troubleshootreport',$data);
	}
	function getdata(){
		$id = $this->uri->segment(3);
		$sql = "select nameofmtype,business_field,b.address,case when a.pic_name is null then '' else a.pic_name end pic,";
		$sql.= "case when group_concat(d.name) is null then '' else group_concat(d.name) end officers,";
		$sql.= "case when troubleshoot_date is null then '' else troubleshoot_date end troubleshoot_date, ";
		$sql.= "case a.status when '1' then 'Selesai' when '0' then 'Belum selesai' end status,a.description ";
		$sql.= "from troubleshoot_requests a ";
		$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
		$sql.= "left outer join clients c on c.id=b.client_id ";
		$sql.= "left outer join troubleshoot_officers d on d.troubleshoot_request_id = a.id ";
		$sql.= "where a.id=".$id." ";
		$sql.= "group by a.id ";
		$que = $this->db->query($sql);
		$res = $que->result();
		$obj = $res[0]; 
		//$objs = new Troubleshoot_request();
		//$objs->where('id',$id)->get();
		$arr = array();
		$out = '{"name":"'.$obj->nameofmtype.'",';
		$out.= '"nameofmtype":"'.$obj->nameofmtype.'",';
		$out.= '"business_field":"'.$obj->business_field.'",';
		$out.= '"address":"'.$obj->address.'",';
		$out.= '"surveyors":"'.$obj->officers.'",';
		$out.= '"pic":"'.$obj->pic.'",';
		$out.= '"status":"'.$obj->status.'",';
		$out.= '"description":"'.$obj->description.'",';
		$out.= '"troubleshoot_date":"'.$obj->troubleshoot_date.'"}';
		echo $out;
	}
	function getresume(){
		$id = $this->uri->segment(3);
		$sql = "select case when resume is null then '-' else resume end resume from troubleshoot_requests where id=".$id;
		$que = $this->db->query($sql);
		$res = $que->result();
		echo $res[0]->resume;
	}	
	function getactivities(){
		$id = $this->uri->segment(3);
		$sql = "select case when activities is null then '-' else activities end activities from troubleshoot_requests where id=".$id;
		$que = $this->db->query($sql);
		$res = $que->result();
		echo $res[0]->activities;
	}	
	function index(){
		$this->check_login();
		$this->data['menuFeed'] = 'troubleshoot';
		switch($this->session->userdata["role"]){
			case 'Sales':
				$this->load->model("troubleshoot_requests/troubleshoot");
				$this->data['objs'] = $this->troubleshoot->getTroubleshoots();
				$this->load->view('Sales/troubleshoots',$this->data);
			break;
			case 'TS':
				$this->data['objs'] = ts_populate();
				$this->load->view('TS/troubleshoots/index',$this->data);
			break;
			case 'CRO':
				$this->data['objs'] = ts_populate();
				$this->load->view('CRO/troubleshoots/index',$this->data);
			break;
			case 'EOS':
//				redirect("/tickets");
				$this->data['objs'] = ts_populate();
				$this->load->view('TS/troubleshoots/index',$this->data);
			break;
		}
	}
	function reportrouters(){
		$params = $this->input->post();
		$sql = "select id,tipe,macboard,barcode,ip_public,ip_private,user,password,location,barcode,serialno,milikpadinet ";
		$sql.= "from troubleshoot_routers ";
		$sql.= "where troubleshoot_request_id=".$params["troubleshoot_request_id"];
		$que = $this->db->query($sql);
		$row = $que->result();
		$arr = array();
		foreach($row as $res){
			array_push($arr,'{"id":"'.$res->id.'","ip_public":"'.$res->ip_public.'","barcode":"'.$res->barcode.'","tipe":"'.$res->tipe.'","ip_private":"'.$res->ip_private.'","user":"'.$res->user.'","password":"'.$res->password.'","location":"'.$res->location.'","barcode":"'.$res->barcode.'","serialno":"'.$res->serialno.'","milikpadinet":"'.$res->milikpadinet.'"}');
		}
		$out = '{"data":['.implode(",",$arr).']}';
		echo $out;
	}	
	function reportapwifis(){
		$params = $this->input->post();
		$sql = "select id,tipe,macboard,barcode,ip_address,essid,user,password,location,barcode,serialno,security_key, ";
		$sql.= "case status when '0' then 'Hilang' when '1' then 'Baik' when '2' then 'Rusak' end status ";
		$sql.= "from troubleshoot_apwifis ";
		$sql.= "where troubleshoot_request_id=".$params["troubleshoot_request_id"];
		$que = $this->db->query($sql);
		$row = $que->result();
		$arr = array();
		foreach($row as $res){
			$str = '{"id":"'.$res->id.'",';
			$str.= '"macboard":"'.$res->macboard.'",';
			$str.= '"tipe":"'.$res->tipe.'",';
			$str.= '"ip_address":"'.$res->ip_address.'",';
			$str.= '"user":"'.$res->user.'",';
			$str.= '"password":"'.$res->password.'",';
			$str.= '"location":"'.$res->location.'",';
			$str.= '"barcode":"'.$res->barcode.'",';
			$str.= '"serialno":"'.$res->serialno.'",';
			$str.= '"status":"'.$res->status.'",';
			$str.= '"security_key":"'.$res->security_key.'"}';
			array_push($arr,$str);
		}
		$out = '{"data":['.implode(",",$arr).']}';
		echo $out;
	}	
	function reportwirelessboards(){
		$params = $this->input->post();
		$sql = "select id,tipe,macboard,barcode,ip_address,essid,user,password,location,barcode,serialno,security_key ";
		$sql.= "from troubleshoot_apwifis ";
		$sql.= "where troubleshoot_request_id=".$params["troubleshoot_request_id"];
		$que = $this->db->query($sql);
		$row = $que->result();
		$arr = array();
		foreach($row as $res){
			$str = '{"id":"'.$res->id.'",';
			$str.= '"macboard":"'.$res->macboard.'",';
			$str.= '"tipe":"'.$res->tipe.'",';
			$str.= '"ip_address":"'.$res->ip_address.'",';
			$str.= '"user":"'.$res->user.'",';
			$str.= '"password":"'.$res->password.'",';
			$str.= '"location":"'.$res->location.'",';
			$str.= '"barcode":"'.$res->barcode.'",';
			$str.= '"serialno":"'.$res->serialno.'",';
			$str.= '"security_key":"'.$res->security_key.'"}';
			array_push($arr,$str);
		}
		$out = '{"data":['.implode(",",$arr).']}';
		echo $out;
	}	
	function reportswitches(){
		$params = $this->input->post();
		$sql = "select id,name,mac,barcode,serialno,";
		$sql.= "case status when '0' then 'Hilang' when '1' then 'Baik' when '2' then 'Rusak' end status ";
		$sql.= "from troubleshoot_switches ";
		$sql.= "where troubleshoot_request_id=".$params["troubleshoot_request_id"];
		$que = $this->db->query($sql);
		$row = $que->result();
		$arr = array();
		foreach($row as $res){
			$str = '{"id":"'.$res->id.'",';
			$str.= '"mac":"'.$res->mac.'",';
			$str.= '"name":"'.$res->name.'",';
			$str.= '"barcode":"'.$res->barcode.'",';
			$str.= '"serialno":"'.$res->serialno.'"}';
			array_push($arr,$str);
		}
		$out = '{"data":['.implode(",",$arr).']}';
		echo $out;
	}	
	function reportpccards(){
		$params = $this->input->post();
		$sql = "select id,name,macaddress,barcode,serialno,description, ";
		$sql.= "case status when '0' then 'Hilang' when '1' then 'Baik' when '2' then 'Rusak' end status ";
		$sql.= "from troubleshoot_pccards ";
		$sql.= "where troubleshoot_request_id=".$params["troubleshoot_request_id"];
		$que = $this->db->query($sql);
		$row = $que->result();
		$arr = array();
		foreach($row as $res){
			$str = '{"id":"'.$res->id.'",';
			$str.= '"name":"'.$res->name.'",';
			$str.= '"status":"'.$res->status.'",';
			$str.= '"macaddress":"'.$res->macaddress.'",';
			$str.= '"barcode":"'.$res->barcode.'",';
			$str.= '"serialno":"'.$res->serialno.'"}';
			array_push($arr,$str);
		}
		$out = '{"data":['.implode(",",$arr).']}';
		echo $out;
	}
	
	function reportdevices(){
		$params = $this->input->post();
		$sql = "select id,tipe,macboard,barcode,ip_address,essid,user,password,location,barcode,serialno,security_key ";
		$sql.= "from troubleshoot_apwifis ";
		$sql.= "where troubleshoot_request_id=".$params["troubleshoot_request_id"];
		$que = $this->db->query($sql);
		$row = $que->result();
		$arr = array();
		foreach($row as $res){
			$str = '{"id":"'.$res->id.'",';
			$str.= '"macboard":"'.$res->macboard.'",';
			$str.= '"tipe":"'.$res->tipe.'",';
			$str.= '"ip_address":"'.$res->ip_address.'",';
			$str.= '"user":"'.$res->user.'",';
			$str.= '"password":"'.$res->password.'",';
			$str.= '"location":"'.$res->location.'",';
			$str.= '"barcode":"'.$res->barcode.'",';
			$str.= '"serialno":"'.$res->serialno.'",';
			$str.= '"security_key":"'.$res->security_key.'"}';
			array_push($arr,$str);
		}
		$out = '{"data":['.implode(",",$arr).']}';
		echo $out;
	}			
	function reportimages(){
		$params = $this->input->post();
		$sql = "select id,name,description,img from troubleshoot_images ";
		$sql.= "where troubleshoot_request_id=".$params["troubleshoot_request_id"];
		$que = $this->db->query($sql);
		$row = $que->result();
		$arr = array();
		foreach($row as $res){
			array_push($arr,'{"id":"'.$res->id.'","name":"'.$res->name.'","description":"'.$res->description.'","img":"'.$res->img.'"}');
		}
		$out = '{"data":['.implode(",",$arr).']}';
		echo $out;
	}
	function reportmaterials(){
		$params = $this->input->post();
		$sql = "select id,tipe,name,description from troubleshoot_materials ";
		$sql.= "where troubleshoot_request_id=".$params["troubleshoot_request_id"];
		$que = $this->db->query($sql);
		$row = $que->result();
		$arr = array();
		foreach($row as $res){
			array_push($arr,'{"id":"'.$res->id.'","name":"'.$res->name.'","tipe":"'.$res->tipe.'","description":"'.$res->description.'"}');
		}
		$out = '{"data":['.implode(",",$arr).']}';
		echo $out;		
	}
	function request(){
		$this->data['menuFeed'] = 'troubleshoot';
		$this->data['objs'] = Client_site::populate();
		$this->data['return_page']='Sales/troubleshoot_add/';
		$this->load->view('Sales/add_troubleshoot_lookup',$this->data);
	}
	function saverouter(){
		$params = $this->input->post();
		$obj = new site_router();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function troubleshootadd(){
		$params = $this->input->post();
		echo Troubleshoot_request::add($params);
	}
	function troubleshootedit(){
		$params = $this->input->post();
		echo Troubleshoot_request::edit($params);
	}
	function add(){
		$this->check_login();
		$ticketid = $this->uri->segment(3);
		//$this->data['obj']=Survey_request::get_obj_by_id($this->uri->segment(3));
		$this->data['ticketid'] = $ticketid;
		$this->data['menuFeed'] = 'troubleshoot';
		$this->data['obj']=ticket_getticket($ticketid);//Client_site::get_obj_by_id($this->uri->segment(3));
		$this->data['clients']=Client::get_combo_data();
		$this->data['sender']='troubleshoot_add';
		$this->data['services'] = Service::get_combo_data();
		$this->data['routers'] = array();
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->load->view('TS/troubleshoots/add',$this->data);
	}
	function removerouter(){
		//$params = $this->input->post();
		$params = array('status'=>'1','ioflag'=>'2');
		$obj = new Troubleshoot_router();
		foreach($params as $key=>$val){
			$obj->key = $val;
		}
		$obj->save();
		//echo $this->db->insert_id();
		echo $params['status'] . ' an ' . $params['ioflag'];
	}
	function save(){
		$params = $this->input->post();
		echo Troubleshoot_request::add($params);
	}
	function saveDevice(){
		$params = $this->input->post();
		$className = $params['className'];
		unset ($params['className']);
		//echo $className::insert($params);
		$obj = new $className();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function save_material(){
		$params = $this->input->post();
		echo Troubleshoot_material::insert($params);
	}
	function save_router(){
		$params = $this->input->post();
		echo Troubleshoot_router::insert($params);
	}
	function save_pccard(){
		$params = $this->input->post();
		echo Troubleshoot_pccard::insert($params);
	}
	function save_apwifi(){
		$params = $this->input->post();
		echo Troubleshoot_apwifi::insert($params);
	}
	function save_implementer(){
		$params = $this->input->post();
		echo Troubleshoot_implementer::insert($params);
	}
	function save_switch(){
		$params = $this->input->post();
		echo Troubleshoot_switch::insert($params);
	}
	function save_device(){
		$params = $this->input->post();
		echo Troubleshoot_device::insert($params);
	}
	function save_image(){
		$params = $this->input->post();
		$obj = new Troubleshoot_image();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function removeimage(){
		$params = $this->input->post();
		$obj = new Troubleshoot_image();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
	function update_image(){
		$params = $this->input->post();
		$obj = new Troubleshoot_image();
		$obj->where('id',$params['id'])->update($params);
		echo $obj->check_last_query();
	}
	function troubleshootdeviceadd(){
		$params = $this->input->post();
		echo Troubleshootdevice::add($params);
	}
	function troublesiteadd(){
		$params = $this->input->post();
		echo Troubleshootsite::add($params);
	}
	function troubleshoot_site(){
		$this->check_login();
		$id = $this->uri->segment(3);
		$path = array(
			'csspath' => base_url() . 'css/aquarius/',
			'jspath' => base_url() . 'js/aquarius/',
			'imagepath' => base_url() . 'img/aquarius/',
			'user'=>User::get_user_by_id($this->user->id)
			);
		$data = array(
			'aps'=>PAP::get_combo_data(),
			'obj'=>Troubleshootsite::get_obj_by_id($id),
			'btstowers'=>Pbtstower::get_combo_data(),
			'clients'=>Client::get_combo_data(),
			'devicetypes'=>Devicetype::get_combo_data(),
			'devices'=>Device::get_combo_data(),
			'path'=>$path,
			'sender'=>'troubleshoot_edit',
		);
		$data = array_merge($data,$this->data);
		$this->load->view('Sales/troubleshoot_site',$data);
	}
	function troubleshootremovesite(){
		$params = $this->input->post();
		echo Troubleshootsite::remove($params['id']);
	}
	function result(){
		$uri = $this->uri->segment(3);
		$this->data['obj']=Troubleshoot_request::get_obj_by_id($this->uri->segment(3));
		$this->data['services'] = Service::get_combo_data();
		$this->load->view('TS/troubleshoots/result',$this->data);
	}
	function getTicketInfo(){
		$params = $this->input->post();
		$obj = new Ticket();
		$obj->where('id',$params['id'])->get();
		echo '{"client_id":"' . $obj->client_id . '","requesttype":"' . $obj->requesttype . '","clientname":"' . $obj->clientname . '"}';
	}
	function getTroubleshootInfo(){
		$params = $this->input->post();
		$obj = new Troubleshoot();
		$obj->where('id',$params['id'])->get();
		echo '{"client_id":"' . $obj->client_id . '","requesttype":"' . $obj->requesttype . '","clientname":"' . $obj->clientname . '"}';
	}
	function update(){
		$params = $this->input->post();
		echo Troubleshoot_request::edit($params);
	}
	function used_device(){
		$request_id = $this->uri->segment(3);
		$objs = Troubleshoot_router::populate($request_id,'1');
		$this->data['objs'] = $objs;
		$this->data['title'] = 'Perangkat yang terpakai';
		$this->load->view('TS/troubleshoots/used_device',$this->data);
	}
	function withdrawed_device(){
		$request_id = $this->uri->segment(3);
		$objs = Troubleshoot_router::populate($request_id,'0');
		$this->data['objs'] = $objs;
		$this->data['title'] = 'Perangkat yang ditarik';
		$this->load->view('TS/troubleshoots/used_device',$this->data);
	}
	function imageedit(){
		$obj = new Troubleshoot_image();
		$obj->where('id',$this->uri->segment(3))->get();
		$data = array(
			'obj'=>$obj,
			'saveurl'=>base_url().'troubleshoot_images/update'
			);
		$this->load->view('imageeditor/index2',$data);
	}
}
