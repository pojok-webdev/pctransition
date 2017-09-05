<?php
class Maintenancereport_application extends CI_Model{
    function save($maintenancereport_id,$application_id){
        $sql = "insert into maintenancereport_applications ";
        $sql.= "(maintenancereport_id,application_id) ";
        $sql.= "values ";
        $sql.= "($maintenancereport_id,$application_id) ";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function populate($maintenancereport_id){
        $sql = "select a.application_id,b.name from maintenancereport_applications a ";
        $sql.= "left outer join applications b on b.id=a.application_id ";
        $sql.= "left outer join maintenancereports c on c.maintenance_id=a.maintenancereport_id ";
        $sql.= "where c.id=$maintenancereport_id ";
        $ci = & get_instance();
        $qry = $ci->db->query($sql);
        return $qry->result();
    }
    function remove($maintenancereport_id,$application_id){
        $sql = "delete from maintenancereport_applications ";
        $sql.= "where maintenancereport_id=$maintenancereport_id and application_id=$application_id ";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $sql;
    }
}