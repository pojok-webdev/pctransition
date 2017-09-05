<?php
class Puser extends CI_Model{
    var $ci;
    function __construct(){
        parent::__construct();
        $this->ci = & get_instance();
    }
    function populate(){
        $sql = "select a.id,username,a.active,a.phone,a.email,b.name groupname,group_concat(d.name) branch from users a ";
        $sql.= "left outer join groups b on b.id=group_id ";
        $sql.= "left outer join branches_users c on c.user_id=a.id ";
        $sql.= "left outer join branches d on d.id=c.branch_id ";
        $sql.= "where status='1' group by a.id,username,a.active,a.phone,a.email,b.name order by username asc ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return $res;
    }
    function getbyname($username){
        $sql = "select a.*,b.name groupname,f.username spv, group_concat(d.name) branch from users a ";
        $sql.= "left outer join groups b on b.id=group_id ";
        $sql.= "left outer join branches_users c on c.user_id=a.id ";
        $sql.= "left outer join branches d on d.id=c.branch_id ";
        $sql.= "left outer join supervisors_users e on e.user_id=a.id ";
        $sql.= "left outer join users f on f.id=e.supervisor_id ";
        $sql.= "where a.username='".$username."' ";
        $sql.= "group by a.id,username,a.active,a.phone,a.email,b.name,f.username ";
        $sql.= "order by username asc ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return $res[0];
    }
    function getmember($id){
        $sql = "select a.username,a.email,a.id from users a ";
        $sql.= "left outer join supervisors_users b on b.user_id=a.id ";
        $sql.= "left outer join users c on c.id=b.supervisor_id ";
        $sql.= "where c.id=".$id." ";
        $que = $this->ci->db->query($sql);
        return $que->result();
    }
}