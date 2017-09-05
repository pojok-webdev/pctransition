<?php
class Pproduct extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getproducts(){
        return array(
                "Pilihlah"=>"Pilihlah",
                "Enterprise"=>"Enterprise",
                "IIX"=>"IIX",
                "Local Loop"=>"Local Loop",
                "Business"=>"Business",
                "Smart Value"=>"Smart Value",
            );
    }
    function smartvalue(){
        return array(
                "Up to 512 Kbps"=>"Up to 512 Kbps",
                "Up to 768 Kbps"=>"Up to 768 Kbps",
                "Up to 1 Mbps"=>"Up to 1 Mbps",
                "Up to 2 Mbps"=>"Up to 2 Mbps",
                "Up to 3 Mbps"=>"Up to 3 Mbps",
                "Up to 4 Mbps"=>"Up to 4 Mbps"
        );
    }
    function business(){
        return array(
            "Up to 2 Mbps"=>"Up to 2 Mbps",
            "Up to 4 Mbps"=>"Up to 4 Mbps",
            "Up to 6 Mbps"=>"Up to 6 Mbps",
            "Up to 8 Mbps"=>"Up to 6 Mbps"
        );
    }
}