<?php
class Ptrial extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function extendreason(){
        return array(
            "Pilihlah"=>"Pilihlah",
            "Belum sesuai layanan secara teknis"=>"Belum sesuai layanan secara teknis",
            "Waktu tidak mencukupi untuk analisa"=>"Waktu tidak mencukupi untuk analisa",
            "Menyesuaikan start billing"=>"Menyesuaikan start billing",
            "Belum sempat mencoba"=>"Belum sempat mencoba",
            "Layanan belum sesuai dengan kebutuhan"=>"Layanan belum sesuai dengan kebutuhan",
            "Lainnya"=>"Lainnya"
        );
    }
    function approve($id){
        $sql = "update trials ";
        $sql.= "set approved='1' ";
        $sql.= "where id=".$id;
        $ci = & get_instance();
        $ci->db->query($sql);
        return $sql;
    }
    function ncancelreason(){
        return array(
            "Pilihlah"=>"Pilihlah",
            "Kendala teknis"=>"Kendala teknis",
            "Pelanggan tidak komit"=>"Pelanggan tidak komit",
            "Belum bisa memutus kontrak dengan provider lama"=>"Belum bisa memutus kontrak dengan provider lama",
            "Lainnya"=>"Lainnya",
        );
    }
    function xcancelreason(){
        return array(
            "Pilihlah"=>"Pilihlah",
            "Tidak menyelesaikan problem pelanggan"=>"Tidak menyelesaikan problem pelanggan",
            "Tidak deal harga"=>"Tidak deal harga",
            "Pelanggan tidak komit"=>"Pelanggan tidak komit",
            "Lainnya"=>"Lainnya",
        );
    }
    function smartvalues(){
        return array(
            "Up to 512 Kbps"=>"Up to 512 Kbps",
            "Up to 768 Kbps"=>"Up to 768 Kbps",
            "Up to 1 Mbps"=>"Up to 1 Mbps",
            "Up to 2 Mbps"=>"Up to 2 Mbps",
            "Up to 3 Mbps"=>"Up to 3 Mbps",
            "Up to 4 Mbps"=>"Up to 4 Mbps",
        );
    }
    function businesses(){
        return array(
            "Up to 2 Mbps"=>"Up to 2 Mbps",
            "Up to 4 Mbps"=>"Up to 4 Mbps",
            "Up to 6 Mbps"=>"Up to 6 Mbps",
            "Up to 8 Mbps"=>"Up to 8 Mbps"
        );
    }
    function getstatus($id){
        $ci = & get_instance();
        $sql = "select trialtype from trials where id=".$id;
        $query = $ci->db->query($sql);
        $res = $query->result();
        switch($res[0]){
            case "1":
            return "join";
            break;
            case "2":
            return "extend";
            break;
            case "3":
            return "cancel";
            break;
        }
    }
    function getaction($id){
        $ci = & get_instance();
        $sql = "select trialtype from trials where id=".$id;
        $query = $ci->db->query($sql);
        $res = $query->result();
        if($res){
            if($res[0]->trialtype=="1"){
                return array(
                    "0"=>"Pilihlah",
                    "3"=>"Cancel",
                    "2"=>"Extend",
                    "1"=>"Join"
                );
            }elseif($res[0]->trialtype=="0"){
                return array(
                    "0"=>"Pilihlah",
                    "3"=>"Cancel",
                    "2"=>"Extend",
                    "1"=>"Permanent"
                );
            }
        }
    }
    function gettrials(){
        $ci = & get_instance();
   		$this->load->helper("user");
        $id = $ci->session->userdata("user_id");
        $arr = getuserssupervised($id);
        array_push($arr,$id);
		$ids = "(".implode($arr,",").")";
        $sql = "select a.id,c.name,d.username am,a.startdate,a.enddate,";
        $sql.= "a.startexecdate,a.endexecdate,a.product,";
        $sql.= "trialtype,rangeapprove,extendapprove,a.createdate,";
        $sql.= "case needapproval when '0' then 'tidak perlu approval' ";
        $sql.= "when '1' then ";
        $sql.= "case a.approved when '0' then 'belum diapprove' when '1' then 'approved' end ";
        $sql.= "end ";
        $sql.= "approved, ";
        $sql.= "case a.status when '0' then '' when '1' then 'on trial' when '2' then 'bergabung' ";
        $sql.= "when 3 then 'extend' when '4' then 'cancel' end status,";
        $sql.= "case a.status when '1' then 'on trial' when '2' then 'bergabung' ";
        $sql.= "when 3 then a.extendreason when '4' then a.cancelreason end stdesc,";
        $sql.= "case trialtype when '0' then 'Upgrade' when '1' then 'Baru' end typename from trials a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join users d on d.id=c.sale_id ";
        $sql.= "where d.id in " . $ids ;
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function gettstrials(){
        $ci = & get_instance();
   		$this->load->helper("user");
        $id = $ci->session->userdata("user_id");
        $arr = getuserssupervised($id);
        array_push($arr,$id);
		$ids = "(".implode($arr,",").")";
        $sql = "select a.id,c.name,d.username am,a.startdate,a.enddate,a.startexecdate,a.endexecdate,a.product,trialtype,rangeapprove,extendapprove,a.createdate,";
        $sql.= "case needapproval when '0' then 'tidak perlu approval' ";
        $sql.= "when '1' then ";
        $sql.= "case a.approved when '0' then 'belum diapprove' when '1' then 'approved' end ";
        $sql.= "end ";
        $sql.= "approved, ";
        $sql.= "case a.status when '0' then '' when '1' then 'on trial' when '2' then 'bergabung' ";
        $sql.= "when 3 then 'extend' when '4' then 'cancel' end status,";
        $sql.= "case a.status when '0' then 'on trial' when '1' then 'bergabung' ";
        $sql.= "when 2 then a.extendreason when '3' then a.cancelreason end stdesc,";
        $sql.= "case trialtype when '0' then 'Upgrade' when '1' then 'Baru' end typename from trials a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join users d on d.id=c.sale_id ";
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function getbyid($id){
        $ci = & get_instance();
        $sql = "select a.id,b.id clientsiteid,c.name,d.username am,trialtype,date_format(a.startdate,'%d/%m/%Y') startdate,";
        $sql.= "date_format(a.enddate,'%d/%m/%Y')enddate,a.product,rangeapprove,extendapprove,a.status rawstatus,";
        $sql.= "case a.status when '0' then 'waiting' when '1' then 'bergabung' when 2 then 'extend' when '0' then 'cancel' end status, ";
        $sql.= "case a.status when '0' then 'waiting' when '1' then 'bergabung' when 2 then a.extendreason when '3' then a.cancelreason end reason,";
        $sql.= "";
        $sql.= "integer_part,fraction_part,integer_part_down,fraction_part_down,";
        $sql.= "date_format(startdate,'%H')starthour,date_format(startdate,'%i')startminute,";
        $sql.= "date_format(enddate,'%H')endhour,date_format(enddate,'%i')endminute,";
        $sql.= "case trialtype when '0' then 'Upgrade' when '1' then 'Baru' end typename from trials a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join users d on d.id=c.sale_id ";
        $sql.= "where a.id=".$id;
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function has_authority($id){
        $ci = & get_instance();
        $sql = "select a.id from users a left outer join authorities_users b on b.user_id=a.id ";
        $sql.= "where b.authority_id=1 ";
        $sql.= "and a.id='".$id."'";
        $que = $ci->db->query($sql);
        if($que->num_rows()>0){
            return true;
        }
        return false;
    }
    function compareotp($id,$otp){
        $ci = & get_instance();
        $sql = "select otp from trials ";
        $sql.= "where id=".$id;
        $que = $ci->db->query($sql);
        $res = $que->result();
        if($res[0]->otp===$otp){
            return true;
        }
        return false;
    }
    function needapproval(){
        $ci = & get_instance();
        $sql = "select a.id from trials a where rangeapprove = '2' ";
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function save($params){
        $ci = & get_instance();
        $arrkey = array();
        $arrval = array();
        foreach($params as $key=>$val){
            array_push($arrkey,$key);
            array_push($arrval,$val);
        }
        $keys = implode(",",$arrkey);
        $vals = "'".implode("','",$arrval)."'";
        $sql = "insert into trials ";
        $sql.= "($keys) values ($vals) ";
        $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function start($id){
        $sql = "update trials ";
        $sql.= "set status='1', ";
        $sql.= "startexecdate = now()";
        $sql.= "where id=".$id;
        $ci = & get_instance();
        $ci->db->query($sql);
        return date("Y-m-d H:i:s");
    }
    function stop($id){
        $sql = "update trials ";
        $sql.= "set status='2', ";
        $sql.= "endexecdate = now() ";
        $sql.= "where id=".$id;
        $ci = & get_instance();
        $ci->db->query($sql);
        return date("Y-m-d H:i:s");
    }
    function update($params){
        $ci = & get_instance();
        $arr = array();
        foreach($params as $key=>$val){
            array_push($arr, $key . "='".$val."' ");
        }
        $sql = "update trials set ";
        $sql.= implode(",",$arr);
        $sql.= "where id=".$params['id'];
        $ci->db->query($sql);
        return $sql;
    }
}