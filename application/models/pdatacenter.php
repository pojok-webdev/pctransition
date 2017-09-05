<?php
class Pdatacenter extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getdatacenter($name="",$segment=0,$offset=0){
        if(($segment===0)&&($offset===0)){
            $limit = " ";
        }else{
            $limit = "limit ".$segment.", ".$offset." ";
        }
        $ci = & get_instance();
        $sql = "select id,name from datacenters ";
        $sql.= "where name like '%".$name."%' ";
        $sql.= $limit;
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function populate(){
        $ci = & get_instance();
        $sql = "select a.id,a.name,group_concat(b.name) branch,a.location from datacenters a ";
        $sql.= "left outer join branches b on b.id=a.branch_id ";
        $sql.= "group by a.id,a.name";
        $que = $ci->db->query($sql);
        return $que->result();
    }
}