<?php
class Poperator extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getcombodata(){
        $sql = "select id,name from operators ";
        $ci = & get_instance();
        $que = $this->db->query($sql);
        $arr = array();
        foreach($que->result() as $res){
            $arr[$res->id] = $res->name;
        }
        return $arr;
    }
}