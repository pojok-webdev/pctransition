<?php
class Preminder extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function newTicketMailGet(){
        $ci = & get_instance();
		$sql = "select a.*,";


        $sql.= "case a.requesttype ";
        $sql.= "when 'pelanggan' then client_site_id ";
        $sql.= "when 'backbone' then backbone_id ";
        $sql.= "when 'BTS' then btstower_id ";
        $sql.= "when 'core' then core_id ";
        $sql.= "when 'AP' then ap_id ";
        $sql.= "when 'Datacenter' then datacenter_id ";
        $sql.= "when 'PTP' then ptp_id ";
        $sql.= "end cid, ";


        $sql.= "c.username sales from tickets a ";
		$sql.= "left outer join clients b on b.id=a.client_id ";
		$sql.= "left outer join users c on c.id=b.sale_id ";
		$sql.= "where a.mailsent='0'";
        //echo "\n\n ".$sql." \n\n";
		$query = $ci->db->query($sql);
        return $query->result();
    }
    function closeTicketGet(){
        $ci = & get_instance();
        $sql = "select a.*,";
        $sql.= "case a.requesttype ";
        $sql.= "when 'pelanggan' then client_site_id ";
        $sql.= "when 'backbone' then backbone_id ";
        $sql.= "when 'BTS' then btstower_id ";
        $sql.= "when 'core' then core_id ";
        $sql.= "when 'AP' then ap_id ";
        $sql.= "when 'Datacenter' then datacenter_id ";
        $sql.= "when 'PTP' then ptp_id ";
        $sql.= "end cid, ";
        $sql.= "b.username,d.username sales from tickets a ";
		$sql.= "left outer join (select * from ticket_followups where result='1') b ";
		$sql.= "on b.ticket_id=a.id ";
		$sql.= "left outer join clients c on c.id=a.client_id ";
		$sql.= "left outer join users d on d.id=c.sale_id ";
		$sql.= "where a.mailsent='2'";
        //echo "\n\n".$sql."\n\n";
		$query = $ci->db->query($sql);
        return $query->result();
    }
    function newTicketMailUpdate($rowid){
        $ci = & get_instance();
        $sql = "update tickets set mailsent='1' where id=".$rowid;
        $qry = $ci->db->query($sql);        
    }
}