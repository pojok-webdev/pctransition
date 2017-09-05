<?php
class Pbts extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getbts($name="",$segment=0,$offset=0){
        if(($segment===0)&&($offset===0)){
            $limit = " ";
        }else{
            $limit = "limit ".$segment.", ".$offset." ";
        }
        $ci = & get_instance();
        $sql = "select id,name from btstowers ";
        $sql.= "where name like '%".$name."%' ";
        $sql.= $limit;
        $que = $ci->db->query($sql);
        return $que->result();
    }
}