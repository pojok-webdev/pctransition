<?php
class Pdatacenters extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function getdatacenters(){
        $this->load->model("pdatacenter");
        $objs = $this->pdatacenter->getdatacenter();
        $arr = array();
        foreach($objs as $obj){
            array_push($arr,'"'.$obj->id.'":"'.$obj->name.'"');
        }
        echo '{' . implode(',',$arr). '}';
    }
    function index(){
        $data = array("menuFeed"=>"v2.0");
        $this->load->view("v2/datacenters/index",$data);
    }
    function feed(){
        $term = $_GET[ "term" ];
        $this->load->model("pdatacenter");
        $objs = $this->pdatacenter->getdatacenter();
        $arr = array();
        foreach($objs as $obj){
            array_push($arr,array("label"=>$obj->name,"value"=>$obj->id));
        }
        $companies = $arr;
        $result = array();
        foreach ($companies as $company) {
            $companyLabel = $company[ "label" ];
            if ( strpos( strtoupper($companyLabel), strtoupper($term) )!== false ) {
                array_push( $result, $company );
            }
        }
        echo json_encode( $result );
    }
}