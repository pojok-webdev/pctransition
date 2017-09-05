<?php
class Pbiodata extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $this->common->check_login();
        $data = array(
            "menuFeed"=>"biodata",
            "tablelabel"=>"Biodata",
            "dt1"=>"2017-12-12",
            "dt2"=>"2017-12-12",
            "userbranches"=>array(),
            "users"=>array(),
            "suspects"=>array(),
        );
        $this->load->view("v2/biodata/biodata",$data);
    }
    function mailstyle(){
        $this->common->check_login();
        $data = array(
            "menuFeed"=>"biodata",
            "tablelabel"=>"Biodata",
            "dt1"=>"2017-12-12",
            "dt2"=>"2017-12-12",
            "userbranches"=>array(),
            "users"=>array(),
            "suspects"=>array(),
        );
        $this->load->view("v2/biodata/mailstyle",$data);
    }
}