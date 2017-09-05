<?php
class Reports extends CI_Controller{
	var $setting;
	var $alertcount;
	var $mpath;
	var $db2;
	var $ionuser;
	var $data;
	function __construct(){
		parent::__construct();
		$this->setting = Common::get_web_settings();
		$this->mpath = base_url() . 'index.php/clients/';
		$this->lang->load('padi',$this->setting['language']);
		$this->load->helper("report");
		//$path = array('csspath'=>base_url() . 'css/aquarius','jspath'=>base_url() . 'js/aquarius','imagepath'=>base_url() . 'img/aquarius');
		/*$this->data = array(
			'csspath' => base_url() . 'css/aquarius/',
			'jspath' => base_url() . 'js/aquarius/',
			'imagepath' => base_url() . 'img/aquarius/',
			'path'=>$path,
		);*/
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
			$this->data['user'] = User::get_user_by_id($this->ionuser->id);
		}
	}
	function test_install_permonth(){
		install_per_month('10','2015');
	}
	function check_login(){
		if(!$this->ion_auth->logged_in()){
			redirect(base_url() . 'index.php/adm/login');
		}
	}
	function index(){
		$this->check_login();
		$this->data['reports'] = array(
			'0'=>'Pilihlah',
			'1'=>'Ticket',
			//'2'=>'Pelanggan',
			'3'=>'Survey',
			'4'=>'Instalasi',
		);
		$this->data['tickettypes'] = array(
			'backbone'=>'Backbone',
			'datacenter'=>'Data Center',
			'bts'=>'BTS',
			'pelanggan'=>'Pelanggan'
		);
		$this->data['menuFeed']='report';
		$this->data['clients'] = $this->populateClient('Pilihlah');
		$mygroup = User::get_group_name($this->ionuser->id);
		switch($mygroup){
			case 'Administrator':
				$this->load->view('reports/filter',$this->data);
				break;
			case 'Umum dan Warehouse':
				$this->load->view('reports/filter',$this->data);
				break;
			case 'Sales':
				$this->load->view('reports/filter',$this->data);
				break;
			case 'TS':
				$this->load->view('filter',$this->data);
				break;
			case 'Accounting':
				$this->load->view('reports/filter',$this->data);
				break;
		}
	}
	function install(){
		$this->load->view('install');
	}
	function installbyclient(){
		$client_id = $this->uri->segment(3);
		$objs = new Install_site();
		$objs->where('id',$client_id)->get();
		$oprarr = array();
		foreach($objs->install_installer as $operator){
			array_push($oprarr,$operator->name);//$opr.=$operator->name;
		}
		$opr = implode(",",$oprarr);
		$data = array(
			'objs'=>$objs,
			'opr'=>$opr,
		);
		$this->load->view('installbyclient',$data);
	}
	function populateClient($firstRow = ""){
		$clients = new Client();
		$clients->get();
		$out = array();
		if($firstRow!=""){
			$out[0] = "Pilihlah";
		}
		foreach($clients as $client){
			$out[$client->id] = $client->name;
		}
		return $out;
	}
	function survey(){
		$id = $this->uri->segment(3);
		$obj = new Survey_request();
		$obj->where('id',$id)->get();
		$data = array(
		'obj'=>$obj,
		'business_field'=>$obj->client->business_field,
		'client_name'=>$obj->client->name,
		'client_address'=>$obj->client->address,
		'survey_date'=>$obj->survey_date,
		'surveyor'=>$obj->survey_surveyor->name,
		'sites'=>$obj->survey_site,
		);
		foreach($obj->survey_site->survey_image as $img){
			echo 'PATH ' . $img->path . '<br />';
		}
		$this->load->view('survey',$data);
	}
	function surveybyclient(){
		$client_id = $this->uri->segment(3);
		$data = array(
			//'objs'=>Survey_request::populatereport($client_id)
			'objs'=>Survey_site::populate($client_id)
		);
		$this->load->view('surveybyclient',$data);
	}
	function ticketbyclient(){
		$type = $this->uri->segment(3);
		$client_id = $this->uri->segment(4);
		$data = array(
			//'objs'=>Ticket_followup::populate($client_id)
			'objs'=>Ticket::get_ticket_by_client($type,$client_id),
		);
		//$this->load->view('ticketbyclient',$data);
		$this->load->view('ticketperpelanggan',$data);
	}
	function tickets(){
		$client_id = $this->uri->segment(3);
		$data = array(
			'objs'=>Ticket_followup::populate($client_id)
			//''=>Ticket::populate(),
		);
		//$this->load->view('tickets',$data);
		$this->load->view('ticketperpelanggan',$data);
	}
	function reportpdf(){
		$this->load->view('instalasibyclientpdf');
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
	function testimage(){
		$image = 'http://teknis/reports/images/william-konfig-ap-unifi.jpg';
		$image = 'http://teknis/reports/images/william-foto2.bmp';
		echo '<img src="'.$image.'" />';
		$imageData = base64_encode(file_get_contents($image));
		$src = 'data: ' . mime_content_type($image) . ';base64,' . $imageData;
//		$src = 'data: ' . mime_content_type($image) . ';base64,' . $imageData;
		echo '<img src="'.$src.'">';
	}
	function testmime(){
		$image = 'http://teknis/reports/images/william-konfig-ap-unifi.jpg';
		echo finfo_file($image);
	}
	function getDataURI($image, $mime = '') {
		return 'data: '.(function_exists('mime_content_type') ? mime_content_type($image) : $mime).';base64,'.base64_encode(file_get_contents($image));
	}
	function getDataURI2($image, $mime = '') {
		return 'data: image/jpeg;base64,'.base64_encode(file_get_contents($image));
	}
	function testGetDataURI(){
		$img = $this->getDataURI2('http://teknis/reports/images/william-foto2.bmp');
		echo '<img src="'.$img.'">';
	}
	function octonyan(){
		$this->load->view('imagepdf');
	}
}
