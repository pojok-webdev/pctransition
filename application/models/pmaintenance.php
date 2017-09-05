<?php
class Pmaintenance extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getmaintenance($name="",$segment=0,$offset=0){
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
        $sql.= "case maintenance_type ";
        $sql.= "when 'pelanggan' then c.name ";
        $sql.= "when 'backbone' then g.name ";
        $sql.= "when 'bts' then h.name ";
        $sql.= "when 'datacenter' then i.name end name ,";
        $sql.= "a.mdatetime, ";
        $sql.= "maintenance_type, ";
        $sql.= "b.address, ";
        $sql.= "b.pic_phone, ";
        $sql.= "b.pic_email, ";
        $sql.= "f.username am, ";
        $sql.= "case period_type ";
        $sql.= "when '1' then 'one time' ";
        $sql.= "when '2' then 'daily' ";
        $sql.= "when '3' then 'weekly' ";
        $sql.= "when '4' then 'monthly' ";
        $sql.= "when '5' then 'bimonthly' ";
        $sql.= "when '6' then 'quarter' ";
        $sql.= "when '7' then 'semester' ";
        $sql.= "when '8' then 'yearly' end period, ";
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
        if($ci->session->userdata("role")==="Sales"){
        $sql.= "where f.id in " . $ids ;
        }
        $sql.= "group by a.id,c.name,a.mdatetime,maintenance_type,b.address,pic_phone,pic_email ";
        $sql.= "order by c.name asc ";
        $sql.= $limit;
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function getmaintenancebyid($id){
        $ci = & get_instance();
        $sql = "select a.id,a.distribution,";
        $sql.= "case maintenance_type ";
        $sql.= "when 'pelanggan' then c.name ";
        $sql.= "when 'backbone' then g.name ";
        $sql.= "when 'datacenter' then i.name ";
        $sql.= "when 'bts' then h.name end name,";
        $sql.= "date_format(a.mdatetime,'%d/%m/%Y %H:%i:%s')mdatetime,";
        $sql.= "date_format(a.mdatetime,'%H')mhour,";
        $sql.= "date_format(a.mdatetime,'%i')mminute,  ";
        $sql.= "maintenance_type,a.description, ";
        $sql.= "b.address,  b.pic_phone,  b.pic_email,  f.username am,";
        $sql.= "a.ispayable,  period_type, ";
        $sql.= "case period_type ";
        $sql.= "when '1' then 'one time' ";
        $sql.= "when '2' then 'yearly' ";
        $sql.= "when '3' then 'monthly' ";
        $sql.= "when '4' then 'bimonthly'  ";
        $sql.= "when '5' then 'quarter'  ";
        $sql.= "when '6' then 'semester'  ";
        $sql.= "when '7' then 'daily'  ";
        $sql.= "when '8' then 'weekly' end period,  ";
        $sql.= "group_concat(e.name) branch  ";
        $sql.= "from maintenances a  ";
        $sql.= "left outer join maintenancereports j on a.id=j.maintenance_id  ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id  ";
        $sql.= "left outer join clients c on c.id=b.client_id  ";
        $sql.= "left outer join branches_client_sites d on d.client_site_id=b.id  ";
        $sql.= "left outer join branches e on e.id=d.branch_id  ";
        $sql.= "left outer join users f on f.id=c.sale_id  ";
        $sql.= "left outer join backbones g on g.id=a.backbone_id  ";
        $sql.= "left outer join btstowers h on h.id=a.bts_id  ";
        $sql.= "left outer join datacenters i on i.id=a.datacenter_id where a.id = " . $id ;
        $que = $ci->db->query($sql);
        return $que->result()[0];
    }
    function addoperator($params){
        $ci = & get_instance();
        $sql = "insert into maintenanceoperators ";
        $sql.= "(maintenance_request_id,name,username) ";
        $sql.= "values ";
        $sql.= "(".$params['maintenance_request_id'].",'".$params['name']."','".$ci->session->userdata["username"]."')";
        $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function addkompetitors($params){
        $ci = & get_instance();
        $sql = "insert into maintenancereport_kompetitors ";
        $sql.= "(maintenancereport_id,operator_id,createuser) ";
        $sql.= "values ";
        $sql.= "(".$params['maintenance_id'].",'".$params['operator_id']."','".$ci->session->userdata["username"]."')";
        $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function getofficers($maintenance_id){
        $ci = & get_instance();
        $sql = "select id,name,date_format(createdate,'%d/%m/%Y %T')createdate from maintenanceoperators ";
        $sql.= "where maintenance_request_id=".$maintenance_id;
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function periods(){
        return array(
            "1"=>"Satu kali",
            "2"=>"Harian",
            "3"=>"Mingguan",
            "4"=>"Bulanan",
            "5"=>"Dua Bulanan",
            "6"=>"Empat Bulanan",
            "7"=>"Semester",
            "8"=>"Tahunan",
        );
    }
    function removeofficer($params){
        $ci = & get_instance();
        $sql = "delete from maintenanceoperators where id=".$params["id"];
        $ci->db->query($sql);
    }
    function removekompetitors($params){
        $ci = & get_instance();
        $sql = "delete from maintenancereport_kompetitors where id=".$params["id"];
        $ci->db->query($sql);
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
        $sql.= "(".implode(",",$vals).") ";
        $que = $ci->db->query($sql);
        return $ci->db->insert_id;
    }
    function savedocument($params){
        $ci = & get_instance();
        $sql = "insert into maintenancereport_images ";
        $sql.= "(maintenancereport_id, image,name,description, createuser) ";
        $sql.= "values ";
        $sql.= "(";
        $sql.= "".$params["maintenancereport_id"].",";
        $sql.= "'".$params["image"]."',";
        $sql.= "'".$params["name"]."',";
        $sql.= "'".$params["description"]."',";
        $sql.= "'".$this->session->userdata("username")."'";
        $sql.= ")";
        $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function update($params){
        $ci = & get_instance();
        $arr = array();
        foreach($params as $key=>$val){
            array_push($arr,''.$key.'="'.$val.'"');
        }
        $sql = "update maintenances set " . implode(",",$arr) . " ";
        $sql.= "where id=".$params["id"];
        $ci ->db->query($sql);
        echo $sql;
    }
    function competitors($maintenance_id){
        $sql = "select a.id,b.name,service,description,date_format(create_date,'%d/%m/%Y %T')create_date ";
        $sql.= "from maintenancereport_kompetitors a ";
        $sql.= "left outer join operators b on b.id=a.operator_id ";
        $sql.= "where maintenancereport_id=".$maintenance_id;
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function getimages($maintenancereport_id){
        $sql = "select maintenancereport_id,id,image,name,description ";
        $sql.= "from maintenancereport_images ";
        $sql.= "where maintenancereport_id=".$maintenancereport_id;
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
}