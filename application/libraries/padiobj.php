<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class padiobj{
    public $fields;
    public $obj;
    public $ci;
    public function __construct($obj=NULL,$fields=array()){
        $this->obj = $obj;
        $this->fields = $fields;
        $this->ci = & get_instance();
    }
    function getfields(){
        $out = array();
        foreach($this->fields as $key=>$val){
            array_push($out,$key);
        }
        return $out;
    }
    function getjson(){
        $out = array();
        foreach($this->fields as $key=>$val){
            if($val["bVisible"]){
                array_push($out,'"'.$key.'":{"bVisible":true}');
            }else{
                array_push($out,'"'.$key.'":{"bVisible":false}');
            }
        }
        return "{".implode(",",$out)."}";
    }
    function getvisiblefields(){
        $out = array();
        foreach($this->fields as $key=>$field){
            if($field["bVisible"]){
                array_push($out,$key);
            }
        }
        return $out;
    }
    function getobj(){
        return array(
            "message"=>"Alhamdulillah"
        );
    }
    function getobjs(){
        $strfields = implode(",",$this->getfields());
        $sql = "select ".$strfields." from ".$this->obj;
        $que = $this->ci->db->query($sql);
        return array(
            "fields"=>$this->getfields(),"result"=>$que->result()
        );
    }
    function getwidths(){
        $out = array();
        foreach($this->fields as $field){
            array_push($out,$field["sWidth"]);
        }
        return $out;
    }
    function remove($id){
        $sql = "delete from " . $this->obj . " ";
        $sql.= "where id=".$id;
        $this->ci->db->query($sql);
        return $sql;
    }
    function showedit(){
        $this->load->view("".$this->obj."/edit");
    }
    function tablename(){
        return $this->obj;
    }
}