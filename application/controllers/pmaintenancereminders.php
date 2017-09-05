<?php
class Pmaintenancereminders extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper("mailing");
        $this->load->helper("template");
        $this->load->helper("url");
        $this->load->helper("telegram");
        $this->load->config("padi_config");
    }
    function nearupdater(){
        $sql = "select id,reminder,maintenance_type,mdatetime,date_sub(mdatetime,interval 15 minute)x,concat(date_format(now(),'%Y'),'-',date_format(date_sub(mdatetime,interval 20 minute),'%m-%d %T'))remind  from maintenances ";
        $sql.= "where ";
        $sql.= "date_sub(concat(date_format(now(),'%Y'),'-',date_format(mdatetime,'%m-%d %T')),interval 20 minute)<now()";
//        $sql.= "concat(date_format(now(),'%Y'),'-',date_format(date_sub(mdatetime,interval 20 minute),'%m-%d %T'))<now()";
        $que = $this->db->query($sql);
        foreach($que->result() as $res){
            $_sql = "update maintenances set sent='0' where id=".$res->id;
            $_que = $this->db->query($_sql);
        }
    }
    function nearupdatesent(){
        $sql = "select a.id,reminder,maintenance_type,d.username sales,";
        $sql.= "case maintenance_type ";
        $sql.= "when 'pelanggan' then c.name ";
        $sql.= "when 'backbone' then e.name ";
        $sql.= "when 'bts' then f.name ";
        $sql.= "when 'datacenter' then g.name ";
        $sql.= "end name,";
        $sql.= "mdatetime,date_sub(mdatetime,interval 15 minute)x,concat(date_format(now(),'%Y'),'-',date_format(date_sub(mdatetime,interval 20 minute),'%m-%d %T'))remind  from maintenances a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join users d on d.id=c.sale_id ";
        $sql.= "left outer join backbones e on e.id=a.backbone_id ";
        $sql.= "left outer join btstowers f on f.id=a.bts_id ";
        $sql.= "left outer join datacenters g on g.id=a.datacenter_id ";
        $sql.= "where ";
        $sql.= "concat(date_format(now(),'%Y'),'-',date_format(date_sub(mdatetime,interval 20 minute),'%m-%d %T'))<now()";
        $que = $this->db->query($sql);
        foreach($que->result() as $res){
            $message = maintenanceTemplate($res->id,$res->name);
            if($this->sendmail($res->name,$message,"$res->sales",$this->config->item("baseurl"),$res->id)){
                $chat_id = "219513951";
                $telegram_text = "Jadwal Maintenance ".$res->name." akan jatuh pada 15 menit lagi, silakan memilih aksi pada padiApp\n";
                $telegram_text.= "https://database.padinet.com/pmaintenances/followup/".$res->id;
                echo "Telegram Text ".$telegram_text."\n";
                sendtelegram($this->config->item('padibot'),$chat_id,$telegram_text);	        
                                
                $_sql = "update maintenances set sent='1' where id=".$res->id;
                echo "\nSQL:".$_sql . "\n";
                $this->db->query($_sql);
            }
        }
    }
    function x(){
        $sql = "select id,reminder,maintenance_type,mdatetime,date_sub(mdatetime,interval 15 minute)x,concat(date_format(now(),'%Y'),'-',date_format(date_sub(mdatetime,interval 15 minute),'%m-%d'))remind  from maintenances;";
    }
    function sendmail($clientname,$message,$createuser,$baseurl,$id){
        $config['mailtype']='html';
        $this->email->initialize($config);
        $this->email->from('support@padi.net.id','PadiApp');
        $this->email->to("puji@padi.net.id");
        $this->email->bcc($this->config->item('developermail'));
        $this->email->reply_to($this->config->item('developermail'),"PadiApp");
        $this->email->subject('PadiApp, --test trial notifikasi');
        $this->email->message($message);
        return $this->email->send();
    }    
}