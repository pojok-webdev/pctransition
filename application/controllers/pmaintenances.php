<?php
class Pmaintenances extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("peos");
        $this->load->model("pmaintenance");
        $this->load->model("poperator");
    }
    function index(){
        $this->load->model("pmaintenance");
        $objs = $this->pmaintenance->getmaintenance();
        $data = array(
            "menuFeed"=>"maintenances",
            "tablelabel"=>"Maintenance",
            "objs"=>$objs
        );
        $this->load->view("v2/maintenances/index",$data);
    }
    function edit(){
        $this->load->model("pmaintenanceschedule");
        $objs = $this->pmaintenance->getmaintenancebyid($this->uri->segment(3));
        $data = array(
            "menuFeed"=>"maintenances",
            "tablelabel"=>"Maintenance",
            "obj"=>$objs,
            "competitors"=>$this->poperator->getcombodata(),
            "maintenancecompetitors"=>$this->pmaintenance->competitors($this->uri->segment(3)),
            "maintenancedocuments"=>$this->pmaintenance->getimages($this->uri->segment(3)),
            "formlabel"=>"Pengajuan Maintenance",
            "periods"=>$this->pmaintenanceschedule->getperiods(),
            "ispayable"=>array("1"=>"Ya","0"=>"Tidak"),
            "maintenance_hour"=>get_hours_array(),
            "maintenance_minute"=>get_minutes_array(), 
            "officers"=>$this->peos->geteoses(),
            "officeraddeds"=>$this->pmaintenance->getofficers($this->uri->segment(3)),
            "operatorarray"=>$this->operator->get_combo_data()
       );
       $this->load->view("v2/maintenances/edit",$data);
    }
    function officeradd(){
        $params = $this->input->post();
        echo $this->pmaintenance->addoperator($params);
    }
    function competitoradd(){
        $params = $this->input->post();
        echo $this->pmaintenance->addkompetitors($params);
    }
    function competitorremove(){
        $params = $this->input->post();
        echo $this->pmaintenance->removekompetitors($params);
    }    
    function removeofficer(){
        $params = $this->input->post();
        echo $this->pmaintenance->removeofficer($params);
    }
    function removemaintenance(){
        $id = $this->uri->segment(3);
        $this->pmaintenance->remove($id);
    }
    function save(){
        $params = $this->input->post();        
        echo $this->pmaintenance->save($params);
    }
    function savedocument(){
        $params = $this->input->post();
        echo $this->pmaintenance->savedocument($params);
    }
    function update(){
        $params = $this->input->post();
        echo $this->pmaintenance->update($params);
    }    
}