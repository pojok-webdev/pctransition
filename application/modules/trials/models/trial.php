<?php
class Trial extends DataMapper{
	var $has_one = array('client_site');
	var $has_many = array('trialofficer');
	function __construct(){
		parent::__construct();
	}
	function get_obj_by_id($id){
		$query = 'select a.id,a.startdate,a.enddate,a.newtrialnotify,date_format(a.startdate,"%d/%m/%Y")dtstart,date_format(a.startdate,"%T")tmstart,date_format(a.startdate,"%H")hrstart,date_format(a.startdate,"%i")mnstart,date_format(a.enddate,"%d/%m/%Y")dtend,date_format(a.enddate,"%T")tmend,date_format(a.enddate,"%H")hrend,date_format(a.enddate,"%i")mnend,c.name clientname from trials a ';
		$query.= "left outer join client_sites b on b.id=a.client_site_id ";
		$query.= "left outer join clients c on c.id=b.client_id ";
		$query.= 'where a.id='.$id.'';
		//echo $query;
		$result = $this->db->query($query);
		$row = $result->result()[0];
//		$obj = new Trial();
//		$obj->where('id',$id)->get();
//		return $obj;
		return $row;
	}
	function populate(){
		$obj = new Trial();
		$obj->get();
		return $obj;
	}
}
