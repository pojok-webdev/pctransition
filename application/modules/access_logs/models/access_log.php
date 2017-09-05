<?php
class Access_log extends CI_Model{
    public $ci;
    function __construct(){
        parent::__construct();
        $this->ci = & get_instance();
    }
    function insert_log($action){
        $sql = "insert into access_logs ";
        $sql.= "(user_name,action,ipaddr) ";
        $sql.= "values ";
        $sql.= "(";
        $sql.= "'".$this->ci->session->userdata('username')."',";
        $sql.= "'".$action."',";
        $sql.= "'".$_SERVER["REMOTE_ADDR"]."'";
        $sql.= ")";
        $this->ci->db->query($sql);
        return $this->ci->db->insert_id();
    }
    function get_last_login_by_username($user_name){
        $sql = "select user_name,ipaddr,action,createdate from access_logs ";
        $sql.= "where user_name='".$user_name."' ";
        $sql.= "order by create_date desc ";
        $sql.= "limit 1,1";
        $que = $this->ci->db->query($sql);
        return $que->result();
    }
}
/*
	
	function insert_log($action){
		$access_log = new Access_log();
		$access_log->user_name = $this->obj->session->userdata['username'];
		$access_log->action = $action;
		$access_log->ipaddr = $_SERVER["REMOTE_ADDR"];
		$access_log->save();
	}
	
	function get_last_login_by_username($user_name){
		$access_log = new Access_log();
		$access_log->where('user_name',$user_name)->order_by('create_date','desc')->get(1,1);
		return $access_log->create_date;
	}


*/