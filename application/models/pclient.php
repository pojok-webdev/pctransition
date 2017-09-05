<?php
class Pclient extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getclient($name="",$segment=0,$offset=0){
        if(($segment===0)&&($offset===0)){
            $limit = " ";
        }else{
            $limit = "limit ".$segment.", ".$offset." ";
        }
        $ci = & get_instance();
        $sql = "select a.id,concat(b.name,'(',a.address,')') name from client_sites a ";
        $sql.= "left outer join clients b on b.id=a.client_id ";
        $sql.= "where name like '%".$name."%' ";
        $sql.= $limit;
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function getclientbysales($name="",$segment=0,$offset=0){
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
        $sql = "select a.id,concat(b.name,'(',a.address,')') name from client_sites a ";
        $sql.= "left outer join clients b on b.id=a.client_id ";
        $sql.= "where name like '%".$name."%' ";
        $sql.= "and b.sale_id in " . $ids;
        $sql.= $limit;
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function getclientbyid($id){
        $sql = "select a.name,b.npwp,b.siup,a.address,a.city,a.branch_id, ";
        $sql.= "a.category_id from clients a ";
        $sql = "select a.* from clients a ";
        $sql.= "left outer join fbs b on b.client_id=a.id ";
        $sql.= "where id='".$id."'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result()[0];
        $arr = array();
        foreach($ci->db->list_fields("clients") as $field){
            array_push($arr,'"'.$field.'":"'.$res->$field.'"');
        }
        return $arr;
    }
    function getservicesbyid($id){
        $sql = "select a.name from clientservices a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "where c.id=" . $id ;
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        $arr = array();
        foreach($res as $obj){
            array_push($arr,'"name":"'.$obj->name.'"');
        }
        return $arr;
    }
    function getcclientbyid($id){
        $sql = "select concat(a.name,'-',b.nofb)name,";
        $sql.= "case when b.npwp is null then '-' else b.npwp end npwp,";
        $sql.= "case when b.siup is null then '-' else b.siup end siup,";
        $sql.= "a.address,a.city,a.branch_id, ";
        $sql.= "a.category_id,a.phone,a.phone_area,a.fax_area,a.fax from clients a ";
        $sql.= "left outer join fbs b on b.client_id=a.id ";
        $sql.= "where b.nofb='".$id."'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result()[0];
        $arr = array();
        array_push($arr,'"name":"'.$res->name.'"');
        array_push($arr,'"npwp":"'.$res->npwp.'"');
        array_push($arr,'"siup":"'.$res->siup.'"');
        array_push($arr,'"address":"'.$res->address.'"');
        array_push($arr,'"branch_id":"'.$res->branch_id.'"');
        array_push($arr,'"phone":"'.$res->phone_area.'-'.$res->phone.'"');
        array_push($arr,'"fax":"'.$res->fax_area.'-'.$res->fax.'"');
        array_push($arr,'"city":"'.$res->city.'"');
        array_push($arr,'"city":"'.$res->city.'"');
        array_push($arr,'"city":"'.$res->city.'"');
        return $arr;
    }
    function getpics($client_id){
        $sql = "select a.name,a.role,a.position,a.idnum,a.phone,a.hp, ";
        $sql.= "a.email from fbpics a ";
        $sql.= "where id='".$id."' ";
        //$sql.= "and role='".$role."'";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result()[0];
        $arr = array(
            'adm'=>array(),
            'billing'=>array(),
            'resp'=>array(),
            'subscriber'=>array(),
            'support'=>array(),
            'teknis'=>array()
        );
        return $arr;
    }
    function populate(){
        $sql = "select b.nofb,a.id,concat(a.name,'-',b.nofb) name,a.address from clients a ";
        $sql.= "left outer join fbs b on b.client_id=a.id ";
        $sql.= "where active='1' ";
        $sql.= "order by name asc ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return $res;
	}
}