<?php
class Maintenancereport_image extends CI_Model{
    function saveimage($maintenancereport_id,$name,$description,$image,$imagetype=1){
        $sql = "insert into maintenancereport_images ";
        $sql.= "(maintenancereport_id,name,description,image,imagetype) ";
        $sql.= "values ";
        $sql.= "('".$maintenancereport_id."','".$name."','".$description."','".$image."','".$imagetype."')";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function removeimage($maintenancereport_id){
        $sql = "delete from maintenancereport_images ";
        $sql.= "where id='".$maintenancereport_id."' ";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $sql;
    }    
    function removeoperator($maintenancereport_id,$operator_id){
        $sql = "delete from maintenancereport_kompetitors ";
        $sql.= "where maintenancereport_id='".$maintenancereport_id."' and operator_id='".$operator_id."' ";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $sql;
    }
    function populate($maintenancereport_id,$imagetype=array('1')){
        $sql = "select a.id,a.image,a.description,a.name from maintenancereport_images a ";
        $sql.= "left outer join maintenancereports b on b.maintenance_id=a.maintenancereport_id ";
        $sql.= "where b.id = ". $maintenancereport_id . " ";
        $sql.= "and imagetype in ('".implode("','",$imagetype)."') " ;
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
}