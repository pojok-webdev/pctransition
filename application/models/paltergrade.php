<?php
class Paltergrade extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getaltergrades(){
        $ci = & get_instance();
        $sql = "select a.id,c.name,a.product,a.altertype,a.integer_part,a.fraction_part,a.integer_part_down,a.fraction_part_down,d.username am from altergrades a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join users d on d.id=c.sale_id ";
        $res = $ci->db->query($sql);
        return $res->result();
    }
    function getobjbyid($id){
        $ci = & get_instance();
        $sql = "select a.id,a.client_site_id,c.name,a.product,a.altertype,a.integer_part,a.fraction_part,a.integer_part_down,a.fraction_part_down,d.username am from altergrades a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join users d on d.id=c.sale_id ";
        $sql.= "where a.id=".$id;
        $res = $ci->db->query($sql);
        return $res->result()[0];
    }
    function has_authority($id){
        $ci = & get_instance();
        $sql = "select a.id from users a left outer join authorities_users b on b.user_id=a.id ";
        $sql.= "where b.authority_id=1 ";
        $sql.= "and a.id='".$id."'";
        $que = $ci->db->query($sql);
        if($que->num_rows()>0){
            return true;
        }
        return false;
    }    
}