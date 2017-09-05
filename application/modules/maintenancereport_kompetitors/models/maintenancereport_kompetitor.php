<?php
class Maintenancereport_kompetitor extends CI_Model{
    function saveoperator($maintenancereport_id,$operator_id,$service,$description){
        $sql = "insert into maintenancereport_kompetitors ";
        $sql.= "(maintenancereport_id,operator_id,service,description) ";
        $sql.= "values ";
        $sql.= "('".$maintenancereport_id."','".$operator_id."','".$service."','".$description."')";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function removeoperator($id){
        $sql = "delete from maintenancereport_kompetitors ";
        $sql.= "where id='".$id."' ";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $sql;
    }
    function populate($maintenancereport_id){
        $sql = "select *,b.name from maintenancereport_kompetitors a ";
        $sql.= "left outer join operators b on b.id=a.operator_id ";
        $sql.= "where maintenancereport_id = ". $maintenancereport_id . " ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
}