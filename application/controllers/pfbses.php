<?php
class Pfbses extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper("subscription");
    }
    function add(){
        $this->common->check_login();
        $client_id = $this->uri->segment(3);
        $data = array(
            "menuFeed"=>"fbs",
            "client"=>getnamebyclientid($client_id),
            "formlabel"=>"Penambahan FB",
            "client_id"=>$client_id,
            "username"=>$this->session->userdata["username"],
            "fb" => getfb($client_id),
            "nofb"=>generatefb($client_id),
            'objs'=>getpics($client_id),
        );
        $this->load->view("v2/fbs/ad",$data);
    }
    function generatefb($branch,$client_id){
        $this->common->check_login();
        $out = $branch."".date("Ym").$client_id;
        $sql = "select count(id)cnt from fbs where client_id= ".$client_id;
        $que = $this->db->query($sql);
        $res = $que->result();
        return $out;
    }
    function cgeneratefb(){
        #!/usr/bin/php
        $params = $_SERVER["argv"];
        echo $this->generatefb($params[3],$params[4]) . "\n";
    }
    function index(){
        $this->common->check_login();
        $client_id = $this->uri->segment(3);
        $objs = getfbs($client_id);
        $clientname = getnamebyclientid($client_id);
        $cname = "FB Belum ada";
        if($clientname){
            $cname = $clientname->name;
        }
        $data = array(
            "menuFeed"=>"fbs",
            "tablelabel"=>"Form Berlangganan : ".$cname,
            "objs"=>$objs,
            "clientid"=>$client_id
        );
        $this->load->view("v2/fbs/index",$data);
    }
	function showreport(){
        $this->common->check_login();
		$data['dt1']='2016-1-1';
		$data['dt2']='2016-1-1';
		$data['userbranches']='2016-1-1';
		$data['users']=array("1");
		$data['userbranches']=array();
		$data['ams']=array();
		$nofb = $this->uri->segment(3);
		$clientsite = getclientinfo($nofb);
		$fb = printfb($nofb);
		$data = array(
			'id'=>$nofb,
			'objs'=>getpics($nofb),
            "pics"=>getfbpic($nofb),
			'fb'=>$fb,
			'menuFeed'=>'subscribeform',
			'clientsite'=>$clientsite
		);
		$this->load->view("Sales/fbs/report",$data);
	}
    function update(){
        $this->common->check_login();
        $params = $this->input->post();
        $arr = array();
        foreach($params as $key=>$val){
            array_push($arr,$key." = '".$val."'");
        }
        $sql = "update fbs set " . implode(",",$arr) . " ";
        $sql.= "where nofb = '" . $params["nofb"] . "'";
        $ci = & get_instance();
        $ci->db->query($sql);
        echo $sql;
    }
}