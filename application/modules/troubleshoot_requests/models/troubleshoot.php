<?php
class Troubleshoot extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	function getTroubleshoots(){
        $ci = & get_instance();
        $sql = "select a.id,a.ticket_id,b.clientname,b.kdticket,a.troubleshoottype,b.location,requesttype,reporter,reporterphone,c.address from troubleshoot_requests a ";
        $sql.= "left outer join tickets b on b.id=a.ticket_id ";
        $sql.= "left outer join client_sites c on c.id=a.client_site_id ";
        $que = $ci->db->query($sql);
        return $que->result();
    }

}