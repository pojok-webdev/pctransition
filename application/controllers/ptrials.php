<?php
class Ptrials extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("pproduct");
        $this->load->model("ptrial");
    }
    function add(){
        $this->common->check_login();
        $objs = $this->ptrial->gettrials();
        $data = array(
            "menuFeed"=>"trials",
            "tablelabel"=>"Trial",
            "objs"=>$objs,
            "products"=>$this->pproduct->getproducts(),
            "formlabel"=>"Penambahan Trial",
            "hours"=>get_hours_array(),
            "minutes"=>get_minutes_array(),
        );
        $this->load->view("v2/trials/add",$data);
    }
    function approvalform(){
        $obj = $this->ptrial->getbyid($this->uri->segment(3));
        $btntoshow_ = $this->uri->segment(4);
        switch($btntoshow_){
            case "extend":
            $btntoshow = "btnextendapprove";
            break;
            case "range":
            $btntoshow = "btnrangeapprove";
            break;
        }
        $data = array(
            "menuFeed"=>"Trial",
            "obj" => $obj[0],
            "formlabel"=>"Trial Approval",
            "has_authority"=>"1",
            "btntoshow"=>$btntoshow,
            );
        $this->load->view("v2/trials/approvalform",$data);
    }
    function approve(){
        $id = $this->uri->segment(3);
        $this->ptrial->approve($id);
    }
    function edit(){
        $this->common->check_login();
        $obj = $this->ptrial->getbyid($this->uri->segment(3));
        $extendapprove = ($obj[0]->extendapprove==='1')?"extend approved":"extend not approved";
        $data = array(
            "menuFeed"=>"trials",
            "tablelabel"=>"Trial",
            "obj"=>$obj[0],
            "products"=>$this->pproduct->getproducts(),
            "hours"=>get_hours_array(),
            "minutes"=>get_minutes_array(),
            "formlabel"=>"Edit Trial",
            "has_authority"=>$this->ptrial->has_authority($this->session->userdata["user_id"]),
            "smartvalues" =>$this->ptrial->smartvalues(),
            "businesses"=>$this->ptrial->businesses(),
        );
        $data["extendapprovestatus"] = "xtendapprove";
        if($obj[0]->typename=="Baru"){
            $data["formlabel"] = "Edit Trial Baru";
            $this->load->view("v2/trials/edit",$data);
        }else{
            $data["formlabel"] = "Edit Upgrade Trial";
            $this->load->view("v2/trials/upgradit",$data);
        }
    }
    function followup(){
        $this->common->check_login();
        $obj = $this->ptrial->getbyid($this->uri->segment(3));
        if(in_array($obj[0]->reason,$this->ptrial->ncancelreason())){
            $reason = $obj[0]->reason;
        }else{
            $reason = "Lainnya";
        }
        $data = array(
            "menuFeed"=>"trials",
            "tablelabel"=>"Trial",
            "obj"=>$obj[0],
            "hours"=>get_hours_array(),
            "minutes"=>get_minutes_array(),
            "formlabel"=>"Follow up Trial",
            "extendreasons"=>$this->ptrial->extendreason(),
            "reason"=>$reason,
            "ncancelreason"=>$this->ptrial->ncancelreason(),
            "xcancelreason"=>$this->ptrial->xcancelreason(),
            "trialtype"=>$this->ptrial->getaction($obj[0]->id),
        );
        $this->load->view("v2/trials/followup",$data);
    }
    function index(){
        $this->common->check_login();
        switch($this->session->userdata("role")){
            case "Sales":
                $objs = $this->ptrial->gettrials();
            break;
            case "TS":
                $objs = $this->ptrial->gettstrials();
            break;
        }
        $data = array(
            "menuFeed"=>"trials",
            "tablelabel"=>"Trial",
            "objs"=>$objs,
        );
        $this->load->view("v2/trials/index",$data);
    }
    function compareotp(){
        $params = $this->input->post();
        if ($this->ptrial->compareotp($params["id"],$params["otp"])){
            $this->ptrial->approve($params["id"]);
            echo "PIN cocok, Pengajuan disetujui";
        }else{
            echo "PIN tidak cocok";
        }
    }
    function needapprovaljson(){
        $arr = array();
        foreach($this->ptrial->needapproval() as $appr){
            array_push($arr,'{"id":"'.$appr->id.'"}');
        }
        echo '{data:['.implode(",",$arr).']}';
    }
    function save(){
        $this->common->check_login();
        $params = $this->input->post();
        $this->ptrial->save($params);
    }
    function update(){
        $this->common->check_login();
        $params = $this->input->post();
        echo $this->ptrial->update($params);
    }
    function upgrade(){
        $this->common->check_login();
        $objs = $this->ptrial->gettrials();
        $data = array(
            "menuFeed"=>"trials",
            "tablelabel"=>"Trial",
            "objs"=>$objs,
            "products"=>$this->pproduct->getproducts(),
            "formlabel"=>"Penambahan Upgrade Trial",
            "hours"=>get_hours_array(),
            "minutes"=>get_minutes_array(),
            "has_authority"=>$this->ptrial->has_authority($this->session->userdata["user_id"]),
        );
        $this->load->view("v2/trials/upgrade",$data);
    }
    function starttrial(){
        $id = $this->uri->segment(3);
        echo $this->ptrial->start($id);
    }
    function endtrial(){
        $id = $this->uri->segment(3);
        echo $this->ptrial->stop($id);
    }
}