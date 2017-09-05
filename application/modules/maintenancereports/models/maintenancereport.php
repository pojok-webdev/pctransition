<?php
class Maintenancereport extends CI_Model{
    var $ci;
    function __construct(){
        parent::__construct();
        $this->ci = & get_instance();
    }
    function clientproblemremove($id){
        $sql = "delete from maintenancereportclientproblems ";
        $sql.= "where id='".$id."' ";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $sql;
    }
    function get_maintenance_report(){
        $sql = "select a.id,date_format(a.maintenancedate,'%d/%m/%Y')maintenancedate,maintenancedate sqldate,";
        $sql.= "a.maintenance_id,a.problems,a.distribution,a.resume,a.reporter,b.description,  ";
        $sql.= "a.status,a.createdate,";
        $sql.= "case when d.alias!='' then concat(d.name,' (',d.alias,')') else d.name end name,";
        $sql.= "a.clientrequest,e.image topologi, a.eosactivity, ";
        $sql.= "group_concat(h.name) services,  ";
        $sql.= "group_concat(g.name) competitors ";
        $sql.= "from maintenancereports a ";
        $sql.= "left outer join maintenances b on b.id=a.maintenance_id ";
        $sql.= "left outer join client_sites c on c.id=b.client_site_id ";
        $sql.= "left outer join clients d on d.id=c.client_id ";
        $sql.= "left outer join ";
        $sql.= " (";
        $sql.= "  select maintenancereport_id,max(image)image ";
        $sql.= "  from maintenancereport_images where imagetype='1' group by maintenancereport_id";
        $sql.= " ) e ";
        $sql.= " on e.maintenancereport_id=a.maintenance_id ";
        $sql.= "left outer join maintenancereport_kompetitors  f on f.maintenancereport_id=a.id ";
        $sql.= "left outer join operators g on g.id=f.operator_id ";
        $sql.= "left outer join clientservices h on h.client_site_id =c.id ";
        $sql.= "group by a.id,a.maintenancedate,";
        $sql.= "a.maintenance_id,a.problems,a.distribution,a.resume,a.reporter,  ";
        $sql.= "a.status,a.createdate,d.name,a.clientrequest,e.image ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function getbyreportmid($id){
        $sql = "select a.id,date_format(a.maintenancedate,'%d/%m/%Y')maintenancedate,";
        $sql.= "a.maintenance_id,a.problems,a.distribution,a.resume,c.address,  ";
        $sql.= "case a.status when '0' then 'Belum selesai' when '1' then 'Selesai' end status ,a.createdate,d.name,";
        $sql.= "a.clientrequest, ";
        $sql.= "case a.clientrequeststatus  ";
        $sql.= " when '0' then 'Belum selesai' ";
        $sql.= " when '1' then 'Selesai' ";
        $sql.= " when '2' then 'Monitoring' ";
        $sql.= " end clientrequeststatus,";
        $sql.= "a.monitoringsubject,a.monitoringresult,";
        $sql.= "a.reporter,a.eosactivity,b.description problem,c.pic_phone_area,c.pic_phone,c.pic_name, ";
        $sql.= "group_concat(e.name) services, group_concat(f.name) eos ";
        $sql.= "from maintenancereports a left outer join maintenances b on b.id=a.maintenance_id ";
        $sql.= "left outer join client_sites c on c.id=b.client_site_id ";
        $sql.= "left outer join clients d on d.id=c.client_id ";
        $sql.= "left outer join clientservices e on e.client_site_id =c.id ";
        $sql.= "left outer join maintenancereportoperators f on b.id=f.maintenancereport_id ";
        $sql.= "where a.id = '".$id."' ";
        $sql.= "group by a.id,a.maintenancedate,a.maintenance_id,a.problems,a.distribution,a.resume,c.address,a.status,";
        $sql.= "a.createdate,d.name,a.clientrequest,a.clientrequeststatus,a.monitoringsubject,a.monitoringresult,";
        $sql.= "a.reporter,a.eosactivity,b.description,c.pic_phone_area,c.pic_phone,c.pic_name ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result()[0];
    }
    function geteos($maintenancereport_id){
        $sql = "select group_concat(name) name from maintenancereportoperators ";
        $sql.= "where maintenancereport_id =".$maintenancereport_id."";



        $sql = "select a.id,a.name from maintenancereportoperators a ";
        $sql.= "left outer join maintenancereports c on c.maintenance_id=a.maintenancereport_id ";
        $sql.= "where c.id='".$maintenancereport_id."'";
        
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $arr = array();
        foreach($que->result() as $res){
            array_push($arr,$res->name);
        }
        return $arr;
//        return $que->result()[0]->name;
    }
    function geteosarray(){
        $sql = "select a.id,username from users a ";
        $sql.= "left outer join users_groups b on b.user_id=a.id ";
        $sql.= "left outer join groups c on c.id=b.group_id ";
        $sql.= "where c.name ='EOS'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $arr = array();
        foreach($que->result() as $res){
            $arr[$res->id] = $res->username;
        }
        return $arr;
    }
    function getoperators($id){
        $sql = "select id,name from maintenancereportoperators ";
        $sql.= "where maintenancereport_id =".$id."";

        $sql = "select a.id,a.name from maintenancereportoperators a ";
        $sql.= "left outer join maintenancereports c on c.maintenance_id=a.maintenancereport_id ";
        $sql.= "where c.id='".$id."'";

        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function gettopologies($maintenancereport_id){
        $sql = "select name,image,description from maintenancereport_images a ";
        $sql.= "left outer join maintenancereports b on b.maintenance_id=a.maintenancereport_id ";
        $sql.= "where imagetype='1' and b.id='".$maintenancereport_id."'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function getdocuments($maintenancereport_id){
        $sql = "select name,image,description from maintenancereport_images a ";
        $sql.= "left outer join maintenancereports b on b.maintenance_id=a.maintenancereport_id ";
        $sql.= "where imagetype!='1' and b.id='".$maintenancereport_id."'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function getcompetitors($maintenancereport_id){
        $sql = "select a.id,b.name,a.service,description from maintenancereport_kompetitors a ";
        $sql.= "left outer join maintenancereports c on c.id=a.maintenancereport_id ";
        $sql.= "left outer join operators b on b.id=a.operator_id ";
        $sql.= "where a.maintenancereport_id='".$maintenancereport_id."'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function getdistribution($maintenancereport_id){
        $sql = "select distribution from maintenancereports a ";
        $sql.= "where id='".$maintenancereport_id."'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result()[0]->distribution;
    }
    function getmaintenancescheduledescription($maintenancereport_id){
        $sql = "select b.description from maintenancereports a ";
        $sql.= "left outer join maintenances b on b.id=a.maintenance_id ";
        $sql.= "where a.id='".$maintenancereport_id."'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result()[0]->description;
    }
    function getclientdevices($maintenancereport_id){
        $sql = "select a.id,b.name,c.name devicetype,macaddress,serialno from maintenancereportclientdevices a ";
        $sql.= "left outer join devices b on b.id=a.device_id ";
        $sql.= "left outer join devicetypes c on c.id=b.devicetype_id ";
        $sql.= "where maintenancereport_id='".$maintenancereport_id."'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function getclientproblems($maintenancereport_id){
        $sql = "select a.id,a.problem from maintenancereportclientproblems a ";
        $sql.= "left outer join maintenancereports b on b.maintenance_id=a.maintenancereport_id ";
        $sql.= "where b.id='".$maintenancereport_id."'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function getvases($maintenancereport_id){
        $sql = "select b.name vas from maintenancereport_vases a ";
        $sql.= "left outer join vases b on b.id=a.vas_id ";
        $sql.= "where maintenancereport_id='".$maintenancereport_id."'";

        $sql = "select a.id,b.name vas from maintenancereport_vases a ";
        $sql.= "left outer join vases b on b.id=a.vas_id ";
        $sql.= "left outer join maintenancereports c on c.maintenance_id=a.maintenancereport_id ";
        $sql.= "where c.id='".$maintenancereport_id."'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function insertclientdevice($params){
        $sql = "insert into maintenancereportclientdevices ";
        $sql.= "(maintenancereport_id,device_id,macaddress,serialno,createuser) ";
        $sql.= "values ";
        $sql.= "(";
        $sql.= $params["maintenancereport_id"].",";
        $sql.= $params["device_id"].",'";
        $sql.= $params["macaddress"]."','";
        $sql.= $params["serialno"]."','";
        $sql.= $this->session->userdata("username")."'";
        $sql.= ") ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function removeclientdevice($id){
        $sql = "delete from maintenancereportclientdevices ";
        $sql.= "where id='".$id."' ";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $sql;
    }
    function getpadinetdevices($maintenancereport_id){
        $sql = "select a.id,b.name,c.name devicetype,macaddress,serialno from maintenancereportpadinetdevices a ";
        $sql.= "left outer join devices b on b.id=a.device_id ";
        $sql.= "left outer join devicetypes c on c.id=b.devicetype_id ";
        $sql.= "where maintenancereport_id='".$maintenancereport_id."'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function insertpadinetdevice($params){
        $sql = "insert into maintenancereportpadinetdevices ";
        $sql.= "(maintenancereport_id,device_id,macaddress,serialno,createuser) ";
        $sql.= "values ";
        $sql.= "(";
        $sql.= $params["maintenancereport_id"].",";
        $sql.= $params["device_id"].",'";
        $sql.= $params["macaddress"]."','";
        $sql.= $params["serialno"]."','";
        $sql.= $this->session->userdata("username")."'";
        $sql.= ") ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function remove($id){
        $sql ="delete from maintenancereports ";
        $sql.= "where id='".$id."' ";
        $this->ci->db->query($sql);
        return $sql;
    }
    function removepadinetdevice($id){
        $sql = "delete from maintenancereportpadinetdevices ";
        $sql.= "where id='".$id."' ";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $sql;
    }
    function removeeos($id){
        $sql = "delete from maintenancereportoperators ";
        $sql.= "where id=" . $id . " ";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $sql;
    }
    function removevas($id){
        $sql = "delete from maintenancereport_vases ";
        $sql.= "where id=" . $id . " ";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $sql;
    }
    function save($params){
        $sql = "insert into maintenancereports ";
        $sql.= "(problems,distribution,clientrequest,resume) ";
        $sql.= "values ";
        $sql.= "('$params[problems]','$params[distribution]','$params[clientrequest]','$params[resume]') ";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $sql;
    }
    function saveeos($params){
        $sql = "insert into maintenancereportoperators ";
        $sql.= "(maintenancereport_id,createuser,name) ";
        $sql.= "values ";
        $sql.= "('".$params['maintenancereport_id']."','".$this->session->userdata("username")."','".$params['name']."') ";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $sql;
    }
    function saveclientproblem($params){
        $sql = "insert into maintenancereportclientproblems ";
        $sql.= "(maintenancereport_id,createuser,problem) ";
        $sql.= "values ";
        $sql.= "('".$params['maintenancereport_id']."','".$this->session->userdata("username")."','".$params['problem']."') ";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function upsert($params){
        $ci = & get_instance();
        $sql = "select maintenance_id from maintenancereports ";
        $sql.= "where maintenance_id='".$params['maintenance_id']."'";
        $rpt = $ci->db->query($sql);
        if($rpt->num_rows>0 ){
            $sql = "update maintenancereports ";
            $sql.= "set problems='$params[problems]',";
            $sql.= "distribution='$params[distribution]',";
            $sql.= "clientrequest='$params[clientrequest]',";
            $sql.= "reporter='$params[reporter]',";
            $sql.= "resume='$params[resume]', ";
            $sql.= "eosactivity='$params[eosactivity]', ";
            $sql.= "maintenancedate='$params[maintenancedate]', ";
            $sql.= "clientrequeststatus='$params[clientrequeststatus]', ";
            $sql.= "monitoringsubject='$params[monitoringsubject]', ";
            $sql.= "monitoringresult='$params[monitoringresult]', ";
            $sql.= "status='$params[status]' ";
            $sql.= "where maintenance_id='".$params['maintenance_id']."' ";
            $ci->db->query($sql);
        }else{                
            $sql = "insert into maintenancereports ";
            $sql.= "(maintenance_id,problems,distribution,clientrequest,reporter,resume,maintenancedate,eosactivity,status,clientrequeststatus,monitoringsubject,monitoringresult) ";
            $sql.= "values ";
            $sql.= "('$params[maintenance_id]','$params[problems]',";
            $sql.= "'$params[distribution]','$params[clientrequest]',";
            $sql.= "'$params[reporter]','$params[resume]','$params[maintenancedate]','$params[eosactivity]','$params[status]','$params[clientrequeststatus]','$params[monitoringsubject]','$params[monitoringresult]') ";
            $ci->db->query($sql);
        }
        return $sql;
    }
}