<?php
class Chats extends CI_Controller{
	var $ionuser;
	var $data = array();
	function __construct(){
		parent::__construct();
	}
	function check_login() {
		if (!$this->ion_auth->logged_in()) {
			redirect(base_url() . 'adm/login');
		}
	}
	function index(){
		$this->check_login();
		$params = $this->input->post();
		if($params["sender"]){
			$this->data["redirectsender"]=$params["sender"];
			$this->data["redirectsendername"]=$params["sendername"];
			//echo "sender :".$params["sender"]." ,sendername : ".$params["sendername"]."<br >";
		}else{
			$this->data["redirectsender"]='';
			$this->data["redirectsendername"]='';			
		}
		$users = new User();
		$users->get();
		//$users->query("select * from users where id in (8,9,10,13,17,19)");
		$this->data['menuFeed'] = 'chat';
		$this->data["users"] = $users;//User::populate();
		if (isset($this->session->userdata["role"])) {
			switch ($this->session->userdata["role"]) {
				case 'Sales':
					$this->load->view("obrolan",$this->data);
					break;
				case 'TS':
					$this->load->view("obrolan",$this->data);
					break;
				case 'Umum dan Warehouse':
					$this->load->view("obrolan",$this->data);
					break;
				default:
					break;
			}
		} else {
			redirect(base_url() . "adm/chooseRole",$this->data);
		}
	}
	function writemessage(){
		$params = $this->input->post();
		$chat = new Chat();
		foreach($params as $key=>$val){
			$chat->$key=$val;
		}
		$chat->save();
		echo $this->db->insert_id();
	}
	function loadconversation(){
		$params = $this->input->post();
		$chat = new Chat();
		$chat->where("sender",$this->session->userdata("user_id"))->where("receiver",$params["receiver"])->get();
		$arr = array();
		foreach($chat as $cht){
			array_push($arr,'{"senderid":"'.$cht->sender.'","sender":"","receiverid":"'.$cht->receiver.'","receiver":"","content":"","createdate":""}');
		}
	}
	function getmessages(){
		$params = $this->input->post();
		//$params["lastid"]=1;
		//$params["receiver"]=9;
		$arr = array();
		$arrnotify = array();

		$chat = new Chat();
		$qnotify = "select distinct sendername from chats where receiver=".$params["receiver"]." and unread='1'";
		$chat->query($qnotify);
		foreach($chat as $cht){
			array_push($arrnotify,'{"name":"'.$cht->sendername.'"}');
		}
		$chat = new Chat();
		$query = "select * from chats where ((sender =  ".$this->session->userdata("user_id")." and receiver = ".$params["receiver"]." ) or (sender = ".$params["receiver"]." and receiver = ".$this->session->userdata("user_id")." ) ) and id>".$params["lastid"]."  order by id asc;";
		$chat->query($query);
		foreach($chat as $cht){
			array_push($arr,'{"id":"'.$cht->id.'","senderid":"'.$cht->sender.'","sendername":"'.$cht->sendername.'","receiverid":"'.$cht->receiver.'","receivername":"'.$cht->receivername.'","content":"'.$cht->content.'","createdate":"'.$cht->createdate.'","paramlastid":"'.$params["lastid"].'"}');
		}
		echo '{"x":['.implode(',',$arr).'],"notify":['.implode(',',$arrnotify).']}';
	}
	function getunreadmessages(){
		$params = $this->input->post();
		$arrnotify = array();
		$chat = new Chat();
		$qnotify = "select distinct sendername,sender from chats where receiver=".$params["receiver"]." and unread='1'";
		$chat->query($qnotify);
		foreach($chat as $cht){
			array_push($arrnotify,'{"name":"'.$cht->sendername.'","sender":"'.$cht->sender.'"}');
		}
		echo '{"notify":['.implode(',',$arrnotify).']}';
	}
	function setread(){
		$params = $this->input->post();
		$chat = new Chat();
		$chat->where("id",$params["id"])->update(array("unread"=>"0"));
		echo $chat->check_last_query();
	}
}
