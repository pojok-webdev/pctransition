<?php
class Pclients extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function getclients(){
        $this->load->model("pclient");
        $objs = $this->pclient->getclient();
        $arr = array();
        foreach($objs as $obj){
            array_push($arr,'"'.$obj->id.'":"'.$obj->name.'"');
        }
        echo '{' . implode(',',$arr). '}';
    }
    function index(){
        $data = array("menuFeed"=>"v2.0");
        $this->load->view("v2/clients/index",$data);
    }
    function feed(){
        $term = $_GET[ "term" ];
        $this->load->model("pclient");
        $objs = $this->pclient->getclient();
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
    function feedbyclient(){
        $term = $_GET[ "term" ];
        $this->load->model("pclient");
        $objs = $this->pclient->getclientbysales();
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

}//