<?php
class Trials extends CI_Controller{
	var $data;
	var $ionuser;
	function __construct(){
		parent::__construct();
		$this->load->helper("trial");
		$this->load->helper("padi");
		$this->load->helper("client_site");
		$this->data = Appsettings::getdata();
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
			$this->data['user'] = User::get_user_by_id($this->ionuser->id);
		}
	}
	function getclient_sites($sale_id = null){
		$ci = & get_instance();
		$query = "select a.id sid,b.name,a.address ";
		$query.= "from client_sites a ";
		$query.= "left outer join clients b ";
		$query.= "on a.client_id=b.id ";
		if ($sale_id !== null) {
			$query.= "where b.sale_id = $sale_id ";
		}
		$result = $ci->db->query($query);
		$arr = array();
		foreach($result->result() as $cs){
			$arr[$cs->sid] = $cs->name . " - " . $cs->address;
			//echo $cs->sid . " " . $cs->name . $cs->address . "<br />";
		}
		return $arr;
	}
	function add(){
		$this->check_login();
		//$this->data['clientsites'] = Client_site::get_combo_data();
		$obj = getclient_sites();
//		$this->data['clientsites'] = getclient_sites($this->ionuser->id);
		$this->data['client_sites'] = $this->getclient_sites();
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['menuFeed'] = 'trial';
		switch($this->session->userdata["role"]){
			case 'Sales':
			$this->data["prevtrial"] = "none";
			$this->load->view('Sales/trials/add',$this->data);
			break;
			case 'TS':
			$this->load->view('TS/trials/add',$this->data);
			break;
		}
	}
	function add2(){
		$this->check_login();
		$client_site_id = $this->uri->segment(3);
		if($this->uri->total_segments()===4){
			$prevtrial = $this->uri->segment(4);
		}else{
			$prevtrial = 0;
		}
		$obj = new Client_site();
		$obj->where("id",$client_site_id)->get();
		$this->data["menuFeed"]="trial";
		$this->data['obj'] = $obj;
		$query = "select date_format(now(),'%d/%m/%Y') today,date_format(date_add(now(),interval 7 day),'%d/%m/%Y') weeklater;";
		$res = $this->db->query($query);
		$this->data['dates'] = $res->result()[0];
		$this->data['prevtrial'] = $prevtrial;
		$this->load->view("Sales/trials/add2",$this->data);
	}
	function cancel(){
		$id = $this->uri->segment(3);
		$trial = new Trial();
		$trial->where("id",$id)->get();
		echo $trial->client_site->client->name;
		$query = "update trials set cancel='1' where id =".$id.";";
		$exec = $this->db->query($query);
		redirect(base_url()."trials");
	}
	function check_login(){
		if(!$this->ion_auth->logged_in()){
			redirect(base_url() . 'index.php/adm/login');
		}
	}
	function edit(){
		$this->check_login();
		$id = $this->uri->segment(3);
		$this->data['obj'] = Trial::get_obj_by_id($id);
		$this->data['menuFeed'] = 'trial';
		$this->data['hours'] = get_hours_array();
		$this->data['minutes'] = get_minutes_array();

		switch($this->session->userdata["role"]){
			case 'Sales':
			$this->load->view('Sales/trials/edit',$this->data);
			break;
			case 'TS':
			$this->load->view('TS/trials/edit',$this->data);
			break;
		}
	}
	function extend(){
		$this->check_login();
		$id = $this->uri->segment(3);
		/*$trial = new Trial();
		$trial->where("id",$id)->get();
		echo $trial->client_site->client->name;
		$query = "update trials set extend='1' where id =".$id.";";
		$exec = $this->db->query($query);
		//redirect(base_url()."trials");
		$obj = new Trial();
		$obj->where("id",$id)->get();
		$this->data["obj"] = $obj;
		$this->data["extendreason"] = getextendreasons("Pilihlah");
		$this->data['menuFeed'] = 'trial';
		$this->load->view("Sales/trials/extend",$this->data);*/
		$sql = "";
	}
	function feedData(){
		$objs = Trial::populate();
		$rows = array();
		foreach($objs as $obj){
			$vals = array();
			array_push($vals,'"startdate":"'.$obj->startdate." ".$obj->startexecdate.'"');
			array_push($vals,'"enddate":"'.$obj->enddate." ".$obj->endexecdate.'"');
			$val = '{"'.$obj->id.'":{' . implode(",",$vals) . '}}';
			array_push($rows,$val);
		}
		echo '['.implode(",",$rows).']';
	}
	function fu(){
		$this->check_login();
		$id = $this->uri->segment(3);
		setlastsession("trials-fu","trials/fu/".$id);
		$obj = get_trial($id);
		switch($obj->status){
			case '0':
			$status = "Trial";
			break;
			case '1':
			$status = "Join";
			break;
			case '2':
			$status = "Extend";
			break;
			case '3':
			$status = "Cancel";
			break;
			default:
			$status = "waiting";
			break;
		}
		$data['id'] = $id;
		$data['obj'] = $obj;
		$data['services'] = getservices($id);
		$data['status'] = $status;
		$data['menuFeed'] = 'trials';
		$this->load->view("Sales/trials/fu",$data);
	}
	function getTrial(){
		$params = $this->input->post();
		$obj = new Trial();
		$obj->where('id',$params['id'])->get();
		echo '{"id":"'.$obj->id.'","client_site_id":"'.$obj->id.'","client":"'.$obj->client_site->client->name.'","startdate":"'.common::sql_to_human_datetime($obj->startdate).'","enddate":"'.common::sql_to_human_datetime($obj->enddate).'","startexecdate":"'.common::sql_to_human_datetime($obj->startexecdate).'","endexecdate":"'.common::sql_to_human_datetime($obj->endexecdate).'","product":"'.$obj->product.'","integer_part":"'.$obj->integer_part.'","fraction_part":"'.$obj->fraction_part.'"}';
	}
	function index123(){
		$this->check_login();
		$objs = Trial::populate();
		$this->data['objs']=$objs;
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['menuFeed'] = 'trial';
		switch($this->session->userdata["role"]){
			case 'Sales':
			$this->load->view('Sales/trials/trials',$this->data);
			break;
			case 'TS':
			$this->load->view('TS/trials/trials',$this->data);
			break;
		}
	}
	function join(){
		$id = $this->uri->segment(3);
		$query = "update trials set isjoin='1',cance='0',cancel='0' where id=".$id.";";
		$this->db->query($query);
		//redirect(base_url()."trials");
		echo $query;
	}
	function save(){
		$params = $this->input->post();
		$obj = new Trial();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		//echo $obj->check_last_query();
		echo $this->db->insert_id();
	}
	function update(){
		$params = $this->input->post();
		//$params["startexecdate"]=json_encode($params["startexecdate"]);
		$obj = new Trial();
		$obj->where('id',$params['id'])->update($params);
		echo $obj->check_last_query();
	}
	function updatestatus(){
		$params = $this->input->post();
//		$sql = "update trials set ".$params['flag']."='1' where id=".$params['id']."";
		//$params["startexecdate"]=json_encode($params["startexecdate"]);
		$obj = new Trial();
		$obj->where('id',$params['id'])->update($params);
		echo $obj->check_last_query();
	}	
	function index(){
		$this->check_login();
//		$this->data['objs'] = get_trials();
//		$this->data['objs']=$objs;
		$this->data['hours'] = Common::gethours();
		$this->data['minutes'] = Common::getminutes();
		$this->data['menuFeed'] = 'trial';
		$this->data["products"] = array("Enterprise","IIX","LocalLoop","Business","SmartValue");
		switch($this->session->userdata["role"]){
			case 'Sales':
			$this->data["objs"] = salesget_trials();
			$this->load->view('Sales/trials/trials',$this->data);
			break;
			case 'TS':
			$this->data["objs"] = salesget_trials();
			$this->load->view('TS/trials/trials',$this->data);
			break;
		}
	}
	function addpic(){
		$params = $this->input->post();
		$trial = new Trialofficer();
		foreach($params as $key=>$val){
			$trial->$key = $val;
		}
		$trial->save();
		echo $this->db->insert_id();
	}
	function getpics(){
		$params = $this->input->post();
		$pics = new Trialofficer();
		$pics->where("trial_id",$params["id"])->get();
		$arr = array();
		foreach($pics as $pic){
			array_push($arr,'{"id":"'.$pic->id.'","username":"'.$pic->username.'"}');
		}
		echo '{"out":['.implode(",",$arr).']}';
	}
	function removePic(){
		$params = $this->input->post();
		$pic = new Trialofficer();
		$pic->where("id",$params["id"])->get();
		$pic->delete();
		echo $pic->check_last_query();
	}
	function gettrialpics(){
		$params = $this->input->post();
		$arr = array();
		foreach(getofficers($params["trial_id"]) as $officer){
			array_push($arr,$officer->username);
		}
		$officer = implode(",",$arr);
		echo $officer;
	}
}
