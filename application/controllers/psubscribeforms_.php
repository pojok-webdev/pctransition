<?php
class Psubscribeforms extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('subscription');
		$this->load->helper('padi');
	}
	function index(){
		padi_checklogin();
		$data = array(
			'objs'=>getclients(),
			'menuFeed'=>'subscribeform'
		);
		$this->load->view('Sales/subscribeforms/index',$data);
	}
	function edit(){
		padi_checklogin();
		$id = $this->uri->segment(3);
		$clientsite = getclientinfo($id);
		$fb = getfb($id);
		$data = array(
			'objs'=>getpics($id),
			'fb'=>$fb,
			'menuFeed'=>'subscribeform',
			'clientsite'=>$clientsite
		);
		$this->load->view('Sales/subscribeforms/edit',$data);
	}
	function iscomplete($fbid){
		$obj = new Fb();
		$obj->where('id',$fbid)->get();
		$iscomplete = true;
		if(trim($obj->name)===''){
			$iscomplete = false;
		}
		if(trim($obj->activationdate)===''){
			$iscomplete = false;
		}
		if(isnull($obj->activationdate)){
			$iscomplete = false;
		}
		if(trim($obj->period1)===''){
			$iscomplete = false;
		}
		if(trim($obj->period2)===''){
			$iscomplete = false;
		}
		if(isnull($obj->period1)){
			$iscomplete = false;
		}
		if(isnull($obj->period2)){
			$iscomplete = false;
		}
		return $iscomplete;
	}
	function savefee(){
		$params = $this->input->post();
		$obj = new Fbfee();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function setfbcomplete(){
		$params = $this->input->post();
		$obj = new Client_site();
		$obj->where('id',$params['id'])->update(array('fbcomplete'=>'1'));
		echo $params['id'];
	}
	function getpics(){
		$clientsiteid = $this->uri->segment(3);
		$fb = getfb($clientsiteid);

		$clientsite = getclientinfo($clientsiteid);
		$fbpic = getfbpic($clientsiteid);
		$fbfees = getfbfees($clientsiteid,"setup");
		$setup = '"id":"'.$fbfees['name'].'","name":"BIAYA SETUP","dpp":"Rp. '.number_format($fbfees['dpp'],2).'","ppn":"'.$fbfees['ppn'].'","total":"Rp. '.number_format($fbfees['total'],2).'"';

		$fbfees = getfbfees($clientsiteid,"monthly");
		$monthlyfee = '"id":"'.$fbfees['name'].'","name":"BIAYA SETUP","dpp":"Rp. '.number_format($fbfees['dpp'],2).'","ppn":"'.$fbfees['ppn'].'","total":"Rp. '.number_format($fbfees['total'],2).'"';

		$fbfees = getfbfees($clientsiteid,"device");
		$device = '"id":"'.$fbfees['name'].'","name":"BIAYA SETUP","dpp":"Rp. '.number_format($fbfees['dpp'],2).'","ppn":"'.$fbfees['ppn'].'","total":"Rp. '.number_format($fbfees['total'],2).'"';

		$fbfees = getfbfees($clientsiteid,"deposit");
		$deposit = '"id":"'.$fbfees['name'].'","name":"BIAYA SETUP","dpp":"Rp. '.number_format($fbfees['dpp'],2).'","ppn":"'.$fbfees['ppn'].'","total":"Rp. '.number_format($fbfees['total'],2).'"';

		$nofb = '"nofb":"'.$fb->nofb.'"';
		$username = '"username":"'.$fb->username.'"';
		$name = '"name":"'.$clientsite->name.'"';
		$businesstype = '"businesstype":"'.$fb->businesstype.'"';
		$address = '"address":"'.$clientsite->address.'"';
		$phone = '"phone":"'.$clientsite->phone.'"';
		$fax = '"fax":"'.$clientsite->fax.'"';
		$siup = '"siup":"'.$fb->siup.'"';
		$businesstype = '"businesstype":"'.$fb->businesstype.'"';
		$npwp = '"npwp":"'.$fb->npwp.'"';
		$subscriber = '"id":"","name":"","position":"","idnum":"","phone":"","hp":"","email":""';
		$tek = '"id":"","name":"","phone":"","hp":"","email":""';
		$resp = '"id":"","name":"","position":"","idnum":"","phone":"","hp":"","email":""';
		$bill = '"id":"","name":"","phone":"","hp":"","email":""';
		$support = '"id":"","name":"","phone":"","hp":"","email":""';
		$adm = '"id":"","name":"","phone":"","hp":"","email":""';
		foreach($fbpic as $pic){
			switch(strtoupper($pic->role)){
				case 'SUBSCRIBER':
					$subscriber = '"id":"'.$pic->client_id.'","name":"'.$pic->name.'","position":"'.$pic->position.'","ktp":"'.$pic->idnum.'","telp_hp":"'.$pic->phone.'","hp":"'.$pic->hp.'","email":"'.$pic->email.'"';
				break;
				case 'TEKNIS':
					$tek = '"id":"'.$pic->client_id.'","name":"'.$pic->name.'","telp_hp":"'.$pic->phone.'","hp":"'.$pic->hp.'","email":"'.$pic->email.'","idnum":"'.$pic->idnum.'"';
				break;
				case 'RESP':
					$resp = '"id":"'.$pic->client_id.'","name":"'.$pic->name.'","position":"'.$pic->position.'","ktp":"'.$pic->idnum.'","telp_hp":"'.$pic->phone.'","hp":"'.$pic->hp.'","email":"'.$pic->email.'","idnum":"'.$pic->idnum.'"';
				break;
				case 'BILLING':
					$bill = '"id":"'.$pic->client_id.'","name":"'.$pic->name.'","telp_hp":"'.$pic->phone.'","hp":"'.$pic->hp.'","email":"'.$pic->email.'","idnum":"'.$pic->idnum.'"';
				break;
				case 'SUPPORT':
					$support = '"id":"'.$pic->client_id.'","name":"'.$pic->name.'","telp_hp":"'.$pic->phone.'","hp":"'.$pic->hp.'","email":"'.$pic->email.'","idnum":"'.$pic->idnum.'"';
				break;
				case 'ADM':
				$adm = '"id":"'.$pic->client_id.'","name":"'.$pic->name.'","telp_hp":"'.$pic->phone.'","hp":"'.$pic->hp.'","email":"'.$pic->email.'","idnum":"'.$pic->idnum.'"';
				break;
			}
		}
		echo '{'.$nofb.','.$name.','.$username.','.$businesstype.','.$address.','.$phone.','.$fax.','.$siup.','.$npwp.',"subscriber":{'.$subscriber.'},"resp":{'.$resp.'},"adm":{'.$adm.'},"teknis":{'.$tek.'},"billing":{'.$bill.'},"support":{'.$support.'},"activationdate":"'.date ("d/m/Y",strtotime($fb->activationdate)).'","period1":"'.date ("d/m/Y",strtotime($fb->period1)).'","period2":"'.date ("d/m/Y",strtotime($fb->period1)).'","services":"Layanan macam-macam","monthlyfee":{'.$monthlyfee.'},"devicefee":{'.$device.'},"setupfee":{'.$setup.'},"otherfee":{'.$deposit.'},"businesstype":{'.$businesstype.'}}';
	}
	function getfees(){
		$clientsiteid = $this->uri->segment(3);
		$fb = getfb($clientsiteid);
		$clientsite = getclientinfo($clientsiteid);
		$fbpic = getfbpic($clientsiteid);
		$nofb = '"nofb":"'.$fb->nofb.'"';
		$name = '"name":"'.$clientsite->name.'"';
		$businesstype = '"businesstype":"'.$fb->businesstype.'"';
		$address = '"address":"'.$clientsite->address.'"';
		$phone = '"phone":"'.$clientsite->phone.'"';
		$fax = '"fax":"'.$clientsite->fax.'"';
		$siup = '"siup":"'.$fb->siup.'"';
		$npwp = '"npwp":"'.$fb->npwp.'"';
		$subscriber = '"id":"","name":"","position":"","idnum":"","phone":"","hp":"","email":""';
		$tek = '"id":"","name":"","phone":"","hp":"","email":""';
		$resp = '"id":"","name":"","position":"","idnum":"","phone":"","hp":"","email":""';
		$bill = '"id":"","name":"","phone":"","hp":"","email":""';
		$support = '"id":"","name":"","phone":"","hp":"","email":""';
		$adm = '"id":"","name":"","phone":"","hp":"","email":""';
		foreach($fbpic as $pic){
			switch(strtoupper($pic->prole)){
				case 'PEMOHON':
					$subscriber = '"id":"'.$pic->id.'","name":"'.$pic->name.'","position":"'.$pic->position.'","ktp":"'.$pic->ktp.'","telp_hp":"'.$pic->telp_hp.'","hp":"'.$pic->hp.'","email":"'.$pic->email.'"';
				break;
				case 'TEKNIS & INSTALASI':
					$tek = '"id":"'.$pic->id.'","name":"'.$pic->name.'","telp_hp":"'.$pic->telp_hp.'","hp":"'.$pic->hp.'","email":"'.$pic->email.'"';
				break;
				case 'PENANGGUNG JAWAB':
					$resp = '"id":"'.$pic->id.'","name":"'.$pic->name.'","position":"'.$pic->position.'","ktp":"'.$pic->ktp.'","telp_hp":"'.$pic->telp_hp.'","hp":"'.$pic->hp.'","email":"'.$pic->email.'"';
				break;
				case 'PENAGIHAN':
					$bill = '"id":"'.$pic->id.'","name":"'.$pic->name.'","telp_hp":"'.$pic->telp_hp.'","hp":"'.$pic->hp.'","email":"'.$pic->email.'"';
				break;
				case 'SUPPORT':
					$support = '"id":"'.$pic->id.'","name":"'.$pic->name.'","telp_hp":"'.$pic->telp_hp.'","hp":"'.$pic->hp.'","email":"'.$pic->email.'"';
				break;
				case 'ADMINISTRASI':
				$adm = '"id":"'.$pic->id.'","name":"'.$pic->name.'","telp_hp":"'.$pic->telp_hp.'","hp":"'.$pic->hp.'","email":"'.$pic->email.'"';
				break;
			}
		}
		echo '{'.$nofb.','.$name.','.$businesstype.','.$address.','.$phone.','.$fax.','.$siup.','.$npwp.',"subscriber":{'.$subscriber.'},"resp":{'.$resp.'},"adm":{'.$adm.'},"teknis":{'.$tek.'},"billing":{'.$bill.'},"support":{'.$support.'},"activationdate":"'.date ("d/m/Y",strtotime($fb->activationdate)).'","period1":"'.date ("d/m/Y",strtotime($fb->period1)).'","period2":"'.date ("d/m/Y",strtotime($fb->period1)).'","services":"Layanan macam-macam"}';
	}
	function showreport(){
		$data['dt1']='2016-1-1';
		$data['dt2']='2016-1-1';
		$data['userbranches']='2016-1-1';
		$data['users']=array("1");
		$data['userbranches']=array();
		$data['ams']=array();
		$id = $this->uri->segment(3);
		$clientsite = getclientinfo($id);
		$fb = getfb($id);
		$data = array(
			'id'=>$id,
			'objs'=>getpics($id),
			'fb'=>$fb,
			'menuFeed'=>'subscribeform',
			'clientsite'=>$clientsite
		);
		$this->load->view("Sales/subscribeforms/report",$data);
	}
}
