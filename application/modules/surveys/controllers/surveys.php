<?php
class Surveys extends CI_Controller {
	var $ionuser;
	var $data;
	function __construct() {
		parent::__construct();
		$this->data = array(
		);
		if ($this->ion_auth->logged_in()) {
			$this->ionuser = $this->ion_auth->user()->row();
			$this->data['user'] = User::get_user_by_id($this->ionuser->id);
			$this->load->helper('user');
			$this->load->helper('survey');
			$this->load->helper("branches");
			$this->load->model("pap");
		}
	}
	function testhelper(){
		$ts = get_ts();
		echo $ts->username . "-" . $ts->branch->id;
		foreach($ts->branch as $branch){
			echo $branch->name . "<br />";
		}
	}
	function createmessage($params) {
		$out = "";
		foreach ($params as $key => $val) {
			$out .= $key . ":" . $val . "<br />";
		}
		return $out;
	}
	function dropresume() {
		$params = $this->input->post();
		$obj = new Survey_resume();
		$obj->where('id', $params['id'])->get();
		$obj->delete();
	}
	function edit() {
		$this->common->check_login();
		//harus nya data diambil dari survey_site, bukan survey_requests
		$sessdata = array("pending_url"=>base_url()."surveys/edit/".$this->uri->segment(3));
		$this->session->set_userdata($sessdata);
		$this->common->check_login();
		$myuser = $this->ion_auth->user()->row();
		$myuser->id;
		$id = $this->uri->segment(3);
		$keyvalpaired = false;
		$obj = Survey_site::get_obj_by_id($id);
		$pics = new Pic();
		$pics->where("client_id",$obj->client_id)->get();
		$sitepics = new Site_pic();
		$sitepics->where("client_id",$obj->client_id)->get();
		$this->data['pics'] = $pics;
		$this->data['sitepics'] = $sitepics;
		$this->data['positions'] = Position::get_combo_data();
		$this->data['clients'] = Client::get_combo_data();
		$this->data['menuFeed'] = 'survey';
		$this->data['obj'] = $obj;
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['services'] = Service::get_combo_data(true,"Pilihlah");
		$this->data['branches'] = Branch::get_combo_data();
		$this->data['hasilsurvey'] = array(
			0 => 'Belum ada kesimpulan',
			1 => 'Bisa dilaksanakan',
			2 => 'Bisa dilaksanakan dengan syarat',
			3 => 'Tidak dapat dilaksanakan'
		);
		$this->data['aps'] = PAP::get_combo_data();
		$this->data['device_type'] = Devicetype::get_combo_data();
		$this->data['material_type'] = Materialtype::get_combo_data();
		$this->data['btstowers'] = Pbtstower::get_combo_data('Pilihlah');
		$this->data['clients'] = Client::get_combo_data();
		$this->data['direction'] = array('0' => 'Pelanggan baru', '1' => 'Site baru', '2' => 'Relokasi');
		$this->data['devices'] = Device::get_combo_data();
		$this->data['sites'] = Survey_site::get_other_sites($id);
		$this->data['sender'] = 'survey_edit';
		$this->data['surveypackages'] = Surveypackage::populate();
		$this->data['userbranches'] = getuserbranches();
		$this->data['salesselected'] = getsalesselectedbysurveysiteid($id);
		switch ($this->session->userdata["role"]) {
			case "TS":
				$this->load->view('TS/surveys/edit', $this->data);
				break;
			case "Sales":
				if($this->common->IsDecessor($obj->client_site->client->sale_id,$myuser->id)||($obj->client_site->client->sale_id===$myuser->id)){
						$this->load->view('Sales/surveys/edit', $this->data);
				}else{
					echo "MYUSERID ".$obj->client_site->client->user_id."<br />";
					echo "MYUSERID ".$myuser->id."<br />";
					echo "Anda harus memiliki privilege untuk dapat mengedit / melihat halaman ini ..";
				}
				break;
			case "CRO":
					redirect("surveys/showreport/".$id);
				break;
		}
	}
	function getimage(){
		$id = $this->uri->segment(3);
		$obj = new Survey_image();
		$obj->where('id',$id)->get();
		echo $obj->img;
	}
	function imageedit(){
		$obj = new Survey_image();
		$obj->where('id',$this->uri->segment(3))->get();
		$data = array(
			'obj'=>$obj,
			'saveurl'=>base_url().'survey_images/update'
			);
		$this->load->view('imageeditor/index2',$data);
	}
	function index() {
		$this->common->check_login();
		$arr = array();
		$users = getsubordinates($this->ionuser->id,$arr);
		$this->data['menuFeed'] = 'survey';
		if (isset($this->session->userdata["role"])) {
			switch ($this->session->userdata["role"]) {
				case 'Sales':
					$this->data['objs'] = sales_get_surveysite();
					$this->load->view('Sales/surveys/surveys', $this->data);
					break;
				case 'TS':
					$this->data['objs'] = ts_get_surveysite();
					$this->load->view('TS/surveys/surveys', $this->data);
					break;
				case 'Umum dan Warehouse':
					$this->data['objs'] = Survey_site::populate();
					$this->load->view('TS/surveys/surveys', $this->data);
					break;
				default:
					break;
			}
		} else {
			redirect(base_url() . "adm/chooseRole");
		}
	}
	function url_contain($obj) {
		$segs = $this->uri->segment_array();
		if (in_array($obj, $segs)) {
			return true;
		}
		return false;
	}
	function remove_surveyor() {
		$params = $this->input->post();
		echo Survey_surveyor::remove($params['id']);
	}
	function get_by_id() {
		$params = $this->input->post();
		$id = $params['id'];
		$obj = Survey_request::get_obj_by_id($id);
		echo '{"survey_date":"' . $obj->survey_date . '"}';
	}
	function save() {
		$params = $this->input->post();
		echo Survey_request::add($params);
	}
	function saveresume() {
		$params = $this->input->post();
		$obj = new Survey_resume();
		foreach ($params as $key => $val) {
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function showreport() {
		$this->common->check_login();
		$id = $this->uri->segment(3);
		$arr = array();
		$objs = new Survey_site();
		$query = 'select resume,city,sites.id,sites.ex_date,c.name,sites.address,c.business_field,s.name service,sites.location_e_d,sites.location_e_m,sites.location_e_s,sites.location_s_d,sites.location_s_m,sites.location_s_s,sites.amsl,sites.agl,sites.execution_date,sites.survey_date from ';
		$query.= '(select date_format(a.execution_date,"%Y-%m-%d") ex_date,b.id,b.client_id,a.address,a.location_e_d,resume,a.location_e_m,a.location_e_s,a.location_s_d,a.location_s_m,a.location_s_s,a.amsl,a.agl,a.survey_date,a.execution_date from survey_sites a left outer join survey_requests b on b.id=a.survey_request_id where a.id='.$id.')sites ';
		$query.= 'left outer join clients c on c.id=sites.client_id ';
		$query.= 'right outer join (select date_format(a.execution_date,"%Y-%m-%d")ex_date,b.id,b.client_id,a.id site_id from survey_sites a left outer join survey_requests b on b.id=a.survey_request_id )site on site.client_id=sites.client_id and site.ex_date=sites.ex_date ';
		$query.= 'left outer join services s on s.id=c.service_id ';
		$query.= 'where site.site_id='.$id;
		$objs->query($query);
		$query = "select * from survey_surveyors a left outer join survey_requests b on b.id=a.survey_request_id left outer join survey_sites c on c.survey_request_id=b.id where c.id=".$id;
		$surveyors = new Survey_surveyor();
		$surveyors->query($query);
		$query = 'select distinct sm.material_type,sm.name,sm.amount from (select date_format(a.execution_date,"%Y-%m-%d") ex_date,b.id,b.client_id,a.address,a.id siteid from survey_sites a left outer join survey_requests b on b.id=a.survey_request_id where a.id='.$id.')sites  left outer join survey_materials sm on sm.survey_site_id=sites.siteid right outer join (select date_format(a.execution_date,"%Y-%m-%d")ex_date,b.id,b.client_id,a.id siteid from survey_sites a left outer join survey_requests b on b.id=a.survey_request_id  where a.id='.$id.')site on site.client_id=sites.client_id and site.ex_date=sites.ex_date where sm.material_type is not null and site.siteid='.$id;
		$material = new Survey_material();
		$material->query($query);
		$query = 'select distinct sm.description,sm.name,sm.amount from (select date_format(a.execution_date,"%Y-%m-%d") ex_date,b.id,b.client_id,a.address,a.id siteid from survey_sites a left outer join survey_requests b on b.id=a.survey_request_id where a.id='.$id.')sites  left outer join survey_devices sm on sm.survey_site_id=sites.siteid right outer join (select date_format(a.execution_date,"%Y-%m-%d")ex_date,b.id,b.client_id,a.id siteid from survey_sites a left outer join survey_requests b on b.id=a.survey_request_id  where a.id='.$id.')site on site.client_id=sites.client_id and site.ex_date=sites.ex_date where sm.name is not null and site.siteid='.$id;
		$sd = new Survey_device();
		$sd->query($query);
		$query = 'select distinct sm.name from (select date_format(a.execution_date,"%Y-%m-%d") ex_date,b.id,b.client_id,a.address,a.id siteid from survey_sites a left outer join survey_requests b on b.id=a.survey_request_id where a.id='.$id.')sites  left outer join survey_resumes sm on sm.survey_site_id=sites.siteid right outer join (select date_format(a.execution_date,"%Y-%m-%d")ex_date,b.id,b.client_id,a.id siteid from survey_sites a left outer join survey_requests b on b.id=a.survey_request_id where a.id='.$id.')site on site.client_id=sites.client_id and site.ex_date=sites.ex_date where sm.name is not null and site.siteid='.$id;
		$sr = new Survey_resume();
		$sr->query($query);
		$query = 'select distinct sm.path,sm.img,sm.description from (select date_format(a.execution_date,"%Y-%m-%d") ex_date,b.id,b.client_id,a.address,a.id siteid from survey_sites a left outer join survey_requests b on b.id=a.survey_request_id where a.id='.$id.')sites  left outer join survey_images sm on sm.survey_site_id=sites.siteid  where sm.survey_site_id is not null';
		$si = new Survey_image();
		$si->query($query);
		$qbtsdistance="select * from survey_bts_distances where survey_site_id=".$id;
		$rbtsdistance=new Survey_bts_distance();
		$rbtsdistance->query($qbtsdistance);
		
		$qsitedistance="select * from survey_site_distances where survey_site_id=".$id;
		$rsitedistance=new Survey_site_distance();
		$rsitedistance->query($qsitedistance);
		foreach($surveyors as $surveyor){
			array_push($arr,$surveyor->name);
		}
		$data = array(
			"objs" => $objs,
			"surveyors" => implode(", ", $arr),
			"materials"=>$material,
			"survey_site_id"=>$id,
			"sds"=>$sd,"sr"=>$sr,"images"=>$si,"sitedistance"=>$rsitedistance,"btsdistance"=>$rbtsdistance
		);
		$this->load->view("Sales/surveys/reports/surveybyclient", $data);
	}
	function showreport2(){
		$this->load->view("Sales/surveys/reports/surveybyclient2");
	}
	function update() {
		$this->common->check_login();
		$params = $this->input->post();
		$obj = Survey_request::get_obj_by_id($params['id']);
		$message = "<strong>Permintaan Survey</strong><br />";
		$message.= '<br />Pelanggan : <strong>' . $obj->client->name . '</strong>';
		$message.= '<br />Sales : <strong>' . $obj->username . '</strong>';
		$message.= '<br />Alamat : <strong>' . $obj->address . '</strong>';
		$message.= '<br />PIC : <strong>' . $obj->pic_name . '</strong>';
		$message.= '<br />Telepon : <strong>' . $obj->phone_area . '-' . $obj->phone . '</strong>';
		$obj = new Survey_request();
		$obj->where("id", $params["id"])->update($params);
		echo $obj->check_last_query();
	}
	function feedData() {
		$objs = Survey_site::populate();
		$rows = array();
		foreach ($objs as $obj) {
			$vals = array();
			switch ($obj->survey_request->resume) {
				case "0":
					$status = "Belum ada kesimpulan ";
					break;
				case "1":
					$status = "Dapat dilaksanakan ";
					break;
				case "2":
					$status = "Dapat dilaksanakan dengan catatan ";
					break;
				case "3":
					$status = "Tidak dapat dilaksanakan ";
					break;
				default:
					$status = "Belum ada kesimpulan";
					break;
			}
			array_push($vals, '"status":"' . $status . '"');
			$val = '{"' . $obj->id . '":{' . implode(",", $vals) . '}}';
			array_push($rows, $val);
		}
		echo '[' . implode(",", $rows) . ']';
	}
	function getRecordOver(){
		$obj = new User();
		$obj->include_related("branches")->where("id",$this->session->userdata["user_id"])->get();
		$userbranch = array();
		foreach($obj->branch as $obj){
			array_push($userbranch,$obj->id);
		}
		$objs = new Survey_request();
		$objs->where("id >", $this->uri->segment(3))->where_in_related("survey_site/branch","id",$userbranch)->get();
		$rows = array();
		foreach ($objs as $obj) {
			$vals = array();
			foreach ($this->db->list_fields("survey_requests") as $field) {
				array_push($vals, '"' . $field . '":"' . $obj->$field . '"');
			}
			switch ($obj->direction) {
				case '0':
					array_push($vals, '"surveydirection":"Pelanggan baru"');
					break;
				case '1':
					array_push($vals, '"surveydirection":"Site baru"');
					break;
				case '3':
					array_push($vals, '"surveydirection":"Relokasi"');
					break;
				default:
					array_push($vals, '"surveydirection":"-"');
					break;
			}
			array_push($vals, '"name":"' . $obj->client_site->client->name . '"');
			array_push($vals, '"surveyresult":"Belum ada kesimpulan"');
			$val = '{"' . $obj->id . '":{' . implode(",", $vals) . '}}';
			array_push($rows, $val);
		}
		echo '[' . implode(",", $rows) . ']';
	}
	function getresume(){
		$params = $this->input->post();
		$obj = new Survey_site();
		$obj->where("id",$params["id"])->get();
		echo $obj->survey_request->resume;
	}
	function showuserbranches(){
		$x = getuserbranches();
		foreach($x as $y){
			echo $y . "<br />";
		}
	}
	function reportdata(){
		$params = $this->input->post();
		$sql = "select d.name,d.business_field,group_concat(distinct e.name)pic,group_concat(distinct f.name)surveyors,c.address,case  when date(a.execution_date)='0000-00-00' then a.survey_date when a.execution_date is NULL then a.survey_date else a.execution_date end  execution_date,location_e_d,location_e_m,location_e_s,location_s_d,location_s_m,location_s_s,amsl,agl,a.city,case g.resume when '0' then 'Belum ada kesimpulan' when '1' then 'Dapat dilaksanakan' when '2' then 'Dapat dilaksanakan dengan syarat' when '3' then 'Tidak dapat dilaksanakan' else 'Belum ada kesimpulan' end status from survey_sites a ";
		$sql.= "left outer join client_sites c on c.id=a.client_site_id ";
		$sql.= "left outer join clients d on d.id=c.client_id ";
		$sql.= "left outer join pics e on e.client_id=d.id ";
		$sql.= "left outer join survey_surveyors f on f.survey_request_id=a.id ";
		$sql.= "left outer join survey_requests g on g.id=a.survey_request_id ";
		$sql.= "where a.id=".$params["survey_site_id"];
		$que = $this->db->query($sql);
		$res = $que->result();
		$r = $res[0];
		echo '{"name":"'.$r->name.'","business_field":"'.$r->business_field.'","pic":"'.$r->pic.'","address":"'.$r->address.'","execution_date":"'.$r->execution_date.'","surveyors":"'.$r->surveyors.'","location_e_d":"'.$r->location_e_d.'","location_e_m":"'.$r->location_e_m.'","location_e_s":"'.$r->location_e_s.'","location_s_d":"'.$r->location_s_d.'","location_s_m":"'.$r->location_s_m.'","location_s_s":"'.$r->location_s_s.'","amsl":"'.$r->amsl.'","agl":"'.$r->agl.'","city":"'.$r->city.'","status":"'.$r->status.'"}';
	}
	function reportbtses(){
		$params = $this->input->post();
		$sql = "select a.id,b.name,a.ap,case a.los when '1' then 'LOS' when '0' then 'NLOS' when '2' then 'nLOS' end los,a.distance,a.obstacle,a.description from survey_bts_distances a ";
		$sql.= "left outer join btstowers b on b.id=a.btstower_id ";
		$sql.= "where survey_site_id=".$params["survey_site_id"];
		$que = $this->db->query($sql);
		$row = $que->result();
		$arr = array();
		foreach($row as $res){
			array_push($arr,'{"id":"'.$res->id.'","name":"'.$res->name.'","los":"'.$res->los.'","ap":"'.$res->ap.'","distance":"'.$res->distance.'","obstacle":"'.$res->obstacle.'","description":"'.$res->description.'"}');
		}
		$out = '{"data":['.implode(",",$arr).']}';
		echo $out;
	}	
	function reportimages(){
		$params = $this->input->post();
		$sql = "select id,path,description,img from survey_images ";
		$sql.= "where survey_site_id=".$params["survey_site_id"];
		$que = $this->db->query($sql);
		$row = $que->result();
		$arr = array();
		foreach($row as $res){
			array_push($arr,'{"id":"'.$res->id.'","img":"'.$res->img.'","description":"'.$res->description.'"}');
		}
		$out = '{"data":['.implode(",",$arr).']}';
		echo $out;
	}
	function reportmaterials(){
		$params = $this->input->post();
		$sql = "select id,material_type,name,amount from survey_materials ";
		$sql.= "where survey_site_id=".$params["survey_site_id"];
		$que = $this->db->query($sql);
		$row = $que->result();
		$arr = array();
		foreach($row as $res){
			array_push($arr,'{"id":"'.$res->id.'","name":"'.$res->name.'","material_type":"'.$res->material_type.'","amount":"'.$res->amount.'"}');
		}
		$out = '{"data":['.implode(",",$arr).']}';
		echo $out;
	}
	function reportresumes(){
		$params = $this->input->post();
		$sql = "select id,name from survey_resumes ";
		$sql.= "where survey_site_id=".$params["survey_site_id"];
		$que = $this->db->query($sql);
		$row = $que->result();
		$arr = array();
		foreach($row as $res){
			array_push($arr,'{"id":"'.$res->id.'","name":"'.$res->name.'"}');
		}
		$out = '{"data":['.implode(",",$arr).']}';
		echo $out;
	}
} 
