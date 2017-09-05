<?php
    class Ptickets extends CI_Controller{
        function __construct(){
            parent::__construct();
        }
        function index(){
            $this->common->check_login();
            $search = "";
            $rownum = 10;
            $page = 0;
            $ass_array = $this->uri->uri_to_assoc();
            if(count($ass_array)>0){
                if (array_key_exists("search",$ass_array)){
                    $search =  urldecode($ass_array["search"]);
                }
                if (array_key_exists("page",$ass_array)){
                    $page =  $ass_array["page"];
                }
                if (array_key_exists("rownum",$ass_array)){
                    $rownum =  $ass_array["rownum"];
                }
            }
            $this->load->model("pticket");
            $tickets = $this->pticket->getticket($search,$page,$rownum);
            $pageamount = round($tickets["amount"]/$rownum);
            $data = array(
                "menuFeed"=>"Tickets",
                "tablelabel"=>"Tickets",
                "objs"=>$tickets["result"],
                "rownum"=>$rownum,
                "amount"=>$tickets["amount"],
                "pageamount"=>$pageamount,
                "currentpage"=>$page,
                "currenturl"=>$this->uri->uri_string()
            );
            $this->load->view("v2/tickets/index",$data);
        }
        function troubleshoot(){
            $id = $this->uri->segment(3);
            $this->load->model("pticket");
            $data = array(
                "ticketid"=>$id,
                "obj"=>$this->pticket->getbyid($id),
                "hours"=>get_hours_array(),"minutes"=>get_minutes_array(),
                "menuFeed"=>"tickets"
            );
            $this->load->view("v2/tickets/troubleshootadd",$data);
        }
        function switchparam(){
            $params = $this->input->post();
            $url = $params["url"];
            $chunk = $params["chunck"];
            
        }
        function followup(){
            $id = $this->uri->segment(3);
        } 
    }
?>