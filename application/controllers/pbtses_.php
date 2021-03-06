<?php
class Pbtses extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function getbtses(){
        $this->load->model("pbts");
        $objs = $this->pbts->getbts();
        $arr = array();
        foreach($objs as $obj){
            array_push($arr,'"'.$obj->id.'":"'.$obj->name.'"');
        }
        echo '{' . implode(',',$arr). '}';
    }
    function index(){
        $data = array("menuFeed"=>"v2.0");
        $this->load->view("v2/btses/index",$data);
    }
    function feed(){
        $term = $_GET[ "term" ];
        $this->load->model("pbts");
        $objs = $this->pbts->getbts();
        $arr = array();
        foreach($objs as $obj){
            array_push($arr,array("label"=>$obj->name,"value"=>$obj->id));
        }
        $companies = $arr;
        /*$companies = array(
            array( "label" => "JAVA", "value" => "1" ),
            array( "label" => "DATA IMAGE PROCESSING", "value" => "2" ),
            array( "label" => "JAVASCRIPT", "value" => "3" ),
            array( "label" => "DATA MANAGEMENT SYSTEM", "value" => "4" ),
            array( "label" => "COMPUTER PROGRAMMING", "value" => "5" ),
            array( "label" => "SOFTWARE DEVELOPMENT LIFE CYCLE", "value" => "6" ),
            array( "label" => "LEARN COMPUTER FUNDAMENTALS", "value" => "7" ),
            array( "label" => "IMAGE PROCESSING USING JAVA", "value" => "8" ),
            array( "label" => "CLOUD COMPUTING", "value" => "9" ),
            array( "label" => "DATA MINING", "value" => "10" ),
            array( "label" => "DATA WAREHOUSE", "value" => "11" ),
            array( "label" => "E-COMMERCE", "value" => "12" ),
            array( "label" => "DBMS", "value" => "13" ),
            array( "label" => "HTTP", "value" => "14" )
        );*/

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