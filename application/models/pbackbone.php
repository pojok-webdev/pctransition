<?php
class Pbackbone extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getbackbone($name="",$segment=0,$offset=0){
        if(($segment===0)&&($offset===0)){
            $limit = " ";
        }else{
            $limit = "limit ".$segment.", ".$offset." ";
        }
        $ci = & get_instance();
        $sql = "select id,name from backbones ";
        $sql.= "where name like '%".$name."%' ";
        $sql.= $limit;
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function get_combo_data(){
        $ci = & get_instance();
        $sql = "select id,name from backbones ";
        $que = $ci->db->query($sql);
        $res = $que->result();
        $out = array();
        foreach($res as $row){
            $out[$obj->id] = $out->name;
        }
        return $out;
    }
    function populate(){
        $ci = & get_instance();
        $sql = "select a.id,a.name,group_concat(c.name) branch,a.location from backbones a ";
        $sql.= "left outer join backbones_branches b on b.backbone_id=a.id ";
        $sql.= "left outer join branches c on c.id=b.branch_id ";
        $sql.= "group by a.id,a.name";
        $que = $ci->db->query($sql);
        return $que->result();
    }
}