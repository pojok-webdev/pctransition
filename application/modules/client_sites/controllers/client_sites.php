<?php
class Client_sites extends CI_Controller{
	var $data,$user,$ionuser;
	function __construct(){
		parent::__construct();
		if($this->ion_auth->logged_in()){
			$this->load->model("pproduct");
			$this->ionuser = $this->ion_auth->user()->row();
			$user = new User();
			$this->data['user'] = $user->get_user_by_id($this->ionuser->id);
		}
	}
	function testRelation(){
		$client = new Client_site();
		$client->where("id",1)->get();
		$branch = new Branch();
		$branch->where("id",2)->get();
		$client->save($branch);
	}
	function addsurveysite(){
		$params = $this->input->post();
		echo Client_site::add($params);
	}
	function changeservice(){
		echo "service changed" . $params["name"];
	}
	function check_login(){
		if(!$this->ion_auth->logged_in()){
			redirect(base_url() . 'index.php/adm/login');
		}
	}
	function feedData(){
		$client_id = $this->uri->segment(3);
		$objs = Client_site::populate($client_id);
		$rows = array();
		foreach($objs as $obj){
			$vals = array();
			switch($obj->disconnection->status){
				case "0":
				$status = "Pengajuan ";
				break;
				default:
				$status = "";
				break;
			}
			/*switch($obj->disconnection->disconnectiontype){
				case "1":
				$status .= "Isolir";
				break;
				case "2":
				$status .= "Temporer";
				break;
				case "3":
					switch($obj->disconnection->status){
						case "0":
						$status = "Pengajuan Permanen";
						break;
						default:
						$status = "Mantan";
						break;
					}
				break;
				default:
				$status .= "Aktif";
				break;
			}*/
			switch($obj->active){
				case "0":
				$status = "Tidak Aktif";
				break;
				case "1":
				$status = "Aktif";
				break;
			}
			array_push($vals,'"status":"'.$status.'"');
			array_push($vals,'"address":"'.$obj->address.'"');
			$val = '{"'.$obj->id.'":{' . implode(",",$vals) . '}}';
			array_push($rows,$val);
		}
		echo '['.implode(",",$rows).']';
	}
	function edit(){
		$this->check_login();
		$this->data['business_fields'] = Business_field::get_combo_data("Pilihlah");
		$this->data['obj'] = Client_site::get_obj_by_id($this->uri->segment(3));
		$this->data['speeds'] = Speed::get_combo_data();
		$this->data['operators'] = Operator::get_combo_data();
		$this->data['services'] = Service::get_combo_data("Pilihlah");
		$this->data['users'] = User::get_combo_data_by_group("Sales","Pilihlah");
		$this->data['problems'] = Problem::get_combo_data();
		$this->data['durations'] = Duration::get_combo_data();
		$this->data['usage_periods'] = Usage_period::get_combo_data();
		$this->data['menuFeed'] = 'client';
		$this->data["products"]=$this->pproduct->getproducts();
		$this->data["smartvalue"]=$this->pproduct->smartvalue();
		$this->data["business"]=$this->pproduct->business();

		$this->data['branches'] = Branch::get_combo_data();
		switch($this->session->userdata["role"]){
			case 'Administrator':
				$this->load->view('adm/client_sites/edit',$this->data);
				break;
			case 'Umum dan Warehouse':
				break;
			case 'Sales':
				$this->load->view('Sales/client_sites/edit',$this->data);
				break;
			case 'TS':
				break;
			case 'Accounting':
				break;
			case 'CRO':
				$this->load->view('CRO/client_sites/edit',$this->data);
				break;
		}		
		
	}
	function get_device(){
		$params = $this->input->post();
		$obj = new $params['classname'];
		$obj->where('id',$params['id'])->get();
		$arr = array();
		foreach($this->db->list_fields(plural($params['classname'])) as $field){
			array_push($arr,'"'.$field.'"' . ':' . '"'.$obj->$field.'"');
		}
		$out = implode(",",$arr);
		echo '{' . $out . '}';
	}
	function getservice(){
		$params = $this->input->post();
		$sql = "select name,product,";
		$sql.= "case when integer_part is null then 0 else integer_part end integer_part,";
		$sql.= "case when fraction_part is null then 0 else fraction_part end fraction_part,";
		$sql.= "case when integer_part_down is null then 0 else integer_part_down end integer_part_down,";
		$sql.= "case when fraction_part_down is null then 0 else fraction_part_down end fraction_part_down ";
		$sql.= "from clientservices where id=".$params["id"]; 
		$que = $this->db->query($sql);
		$res = $que->result()[0];
		//$integer_part = ($res->integer_part==null)?"0":$res->integer_part;
//		echo '{"product":"'.$res->product.'"}';
		echo '{"product":"'.$res->product.'", "integer_part":"'.$res->integer_part.'", "fraction_part":"'.$res->fraction_part.'", "integer_part_down":"'.$res->integer_part_down.'", "fraction_part_down":"'.$res->fraction_part_down.'"}';
	}
	function index(){
		$this->check_login();
		$this->data['menuFeed'] = 'clientSite';
		$client_id = $this->uri->segment(3);
		$objs = Client_site::populate($client_id);
		if($this->uri->total_segments()==3){
			$this->data['clientname'] = $objs->client->name;
		}else{
			$this->data['clientname'] = 'Semua';
		}
		$this->data['objs']=$objs;
		switch($this->session->userdata["role"]){
			case 'Administrator':
				$this->load->view('adm/client_sites',$this->data);
				break;
			case 'Umum dan Warehouse':
				$this->load->view('Warehouse/clients/client_sites',$this->data);
				break;
			case 'Sales':
				$this->load->view('Sales/Clients/client_sites',$this->data);
				break;
			case 'TS':
				$this->load->view('TS/clients/client_sites',$this->data);
				break;
			case 'Accounting':
				$this->load->view('Accounting/Clients/client_sites',$this->data);
				break;
			case 'CRO':
				$this->load->view('CRO/Clients/client_sites',$this->data);
				break;
		}
	}
	function populatebyclient(){
		$id = $this->uri->segment(3);
		$arr = array();
		foreach(Client_site::get_combo_data($id) as $key=>$val){
			array_push($arr, '"' . $key . '":"' . $val . '"');
		}
		$out = implode(',',$arr);
		$out = '{' . $out . '}';
		echo $out;
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Client_site();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
	function removeDevice(){
		$params = $this->input->post();
		$obj = new $params['className']();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
	}
	function removeservice(){
		$id = $this->uri->segment(3);
		$sql = "delete from clientservices ";
		$sql.= "where id=".$id."";
		$this->db->query($sql);
		echo $sql;
	}
	function save(){
		$params = $this->input->post();
		$obj = new Client_site();
		echo $obj->save($params);
	}
	function save_apwifi(){
		$params = $this->input->post();
		$obj = new Site_apwifi();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
	}
	function save_router(){
		$params = $this->input->post();
		$obj = new Site_router();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
	}
	function save_device(){
		$params = $this->input->post();
		$obj = new Site_device();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
	}
	function save_pccard(){
		$params = $this->input->post();
		$obj = new Site_pccard();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->insert->db();
	}
	function save_switch(){
		$params = $this->input->post();
		$obj = new Site_switch();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function setBranch(){
		$data['menuFeed'] = 'setBranch';
		$clientsites = new Client_site();
		$clientsites->get();
		$data['clientsites'] = $clientsites;
		$this->load->view('adm/client_sites/setBranch',$data);
	}
	function update(){
		$params = $this->input->post();
		$obj = new Client_site();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
	}
	function view_devices(){
		$this->check_login();
		$this->data['menuFeed'] = 'clientSite';
		$client_id = $this->uri->segment(3);
		$objs = Client_site::populatebyid($client_id);
		if($this->uri->total_segments()==3){
			$this->data['clientname'] = $objs->client->name;
		}else{
			$this->data['clientname'] = 'Semua';
		}
		$this->data['objs']=$objs;
		switch($this->session->userdata["role"]){
			case 'Administrator':
				$this->load->view('adm/view_devices',$this->data);
				break;
			case 'Umum dan Warehouse':
				$this->load->view('Warehouse/clients/view_devices',$this->data);
				break;
			case 'Sales':
				$this->load->view('Sales/Clients/view_devices',$this->data);
				break;
			case 'TS':
				$this->load->view('TS/clients/view_devices',$this->data);
				break;
			case 'Accounting':
				$this->load->view('Accounting/Clients/view_devices',$this->data);
				break;
		}
	}	
	function getobjbyid(){
		$id = $this->uri->segment(3);
		$obj = new Client_site();
		$obj->where('id',$id)->get();
		$arr = array();
		foreach($this->db->list_fields('client_sites') as $field){
			array_push($arr, '"' . $field . '":"' . $obj->$field . '"');
		}
		$str = implode(',',$arr);
		echo '{' . $str . '}';
	}
	function orphansites(){
		$objs = new Client_site();
		$objs->get();
		$data['objs'] = $objs;
		$data['menuFeed'] = 'client_sites';
		$this->load->view('adm/client_sites/client_sites',$data);
	}
	function set_branch(){
		$params = $this->input->post();
		$obj = new Client_site();
		$obj->where('id',$params['id'])->update($params);
		echo $obj->check_last_query();
	}
	function savebranch(){
		$params = $this->input->post();
		$client = new Client_site();
		$branches = $params["branches"];
		$client->where("id",$params["client_site_id"])->get();
		$branchtodel = new Branch();
		$branchtodel->get();
		$client->delete($branchtodel->all);
		for($i=0;$i<strlen($params["branches"]);$i++){
			$branch = new Branch();
			$branch->where("id",$branches[$i])->get();
			$client->save($branch);
		}
		echo $client->check_last_query();
		//echo $branches;
	}
	function savesalesbranch(){
		$params = $this->input->post();
		$query = "delete from clientsitesales where client_site_id = ".$params["client_site_id"];
		$this->db->query($query);
		$branches = $params["branches"];
		for($i=0;$i<strlen($params["branches"]);$i++){
			$query = "insert into clientsitesales (client_site_id,branch_id) values ('".$params["client_site_id"]."','".$branches[$i]."')";
			$this->db->query($query);
		}
	}
	function saveservice(){
		$params = $this->input->post();
		$sql = "insert into clientservices ";
		$sql.= "(client_site_id,name,product) ";
		$sql.= "values ";
		$sql.= "(".$params["client_site_id"].",'".$params["name"]."','".$params["product"]."') ";
		$ci = & get_instance();
		$ci->db->query($sql);
		echo $ci->db->insert_id();
	}
	function updateservice(){
		$params = $this->input->post();
		$arr = array();
		foreach($params as $key=>$val){
			$str = "$key='$val'";
			array_push($arr,$str);
		}
		$sql = "update clientservices set ". implode(",",$arr). " ";
		$sql.= "where id=".$params["id"];
		$ci = & get_instance();
		$ci->db->query($sql);
		echo $sql;		
	}
	function getbranches(){
		$params = $this->input->post();
		//$params = array("id"=>221,"columntoinspect":"client_id");
		$obj = new Client_site();
		$obj->where($params["columntoinspect"],$params["id"])->get();
		$arr = array();
		foreach($obj->branch as $branch){
			array_push($arr,'{"id":"'.$branch->id.'","name":"'.$branch->name.'"}');
		}
		echo '['.implode(",",$arr).']';
	}
}
 
