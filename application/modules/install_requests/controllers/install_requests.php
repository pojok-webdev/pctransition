<?php
class Install_requests extends CI_Controller {
	var $setting;
	var $preference;
	var $user_info;
	var $alertcount;
	var $mpath;
	var $data;
	var $ionuser;
	function __construct(){
		parent::__construct();
		Common::get_preferences();
		$this->setting = Common::get_web_settings();
		$this->lang->load('padi',$this->setting['language']);
		$this->load->helper('user');
		$this->load->helper('install');
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
			$this->data['user'] = User::get_user_by_id($this->ionuser->id);
		}
	}
	function add_lookup(){
		$this->check_login();
		$arr = array();
		$users = getsubordinates($this->ionuser->id,$arr);
		
		$this->data['objs']=Survey_request::install_lookup($users);
		$this->data['return_page']='adm/install_add/';
		$this->data['menuFeed']='install';
		$this->load->view('Sales/installs/add_install_lookup',$this->data);
	}
	function edit(){
		$this->check_login();
		$this->data['obj']=Install_request::get_obj_by_id($this->uri->segment(3));
		$this->data['clients']=Client::get_combo_data();
		$this->data['officers']=User::get_user_by_group('TS');
		$this->data['apwifis']=Device::get_combo_data(13);
		$this->data['pccards']=Device::get_combo_data(2);
		$this->data['antennas']=Device::get_combo_data(8);
		$this->data['routers']=Device::get_combo_data(14);
		$this->data['btstowers']=Pbtstower::get_combo_data();
		$this->data['clients']=Client::get_combo_data();
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['devices']=Device::get_combo_data();
		$this->data['materials']=Material::get_combo_data();
		$this->data['materialtypes']=Materialtype::get_combo_data();
		$this->data['services'] = Service::get_combo_data();
		$this->data['sender']='install_edit';
		$this->data['menuFeed']='install';
		switch ($this->session->userdata["role"]) {
			case "CRO":
					redirect("install_requests/showreport2/".$this->uri->segment(3));
				break;
			default:
				$this->load->view('Sales/installs/edit',$this->data);
			break;
		}
		
//		$this->load->view('Sales/installs/edit',$this->data);
	}
	function feedData(){
		$objs = Install_site::populate();
		$rows = array();
		foreach($objs as $obj){
			$vals = array();
			array_push($vals,'"execdate":"'.common::longsqldt_to_human_date($obj->install_date).'"');
			$val = '{"'.$obj->id.'":{' . implode(",",$vals) . '}}';
			array_push($rows,$val);
		}
		echo '['.implode(",",$rows).']';
	}
	function index(){
		$this->check_login();
		$filter = $this->uri->segment(3);
		//$this->data['objs']=Install_site::populate($filter);
		
		$this->data['menuFeed']='install';
		switch($filter){
			case '0':
			$this->data['install_status']=' (Belum dilaksanakan)';
			break;
			case '1':
			$this->data['install_status']=' (Sudah dilaksanakan)';
			break;
			case 'all':
			$this->data['install_status']=' (Semua)';
			break;
		}
		switch($this->session->userdata["role"]){
			case "TS":
			$this->data['objs']=ts_get_installsite();
			$this->load->view('TS/installs/index',$this->data);
			break;
			case "Sales":
			$this->data['objs']=sales_get_installsite();
			$this->load->view('Sales/installs/index',$this->data);
			break;
		}
	}
	function entry_install_request(){
		Common::check_authentication();
		$uri 	= $this->uri->uri_to_assoc();
		$survey = (isset($uri['survey_id']))?Survey_request::extract_fields($uri['survey_id']):Survey_request::extract_fields(null);
		$data 	= array(
			'view_data'		=>'entry_install_request',
			'alertcount'	=>Common::check_messages(),
			'clients'		=>Client::get_combo_data(),
			'services'		=>Service::get_combo_data(),
			'install_date'	=>mdate('%d/%m/%Y',now()),
			'hour' 			=> '08',
			'minute' 			=> '00',
			'sites'			=>array(),
			'trial_periode1'=>mdate('%d/%m/%Y',now()),'trial_periode2'=>mdate('%d/%m/%Y',now()),
			'ts_date'		=>(isset($uri['msg_id']) && trim(Internal_message::get_date($uri['msg_id']))!='-')?
				'<label class="alert">Proposed by TS : ' . Internal_message::get_date($uri['msg_id']):''
		);
		switch($uri['type']){
			case 'add':
				$data['survey_id'] 			= $survey['survey_id'];
				$data['id'] 				= '';
				$data['permit'] 			= '0';
				$data['trial_permanent'] 	= FALSE;
				$data['client'] 			= $survey['client_id'];
				$data['service'] 			= $survey['service_id'];
				$data['pic_name'] 			= $survey['pic_name'];
				$data['pic_position'] 		= $survey['pic_position'];
				$data['pic_phone'] 			= $survey['pic_phone'];
				$data['sites'] 				= Survey_site::get_survey_sites($survey['survey_id']);
				$data['type'] 				= 'add';
				$data['active'] 			= TRUE;
				break;
			case 'edit':
				$request 					= new Install_request();
				$request->where('id',$uri['id'])->get();
				$datetime = Common::longsql_to_datepart($request->install_date);;
				$data['id'] 				= $request->id;
				$data['trial_permanent'] 	= ($request->trial_permanent==0)?FALSE:TRUE;
				$data['survey_id'] 			= $request->survey_request_id;
				$data['client'] 			= $request->client_id;
				$data['install_date'] 		= Common::longsql_to_human_date($request->install_date);
				$data['hour'] 				= $datetime['hour'];
				$data['minute'] 			= $datetime['minute'];
				$data['service'] 			= $request->service_id;
				$data['permit'] 			= $request->permit;
				$data['pic_name'] 			= $request->pic_name;
				$data['pic_phone'] 			= $request->pic_phone;
				$data['pic_position'] 		= $request->pic_position;
				$data['sites'] 				= Survey_site::get_survey_sites($uri['id']);
				$data['type'] 				= 'edit';
				$data['sites'] 				= Survey_site::get_survey_sites($request->survey_request_id);
				break;
		}
		$this->load->view('common/backendindex',$data);
	}
	function entry_install_request_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['save_x'])){
			$active = (isset($params['active']))?'1':'0';
			$install = new Install_request();
			$internalmsg = array(
				'message_type'		=> 'install_request',
				'obj_id'			=> $params['id'],
				'recipient'			=> 0,
				'recipient_group'	=> 3,
				'content'			=> 'edit instalasi',
				'proposed_date1'	=> null,
				'proposed_date2'	=> null,
				'followuplink'		=> 'install_requests/ts_entry_install_request'
			);
			switch ($params['type']){
				case 'add':
					$this->access_log->insert_log('Entry install request (ID : ' . $params['id'] . ')');
					$id = Install_request::request_save($params);
					$internalmsg['obj_id'] = $id;
					Common::send_internal_message($internalmsg);
					break;
				case 'edit':
					$this->access_log->insert_log('Edit install request (ID : ' . $params['id'] . ')');
					$params['id'] = $params['id'];
					Install_request::request_update($params);
					Common::send_internal_message($internalmsg);
					break;
			}
		}
		redirect($this->mpath . 'show_install_requests/page');
	}
	function entry_router(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array('view_data'=>'entry_router','install_id'=>$uri['install_id']);
		$this->load->view('common/backendindex',$data);
	}
	function entry_installer(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array('install_id'=>$uri['install_id'],
		'view_data'=>'entry_installer',
		'installers'=>User::get_combo_data_by_group('TS'),'installer'=>0,
		);
		$this->load->view('common/backendindex',$data);
	}
	function check_login(){
		if(!$this->ion_auth->logged_in()){
			redirect(base_url() . 'index.php/adm/login');
		}
	}
	function entry_ap_wifi(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array('install_id'=>$uri['install_id'],
		'view_data'=>'entry_ap_wifi','ap_wifis'=>Install_request::get_ap_wifis($uri['install_id']),
		);
		$this->load->view('common/backendindex',$data);
	}
	function entry_image(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array('install_id'=>$uri['install_id'],
		'view_data'=>'entry_install_image',
		'id'=>($uri['type']=='edit')?$uri['id']:'',
		'name'=>(isset($uri['name']))?$uri['name']:'',
		'type'=>$uri['type'],
		);
		switch ($uri['type']){
			case 'edit':
				$image = Install_image::get_by_id($uri['id']);
				$data['name'] = (isset($uri['name']))?$uri['name']:$image->name;
				$data['description'] = $image->description;
				break;
			case 'add':
				$data['name'] = '';
				$data['description'] = '';
				break;
		}
		$this->load->view('common/backendindex',$data);
	}
	function entry_file(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$data = array('install_id'=>$uri['install_id'],
		'view_data'=>'entry_install_image',
		'id'=>($uri['type']=='edit')?$uri['id']:'',
		'name'=>(isset($uri['name']))?$uri['name']:'',
		'type'=>$uri['type'],
		);
		switch ($uri['type']){
			case 'edit':
				$image = Install_image::get_by_id($uri['id']);
				$data['name'] = (isset($uri['name']))?$uri['name']:$image->name;
				$data['description'] = $image->description;
				break;
			case 'add':
				$data['name'] = '';
				$data['description'] = '';
				break;
		}

		$this->load->view('common/backendindex',$data);
	}
	function getRecordOver(){
		$objs = new Install_request();
		$objs->where("id >",$this->uri->segment(3))->get();
		$rows = array();
		foreach($objs as $obj){
			$vals = array();
			foreach($this->db->list_fields("install_requests") as $field){
				array_push($vals,'"'.$field.'":"'.$obj->$field.'"');
			}
			array_push($vals,'"name":"'.$obj->client_site->client->name.'"');
			array_push($vals,'"installresult":"Belum ada kesimpulan"');
			$val = '{"'.$obj->id.'":{' . implode(",",$vals) . '}}';
			array_push($rows,$val);
		}
		echo '['.implode(",",$rows).']';
	}
	function getTrial(){
		$params = $this->input->post();
		$obj = new Install_request();
		$obj->where('id',$params['id'])->get();
		echo '{"id":"'.$obj->id.'","client_site_id":"'.$obj->client_site_id.'","client":"'.$obj->client_site->client->name.'","startdate":"'.common::sql_to_human_datetime($obj->trial_periode1).'","enddate":"'.common::sql_to_human_datetime($obj->trial_periode2).'","startexecdate":"'.common::sql_to_human_datetime($obj->trial_periode1exec).'","endexecdate":"'.common::sql_to_human_datetime($obj->trial_periode2exec).'"}';
	}	
	function install_edit(){
		$sessdata = array("pending_url"=>base_url()."install_requests/install_edit/".$this->uri->segment(3));
		$this->session->set_userdata($sessdata);
		$this->check_login();
		$id = $this->uri->segment(3);
		$port = array();
		for($i=1;$i<25;$i++){
			$port[$i]=$i;
		}
//		$obj = Install_request::get_obj_by_id($this->uri->segment(3));
		$obj = new Install_site();
		$obj->where('id',$this->uri->segment(3))->get();		
		$this->data['switches']=Device::get_combo_data(15);
		$this->data['ports']=$port;
		$this->data['hours']=Common::gethours();
		$this->data['minutes']=Common::getminutes();
		$this->data['aps']=PAP::get_combo_data();
		$this->data['antennas']=Device::get_combo_data(array(8,20,4,7,3,6,5));
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
		$this->data['sender']='install_edit';
		$this->data['officers']=User::get_user_by_group('TS');
		$this->data['services']=Service::get_combo_data();
		$this->data['branches']=Branch::get_combo_data();
		$this->data['obj']=$obj;
		$this->data['clients']=Client::get_combo_data();
		$this->data['sender']='install_edit';
		$this->data['menuFeed']='install';

		$qii = "select a.id,a.img,a.title,a.path,a.description from install_images a where a.install_site_id=".$id. " ";
		$qii.= "order by roworder asc ";
		$res = $this->db->query($qii);
		$this->data['install_images'] = $res->result();
		
		$myuser = $this->ion_auth->user()->row();
		$myuser->id;
		switch($this->session->userdata["role"]){
			case "TS":
			$this->load->view('TS/installs/edit',$this->data);
			break;
			case "Sales":
				if($this->common->is_decessor($obj->client_site->client->sale_id,$myuser->id)||($obj->client_site->client->sale_id===$myuser->id)){
					//$this->load->view('Sales/installs/edit',$this->data);
					$this->load->view('Sales/installs/edit',$this->data);
				}else{
					echo "Anda harus memiliki privilege untuk dapat mengedit / melihat halaman ini ..";
				}
				break;

			break;
			case "CRO":
				$this->load->view('CRO/installs/edit',$this->data);
			break;
		}
	}
	function preview(){
		$this->check_login();
		$this->data['obj']=Survey_request::get_obj_by_id($this->uri->segment(3));
		$this->data['clients']=Client::get_combo_data();
		$this->data['officers']=User::get_user_by_group('TS');
		$this->data['apwifis']=Device::get_combo_data(13);
		$this->data['pccards']=Device::get_combo_data(2);
		$this->data['antennas']=Device::get_combo_data(8);
		$this->data['routers']=Device::get_combo_data(14);
		$this->data['btstowers']=Pbtstower::get_combo_data();
		$this->data['clients']=Client::get_combo_data();
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['devices']=Device::get_combo_data();
		$this->data['materials']=Material::get_combo_data();
		$this->data['materialtypes']=Materialtype::get_combo_data();
		$this->data['services'] = Service::get_combo_data();
		$this->data['sender']='install_edit';
		$this->data['menuFeed']='install';
		$this->load->view('Sales/installs/preview',$this->data);
	}
	function bapreview(){
		$id = $this->uri->segment(3);
		$sql = "select id,name,description,img,install_site_id from install_bas where id = " . $id;
		$query = $this->db->query($sql);
		$result = $query->result();
		$this->data['menuFeed']='install';
		$this->data['obj']=$result[0];
		$this->load->view('TS/installs/gallery',$this->data);
	}
	function save(){
		$params = $this->input->post();
		$obj = new Install_request();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function show_install_requests(){
		Common::check_authentication();
		$install_request = new Install_request();
		Common::show_object($install_request, 'install_requests', 'install_requests','client_id');
	}
	function show_ts_install_requests(){
		Common::check_authentication();
		$obj = new Install_request();
		Common::show_object($obj, 'ts_install_requests','install_requests','client_id');
	}
	function showreport(){
		$client_id = $this->uri->segment(3);
		$objs = new Install_site();
		$objs->where('id',$client_id)->get();
		$clients = new Client();
		$query = "select c.name,d.name service,a.address,a.city,a.pic_name,a.pic_position,a.pic_phone_area,a.pic_phone,a.install_date,a.status from install_sites a left outer join survey_requests b on b.id=a.install_request_id left outer join clients c on c.id=b.client_id left outer join services d on d.id=c.service_id where a.id=".$client_id;

		$query = "select c.name,d.name service,a.address,a.city,a.pic_name,a.pic_position,a.pic_phone_area,a.pic_phone,a.install_date,a.status,a.resume from install_sites a left outer join client_sites b on b.id=a.client_site_id left outer join clients c on c.id=b.client_id left outer join services d on d.id=c.service_id where a.id=".$client_id;
		$clients->query($query);
		$query = "select * from install_installers a left outer join install_sites b on b.id=a.install_site_id where b.id=".$client_id;
		$operators = new Install_installer();
		$operators->query($query);
		$query = "select * from install_routers a left outer join install_sites b on b.id=a.install_site_id where b.id=".$client_id;
		$routers = new Install_installer();
		$routers->query($query);
		$query = "select * from install_pccards a left outer join install_sites b on b.id=a.install_site_id where b.id=".$client_id;
		$pccards = new Install_pccard();
		$pccards->query($query);
		$query = "select * from install_ap_wifis a left outer join install_sites b on b.id=a.install_site_id where b.id=".$client_id;
		$apwifis = new Install_ap_wifi();
		$apwifis->query($query);
		$query = "select * from install_wireless_radios a left outer join install_sites b on b.id=a.install_site_id where b.id=".$client_id;
		$wirelessradios = new Install_wireless_radio();
		$wirelessradios->query($query);
		$query = "select * from install_antennas a left outer join install_sites b on b.id=a.install_site_id where b.id=".$client_id;
		$antennas = new Install_antenna();
		$antennas->query($query);
		$query = "select a.* from install_images a left outer join install_sites b on b.id=a.install_site_id where title='Topologi Jaringan' and b.id=".$client_id;
		$imgtj = new Install_image();
		$imgtj->query($query);
		$query = "select a.* from install_images a left outer join install_sites b on b.id=a.install_site_id where title='Konfigurasi AP' and b.id=".$client_id;
		$imgka = new Install_image();
		$imgka->query($query);
		$query = "select a.* from install_images a left outer join install_sites b on b.id=a.install_site_id where title='Dokumentasi Foto' and b.id=".$client_id;
		$imgdok = new Install_image();
		$imgdok->query($query);


		$query = "select a.* from install_resumes a left outer join install_sites b on b.id=a.install_site_id where  b.id=".$client_id;
		$sr = new Install_image();
		$sr->query($query);


		$query = "select a.* from install_images a left outer join install_sites b on b.id=a.install_site_id where title='Speed Test' and b.id=".$client_id;
		$imgst = new Install_image();
		$imgst->query($query);
		$oprarr = array();
		foreach($operators as $operator){
			array_push($oprarr,$operator->name);
		}
		$opr = implode(",",$oprarr);
		$data = array(
			'objs'=>$clients,
			'opr'=>$opr,'routers'=>$routers,'pccards'=>$pccards,'apwifis'=>$apwifis,'wirelessradios'=>$wirelessradios,"antennas"=>$antennas,
			"imgdok"=>$imgdok,"imgtj"=>$imgtj,"imgka"=>$imgka,"imgst"=>$imgst,"sr"=>$sr
		);
		$this->load->view("Sales/installs/reports/installbyclient",$data);
	}

	function showreport2(){
		$installsiteid = $this->uri->segment(3);
		$query = "select c.name,concat(day(a.install_date),'-',month(a.install_date),'-',year(a.install_date)) ins_date,b.address,case a.status when '0' then 'belum selesai' when '1' then 'selesai' else 'belum selesai' end installstatus,a.resume,d.srv,e.xcutor,f.pic,g.tipe iwtipe,g.macboard iwmacboard,g.ip_ap iwip_ap,g.essid iwessid,g.ip_ethernet iwip_ethernet,g.freqwency iwfreqwency,g.polarization iwpolarization,g.signal iwsignal,g.quality iwquality,g.throughput_udp iwthroughput_udp,g.throughput_tcp iwthroughput_tcp,g.user iwuser,g.password iwpassword from install_sites a ";
		$query.= "left outer join client_sites b on b.id=a.client_site_id ";
		$query.= "left outer join clients c on c.id=b.client_id ";
		$query.= "left outer join (select client_site_id,group_concat(name) srv from clientservices group by client_site_id) d on d.client_site_id=b.id ";
		$query.= "left outer join (select install_site_id,group_concat(name)xcutor from install_installers group by install_site_id) e on e.install_site_id=a.id ";
		$query.= "left outer join (select client_id,group_concat(name)pic from pics group by client_id) f on f.client_id=c.id ";
		$query.= "left outer join install_wireless_radios g on a.id=g.install_site_id ";
		$query.= "left outer join install_resumes h on h.install_site_id=a.id ";
		$query.= " where a.id=".$installsiteid;
		//echo $query;
		$res = $this->db->query($query);
		$obj = $res->result()[0];

		$query = "select a.* from install_resumes a left outer join install_sites b on b.id=a.install_site_id where  b.id=".$installsiteid;
		$res = $this->db->query($query);
		$sr = $res->result();

		$qii = "select a.id,a.img,a.title,a.description from install_images a where a.install_site_id=".$installsiteid. " ";
		$qii.= "order by roworder asc ";
		$res = $this->db->query($qii);
		$ii = $res->result();
		$data = array(
			'obj'=>$obj,
			'install_images'=>$ii,
			'sr'=>$sr
		);
		$this->load->view("reports/installreport",$data);
	}
	function ts_entry_install_request(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$obj = new Install_request();
		$obj->where('id',$uri['id'])->get();
		$datetime = Common::longsql_to_datepart($obj->install_date);
		$ts = Install_installer::get_ts_aray_by_installer_id($uri['id']);
		$install_date = $obj->install_date;
		$date_part = Common::longsql_to_datepart($install_date);
		$data['alertcount'] 	= Common::check_messages();
		$data['view_data']	='entry_ts_install_request';
		$data['id'] 			= $obj->id;
		$data['client'] 		= $obj->client->name;
		$data['service'] 		= $obj->service->name;
		$data['install_date'] 	= $date_part['day'] . '/' . $date_part['month'] . '/' . $date_part['year'];
		$data['hour']			= $datetime['hour'];
		$data['minute']			= $datetime['minute'];
		$data['type'] 			= 'edit';
		$data['pic_name'] 		= $obj->pic_name;
		$data['pic_position'] 	= $obj->pic_position;
		$data['pic_phone'] 		= $obj->pic_phone;
		$data['trial_periode'] 	= $obj->trial_periode1 . '-' . $obj->trial_periode2;
		$data['permit'] 		= ($obj->permit=='1')?'Perlu surat ijin':'-';
		$data['tses']			= Install_installer::get_tses_by_install_request($uri['id']);
		$data['ts']				= User::get_combo_data_by_group('TS','Pilih TS');
		$data['permanen_trial']	= $obj->trial_permanen;
		$data['wireless_radios'] = Install_wireless_radio::get_wireless_radios($uri['id']);
		$data['ap_wifis'] 		= Install_request::get_ap_wifis($uri['id']);
		$data['routers'] 		= Install_router::get_routers($uri['id']);
		$data['images'] 		= Install_image::get_images();
		$data['mrtg'] 			= ($obj->create_mrtg=='1')?TRUE:FALSE;
		$data['whatsup'] 		= ($obj->create_whatsup=='1')?TRUE:FALSE;
		$data['shapper'] 		= ($obj->create_shapper=='1')?TRUE:FALSE;
		$data['ba_aktivasi']	= Install_file::get_files_by_ftype($uri['id'],'ba_aktivasi');
		$data['ba_instalasi']	= Install_file::get_files_by_ftype($uri['id'],'ba_instalasi');
		$data['serah_terima']	= Install_file::get_files_by_ftype($uri['id'],'ba_serah_terima');
		$data['form_kepuasan']	= Install_file::get_files_by_ftype($uri['id'],'form_kepuasan');
		$this->load->view('common/backendindex',$data);
	}
	function upload_file(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		switch ($uri['type']){
			case 'add':
				$id = 'none';
				$install_id = $uri['install_id'];
				break;
			case 'edit':
				$id = ($uri['id']=='')?'none':$uri['id'];
				$install_id = $uri['install_id'];
				break;

		}
		$data = array(
			'install_id'=>$install_id,
			'id'=>$id,'ftype'=>$uri['ftype'],
			'view_data'=>'upload_file',
			'images'=>get_filenames('./media/installs'),
		);
		$this->load->view('common/backendindex',$data);
	}
	function upload_image(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		switch ($uri['type']){
			case 'add':
				$id = 'none';
				$install_id = $uri['install_id'];
				break;
			case 'edit':
				$id = ($uri['id']=='')?'none':$uri['id'];
				$install_id = $uri['install_id'];
				break;

		}
		$data = array(
			'install_id'=>$install_id,
			'id'=>$id,
			'view_data'=>'upload_image',
			'images'=>get_filenames('./media/installs'),
		);
		$this->load->view('common/backendindex',$data);
	}
	function use_image(){
		$uri = $this->uri->uri_to_assoc();
		Install_image::insert_image($uri['install_id'],$uri['image']);
		redirect($this->mpath . 'ts_entry_install_request/id/' . $uri['install_id']);
	}
	function update(){
		$params = $this->input->post();
		echo Install_request::edit($params);
	}
	function reportjson(){
		$tmp = array();
		$obj = new Install_site();
		$obj->where('id',1)->get();
		$datapelaksanaan = '"Data Pelaksanaan":{"tgl":{"field":"Tanggal","content":": '.$obj->install_date.'","type":"text"},"pelaksana":{"field":"Pelaksana","content":": '.$obj->install_installer->name.'","type":"text"}}';
		$datapelanggan = '"Data Pelanggan":{"plg":{"field":"Nama","content":": '.$obj->client_site->client->name.'","type":"text"},"addr":{"field":"Alamat","content":": '.$obj->client_site->client->address.'","type":"text"}}';
		$dataperangkat = '"Data Perangkat":{"perangkat":{"field":"Nama Perangkat","content":": Mikrotik RB411L + Grid 27 dbm","type":"text"},"board":{"field":"Mac Board","content":": D4:CA:6D:9D:A8:84","type":"text"},"pccard":{"field":"Mac PC Card","content":": 00:80:48:69:7F:9A","type":"text"},"wlan":{"field":"IP Wlan1","content":": 117.102.226.174/30","type":"text"}}';
		$topologijaringan = '"Topologi Jaringan":{"tj":{"field":"image","content":"http://teknis/reports/images/william-konfig-ap-unifi.jpeg","type":"image","col":"left"},"tx":{"field":"image","content":"http://teknis/reports/images/william-foto1.jpeg","type":"image","col":"right"}}';
		array_push($tmp,$datapelaksanaan);
		array_push($tmp,$datapelanggan);
		array_push($tmp,$dataperangkat);
		array_push($tmp,$topologijaringan);
		$out = implode(",",$tmp);
		echo '{'.$out.'}';
	}
	function saveresume(){
		$params = $this->input->post();
		$obj = new Install_resume();
		$obj->install_site_id = $params['install_site_id'];
		$obj->name = $params['name'];
		$obj->createuser = $this->session->userdata["username"];
		$obj->save();
		echo $this->db->insert_id();
	}
	function svresume(){
		$params = $this->input->post();
		$obj = new Install_site();
		$obj->where('id',$params['install_site_id'])->update(array('resume'=>$params['resume']));
		echo $obj->check_last_query();
//		$obj->install_site_id = $params['install_site_id'];
//		$obj->name = $params['name'];
//		$obj->createuser = $this->session->userdata["username"];
//		$obj->save();
//		echo $this->db->insert_id();
	}
	function removeresume(){
		$params = $this->input->post();
		$obj = new Install_resume();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		echo 'deleted '.$params['id'];
	}
	function teswt(){
		if ($this->common->grantElement("14",$executor='everyone')){
			echo "iso";
		}else{
			echo "gakl iso";
		}
	}
	function xxxx(){
		$this->common->is_decessor(14,14);
	}
}
