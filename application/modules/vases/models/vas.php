<?php
class Vas extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function populate(){
        $ci = & get_instance();
        $sql = "select id,name,description from vases ";
        $que = $ci->db->query($sql);
        return $que->result();
    }
}