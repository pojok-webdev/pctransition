<?php
class Pmaintenanceschedules extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("pmaintenance");
        $this->load->model("pmaintenanceschedule");
    }
    function addclient(){
        $data = array(
            "menuFeed"=>"maintenanceschedule",
            "formlabel"=>"Penambahan Jadwal Maintenance Pelanggan",
            "periods"=>$this->pmaintenance->periods(),
            "mdatetime"=>date("d/m/Y"),
            "mhour"=>date("H"),"mminute"=>date("i"),
            "maintenance_hour"=>$this->pmaintenanceschedule->maintenance_hour(),
            "maintenance_minute"=>$this->pmaintenanceschedule->maintenance_minute(),
        );
        $this->load->view("v2/maintenanceschedules/addclient",$data);
    }
    function addbackbone(){
        $data = array(
            "menuFeed"=>"maintenanceschedule",
            "formlabel"=>"Penambahan Jadwal Maintenance Backbone",
            "periods"=>$this->pmaintenance->periods(),
            "mdatetime"=>date("d/m/Y"),
            "mhour"=>date("H"),"mminute"=>date("i"),
            "maintenance_hour"=>$this->pmaintenanceschedule->maintenance_hour(),
            "maintenance_minute"=>$this->pmaintenanceschedule->maintenance_minute(),
        );
        $this->load->view("v2/maintenanceschedules/addbackbone",$data);
    }
    function adddatacenter(){
        $data = array(
            "menuFeed"=>"maintenanceschedule",
            "formlabel"=>"Penambahan Jadwal Maintenance Datacenter",
            "periods"=>$this->pmaintenance->periods(),
            "mdatetime"=>date("d/m/Y"),
            "mhour"=>date("H"),"mminute"=>date("i"),
            "maintenance_hour"=>$this->pmaintenanceschedule->maintenance_hour(),
            "maintenance_minute"=>$this->pmaintenanceschedule->maintenance_minute(),
        );
        $this->load->view("v2/maintenanceschedules/adddatacenter",$data);
    }
    function addbts(){
        $data = array(
            "menuFeed"=>"maintenanceschedule",
            "formlabel"=>"Penambahan Jadwal Maintenance BTS",
            "periods"=>$this->pmaintenance->periods(),
            "mdatetime"=>date("d/m/Y"),
            "mhour"=>date("H"),"mminute"=>date("i"),
            "maintenance_hour"=>$this->pmaintenanceschedule->maintenance_hour(),
            "maintenance_minute"=>$this->pmaintenanceschedule->maintenance_minute(),
        );
        $this->load->view("v2/maintenanceschedules/addbts",$data);
    }
    function edit(){
        $id = $this->uri->segment(3);
        $this->load->model("pmaintenanceschedule");
        $data = array(
            "menuFeed"=>"maintenanceschedule",
            "formlabel"=>"Edit Jadwal Maintenance",
            "periods"=>$this->pmaintenanceschedule->getperiods(),
            "ispayable"=>array("1"=>"Ya","0"=>"Tidak"),
            "maintenance_hour"=>get_hours_array(),
            "maintenance_minute"=>get_minutes_array(),
            "obj"=>$this->pmaintenanceschedule->getmaintenanceschedulebyid($id),
            "maintenance_minute"=>$this->pmaintenanceschedule->maintenance_minute(),
        );
        $this->load->view("v2/maintenanceschedules/edit",$data);
    }
    function index(){
        $this->common->check_login();
        $this->load->model("pmaintenanceschedule");
        $objs = $this->pmaintenanceschedule->getmaintenanceschedule();
        $data = array(
            "menuFeed"=>"maintenance",
            "tablelabel"=>"Jadwal Maintenance",
            "objs"=>$objs
        );
        $this->load->view("v2/maintenanceschedules/index",$data);
    }
    function removemaintenance(){
        $params = $this->input->post();
        $this->load->model("pmaintenanceschedule");
        $objs = $this->pmaintenanceschedule->removemaintenanceschedule($params["id"]);
    }
    function savemaintenance(){
        $params = $this->input->post();
        $this->load->model("pmaintenanceschedule");
        echo $this->pmaintenanceschedule->save($params);
    }
    function updatemaintenance(){
        $params = $this->input->post();
        $this->load->model("pmaintenanceschedule");
        echo $this->pmaintenanceschedule->update($params);
    }
}