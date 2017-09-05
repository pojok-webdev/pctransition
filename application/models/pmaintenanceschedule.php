<?php
class Pmaintenanceschedule extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getmaintenanceschedule($name="",$segment=0,$offset=0){
        if(($segment===0)&&($offset===0)){
            $limit = " ";
        }else{
            $limit = "limit ".$segment.", ".$offset." ";
        }
        $ci = & get_instance();
   		$this->load->helper("user");
        $id = $ci->session->userdata("user_id");
        $arr = getuserssupervised($id);
        array_push($arr,$id);
		$ids = "(".implode($arr,",").")";

        $sql = "select a.id,";
        $sql.= "case maintenance_type when 'pelanggan' then c.name ";
        $sql.= "when 'backbone' then g.name ";
        $sql.= "when 'datacenter' then i.name ";
        $sql.= "when 'bts' then h.name end name,";
        $sql.= "a.createdate, ";
        $sql.= "a.mdatetime, ";
        $sql.= "maintenance_type, ";
        $sql.= "b.address, ";
        $sql.= "b.pic_phone, ";
        $sql.= "b.pic_email, ";
        $sql.= "f.username am, ";
        $sql.= "case period_type ";
        $sql.= "when '1' then 'one time' ";
        $sql.= "when '2' then 'yearly' ";
        $sql.= "when '3' then 'monthly' ";
        $sql.= "when '4' then 'bimonthly' ";
        $sql.= "when '5' then 'quarter' when '6' ";
        $sql.= "then 'semester' ";
        $sql.= "when '7' then 'daily' ";
        $sql.= "when '8' then 'weekly' end period, ";
        $sql.= "group_concat(e.name) branch ";
        $sql.= "from maintenances a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join branches_client_sites d on d.client_site_id=b.id ";
        $sql.= "left outer join branches e on e.id=d.branch_id ";
        $sql.= "left outer join users f on f.id=c.sale_id ";
        $sql.= "left outer join backbones g on g.id=a.backbone_id "; 
        $sql.= "left outer join btstowers h on h.id=a.bts_id ";
        $sql.= "left outer join datacenters i on i.id=a.datacenter_id ";
       // $sql.= "where c.name like '%".$name."%' ";
        if($ci->session->userdata("role")==="Sales"){
            $sql.= "where f.id in " . $ids ;
        }
        $sql.= "group by a.id,c.name,a.mdatetime,maintenance_type,b.address,pic_phone,pic_email ";
        $sql.= "order by c.name asc ";
        $sql.= $limit;
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function getmaintenanceschedulebyid($id){
        $ci = & get_instance();
        $sql = "select a.id,a.client_site_id,case maintenance_type when 'pelanggan' then c.name when 'backbone' then g.name when 'datacenter' then i.name when 'bts' then h.name end name,date_format(a.mdatetime,'%d/%m/%Y %H:%i:%s')mdatetime,date_format(a.mdatetime,'%H')mhour,date_format(a.mdatetime,'%i')mminute, ";
        $sql.= "maintenance_type,a.description, ";
        $sql.= "b.address, ";
        $sql.= "b.pic_phone, ";
        $sql.= "b.pic_email, ";
        $sql.= "f.username am, ";
        $sql.= "a.ispayable, ";
        $sql.= "period_type,";
        $sql.= "case period_type when '1' then 'one time' when '2' then 'yearly' when '3' then 'monthly' when '4' then 'bimonthly' when '5' then 'quarter' when '6' then 'semester' when '7' then 'daily' when '8' then 'weekly' end period, ";
        $sql.= "group_concat(e.name) branch ";
        $sql.= "from maintenances a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join branches_client_sites d on d.client_site_id=b.id ";
        $sql.= "left outer join branches e on e.id=d.branch_id ";
        $sql.= "left outer join users f on f.id=c.sale_id ";
        $sql.= "left outer join backbones g on g.id=a.backbone_id ";
        $sql.= "left outer join btstowers h on h.id=a.bts_id ";
        $sql.= "left outer join datacenters i on i.id=a.datacenter_id ";
        $sql.= "where a.id = '".$id."' ";
        $que = $ci->db->query($sql);
        return $que->result()[0];
    }
    function getperiods(){
        return array("1"=>"Satu kali","2"=>"Tahunan","3"=>"Bulanan","4"=>"Dua Bulanan","5"=>"Empat Bulanan","6"=>"Semester","7"=>"Harian","8"=>"Mingguan",);
    }
    function removemaintenanceschedule($id){
        $ci = & get_instance();
        $sql = "delete from maintenances ";
        $sql.= "where id=$id";
        echo $sql . PHP_EOL;
        $que = $ci->db->query($sql);
        $sql = "delete from maintenancereports where maintenance_id='".$id."'";
        $que = $ci->db->query($sql);
        echo $sql;
    }
    function save($params){
        $keys = array();
        $vals = array();
        foreach($params as $key=>$val){
            array_push($keys,$key);
            array_push($vals,$val);
        }
        $ci = & get_instance();
        $sql = "insert into maintenances ";
        $sql.= "(".implode(",",$keys).") ";
        $sql.= "values ";
        $sql.= "('".implode("','",$vals)."') ";
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function update($params){
        $arr = array();
        foreach($params as $key=>$val){
            array_push($arr,''.$key.'="'.$val.'"');
        }
        $ci = & get_instance();
        $sql = "update maintenances ";
        $sql.= "set ".implode(",",$arr)." ";
        $sql.= "where id=".$params["id"];
        $que = $ci->db->query($sql);
        return $sql;
    }
    function maintenance_minute(){
        $out = array();
        for($c=0;$c<60;$c++){
            $out[$c] = $c;
        }
        return $out;
    }
    function maintenance_hour(){
        $out = array();
        for($c=0;$c<24;$c++){
            $out[$c] = $c;
        }
        return $out;        
    }
}