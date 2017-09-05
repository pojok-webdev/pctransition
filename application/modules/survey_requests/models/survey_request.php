<?php
class Survey_request extends DataMapper{
	var $has_one = array('client','service');
	var $has_many = array('client_site','survey_date','survey_site','survey_surveyor','user','install_request');

	function __construct(){
		parent::__construct();
	}

	function add($params){
		$obj = new Survey_request();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}

	function checkresume($opt){
		$result = ($this->resume==$opt)?'checked':'';
		return $result;
	}

	function close_survey_date($params){
		$obj = new Survey_request();
		$obj->where('id',$params['survey_request_id'])->update(array('survey_date'=>$params['survey_date'],'user_close'=>$params['sender']));
		return $obj->check_last_query();
	}

	function edit($params){
		$obj = new Survey_request();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
	}

	function get_notification($status){
		$obj = new Survey_request();
		$obj->where('status',$status)->get();
		return $obj->result_count();
	}

	function get_obj_by_id($id){
		$obj = new Survey_request();
		$obj->where('id',$id)->get();
		return $obj;
	}

	function get_survey_requests(){
		$objs = new Survey_request();
		$objs->where('active','1')->order_by('create_date','asc')->get();
		return $objs;
	}

	function get_survey_request_by_id($id){
		$objs = new Survey_request();
		$objs->where('active','1')->where('id',$id)->order_by('create_date','asc')->get();
		return $objs;
	}

	function get_survey_requests_by_monthyear($month,$year){
		$query = 'select day(survey_date)survey_day from survey_requests where month(survey_date)="' . $month . '" and year(survey_date)="' . $year . '"';
		$result = $this->db->query($query);
		$out = $result->result();
		return $out;
	}

	function get_survey_requests_by_monthyeardate($year,$month,$day){
		$query = 'select a.id,a.survey_date,b.name client_name,';
		$query.= 'day(a.survey_date)survey_day,';
		$query.= 'month(a.survey_date)suvey_month,';
		$query.= 'year(a.survey_date)survey_year from survey_requests a ';
		$query.= 'left outer join clients b on b.id=a.client_id ';
		$query.= 'where month(a.survey_date)="' . $month . '" ';
		$query.= 'and year(a.survey_date)="' . $year . '" and ';
		$query.= 'day(a.survey_date)="' . $day . '"';
		$result = $this->db->query($query);
		$out = $result->result();
		return $out;
	}

	function get_survey_requests_total(){
		$objs = new Survey_request();
		$objs->where('active','1')->get();
		return $objs->result_count();
	}

	function get_client_combo_data(){
		$survey_requests = new Survey_request();
		$survey_requests->get();
		$out = array();
		foreach ($survey_requests as $request){
			$out[$request->id] = $request->client->name;
		}
		return $out;
	}

	function get_surveyors($request_id){
		$surveyors = new Survey_surveyor();
		$surveyors->where('survey_request_id',$request_id)->get();
		return $surveyors;
	}

	function get_surveyor_report($request_id){
		$surveyors = new Survey_surveyor();
		$surveyors->where('survey_request_id',$request_id)->get();
		$arr = array();
		foreach ($surveyors as $surveyor){
			array_push($arr,$surveyor->name);
		}
		$out = implode(',',$arr);
		return $out;
	}

	function get_survey_site_report($request_id){
		$sites = new Survey_site();
		$sites->where('survey_request_id',$request_id)->get();
		$arr = array();
		for($c=0;$c<ceil($sites->result_count()/2);$c++){
			$mysites = new Survey_site();
			$mysites->where('survey_request_id',$request_id)->get(2,$c*2);
			$myarr = array();
			foreach ($mysites as $site){
				array_push($myarr, $site);
			}
			array_push($arr, $myarr);
		}
		return $arr;
	}

	function populate($active=1,$resume='1'){
		$obj = new Survey_request();
//		$obj->include_related('survey_site',array('execution_date'))->where('active',$active)->where('resume',$resume)->where_related_install_request('survey_request_id',NULL)->get();
		$obj->include_related('survey_site',array('execution_date'))->where('active',$active)->where('resume',$resume)->get();
		return $obj;
	}

	/*function populate4install($active=1){
		$obj = new Survey_request();
		$obj->include_related('survey_site',array('execution_date'))->where('active',$active)->where_in('resume',array('1','2'))->get();
		return $obj;
	}*/

	function install_lookup($users){
		$arr = array();
		$users = getsubordinates($this->ionuser->id,$arr);
		$listuser = implode(",",$users);
		$objs = new Survey_site();		
		$query = "select distinct a.id,d.name,a.resume,a.client_id,b.client_site_id csid,b.client_id cid,c.address,d.sale_id userid, f.username,d.phone_area,d.phone from survey_requests a ";
		$query.= "left outer join survey_sites b on b.survey_request_id=a.id ";
		$query.= "left outer join client_sites c on c.id=b.client_site_id ";
		$query.= "left outer join clients d on d.id=c.client_id ";
		$query.= "left outer join install_sites e on e.client_site_id=c.id ";
		$query.= "left outer join users f on f.id=d.sale_id where (e.status in (1) or e.status is null) and a.resume in (1,2) and d.sale_id in (".$listuser.");";
		$objs->query($query);
//		echo $objs->check_last_query();
		return $objs;
	}

	function populatereport(){
		$obj = new Survey_request();
		$obj->get();
		return $obj;
	}

	function request_save($obj){
		$request = new Survey_request();
		$request->client_id = $obj['client_id'];
		$request->service_id = $obj['service_id'];
		$request->survey_date = $obj['survey_date'];
		$request->pic_name = $obj['pic_name'];
		$request->pic_phone = $obj['pic_phone'];
		$request->pic_position = $obj['pic_position'];
		$request->pic_email = $obj['pic_email'];
		$request->covering_letter = $obj['covering_letter'];
		$request->user_name = $this->session->userdata['username'];
		$request->save();
		return $this->db->insert_id();
	}

	function request_update($obj){
		$request = new Survey_request();
		$request->where('id',$obj['id'])->update(array(
		'client_id'=>$obj['client_id'],
		'service_id'=>$obj['service_id'],
		'survey_date'=>$obj['survey_date'],
		'pic_name'=>$obj['pic_name'],
		'pic_phone'=>$obj['pic_phone'],
		'pic_email'=>$obj['pic_email'],
		'pic_position'=>$obj['pic_position'],
		'covering_letter'=>$obj['covering_letter'],
		'longresume'=>$obj['resume'],
		'resume'=>$obj['shortresume']
		));
		return $request->check_last_query();
	}

	function show($status){
		$obj = new Survey_request();
		$obj->include_related('survey_site',array('execution_date'))->where('active','1')->where_in('status',$status)->get();
		return $obj;
	}

	function updatestatus($params){
		$obj = new Survey_request();
		$obj->where('id',$params['id'])->update('status',$params['status']);
		return $obj->check_last_query();
	}

	function extract_fields($id=NULL){
		$out = array();
		if(!is_null($id)){
			$survey = new Survey_request();
			$survey->where('id',$id)->get();
			$out['survey_id'] = $id;
			$out['client_id'] = $survey->client_id;
			$out['service_id'] = $survey->service_id;
			$out['pic_name'] = $survey->pic_name;
			$out['pic_position'] = $survey->pic_position;
			$out['pic_phone'] = $survey->pic_phone;
		}else{
			$out['survey_id'] = '';
			$out['client_id'] = '';
			$out['service_id'] = '';
			$out['pic_name'] = '';
			$out['pic_position'] = '';
			$out['pic_phone'] = '';
		}
		return $out;
	}
}
