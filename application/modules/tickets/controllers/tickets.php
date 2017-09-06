<?php
class Tickets extends CI_Controller{
	var $setting,$preference,$ionuser;
	function __construct(){
		parent::__construct();
		$this->load->helper('padi');
		$this->load->helper('ticket');
		$this->load->helper('user');
	}
	function statistic_a(){
		$data['menuFeed']='ticket';
		$data["objs"] = getstatistics();
		$this->load->view("TS/tickets/statistic_a",$data);
	}
	function statistic(){
		$data['menuFeed']='ticket';
		$data["objs"] = getstatistics();
		$this->load->view("TS/tickets/statistic_bar",$data);
	}
	function test(){
		echo getservices($this->uri->segment(3));
/*		$x = getclientsites();
		foreach($x as $y){
			echo $y->id." ".$y->client_site_id.$y->name."<br />";
		}
		foreach(getuserbranches() as $br){
			echo $br;
		}
		echo "<br />", implode(",",getuserbranches());*/
		//getclients();
	}
	function save(){
		$params = $this->input->post();
		echo ticket_save($params);
	}
	function saves(){
		//echo "xx";
		$params = $this->input->post();
		$ticket = new Ticket();

		foreach($params as $key=>$val){
			$ticket->$key = $val;
		}
		$ticket->save();
		echo $this->db->insert_id();

/*		$str="";
		foreach($params as $key=>$val){
			$str.=$key.' - '.$val;
		}
		echo $str;*/
		//echo "tset";
		//echo $params["clientname"];
	}
	function ajaxHistory(){
		$id = $this->uri->segment(3);
		$objs = new Ticket_followup();
		$objs->where('ticket_id',$id)->get();
		$out = array();
		foreach($objs as $obj){
			switch($obj->result){
				case '0':
				$status = 'Progress';
				break;
				case '1':
				$status = 'OK';
				break;
				case '2':
				$status = 'Monitoring';
				break;
				case '3':
				$status = 'Progress (Blm bisa dihubungi)';
				break;
			}
			//$status = ($obj->result=="1")?"OK":"Progress";
			//$row = '{"followUpDate":"'.$obj->followUpDate.'","picname":"'.$obj->picname.'","position":"'.$obj->position.'","status":"'.$status.'","username":"'.$obj->username.'","description":"'.$obj->description.'"}';
			$row = '{"followUpDate":"'.$obj->followUpDate.'","picname":"'.$obj->picname.'","picphone":"'.$obj->picphone.'","position":"'.$obj->position.'","status":"'.$status.'","username":"'.$obj->username.'","description":"<button onclick=show_description('.$obj->id.') ticket_id='.$obj->id.'>Show Description</button> "}';
			array_push($out,$row);
		}
		echo '{"aaData":['.implode(',',$out).']}';
	}
	function getDescription(){
		$id = $this->uri->segment(3);
		$objs = new Ticket_followup();
		$objs->where('id',$id)->get();
		echo $objs->description;
	}
	function getCause(){
		$id = $this->uri->segment(3);
		$objs = new Ticket_followup();
		$objs->where('id',$id)->get();
		echo $objs->ticket->cause;
	}
	function getConfirmationResult(){
		$id = $this->uri->segment(3);
		$objs = new Ticket_followup();
		$objs->where('id',$id)->get();
		echo $objs->confirmationresult;
	}
	function getComplaint(){
		$id = $this->uri->segment(3);
		$objs = new Ticket_followup();
		$objs->where('id',$id)->get();
		echo $objs->ticket->complaint;
	}
	function getDowntime(){
		$id = $this->uri->segment(3);
		$sql = "select concat(datediff(downtimeend,downtimestart) ,' hari ',timediff(downtimeend,downtimestart)) downtime from tickets a ";
		$sql.= "left outer join ticket_followups b on b.ticket_id=a.id ";
		$sql.= "where b.id=".$id;
		$query = $this->db->query($sql);
		$result = $query->result(); 
		echo $result[0]->downtime;
//		echo "this is downtime " . $sql;
	}
	function getTicketComplaint(){
		$id = $this->uri->segment(3);
		$objs = new Ticket();
		$objs->where('id',$id)->get();
		echo $objs->complaint;
	}
	function getSolution(){
		$id = $this->uri->segment(3);
		$objs = new Ticket_followup();
		$objs->where('id',$id)->get();
		echo $objs->ticket->solution;		
	}
	function getTroubleshootSolutions(){
		$id = $this->uri->segment(3);
		$objs = new Troubleshoot_request();
		$objs->where('status','1')->where('ticket_id',$id)->get();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr,'"'.$obj->id.'":{"id":"'.$obj->id.'","description":"'.$obj->description.'","activities":"'.$obj->activities.'","create_date":"'.$obj->create_date.'"}');
		}
		$out = '{'.implode(",",$arr).'}';
		echo $out;
	}
	function getTroubleshootSolutionsz(){
		$id = $this->uri->segment(3);
		$objs = new Troubleshoot_request();
		$objs->where('ticket_id',$id)->get();
		$rowcount = $objs->result_count();
		$objs->where('status','1')->where('ticket_id',$id)->get();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr,'[{"id":"'.$obj->id.'","description":"'.$obj->description.'","activities":"'.$obj->activities.'","create_date":"'.$obj->create_date.'"}]');
		}
		$out = '{"rowcount":"'.$rowcount.'","rw":'.implode(",",$arr).'}';
		echo $out;
	}
	function feedData(){
		//$objs = ticket_populate();
		$objs = ticket_populate2();
		$rows = array();
		foreach($objs as $obj){
			$vals = array();
			//array_push($vals,'"status":"'.$obj->status.'"');
			array_push($vals,'"kdticket":"'.$obj->kdticket.'"');
			array_push($vals,'"duration":"'.$obj->duration3.'"');
			array_push($vals,'"status":"'.$obj->ticketStatus.'"');
			array_push($vals,'"ticketend":"'.$obj->ticketEnd.'"');
			$val = '{"'.$obj->id.'":{' . implode(",",$vals) . '}}';
			array_push($rows,$val);
		}
		echo '['.implode(",",$rows).']';
	}
	function embuh(){
		/*
		$dtq = "select now() nau";
		$dtr = $this->db->query($dtq);
		$dt = $dtr->result();
		echo $dt[0]->nau;
		*/
		$sql = 'select concat(case when ticketend is null then datediff(now(),ticketstart) when ticketend="0000-00-00 00:00:00" then datediff(now(),ticketstart) else datediff(ticketend,ticketstart) end," days ",time_format(case when ticketend is null then timediff(now(),ticketstart) when ticketend="0000-00-00 00:00:00" then timediff(now(),ticketstart) else timediff(ticketend,ticketstart) end,"%H jam %i menit %s detik")) from tickets;';
		$obj = new Ticket();
		$obj->query($sql);
		
	}
	function filterx(){
		$id = $this->uri->segment(3);
		padi_checklogin();
		$data = Appsettings::getdata();
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
		}
		$tkt = new Ticket();
		$tkt->where('id',$id)->get();
		
		$data['id'] = $id;
		$data['kdticket'] = $tkt->kdticket;
		$data['objs']=ticket_populate();
		$data['menuFeed']='ticket';
		$data['hours'] = Common::gethours();
		$data['minutes'] = Common::getminutes();
		$data['ticketcauses'] = Ticketcause::get_combo_data('Pilihlah');
		if($this->session->userdata["role"]=="TS"){
			if ($this->uri->total_segments()==3){
				switch($this->uri->segment(3)){
					case 'open':
					$data['objs']=Ticket::populate('0');
					break;
					case 'closed':
					$data['objs']=Ticket::populate('1');
					break;
					case 'all':
					$data['objs']=Ticket::populate();
					break;
				}
			}
			$this->load->view('TS/tickets',$data);
		}else{
			redirect(base_url() . "index.php/adm/chooseRole");
		}		
	}
	function filter(){
		padi_checklogin();
		$data = Appsettings::getdata();
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
		}
		$data['objs']=ticket_populate2();
		$data['menuFeed']='ticket';
		$data['hours'] = Common::gethours();
		$data['minutes'] = Common::getminutes();
		$data['clients'] = Client::get_clients();
		$data['ticketcauses'] = Ticketcause::get_combo_data('Pilihlah');
		if($this->session->userdata["role"]=="TS"){
			/*if ($this->uri->total_segments()==3){
				switch($this->uri->segment(3)){
					case 'open':
					$data['objs']=Ticket::populate('0');
					break;
					case 'closed':
					$data['objs']=Ticket::populate('1');
					break;
					case 'all':
					$data['objs']=Ticket::populate();
					break;
				}
			}*/
			$this->load->view('TS/tickets',$data);
		}elseif($this->session->userdata["role"]==="CRO"){
			$this->load->view('CRO/tickets',$data);
		}else{
			redirect(base_url() . "index.php/adm/chooseRole");
		}
	}
	function index(){
		padi_checklogin();
		// $data = Appsettings::getdata();
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
		}
		$data['objs']=ticket_populate2();
		$data['menuFeed']='ticket';
		$data['hours'] = Common::gethours();
		$data['minutes'] = Common::getminutes();
		//$data['clients'] = Client::get_clients();
//		$data['clients'] = getclients();
		$data['clients'] = getclientsites();
		$data['ticketcauses'] = Ticketcause::get_combo_data('Pilihlah');
		if(($this->session->userdata["role"]=="TS")||($this->session->userdata["role"]=="EOS")){
			if ($this->uri->total_segments()==3){
				switch($this->uri->segment(3)){
					case 'open':
					$data['objs']=Ticket::populate('0');
					break;
					case 'closed':
					$data['objs']=Ticket::populate('1');
					break;
					case 'all':
					$data['objs']=Ticket::populate();
					break;
				}
			}
			$this->load->view('TS/tickets',$data);
		}	elseif(($this->session->userdata["role"]=="CRO")){
			if ($this->uri->total_segments()==3){
				switch($this->uri->segment(3)){
					case 'open':
					$data['objs']=Ticket::populate('0');
					break;
					case 'closed':
					$data['objs']=Ticket::populate('1');
					break;
					case 'all':
					$data['objs']=Ticket::populate();
					break;
				}
			}
			$this->load->view('CRO/tickets',$data);
		}
		
		else{
			redirect(base_url() . "index.php/adm/chooseRole");
		}
	}
	function get_client_name(){
		$type = $this->uri->segment(3);
		switch($type){
			case 'backbone':
				$arr = array();
				foreach(Backbone::get_combo_data() as $key=>$val){
					array_push($arr, '"' . $key . '":"' . $val . '"');
				}
				$out = implode(',',$arr);
				$out = '{' . $out . '}';
				echo $out;
			break;
			case 'datacenter':
				$arr = array();
				foreach(Datacenter::get_combo_data() as $key=>$val){
					array_push($arr, '"' . $key . '":"' . $val . '"');
				}
				$out = implode(',',$arr);
				$out = '{' . $out . '}';
				echo $out;
			break;
			case 'bts':
				$arr = array();
				foreach(Pbtstower::get_combo_data() as $key=>$val){
					array_push($arr, '"' . $key . '":"' . $val . '"');
				}
				$out = implode(',',$arr);
				$out = '{' . $out . '}';
				echo $out;
			break;
			case 'pelanggan':
				$arr = array();
				foreach(Client::get_combo_data_address() as $key=>$val){
					array_push($arr, '"' . $key . '":"' . $val . '"');
				}
				$out = implode(',',$arr);
				$out = '{' . $out . '}';
				echo $out;
			break;
		}
	}
	function getClient(){
		$type = $this->uri->segment(3);
		$userbranch = getuserbranches();
		switch($type){
			case 'backbone':
				$arr = array();
				$objs = new Backbone();
				$objs->get();
				foreach($objs as $obj){
					array_push($arr,'"'.$obj->id.'":{"id":"'.$obj->id.'","name":"'.$obj->name.'","location":"'.$obj->location.'"}');
				}
				echo '{'.implode(',',$arr).'}';
			break;
			case 'datacenter':
				$arr = array();
				$objs = new Datacenter();
				$objs->get();
				foreach($objs as $obj){
					array_push($arr,'"'.$obj->id.'":{"id":"'.$obj->id.'","name":"'.$obj->name.'","location":"'.$obj->location.'"}');
				}
				echo '{'.implode(',',$arr).'}';
			break;
			case 'bts':
				$arr = array();
				//$objs = new Btstower();
				//$objs->get();
				$objs = Pbtstower::populate();
				foreach($objs as $obj){
					array_push($arr,'"'.$obj->id.'":{"id":"'.$obj->id.'","name":"'.$obj->name.'","location":"'.$obj->location.'"}');
				}
				echo '{'.implode(',',$arr).'}';
			break;
			case 'pelanggan':
				$arr = array();
				$objs = new Client();
				//$objs->where('active','1')->get();
				$objs->where('active','1')->where_in_related("client_site/branch","id",$userbranch)->get();
				foreach($objs as $obj){
					array_push($arr,'"'.$obj->id.'":{"id":"'.$obj->id.'","name":"'.$obj->name.'","location":"'.$obj->address.'"}');
				}
				echo '{'.implode(',',$arr).'}';
			break;
		}
	}
	function getUpstreamClients(){
		$id = $this->uri->segment(3);
		$query = "select * from tickets where parentid=".$id."";
		$mydb = $this->db->query($query);
		$arr = array();
		foreach($mydb->result() as $result){
			array_push($arr,'{"id":"'.$result->id.'","clientname":"'.$result->clientname.'","address":"'.$result->location.'","complaint":"'.$result->complaint.'","reporter":"'.$result->reporter.'","reporterphone":"'.$result->reporterphone.'"}');
//			echo "Result ".$result->clientname;
		}
		echo "[".implode(",",$arr)."]";
	}
	function pgetJSON(){
		echo padi_getjson('Ticket','tickets','id',$this->uri->segment(3));	
	}
	function getJSON(){
		$id = $this->uri->segment(3);
		$obj = new Ticket();
		$obj->where('id',$id)->get();
		echo '{"requesttype":"'.$obj->requesttype.'","clientname":"'.$obj->clientname.'","location":"'.$obj->location.'","subject":"'.$obj->subject.'","content":"'.$obj->content.'","reporter":"'.$obj->reporter.'","status":"'.$obj->status.'","ticketstart":"'.$obj->ticketstart.'","ticketend":"'.$obj->ticketend.'","requeststart":"'.$obj->requeststart.'","requestend":"'.$obj->requestend.'","cause":"'.$obj->cause.'","picname":"'.$obj->client_site->pic_name.'","picphone":"'.$obj->client_site->pic_phone.'","picemail":"'.$obj->client_site->pic_email.'"}';
	}
	function requesttypes(){
		echo '{"backbone":"Backbone","bts":"BTS","datacenter":"Data Center","pelanggan":"Pelanggan"}';
	}
	function get_obj_by_id(){
		$id = $this->uri->segment(3);
		$objs = new Ticket();
		$objs->where('id',$id)->get();
		$arr = array();
		$fields = $this->db->list_fields('tickets');
		foreach($fields as $field){
			array_push($arr, '"' . $field . '":"' . $objs->$field . '"');
		}
		array_push($arr,'"services":"a,b"');
		$is_ok = ($objs->alltroubleshootaccomplished($objs->id)>0)?'no':'yes';
		array_push($arr,'"is_ok":"'.$is_ok.'"');
		$str = implode(',',$arr);
		echo '{' . $str . '}';
	}
	function get_preferences(){
		if($this->auth->is_logged_in()){
			$this->preference = User::get_user_preferences($this->session->userdata['id']);
		}
	}
	function get_web_settings(){
		$out = array();
		$web_settings = new Web_setting();
		$web_settings->get();
		$out['theme'] = $web_settings->theme;
		$out['language'] = $web_settings->language;
		$out['footer_text'] = $web_settings->footer_text;
		return $out;
	}
	public function check_authentication(){
		if(!$this->auth->is_logged_in()){
			redirect(base_url() . 'index.php/back_end/login');
		}
		$user = new User();
		$user->where('id',$this->session->userdata['id'])->get();
		$user_info['username'] = $user->username;
		$user_info['group'] = $user->group->name;
		$this->user_info = $user_info;
	}
	function getRecordOver(){
		$objs = new Ticket();
		$objs->where("id >",$this->uri->segment(3))->get();
		$rows = array();
		foreach($objs as $obj){
			$vals = array();
			foreach($this->db->list_fields("tickets") as $field){
				array_push($vals,'"'.$field.'":"'.$obj->$field.'"');
			}
			$srvarray = array();
			foreach($obj->client_site->clientservice as $service){
				array_push($srvarray,$service->name);
			}
			array_push($vals,'"services":"'.implode(",",$srvarray).'"');
			$hticketend = ($obj->ticketend=='0000-00-00 00:00:00')?'-':$obj->ticketend;
			$hstatus = ($obj->status=='0')?'open':'closed';
			array_push($vals,'"hticketend":"'.$hticketend.'"');
			array_push($vals,'"hstatus":"'.$hstatus.'"');
			$val = '{"'.$obj->id.'":{' . implode(",",$vals) . '}}';
			array_push($rows,$val);
		}
		echo '['.implode(",",$rows).']';
	}
	function handler(){
		$params = $this->input->post();
		switch($params['post_sender']){
			case 'ticket':
				$params['subject'] = '[App Ticket]' . $params['subject'];
				ticket_save($params);
				$this->common->send_mail('puji@padi.net.id',$params['subject'],$params['content']);
				redirect(base_url() . 'index.php/tickets/lists');
				break;
			case 'ticket_answer':
				$params['subject'] = $params['subject'];
				ticket_save($params);
				$this->common->send_mail('puji@padi.net.id',$params['subject'],$params['content']);
				redirect(base_url() . 'index.php/tickets/lists');
		}
	}
	function lists(){
		$data = array('view_data'=>'list_tickets','tickets'=>ticket_gettickets());
		$this->load->view('common/backendindex',$data);
	}
	function detail(){
		$uri = $this->uri->uri_to_assoc();
		$ticket = ticket_getticket($uri['id']);
		$data = array('id'=>$uri['id'],'subject'=>$ticket->subject,'content'=>$ticket->content);
		$this->load->view('detail',$data);
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Ticket();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		return $obj->check_last_query();
	}
	function rekap(){
		$objs = new Ticket();
		padi_checklogin();
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
		}
		$data = array(
			"menuFeed"=>"tickets",
			"objs"=>$objs,
			"clientname"=>$objs->clientname
		);
		$this->load->view("TS/tickets/rekaptickets",$data);
	}
	function rekappdf(){
		$this->load->library("fpdf");
		$this->load->library("pdf");
		$requesttype = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$objs = new Ticket();
		$objs->where("requesttype",$requesttype)->where("client_id",$id)->get();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr,array($obj->kdticket,$obj->content,$obj->solution,$obj->duration()));
		}
		$pdf = new PDF();
		$header = array('Kode Ticket', 'Problem', 'Solusi', 'Duration');
		$pdf->SetFont('Arial','',14);
		$pdf->AddPage();
		$pdf->showPDF("RekapTicket-".camelize($objs->clientname), "Rekap Ticket ".$objs->clientname,'2014 - 2015',$header,$arr);
		$pdf->Output();
	}
	function getRekap(){
		$requesttype = $this->uri->segment(3);
		$client_id = $this->uri->segment(4);
		$objs = new Ticket();
		$objs->where("requesttype",$requesttype)->where("client_id",$client_id)->get();
		$ticketstatus = ($objs->status === "1")?"closed":"open";
		$arr = array();
		foreach($objs as $obj){
			array_push($arr,'{"kdticket":"'.$obj->kdticket.'","problem":"'.$obj->content.'","solusi":"'.$obj->solution.'","status":"'.$ticketstatus.'","clientname":"'.$obj->clientname.'","duration":"'.$obj->duration().'"}');
		}
		echo '{"obj":['.implode(",",$arr).']}';
	}
	function update(){
		$params = $this->input->post();
		ticket_update($params);
	}
	function testdatediff(){
		$curdate = new Datetime();
		$obj = new Ticket();
		$obj->where('id',7)->get();
		echo 'first date '.$obj->ticketstart.'<br />';
		$diff = date_diff(date_create($obj->ticketstart),date_create($obj->ticketend));
		$diff = date_diff(date_create($obj->ticketstart),$curdate);
		//$diff = date_diff($curdate,date_create($obj->ticketstart));
		echo $diff->format('%m bulan %d hari %H jam %I menit %s detik');

	/*	echo ' === '.var_dump(date_create($obj->ticketstart)===date_create($curdate)).'<br />';
		echo ' >   '.var_dump(date_create($obj->ticketstart)>date_create($curdate)).'<br />';
		echo ' <   '.var_dump(date_create($obj->ticketstart)<date_create($curdate)).'<br />';
*/
		echo ' === '.var_dump(date_create($obj->ticketstart)===$curdate).'<br />';
		echo ' >   '.var_dump(date_create($obj->ticketstart)>$curdate).'<br />';
		echo ' <   '.var_dump(date_create($obj->ticketstart)<$curdate).'<br />';
	}
	function testdatediff2(){
		$curdate = date('Y-m-d H:m:s');
		$obj = new Ticket();
		$obj->where('id',7)->get();
		echo 'first date '.$obj->ticketstart.'<br />';
		echo 'second date '.$curdate.'<br />';
		echo 'strcmp '.strcmp($curdate,$obj->ticketstart).'<br />';
		if($curdate > $obj->ticketstart){
			echo 'firstdate less than seconddate';
		}
		if($curdate < $obj->ticketstart){
			echo 'firstdate more than seconddate';
		}
	}
	function alltroubleshootaccomplished(){
		$ticket_id = $this->uri->segment(3);
		$obj = new Ticket();
		$obj->where('id',$ticket_id)->where_related_troubleshoot_request('status !=','1')->get();
		echo $obj->result_count();
	}
	function printjsonclient(){
		$type = $this->uri->segment(3);
		switch($type){
			case 'backbone':
				$arr = array();
				$objs = new Backbone();
				$objs->get();
				foreach($objs as $obj){
					array_push($arr,'"'.$obj->id.'":{"id":"'.$obj->id.'","name":"'.$obj->name.'","location":"'.$obj->location.'"}');
				}
				echo '{'.implode(',',$arr).'}';
			break;
			case 'datacenter':
				$arr = array();
				$objs = new Datacenter();
				$objs->get();
				foreach($objs as $obj){
					array_push($arr,'"'.$obj->id.'":{"id":"'.$obj->id.'","name":"'.$obj->name.'","location":"'.$obj->location.'"}');
				}
				echo '{'.implode(',',$arr).'}';
			break;
			case 'bts':
				$arr = array();
				//$objs = new Btstower();
				//$objs->get();
				$objs = Pbtstower::populate();
				foreach($objs as $obj){
					array_push($arr,'"'.$obj->id.'":{"id":"'.$obj->id.'","name":"'.$obj->name.'","location":"'.$obj->location.'"}');
				}
				echo '{'.implode(',',$arr).'}';
			break;
			case 'pelanggan':
				$arr = array();
				$objs = new Client();
				$objs->get();
				foreach($objs as $obj){
					array_push($arr,'"'.$obj->id.'":"'.$obj->name.'"');
				}
				echo '{'.implode(',',$arr).'}';
			break;
		}		
	}
	function listcustomers(){
		$objs = new Client();
		$objs->where('active','1')->get();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr,'{"value":"'.$obj->name.'","data":"'.$obj->id.'"}');
		}
		echo '{"out":['.implode(",",$arr).']}';
	}
	function listbackbones(){
		$objs = new Backbone();
		$objs->where('active','1')->get();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr,'{"value":"'.$obj->name.'","data":"'.$obj->id.'"}');
		}
		echo '{"out":['.implode(",",$arr).']}';
	}
	function listdatacenters(){
		$objs = new Datacenter();
		$objs->where('active','1')->get();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr,'{"value":"'.$obj->name.'","data":"'.$obj->id.'"}');
		}
		echo '{"out":['.implode(",",$arr).']}';
	}
	function listbts(){
		//$objs = new Btstower();
		//$objs->where('active','1')->get();
		$objs = Pbtstpwer::populate();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr,'{"value":"'.$obj->name.'","data":"'.$obj->id.'"}');
		}
		echo '{"out":['.implode(",",$arr).']}';
	}
	function listtest(){
		$userbranch = getuserbranches();
		$objs = new Client();
		//$objs->where('active','1')->get();
		$objs->where('active','1')->where_in_related("client_site/branch","id",$userbranch)->order_by('name','asc')->get();
		$arr = array();
		foreach($objs as $obj){
			$alias = "";
			if($obj->alias!==NULL){
				$alias = " (".$obj->alias.")";
			}
			array_push($arr,'{"value":"'.$obj->name."".$alias.'","data":"'.$obj->id.'"}');
		}
		echo '{"out":['.implode(",",$arr).']}';
		//echo '{"out":[{"value":"satu","data":"01"},{"value":"dua","data":"02"},{"value":"tiga","data":"03"},{"value":"empat","data":"04"}]}';
	}
	function listclients(){
		$this->load->model("pclient");
		$objs = Pclient::populate();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr,'{"value":"'.$obj->name.'","data":"'.$obj->id.'"}');
		}
		echo '{"out":['.implode(",",$arr).']}';
	}
	function list_backbones(){
		$objs = Pbackbone::populate();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr,'{"value":"'.$obj->name.'","data":"'.$obj->id.'"}');
		}
		echo '{"out":['.implode(",",$arr).']}';
	}
	function list_datacenters(){
		$objs = Pdatacenter::populate();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr,'{"value":"'.$obj->name.'","data":"'.$obj->id.'"}');
		}
		echo '{"out":['.implode(",",$arr).']}';
	}
	function list_bts(){
		$objs = Pbtstower::populate();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr,'{"value":"'.$obj->name.'","data":"'.$obj->id.'"}');
		}
		echo '{"out":['.implode(",",$arr).']}';
	}
	function listsrc(){
		echo '{
    "AD": "Andorra",
    "A2": "Andorra Test",
    "AE": "United Arab Emirates",
    "AF": "Afghanistan",
    "AG": "Antigua and Barbuda",
    "AI": "Anguilla",
    "AL": "Albania",
    "AM": "Armenia",
    "AN": "Netherlands Antilles",
    "AO": "Angola",
    "AQ": "Antarctica",
    "AR": "Argentina",
    "AS": "American Samoa",
    "AT": "Austria",
    "AU": "Australia",
    "AW": "Aruba",
    "AX": "\u00c5land Islands",
    "AZ": "Azerbaijan",
    "BA": "Bosnia and Herzegovina",
    "BB": "Barbados",
    "BD": "Bangladesh",
    "BE": "Belgium",
    "BF": "Burkina Faso",
    "BG": "Bulgaria",
    "BH": "Bahrain"}';
	}
	function testauto(){
		$backbones = new Backbone();
		$backbones->where('active','1')->get();
		//backbones = [{"value":"IDC Cyber LT 1","data":1},{"value":"IDC 3D","data":2},{"value":"APJII Cyber","data":3}],
		$bbarr = array();
		foreach($backbones as $key=>$val){
			array_push($bbarr,'{"value":"'.$val.'","data":"'.$key.'"}');
		}
		$data = array("backbones"=>'['.implode(",",$bbarr).']');
		$this->load->view('TS/tickets/addTicket');
	}
	function closeUpstreamClients(){
		$mydate = getdate();
		
		$id = $this->uri->segment(3);
		$tickets = new Ticket();
		$tickets->where("parentid",$id)->update(array("status"=>"1","ticketend"=>$mydate["year"]."-".$mydate["mon"]."-".$mydate["mday"]));
		echo "padi updated";
	}
}
