<?php
function getotp(){
    return random_string("alnum",6);
}
function isexpired($otp){
    $ci = & get_instance();
    $sql = "select expiredate,";
    $sql.= "case when expiredate>now() then 'available' else 'expired' end result ";
    $sql.= "from otps ";
    $sql.= "where otp = '" . $otp . "'";
    $que = $ci->db->query($sql);
    $res = $que->result();
    if($que->num_rows>0){
        echo $res[0]->result;
    }else{
        echo "none";
    }
    echo "\n";
}
function saveotp($params){
    $sql = "insert into otps ";
    $sql.= "(otp,expiredate,sale_id,createuser,createdate) ";
    $sql.= "values ";
    $sql.= "('".$params['otp']."','".$params['expiredate']."','".$params['sale_id']."','".$params['createuser']."','".$params['createdate']."')";
    $ci = & get_instance();
    $que = $ci->db->query($sql);
}
function sendotp($params){
    $ci = & get_instance();
    $ci->load->helper("email");
    $message = "Pengajuan Trial atas nama PT ABC telah diapprove<br />";
    $message.= "Silakan memasukkan kode berikut pada aplikasi<br />";
    $message.= $params["otp"];
    $message.= "<br />";
    $message.= "Kode ini akan mengalami expired pada tanggal " . $params["expiredate"] . "<br />";
    $message.= "<br />";
    $message.= "PadiApp";
    $config["mailtype"] = "html";
    $ci->load->library('email');
    $ci->email->initialize($config);
    $ci->email->from('puji@padi.net.id', 'Puji Prayitno');
    $ci->email->to('puji@padi.net.id');
    $ci->email->cc('puji@padi.net.id');
    $ci->email->bcc('puji@padi.net.id');
    $ci->email->subject('Approval');
    $ci->email->message($message);
    $ci->email->send();
}
function recotp($otp){
    $ci = & get_instance();
    $que = $ci->db->query($sql);
    $sql = "update otps ";
    $sql.= "set confirmed='1' ";
    $sql.= "where otp = '" . $otp . "'";
    $que = $ci->db->query($sql);
}