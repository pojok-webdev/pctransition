<?php
class Ptests extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function getotp(){
        $this->load->helper("otp");
        echo getotp();
        echo "\n";
    }
    function psendmail(){
        $this->load->helper("mailing");
        $this->load->helper("otp");
        $params = array(
            "subject"=>"Test eMail PadiNET",
            "to"=>"puji@padi.net.id",
            "from"=>"pw.prayitno@gmail.com",
            "message"=>"Test Pengiriman Surat Elektronik Padi NET OTP : " . getotp()
        );
        psendmail($params);
    }
    function compareotp($id,$otp){
        //$id = 1;$otp = 'IIe5C';
        $this->load->model("ptrial");
        if($this->ptrial->compareotp($id,$otp)){
            echo "is the same".PHP_EOL;
        }else{
            echo "is not the same".PHP_EOL;
        }
    }
}