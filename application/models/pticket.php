<?php
class Pticket extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getticket($search,$page,$rownum){
        $ci = & get_instance();
        if($page>0){
            $startrow = ($page-1)*$rownum;
        }else{
            $startrow = 0;
        }
        
        $sql = "select a.id,kdticket,service,case a.status when '0' then 'Open' when '1' then 'Closed' end status,ticketstart,ticketend,reporter,reporterphone,createuser,clientname,count(b.id) troubleshootcount from tickets a ";
        $sql.= "left outer join troubleshoot_requests b on b.ticket_id=a.id ";
        $sql.= "where clientname like '%".$search."%' ";
        $sql.= "group by a.id,kdticket,service,a.status,ticketstart,reporter,reporterphone,createuser,clientname ";
        $qcount = $ci->db->query($sql);
        $count = $qcount->num_rows();
        $sql.= "order by kdticket desc ";
        $sql.= "limit $startrow,$rownum ";
        $que = $ci->db->query($sql);
        return array("result"=>$que->result(),"amount"=>$count);
    }
    function getbyid($id){
        $ci = & get_instance();
        $sql = "select a.id,a.kdticket,a.clientname,a.client_site_id,requesttype,c.phone clientphone,a.complaint,a.location ,a.description from tickets a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "where a.id=".$id;
        $que = $ci->db->query($sql);
        return $que->result()[0];
    }
}