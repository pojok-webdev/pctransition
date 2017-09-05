<?php
class Pdisconnectionreminders extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper("mailing");
        $this->load->helper("template");
        $this->load->helper("url");
        $this->load->helper("telegram");
        $this->load->config("padi_config");    }
    function newitemnotify(){
        $ci = & get_instance();
        $sql = "select a.id,b.name from disconnections a ";
        $sql.= "left outer join clients b on b.id=a.client_id ";
        $sql.= "where a.status='0'";
        $que = $ci->db->query($sql);
        $chat_id = "219513951";
        foreach($que->result() as $res){
            $message = disconnectionTemplate($res->id,$res->name,$res->sales,$this->config->item("baseurl"));
            $this->email->from('support@padi.net.id','PadiApp');
            $this->email->to("puji@padi.net.id");
            $this->email->bcc($this->config->item('developermail'));
            $this->email->reply_to($this->config->item('developermail'),"PadiApp");
            $this->email->subject('PadiApp, --test trial notifikasi');            
            if($this->sendmail($row->name,$message,$row->sales,$this->config->item("baseurl"),$row->id)){
                $_sql = "update trials set joinsent='1' where id=".$res->id;
                $this->db->query($_sql);
                $telegram_text = "Sebuah pengajuan diskoneksi atas nama ". $res->name . "\n";
                $telegram_text.= "Tautan aplikasi adalah sbb:\n";
                $telegram_text.= $this->config->item("baseurl") . "disconnections/edit/".$res->id;
                sendtelegram($this->config->item('padibot'),$chat_id,$telegram_text);
            }
        }
    }
    function sendmail($clientname,$message,$createuser,$baseurl,$id){
        $config['mailtype']='html';
        $this->email->initialize($config);
        $this->email->from('support@padi.net.id','PadiApp');
        $this->email->to("puji@padi.net.id");
        $this->email->bcc($this->config->item('developermail'));
        $this->email->reply_to($this->config->item('developermail'),"PadiApp");
        $this->email->subject('PadiApp, --test disconnection notifikasi');
        $this->email->message($message);
        return $this->email->send();
    }        
}