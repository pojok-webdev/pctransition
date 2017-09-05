<?php
class Ptroubleshoot extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function gettroubleshoot($name="",$segment=0,$offset=0){
        if(($segment===0)&&($offset===0)){
            $limit = " ";
        }else{
            $limit = "limit ".$segment.", ".$offset." ";
        }
        $ci = & get_instance();
        $sql = "select a.id,c.name,a.request_date1, ";
        $sql.= "troubleshoottype, ";
        $sql.= "b.address, ";
        $sql.= "a.pic_phone, ";
        $sql.= "a.pic_email, ";
        $sql.= "a.status, ";
        $sql.= "a.troubleshoot_date, ";
        $sql.= "group_concat(e.name) branch ";
        $sql.= "from troubleshoot_requests a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join branches_client_sites d on d.client_site_id=b.id ";
        $sql.= "left outer join branches e on e.id=d.branch_id ";
        $sql.= "where c.name like '%".$name."%' ";
        $sql.= "group by a.id,c.name,a.request_date1,troubleshoottype,b.address,pic_phone,pic_email,a.status,a.troubleshoot_date ";
        $sql.= "order by c.name asc ";
        $sql.= $limit;
        $que = $ci->db->query($sql);
        return $que->result();
    }
}