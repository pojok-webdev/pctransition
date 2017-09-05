<?php
class Maintenancereport_vas extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function populate($maintenancereport_id){
        $sql = "select vas_id,b.name,b.description from maintenancereport_vases a ";
        $sql.= "left outer join vases b on b.id=a.vas_id ";
        $sql.= "where maintenancereport_id=".$maintenancereport_id;
        $ci = & get_instance();
        $qry = $ci->db->query($sql);
        return $qry->result();
    }
    function save($maintenancereport_id,$vas_id){
        $sql = "insert into maintenancereport_vases ";
        $sql.= "(maintenancereport_id,vas_id) ";
        $sql.= "values ";
        $sql.= "($maintenancereport_id,$vas_id) ";
        $ci = & get_instance();
        $qry = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function remove($maintenancereport_id,$vas_id){
        $sql = "delete from maintenancereport_vases ";
        $sql.= "where maintenancereport_id=$maintenancereport_id and vas_id=$vas_id ";
        $ci = & get_instance();
        $qry = $ci->db->query($sql);
        return $sql;
    }
}