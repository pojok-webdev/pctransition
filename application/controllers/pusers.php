<?php
class Pusers extends CI_Controller{
    public $obj;
    function __construct(){
        parent::__construct();
        $this->load->library("Padiobj");
        $this->obj = new Padiobj("users",array(
            "id"=>array(
                "bVisible"=>false,"sWidth"=>"50%"
            ),
            "username"=>array(
                "bVisible"=>true,"sWidth"=>"25%"
            ),
            "email"=>array(
                "bVisible"=>true,"sWidth"=>"10%"
            ),
            "first_name"=>array(
                "bVisible"=>true,"sWidth"=>"10%"
            )
        ));
    }
    function index(){
        $data = array(
            "tablename" => $this->obj->tablename(),
            "menuFeed"=>"users",
            "objs"=>$this->obj->getobjs(),
            "sWidths"=>$this->obj->getwidths(),
        );
        $this->load->view("/users/tables",$data);
    }
    function getjsonfields(){
        echo $this->obj->getjson();
    }
    function getmembers(){
        $this->load->model("puser");
        $id = $this->uri->segment(3);
        $arr = array();
        foreach($this->puser->getmember($id) as $user){
            array_push($arr,'{"name":"'.$user->username.'","email":"'.$user->email.'"}');
        }
        echo '['.implode(",",$arr).']';
//        echo '[{"name":"indrea","email":"indrea@padi.net.id"},{"name":"nyoman","email":"nyoman@padi.net.id"}]';
    }
    function remove(){
        $id = $this->uri->segment(3);
        $this->obj->remove($id);
    }
}