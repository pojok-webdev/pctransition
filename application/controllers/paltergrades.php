<?php
class Paltergrades extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("paltergrade");
        $this->load->model("pproduct");
    }
    function add(){
        $this->common->check_login();
        $objs = $this->paltergrade->getaltergrades();
        $data = array(
            "menuFeed"=>"Perubahan Layanan",
            "tablelabel"=>"Perubahan Layanan",
            "objs"=>$objs,
            "products"=>$this->pproduct->getproducts(),
            "formlabel"=>"Perubahan Layanan",
            "hours"=>get_hours_array(),
            "minutes"=>get_minutes_array(),
            "has_authority"=>$this->paltergrade->has_authority($this->session->userdata["user_id"]),
        );
        $this->load->view("v2/altergrades/upgrade",$data);
    }    
    function edit(){
        $this->common->check_login();
        $id = $this->uri->segment(3);
        $obj = $this->paltergrade->getobjbyid($id);
        $data = array(
            "menuFeed"=>"Perubahan Layanan",
            "tablelabel"=>"Edit Layanan",
            "obj"=>$obj,
            "products"=>$this->pproduct->getproducts(),
            "smartvalue"=>$this->pproduct->smartvalue(),
            "business"=>$this->pproduct->business(),
            "formlabel"=>"Perubahan Layanan",
            "hours"=>get_hours_array(),
            "minutes"=>get_minutes_array(),
            "has_authority"=>$this->paltergrade->has_authority($this->session->userdata["user_id"]),
        );
        $this->load->view("v2/altergrades/edit",$data);
    }    
    function index(){
        $this->common->check_login();
        $objs = $this->paltergrade->getaltergrades();
        $data = array(
            "menuFeed"=>"Perubahan Layanan",
            "tablelabel"=>"Perubahan Layanan",
            "objs"=>$objs,
            "products"=>$this->pproduct->getproducts(),
            "formlabel"=>"Perubahan Layanan",
            "hours"=>get_hours_array(),
            "minutes"=>get_minutes_array(),
   //         "has_authority"=>$this->ptrial->has_authority($this->session->userdata["user_id"]),
        );
        $this->load->view("v2/altergrades/index",$data);
    }
    function upgrade(){
        $this->common->check_login();
        $objs = $this->paltergrade->getaltergrades();
        $data = array(
            "menuFeed"=>"Perubahan Layanan",
            "tablelabel"=>"Perubahan Layanan",
            "objs"=>$objs,
            "products"=>$this->pproduct->getproducts(),
            "formlabel"=>"Perubahan Layanan",
            "hours"=>get_hours_array(),
            "minutes"=>get_minutes_array(),
            "has_authority"=>$this->paltergrade->has_authority($this->session->userdata["user_id"]),
        );
        $this->load->view("v2/altergrades/upgrade",$data);
    }
    function save(){
        $params = $this->input->post();
        $sql = "insert into altergrades (client_site_id,altertype,product,integer_part,fraction_part,integer_part_down,fraction_part_down) ";
        $sql.= "values ";
        $sql.= "('".$params['client_site_id']."','".$params['altertype']."','".$params['product']."','".$params['integer_part']."','".$params['fraction_part']."','".$params['integer_part_down']."','".$params['fraction_part_down']."')";
        $this->db->query($sql);
        echo $sql;
    }
    function update(){
        $params = $this->input->post();
        $sql = "update altergrades set client_site_id='".$params['client_site_id']."',altertype='".$params['altertype']."',product='".$params['product']."',integer_part='".$params['integer_part']."',fraction_part='".$params['fraction_part']."',integer_part_down='".$params['integer_part_down']."',fraction_part_down='".$params['fraction_part_down']."' ";
        $sql.= "where ";
        $sql.= "id='".$params['id']."' ";
        $this->db->query($sql);
        echo $sql;
    }

}