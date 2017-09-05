<?php
class Peos extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function geteoses(){
        $ci = & get_instance();
        $sql = "select a.id,username,name from users a ";
        $sql.= "left outer join groups_users b on b.user_id=a.id ";
        $sql.= "left outer join groups c on c.id=b.group_id where c.name='eos';";
        $res = $ci->db->query($sql);
        return $res->result();
    }
}