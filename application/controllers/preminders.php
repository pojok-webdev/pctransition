<?php
class Preminders extends CI_Controller{
    var $url = "http://database.padinet.com/";
    var $processed = false;
    function __construct(){
        parent::__construct();
        $this->load->helper("mailing");
        $this->load->helper("template");
        $this->load->helper("user");
        $this->load->helper("padi");
        $this->load->helper("url");
        $this->load->helper("survey");
        $this->load->helper("sites");
        $this->load->helper("telegram");
        $this->load->model("preminder");
        $this->load->config("padi_config");
    }
	function sendCloseTicketMail(){
		$baseurl = $this->config->item('baseurl');
		$this->email->initialize(mailConfig());
		foreach($this->preminder->closeTicketGet() as $row){
			$mails = gettsmails($row->client_site_id);
			$this->email->from('support@padi.net.id','PadiApp');
            if($this->config->item("simulation")){
                $this->email->to($this->config->item("developermail"));
            }else{
			    $this->email->to($mails);
            }
			$this->email->bcc($this->config->item('developermail'));
			$this->email->reply_to($this->config->item('developermail'),"PadiApp");
			$this->email->subject('PadiApp, Notifikasi Ticket telah Ditutup ('.$row->clientname.')');
			$this->email->message(closeTicketTemplate($row->clientname,$row->username,$baseurl,$row->id,$row->kdticket));
			$solution = preg_replace("/<.*?>/", "", $row->solution);
			if ($this->email->send()){
				$sql = "update tickets set mailsent='3' where id=".$row->id;
				$qry = $this->db->query($sql);
				echo "send mail sukses, row->id=".$row->id." \n";
				$telegram_text = "Ticket atas nama: ".$row->clientname.",(AM:".$row->sales."), \nkode ticket ";
                $telegram_text.= $row->kdticket." telah ditutup . \nKeterangan ".$solution." \nTS: ".$row->createuser;
                $telegram_text.= " \n\nTiket dapat dilihat pada tautan berikut ".$baseurl."tickets/filter/".$row->id;
                $telegram_text.= "  &raquo;\n \n(PadiApp)";
                if($this->config->item("simulation")){
                    sendtelegram($this->config->item('padibot'),$this->config->item('developer_chat_id'),$telegram_text);
                }else{
                    if(in_array('ts@padi.net.id',$mails)){
                        sendtelegram($this->config->item('padibot'),$this->config->item('chat_id'),$telegram_text);				
                    }
                    if(in_array('ts-jkt@padi.net.id',$mails)){
                        sendtelegram($this->config->item('padibot'),"-161183752",$telegram_text);				
                    }
                    if(in_array('ts-mlg@padi.net.id',$mails)){
                        sendtelegram($this->config->item('padibot'),"-179062600",$telegram_text);				
                    }
                    if(in_array('ts-bali@padi.net.id',$mails)){
                        sendtelegram($this->config->item('padibot'),"-149206255",$telegram_text);				
                    }
                }
			}else{
				echo $this->email->print_debugger();
			}
		}
	}    
	function sendSurveyRequestMail(){
		$baseurl = $this->config->item("baseurl");
		echo "BASEURL ".$baseurl."\n";
		$this->email->initialize(mailConfig());
		$sql = "select a.id,a.client_site_id,c.name,a.createuser,a.sale_id,b.address from survey_sites a ";
		$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
		$sql.= "left outer join clients c on c.id=b.client_id ";
		$sql.= "where a.requestsent='0'";
		$query = $this->db->query($sql);
		foreach($query->result() as $row){
			$this->email->from($this->config->item('developermail'),'PadiApp');
			$mails = gettsmails($row->client_site_id);
			$salesmails = getuserrole($row->sale_id);
			array_push($salesmails,$this->config->item('sbysalesadmin'));
			$this->email->to($mails);
			$this->email->cc($salesmails);
			$this->email->bcc($this->config->item('developermail'));
			$this->email->reply_to($this->config->item('developermail'),"PadiApp");
			$this->email->subject($row->name.', Pengajuan Survey ');
			$this->email->message(surveyRequestTemplate($row->name,$row->createuser,$baseurl,$row->id));
			if ($this->email->send()){
				$sql = "update survey_sites set requestsent='1' where id=".$row->id;
				$qry = $this->db->query($sql);
				echo "send mail sukses, row->id=".$row->id." \n";
				$telegram_text = "Pengajuan Survey telah dibuat: ";
                $telegram_text.= $row->name.", \nAlamat ".$row->address."\n\nSales: ".$row->createuser;
                $telegram_text.= "  \n\nTautan Aplikasi : ".$baseurl."surveys/edit/".$row->id."\n\n(PadiApp)";
				exec("wget https://api.telegram.org/bot201184174:AAH2Fy_3wS8A5KGi2cn468dtFCMJjhOqISQ/sendMessage --post-data 'chat_id=".$this->config->item('chat_id')."&text=Pengajuan Survey telah dibuat: ".$row->name.", \nAlamat ".$row->address."\n\nSales: ".$row->createuser."  \n\nTautan Aplikasi : ".$baseurl."surveys/edit/".$row->id."\n\n(PadiApp)'");
				sendtelegram("241149002:AAFdZaIVDfWmu4L-A61k1myXfC5CcmUAgwM","-101385876",$telegram_text);
			}else{
				echo $this->email->print_debugger();
			}
		}
	}
	function sendSurveyResultMail(){
		$baseurl = $this->config->item("baseurl");
		echo "BASEURL ".$baseurl."\n";
		$this->email->initialize(mailConfig());
		$sql = "select a.id,a.client_site_id,c.name,group_concat(e.name) createuser,a.sale_id,f.username am, ";
        $sql.= "case d.resume ";
        $sql.= " when '1' ";
        $sql.= "  then 'Dapat dilaksanakan' ";
        $sql.= " when '2' ";
        $sql.= "  then 'Dapat dilaksanakan dengan syarat' ";
        $sql.= " when '3' ";
        $sql.= "  then 'Tidak Dapat dilaksanakan' ";
        $sql.= " when '0' ";
        $sql.= "  then 'Belum ada kesimpulan' end resu ";
        $sql.= "from survey_sites a ";
		$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
		$sql.= "left outer join clients c on c.id=b.client_id ";
		$sql.= "left outer join survey_requests d on d.id=a.survey_request_id ";
		$sql.= "left outer join survey_surveyors e on d.id=e.survey_request_id ";
		$sql.= "left outer join users f on f.id=c.sale_id ";

		$sql.= "where a.resultsent='0' ";
        $sql.= "group by a.id ";
		$query = $this->db->query($sql);
		echo $sql . "\n <br /> \n";
		foreach($query->result() as $row){
			echo "CLIENT SITE ID ".$row->client_site_id . "<br />";
			$this->email->from($this->config->item('developermail'),'PadiApp');
			$mails = gettsmails($row->client_site_id);
			$salesmails = getuserrole($row->sale_id);
			array_push($salesmails,$this->config->item('sbysalesadmin'));
			$this->email->to($mails);
			$this->email->cc($salesmails);
			$this->email->bcc($this->config->item('developermail'));
			$this->email->reply_to($this->config->item('developermail'),"PadiApp");
			$this->email->subject($row->name.', Hasil Survey ');
			$this->email->message(surveyResultTemplate($row->name,$row->createuser,$baseurl,$row->id,$row->resu,$row->am));
			if ($this->email->send()){
				$sql = "update survey_sites set resultsent='1' where id=".$row->id;
				$qry = $this->db->query($sql);
				echo "send mail sukses, row->id=".$row->id." \n";
				$telegram_text = "Hasil Survey: ".$row->name.", \n ";
                $telegram_text.= $row->resu."\n \nAM: ".$row->am.",TS: ";
                $telegram_text.= $row->createuser."  \n\nHasil Survey dapat dilihat pada tautan berikut ";
                $telegram_text.= $baseurl."surveys/edit/".$row->id." \n\n(PadiApp)";
                $telegramurl = "https://api.telegram.org/bot201184174:AAH2Fy_3wS8A5KGi2cn468dtFCMJjhOqISQ/sendMessage";
                $telegrammessage = "Hasil Survey: ".$row->name.", \n ".$row->resu."\n \nAM: ".$row->am.",TS: ".$row->createuser;
                $telegrammessage.= "  \n\nHasil Survey dapat dilihat pada tautan berikut ";
                $telegrammessage.= $baseurl."surveys/edit/".$row->id." \n\n(PadiApp)'";
				exec("wget ".$telegramurl." --post-data 'chat_id=".$this->config->item('chat_id')."&text=".$telegrammessage);
				sendtelegram("241149002:AAFdZaIVDfWmu4L-A61k1myXfC5CcmUAgwM","-101385876",$telegram_text);
			}else{
				echo $this->email->print_debugger();
			}
		}
	}
	function tesgetmails1(){
		$baseurl = $this->config->item('baseurl');
		$this->email->initialize(mailConfig());
		$sql = "select a.* from tickets a ";
		$sql.= "where a.mailsent='0'";
		$query = $this->db->query($sql);
		foreach($query->result() as $row){
			$mails = gettsmails($row->client_site_id);
				$SIMULATION = false;
                if($SIMULATION){
                    $telegram_text = "Sebuah Ticket baru telah dibuat: ";
                    $telegram_text.=$row->clientname;
                    $telegram_text.=", \nkode ticket ";
                    $telegram_text.=$row->kdticket;
                    $telegram_text.="\nKomplain: ";
                    $telegram_text.=$row->complaint;
                    $telegram_text.=" \nTS: ".$row->createuser;
                    $telegram_text.="  \n\nTiket dapat dilihat pada tautan berikut ";
                    $telegram_text.=$baseurl."tickets/filter/".$row->id." \n\n(PadiApp)";
                    if(in_array('ts@padi.net.id',$mails)){
                        sendtelegram("201184174:AAH2Fy_3wS8A5KGi2cn468dtFCMJjhOqISQ",$this->config->item('chat_id'),$telegram_text);				
                    }
                    if(in_array('ts-jkt@padi.net.id',$mails)){
                        sendtelegram("201184174:AAH2Fy_3wS8A5KGi2cn468dtFCMJjhOqISQ","-161183752",$telegram_text);				
                    }
                    if(in_array('ts-mlg@padi.net.id',$mails)){
                        sendtelegram("201184174:AAH2Fy_3wS8A5KGi2cn468dtFCMJjhOqISQ","-179062600",$telegram_text);				
                    }
                    if(in_array('ts-bali@padi.net.id',$mails)){
                        sendtelegram("201184174:AAH2Fy_3wS8A5KGi2cn468dtFCMJjhOqISQ","-149206255",$telegram_text);				
                    }			
                }else{
                    sendtelegram("201184174:AAH2Fy_3wS8A5KGi2cn468dtFCMJjhOqISQ","219513951","telegram_text");
                }
		}		
	}
	function tesgetmails2(){
		$baseurl = $this->config->item('baseurl');
		$this->email->initialize(mailConfig());
		$sql = "select a.*,b.username from tickets a ";
		$sql.= "left outer join (select * from ticket_followups where result='1') b ";
		$sql.= "on b.ticket_id=a.id ";
		$sql.= "where a.mailsent='2'";
		$query = $this->db->query($sql);
		foreach($query->result() as $row){
			$mails = gettsmails($row->client_site_id);
                $SIMULATION = false;
                if($SIMULATION){
                    $telegram_text = "Ticket atas nama: ".$row->clientname.", \nkode ticket ".$row->kdticket." telah ditutup . \nKeterangan ".$solution." \nTS: ".$row->createuser." \n\nTiket dapat dilihat pada tautan berikut ".$baseurl."tickets/filter/".$row->id."  &raquo;\n \n(PadiApp)";
                    if(in_array('ts@padi.net.id',$mails)){
                        sendtelegram("201184174:AAH2Fy_3wS8A5KGi2cn468dtFCMJjhOqISQ",$this->config->item('chat_id'),$telegram_text);				
                    }
                    if(in_array('ts-jkt@padi.net.id',$mails)){
                        sendtelegram("201184174:AAH2Fy_3wS8A5KGi2cn468dtFCMJjhOqISQ","-161183752",$telegram_text);				
                    }
                    if(in_array('ts-mlg@padi.net.id',$mails)){
                        sendtelegram("201184174:AAH2Fy_3wS8A5KGi2cn468dtFCMJjhOqISQ","-179062600",$telegram_text);				
                    }
                    if(in_array('ts-bali@padi.net.id',$mails)){
                        sendtelegram("201184174:AAH2Fy_3wS8A5KGi2cn468dtFCMJjhOqISQ","-149206255",$telegram_text);				
                    }
                }else{
                    sendtelegram("201184174:AAH2Fy_3wS8A5KGi2cn468dtFCMJjhOqISQ","219513951","telegram_text");
                }
		}		
	}

    function trialnew(){
        $sql = "select a.id,c.name,d.username sales from trials a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join users d on d.id=c.sale_id ";
        $sql.= "where newtrialnotify ='0'";
        $ci = & get_instance();
        $res = $ci->db->query($sql);
        foreach($res->result() as $row){
            $telegram_text = "test telegram trial \n";
            $telegram_text.= "(".$row->name.")";
            echo $telegram_text . "\n";
            echo $this->config->item('padi_bot') . "\n";
            echo $this->config->item('paditest_group_chatid') . "\n";
            $message = newTrialTemplate($row->name,$row->sales,$this->config->item("baseurl"),$row->id);
            if($this->sendmail($row->name,$message,$row->sales,$this->url,$row->id)){
                $_sql = "update trials set newtrialnotify='1' where id=".$row->id;
                echo $_sql . "\n";
                $this->db->query($_sql);
                $bot_token = "311276793:AAGpixXvuG9XdAWqUHE-inawZgdki3VsxjI";
                $chat_id = "219513951";
                $message = $telegram_text ."xixixix";
                sendtelegram($this->config->item('padibot'),$chat_id,$telegram_text);	
                echo "BOT TOKEN ".$bot_token."\n";
                echo "Config Bot Toke ".$this->config->item('padibot')."\n";
                echo "Config Group chatid ".$this->config->item('paditest_group_chatid')."\n";
                
                if($this->processed){
                    sendtelegram($this->config->item('padibot'),$this->config->item('paditest_group_chatid'),$telegram_text);	
                    $tgurl = "wget https://api.telegram.org/bot";
                    $tgurl.= $bot_token;
                    $tgurl.= "/sendMessage --post-data 'chat_id=".$chat_id."&text=".$message." '";
                    exec($tgurl);
                }
            }
        }
    }
    function trial15minutesbeforestart(){
        $sql = "select a.id,c.name,a.enddate,d.username sales,date_sub(startdate,interval 15 minute)remind from trials a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join users d on d.id=c.sale_id ";
        $sql.= "where nearstartnotify ='0' and date_sub(startdate,interval 15 minute)<now() and startdate>now() ";
        $ci = & get_instance();
        $res = $ci->db->query($sql);
        foreach($res->result() as $row){
            $message = trialReminderTemplate1($row->name,$row->sales,base_url(),$row->id);
            $this->sendmail($row->name,$message,"bendot","/",$row->id);
            $_sql = "update trials set nearstartnotify='1' where id=".$row->id;
            $ci->db->query($_sql);
            echo "found";
        }
    }
    function trial15minutesbeforeend(){
        $sql = "select a.id,c.name,a.enddate,d.username sales,date_sub(enddate,interval 15 minute)remind from trials a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join users d on d.id=c.sale_id ";
        $sql.= "where nearendnotify ='0' and date_sub(enddate,interval 15 minute)<now() and enddate>now() ";
        $ci = & get_instance();
        $res = $ci->db->query($sql);
        echo $sql."\n";
        foreach($res->result() as $row){
            $message = trialReminderTemplate2($row->name,$row->sales,$this->config->item("baseurl"),$row->id);
            if($this->sendmail($row->name,$message,$row->sales,$this->config->item("baseurl"),$row->id)){
                $chat_id = "219513951";
                $telegram_text = "Masa trial ".$row->name." akan segera berakhir 15 menit lagi, silakan memilih aksi pada padiApp\n";
                $telegram_text.= "https://database.padinet.com/ptrials/followup/".$row->id;
                echo "Telegram Text ".$telegram_text."\n";
                sendtelegram($this->config->item('padibot'),$chat_id,$telegram_text);	        }                
                $_sql = "update trials set nearendnotify='1' where id=".$row->id;
                $ci->db->query($_sql);
        }
    }
    function trial1daysbeforeend(){
        $sql = "select a.id,c.name,a.enddate,d.username sales, date_sub(enddate,interval 1 day)remind from trials a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join users d on d.id=c.sale_id ";
        $sql.= "where nearendnotify2 ='0' and date_sub(enddate,interval 1 day)<now() and enddate>now() ";
        $ci = & get_instance();
        $res = $ci->db->query($sql);
        foreach($res->result() as $row){
            $message = trialReminderTemplate3($row->name,"bandit",base_url(),$row->id);
            $this->sendmail($row->name,$message,"bendot","/",$row->id);
            $_sql = "update trials set nearendnotify2='1' where id=".$row->id;
            $ci->db->query($_sql);
            echo "found";
        }
    }    
    function trialjoin(){
        $sql = "select a.id,c.name,d.username sales from trials a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join users d on d.id=c.sale_id ";
        $sql.= "where isjoin='1' and joinsent ='0'";
        $ci = & get_instance();
        $res = $ci->db->query($sql);
        foreach($res->result() as $row){
            $telegram_text = "test telegram trial \n";
            $telegram_text.= "(".$row->name.")";
            $message = trialJoinTemplate($row->name,$row->sales,$this->config->item("baseurl"),$row->id);
            if($this->sendmail($row->name,$message,$row->sales,$this->url,$row->id)){
                $_sql = "update trials set joinsent='1' where id=".$row->id;
                echo $_sql . "\n";
                $this->db->query($_sql);
                $bot_token = "311276793:AAGpixXvuG9XdAWqUHE-inawZgdki3VsxjI";
                $chat_id = "219513951";
                $telegram_text = "Pelanggan " . $row->name . "memutuskan untuk join";
                sendtelegram($this->config->item('padibot'),$chat_id,$telegram_text);	
            }
        }
    }
    function needrangeapprovalnotify(){
        $sql = "select a.id,c.name,d.username sales from trials a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join users d on d.id=c.sale_id ";
        $sql.= "where rangeapprovesent = '0'";
        $ci = & get_instance();
        $res = $ci->db->query($sql);
        foreach($res->result() as $row){
            $telegram_text = "Pelanggan berikut membutuhkan Approval \n";
            $telegram_text.= "(".$row->name.") \n";
            $telegram_text.= "URL: ".$this->url."/ptrials/approvalform/".$row->id."/range";
            echo $telegram_text . "\n";
            echo $this->config->item('padi_bot') . "\n";
            echo $this->config->item('paditest_group_chatid') . "\n";
            $message = newTrialRangeNeedApprovalTemplate($row->name,$row->sales,$this->config->item("baseurl"),$row->id);
            if($this->sendmail($row->name,$message,$row->sales,$this->url,$row->id,'PadiApp [Notifikasi Trial Memerlukan Approval]')){
                $_sql = "update trials set rangeapprovesent='1' where id=".$row->id;
                echo $_sql . "\n";
                $this->db->query($_sql);
                $bot_token = "311276793:AAGpixXvuG9XdAWqUHE-inawZgdki3VsxjI";
                $chat_id = "219513951";
                sendtelegram($this->config->item('padibot'),$chat_id,$telegram_text);	
            }
        }
    }
    function rangeapprovednotify(){
        $sql = "select a.id,c.name,d.username sales from trials a ";
        $sql.= "left outer join client_sites b on b.id=a.client_site_id ";
        $sql.= "left outer join clients c on c.id=b.client_id ";
        $sql.= "left outer join users d on d.id=c.sale_id ";
        $sql.= "where rangeapprovesent = '2'";
        $ci = & get_instance();
        $res = $ci->db->query($sql);
        foreach($res->result() as $row){
            $telegram_text = "Pelanggan berikut telah di approve \n";
            $telegram_text.= "(".$row->name.") \n";
            $telegram_text.= "URL: ".$this->url."/ptrials/edit/".$row->id;
            echo $telegram_text . "\n";
            echo $this->config->item('padi_bot') . "\n";
            echo $this->config->item('paditest_group_chatid') . "\n";
            $message = newTrialRangeApprovedTemplate($row->name,$row->sales,$this->config->item("baseurl"),$row->id);
            if($this->sendmail($row->name,$message,$row->sales,$this->url,$row->id,'PadiApp [Permintaan Trial Telah di Approve]')){
                $_sql = "update trials set rangeapprovesent='1' where id=".$row->id;
                echo $_sql . "\n";
                $this->db->query($_sql);
                $bot_token = "311276793:AAGpixXvuG9XdAWqUHE-inawZgdki3VsxjI";
                $chat_id = "219513951";
                sendtelegram($this->config->item('padibot'),$chat_id,$telegram_text);	
            }
        }
    }
    function sendmail($clientname,$message,$createuser,$baseurl,$id,$subject='padiApp --test notifikasi'){
        $config['mailtype']='html';
        $this->email->initialize($config);
        $this->email->from('support@padi.net.id','PadiApp');
        $this->email->to("puji@padi.net.id");
        $this->email->bcc($this->config->item('developermail'));
        $this->email->reply_to($this->config->item('developermail'),"PadiApp");
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
}