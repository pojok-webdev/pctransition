<?php
class Pap extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function add($params){
        $keys = array();$vals = array();
        foreach($params as $key=>$val){
            array_push($keys,$key);
            array_push($vals,$val);
        }
        $sql = "insert into aps ";
        $sql.= "(".implode(",",$keys).") ";
        $sql.= "values ";
        $sql.= "('".implode("','",$vals)."') ";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function getbyid($id){
        $sql = "select name,btstower_id,ipaddr,description from aps where id=".$id;
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return $res[0];
    }
	function get_by_bts($bts_id){
        $comment = "************************************ ";
        $comment.= "PENERAPAN FUNGSI INI BELUM DIKETAHUI ";
        $comment.= "************************************ ";
        $sql = "select id,name,ipaddr,description,user_name from aps ";
        $sql.= "where active='1' and btstower_id=".$bts_id;
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
		$out = array();
		foreach ($aps as $ap){
			$out[$ap->id] = $ap->name;
		}
		return $out;
	}
    function get_name_combo_data($first_row = ''){
        $comment = "************************************ ";
        $comment.= "PENERAPAN FUNGSI INI BELUM DIKETAHUI ";
        $comment.= "************************************ ";
        $sql = "select id,name,ipaddr,description,user_name from aps ";
        $sql.= "where active='1'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
		$out = array();
		if($first_row!=''){
			$out[$first_row] = $first_row;
		}
		foreach ($aps as $ap){
			$out[$ap->name] = $ap->name;
		}
		return $out;
	}
	function get_name_by_bts($bts_id){
        $comment = "************************************ ";
        $comment.= "PENERAPAN FUNGSI INI ADA DI PAPS UNTUK MENGEMBALIKAN JSON ";
        $comment.= "************************************ ";
        $sql = "select id,name,ipaddr,description,user_name from aps ";
        $sql.= "where active='1' and btstower_id=".$bts_id;
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
		$out = array();
		foreach ($res as $ap){
			$out[$ap->name] = $ap->name;
		}
		return $out;
	}    
	function get_combo_data($first_row = '',$bts_id=null){
        $comment = "************************************ ";
        $comment.= "PENERAPAN FUNGSI INI BELUM DIKETAHUI ";
        $comment.= "************************************ ";
        $sql = "select id,name,ipaddr,description,user_name from aps ";
        $sql.= "where active='1'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
		$out = array();
		if($first_row!=''){
			$out[0] = $first_row;
		}
		foreach ($res as $ap){
			$out[$ap->id] = $ap->name;
		}
		return $out;
	}    
    function get_combo_data_plus($first_row = '',$bts_id=null){
        $comment = "************************************ ";
        $comment.= "PENERAPAN FUNGSI INI ADA PADA UPSTREAM.JS ";
        $comment.= "************************************ ";
        $sql = "select a.id,a.name,a.ipaddr,a.description,a.user_name,b.name btsname from aps a ";
        $sql.= "left outer join btstowers b on b.id=a.btstower_id ";
        $sql.= "where a.active='1'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        $out = array();
		if($first_row!=''){
			$out[0] = $first_row;
		}
		foreach ($res as $ap){
			$out[$ap->id] = $ap->btsname." - ".$ap->name;
		}
		return $out;
    }
    function update($params){
        $arr = array();
        foreach($params as $key=>$val){
            array_push($arr,"".$key."='".$val."'");
        }
        $sql = "update aps set ".implode(",",$arr)." where id=".$params['id'];
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $sql;
    }
	function populate(){
        $comment = "************************************ ";
        $comment.= "PENERAPAN FUNGSI INI PADA adm/aps ";
        $comment.= "************************************ ";
        $sql = "select a.id,a.name,a.ipaddr,a.description,a.user_name,b.name btstowername from aps a ";
        $sql.= "left outer join btstowers b on b.id=a.btstower_id ";
        $sql.= "where a.active='1'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
		return $res;
	}
}