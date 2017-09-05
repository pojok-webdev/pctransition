<?php
class Pbtstower extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function add($params){
        $keys = array();$vals = array();
        foreach($params as $key=>$val){
            array_push($keys,$key);
        }
        foreach($params as $key=>$val){
            array_push($vals,$val);
        }
        $ci = & get_instance();
        $sql = 'insert into btstowers ';
        $sql.= '('.implode(',',$keys).')';
        $sql.= 'values';
        $sql.= '("'.implode('","',$vals).'")';
        $ci->db->query($sql);
        echo $ci->db->insert_id();
    }
	function edit($params){
        $arr = array();
        foreach($params as $key=>$val){
            array_push($arr,''.$key.'="'.$val.'"');
        }        
        $sql = 'update btstowers set '.implode(",",$arr).' where id='.$params['id'];
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $sql;
	}
    function populate(){
        $sql = "select id,name,location,description from btstowers ";
        $sql.= "where active='1' ";
        $sql.= "order by name asc ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return $res;
	}
	function get_combo_data($first_row = '',$branch_id = null){
        $sql = "select id,name,location,description from btstowers  ";
        if(is_null($branch_id)){
            $sql.= "";
        }else{
            $sql.= "where branch_id='".$branch_id."' ";
        }
 //       $sql.= "order by name asc ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
		//$btses = new Btstower();
		$out = array();
		if($first_row!=''){
			$out[0] = $first_row;
		}
/*		if(is_null($branch_id)){
            $sql.= "order by name asc";
			//$btses->order_by('name','asc')->get();
		}else{
            $sql.= "where  branch_id=".$branch_id." order by name asc";
//			$btses->where('branch_id',$branch_id)->order_by('name','asc')->get();
		}*/
        $btses = $res;
		foreach ($btses as $bts){
			$out[$bts->id] = $bts->name;
		}
		return $out;
	}
}