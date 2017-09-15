<?php
class Survey extends CI_Model{
	var $ci;
	var $id;
	function __construct($id = null){
		parent::__construct();
		$this->id = $id;
		$this->ci = & get_instance();
	}
	function get_surveysites(){
		$ci = & get_instance();
		$userbranch = getuserbranches();
		$id = $ci->session->userdata["user_id"];
		$arr = array();
		$users = getsubordinates($id,$arr);
		$userarr = implode(",",$users);		
		$brnc = "(".implode(",",$userbranch).")";
		$sql = "select distinct a.id,";
		$sql.= "case ";
		$sql.= " when d.alias is null then d.name ";
		$sql.= " else concat(d.name,' (',d.alias,')') ";
		$sql.= "end clientname,e.resume,a.direction,f.username,f.id userid,";
		$sql.= "e.resume eresume,e.create_date screate_date,a.address,";
		$sql.= "a.execution_date,a.survey_request_id,group_concat(g.name)surveyors ";
		$sql.= "from survey_sites a ";
		$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
		$sql.= "left outer join branches_client_sites c on c.client_site_id=b.id ";
		$sql.= "left outer join clients d on d.id=b.client_id ";
		$sql.= "left outer join survey_requests e on e.id=a.survey_request_id ";
		$sql.= "left outer join users f on f.id=d.sale_id ";
		$sql.= "left outer join survey_surveyors g on g.survey_request_id=e.id ";
		$sql.= "where c.branch_id in $brnc ";
		$sql.= "and d.sale_id in (".$userarr.") ";
		$sql.= "group by ";
		$sql.= "a.id, d.alias,d.name, ";
		$sql.= "e.resume,a.direction,f.username,f.id,";
		$sql.= "e.create_date,a.address,";
		$sql.= "a.execution_date,a.survey_request_id ";
		$obj = $ci->db->query($sql);
		return $obj->result();	
	}
	function get_survey_site_by_id(){
		$sql = "select a.*,c.sale_id from survey_sites a ";
		$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
		$sql.= "left outer join clients c on c.id=b.client_id ";
		$sql.= "where a.survey_request_id=".$this->id;
		$que = $this->ci->db->query($sql);
		return $que->result();
	}
	function get_sale_id(){
		$sql = "select c.sale_id from survey_sites a ";
		$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
		$sql.= "left outer join clients c on c.id=b.client_id ";
		$sql.= "where a.survey_request_id=".$this->id;
		$que = $this->ci->db->query($sql);
		return $que->result()[0]->sale_id;
	}
	function get_pics(){
		$sql = "select * from survey_sites a ";
		$sql.= "left outer join clients b on b.id=a.client_id ";
		$sql.= "left outer join pics c on c.client_id=b.id ";
		$sql.= "where a.id=" . $this->id . " ";
		$que = $this->ci->db->query($sql);
		return $que->result();
	}
	function get_site_pics(){
		$sql = "select c.id,c.name,c.position,c.hp,c.email from survey_sites a ";
		$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
		$sql.= "left outer join site_pics c on c.client_site_id=b.id ";
		$sql.= "where a.id=".$this->id;
		$que = $this->ci->db->query($sql);
		return $que->result();
	}
	function get(){
		$sql = "select a.id,a.survey_request_id,b.id clientsiteid,b.client_id,c.name,b.address, ";
		$sql.= "b.city,b.pic_name,c.service_id,c.branch_id,survey_date,description ";
		$sql.= "from survey_sites a ";
		$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
		$sql.= "left outer join clients c on c.id=b.client_id ";
		$sql.= "where a.id=".$this->id." ";
		$ci = & get_instance();
		$que = $this->ci->db->query($sql);
		return $que->result()[0];
	}
	function get_branches(){
		$sql = "select group_concat(d.name) branch from survey_sites a ";
		$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
		$sql.= "left outer join branches_client_sites c on c.client_site_id=b.id ";
		$sql.= "left outer join branches d on d.id=c.branch_id ";
		$sql.= "where a.id=".$this->id." ";
		$ci = & get_instance();
		$que = $this->ci->db->query($sql);
		return $que->result()[0]->branch;
	}
	function update($params){
		$survey = new Survey($this->id);
		$surveyobj = $this->get();
		$arr = array();
		foreach($params as $key=>$val){
			array_push($arr,"" . $key . " =  '" . $val . "'");
		}
		$sql = "update survey_requests ";
		$sql.= "set ";
		$sql.= implode(",",$arr) . " ";
		$sql.= "where id=".$surveyobj->survey_request_id;
		$ci = & get_instance();
		$que = $this->ci->db->query($sql);
		return $sql;
	}
}
