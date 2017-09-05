<?php
class Ptroubleshoots extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $this->load->model("ptroubleshoot");
        $objs = $this->ptroubleshoot->gettroubleshoot();
        $data = array(
            "menuFeed"=>"troubleshoots",
            "tablelabel"=>"Troubleshoot",
            "objs"=>$objs
        );
        $this->load->view("v2/troubleshoots/index",$data);
    }
}